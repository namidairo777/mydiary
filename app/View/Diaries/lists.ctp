
<div class="user-left">
	<hr>
	<h3>DIARY LIST</h3>               
	<hr>
	<div class="sort_button">
	    <ul class="nav navbar-nav">
	        <li>sort by</li>
	        <li><span class="glyphicon glyphicon-time"><?php echo $this->Paginator->sort('created'); ?></span></li>
	        <li><span class="glyphicon glyphicon-eye-open"><?php echo $this->Paginator->sort('views'); ?></span></li>
	        <li><span class="glyphicon glyphicon-ok"><?php echo $this->Paginator->sort('corrections'); ?></span></li>
	    </ul>
	</div>
	<div style="clear: both"></div>
	<?php echo $this->element('diary_list');?>
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
<?php echo $this->element('diary_search_sidebar');?>
