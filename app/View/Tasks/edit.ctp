<div class="tasks form">
<?php echo $this->Form->create('Task'); ?>
    <fieldset>
        <legend><?php echo __('Edit Task'); ?></legend>
    <?php
        echo $this->Form->input('task');
        echo $this->Form->input('title');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
 
        
        <li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Institutes'), array('controller' => 'institutes', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('My Dashboard'), array('controller' => 'Users', 'action' => 'user_info')); ?> </li>
    </ul>
</div>