<?php
App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class IndexController extends AppController {
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
        $this->layout = 'index_template';
    }
	public $uses = array('User');
	public function index(){
		if($this->Auth->login()){
        return $this->redirect('/users');
        }
		$countryOptions = $this->User->Country->find('list',array('fields' => array('Country.id','Country.text')));	
		$sexOptions	= $this->User->Sex->find('list',array('fields' => array('Sex.id','Sex.text')));
		$languageOptions = $this->User->Native_language->find('list',array('fields' => array('Native_language.id','Native_language.text')));
		$occupationOptions	= $this->User->Occupation->find('list',array('fields' => array('Occupation.id','Occupation.text')));
		$this->set('countryOptions',$countryOptions);
		$this->set('sexOptions',$sexOptions);
		$this->set('languageOptions',$languageOptions);
		$this->set('occupationOptions',$occupationOptions);
	} 

}
