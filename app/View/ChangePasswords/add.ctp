<div class="changePasswords form">
<?php echo $this->Form->create('ChangePassword'); ?>
	<fieldset>
		<legend><?php echo __('Add Change Password'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('timemodified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Change Passwords'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
