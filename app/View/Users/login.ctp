<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('username',array('autocomplete'=>'off'));
        echo $this->Form->input('password',array('autocomplete'=>'off'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>
<div  class="actions">
<?php echo $this->Html->link(__('Forgot Password'), array('controller'=>'Users','action' => 'lost_password')); ?>
</div>
