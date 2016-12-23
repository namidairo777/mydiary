

<div class="users index">
    <h2><?php echo __('Users'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('email'); ?></th>
            <th><?php echo $this->Paginator->sort('password'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('nationality'); ?></th>
            <th><?php echo $this->Paginator->sort('sex'); ?></th>
            <th><?php echo $this->Paginator->sort('occupation'); ?></th>
            <th><?php echo $this->Paginator->sort('native_language'); ?></th>
            <th><?php echo $this->Paginator->sort('study_language1'); ?></th>
            <th><?php echo $this->Paginator->sort('study_language2'); ?></th>
            <th><?php echo $this->Paginator->sort('introduction'); ?></th>
            <th><?php echo $this->Paginator->sort('diaries_written'); ?></th>
            <th><?php echo $this->Paginator->sort('correction_made'); ?></th>
            <th><?php echo $this->Paginator->sort('correction_recieved'); ?></th>
            <th><?php echo $this->Paginator->sort('pic_300'); ?></th>
            <th><?php echo $this->Paginator->sort('pic_30'); ?></th>
            <th><?php echo $this->Paginator->sort('pic_50'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['mail']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['password']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
                <td><?php echo h($user['Country']['text']); ?>&nbsp;</td>
                <td><?php echo h($user['Sex']['text']); ?>&nbsp;</td>
                <td><?php echo h($user['Occupation']['text']); ?>&nbsp;</td>
                <td><?php echo h($user['Native_language']['text']); ?>&nbsp;</td>
                <td><?php echo h($user['Study_language1']['text']); ?>&nbsp;</td>
                <td><?php echo h($user['Study_language2']['text']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['introduction']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['diaries_written']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['correction_made']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['correction_recieved']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['pic_300']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['pic_30']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['pic_50']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'register')); ?></li>
        <li><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></li>
    </ul>
</div>
