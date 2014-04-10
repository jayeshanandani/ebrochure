<?php
App::uses('AppController', 'Controller');
/**
* MstBrochures Controller
*
* @property MstBrochure $MstBrochure
* @property PaginatorComponent $Paginator
* @property SessionComponent $Session
*/
class MstBrochuresController extends AppController {

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
        $this->MstBrochure->recursive = 0;
        $this->set('mstBrochures', $this->Paginator->paginate());
    }

    /**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
    public function view($id = null) {
        if (!$this->MstBrochure->exists($id)) {
            throw new NotFoundException(__('Invalid mst brochure'));
        }
        $options = array('conditions' => array('MstBrochure.' . $this->MstBrochure->primaryKey => $id));
        $this->set('mstBrochure', $this->MstBrochure->find('first', $options));
    }

    /**
* add method
*
* @return void
*/
    public function add() {
        if ($this->request->is('post')) {
            $this->MstBrochure->create();
            debug($this->request->data);
            if ($this->MstBrochure->save($this->request->data)) {
                $this->Session->setFlash(__('The mst brochure has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The mst brochure could not be saved. Please, try again.'));
            }
        }
        $institutes = $this->MstBrochure->Institute->find('list');
        $types = $this->MstBrochure->MstBrochureType->find('list');
        $this->set(compact('institutes','types'));
    }

    /**
* edit method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
    public function edit($id = null) {
        if (!$this->MstBrochure->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->data['MstBrochure']['id']=$id;
        if ($this->request->is(array('post', 'put'))) {
            if ($this->MstBrochure->save($this->request->data,'true',array('id','modifier_id','name','description','bgMusic','bgColor'))) {
                $this->Session->setFlash(__('The task has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('MstBrochure.' . $this->MstBrochure->primaryKey => $id));
            $this->request->data = $this->MstBrochure->find('first', $options);
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
            $this->MstBrochure->id = $id;
            if (!$this->MstBrochure->exists()) {
                throw new NotFoundException(__('Invalid company test'));
            }
            //$this->request->onlyAllow('post', 'delete');
            $this->request->data['MstBrochure']['id']=$id;
            $this->request->data['MstBrochure']['isActive']= 0;
            if ($this->MstBrochure->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('The company test has been deactivated.'));
            } else {
                $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }
    public function activate($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            $this->MstBrochure->id = $id;
            if (!$this->MstBrochure->exists()) {
                throw new NotFoundException(__('Invalid company test'));
            }
            $this->request->data['MstBrochure']['id']=$id;
            $this->request->data['MstBrochure']['isActive']= 1;
            if ($this->MstBrochure->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('The company test has been activated.'));
            } else {
                $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }

}
