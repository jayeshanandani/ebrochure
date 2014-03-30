<?php
/**
 * ForgotPasswordFixture
 *
 */
class ForgotPasswordFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'forgot_password';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'key' => 'index'),
		'timerequested' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'token' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 32, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'duration' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'used' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
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
			'user_id' => '',
			'timerequested' => '2014-03-12 15:41:09',
			'token' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'duration' => '2014-03-12 15:41:09',
			'used' => 1
		),
	);

}
