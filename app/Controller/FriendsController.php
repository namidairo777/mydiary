<?php
App::uses('AppController', 'Controller');

class FriendsController extends AppController {
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
        $this->layout = 'main_template';
    }
	public $uses = array('Friend','User', 'Diary','Country','FriendRequest');

	public $components = array('Session', 'Paginator');

    public $actsAs = array('Containable');

	public function lists($id){

		
        $result = $this->User->find('all', array('recursive' => 3, 'conditions' => array('User.id' => $id)));
        $friendLists = array();
        foreach ($result[0]['Friend'] as $friend) {
            array_push($friendLists, $friend['User']);
        }
        $this->set('users', $friendLists);
        $this->set('is_friendList',1);
        $page_user = $this->User->find('first', array(
        'conditions' => array('User.id' => $id)));
        $this->set('page_user',$page_user);
        //header('Content-type: text/plain');
		//echo '<pre>'; print_r($friendLists); echo '</pre>';
        $this->set('friend_status', $this->friend_status($this->Auth->user('id'),$id));


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
