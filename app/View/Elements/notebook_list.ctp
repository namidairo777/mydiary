<?php foreach ($notebooks as $notebook): ?>
<div class="entry">
    <?php if($notebook['Notebook']['type']==1):?>
        <?=$this->Html->link($notebook['Diary']['User']['name'], '/users/'.$notebook['Diary']['User']['id'])?>
        's diary
        <i><?=$notebook['Diary']['title']?></i>
        <a href="<?=$notebook['Notebook']['url']?>" class="btn btn-default btn-xs" role="button">read original text</a>
        <div style="clear:both"></div>
        <div class="entry-info">
            <span><?=h($notebook['Notebook']['created'])?></span>
        </div>
        <hr>
    <?php endif;?>
    <?php if($notebook['Notebook']['type']==2):?>
        <?=$this->Html->link($notebook['Correction']['User']['name'], '/users/'.$notebook['Correction']['User']['id'])?>
        's correction in diary
        <i><?=$notebook['Diary']['title']?></i>
        <a href="<?=$notebook['Notebook']['url']?>" class="btn btn-default btn-xs" role="button">read original text</a>
        <div style="clear:both"></div>
        <div class="entry-info">
            <span><?=h($notebook['Notebook']['created'])?></span>
        </div>
        <hr>
    <?php endif;?>
    <?php if($notebook['Notebook']['type']==3):?>
        <?=$this->Html->link($notebook['Diary']['User']['name'], '/users/'.$notebook['Diary']['User']['id'])?>
        's diary
        <i><?=$notebook['Diary']['title']?></i>
        <a href="<?=$notebook['Notebook']['url']?>" class="btn btn-default btn-xs" role="button">read original text</a>
        <ul class="notebook bg-info correction-entry">
            <li>
                <span class="glyphicon glyphicon-pencil"></span><?=h($notebook['Notebook']['text_ori'])?>
            </li>
            <li>
                <span class="glyphicon glyphicon-ok"></span><?=h($notebook['Notebook']['text_correct'])?>
            </li>
        </ul>
        <div style="clear:both"></div>
        <div class="entry-info">
            <span><?=h($notebook['Notebook']['created'])?></span>
        </div>
        <hr>
    <?php endif;?>
</div>
<?php endforeach; ?>

