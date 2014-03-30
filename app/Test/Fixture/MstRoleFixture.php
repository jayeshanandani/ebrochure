<?php
/**
 * MstRoleFixture
 *
 */
class MstRoleFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'mst_role';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'timecreated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'creator_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'key' => 'index'),
		'timemodified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modifier_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'key' => 'index'),
		'isActive' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'timecreated' => '2014-03-11 12:50:50',
			'creator_id' => '',
			'timemodified' => '2014-03-11 12:50:50',
			'modifier_id' => '',
			'isActive' => 1,
			'name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
