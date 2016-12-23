<div class="message-box">
   	<hr>
    <h4>MESSENGER with <?=$this->Html->link($user_with['User']['name'],'/'.$user_with['User']['id'])?>

    </h4>
    <hr>
    <div class="message-to">	
       	<?php echo $this->Form->create(
            'Message',
            array(
                'role' => 'form',
                'url' =>array(
                    'controller' => 'Messages',
                    'action' => 'create'
                    )
                )
            );
        ?>
        <input name="data[Message][user_from]" value="<?=AuthComponent::user('id')?>" style="display:none">
        <input name="data[Message][user_to]" value="<?=$user_with['User']['id']?>" style="display:none">
        <?php echo $this->Html->image(AuthComponent::user('pic'), array('class' => 'head-30'));?>
        <div class="comment-body">
            <textarea id="new-message" class="form-control " name="data[Message][text]" placeholder="Enter to post" style="max-width: 630px" rows="2"></textarea>
        </div>
        </form>
        <?php echo $this->Form->end()?>                    
    </div>
    <hr>
    <?php foreach($messages as $message):?>
        <?php $class=($message['Message']['user_to']==AuthComponent::user('id'))?'message-from':'message-to'?>
        <div class="<?=$class?>">
        <?php echo $this->Html->image(($class=='message-from')?$user_with['User']['pic']:AuthComponent::user('pic'), array('class' => 'head-30'));?>
        <div>
        	<span class="reminder"><?=($message['Message']['is_read']==0)?' NEW':''?></span>
            <span class="time"><?=$message['Message']['created']?></span>                        
            <p><?=$message['Message']['text']?></p>
        </div>
    </div>
        
    <?php endforeach;?>
    <div style="clear:both"></div>
    <div class="page-panigation">
	    <nav>
	        <ul class="pagination">
	            <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
	            <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
	            <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
	        </ul>
	    </nav>
	</div>
	<hr>
    
</div>