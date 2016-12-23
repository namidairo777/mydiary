<h1>Blog posts</h1>
<p><?php echo $this->html->link(array('controller'=>'posts','action'=>'add')); ?></p>
<table>
	<tr>
		<th>Id</th>
		<th>Titile</th>
		<th>Action</th>
		<th>Created</th>
	</tr>
	<?php foreach($posts as $post): ?>
	<tr>
		<td><?php echo $post['Post']['id'];?></td>
		<td><?php echo $this->Html->link($post['Post']['title'],array('controller'=>'posts','action'=>'view',$post['Post']['id']));?></td>
		<td>
			<?php echo $this->Html->link('Edit',array('action'=>'edit',$post['Post']['id']));?>
			<?php echo $this->Html->link('delete',array('action'=>'delete',$post['Post']['id']),array('confirm'=>'are you sure?')); ?>
		</td>
		<td><?php echo $post['Post']['created'];?></td>
	</tr>
	<?php endforeach;?>
	<?php unset($post);?>
</table>