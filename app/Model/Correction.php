<?php
App::uses('AppModel', 'Model');
/**
 * Correction Model
 *
 */
class Correction extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_id';

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		),
		'Diary' => array(
			'className' => 'Diary',
			'foreignKey' => 'diary_id'
		)
	);
	public $hasMany = array(
		'CorrectionSentence' => array(
			'className' => 'CorrectionSentence',
			'foreignKey' => 'correction_id'
		),
		'CommentSentence' => array(
			'className' => 'CommentSentence',
			'foreignKey' => 'correction_id'
		),
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'correction_id'
		)
	);



}
/**/