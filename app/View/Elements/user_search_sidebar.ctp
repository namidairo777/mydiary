<div class="user-right">
    <div class="search">
        <?php echo $this->Form->create(
            null,
            array(
                'role' => 'search',
                'url' =>array(
                    'controller' => 'Users',
                    'action' => 'lists'
                    ),
                'class' => 'navbar-form navbar-left'
                )
            );
        ?>
            <div class="form-group">
                <input name="k" type="text" class="form-control" placeholder="Try to type name in">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        <?php echo $this->Form->end();?>
    </div>                   
    <div id="htmltagcloud"> 
        <span id="0" class="wrd tagcloud0"><?=$this->Html->Link('african',array(
                'controller' => 'Users',
                'action' => 'lists',
                'lang' => 5
            ))?></span>
        <span id="1" class="wrd tagcloud0"><?=$this->Html->Link('Astralia',array(
                'controller' => 'Users',
                'action' => 'lists',
                'lang' => '4'
            ))?></span>
        <span id="2" class="wrd tagcloud9"><?=$this->Html->Link('English',array(
                'controller' => 'Users',
                'action' => 'lists',
                'lang' => '3'
            ))?></span>
        <span id="3" class="wrd tagcloud7"><?=$this->Html->Link('Chinese',array(
                'controller' => 'Users',
                'action' => 'lists',
                'lang' => '2'
            ))?></span>
        <span id="4" class="wrd tagcloud5"><?=$this->Html->Link('french',array(
                'controller' => 'Users',
                'action' => 'lists',
                'lang' => '1'
            ))?></span>
        <span id="5" class="wrd tagcloud0"><?=$this->Html->Link('hongkong',array(
                'controller' => 'Users',
                'action' => 'lists',
                'lang' => '5'
            ))?></span>
        <span id="6" class="wrd tagcloud0"><?=$this->Html->Link('japan',array(
                'controller' => 'Users',
                'action' => 'lists',
                'lang' => '4'
            ))?></span>
        <span id="7" class="wrd tagcloud5"><?=$this->Html->Link('japanese',array(
                'controller' => 'Users',
                'action' => 'lists',
                'lang' => '3'
            ))?></span>
        <span id="8" class="wrd tagcloud7"><?=$this->Html->Link('korean',array(
                'controller' => 'Users',
                'action' => 'lists',
                'lang' => '2'
            ))?></span>
    </div>    
</div>