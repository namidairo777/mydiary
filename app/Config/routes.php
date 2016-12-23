<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
/*
	ALL:
	index: /
	register: /
	login: /

	USER:
	language: /......../zh    =>session
	home: /home/
	profile: /home/profile
	messages: /home/messages
	messenger: /home/messenger/{userid}
	friends: /home/friends
	notebook: /home/notebook
	setting: /home/setting
	logout: /home/logou
	post: /home/post
	correct: /home/correct
	search: /home/search

	OTHER USER:
	index: /{userid}/
	diary: /{userid}/diaries/{diaryid}
	diaryList:  /{userid}/diaries
	friendsList: /{userid}/friends
	notebook: /{userid}/notebook

*/	
	/*Router::connect('/',array('controller'=>'all','action'=>'index'));
 
 	Router::connect('/home/:controller',array('action'=>'index'));

 	Router::connect('/home',array('action'=>'index'));

 	Router::connect('/:controller/:action');

 	Router::connect(
 		'/:userid/:diaryid',
 		array('controller'=>'diaries','action'=>'diary'),
 		array(
 			'pass' => array('userid', 'diaryid'),
 			'diaryid'=>'[0-9]+'			
 			)
 		);

 	Router::connect(
 		'/:userid/:controller',
 		array('action'=>'index'),
 		array(
 			'pass' => array('userid')			
 			)
 		);

 	Router::connect(
 		'/:userid',
 		array('controller'=>'users','action'=>'index'),
 		array(
 			'pass' => array('userid')			
 			)
 		);

 		*/
	Router::connect('/', array('controller'=>'index'));
	Router::connect(
		'/:user_id/diaries/:diary_id',
		array('controller' => 'diaries', 'action' => 'view'),
		array(
			'pass' => array('user_id', 'diary_id'),
			'user_id' => '[0-9]+',
			'diary_id' => '[0-9]+'
			)
		);
    Router::connect(
        '/Diaries/lists/lang::lang',
        array('controller' => 'diaries', 'action' => 'lists'),
        array(
            'pass' => array('lang'),
            'lang' => '[0-9]+'
        )
    );
    Router::connect(
        '/Users/lists/lang::lang',
        array('controller' => 'users', 'action' => 'lists'),
        array(
            'pass' => array('lang'),
            'lang' => '[0-9]+'
        )
    );
    Router::connect(
        '/home/messages/:user_id',
        array('controller' => 'messages', 'action' => 'history'),
        array(
            'pass' => array('user_id'),
            'user_id' => '[0-9]+'
        )
    );
    Router::connect(
        '/home/reminders',
        array('controller' => 'reminders', 'action' => 'lists')
    );
    Router::connect(
        '/:id/diaries',
        array('controller' => 'diaries', 'action' => 'home_lists'),
        array(
            'pass' => array('id'),
            'id' => '[0-9]+'
        )
    );
    Router::connect(
        '/:id/friends',
        array('controller' => 'friends', 'action' => 'lists'),
        array(
            'pass' => array('id'),
            'id' => '[0-9]+'
        )
    );
    Router::connect(
        '/:id/notebooks',
        array('controller' => 'notebooks', 'action' => 'lists'),
        array(
            'pass' => array('id'),
            'id' => '[0-9]+'
        )
    );
	Router::connect(
		'/:id',
		array('controller' => 'users', 'action' => 'home'),
		array(
			'pass' => array('id'),
			'id' => '[0-9]+'
			)
		);
	
	Router::connect(
		'/FriendRequests/create/user_from::user_from/user_to::user_to',
		array('controller' => 'friendRequests', 'action' => 'create'),
		array(
			'pass' => array('user_from', 'user_to'),
			'user_to' => '[0-9]+',
			'user_from' => '[0-9]+'
			)
		);
	Router::connect(
		'/FriendRequests/accept/user_from::user_from/user_to::user_to',
		array('controller' => 'friendRequests', 'action' => 'accept'),
		array(
			'pass' => array('user_from', 'user_to'),
			'user_to' => '[0-9]+',
			'user_from' => '[0-9]+'
			)
		);
	Router::connect('/:controller/:action');


	



/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
