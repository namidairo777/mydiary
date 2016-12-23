<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="home.html">
                <?php echo $this->Html->image('logo-black.png');?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                <?php echo $this->Html->link(
                                'POST',
                                '/diaries/post'
                            );?></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">English<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">English</a></li>
                        <li><a href="#">中文(简体)</a></li>
                        <li><a href="#">한국어</a></li>
                        <li><a href="#">日本語</a></li>
                        <li><a href="#">Deutsch</a></li>
                        <li><a href="#">français</a></li>
                    </ul>
                </li>
                <li><?php if(AuthComponent::user('profile_done')==0){echo $this->Html->link('fill your profile!','/Users/edit',array('style' => 'color:red'));}?></li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li >
                    <?php echo $this->Html->image(AuthComponent::user('pic'), array('style' => 'width:50px'));?>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?=AuthComponent::user('name')?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Messages</a></li>
                        <li><?=$this->Html->link('My Diaries', '/'.AuthComponent::user('id').'/diaries', array('escape' => false))?></li>
                        <li><?=$this->Html->link('My Friends', '/'.AuthComponent::user('id').'/friends', array('escape' => false))?></li>
                        <li><?=$this->Html->link('My Notebooks', '/'.AuthComponent::user('id').'/notebooks', array('escape' => false))?></li>
                        <li class="divider"></li>
                        <li><?php echo $this->Html->link(
                                'Home',
                                '/'.AuthComponent::user('id')
                            );?></li>
                        <li><?php echo $this->Html->link(
                                'Edit profile',
                                '/Users/edit'
                            );?></li>                        
                        <li><?php echo $this->Html->link(
                                'LOGOUT',
                                '/Users/logout'
                            );?></li>
                    </ul>
                </li>
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="home-slide">
    <div class="container">
        <h1>日记</h1>
        <p>读书有三到，谓心到，眼到，口到。心不在此，则眼看不仔细，心眼既不专一，却只漫诵浪读，决不能记，久也不能久也。
            三到之中，心到最急，心既到矣，眼口岂不到乎？ —— 朱熹《训学斋规》
        </p>
    </div>
</div>