<?php foreach ($diaries as $diary): ?>
<div class="entry">
    <a class="entry-left" href="#">
        <?php echo $this->Html->image($diary['User']['pic'], array('style' => 'width:64px'));?>
    </a>
    <div class="entry-body">
        <h5 class="entry-username">
            <?php echo $this->Html->link($diary['User']['name'], '/'.$diary['User']['id']); ?>
        </h5>
        <h4 class="entry-title">
            <?php echo $this->Html->link($diary['Diary']['title'], '/'.$diary['User']['id'].'/diaries/'.$diary['Diary']['id']); ?>
        </h4>
        <p>
            <?php echo h($diary['Diary']['text_ori']);?>
        </p>
        <div class="entry-info">
            <span><?php echo h($diary['Diary']['created']); ?></span>
            <ul class="entry-status">
            
                <li><span class="glyphicon glyphicon-eye-open"></span>&nbsp;<?php echo h($diary['Diary']['views']); ?></li>
                <li><span class="glyphicon glyphicon-comment"></span>&nbsp;<?php echo h($diary['Diary']['hearts']); ?></li>
                <li><span class="glyphicon glyphicon-ok"></span>&nbsp;<?php echo h($diary['Diary']['corrections']); ?></li>
                <li><span class="glyphicon glyphicon-pencil"></span>&nbsp;<?php echo h($diary['Language']['text']); ?></li>
            </ul>
        </div>
    </div>
    <hr>
</div>
<?php endforeach; ?>


