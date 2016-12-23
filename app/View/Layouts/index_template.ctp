<!DOCTYPE html>
<?php echo $this->Session->flash();?>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
        echo $this->element('js&css');
        echo $this->fetch('meta');
        echo $this->fetch('css');
    ?>

    <title>My Diary</title>
</head>
<body>
    <!--   wrap
               landing-slides
                             introduction
                             question
                             instruction
                             inspiration
                             join us
                             -->

    <div class="wrap">
        <div id="landing-slides">
            <div id="introduction" class="introduction landing-slide">
                <div class="vertical-align">
                <div class="control">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#" class="control-log"></a>
                            </div>
                            <div class="col-md-6">
                                <ul class="control-link pull-right">
                                    <li class="pull-left">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myModal">login in</button>

                                    </li>
                                    <li class="pull-left">
                                        <a id="register-btn" href="#join-us" class="btn btn-primary ">register</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container intro-text">

                    <div class="row">
                        <div class=" text-center col-md-12">
                            <h1><b>Practice Makes Perfect</b></h1>
                            <p class="text-center landing-text">
                                Improve your language here.</br>
                                Making friends here.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="statistics">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 clearfix">
                                <div class="data">
                                    <h3><b>352</b></h3>
                                    <p class="landing-text">USERS</p>
                                </div>
                                <div class="data">
                                    <h3><b>929</b></h3>
                                    <p class="landing-text">DIARIES</p>
                                </div>
                                <div class="data">
                                    <h3><b>2322</b></h3>
                                    <p class="landing-text">COMMENTS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tease">
                    <p>What is My Diary?</p>
                </div>
                </div>
            </div>
            <div id="question" class="landing-slide">
                <div class="vertical-align">
                <div class="container">
                    <div class="row">
                        <div class="question-content col-md-12">
                            <div class="big-logo"></div>
                            <h1>What is My Diary?</h1>
                            <p class="landing-text">
                                We are a community of members from all over the world.
                                We provide you a platform to make friends and write diaries.
                                Let our community of native speakers support your language learning.
                            </p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div id="instruction" class="landing-slide">
                <div class="vertical-align">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>How to make full use of My Diary?</h2>
                            </div>
                            <img src="img/insruction.JPG">
                            <div class="col-md-4">
                                <p>Post in the language that you are learning!</p>
                            </div>
                            <div class="col-md-4">
                                <p>Native speakers correct your writing!</p>
                            </div>
                            <div class="col-md-4">
                                <p>Return the favor by helping others learn your native language!</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="inspiration" class="landing-slide">
                <h1>INSPIRATION</h1>
                <div id="inspiration-img">

                </div>
            </div>
            <div id="join-us" class="landing-slide">
                <div class="join-us-form">
                    <h2>Join Us</h2>
                    <?php echo $this->element('register');?>
                </div>
            </div>
        </div>
        <div id="landing-pagination" class="landing-pagination">
            <div id="slide1"></div>
            <div id="slide2"></div>
            <div id="slide3"></div>
            <div id="slide4"></div>
            <div id="slide5"></div>
        </div>
    </div>

    <?php echo $this->element('login');?>
    <?php
        echo $this->fetch('script');
    ?>
</body>
</html>