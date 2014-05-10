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



        $brochure = $this->BrochurePage->find('all');
        $this->set(array(
            'BrochurePage' => $brochure,
            '_serialize' => array('BrochurePage')
            ));
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
            $brochure_id = $this->request->data['BrochurePage']['brochure_id'];
 
$options = [
    'conditions' => array('BrochurePage.brochure_id' => $brochure_id),
    'recursive' => 1, //int
    'fields' => array('BrochurePage.pageIndex'),
    'order' => array('BrochurePage.pageIndex DESC'),
    'limit' => 1, //int
];
 
$data = $this->BrochurePage->find('all',$options);

if($data) {
$this->request->data['BrochurePage']['pageIndex'] =$data[0]['BrochurePage']['pageIndex']+1 ;
}    
            if ($this->BrochurePage->save($this->request->data)) {
                debug($this->request->data);
                $this->Session->setFlash(__('The brochure page has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The brochure page could not be saved. Please, try again.'));
            }
        }
        $brochures = $this->BrochurePage->MstBrochure->find('list',array('conditions'=>['MstBrochure.isActive'=>1]));
        $this->set(compact('brochures'));
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
        if (!$this->BrochurePage->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $this->request->data['BrochurePage']['id'] = $id;
        if ($this->request->is(array('post','put'))) {
            if ($this->BrochurePage->save($this->request->data, 'true', array(
                'id',
                'modifier_id',
                'pageIndex',
                'isForeGround',
                'hasText',
                            
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
                    'BrochurePage.' . $this->BrochurePage->primaryKey => $id
                )
            );
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
                $this->Session->setFlash(__('It has been deactivated.'));
            } else {
                $this->Session->setFlash(__('It could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('controller' => 'mst_brochures','action' => 'index'));
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
                $this->Session->setFlash(__('It has been activated.'));
            } else {
                $this->Session->setFlash(__('It  could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('controller' => 'mst_brochures','action' => 'index'));
        }
    }

    public function list_pages() {
        $this->request->onlyAllow('ajax');
        $id = $this->request->query('id');
        if (!$id) {
          throw new NotFoundException();
        }
	  	$this->disableCache();
		$pages = $this->BrochurePage->getListByBrochure($id);

        $this->set(compact('pages'));
        $this->set('_serialize', array('pages'));
    }
}
