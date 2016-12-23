<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register','logout','login');
        $this->layout = 'main_template';
    }

/**
 * Components
 *
 * @var array
 */

	//public $helpers = array('Auth');

	public $components = array('Paginator', 'Session');

	public $uses = array('Diary','User','Friend', 'FriendRequest', 'Reminder');

	public $paginate_diary = array(
        'limit' => 5,
        'order' => array(
            'Diary.created' => 'desc'
        )
    );
    public $paginate_user = array(
        'limit' => 5,
        'order' => array(
            'User.modified' => 'desc'
        )
    );
    public $paginate_reminder = array(
        'limit' => 5,
        'order' => array(
            'Reminder.created' => 'desc'
        )
        
    );

/**
 * index 
 * logined user's index, including: popular diaries, popular users and messages
 *
 * @return void
 */
	public function index() {
		/*$this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());*/
        $this->set('page_name','user_index');
        $this->set('useremail',$this->Auth->user('email'));
        $this->Diary->recursive = 0;
        //$this->Paginator->settings = $this->$paginate_diary;
		$this->set('diaries', $this->Diary->find('all',$this->paginate_diary));		
        $this->User->recursive = 0;
        //$this->Paginator->settings = $this->$paginate_user;
		$this->set('users', $this->User->find('all',$this->paginate_user));
		$this->Reminder->recursive = 1;
        //$this->Paginator->settings = $this->$paginate_user;
        $options = array(
			'recursive' => 1,
			'limit' => 5, 
        	'order' => array('Reminder.created DESC'),
        	'conditions' => array('Reminder.user_id' => $this->Auth->user('id'))
        	);
		$this->set('reminders', $this->Reminder->find('all', $options));
		$this->set('reminders_count', $this->Reminder->find('count', array('conditions' => array('user_id' => $this->Auth->user('id'), 'is_read' => 0))));


    }
/**
 * home
 * user's homepage, including 3 links: diaries, friends and notebooks
 *　@param int $id
 * @return void
 */
    public function home($id){
    	if (!$this->User->exists($id)) {
			$this->Session->setFlash('Invalid user','alert_message');
			return $this->redirect('/users');
		}else{
			$page_user = $this->User->find('first', array(
        'conditions' => array('User.id' => $id)));
			$this->set('page_user',$page_user);
			$this->set('latest_diary', $this->Diary->find('first', 
				array( 
					'conditions' => array('Diary.user_id' => $id), 
					'order' => array(
            			'Diary.created' => 'desc'
            			) 
					)
				)
			);
			$this->set('friend_status', $this->friend_status($this->Auth->user('id'),$id));
		}
    }
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
        $id = $this->Auth->user['id'];
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}


	public function lists($lang = null){
		$paginate = array(
            'limit' => 7,
            'order' => array(
                'User.modified' => 'desc'
            )
        );
		if(isset($this->request->data['k'])){

			$key = $this->request->data['k'];
			$conditions = array(
				'User.name LIKE' => '%'.$key.'%'    			
			);
            $paginate = null;
			$paginate = array(
				'limit' => 7,
        		'order' => array(
            		'User.modified' => 'desc'
        			),
        		'conditions' => $conditions
        		);


		}
        if($lang != null ){
        	//echo 'lang:'.$lang;
            $conditions = array(
                'OR' => array(
        			array('User.native_language ' => $lang),
        			array('User.study_language1' => $lang),
        			array('User.study_language2' => $lang)
    			)
            );
            $paginate = null;
            $paginate = array(
                'limit' => 7,
                'order' => array(
                    'User.modified' => 'desc'
                ),
                'conditions' => $conditions
            );
        }
        $this->User->recursive = 0;
        $this->Paginator->settings = $paginate;
        $this->set('users', $this->Paginator->paginate('User'));
	}

/**
 * register method
 *
 * @return void
 */
	public function register() {
		

		if ($this->request->is('post')) {
			$this->User->create();
			//var_dump($this->request->data);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved.','alert_message');
				return $this->redirect('/index');
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.','alert_message');
                return $this->redirect('/index');
			}
		}
        return $this->redirect(array('action' => 'index'));
	}

