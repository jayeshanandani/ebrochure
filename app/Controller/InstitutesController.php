<?php
App::uses('AppController', 'Controller');
/**
* Institutes Controller
*
* @property Institute $Institute
* @property PaginatorComponent $Paginator
* @property SessionComponent $Session
*/
class InstitutesController extends AppController {

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
        $this->Institute->recursive = 0;
        $this->set('institutes', $this->Paginator->paginate());
    }

    /**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
    public function view($id = null) {
        if (!$this->Institute->exists($id)) {
            throw new NotFoundException(__('Invalid institute'));
        }
        $options = array('conditions' => array('Institute.' . $this->Institute->primaryKey => $id));
        $this->set('institute', $this->Institute->find('first', $options));
    }

    /**
* add method
*
* @return void
*/
    public function add() {
        if ($this->request->is('post')) {
            $this->Institute->create();
            if ($this->Institute->save($this->request->data)) {
                $this->Session->setFlash(__('The institute has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The institute could not be saved. Please, try again.'));
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
        if (!$this->Institute->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->data['Institute']['id']=$id;
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Institute->save($this->request->data,'true',array('id','modifier_id','name'))) {
                $this->Session->setFlash(__('The task has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Institute.' . $this->Institute->primaryKey => $id));
            $this->request->data = $this->Institute->find('first', $options);
        }

    }

}
