<?php echo $this->Session->flash('auth'); ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             	   <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Welcome</h4>
            </div>
            <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form' ,'url' =>array(
                'controller' => 'Users',
                'action' => 'login'
            ))); ?>
                <div class="modal-body">
			        <?php echo $this->Form->input(
			        	'email',
			        		array(
				        	'type' => 'email',
				        	'class' => 'col-sm-10 form-control',
				        	'placeholder' => 'Email',
				        	'label' => false,
				        	'div' => 'form-group'
				        	)
			        	);       
			    	?>
			        <?php echo $this->Form->input(
			        	'password',
			        		array(
				        	'type' => 'password',
				        	'class' => 'col-sm-10 form-control',
				        	'placeholder' => 'password',
				        	'label' => false, 
				        	'div' => 'form-group'
			        		)
			        	); 
			        ?>
			</div>
			<?php echo $this->Form->end(
					array(
						'label' => 'login',
						'class' => 'btn btn-primary', 
						'div' => array('class' => 'modal-footer text-center')	 
					)
				); 
			?>
        </div>
    </div>
</div>

