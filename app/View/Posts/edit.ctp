<h1>Edit Post</h1>
<?php 
echo $this->Form->create('Post');
echo $this->Form->input('title',array('value'=>$post['Post']['title']));
echo $this->Form->input('body',array('rows'=>'3','value'=>$post['Post']['body']));
echo $this->Form->input('id',array('type'=>'hidden','value'=>$post['Post']['id']));
echo $this->Form->end('Save Post');
?>