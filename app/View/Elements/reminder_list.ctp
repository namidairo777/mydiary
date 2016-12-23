
<?php foreach ($reminders as $reminder): ?>
<div class="entry">
    <?php if($reminder['Reminder']['type']==1):?>
    	<?php if($reminder['Reminder']['is_read']==0):?>
    	<div class="alert alert-info" role="alert">
        	<?=$this->Html->link($reminder['User']['name'], '/users/'.$reminder['User']['id'])?>
        	made a correction on your diary
        	<a href="Reminders/check?k=<?=$reminder['Reminder']['id']?>" class="alert-link" role="button">link</a>            
        	<i style="color:red;font-size:20px">New</i>
            <div class="info-right"><?=$reminder['Reminder']['created']?></div>
        </div>
    	<?php endif;?>
    	<?php if($reminder['Reminder']['is_read']==1):?>
    	<div class="alert alert-warning" role="alert">
        	<?=$this->Html->link($reminder['User']['name'], '/users/'.$reminder['User']['id'])?>
        	made a correction on your diary
        	<a href="Reminders/check?k=<?=$reminder['Reminder']['id']?>" class="alert-link" role="button">link</a>
            <div class="info-right"><?=$reminder['Reminder']['created']?></div>
    	<?php endif;?>
    <?php endif;?>
    <?php if($reminder['Reminder']['type']==2):?>
    	<?php if($reminder['Reminder']['is_read']==0):?>
    	<div class="alert alert-info" role="alert">
        	<?=$this->Html->link($reminder['User']['name'], '/users/'.$reminder['User']['id'])?>
        	made a comment on your diary
        	<a href="Reminders/check?k=<?=$reminder['Reminder']['id']?>" class="alert-link" role="button">link</a>
        	<i style="color:red;font-size:20px">New</i>
            <div class="info-right"><?=$reminder['Reminder']['created']?></div>
        </div>
    	<?php endif;?>
    	<?php if($reminder['Reminder']['is_read']==1):?>
    	<div class="alert alert-warning" role="alert">
        	<?=$this->Html->link($reminder['User']['name'], '/users/'.$reminder['User']['id'])?>
        	made a comment on your diary
        	<a href="Reminders/check?k=<?=$reminder['Reminder']['id']?>" class="alert-link" role="button">link</a>
            <div class="info-right"><?=$reminder['Reminder']['created']?></div>
        </div>
    	<?php endif;?>
    <?php endif;?>
    <?php if($reminder['Reminder']['type']==3):?>
    	<?php if($reminder['Reminder']['is_read']==0):?>
    	<div class="alert alert-info" role="alert">
        	<?=$this->Html->link($reminder['User']['name'], '/users/'.$reminder['User']['id'])?>
        	sent you an new messsage
        	<a href="Reminders/check?k=<?=$reminder['Reminder']['id']?>" class="alert-link" role="button">link</a>
        	<i style="color:red;font-size:20px">New</i>
            <div class="info-right"><?=$reminder['Reminder']['created']?></div>
        </div>
    	<?php endif;?>
    	<?php if($reminder['Reminder']['is_read']==1):?>
    	<div class="alert alert-warning" role="alert">
        	<?=$this->Html->link($reminder['User']['name'], '/users/'.$reminder['User']['id'])?>
        	sent you an new messsage
        	<a href="Reminders/check?k=<?=$reminder['Reminder']['id']?>" class="alert-link" role="button">link</a>
            <div class="info-right"><?=$reminder['Reminder']['created']?></div>
        </div>
    	<?php endif;?>
    <?php endif;?>
    <?php if($reminder['Reminder']['type']==4):?>
    	<?php if($reminder['Reminder']['is_read']==0):?>
    	<div class="alert alert-info" role="alert">
        	<?=$this->Html->link($reminder['User']['name'], '/users/'.$reminder['User']['id'])?>
        	sent you a friend request
        	<a href="Reminders/check?k=<?=$reminder['Reminder']['id']?>" class="alert-link" role="button">link</a>
        	<i style="color:red;font-size:20px">New</i>
            <div class="info-right"><?=$reminder['Reminder']['created']?></div>
        </div>
    	<?php endif;?>
    	<?php if($reminder['Reminder']['is_read']==1):?>
    	<div class="alert alert-warning" role="alert">
        	<?=$this->Html->link($reminder['User']['name'], '/users/'.$reminder['User']['id'])?>
        	sent you a friend request
        	<a href="Reminders/check?k=<?=$reminder['Reminder']['id']?>" class="alert-link" role="button">link</a>
        	<div class="info-right"><?=$reminder['Reminder']['created']?></div>
        </div>
    	<?php endif;?>
    <?php endif;?>

    
</div>
<?php endforeach; ?>