<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Crons Controller
 *
 * @property \App\Model\Table\CronsTable $Crons
 */
class CronsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Crons->find()
            ->contain(['Notifications']);
        $crons = $this->paginate($query);

        $this->set(compact('crons'));
    }

    /**
     * View method
     *
     * @param string|null $id Cron id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cron = $this->Crons->get($id, contain: ['Notifications']);
        $this->set(compact('cron'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cron = $this->Crons->newEmptyEntity();
        if ($this->request->is('post')) {
            $cron = $this->Crons->patchEntity($cron, $this->request->getData());
            if ($this->Crons->save($cron)) {
                $this->Flash->success(__('The cron has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cron could not be saved. Please, try again.'));
        }
        $notifications = $this->Crons->Notifications->find('list', limit: 200)->all();
        $this->set(compact('cron', 'notifications'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cron id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cron = $this->Crons->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cron = $this->Crons->patchEntity($cron, $this->request->getData());
            if ($this->Crons->save($cron)) {
                $this->Flash->success(__('The cron has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cron could not be saved. Please, try again.'));
        }
        $notifications = $this->Crons->Notifications->find('list', limit: 200)->all();
        $this->set(compact('cron', 'notifications'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cron id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cron = $this->Crons->get($id);
        if ($this->Crons->delete($cron)) {
            $this->Flash->success(__('The cron has been deleted.'));
        } else {
            $this->Flash->error(__('The cron could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
