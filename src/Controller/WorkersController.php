<?php

namespace App\Controller;

use App\Controller\AppController;
use DataTables\Controller\DataTablesAjaxRequestTrait;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Workers Controller
 *
 * @property \App\Model\Table\WorkersTable $Workers
 *
 * @method \App\Model\Entity\Worker[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('DataTables.DataTables');
        $this->DataTables->createConfig('Workers')
                ->databaseColumn('Workers.id')
                ->queryOptions([
                    'contain' => ['Jobs']
                ])
                ->column('Workers.name', ['label' => 'Name'])
                ->column('Workers.phone_number', ['label' => 'Phone Number'])
                ->column('Workers.adhar_card', ['label' => 'Adhar Card'])
                ->column('Workers.bank_name', ['label' => 'Bank Name'])
                ->column('Workers.account_holder_name', ['label' => 'Account Holder Name'])
                ->column('Workers.account_number', ['label' => 'Account Number'])
                ->column('Workers.ifsc_code', ['label' => 'IFSC Code'])
                ->column('Workers.date_of_birth', ['label' => 'Date Of Birth'])
                ->column('Jobs.name', ['label' => 'Name'])
                ->column('Workers.start_date', ['label' => 'Start Date'])
                ->column('Workers.experience', ['label' => 'Experience'])
                ->column('Workers.address', ['label' => 'Address'])
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
        if ($this->Auth->user('role') != '1') {
            throw new UnauthorizedException(__('You are not alowed to access this page'));
        }

        $this->DataTables->setViewVars('Workers');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        if ($this->Auth->user('role') != '1') {
            throw new UnauthorizedException(__('You are not alowed to access this page'));
        }

        $worker = $this->Workers->newEntity();
        if ($this->request->is('post')) {
            $worker = $this->Workers->patchEntity($worker, $this->request->getData());
            if ($this->Workers->save($worker)) {
                $this->Flash->success(__('The worker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The worker could not be saved. Please, try again.'));
        }
        $jobs = $this->Workers->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('worker', 'jobs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Worker id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        if ($this->Auth->user('role') != '1') {
            throw new UnauthorizedException(__('You are not alowed to access this page'));
        }

        $worker = $this->Workers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $worker = $this->Workers->patchEntity($worker, $this->request->getData());
            if ($this->Workers->save($worker)) {
                $this->Flash->success(__('The worker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The worker could not be saved. Please, try again.'));
        }
        $jobs = $this->Workers->Jobs->find('list', ['limit' => 200]);
        $this->set(compact('worker', 'jobs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Worker id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        if ($this->Auth->user('role') != '1') {
            throw new UnauthorizedException(__('You are not alowed to access this page'));
        }

        $this->request->allowMethod(['post', 'delete']);
        $worker = $this->Workers->get($id);
        if ($this->Workers->delete($worker)) {
            $this->Flash->success(__('The worker has been deleted.'));
        } else {
            $this->Flash->error(__('The worker could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
