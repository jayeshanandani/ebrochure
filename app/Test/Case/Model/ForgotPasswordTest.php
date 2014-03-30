<?php
App::uses('ForgotPassword', 'Model');

/**
 * ForgotPassword Test Case
 *
 */
class ForgotPasswordTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.forgot_password',
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
		$this->ForgotPassword = ClassRegistry::init('ForgotPassword');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ForgotPassword);

		parent::tearDown();
	}

}
