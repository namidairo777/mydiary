<?php
echo $this->Form->create('User', array('type'=>'file', 'enctype' => 'multipart/form-data'));
echo $this->Form->input('User.pic_300', array('label' => false, 'type' => 'file', 'multiple'));
echo $this->Form->submit('upload', array('name' => 'submit'));
echo $this->Form->end();
?>