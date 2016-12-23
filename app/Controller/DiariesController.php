<?php
App::uses('AppController', 'Controller');
/**
 * Diaries Controller
 *
 * @property Diary $Diary
 * @property PaginatorComponent $Paginator
 */
class DiariesController extends AppController {

	public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'main_template';
    }

/**
 * Components
 *
 * @var array
 */	public $components = array('Paginator', 'Session');

    public $helpers = array('Html', 'Form', 'Js'=>array('Jquery'), 'Session');

	//public $helpers = array('Auth');

	public $uses = array(
		'Diary',
		'User',
        'DiarySentence',
        'Correction',
        'CorrectionSentence',
        'Comment',
        'CommentSentence',
        'Friend',
        'FriendRequest',
        'Message',
        'Reminder'
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Diary->recursive = 0;
		$this->set('diaries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($user_id = null, $diary_id = null) {
		//$this->layout = 'default';
		if (!$this->Diary->exists($diary_id)) {
			throw new NotFoundException(__('Invalid diary'));
		}else{
			$views = $this->Diary->query('select views from diaries where id = '.$diary_id)[0]['diaries']['views'];
			//echo 'views:';	print_r($views);
			$this->Diary->query('update diaries set views = '.(++$views).' where id = '.$diary_id);
			$Diary_user = $this->User->find('first', array(
        'conditions' => array('User.id' => $user_id)));
			$this->set('page_user', $Diary_user);
			$options = array('conditions' => array('Diary.' . $this->Diary->primaryKey => $diary_id));
			$this->set('diary', $this->Diary->find('first', $options));
			$corrections = $this->Correction->find('all', array(
        'conditions' => array('Diary.id' => $diary_id)));
			$this->set('corrections', $corrections);
			$comments = $this->Comment->find('all', array(
        'conditions' => array('Diary.id' => $diary_id)));
			$this->set('comments', $comments);
			$this->set('friend_status', $this->friend_status($this->Auth->user('id'),$user_id));

		}
		
	}

	public function good(){
		//if($this->request->is('get','post')){
			$diary_id = $this->request->query['k'];
			$hearts = $this->Diary->query('select hearts from diaries where id = '.$diary_id)[0]['diaries']['hearts'];
			$this->Diary->query('update diaries set hearts = '.(++$hearts).' where id = '.$diary_id);
			return $this->redirect($this->referer());
		//}
	}

	public function lists($lang = null) {
		//$this->layout = 'default';
        $paginate = array(
            'limit' => 5,
            'order' => array(
                'Diary.created' => 'desc'
            )
        );
		if(isset($this->request->data['k'])){

			$key = $this->request->data['k'];
			$conditions = array(
				'OR' => array(
        			array('User.name LIKE' => '%'.$key.'%'),
        			array('Diary.title LIKE' => '%'.$key.'%'),
    			)
			);
            $paginate = null;
			$paginate = array(
				'limit' => 5,
        		'order' => array(
            		'Diary.created' => 'desc'
        			),
        		'conditions' => $conditions
        		);


		}
        if($lang != null ){
            
            $conditions = array(
                'Diary.language' => intval($lang)
            );
            $paginate = null;
            $paginate = array(
                'limit' => 5,
                'order' => array(
                    'Diary.created' => 'desc'
                ),
                'conditions' => $conditions
            );
        }
        $this->Diary->recursive = 0;
        $this->Paginator->settings = $paginate;
        $this->set('diaries', $this->Paginator->paginate());
		

	}
	

	public function home_lists($id) {
		//$this->layout = 'default';
        $paginate = array(
            'limit' => 5,
            'order' => array(
                'Diary.created' => 'desc'
            ),
            'conditions' => array(
            	'Diary.user_id' => $id
            )
        );
        $options = array('conditions' => array('User.id' => $id));
        $this->set('page_user', $this->User->find('first', $options));
        $this->Diary->recursive = 0;
        $this->Paginator->settings = $paginate;
        $this->set('diaries', $this->Paginator->paginate());
        $this->set('friend_status', $this->friend_status($this->Auth->user('id'), $id));		

	}

/**
 * add method
 *
 * @return void
 */
	public function post() {
		//$this->layout = 'main_template';
		$this->uses=array('User','Diary','DiarySentence');
		if ($this->request->is('post')) {
			$this->Diary->create();
			$this->Diary->set('user_id',$this->Auth->User('id'));

			//$text_ori = str_replace('<br />', PHP_EOL, $this->request->data['Diary']['text_ori']);
			//$this->request->data['Diary']['text_ori'] = $text_ori;
			//echo $text_ori;
			//$text_mo = str_replace('<br />', PHP_EOL, $this->request->data['Diary']['text_mo']);
			//$this->request->data['Diary']['text_mo'] = $text_mo; 
			//echo $text_mo;
			if ($this->Diary->save($this->request->data)) {
				$newDiary = $this->Diary->find(
					'first', 
					array(
      					'order' => array('Diary.created' => 'desc'),
      					'fields' => array('Diary.id' , 'Diary.title','Diary.text_ori')
      				 )
   				);

   				$diaryId = $newDiary['Diary']['id'];
   				$diaryTitle = $newDiary['Diary']['title'];
   				$text = $newDiary['Diary']['text_ori'];
   				$textArray =array_merge(array($diaryTitle),explode(PHP_EOL,$text));
   				$i = 0;
   				foreach ($textArray as $key => $item) {
   					$this->DiarySentence->create();
   					$this->DiarySentence->set('diary_id',$diaryId);
   					$this->DiarySentence->set('sentence_id',$i);   					
   					$this->DiarySentence->set('text',$item);
   					if($item == ""){
   						continue;
   					}else{
   						$this->DiarySentence->save();
   						$i++;
   					}
   					
   				}

				$this->Session->setFlash('The diary has been saved.','alert_message');
				return $this->redirect('/users/index');
			}
			else {
				$this->Session->setFlash(__('The diary could not be saved. Please, try again.'));
			}
		}
		$languages = $this->Diary->Language->find('list',array('fields' => array('Language.id','Language.text')));
		$this->set(compact('languages'));
		/*print($this->Diary->find(
					'first', 
					array(
      					'order' => array('Diary.created' => 'desc'),
      					'fields' => 'Diary.id'
      				 )
   				)['Diary']['id']);
   		*/
	}

	public function correct(){
		if($this->request->is('post')){
			$diary_id = $this->request->data['diary_id'];
			$user_id = $this->request->data['user_id'];
			$this->Correction->create();
			$this->Correction->set('user_id',$this->Auth->user('id'));
			$this->Correction->set('diary_id', $diary_id);
			if($this->Correction->save()){
				$newCorrection = $this->Correction->find(
					'first', 
					array(
      					'order' => array('Correction.created' => 'desc'),
      					'fields' => array('Correction.id')
      				 )
   				);
   				$correction_id = $newCorrection['Correction']['id'];

   				$this->Comment->create();
   				$this->Comment->set('correction_id', $correction_id);
   				$this->Comment->set('diary_id', $diary_id);
   				$this->Comment->set('user_id', $this->Auth->user('id'));
   				$this->Comment->set('text', $this->request->data['comment']);
   				if($this->Comment->save()){

   				}
   				$count = 0;
   				$sentence_count = intval($this->request->data['sentence_count']);
				while($count<$sentence_count){
					if($this->request->data['correction_sentence_'.$count]!=''){
						$this->CorrectionSentence->create();
						$this->CorrectionSentence->set('correction_id', $correction_id);
						$this->CorrectionSentence->set('sentence_id', $count);
						$this->CorrectionSentence->set('text', $this->request->data['correction_sentence_'.$count]);
						
						if($this->CorrectionSentence->save()){
							$newCorrectionSentence = $this->CorrectionSentence->find(
								'first',
								array(
	  							'order' => array('CorrectionSentence.created' => 'desc'),
	  							'fields' => array('CorrectionSentence.id')
	  							 )
							);
							$CorrectionSentence_id = $newCorrectionSentence['CorrectionSentence']['id'];	
							
								$this->CommentSentence->create();
								$this->CommentSentence->set('correction_id', $correction_id);
								$this->CommentSentence->set('correction_sentence_id', $CorrectionSentence_id);
								$this->CommentSentence->set('text', $this->request->data['comment_sentence_'.$count]);
								$this->CommentSentence->save();	
							
						}
					}
					$count++;			
				
				}
				$reminderData = array('user_id' => $user_id, 'user_from' => $this->Auth->user('id'), 'url' => $this->referer(), 'type' => 1);
				$this->Reminder->create();
				$this->Reminder->save($reminderData);
				$corrections = $this->Diary->query('select corrections from diaries where id = '.$diary_id)[0]['diaries']['corrections'];
				$this->Diary->query('update diaries set corrections = '.(++$corrections).' where id = '.$diary_id);
				return $this->redirect($this->referer());
			}
		
		}
	}




/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Diary->exists($id)) {
			throw new NotFoundException(__('Invalid diary'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Diary->save($this->request->data)) {
				return $this->flash(__('The diary has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Diary.' . $this->Diary->primaryKey => $id));
			$this->request->data = $this->Diary->find('first', $options);
		}
		$users = $this->Diary->User->find('list');
		$languages = $this->Diary->Language->find('list');
		$this->set(compact('users', 'languages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Diary->id = $id;
		if (!$this->Diary->exists()) {
			throw new NotFoundException(__('Invalid diary'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Diary->delete()) {
			return $this->flash(__('The diary has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The diary could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Diary->recursive = 0;
		$this->set('diaries', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Diary->exists($id)) {
			throw new NotFoundException(__('Invalid diary'));
		}
		$options = array('conditions' => array('Diary.' . $this->Diary->primaryKey => $id));
		$this->set('diary', $this->Diary->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Diary->create();
			if ($this->Diary->save($this->request->data)) {
				return $this->flash(__('The diary has been saved.'), array('action' => 'index'));
			}
		}
		$users = $this->Diary->User->find('list');
		$languages = $this->Diary->Language->find('list');
		$this->set(compact('users', 'languages'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Diary->exists($id)) {
			throw new NotFoundException(__('Invalid diary'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Diary->save($this->request->data)) {
				return $this->flash(__('The diary has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Diary.' . $this->Diary->primaryKey => $id));
			$this->request->data = $this->Diary->find('first', $options);
		}
		$users = $this->Diary->User->find('list');
		$languages = $this->Diary->Language->find('list');
		$this->set(compact('users', 'languages'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Diary->id = $id;
		if (!$this->Diary->exists()) {
			throw new NotFoundException(__('Invalid diary'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Diary->delete()) {
			return $this->flash(__('The diary has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The diary could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

	public function test(){
		/*$this->layout = 'default';
		
		$result = $this->Message->find('all',
			array(
				'recursive' => 1,
				'conditions' => array(
						'OR' => array(
							array(
								'AND' => array(
									array('Message.user_from' => 1382767683),
        							array('Message.user_to' => 1382767684)
								) 
							),
							array(
								'AND' => array(
									array('Message.user_from' => 1382767684),
        							array('Message.user_to' => 1382767683)
								) 
							)
						)
					)
				)
			);

		header('Content-type: text/plain');
		echo '<pre>'; print_r($result); echo '</pre>';*/
		//$this->layout = '';


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
}
