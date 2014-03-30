<?php
App::uses('MstMedia', 'GnuBrochure.Model');

/**
 * MstMedia Test Case
 *
 */
class MstMediaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.gnu_brochure.mst_media'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MstMedia = ClassRegistry::init('GnuBrochure.MstMedia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MstMedia);

		parent::tearDown();
	}

}
