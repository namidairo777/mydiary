<hr>
<h4>Post a new entry</h4>
<hr>
<div class="post-container">
    <?php echo $this->Form->create('Diary',array('rloe' => 'form')); ?>
    <?php
        echo $this->Form->input(
            'language',
            array('class' => 'form-control edit-button-150',
            'label' => 'Language',
            'div' => 'form-group')
            );
        echo $this->Form->input(
            'title',
            array(
                'class' => 'form-control edit-button-600',
                'label' => 'Title',
                'div' => 'form-group')
            );       

        echo $this->Form->input(
            'text_ori',
            array(
                'type' => 'textarea',
                'class' => 'form-control edit-button-600',
                'label' => 'text in language youa are learning',
                'div' => 'form-group')
            );
        echo $this->Form->input(
            'text_mo',
            array(
                'type' => 'textarea',
                'class' => 'form-control edit-button-600',
                'label' => 'text in your mother tongue',
                'div' => 'form-group'
                )
            );
    ?>
<?php echo $this->Form->end(
    array(
        'label' => 'Post',
        'class' => 'btn btn-primary text-center')); ?>
</div>


