<?php
App::uses('AppModel', 'Model');
/**
 * CorrectionSentence Model
 *
 */
class Friend extends AppModel {

/**
 * Display field
 *
 * @var string
 */

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_to'
		)
	);

}
