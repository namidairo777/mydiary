

<ul class="toggle nav nav-tabs nav-justified" role="tablist">

    <li role="presentation" class="active"><a role="tab" aria-controls="home" href="#Popular-Diaries" data-toggle="tab">Popular-Diaries</a></li>
    <li role="presentation"><a role="tab" aria-controls="Friends-Entries" href="#Top-Users" data-toggle="tab">Top-Users</a></li>
    <li role="presentation"><a role="tab" aria-controls="Messages" href="#My-Messages" data-toggle="tab">My-Messages<span class="badge"><?=$reminders_count?></span></a></li>
</ul>
<div class="tab-content">
    <div id="Popular-Diaries" role="tabpanel" class="entry-lists tab-pane fade active in">
        <?php echo $this->element('diary_list');?>
        <div style="width:100%;text-align: center;">
            <div class="more-button btn btn-default"><?=$this->Html->link('more', '/diaries/lists')?></div>
        </div>        
    </div>
    <div id="Top-Users" role="tabpanel" class="entry-lists tab-pane fade">
        <?php echo $this->element('user_list');?>
        <div style="width:100%;text-align: center;">
            <div class="more-button btn btn-default"><?=$this->Html->link('more', '/Users/lists')?></div>
        </div>
    </div>
    <div id="My-Messages" role="tabpanel" class="entry-lists tab-pane fade">
        <?php echo $this->element('Reminder_list');?>
        <div style="width:100%;text-align: center;">
            <div class="more-button btn btn-default"><?=$this->Html->link('more', '/home/reminders')?></div>
        </div>
    </div>
</div>
