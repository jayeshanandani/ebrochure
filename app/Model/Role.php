<?php
App::uses('AppModel', 'Model');
/**
 * MstRole Model
 *
 */
class Role extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'role';

	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'role_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
		)
	);


}
