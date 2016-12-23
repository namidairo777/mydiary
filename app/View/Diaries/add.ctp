<div class="diaries form">
<?php echo $this->Form->create('Diary'); ?>
	<fieldset>
		<legend><?php echo __('Add Diary'); ?></legend>
	<?php
		echo $this->Form->input('title');		
		echo $this->Form->input('language');
		echo $this->Form->input('text_ori',array('type' => 'textarea'));
		echo $this->Form->input('text_mo',array('type' => 'textarea'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Diaries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Corrections'), array('controller' => 'corrections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Correction'), array('controller' => 'corrections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Diary Sentences'), array('controller' => 'diary_sentences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Diary Sentence'), array('controller' => 'diary_sentences', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notebooks'), array('controller' => 'notebooks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notebook'), array('controller' => 'notebooks', 'action' => 'add')); ?> </li>
	</ul>
</div>
