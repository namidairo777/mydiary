<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ename';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(		
		'email' => array(
			'notEmpty' => array(
				'rule' => array('isUnique'),
				'message' => 'Your custom message here'
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'type' => array(
				'rule' => 'email',
				'message' => 'input your email address'
			)
		),
		'password' => array(
			'alphaNumeric' => array(
                'rule'     => 'alphaNumeric',
                'required' => true,
                'message'  => 'Letters and numbers only'
           	),
            'between' => array(
               	'rule'    => array('between', 8, 20),
               	'message' => 'Between 8 to 20 characters'
            )
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		),
		'pic'=>array(
	      	'rule1' => array(
	         //拡張子の指定
	        	'rule' => array('extension',array('jpg','jpeg','gif','png')),
	        	'message' => '画像ではありません。',
	        	'allowEmpty' => true,
	        )
	      	// 'rule2' => array(
	       //   //画像サイズの制限
	       //  	'rule' => array('fileSize', '<=', '500000'),
	       //   	'message' => '画像サイズは500KB以下でお願いします',
	       //  )
	    ),

	);

	/**
 		* interaction rules
 		*/

	public $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'nationality'
		),
		'Sex' => array(
			'className' => 'Sex',
			'foreignKey' => 'sex'
		),
		'Occupation' => array(
			'className' => 'Occupation',
			'foreignKey' => 'occupation'
		),
		'Native_language' => array(
			'className' => 'Language',
			'foreignKey' => 'native_language'
		),
		'Study_language1' => array(
			'className' => 'Language',
			'foreignKey' => 'study_language1'
		),
		'Study_language2' => array(
			'className' => 'Language',
			'foreignKey' => 'study_language2'
		)

	);

	public $hasMany = array(
		'Friend' => array(
			'className' => 'Friend',
			'foreignKey' => 'user_from'
		)
	
	);

	public function beforeSave($options = array()) {
    	if (isset($this->data[$this->alias]['password'])) {
      	  $passwordHasher = new BlowfishPasswordHasher();
       		$this->data[$this->alias]['password'] = $passwordHasher->hash(
        	    $this->data[$this->alias]['password']
      		);
    	}
    	return true;
	}
}
