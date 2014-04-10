<?php
App::uses('AppModel', 'Model');
/**
 * MstBrochureType Model
 *
 */
class MstBrochureType extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	public $actsAs = array('WhoDidIt');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
}
