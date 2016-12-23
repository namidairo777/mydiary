<ol class="breadcrumb">
    <span class="glyphicon glyphicon-home"></span>
    <li><?php echo $this->Html->link(
        'Home',
        '/users'
    );?></li>
    <?php if(isset($breadcrumb)) {
        foreach ($breadcrumb as $key => $value) {
            ?>
            <li>
                <?php echo $this->Html->link($key, $value); ?>
            </li>
        <?php
        }

    }?>



</ol>
<?php /*echo $this->Html->getCrumbs(' > ', array(
    'text' => $this->Html->image('home.png'),
    'url' => array('controller' => 'pages', 'action' => 'display', 'home'),
    'escape' => false
));*/
?>