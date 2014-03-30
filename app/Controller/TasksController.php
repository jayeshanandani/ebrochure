<?php
App::uses('AppController', 'Controller');
/**
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TasksController extends AppController {

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
		$this->Task->recursive = 0;
		$this->set('tasks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
		$this->set('task', $this->Task->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Task->create();
			if ($this->Task->save($this->request->data)) {
				$this->Session->setFlash(__('The task has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.'));
			}
		}
		$institutes = $this->Task->Institute->find('list');
		$this->set(compact('institutes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
$this->request->data['Task']['id']=$id;
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Task->save($this->request->data,'true',array('id','modifier_id','task','title'))) {
                $this->Session->setFlash(__('The task has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
            $this->request->data = $this->Task->find('first', $options);
        }
        $institutes = $this->Task->Institute->find('list');
        $this->set(compact('institutes'));
    }


/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('Invalid task'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Task->delete()) {
			$this->Session->setFlash(__('The task has been deleted.'));
		} else {
			$this->Session->setFlash(__('The task could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function deactivate($id = null) {
        if ($this->request->is(array('post', 'put'))){
        $this->Task->id = $id;
        if (!$this->Task->exists()) {
            throw new NotFoundException(__('Invalid company test'));
        }
        //$this->request->onlyAllow('post', 'delete');
        $this->request->data['Task']['id']=$id;
        $this->request->data['Task']['isActive']= 0;
        if ($this->Task->save($this->request->data,true,array('id','isActive'))) {
            $this->Session->setFlash(__('The company test has been deactivated.'));
        } else {
            $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    }
    public function activate($id = null) {
if ($this->request->is(array('post', 'put'))){
        $this->Task->id = $id;
        if (!$this->Task->exists()) {
            throw new NotFoundException(__('Invalid company test'));
        }
        //$this->request->onlyAllow('post', 'delete');
        $this->request->data['Task']['id']=$id;
        $this->request->data['Task']['isActive']= 1;
        if ($this->Task->save($this->request->data,true,array('id','isActive'))) {
            $this->Session->setFlash(__('The company test has been activated.'));
        } else {
            $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}





}
