<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail'); ?></dt>
		<dd>
			<?php echo h($user['User']['mail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nationality'); ?></dt>
		<dd>
			<?php echo h($user['User']['nationality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($user['User']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Occupation'); ?></dt>
		<dd>
			<?php echo h($user['User']['occupation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Native Language'); ?></dt>
		<dd>
			<?php echo h($user['User']['native_language']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Study Language1'); ?></dt>
		<dd>
			<?php echo h($user['User']['study_language1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Study Language2'); ?></dt>
		<dd>
			<?php echo h($user['User']['study_language2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Introduction'); ?></dt>
		<dd>
			<?php echo h($user['User']['introduction']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diaries Written'); ?></dt>
		<dd>
			<?php echo h($user['User']['diaries_written']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correction Made'); ?></dt>
		<dd>
			<?php echo h($user['User']['correction_made']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correction Recieved'); ?></dt>
		<dd>
			<?php echo h($user['User']['correction_recieved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pic 300'); ?></dt>
		<dd>
			<?php echo h($user['User']['pic_300']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pic 30'); ?></dt>
		<dd>
			<?php echo h($user['User']['pic_30']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pic 50'); ?></dt>
		<dd>
			<?php echo h($user['User']['pic_50']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
