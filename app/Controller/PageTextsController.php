<?php
App::uses('AppController', 'Controller');
/**
* PageTexts Controller
*
* @property PageText $PageText
* @property PaginatorComponent $Paginator
* @property SessionComponent $Session
*/
class PageTextsController extends AppController {

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
        $this->PageText->recursive = 0;
        $this->set('pageTexts', $this->Paginator->paginate());
    }

    /**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
    public function view($id = null) {
        if (!$this->PageText->exists($id)) {
            throw new NotFoundException(__('Invalid page text'));
        }
        $options = array('conditions' => array('PageText.' . $this->PageText->primaryKey => $id));
        $this->set('pageText', $this->PageText->find('first', $options));
    }

    /**
* add method
*
* @return void
*/
    public function add() {
        if ($this->request->is('post')) {
            $this->PageText->create();
            if ($this->PageText->save($this->request->data)) {
                $this->Session->setFlash(__('The page text has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The page text could not be saved. Please, try again.'));
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
        if (!$this->PageText->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->data['PageText']['id']=$id;
        if ($this->request->is(array('post', 'put'))) {
            if ($this->PageText->save($this->request->data,'true',array('id','modifier_id','txtContent','xPos','yPos',''))) {
                $this->Session->setFlash(__('The task has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('PageText.' . $this->PageText->primaryKey => $id));
            $this->request->data = $this->PageText->find('first', $options);
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
            $this->PageText->id = $id;
            if (!$this->PageText->exists()) {
                throw new NotFoundException(__('Invalid company test'));
            }
            //$this->request->onlyAllow('post', 'delete');
            $this->request->data['PageText']['id']=$id;
            $this->request->data['PageText']['isActive']= 0;
            if ($this->PageText->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('The company test has been deactivated.'));
            } else {
                $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }
    public function activate($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            $this->PageText->id = $id;
            if (!$this->PageText->exists()) {
                throw new NotFoundException(__('Invalid company test'));
            }
            //$this->request->onlyAllow('post', 'delete');
            $this->request->data['PageText']['id']=$id;
            $this->request->data['PageText']['isActive']= 1;
            if ($this->PageText->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('The company test has been activated.'));
            } else {
                $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }

}
