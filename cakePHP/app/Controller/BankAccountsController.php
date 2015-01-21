<?php
App::uses('AppController', 'Controller');
/**
 * BankAccounts Controller
 *
 * @property BankAccount $BankAccount
 * @property PaginatorComponent $Paginator
 */
class BankAccountsController extends AppController {

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
		$this->BankAccount->recursive = 0;
		$this->set('bankAccounts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BankAccount->exists($id)) {
			throw new NotFoundException(__('Invalid bank account'));
		}
		$options = array('conditions' => array('BankAccount.' . $this->BankAccount->primaryKey => $id));
		$this->set('bankAccount', $this->BankAccount->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BankAccount->create();
			if ($this->BankAccount->save($this->request->data)) {
				$this->Session->setFlash(__('The bank account has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bank account could not be saved. Please, try again.'));
			}
		}
		$customers = $this->BankAccount->Customer->find('list');
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
		if (!$this->BankAccount->exists($id)) {
			throw new NotFoundException(__('Invalid bank account'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BankAccount->save($this->request->data)) {
				$this->Session->setFlash(__('The bank account has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bank account could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BankAccount.' . $this->BankAccount->primaryKey => $id));
			$this->request->data = $this->BankAccount->find('first', $options);
		}
		$customers = $this->BankAccount->Customer->find('list');
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
		$this->BankAccount->id = $id;
		if (!$this->BankAccount->exists()) {
			throw new NotFoundException(__('Invalid bank account'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BankAccount->delete()) {
			$this->Session->setFlash(__('The bank account has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bank account could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
