<?php
echo $this->Form->create('User', 
	array(
		'type'=>'file', 
		'enctype' => 'multipart/form-data',
		'url' =>array(
                    'controller' => 'Users',
                    'action' => 'picUpload'
                )
            )			
		);

echo $this->Form->input('User.pic', array('label' => false, 'type' => 'file', 'multiple'));
echo $this->Form->submit('upload', array('name' => 'submit'));
echo $this->Form->end();
?>