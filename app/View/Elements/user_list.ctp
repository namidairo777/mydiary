

<?php 
if(isset($is_friendList)&&$is_friendList==1){

foreach ($users as $user): ?>
<div class="entry">
    <a class="entry-left" href="#">
        <?php echo $this->Html->image($user['pic'], array('style' => 'width:120px'));?>
    </a>
    <div class="entry-body">
        <h5 class="entry-username">
            <?php echo $this->Html->link($user['name'], '/'.$user['id']); ?>
        </h5>
        <ul class="entry-language list-unstyled">
            <li>
                <span class="glyphicon glyphicon-comment"> <?=h($user['Native_language']['text'])?></span>
            </li>
            <li>
                <span class="glyphicon glyphicon-pencil"> <?=h($user['Study_language1']['text'])?><?=h(isset($user['Study_language2']['text'])?' & '.$user['Study_language2']['text']:'')?></span>
            </li>
        </ul>
        <ul class="entry-score list-unstyled">
            <li>
                <span class="glyphicon glyphicon-refresh"> <?=h($user['modified'])?></span>
            </li>
            <li>
                <span class="score-text glyphicon glyphicon-star-empty"> <?=h($user['scores'])?></span>
            </li>
        </ul>
        <div style="clear:both"></div>
        <p>
            <?php echo h($user['introduction']);?>
        </p>
        
    </div>
    <hr>
</div>
<?php endforeach; 

}else{
foreach ($users as $user): ?>
<div class="entry">
    <a class="entry-left" href="#">
        <?php echo $this->Html->image($user['User']['pic'], array('style' => 'width:120px'));?>
    </a>
    <div class="entry-body">
        <h5 class="entry-username">
            <?php echo $this->Html->link($user['User']['name'], '/'.$user['User']['id']); ?>
        </h5>
        <ul class="entry-language list-unstyled">
            <li>
                <span class="glyphicon glyphicon-comment"> <?=h($user['Native_language']['text'])?></span>
            </li>
            <li>
                <span class="glyphicon glyphicon-pencil"> <?=h($user['Study_language1']['text'])?><?=h(isset($user['Study_language2']['text'])?' & '.$user['Study_language2']['text']:'')?></span>
            </li>
        </ul>
        <ul class="entry-score list-unstyled">
            <li>
                <span class="glyphicon glyphicon-refresh"> <?=h($user['User']['modified'])?></span>
            </li>
            <li>
                <span class="score-text glyphicon glyphicon-star-empty"> <?=h($user['User']['scores'])?></span>
            </li>
        </ul>
        <div style="clear:both"></div>
        <p>
            <?php echo h($user['User']['introduction']);?>
        </p>
        
    </div>
    <hr>
</div>
<?php endforeach; 
}?>


