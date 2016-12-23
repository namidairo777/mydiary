<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('email',array('placeholder' => 'email address'));
		echo $this->Form->input('password',array('placeholder' => 'range between 8 and 20'));
		echo $this->Form->input('name');
		echo $this->Form->input('nationality',array('options' => $countryOptions));
		echo $this->Form->input('sex',array('options' => $sexOptions));
		echo $this->Form->input('occupation',array('options' => $occupationOptions));
		echo $this->Form->input('native_language',array('options' => $languageOptions));
		echo $this->Form->input('study_language1',array('options' => $languageOptions));
		echo $this->Form->input('study_language2',array('options' => $languageOptions,'empty' => '(choose one)'));
		echo $this->Form->input('introduction');
		echo $this->Form->input('pic_300');
		echo $this->Form->input('pic_30');
		echo $this->Form->input('pic_50');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
<p>I am here!</p>