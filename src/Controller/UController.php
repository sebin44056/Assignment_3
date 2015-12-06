<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * U Controller
 *
 * @property \App\Model\Table\UTable $U
 */
class UController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('u', $this->paginate($this->U));
        $this->set('_serialize', ['u']);
    }

    /**
     * View method
     *
     * @param string|null $id U id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $u = $this->U->get($id, [
            'contain' => []
        ]);
        $this->set('u', $u);
        $this->set('_serialize', ['u']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $u = $this->U->newEntity();
        if ($this->request->is('post')) {
            $u = $this->U->patchEntity($u, $this->request->data);
            if ($this->U->save($u)) {
                $this->Flash->success(__('The u has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The u could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('u'));
        $this->set('_serialize', ['u']);
    }

    /**
     * Edit method
     *
     * @param string|null $id U id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $u = $this->U->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $u = $this->U->patchEntity($u, $this->request->data);
            if ($this->U->save($u)) {
                $this->Flash->success(__('The u has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The u could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('u'));
        $this->set('_serialize', ['u']);
    }

    /**
     * Delete method
     *
     * @param string|null $id U id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $u = $this->U->get($id);
        if ($this->U->delete($u)) {
            $this->Flash->success(__('The u has been deleted.'));
        } else {
            $this->Flash->error(__('The u could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
