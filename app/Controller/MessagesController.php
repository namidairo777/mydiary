<?php
App::uses('AppController', 'Controller');
App::uses('ConnectionManager', 'Model');

class MessagesController extends AppController {
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
        $this->layout = 'main_template';
    }
	public $uses = array('Message', 'User', 'Reminder');

	public $components = array('Paginator', 'Session');

	public function history($user_id){
		$paginate = array(
            'limit' => 10,
            'order' => array(
                'Message.created' => 'desc'
            ),            
			'conditions' => array(
					'OR' => array(
						array(
							'AND' => array(
								array('Message.user_from' => $user_id),
       							array('Message.user_to' => $this->Auth->user('id'))
							) 
						),
						array(
							'AND' => array(
								array('Message.user_from' => $this->Auth->user('id')),
       							array('Message.user_to' => $user_id)
							) 
						)
					)
				)
		
        );
        $this->Message->recursive = 1;
        $this->Paginator->settings = $paginate;
        $this->set('messages', $this->Paginator->paginate());
        $this->User->recursive = -1;
        $this->set('user_with', $this->User->find('first', array('conditions' => array('User.id' => $user_id))));
	} 


	public function create(){

		if($this->request->is('post')){
			$this->Message->create();
			if($this->Message->save($this->request->data)){

				$this->Message->query('UPDATE messages set is_read = 1 where user_from ='.$this->request->data['Message']['user_to'].' AND user_to = '.$this->request->data['Message']['user_from']);
				$reminderData = array('user_id' => $this->request->data['Message']['user_to'], 'user_from' => $this->request->data['Message']['user_from'], 'url' => '/home/messages/'.$this->request->data['Message']['user_from'], 'type' => 3);
				$this->Reminder->create();
				$this->Reminder->save($reminderData);
				//$this->Session->setFlash('Se','alert_message');
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
