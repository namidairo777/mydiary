<?php
App::uses('AppModel', 'Model');
/**
 * CorrectionSentence Model
 *
 */
class DiarySentence extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

	public $belongsTo = array(
		'Diary' => array(
			'className' => 'Diary',
			'foreignKey' => 'diary_id'
		)
	);

}
