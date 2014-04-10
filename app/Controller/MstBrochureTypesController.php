<?php
App::uses('AppController', 'Controller');
/**
* MstBrochureTypes Controller
*
* @property MstBrochureType $MstBrochureType
* @property PaginatorComponent $Paginator
* @property SessionComponent $Session
*/
class MstBrochureTypesController extends AppController {

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
        $this->MstBrochureType->recursive = 0;
        $this->set('mstBrochureTypes', $this->Paginator->paginate());
    }

    /**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
    public function view($id = null) {
        if (!$this->MstBrochureType->exists($id)) {
            throw new NotFoundException(__('Invalid mst brochure type'));
        }
        $options = array('conditions' => array('MstBrochureType.' . $this->MstBrochureType->primaryKey => $id));
        $this->set('mstBrochureType', $this->MstBrochureType->find('first', $options));
    }

    /**
* add method
*
* @return void
*/
    public function add() {
        if ($this->request->is('post')) {
            $this->MstBrochureType->create();
            if ($this->MstBrochureType->save($this->request->data)) {
                $this->Session->setFlash(__('The mst brochure type has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The mst brochure type could not be saved. Please, try again.'));
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
        if (!$this->MstBrochureType->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->data['MstBrochureType']['id']=$id;
        if ($this->request->is(array('post', 'put'))) {
            if ($this->MstBrochureType->save($this->request->data,'true',array('id','modifier_id','name'))) {
                $this->Session->setFlash(__('The task has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('MstBrochureType.' . $this->MstBrochureType->primaryKey => $id));
            $this->request->data = $this->MstBrochureType->find('first', $options);
        }

    }

    /**
* delete method
*
* @throws NotFoundException
* @param string $id
* @return void
*/


    public function deactivate($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            $this->MstBrochureType->id = $id;
            if (!$this->MstBrochureType->exists()) {
                throw new NotFoundException(__('Invalid company test'));
            }
            //$this->request->onlyAllow('post', 'delete');
            $this->request->data['MstBrochureType']['id']=$id;
            $this->request->data['MstBrochureType']['isActive']= 0;
            if ($this->User->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('The company test has been deactivated.'));
            } else {
                $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }
    public function activate($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            $this->MstBrochureType->id = $id;
            if (!$this->MstBrochureType->exists()) {
                throw new NotFoundException(__('Invalid company test'));
            }
            //$this->request->onlyAllow('post', 'delete');
            $this->request->data['MstBrochureType']['id']=$id;
            $this->request->data['MstBrochureType']['isActive']= 1;
            if ($this->MstBrochureType->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('The company test has been activated.'));
            } else {
                $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }

}
