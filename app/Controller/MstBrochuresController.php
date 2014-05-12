<?php
App::uses('AppController', 'Controller');
App::uses('Xml', 'Utility');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
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
    	if(AuthComponent::user('role_id')==3){

            $this->MstBrochure->recursive = 0;
        	$this->set('mstBrochures', $this->Paginator->paginate());
        } else {
             $this->paginate        = array('contain'=>['MstBrochureType','Institute'],
                'conditions' => array(
                'MstBrochure.creator_id' => AuthComponent::user('id')
            )
        );
             $this->MstBrochure->recursive = 0;
        	 $this->set('mstBrochures', $this->Paginator->paginate());
        }
       

$data = $this->MstBrochure->find('all', [
    'contain' => [
        'BrochurePage' => [
            'fields'=>['id','pageIndex','isForeGround','hasText'],
            'PageText' => [
                'fields' => array('id','textContent','xPos','yPos','txtWidth','txtHeight','txtFontSize','txtColor'),
                ],
            'MediaFile' => [
                'fields' => ['id','filename','name','type']
                ],
            ],
        ],'conditions'=>['MstBrochure.id'=>1],'fields'=>['id','name','description','bgMusic','bgColor']
    ]
);

$newdata=[];
$newdata = $data[0];
$a=[];
$b=[];
$c=[];
$a['MstBrochure']=$newdata['MstBrochure'];
$b=$newdata['BrochurePage'];
$a['MstBrochure']['BrochurePage']=$b;
$e=[];


foreach($a as $key => $value) {
    foreach($value as $key1 => $value2) {
        $counter=0;
        if ($key1=='BrochurePage') {
            foreach($value2 as $key3 => $value3) {
                foreach($value3 as $key4 => $value4) {
                            $p=0;
                    if ($key4=='PageText' || $key4=='MediaFile') {
                        $c=0;
                        foreach($value4 as $key5 => $value5) {
                            foreach($value5 as $key6 => $value6) {
                                $e['MstBrochure'][$key1][$counter][$key4][$c]['@'.$key6]=$value6;
                            }
                        }
                        $c=$c+1;
                        $p=1;
                    }
                    if ($p==0) {
                        $e['MstBrochure'][$key1][$counter]['@'.$key4]=$value4;
                    }
                }
                $counter=$counter+1;
            }
            break;
        }
        $e['MstBrochure']['@'.$key1] = $value2;
    }

}
//$b=$this->MstBrochure->foo($a);
//debug($b);
$xmlObject = Xml::fromArray($e);
$xmlString = $xmlObject->asXML();
$this->set('xmlString',$xmlString);

}

