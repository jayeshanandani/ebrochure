<?php
App::uses('AppController', 'Controller');
/**
* MediaFiles Controller
*
* @property MediaFile $MediaFile
* @property PaginatorComponent $Paginator
* @property SessionComponent $Session
*/
class MediaFilesController extends AppController {

    /**
* Components
*
* @var array
*/
    public $components = array('Paginator', 'Session','RequestHandler');

    /**
* index method
*
* @return void
*/

    public function index() {

        if(AuthComponent::user('role_id')==3){

            $this->MediaFile->recursive = 0;
            $this->set('mediaFiles', $this->Paginator->paginate());

        } else {
            
             $this->MediaFile->recursive = 0;
             $this->paginate        = array(
                'conditions' => array(
                'MediaFile.creator_id' => AuthComponent::user('id')
            )
        );
            $this->set('mediaFiles', $this->Paginator->paginate());
            $mediafiles = $this->MediaFile->find('all');
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
        if (!$this->MediaFile->exists($id)) {
            throw new NotFoundException(__('Invalid media file'));
        }
        $options = array('conditions' => array('MediaFile.' . $this->MediaFile->primaryKey => $id));
        $this->set('mediaFile', $this->MediaFile->find('first', $options));


    }

    /**
* add method
*
* @return void
*/
    public function add() {
        if ($this->request->is('post')) {
            $filename = $this->request->data['MediaFile']['filename']['name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $name = pathinfo($filename, PATHINFO_FILENAME);
            $this->request->data['MediaFile']['name'] = $name;
            $this->request->data['MediaFile']['type'] = $extension;
            $this->request->data['MediaFile']['size'] = $this->request->data['MediaFile']['filename']['size'];
            if ($this->MediaFile->save($this->request->data)) {
                $this->Session->setFlash(__('The media file has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The media file could not be saved. Please, try again.'));
            }
        }
        unset($this->request->data['MediaFile']['brochure_id']);
    if(Auth::user('Role.role')=='superadmin'){
        debug(Auth::user('id'));
        $brochures = $this->MediaFile->BrochurePage->MstBrochure->find('list');
    }else {
         $brochures = $this->MediaFile->BrochurePage->MstBrochure->find('list',array('conditions'=>['MstBrochure.isActive'=>1,'MstBrochure.creator_id'=>$this->Auth->user('id')]));
    }
        $mediafiles = array();
        $this->set(compact('mediafiles','brochures'));
    }


    public function sendFile($id) {
        $file = $this->Attachment->getFile($id);
        $this->response->file($file['path']);
        // Return response object to prevent controller from trying to render
        // a view
        return $this->response;
    }



    public function download() {

        $this->viewClass = 'Media';
        // Render app/webroot/files/example.docx
        $params = array('id'        => 'MOV05435.mpg',
        'name'      => 'MOV05435',
        'extension' => 'mpg',
        'autoRender' => false,
        'download'  => false,
        'mimeType'  => array('mpg' => 'video/mpeg'
        ),
        'path'      => 'uploads' . DS
        );
        $this->set($params);
    }
    /**
* edit method
*
* @throws NotFoundException
* @param string $id
* @return void
*/


    public function deactivate($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            $this->MediaFile->id = $id;
            if (!$this->MediaFile->exists()) {
                throw new NotFoundException(__('Invalid task'));
            }
            //$this->request->onlyAllow('post', 'delete');
            $this->request->data['MediaFile']['id']=$id;
            $this->request->data['MediaFile']['isActive']= 0;
            if ($this->MediaFile->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('The media file has been deactivated.'));
            } else {
                $this->Session->setFlash(__('The media file could not be deactivated. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }
    public function activate($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            $this->MediaFile->id = $id;
            if (!$this->MediaFile->exists()) {
                throw new NotFoundException(__('Invalid task'));
            }
            //$this->request->onlyAllow('post', 'delete');
            $this->request->data['MediaFile']['id']=$id;
            $this->request->data['MediaFile']['isActive']= 1;
            if ($this->MediaFile->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('The media file has been activated.'));
            } else {
                $this->Session->setFlash(__('The media file activated. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function viewpdf() {
        $this->autoRender = false;
        // tell CakePHP that we don't need any view rendering in this case
        $this->response->file('webroot/img/uploads/git_from_bottom_up.pdf');
        $this->response->type('pdf');
    }

}
