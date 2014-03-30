<?php
App::uses('MstRole', 'Model');

/**
 * MstRole Test Case
 *
 */
class MstRoleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mst_role'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MstRole = ClassRegistry::init('MstRole');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MstRole);

		parent::tearDown();
	}

}
