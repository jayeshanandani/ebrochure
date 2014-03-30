<?php
/**
 * MstMediaFixture
 *
 */
class MstMediaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'creator_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modifier_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'key' => 'index'),
		'isActive' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'creator_id' => array('column' => 'creator_id', 'unique' => 0),
			'modifier_id' => array('column' => 'modifier_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '',
			'created' => '2014-03-10 15:07:36',
			'creator_id' => '',
			'modified' => '2014-03-10 15:07:36',
			'modifier_id' => '',
			'isActive' => 1,
			'type' => 'Lorem ipsum dolor sit amet'
		),
	);

}
