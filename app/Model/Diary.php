<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 */
class Diary extends AppModel {

	public $validate = array(		
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Your custom message here'
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'text_ori' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		),
		'text_mo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		)		

	);
	/**
 		* interaction rules
 		*/

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		),
		'Language' => array(
			'className' => 'Language',
			'foreignKey' => 'language'
		)
	);

	public $hasMany = array(
		'Correction' => array(
			'className' => 'Correction',
			'foreignKey' => 'diary_id'
		),
		'DiarySentence' => array(
			'className' => 'Diary_sentence',
			'foreignKey' => 'diary_id'
		),
		'Notebook' => array(
			'className' => 'Notebook',
			'foreignKey' => 'diary_id'
		),
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'diary_id'
		)

	);
}
