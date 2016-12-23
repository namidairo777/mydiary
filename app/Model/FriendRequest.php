<?php
App::uses('AppModel', 'Model');
/**
 * CorrectionSentence Model
 *
 */
class FriendRequest extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

	public $belongsTo = array(
		'User_from' => array(
			'className' => 'User',
			'foreignKey' => 'user_from'
		),
		'User_to' => array(
			'className' => 'User',
			'foreignKey' => 'user_to'
		)
	);

}
