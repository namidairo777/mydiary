<!DOCTYPE html>
<html>
<?php echo $this->element('header');?>
<?php echo $this->Session->flash();?>
<body>
<?php echo $this->element('navi');?>
<div class="content">
    <div class="container">
        <?php echo $this->element('breadcrumb');?>

        <?php
            /*switch($page_name){
                case 'user_index': echo $this->fetch('content');
                        break;
                case 'user_edit': echo $this->fetch('content');
                        break;
                default : echo $this->element('error404');
            }*/
            echo $this->fetch('content');
        ?>
    </div>
</div>

<?php echo $this->element('footer');?>

</body>
</html>