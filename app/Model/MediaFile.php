<?php
App::uses('AppModel', 'Model');
/**
 * MediaFile Model
 *
 * @property User $User
 */
class MediaFile extends AppModel {

	public $name = 'MediaFile';


    public $validate = array(
        'filename' => array(

            'unique' => array(
                'rule' => array('validateUnique', array('name','page_id')),
                'message' => 'Your input violates a unique key constraint, check your input and try again.',
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            'mimeType' => array(
                'rule' => array('mimeType', array('image/gif','image/png','image/jpg','image/jpeg','application/pdf','audio/mpeg','video/mpeg','video/x-flv')),
                'message' => 'Invalid file, only images allowed',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // custom callback to deal with the file upload
            'processUpload' => array(
                'rule' => 'processUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            ),
        ),

    );
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

    public $actsAs = array('WhoDidIt');

   /**
 * Before Validation
 * @param array $options
 * @return boolean
 */
public function beforeValidate($options = array()) {
    // ignore empty file - causes issues with form validation when file is empty and optional
    if (!empty($this->data[$this->alias]['filename']['error']) && $this->data[$this->alias]['filename']['error']==4 && $this->data[$this->alias]['filename']['size']==0) {
        unset($this->data[$this->alias]['filename']);
    }

    parent::beforeValidate($options);
}



/**
 * Upload Directory relative to WWW_ROOT
 * @param string
 */
public $uploadDir = 'img/uploads';

/**
 * Process the Upload
 * @param array $check
 * @return boolean
 */
public function processUpload($check=array()) {
    // deal with uploaded file
    if (!empty($check['filename']['tmp_name'])) {

        // check file is uploaded
        if (!is_uploaded_file($check['filename']['tmp_name'])) {
            return FALSE;
        }

        // build full filename
        $filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(pathinfo($check['filename']['name'], PATHINFO_FILENAME)).'.'.pathinfo($check['filename']['name'], PATHINFO_EXTENSION);

        // @todo check for duplicate filename

        // try moving file
        if (!move_uploaded_file($check['filename']['tmp_name'], $filename)) {
            return FALSE;

        // file successfully uploaded
        } else {
            // save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
            $this->data[$this->alias]['filepath'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename) );
        }
    }

    return TRUE;
}

/**
 * Before Save Callback
 * @param array $options
 * @return boolean
 */
public function beforeSave($options = array()) {
    // a file has been uploaded so grab the filepath
    if (!empty($this->data[$this->alias]['filepath'])) {
        $this->data[$this->alias]['path'] = $this->data[$this->alias]['filepath'];
        $name = $this->data[$this->alias]['name'];
        $extension =  $this->data[$this->alias]['type'];
        $this->data[$this->alias]['filename'] = $name.'.'.$extension;

    }

    return parent::beforeSave($options);
}

public $belongsTo = array(
        'BrochurePage' => array(
            'className' => 'BrochurePage',
            'foreignKey' => 'page_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

}
