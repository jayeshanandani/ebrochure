<?php
App::uses('GnuBrochureAppController', 'GnuBrochure.Controller');
/**
 * MstMedia Controller
 *
 * @property MstMedia $MstMedia
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MstMediaController extends GnuBrochureAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MstMedia->recursive = 0;
		$this->set('mstMedia', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MstMedia->exists($id)) {
			throw new NotFoundException(__('Invalid mst media'));
		}
		$options = array('conditions' => array('MstMedia.' . $this->MstMedia->primaryKey => $id));
		$this->set('mstMedia', $this->MstMedia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MstMedia->create();
			if ($this->MstMedia->save($this->request->data)) {
				$this->Session->setFlash(__('The mst media has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mst media could not be saved. Please, try again.'));
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
		if (!$this->MstMedia->exists($id)) {
			throw new NotFoundException(__('Invalid mst media'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MstMedia->save($this->request->data)) {
				$this->Session->setFlash(__('The mst media has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mst media could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MstMedia.' . $this->MstMedia->primaryKey => $id));
			$this->request->data = $this->MstMedia->find('first', $options);
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
		$this->MstMedia->id = $id;
		if (!$this->MstMedia->exists()) {
			throw new NotFoundException(__('Invalid mst media'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MstMedia->delete()) {
			$this->Session->setFlash(__('The mst media has been deleted.'));
		} else {
			$this->Session->setFlash(__('The mst media could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
