<?php
App::uses('AppModel', 'Model');
/**
 * CorrectionSentence Model
 *
 */
class CorrectionSentence extends AppModel {

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
		)
	);
	public $hasMany = array(
		'Comment_sentence' => array(
			'className' => 'Comment_sentence',
			'foreignKey' => 'correction_sentence_id'
		),
		'Notebook' => array(
			'className' => 'Notebook',
			'foreignKey' => 'correction_sentence_id'
		)
	);
	public $hasOne = 'CommentSentence';

}