public function foo($array) {
        $result = array();
        foreach ($array as $key => $value) {
                if (is_string($key) && !in_array($key, array('BrochurePage', 'PageText', 'MediaFile'))) {
                        $result['@'.$key] = is_array($value) ? foo($value) : $value;
                } else {
                        $result[$key] = is_array($value) ? foo($value) : $value;
                }
        }
        return $result;
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
            if ($this->MstBrochure->save($this->request->data)) {
                $this->Session->setFlash(__('The new task has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The new task could not be saved. Please, try again.'));
            }
        }
        $institutes = $this->MstBrochure->Institute->find('list');
        $types = $this->MstBrochure->MstBrochureType->find('list',array('conditions'=>['MstBrochureType.isActive'=>0]));
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
                $this->Session->setFlash(__('The selected task has been edited.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The selected task could not be edited. Please, try again.'));
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
                throw new NotFoundException(__('Invalid task'));
            }
            //$this->request->onlyAllow('post', 'delete');
            $this->request->data['MstBrochure']['id']=$id;
            $this->request->data['MstBrochure']['isActive']= 0;
            if ($this->MstBrochure->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('It has been deactivated.'));
            } else {
                $this->Session->setFlash(__('It could not be deactivated. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }
    public function activate($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            $this->MstBrochure->id = $id;
            if (!$this->MstBrochure->exists()) {
                throw new NotFoundException(__('Invalid task'));
            }
            $this->request->data['MstBrochure']['id']=$id;
            $this->request->data['MstBrochure']['isActive']= 1;
            if ($this->MstBrochure->save($this->request->data,true,array('id','isActive'))) {
                $this->Session->setFlash(__('It has been activated.'));
            } else {
                $this->Session->setFlash(__('It could not be deactivated. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function a() {

   $data = $this->MstBrochure->find('all', [
    'contain' => [
        'BrochurePage' => [
            'fields'=>['id','pageIndex','isForeGround','hasText'],
            'PageText' => [
                'fields' => array('id','textContent','xPos','yPos','txtWidth','txtHeight','txtFontSize','txtColor'),
                ],
            'MediaFile' => [
                'fields' => ['id','filename','name','type']
                ],
            ],
        ],'conditions'=>['MstBrochure.id'=>1],'fields'=>['id','name','description','bgMusic','bgColor']
    ]
);
$brochurename = $data[0]['MstBrochure']['name'];
$newdata=[];
$newdata = $data[0];
$a=[];
$b=[];
$c=[];
$a['MstBrochure']=$newdata['MstBrochure'];
$b=$newdata['BrochurePage'];
$a['MstBrochure']['BrochurePage']=$b;
$e=[];


foreach($a as $key => $value) {
    foreach($value as $key1 => $value2) {
        $counter=0;
        if ($key1=='BrochurePage') {
            foreach($value2 as $key3 => $value3) {
                foreach($value3 as $key4 => $value4) {
                            $p=0;
                    if ($key4=='PageText' || $key4=='MediaFile') {
                        $c=0;
                        foreach($value4 as $key5 => $value5) {
                            foreach($value5 as $key6 => $value6) {
                                $e['MstBrochure'][$key1][$counter][$key4][$c]['@'.$key6]=$value6;
                            }
                        }
                        $c=$c+1;
                        $p=1;
                    }
                    if ($p==0) {
                        $e['MstBrochure'][$key1][$counter]['@'.$key4]=$value4;
                    }
                }
                $counter=$counter+1;
            }
            break;
        }
        $e['MstBrochure']['@'.$key1] = $value2;
    }

}


$xmlObject = Xml::fromArray($e);
$xmlString = $xmlObject->asXML();
$this->set('xmlString',$xmlString);

        $this->autoRender = false;
        $dir = new Folder(WWW_ROOT .$brochurename.DS.$brochurename, true,0777);
        $path = $dir->path;
        debug($path);
        $file = new File($path.'/brochure.xml', true, 0777);
        $file->write($xmlString);
        $dir->create($brochurename.DS.$brochurename.DS.'content');
$images = glob('/var/www/ruchika/app/webroot/img/uploads/*');

        $data1 = $this->MstBrochure->find('all', [
    'contain' => [
        'BrochurePage' => [
            'fields'=>['id'],
            'MediaFile' => [
                'fields' => ['id','filename','name','type']
                ],
            ],
        ],'conditions'=>['MstBrochure.id'=>1],'fields'=>['id','name','description','bgMusic','bgColor']
    ]
);

foreach ($images as $key => $value) {
$name = basename($value);
foreach ($data1[0]['BrochurePage'] as $key => $value) {
    foreach ($value as $key1 => $value1) {
        //debug($value);
        if($key1=='MediaFile') {
            foreach ($value1 as $key2 => $value2) {
               foreach ($value2 as $key3 => $value3) {
                   if($key3==='filename') {
                  //  echo getcwd();
                   copy(WWW_ROOT.'img/uploads/'.$value3,WWW_ROOT."/".$brochurename."/".$brochurename."/content/".$value3);
                   }
               }
                
            }
        }
    }
}
}

$this->Zip('/var/www/ruchika/app/webroot/'.$brochurename,'/var/www/'.$brochurename);

    }

        public function Zip($source, $destination) {
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file)
        {
            $file = str_replace('\\', '/', $file);

            // Ignore "." and ".." folders
            if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                continue;

            $file = realpath($file);

            if (is_dir($file) === true)
            {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            }
            else if (is_file($file) === true)
            {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    }
    else if (is_file($source) === true)
    {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}

}
