<?php
App::uses('AppController', 'Controller');
/**
* BrochurePages Controller
*
* @property BrochurePage $BrochurePage
* @property PaginatorComponent $Paginator
* @property SessionComponent $Session
*/
class BrochurePagesController extends AppController {

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
        $this->BrochurePage->recursive = 0;
        $this->set('brochurePages', $this->Paginator->paginate());
    }

    /**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
    public function view($id = null) {
        if (!$this->BrochurePage->exists($id)) {
            throw new NotFoundException(__('Invalid brochure page'));
        }
        $options = array('conditions' => array('BrochurePage.' . $this->BrochurePage->primaryKey => $id));
        $this->set('brochurePage', $this->BrochurePage->find('first', $options));
    }

    /**
* add method
*
* @return void
*/
    public function add() {
        if ($this->request->is('post')) {
            $this->BrochurePage->create();
            if ($this->BrochurePage->save($this->request->data)) {
                $this->Session->setFlash(__('The brochure page has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The brochure page could not be saved. Please, try again.'));
            }
        }
        $brochures = $this->BrochurePage->MstBrochure->find('list');
        $this->set(compact('brochures'));
    }

    /**
* edit method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
    public function edit($id = null) {
        if (!$this->BrochurePage->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->data['BrochurePage']['id']=$id;
        if ($this->request->is(array('post', 'put'))) {
            if ($this->BrochurePage->save($this->request->data,'true',array('id','modifier_id','username','pwd','pwd_repeat','firstname','middlename','lastname','email','filename','contact','securityque','securityans'))) {
                $this->Session->setFlash(__('The task has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('BrochurePage.' . $this->BrochurePage->primaryKey => $id));
            $this->request->data = $this->BrochurePage->find('first', $options);
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
            $this->BrochurePage->id = $id;
            if (!$this->BrochurePage->exists()) {
                throw new NotFoundException(__('Invalid company test'));
            }
            //$this->request->onlyAllow('post', 'delete');
            $this->request->data['BrochurePage']['id']=$id;
            $this->request->data['BrochurePage']['isActive']= 0;
            if ($this->BrochurePage->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('The company test has been deactivated.'));
            } else {
                $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }
    public function activate($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            $this->BrochurePage->id = $id;
            if (!$this->BrochurePage->exists()) {
                throw new NotFoundException(__('Invalid company test'));
            }
            //$this->request->onlyAllow('post', 'delete');
            $this->request->data['BrochurePage']['id']=$id;
            $this->request->data['BrochurePage']['isActive']= 1;
            if ($this->BrochurePage->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('The company test has been activated.'));
            } else {
                $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }
}
