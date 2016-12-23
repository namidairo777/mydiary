<?php
App::uses('AppModel', 'Model');
/**
 * Correction Model
 *
 */
class Comment extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

	public $belongsTo = array(
		'Correction' => array(
			'className' => 'Correction',
			'foreignKey' => 'correction_id'
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		),
		'Diary' => array(
			'className' => 'Diary',
			'foreignKey' => 'Diary_id'
		)
	);
}
