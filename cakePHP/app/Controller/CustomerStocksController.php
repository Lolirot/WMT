<?php
App::uses('AppController', 'Controller');
/**
 * CustomerStocks Controller
 *
 * @property CustomerStock $CustomerStock
 * @property PaginatorComponent $Paginator
 */
class CustomerStocksController extends AppController {

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
		$this->CustomerStock->recursive = 0;
		$this->set('customerStocks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CustomerStock->exists($id)) {
			throw new NotFoundException(__('Invalid customer stock'));
		}
		$options = array('conditions' => array('CustomerStock.' . $this->CustomerStock->primaryKey => $id));
		$this->set('customerStock', $this->CustomerStock->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CustomerStock->create();
			if ($this->CustomerStock->save($this->request->data)) {
				$this->Session->setFlash(__('The customer stock has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer stock could not be saved. Please, try again.'));
			}
		}
		$customers = $this->CustomerStock->Customer->find('list');
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
		if (!$this->CustomerStock->exists($id)) {
			throw new NotFoundException(__('Invalid customer stock'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CustomerStock->save($this->request->data)) {
				$this->Session->setFlash(__('The customer stock has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer stock could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CustomerStock.' . $this->CustomerStock->primaryKey => $id));
			$this->request->data = $this->CustomerStock->find('first', $options);
		}
		$customers = $this->CustomerStock->Customer->find('list');
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
		$this->CustomerStock->id = $id;
		if (!$this->CustomerStock->exists()) {
			throw new NotFoundException(__('Invalid customer stock'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CustomerStock->delete()) {
			$this->Session->setFlash(__('The customer stock has been deleted.'));
		} else {
			$this->Session->setFlash(__('The customer stock could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
