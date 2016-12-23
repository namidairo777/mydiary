<h1>Add Post</h1>
<?php 
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->inpit('body',array('row'=>'3'));
echo $this->Form->end('Save Post');
?>