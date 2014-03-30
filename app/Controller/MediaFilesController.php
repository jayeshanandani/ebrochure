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

public function beforeFilter() {
         parent::beforeFilter();
         $this->Auth->allow('add','view','index','edit');

    }
	public function index() {
		$this->MediaFile->recursive = 0;
		$this->set('mediaFiles', $this->Paginator->paginate());
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
            $this->request->data['MediaFile']['size'] = $this->request->data['MediaFile']['filename']['size'];;
            if ($this->MediaFile->save($this->request->data)) {
				$this->Session->setFlash(__('The media file has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The media file could not be saved. Please, try again.'));
			}
		}
		//$users = $this->MediaFile->User->find('list');
		//$this->set(compact('users'));
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
    $params = array(
        'id'        => 'MOV05435.mpg',
        'name'      => 'MOV05435',
        'extension' => 'mpg',
        'autoRender' => false,
        'download'  => false,
        'mimeType'  => array(
            'mpg' => 'video/mpeg'
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
	public function edit($id = null) {
        if (!$this->MediaFile->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
$this->request->data['MediaFile']['id']=$id;
        if ($this->request->is(array('post', 'put'))) {
            if ($this->MediaFile->save($this->request->data,'true',array('id','modifier_id','filename','name','type','size'))) {
                $this->Session->setFlash(__('The task has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The task could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('MediaFile.' . $this->MediaFile->primaryKey => $id));
            $this->request->data = $this->MediaFile->find('first', $options);
        }

    }
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MediaFile->id = $id;
		if (!$this->MediaFile->exists()) {
			throw new NotFoundException(__('Invalid media file'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MediaFile->delete()) {
			$this->Session->setFlash(__('The media file has been deleted.'));
		} else {
			$this->Session->setFlash(__('The media file could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	 public function deactivate($id = null) {
        if ($this->request->is(array('post', 'put'))){
        $this->MediaFile->id = $id;
        if (!$this->MediaFile->exists()) {
            throw new NotFoundException(__('Invalid company test'));
        }
        //$this->request->onlyAllow('post', 'delete');
        $this->request->data['MediaFile']['id']=$id;
        $this->request->data['MediaFile']['isActive']= 1;
        if ($this->MediaFile->save($this->request->data,true,array('id','isActive'))) {
            $this->Session->setFlash(__('The company test has been deactivated.'));
        } else {
            $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    }
    public function activate($id = null) {
if ($this->request->is(array('post', 'put'))){
        $this->MediaFile->id = $id;
        if (!$this->M->exists()) {
            throw new NotFoundException(__('Invalid company test'));
        }
        //$this->request->onlyAllow('post', 'delete');
        $this->request->data['MediaFile']['id']=$id;
        $this->request->data['MediaFile']['isActive']= 0;
        if ($this->MediaFile->save($this->request->data,true,array('id','isActive'))) {
            $this->Session->setFlash(__('The company test has been activated.'));
        } else {
            $this->Session->setFlash(__('The company test could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}

public function viewpdf() {
    $this->autoRender = false; // tell CakePHP that we don't need any view rendering in this case
    $this->response->file('webroot/img/uploads/git_from_bottom_up.pdf');
    $this->response->type('pdf');
}

}
