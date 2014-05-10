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
                $this->Session->setFlash(__('The institute name has been edited.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The institute name could not be edited. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Institute.' . $this->Institute->primaryKey => $id));
            $this->request->data = $this->Institute->find('first', $options);
        }

    }

    public function deactivate($id = null) {
        if ($this->request->is(array('post','put'))) {
            $this->Institute->id = $id;
            if (!$this->Institute->exists()) {
                throw new NotFoundException(__('Invalid task'));
            }
            $this->request->data['Institute']['id']       = $id;
            $this->request->data['Institute']['isActive'] = 0;
            if ($this->Institute->save($this->request->data, true, array('id','isActive'))) {
                $this->Session->setFlash('Institute has been deactivated.');
            } else {
                $this->Session->setFlash('Institute could not be deactivated. Please, try again.');
            }
            return $this->redirect(array(
                'action' => 'index'
            ));
        }
    }
    public function activate($id = null) {
        if ($this->request->is(array('post','put'))) {
            $this->Institute->id = $id;
            if (!$this->Institute->exists()) {
                throw new NotFoundException(__('Invalid task'));
            }
            $this->request->data['Institute']['id']       = $id;
            $this->request->data['Institute']['isActive'] = 1;
            if ($this->Institute->save($this->request->data, true, array(
                'id',
                'isActive'
            ))) {
                $this->Session->setFlash('Institute has been activated.');
            } else {
                $this->Session->setFlash('Institute could not be activated. Please, try again.');
            }
            return $this->redirect(array(
                'action' => 'index'
            ));
        }
    }

}
