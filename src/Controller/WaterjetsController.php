<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Waterjets Controller
 *
 * @method \App\Model\Entity\Waterjet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WaterjetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Picks'],
        ];
        $waterjets = $this->paginate($this->Waterjets);

        $this->set(compact('waterjets'));
    }

    /**
     * View method
     *
     * @param string|null $id Waterjet id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $waterjet = $this->Waterjets->get($id, [
            'contain' => ['Picks'],
        ]);

        $this->set(compact('waterjet'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $waterjet = $this->Waterjets->newEmptyEntity();
        if ($this->request->is('post')) {
            $waterjet = $this->Waterjets->patchEntity($waterjet, $this->request->getData());
            if ($this->Waterjets->save($waterjet)) {
                $this->Flash->success(__('The {0} has been saved.', 'Waterjet'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Waterjet'));
        }
        $picks = $this->Waterjets->Picks->find('list', ['keyValue'=>'name', 'limit' => 200]);
        $this->set(compact('waterjet','picks'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Waterjet id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $waterjet = $this->Waterjets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $waterjet = $this->Waterjets->patchEntity($waterjet, $this->request->getData());
            if ($this->Waterjets->save($waterjet)) {
                $this->Flash->success(__('The {0} has been saved.', 'Waterjet'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Waterjet'));
        }
        $picks = $this->Waterjets->Picks->find('list', ['keyValue'=>'name', 'limit' => 200]);
        $this->set(compact('waterjet','picks'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Waterjet id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $waterjet = $this->Waterjets->get($id);
        if ($this->Waterjets->delete($waterjet)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Waterjet'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Waterjet'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
