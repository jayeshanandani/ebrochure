<?php
App::uses('AppModel', 'Model');
/**
 * Task Model
 *
 * @property Institute $Institute
 */
class Task extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please Enter the Title of task',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $actsAs = array('WhoDidIt');

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
		)
	);
}
