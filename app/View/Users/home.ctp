<div class="user-left">
    <ul class="nav nav-tabs nav-justified">
        <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-star"></span>Home</a></li>        
        <li role="presentation"><?=$this->Html->link($this->Html->tag('span', 'Diaries', array('class' => 'glyphicon glyphicon-pencil')), '/'.$page_user['User']['id'].'/diaries', array('escape' => false))?></li>
        <li role="presentation"><?=$this->Html->link($this->Html->tag('span', 'Friends', array('class' => 'glyphicon glyphicon-user')), '/'.$page_user['User']['id'].'/friends', array('escape' => false))?></li>
        <li role="presentation"><?=$this->Html->link($this->Html->tag('span', 'Notebooks', array('class' => 'glyphicon glyphicon-book')), '/'.$page_user['User']['id'].'/notebooks', array('escape' => false))?></li>
    </ul>
    <div>
        <div class="user-main">
            <h4>About me</h4>
            <hr>
            <p>
                <?=$page_user['User']['introduction']?>            
            </p>
            <hr>
            <h4>Latest Journals</h4>
            <hr>
            <?php if(isset($latest_diary['Diary'])){?>
            <div class="entry">
            	<div class="entry-body">
	                <h4 class="entry-title"><?=$this->Html->link($latest_diary['Diary']['title'], '/'.$page_user['User']['id'].'/diaries/'.$latest_diary['Diary']['id'])?></a></h4>
	                <p>
	                    <?=h($latest_diary['Diary']['text_ori'])?>                   
	                </p>
	                <div class="entry-info">
	                    <span><?=h($latest_diary['Diary']['created'])?></span>
	                    <ul class="entry-status">
	                        <li><span class="glyphicon glyphicon-heart"></span><?=h($latest_diary['Diary']['hearts'])?></li>
	                        <li><span class="glyphicon glyphicon-ok"></span><?=h($latest_diary['Diary']['corrections'])?></li>
	                        <li><span class="glyphicon glyphicon-pencil"></span><?=h($latest_diary['Language']['text'])?></li>
	                    </ul>
	                </div>
	                <hr>
	                <?=$this->Html->link('more', '/'.$page_user['User']['id'].'/diaries', array('escape' => false, 'class' => 'more'))?>                
	            </div>
	        </div>
            <?php }?>
        </div>    
    </div>
</div>

<?php echo $this->element('user_sidebar')?>