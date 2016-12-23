<?php
App::uses('AppModel', 'Model');
/**
 * CorrectionSentence Model
 *
 */
class Reminder extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'id';

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_from'
		)
	);

}
