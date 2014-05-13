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
        if(AuthComponent::user('role_id')==3){

            $this->PageText->recursive = 0;
            $this->set('pageTexts', $this->Paginator->paginate());
        } else {
             $this->paginate        = array(
                'conditions' => array(
                'PageText.creator_id' => AuthComponent::user('id')
            )
        );
            $this->PageText->recursive = 0;
            $this->set('pageTexts', $this->Paginator->paginate());
        }
        
    }

    /**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
    public function view($id = null) {
        $options = array('conditions' => array('PageText.page_id'=> $id));
        $data = $this->PageText->find('first', $options);
        if($data) {
     	   $this->set('pageText', $data);
     
    	} else {
    		return $this->redirect(['controller'=>'mst_brochures','action'=>'index']);
    	}
    }

    /**
* add method
*
* @return void
*/
    public function add() {
        if ($this->request->is('post') && $this->request->data['PageText']['page_id']!=0) {
            $this->PageText->create();
            if ($this->PageText->save($this->request->data)) {
                $this->Session->setFlash(__('The page text has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The page text could not be saved. Please, try again.'));
            }
        }
        unset($this->request->data['PageText']['brochure_id']);
        if(Auth::user('Role.role')=='superadmin'){
       $brochures = $this->PageText->BrochurePage->MstBrochure->find('list',array('conditions'=>['MstBrochure.isActive'=>1]));
    }else {
          $brochures = $this->PageText->BrochurePage->MstBrochure->find('list',array('conditions'=>['MstBrochure.isActive'=>1,'MstBrochure.creator_id'=>$this->Auth->user('id')]));
    }
        $pages = array();
        $this->set(compact('pages','brochures'));
    }

    /**
* edit method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
        public function edit($id = null)
    {
        if (!$this->PageText->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->data['PageText']['id'] = $id;
        if ($this->request->is(array('post','put'))) {
            if ($this->PageText->save($this->request->data, 'true', array(
                'id',
                'modifier_id',
                'textContent',
                'xPos',
                'yPos',
                'txtWidth',
                'txtHeight',
                'txtFontsize',
                'txtColor',
                            
            ))) {
                $this->Session->setFlash('The task has been saved.');
                return $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash('The task could not be saved. Please, try again.');
            }
        } else {
            $options             = array(
                'conditions' => array(
                    'PageText.' . $this->PageText->primaryKey => $id
                )
            );
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
