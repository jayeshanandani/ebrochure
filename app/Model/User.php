<?php
//App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Role $Role
 * @property MediaFile $MediaFile
 * @property UserLog $UserLog
 */
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('MyModel', 'Tools.Model');
class User extends AppModel {


//var $name='User';
public $displayField = 'username';
public $uploadDir = 'uploads';
public $actsAs = array('WhoDidIt');

public $validate = array(

		'username' => array(
        'required' => array(
            'rule' => array('notEmpty'),
            'message' => 'You must enter a username.'
        ),
        'length' => array(
            'rule' => array('between', 3, 15),
            'message' => 'Your username must be between 3 and 15 characters long.'
        ),
        'unique' => array(
            'rule'    => 'isUnique',
            'message' => 'This username has already been taken.'
        ),
    ),

		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter a Password',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'password_retype' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter a Password',
				'allowEmpty' => false,
				'required' => true,
			),
		),
		'firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter your FirstName',
			),
		),

	'role_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please choose one value',
			),
		),

		'lastname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter your MiddleName',
			),
		),

		'email' => array(
			'notEmpty' => array(
					'rule' => 'notEmpty',
					'message' => 'Provide an email address'
			),
			'validEmailRule' => array(
					'rule' => array('email'),
					'message' => 'Invalid email address'
			),
			'isUnique' => array(
					'rule' => 'isUnique',
					'message' => 'Email already registered'
			),
),

'filename' => array(
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Something went wrong with the file upload',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
			'mimeType' => array(
				'rule' => array('mimeType', array('image/gif','image/png','image/jpg','image/jpeg','application/pdf','audio/mpeg','video/mpeg')),
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

		'contact' => array(
			'contact' => array(
				'rule' => array('phone','/^[1-9]{1}[0-9]{9}$/i'),
				'required' => true,
				'allowEmpty' => false,
				'on' => null,
				'last' => true,
				'message' => 'Enter Valid Phone Number'
			),
		),

		'securityque' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'securityans' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Provide a security answer',
			),
		),
		'isActive' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
	);

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


public function beforeFilter() {
         parent::beforeFilter();
        $this->Auth->allow('login','lost_password');
    }


 public function beforeSave($options = array()) {

	if (!empty($this->data[$this->alias]['filepath'])) {
		$this->data[$this->alias]['filename'] = $this->data[$this->alias]['filepath'];
	}
	return parent::beforeSave($options);
}


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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(

		'UserLog' => array(
			'className' => 'UserLog',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''

			)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
