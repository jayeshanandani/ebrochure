<?php
App::uses('MediaFile', 'Model');

/**
 * MediaFile Test Case
 *
 */
class MediaFileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.media_file',
		'app.user',
		'app.mst_role',
		'app.user_log'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MediaFile = ClassRegistry::init('MediaFile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MediaFile);

		parent::tearDown();
	}

}
