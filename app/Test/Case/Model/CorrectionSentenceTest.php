<?php
App::uses('CorrectionSentence', 'Model');

/**
 * CorrectionSentence Test Case
 *
 */
class CorrectionSentenceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.correction_sentence'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CorrectionSentence = ClassRegistry::init('CorrectionSentence');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CorrectionSentence);

		parent::tearDown();
	}

}
