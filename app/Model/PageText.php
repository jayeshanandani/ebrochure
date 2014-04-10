<?php
App::uses('AppModel', 'Model');
/**
 * PageText Model
 *
 */
class PageText extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'page_text';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'textContent' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'txtColor' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
