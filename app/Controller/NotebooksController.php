<?php
/**
 * Created by PhpStorm.
 * User: Namidairo-win8
 * Date: 2015/5/24
 * Time: 20:40
 */


App::uses('AppController', 'Controller');
App::uses('ConnectionManager', 'Model');

class NotebooksController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
        $this->layout = 'main_template';
    }

    public $uses = array('Notebook', 'User','Friend');
    public $components = array('Paginator', 'Session');

    public function add(){
        if($this->request->is('post', 'get')){
            switch($this->request->data('type')){
                case '1':
                    $diary_id = $this->request->data['diary_id'];
                    $url = $this->request->data['url'];
                    $this->Notebook->create();
                    $data = array('user_id' => $this->Auth->user('id'), 'diary_id' => $diary_id, 'url' => $url, 'type' => 1);
                    if($this->Notebook->save($data)){
                        $this->Session->setFlash('add successfully!', 'alert_message');
                        return $this->redirect($this->referer());
                    }
                    break;
                case '2':
                    $correction_id = $this->request->data['correction_id'];
                    $diary_id = $this->request->data['diary_id'];
                    $url = $this->request->data['url'];
                    $this->Notebook->create();
                    $data = array('user_id' => $this->Auth->user('id'), 'diary_id' => $diary_id, 'correction_id' => $correction_id, 'url' => $url, 'type' => 2);
                    if($this->Notebook->save($data)){
                        $this->Session->setFlash('add successfully!', 'alert_message');
                        return $this->redirect($this->referer());
                    }
                    break;
                case '3':
                    $diary_id = $this->request->data['diary_id'];
                    $correction_sentence_id = $this->request->data['correction_sentence_id'];
                    $text_ori = $this->request->data['text_ori'];
                    $text_correct = $this->request->data['text_correct'];
                    $url = $this->request->data['url'];
                    $this->Notebook->create();
                    $data = array('user_id' => $this->Auth->user('id'),  'diary_id' => $diary_id, 'correction_sentence_id' => $correction_sentence_id, 'text_ori' => $text_ori, 'text_correct' => $text_correct,  'url' => $url, 'type' => 3);
                    if($this->Notebook->save($data)){
                        $this->Session->setFlash('add successfully!', 'alert_message');
                        return $this->redirect($this->referer());
                    }
                    break;

            }
        }

    }


    public function test(){
        $result = $this->Notebook->find('all', array('recursive' => 2, 'conditions' => array('User.id' => $this->Auth->user('id'))));

        echo '<pre>'; print_r($result); echo '</pre>';


    }

    public function lists($id){
        $conditions = array(
            'Notebook.user_id' => $id
        );
        $paginate = array(
            'limit' => 7,
            'order' => array(
                'Notebook.created' => 'desc'
            ),
            'conditions' => $conditions
        );
        $this->Notebook->recursive = 4;
        $this->Paginator->settings = $paginate;
        $this->set('notebooks', $this->Paginator->paginate());
        $page_user = $this->User->find('first', array(
            'conditions' => array('User.id' => $id)));
        $this->set('page_user',$page_user);
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
