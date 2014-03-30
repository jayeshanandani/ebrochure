<?php
App::uses('ChangePassword', 'Model');

/**
 * ChangePassword Test Case
 *
 */
class ChangePasswordTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.change_password',
		'app.user',
		'app.mst_role',
		'app.media_file',
		'app.user_log'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChangePassword = ClassRegistry::init('ChangePassword');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChangePassword);

		parent::tearDown();
	}

}
