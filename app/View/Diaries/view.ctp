<div class="user-left">
    <hr>
    <div class="title"><?php echo h($diary['Diary']['title'])?></div>
    <div class="addToNote">
        <div  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="add to notebook">

            <?php echo $this->Form->create(
                'Notebook',
                array(
                    'role' => 'form',
                    'url' =>array(
                        'controller' => 'notebooks',
                        'action' => 'add'
                    )
                )
            );
            ?>
            <input name="diary_id" value="<?=$diary['Diary']['id']?>" style="display:none">
            <input name="url" value="<?=$this->here?>" style="display:none">
            <input name="type" value="1" style="display:none">
            <span class="addNote glyphicon glyphicon-book"></span>

            <?php echo $this->Form->end();?>
        </div> 
    </div>
    <div class="correction-note-box">

            <button  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="it's good">
                <?=$this->Html->link('','/Diaries/good?k='.$diary['Diary']['id'],
                    array('class' => 'glyphicon glyphicon-thumbs-up')
                )?>

            </button>
        </div>
    <br/><hr>
    <div class="diary-main">
        <div class="tools">
            <span class="time"><?=h($diary['Diary']['created'])?></span>
            <div class="tools-view">
                <ul>
                    <li><span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="view"> <?=h($diary['Diary']['views'])?></span></li>
                    <li><span class="glyphicon glyphicon-heart" data-toggle="tooltip" data-placement="top" title="hearts"> <?=h($diary['Diary']['hearts'])?></span></li>
                    <li><span class="glyphicon glyphicon-ok" data-toggle="tooltip" data-placement="top" title="corrections"> <?=h($diary['Diary']['corrections'])?></span></li>
                    <li><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="written language"> <?=h($diary['Language']['text'])?></span></li>
                </ul>
            </div>
        </div>
        <div class="view-style">
            <button id="view-style" class="btn btn-sm btn-default" title="vertical-view">vertical view</button>
        </div>
        <div class="diary-body">
            <div id="diary-ori" class="diary-normal">
                <p>
                    <?=str_replace(PHP_EOL,'<br />', $diary['Diary']['text_ori'])?>
                </p>
            </div>
            <div id="diary-mo" class="diary-normal">
                <p>
                    <?=str_replace(PHP_EOL,'<br />',$diary['Diary']['text_mo'])?>
                </p>
            </div>
        </div>
    </div>
    <hr>
    <a href="#user-correction" id="correct-link" class="btn btn-primary btn-lg">correct and comment</a>
    <hr>
    <!--start showing users' corrections-->
    <?php 
    
    foreach ($corrections as $correction) {
        
    ?>

    <div id="<?=$correction['Correction']['id']?>" class="correct-comment-entry">
        <div class="entry-head">
            <?php echo $this->Html->image($correction['User']['pic'], array('class' => 'head-30'));?>
            <a class="username" href="userHome.html"><?=$correction['User']['name']?></a>
            <span class="time"><?=$correction['Correction']['created']?></span>
        </div>
        <div class="correction-body">
            <?php 
            $sentence_count = 0;
            foreach ($diary['DiarySentence'] as $diarySentence){
                ?>
                
            
            <div class="correction-box">
                <ul class="correction-entry">
                    <li>
                        <span class="glyphicon glyphicon-pencil"></span>
                        <?=$diarySentence['text']?>
                    </li>
                    <li>
                        <span class="glyphicon glyphicon-ok"></span>
                        <?php
                            $i = 0;
                            $flag = false;
                            foreach ($correction['CorrectionSentence'] as $correction_sentence) {
                                if($correction_sentence['sentence_id']==$sentence_count){
                                    echo h($correction_sentence['text']);
                                    if($correction['CommentSentence'][$i]['text']!=''){
                                        echo ' </li><li><p class="correct-comment">';

                                        echo h($correction['CommentSentence'][$i]['text']);
                                        echo '</p></li>';

                                    }else{
                                        echo '';

                                    }
                                    $flag = true;
                                    echo '</ul>';
                                    ?>
                                    <div class="addToNote">
                                        <button  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="add to notebook">

                                            <?php echo $this->Form->create(
                                                'Notebook',
                                                array(
                                                    'role' => 'form',
                                                    'url' =>array(
                                                        'controller' => 'notebooks',
                                                        'action' => 'add'
                                                    )
                                                )
                                            );
                                            ?>
                                            <input name="diary_id" value="<?=$diary['Diary']['id']?>" style="display:none">
                                            <input name="correction_sentence_id" value="<?=$correction_sentence['id']?>" style="display:none">
                                            <input name="text_ori" value="<?=$diarySentence['text']?>" style="display:none">
                                            <input name="text_correct" value="<?=$correction_sentence['text']?>" style="display:none">
                                            <input name="url" value="<?=$this->here?>" style="display:none">
                                            <input name="type" value="3" style="display:none">
                                            <span class="addNote glyphicon glyphicon-book"></span>
                                            <?php echo $this->Form->end()?>
                                        </button>
                                    </div>
                                    <div class="correction-note-box">

                                        <button  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="it's good">
                                            <?=$this->Html->link('','/CorrectionSentences/good?k='.$correction_sentence['id'],
                                                array('class' => 'glyphicon glyphicon-thumbs-up')
                                            )?>

                                        </button>
                                    </div>
                                    <div class="addToNote">+<?=$correction_sentence['hearts']?></div>
                                    

                                    <?php
                                    break;
                                }
                                else{
                                    $flag = false;
                                }                               
                                $i++;
                            }
                            if(!$flag){
                                echo '(perfect!)</ul>';
                            }
                        ?>


                <hr>
            </div>
            <?php
            $sentence_count++;
            }
            ?>

        </div>
        <div class="entry-comment">
            <p>
                <?=$correction['Comment'][0]['text']?>
            </p>
            <div class="addToNote">
                <button  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="add to notebook">

                    <?php echo $this->Form->create(
                        'Notebook',
                        array(
                            'role' => 'form',
                            'url' =>array(
                                'controller' => 'notebooks',
                                'action' => 'add'
                            )
                        )
                    );
                    ?>
                    <input name="diary_id" value="<?=$diary['Diary']['id']?>" style="display:none">
                    <input name="correction_id" value="<?=$correction['Correction']['id']?>" style="display:none">
                    <input name="url" value="<?=$this->here?>.'#'.$correction['Correction']['id']?>" style="display:none">
                    <input name="type" value="2" style="display:none">
                    <span class="addNote glyphicon glyphicon-book"></span>
                    <?php echo $this->Form->end()?>
                </button>
            </div>
            <div class="correction-note-box">
            
                <button  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="bottom" title="it's good">
                    <?=$this->Html->link('','/Corrections/good?k='.$correction['Correction']['id'],
                        array('class' => 'glyphicon glyphicon-thumbs-up')
                    )?>
                </button>
            </div>
            <div class="addToNote">+<?=$correction['Correction']['hearts']?></div>
            
        </div>
        <div style="clear: both"></div>
        <p><span class="glyphicon glyphicon-star"></span>Thanks for your correction</p>
    </div>
        <?php
        $comment_first = true;
        foreach ($comments as $comment) {

            if($comment['Comment']['correction_id']==$correction['Correction']['id']){
                if($comment_first){$comment_first = false;continue;}
        ?>
    <div class="comment-entry">
        <?php echo $this->Html->image($comment['User']['pic'], array('class' => 'head-30'));?>
        <div class="comment-body">
            <a class="username" href="userHome.html"><?=$comment['User']['name']?></a>
            <span class="time"><?=$comment['Comment']['created']?></span>
            <br/>
            <p><?=$comment['Comment']['text']?></p>
        </div>
    </div>
        <?php
            }
        }
        ?>
    <div class="correction-reply">
        <?php echo $this->Form->create(
            'Comment',
            array(
                'role' => 'form',
                'url' =>array(
                    'controller' => 'Comments',
                    'action' => 'post'
                    )
                )
            );
        ?>
        <input name="user_id" value="<?=$diary['User']['id']?>" style="display:none">
        <input name="diary_id" value="<?=$diary['Diary']['id']?>" style="display:none">
        <input name="data[Comment][correction_id]" value="<?=$correction['Correction']['id']?>" style="display:none">
        <?php echo $this->Html->image(AuthComponent::user('pic'), array('class' => 'head-30'));?>
        <div class="comment-body">
            <textarea class="form-control new-comment" name="data[Comment][text]" placeholder="comment" style="max-width: 630px" rows="2"></textarea>
        </div>
        </form>
        <?php echo $this->Form->end()?>
    </div>
    <hr>
    <?php
    }
    ?>
    <!--end showing users' corrections-->

    <div style="clear: both"></div>

    <!--start user's corrections-->

    <?php if ($diary['User']['id']!=AuthComponent::user('id')) {?>
        
    
    <div id="user-correction">
        <div class="correction-title">
            <h5><b>Post your correction and comment</b></h5>
        </div>

        <?php echo $this->Form->create(
            null,
            array(
                'role' => 'form',
                'url' =>array(
                    'controller' => 'Diaries',
                    'action' => 'correct'
                    )
                )
            );
        ?>
            <input name="user_id" value="<?=$diary['User']['id']?>" style="display:none">
            <input name="diary_id" value="<?=$diary['Diary']['id']?>" style="display:none">
            <input name="diary_url" value="<?=$this->here?>" style="display:none">
            <div class="correct-sentence" id="correct-sentence">
                <div class="post-btn">
                    <a href="#user-correction" class="btn btn-primary btn-sm">confirm and post</a>
                </div>
                <?php
                $count=0;
                foreach($diary['DiarySentence'] as $diary_sentence){
                    if($count==0){
                ?>
                <div>
                    <h4>Title</h4>
                </div>
                <hr>
                <div class="correct-sentence-title">
                    <div class="sentence" id="sentence_0">
                        <?=h($diary_sentence['text'])?>
                    </div>
                    <div class="correction" id="correction_0" style="display: none;">
                        <?php foreach($corrections as $correction){
                            foreach($correction['CorrectionSentence'] as $correction_sentence) {
                                if($correction_sentence['sentence_id']==$count){
                                ?>
                                <ul class="correction_field">
                                    <li class="correct">
                                        <span class="glyphicon glyphicon-ok"></span><?=$correction_sentence['text']?>
                                    </li>
                                </ul>
                            <?php
                                }
                            }
                        }?>
                    </div>
                    <a class="correction-btn" title="#correction_0">show corrections</a>
                    <a id="correct-btn_0" class="btn btn-xs btn-primary correct-btn" name="#post_correction_0" title="show">Correct</a>
                    <div id="post_correction_0" style="display: none;">
                        <textarea name="correction_sentence_<?=$count?>" style="max-width:638px"  class="form-control" rows="2"></textarea>
                        <br>Add a description or comment here.(Optional)<br>
                        <textarea name="comment_sentence_<?=$count?>" placeholder="Describe in any language" style="max-width:638px"  class="form-control" rows="1"></textarea>
                    </div>
                    <hr>
                </div>                
                <div>
                    <h4>Body</h4>
                    <hr>
                </div>
                <?php }else{
                    ?>
                <div class="correct-sentence-body">
                    <div class="sentence" id="sentence_1">
                        <?=h($diary_sentence['text'])?>
                    </div>
                    <div class="correction" id="correction_<?=$count?>" style="display: none;">
                        <?php foreach($corrections as $correction){
                            foreach($correction['CorrectionSentence'] as $correction_sentence) {
                                if($correction_sentence['sentence_id']==$count){
                                    ?>
                                    <ul class="correction_field">
                                        <li class="correct">
                                            <span class="glyphicon glyphicon-ok"></span><?=$correction_sentence['text']?>
                                        </li>
                                    </ul>
                                <?php
                                }
                            }
                        }?>
                    </div>
                    <a class="correction-btn" title="#correction_<?=$count?>">show corrections</a>
                    <a id="correct-btn_1" class="btn btn-xs btn-primary correct-btn" name="#post_correction_<?=$count?>" title="show">Correct</a>
                    <div id="post_correction_<?=$count?>" style="display: none;">
                        <textarea style="max-width:638px" name="correction_sentence_<?=$count?>"  class="form-control" rows="2"></textarea>
                        <br>Add a description or comment here.(Optional)<br>
                        <textarea name="comment_sentence_<?=$count?>" placeholder="Describe in any language" style="max-width:638px"  class="form-control" rows="1"></textarea>
                    </div>
                    <hr>
                </div>
                <?php 
                    }
                    $count++;
                }
                ?>
                <input name="sentence_count" value="<?=$count?>" style="display:none">
                <div class="comment-box">
                    <div class="entry-head">
                        <?php echo $this->Html->image(AuthComponent::user('pic'), array('class' => 'head-30'));?>
                        <a class="username" href="userHome.html">namidairo</a>
                    </div>
                    <textarea name="comment" id="comment" placeholder="your opinion" style="max-width:638px"  class="form-control" rows="4"></textarea>
                </div>
                <div class="post-btn">
                    <?php echo $this->Form->end(
                         array('label' => 'confirm and post',
                             'class' => 'btn btn-primary btn-sm'));
                    ?>
                </div>
            </div>
        </form>
    </div>
    <?php
        }
    ?>
    <!--end user's corrections-->

</div>
    
<?php echo $this->element('user_sidebar')?>