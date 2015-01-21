<?php
App::uses('AppController', 'Controller');
/**
 * FinancialAdvisors Controller
 *
 * @property FinancialAdvisor $FinancialAdvisor
 * @property PaginatorComponent $Paginator
 */
class FinancialAdvisorsController extends AppController {

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
		$this->FinancialAdvisor->recursive = 0;
		$this->set('financialAdvisors', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FinancialAdvisor->exists($id)) {
			throw new NotFoundException(__('Invalid financial advisor'));
		}
		$options = array('conditions' => array('FinancialAdvisor.' . $this->FinancialAdvisor->primaryKey => $id));
		$this->set('financialAdvisor', $this->FinancialAdvisor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FinancialAdvisor->create();
			if ($this->FinancialAdvisor->save($this->request->data)) {
				$this->Session->setFlash(__('The financial advisor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The financial advisor could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FinancialAdvisor->exists($id)) {
			throw new NotFoundException(__('Invalid financial advisor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FinancialAdvisor->save($this->request->data)) {
				$this->Session->setFlash(__('The financial advisor has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The financial advisor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FinancialAdvisor.' . $this->FinancialAdvisor->primaryKey => $id));
			$this->request->data = $this->FinancialAdvisor->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FinancialAdvisor->id = $id;
		if (!$this->FinancialAdvisor->exists()) {
			throw new NotFoundException(__('Invalid financial advisor'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FinancialAdvisor->delete()) {
			$this->Session->setFlash(__('The financial advisor has been deleted.'));
		} else {
			$this->Session->setFlash(__('The financial advisor could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
