<div class="user-left">
    <ul class="nav nav-tabs nav-justified">
        <li role="presentation"><?=$this->Html->link($this->Html->tag('span', 'Home', array('class' => 'glyphicon glyphicon-star')), '/'.$page_user['User']['id'], array('escape' => false))?></li>
        <li role="presentation"><?=$this->Html->link($this->Html->tag('span', 'Diaries', array('class' => 'glyphicon glyphicon-pencil')), '/'.$page_user['User']['id'].'/diaries', array('escape' => false))?></li>
        <li role="presentation"><?=$this->Html->link($this->Html->tag('span', 'Friends', array('class' => 'glyphicon glyphicon-user')), '/'.$page_user['User']['id'].'/friends', array('escape' => false))?></li>
        <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-book"></span>Notebooks</a></li>
    </ul>
    <div>
        <div class="user-main">
            <?=$this->element('notebook_list')?>
            <div class="page-panigation">
                <nav>
                    <ul class="pagination">
                        <li><?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?></li>
                        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
                        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php echo $this->element('user_sidebar')?>
