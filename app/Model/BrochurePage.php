<?php
App::uses('AppModel', 'Model');
/**
 * BrochurePage Model
 *
 */
class BrochurePage extends AppModel {

public $displayField = 'pageIndex';
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
public $hasMany =  array(
		'PageText' => array(
			'className' => 'PageText',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'MediaFile' => array(
			'className' => 'MediaFile',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),


	);

public function getListByBrochure($cid = null) {
		if (empty($cid)) {
			return array();
		}
		return $this->find('list', array(
			'conditions' => array($this->alias . '.brochure_id' => $cid),
			//'order' => array($this->alias.'.name'=>'ASC')
		));
	}
}
