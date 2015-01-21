<?php
App::uses('AppController', 'Controller');
/**
 * TransactionHistories Controller
 *
 * @property TransactionHistory $TransactionHistory
 * @property PaginatorComponent $Paginator
 */
class TransactionHistoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TransactionHistory->recursive = 0;
		$this->set('transactionHistories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransactionHistory->exists($id)) {
			throw new NotFoundException(__('Invalid transaction history'));
		}
		$options = array('conditions' => array('TransactionHistory.' . $this->TransactionHistory->primaryKey => $id));
		$this->set('transactionHistory', $this->TransactionHistory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransactionHistory->create();
			if ($this->TransactionHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction history could not be saved. Please, try again.'));
			}
		}
		$customers = $this->TransactionHistory->Customer->find('list');
		$this->set(compact('customers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TransactionHistory->exists($id)) {
			throw new NotFoundException(__('Invalid transaction history'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TransactionHistory->save($this->request->data)) {
				$this->Session->setFlash(__('The transaction history has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transaction history could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TransactionHistory.' . $this->TransactionHistory->primaryKey => $id));
			$this->request->data = $this->TransactionHistory->find('first', $options);
		}
		$customers = $this->TransactionHistory->Customer->find('list');
		$this->set(compact('customers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TransactionHistory->id = $id;
		if (!$this->TransactionHistory->exists()) {
			throw new NotFoundException(__('Invalid transaction history'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TransactionHistory->delete()) {
			$this->Session->setFlash(__('The transaction history has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transaction history could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
