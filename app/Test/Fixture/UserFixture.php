<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'mail' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => 'Beginer', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'nationality' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sex' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'occupation' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'native_language' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'study_language1' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'study_language2' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'introduction' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'diaries_written' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'correction_made' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'correction_recieved' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'pic_300' => array('type' => 'string', 'null' => true, 'default' => '/imgs/defaultIcon300.png', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pic_30' => array('type' => 'string', 'null' => true, 'default' => '/imgs/defaultIcon30.png', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pic_50' => array('type' => 'string', 'null' => true, 'default' => '/imgs/defaultIcon50.png', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'mail' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'nationality' => '',
			'sex' => 1,
			'occupation' => 1,
			'native_language' => 1,
			'study_language1' => 1,
			'study_language2' => 1,
			'introduction' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'diaries_written' => 1,
			'correction_made' => 1,
			'correction_recieved' => 1,
			'pic_300' => 'Lorem ipsum dolor sit amet',
			'pic_30' => 'Lorem ipsum dolor sit amet',
			'pic_50' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-05-12 05:21:43',
			'modified' => '2015-05-12 05:21:43'
		),
	);

}
