<?php
App::uses('AppModel', 'Model');
/**
 * BrochurePage Model
 *
 */
class BrochurePage extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'isForeGround' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'hasText' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);


public $actsAs = array('WhoDidIt');

public $belongsTo = array(
		'MstBrochure' => array(
			'className' => 'MstBrochure',
			'foreignKey' => 'brochure_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
