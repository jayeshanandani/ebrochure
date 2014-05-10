<?php
App::uses('AppModel', 'Model');
/**
 * MstBrochure Model
 *
 * @property Institute $Institute
 */
class MstBrochure extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
        'required' => array(
            'rule' => array('notEmpty'),
            'message' => 'You must enter a name'
        ),
        'unique' => array(
            'rule'    => 'isUnique',
            'message' => 'This name has already been taken.'
        ),
    ),
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),

			),
		),
		'bgColor' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),

			),
		),
	);



/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Institute' => array(
			'className' => 'Institute',
			'foreignKey' => 'institute_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MstBrochureType' => array(
			'className' => 'MstBrochureType',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

	public $hasMany = array(
		'BrochurePage' => array(
			'className' => 'BrochurePage',
			'foreignKey' => 'brochure_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
