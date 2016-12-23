<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 */
class Language extends AppModel {



	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'native_language'
		),
		'User' => array(
			'className' => 'Diary_sentence',
			'foreignKey' => 'study_language1'
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'study_language2'
		),
		'Diary' => array(
			'className' => 'Diary',
			'foreignKey' => 'language'
		)
	);
}
