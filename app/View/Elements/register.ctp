<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create(
		'User',
			array(
				'role' => 'form',
				'url' =>array(
					'controller' => 'Users',
					'action' => 'register'
				)
			)
		); 
?>
<?php
	echo $this->Form->input(
		'email',
		array(
			'placeholder' => 'email address',
			'type' => 'email',
			'class' => 'form-control',
			'label' => 'Email Address',
			'div' => 'form-group'
			)
		);
	echo $this->Form->input(
		'password',
		array(
			'placeholder' => 'range between 8 and 20',
			'type' => 'password',
	       	'class' => 'col-sm-10 form-control',
	       	'label' => 'Password',
	       	'div' => 'form-group'
	       	)
       	);

?>
<?php echo $this->Form->end(
		array(
			'label' => 'register',
			'class' => 'btn btn-primary text-center',
            'style' => 'margin-top:20px'
			)
		); 
?>