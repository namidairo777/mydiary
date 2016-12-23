<?php
App::uses('AppController', 'Controller');

class RemindersController extends AppController {
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
        $this->layout = 'main_template';
    }
	public $uses = array('Reminder');

	public $components = array('Paginator', 'Session');


	public function check(){
		//if($this->request->is('get','post')){
			$reminder_id = $this->request->query['k'];
			$this->Reminder->query('update reminders set is_read = 1 where id = '.$reminder_id);
			$url = $this->Reminder->query('select url from reminders where id = '.$reminder_id)[0]['reminders']['url'];
			return $this->redirect($url);
		//}
	}
	public function lists() {
		//$this->layout = 'default';
		$conditions = array(
                'Reminder.user_id' => $this->Auth->user('id')
        );
        $paginate = null;
        $paginate = array(
            'limit' => 8,
            'order' => array(
                'Reminder.created' => 'desc'
            ),
            'conditions' => $conditions
        );
        $this->Reminder->recursive = 1;
        $this->Paginator->settings = $paginate;
        $this->set('reminders', $this->Paginator->paginate());
		

	}



	public function test(){
		$options = array(
			'recursive' => 1, 
        	'order' => array('Reminder.created DESC'),
        	'conditions' => array('Reminder.user_id' => $this->Auth->user('id'))
        	);
		//$this->set('reminders', $this->Reminder->find('all', $options));
		 //

		header('Content-type: text/plain');
		//

		echo '<pre>'; print_r($this->Reminder->query('select url from reminders where id = 2')); echo '</pre>';
	}

}
