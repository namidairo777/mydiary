<?php
App::uses('AppController', 'Controller');

class CorrectionSentencesController extends AppController {
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
	public $uses = array('CorrectionSentence');

	public $components = array('Session');

	public function good(){
		//if($this->request->is('get','post')){
			$correctionSentence = $this->request->query['k'];
			$hearts = $this->CorrectionSentence->query('select hearts from correction_sentences where id = '.$correctionSentence)[0]['orrectionSentence']['hearts'];
			$this->CorrectionSentence->query('update correction_sentences set hearts = '.(++$hearts).' where id = '.$correctionSentence);
			return $this->redirect($this->referer());
		//}
	}

}
