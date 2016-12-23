<?php
App::uses('AppController', 'Controller');

class CommentsController extends AppController {
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
	public $uses = array('Comment', 'Reminder');

	public $components = array('Session');

	public function post(){

		if($this->request->is('post')){
			$diary_id = $this->request->data['diary_id'];
			$user_id = $this->request->data['user_id'];
			$this->Comment->create();
			$this->Comment->set('diary_id',$diary_id);
			$this->Comment->set('user_id',$this->Auth->user('id'));
			if($this->Comment->save($this->request->data)){
				$reminderData = array('user_id' => $user_id, 'user_from' => $this->Auth->user('id'), 'url' => $this->referer(), 'type' => 2);
				$this->Reminder->create();
				$this->Reminder->save($reminderData);
				return $this->redirect($this->referer());
			}
			else{
				$this->Session->setFlash('Some error happened, try again.','alert_message');
                return $this->redirect($this->referer());
			}

		}else{
				$this->Session->setFlash('Some error happened, try again.','alert_message');
                return $this->redirect($this->referer());
			}

	} 

}
