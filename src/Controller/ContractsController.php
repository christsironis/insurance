<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contracts Controller
 *
 * @property \App\Model\Table\ContractsTable $Contracts
 */
class ContractsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($client_id)
    {
        $client = $this->Contracts->Clients->get($client_id);

        $query = $this->Contracts->find()
            ->contain(['Clients'])->where(['client_id'=>$client_id]);

        $contracts = $this->paginate($query);

        $this->set(compact('contracts','client'));
    }

    /**
     * View method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contract = $this->Contracts->get($id, contain: ['Clients']);
        $this->set(compact('contract'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $contract = $this->Contracts->newEmptyEntity();
        if ($this->request->is('post')) {

            $data = $this->request->getData();
            $file = $this->request->getData('file');
            $name = $file->getClientFilename();

            $targetPath = WWW_ROOT. 'contracts'. DS. $name;

            $file->moveTo($targetPath); 
            $data['file'] = $targetPath;

            $contract = $this->Contracts->patchEntity($contract, $data);
            if ($this->Contracts->save($contract)) {
                $this->Flash->success(__('The contract has been saved.'));

                return $this->redirect(['controller'=>'clients','action' => 'index']);

            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $clients = $this->Contracts->Clients->find('list', limit: 200)->all();
        $this->set(compact('contract', 'clients','id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contract = $this->Contracts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contract = $this->Contracts->patchEntity($contract, $this->request->getData());
            if ($this->Contracts->save($contract)) {
                $this->Flash->success(__('The contract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $clients = $this->Contracts->Clients->find('list', limit: 200)->all();
        $this->set(compact('contract', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contract = $this->Contracts->get($id);
        if ($this->Contracts->delete($contract)) {
            $this->Flash->success(__('The contract has been deleted.'));
        } else {
            $this->Flash->error(__('The contract could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
