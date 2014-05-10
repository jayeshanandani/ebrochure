<?php
App::uses('AppModel', 'Model');
/**
 * PageText Model
 *
 */
class PageText extends AppModel {


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
				
			),
		),
	'xPos' => array(
			'notEmpty' => array(
				'rule' => 'naturalNumber',
				'message' => 'Enter value greater than 0',
				
			),
		),
'yPos' => array(
			'notEmpty' => array(
				'rule' => 'naturalNumber',
				'message' => 'Enter value greater than 0',
				
			),
		),
'txtWidth' => array(
			'notEmpty' => array(
				'rule' => 'naturalNumber',
				'message' => 'Enter value greater than 0',
				
			),
		),
'txtHeight' => array(
			'notEmpty' => array(
				'rule' => 'naturalNumber',
				'message' => 'Enter value greater than 0',
				
			),
		),
'txtFontsize' => array(
			'notEmpty' => array(
				'rule' => 'naturalNumber',
				'message' => 'Enter value greater than 0',
				
			),
		),
	);
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


