<?php
App::uses('AppController', 'Controller');
/**
 * ChangePasswords Controller
 *
 * @property ChangePassword $ChangePassword
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ChangePasswordsController extends AppController {

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
		$this->ChangePassword->recursive = 0;
		$this->set('changePasswords', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ChangePassword->exists($id)) {
			throw new NotFoundException(__('Invalid change password'));
		}
		$options = array('conditions' => array('ChangePassword.' . $this->ChangePassword->primaryKey => $id));
		$this->set('changePassword', $this->ChangePassword->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ChangePassword->create();
			if ($this->ChangePassword->save($this->request->data)) {
				$this->Session->setFlash(__('The change password has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The change password could not be saved. Please, try again.'));
			}
		}
		$users = $this->ChangePassword->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ChangePassword->exists($id)) {
			throw new NotFoundException(__('Invalid change password'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ChangePassword->save($this->request->data)) {
				$this->Session->setFlash(__('The change password has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The change password could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ChangePassword.' . $this->ChangePassword->primaryKey => $id));
			$this->request->data = $this->ChangePassword->find('first', $options);
		}
		$users = $this->ChangePassword->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ChangePassword->id = $id;
		if (!$this->ChangePassword->exists()) {
			throw new NotFoundException(__('Invalid change password'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ChangePassword->delete()) {
			$this->Session->setFlash(__('The change password has been deleted.'));
		} else {
			$this->Session->setFlash(__('The change password could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
