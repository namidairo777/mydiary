<div class="user-right">
    <?php echo $this->Html->image($page_user['User']['pic'], array('style' => 'width:300px'));?>
    <?php if($page_user['User']['id']==AuthComponent::user('id')){
        echo $this->element('upload_image');
    }?>
    <h3><b><?=$page_user['User']['name']?></b></h3>
    <div class="user-language">
        <dl>
            <dt><span class="glyphicon glyphicon-comment"></span>Native language</dt>
            <dd><?=$page_user['Native_language']['text']?></dd>
            <dt><span class="glyphicon glyphicon-pencil"></span>Language of study</dt>
            <dd>
                <?=$page_user['Study_language1']['text']?>
                <br/>
                <?=$page_user['Study_language2']['text']?>
            </dd>
        </dl>
    </div>
    <hr>
    <div class="statistic">
        <table>
            <tr>
                <td>
                    <h3><?=$page_user['User']['diaries_written']?></h3>
                    <p>Entries<br/> written</p>
                </td>
                <td>
                    <h3><?=$page_user['User']['correction_made']?></h3>
                    <p>Corrections<br/> made</p>
                </td>
                <td>
                    <h3><?=$page_user['User']['correction_recieved']?></h3>
                    <p>Corrections<br/> recieved</p>
                </td>
            </tr>
        </table>
    </div>    <hr>
    <div class="user-profile">
        <table>
            <tr>
                <td>ID</td>
                <td><?=$page_user['User']['id']?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?=$page_user['User']['email']?></td>
            </tr>
            <tr>
                <td>Nationality</td>
                <td><?=$page_user['Country']['text']?></td>
            </tr>
            <tr>
                <td>Sex</td>
                <td><?=$page_user['Sex']['text']?></td>
            </tr>
            <tr>
                <td>Occupation</td>
                <td><?=$page_user['Occupation']['text']?></td>
            </tr>
        </table>
    </div>
    <hr>
    <div class="score">
        <h4>Scores:</h4>
        <p>11190</p>
    </div>
    <hr>
    <div class="ranking">
        <h4>Ranking:</h4>
        <p><span>123</span><span>/</span><span>3242</span></p>
    </div>
    <hr>
    <?php switch ($friend_status) {
            case 'already':
            ?>
            <div class="communication">
                <a href="#" class="btn btn-primary btn-lg" disabled>We are friends</a>
                <?=$this->Html->link('Send message','/home/messages/'.$page_user['User']['id'],
                    array('class' => 'btn btn-default btn-lg')
                )?>
            </div>
            <?php
                break;
            case 'from':
            ?>
            <div class="communication">
                <?=$this->Html->link('Accept friend-request',
                    array(
                        'controller' => 'friendRequests',
                        'action' => 'accept',
                        'user_from' => $page_user['User']['id'],
                        'user_to' => AuthComponent::user('id')
                    ),
                    array('class' => 'btn btn-primary btn-lg')
                )?>
                <?=$this->Html->link('Send message','/home/messages/'.$page_user['User']['id'],
                    array('class' => 'btn btn-default btn-lg')
                )?>
            </div>

            <?php                
                break;
            case 'to':
            ?>
            <div class="communication">
                <a href="#" class="btn btn-primary btn-lg" disabled>Not accepted yet</a>
                <?=$this->Html->link('Send message','/home/messages/'.$page_user['User']['id'],
                    array('class' => 'btn btn-default btn-lg')
                )?>
            </div>

            <?php    
                break;
            case 'notYet':
            ?>
            <div class="communication">
                <?=$this->Html->link('Add friend',
                    array(
                        'controller' => 'friendRequests',
                        'action' => 'create',
                        'user_from' => AuthComponent::user('id'),
                        'user_to' => $page_user['User']['id']
                    ),
                    array('class' => 'btn btn-primary btn-lg')
                )?>
                <?=$this->Html->link('Send message','/home/messages/'.$page_user['User']['id'],
                    array('class' => 'btn btn-default btn-lg')
                )?>
            </div>

            <?php    
                break;
            default:
            ?>

            <?php    
                break;
        }
    ?>
    
</div>