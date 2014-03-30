<?php
App::uses('Institute', 'Model');

/**
 * Institute Test Case
 *
 */
class InstituteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.institute'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Institute = ClassRegistry::init('Institute');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Institute);

		parent::tearDown();
	}

}
