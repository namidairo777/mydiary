<?php
App::uses('AppController', 'Controller');

class FriendRequestsController extends AppController {
	public function beforeFilter() {
        parent::beforeFilter();
    }

    public $components = array('Session');

	public $uses = array('FriendRequest', 'Friend', 'Reminder');

	public function create($user_from = null, $user_to = null){
		$this->FriendRequest->create();
		$datas = array('user_from' => $user_from, 'user_to' => $user_to); 
		if($this->FriendRequest->save($datas)){
			$this->Session->setFlash('You send friend-request successfully!','alert_message');
			$reminderData = array('user_id' => $user_to, 'user_from' => $user_from, 'url' => '/'.$user_from, 'type' => 4);
			$this->Reminder->create();
			$this->Reminder->save($reminderData);
			return $this->redirect($this->referer());
		}
		else{
			$this->Session->setFlash('System error!','alert_message');
			return $this->redirect($this->referer());
		}

	} 

	public function accept($user_from = null, $user_to = null){

		$FriendRequest = $this->FriendRequest->find('first', 
 		array(
 			'conditions' => array('user_from' => $user_from, 'user_to' => $user_to, 'is_accepted' => '0'),
 			'fields' => array('FriendRequest.id')
 			)
 		);
 		$datas1 = array('id' => $FriendRequest['FriendRequest']['id'],'is_accepted' => 1); 
 		if($this->FriendRequest->save($datas1)){
 			$this->Friend->create();
 			$datas2 = array('user_from' => $user_from, 'user_to' => $user_to); 
 			$this->Friend->save($datas2);
 			$this->Friend->create();
 			$datas3 = array('user_from' => $user_to, 'user_to' => $user_from); 
 			$this->Friend->save($datas3);
			$this->Session->setFlash('You accept the friend-request !','alert_message');
			return $this->redirect($this->referer());
		}
		else{
			$this->Session->setFlash('System error!','alert_message');
			return $this->redirect($this->referer());
		}



	}
	public function test(){
		$this->layout = 'default';
		echo 'NIHAO';
	}

}
