<?php

namespace App\Controller;

use App\Controller\AppController;
use DataTables\Controller\DataTablesAjaxRequestTrait;
use Cake\Http\Exception\UnauthorizedException;

/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('DataTables.DataTables');
        $this->DataTables->createConfig('Reports')
                ->databaseColumn('Reports.id')
                ->queryOptions([
                    'contain' => ['Workers', 'Locations', 'Users']
                ])
                ->column('Users.client_name', ['label' => 'User Name'])
                ->column('Workers.name', ['label' => 'Worker Name'])
                ->column('Locations.address', ['label' => 'Location'])
                ->column('Reports.start_time', ['label' => 'Start Time'])
                ->column('Reports.end_time', ['label' => 'End Time'])
                ->column('Reports.notes', ['label' => 'Notes'])
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

        $this->DataTables->setViewVars('Reports');
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
        $report = $this->Reports->newEntity();
        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $workers = $this->Reports->Workers->find('list', ['limit' => 200]);
        $locations = $this->Reports->Locations->find('list', ['limit' => 200]);
        $this->set(compact('report', 'workers', 'locations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        if (!in_array($this->Auth->user('role'), [1, 2])) {
            throw new UnauthorizedException(__('You are not alowed to access this page'));
        }
        $report = $this->Reports->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $workers = $this->Reports->Workers->find('list', ['limit' => 200]);
        $locations = $this->Reports->Locations->find('list', ['limit' => 200]);
        $this->set(compact('report', 'workers', 'locations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        if (!in_array($this->Auth->user('role'), [1, 2])) {
            throw new UnauthorizedException(__('You are not alowed to access this page'));
        }
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);
        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('The report has been deleted.'));
        } else {
            $this->Flash->error(__('The report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
