<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 */
class NotificationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($client_id)
    {
        $client = $this->Notifications->Clients->get($client_id);

        $query = $this->Notifications->find()
            ->contain(['Clients'])->where(['client_id'=>$client_id]);

        $notifications = $this->paginate($query);

        $this->set(compact('notifications','client'));
    }

    /**
     * View method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notification = $this->Notifications->get($id, contain: ['Clients', 'Crons']);
        $this->set(compact('notification'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $notification = $this->Notifications->newEmptyEntity();
        if ($this->request->is('post')) {

            $data = $this->request->getData();
            $file = $this->request->getData('file');
            $name = $file->getClientFilename();

            $targetPath = WWW_ROOT. 'notifications'. DS. $name;

            $file->moveTo($targetPath); 
            $data['file'] = $targetPath;

            $notification = $this->Notifications->patchEntity($notification, $data);
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));

                return $this->redirect(['controller'=>'clients','action' => 'index']);
            }
            $this->Flash->error(__('The notification could not be saved. Please, try again.'));
        }
        $clients = $this->Notifications->Clients->find('list', limit: 200)->all();
        $this->set(compact('notification', 'clients','id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notification = $this->Notifications->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->getData());
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notification could not be saved. Please, try again.'));
        }
        $clients = $this->Notifications->Clients->find('list', limit: 200)->all();
        $this->set(compact('notification', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notification = $this->Notifications->get($id);
        if ($this->Notifications->delete($notification)) {
            $this->Flash->success(__('The notification has been deleted.'));
        } else {
            $this->Flash->error(__('The notification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
