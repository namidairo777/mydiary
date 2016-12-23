<?php
App::uses('AppModel', 'Model');
/**
 * Correction Model
 *
 */
class CommentSentence extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

	public $belongsTo = array(
		'Correction_sentence' => array(
			'className' => 'Correction_sentence',
			'foreignKey' => 'correction_sentence_id'
		),
		'Correction' => array(
			'className' => 'Correction',
			'foreignKey' => 'correction_id'
		)
	);



}