/**
 * login method
 *
 * @throws NotFoundException
 */
	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect('/Users');
	        }
	        $this->Session->setFlash('Invalid username or password, try again','alert_message');
            return $this->redirect('/index');
	    }else{
            return $this->redirect('/index');
        }
	}

/**
 * logout method
 *
 * @throws NotFoundException
 */

	public function logout() {
    	return $this->redirect($this->Auth->logout());
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit() {

        $id = $this->Auth->user('id');
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }

		if ($this->request->is(array('post', 'put'))) {
            $this->User->set('id',$id);
            $this->User->set('profile_done', 1);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The changes has been saved.','alert_message');
                $this->Session->write('Auth', $this->User->read(null, $this->Auth->User('id')));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Some error occured, Please try again.','alert_message');
                //debug($this->User->validationErrors);
                return $this->redirect(array('action' => 'edit'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
        $countryOptions = $this->User->Country->find('list',array('fields' => array('Country.id','Country.text')));
        $sexOptions	= $this->User->Sex->find('list',array('fields' => array('Sex.id','Sex.text')));
        $languageOptions = $this->User->Native_language->find('list',array('fields' => array('Native_language.id','Native_language.text')));
        $occupationOptions	= $this->User->Occupation->find('list',array('fields' => array('Occupation.id','Occupation.text')));
        $this->set('countryOptions',$countryOptions);
        $this->set('sexOptions',$sexOptions);
        $this->set('languageOptions',$languageOptions);
        $this->set('occupationOptions',$occupationOptions);
        //for layout
        $this->set('page_name','user_edit');
        //for breadcrumb
        $this->set('breadcrumb',array('Profile Edit' => '/users/edit'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function test(){
		$this->layout = 'default';
		//$users = $this->User->find('all');

		$this->User->recursive = 0;
        $this->Paginator->settings =$this->paginate_user;
        $users = $this->Paginator->paginate();
		//var_dump($result);
		header('Content-type: text/plain');
		//echo '<pre>'; print_r($result); echo '</pre>';
		echo '<pre>'; print_r($users); echo '</pre>';
	}

	private function friend_status($user_id = null, $page_id = null){
		if($user_id != $page_id){
			$is_friends = $this->Friend->find('list', 
				array(
					'conditions' => array('user_from' => $user_id, 'user_to' => $page_id),
					'fields' => array('Friend.user_from', 'Friend.user_to')
					)
				);

			if(empty($is_friends)){
				$is_requestFrom = $this->FriendRequest->find('list', 
				array(
					'conditions' => array('user_from' => $page_id, 'user_to' => $user_id, 'is_accepted' => '0'),
					'fields' => array('FriendRequest.user_from', 'FriendRequest.user_to')
					)
				);
				if(empty($is_requestFrom)){
					$is_requestTo = $this->FriendRequest->find('list', 
					array(
						'conditions' => array('user_from' => $user_id, 'user_to' => $page_id, 'is_accepted' => '0'),
						'fields' => array('FriendRequest.user_from', 'FriendRequest.user_to')
						)
					);
					if(empty($is_requestTo)){
						return 'notYet';
					}else{
						return 'to';
					}

				}else{
					return 'from';
				}
			}else{
				return 'already';
			}
		}
		else{
			return 'same';
		}

	}

	public function picUpload(){
	  	if ($this->request->is('post') || $this->request->is('put')) {
	   		 //画像の保存
	  		$query = 'UPDATE users set pic = "'.AuthComponent::user('id').$this->request->data['User']['pic']['name'].'" where id = '.AuthComponent::user('id');
	   	 	if(!$this->User->query($query)){
	    	  //画像保存先のパス
	      		$path = IMAGES;
	      		$image = $this->request->data['User']['pic'];
	      		$this->Session->setFlash('Your photo has been uploaded', 'alert_message');
	      		move_uploaded_file($image['tmp_name'], $path . DS . AuthComponent::user('id').$image['name']);
	      		$this->Session->write('Auth', $this->User->read(null, $this->Auth->User('id')));
	      		return $this->redirect($this->referer());
	    	}else{
	      		$this->Session->setFlash('Fail to upload', 'alert_message');
	      		return $this->redirect($this->referer());
	    	}
	  	}
	}

	
}



