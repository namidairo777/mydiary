<?php
App::uses('AppModel', 'Model');
/**
 * CorrectionSentence Model
 *
 */
class Notebook extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'id';

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		),
		'Diary' => array(
			'className' => 'Diary',
			'foreignKey' => 'diary_id'
		),
		'Correction' => array(
			'className' => 'Correction',
			'foreignKey' => 'Correction_id'
		),
		'Correction_sentence' => array(
			'className' => 'Correction_sentence',
			'foreignKey' => 'correction_sentence_id'
		)
	);

}
