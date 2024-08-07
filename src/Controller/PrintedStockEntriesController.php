<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PrintedStockEntries Controller
 *
 * @method \App\Model\Entity\PrintedStockEntry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrintedStockEntriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Picks']
        ];
        $printedStockEntries = $this->paginate($this->PrintedStockEntries);

        $this->set(compact('printedStockEntries'));
    }

    /**
     * View method
     *
     * @param string|null $id Printed Stock Entry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $printedStockEntry = $this->PrintedStockEntries->get($id, [
            'contain' => ['Picks'],
        ]);

        $this->set(compact('printedStockEntry'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $printedStockEntry = $this->PrintedStockEntries->newEmptyEntity();
        if ($this->request->is('post')) {
            $printedStockEntry = $this->PrintedStockEntries->patchEntity($printedStockEntry, $this->request->getData());
            if ($this->PrintedStockEntries->save($printedStockEntry)) {
                $this->Flash->success(__('The {0} has been saved.', 'Printed Stock Entry'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Printed Stock Entry'));
        }
        $picks = $this->PrintedStockEntries->Picks->find('list', ['keyValue'=>'name', 'limit' => 200]);

        $this->set(compact('printedStockEntry','picks'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Printed Stock Entry id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $printedStockEntry = $this->PrintedStockEntries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $printedStockEntry = $this->PrintedStockEntries->patchEntity($printedStockEntry, $this->request->getData());
            if ($this->PrintedStockEntries->save($printedStockEntry)) {
                $this->Flash->success(__('The {0} has been saved.', 'Printed Stock Entry'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Printed Stock Entry'));
        }
        $picks = $this->PrintedStockEntries->Picks->find('list', ['keyValue'=>'name', 'limit' => 200]);

        $this->set(compact('printedStockEntry','picks'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Printed Stock Entry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $printedStockEntry = $this->PrintedStockEntries->get($id);
        if ($this->PrintedStockEntries->delete($printedStockEntry)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Printed Stock Entry'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Printed Stock Entry'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
