<?php

namespace App\Controller;

use App\Controller\AppController;
use DataTables\Controller\DataTablesAjaxRequestTrait;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 *
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('DataTables.DataTables');
        $this->DataTables->createConfig('Payments')
                ->databaseColumn('Payments.id')
                ->queryOptions([
                    'contain' => ['Workers', 'Users']
                ])
                ->column('Users.client_name', ['label' => 'User Name'])
                ->column('Workers.name', ['label' => 'Worker Name'])
                ->column('Payments.amount', ['label' => 'Amount'])
                ->column('actions', ['label' => 'Actions', 'database' => false]);
    }

    /*
     * User DataTable Ajax Request Trait
     */
    use DataTablesAjaxRequestTrait;

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        if (!in_array($this->Auth->user('role'), [1, 2])) {
            throw new UnauthorizedException(__('You are not alowed to access this page'));
        }

        $this->DataTables->setViewVars('Payments');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        if (!in_array($this->Auth->user('role'), [1, 2])) {
            throw new UnauthorizedException(__('You are not alowed to access this page'));
        }
        $payment = $this->Payments->newEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $workers = $this->Payments->Workers->find('list', ['limit' => 200]);
        $this->set(compact('payment', 'workers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        if (!in_array($this->Auth->user('role'), [1, 2])) {
            throw new UnauthorizedException(__('You are not alowed to access this page'));
        }
        $payment = $this->Payments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $workers = $this->Payments->Workers->find('list', ['limit' => 200]);
        $this->set(compact('payment', 'workers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        if (!in_array($this->Auth->user('role'), [1, 2])) {
            throw new UnauthorizedException(__('You are not alowed to access this page'));
        }
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
