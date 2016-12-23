<?php
App::uses('Correction', 'Model');

/**
 * Correction Test Case
 *
 */
class CorrectionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.correction'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Correction = ClassRegistry::init('Correction');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Correction);

		parent::tearDown();
	}

}
