<?php
App::uses('AppController', 'Controller');

class CorrectionsController extends AppController {
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
	public $uses = array('Correction');

	public $components = array('Session');

	public function good(){
		//if($this->request->is('get','post')){
			$correction = $this->request->query['k'];
			$hearts = $this->Correction->query('select hearts from corrections where id = '.$correction)[0]['correction']['hearts'];
			$this->Correction->query('update corrections set hearts = '.(++$hearts).' where id = '.$correction);
			return $this->redirect($this->referer());
		//}
	}

}
