<?php echo $this->element('navigation'); ?>
<div class="users form">
<?php echo $this->Form->create('User',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('firstname');
		echo $this->Form->input('middlename');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email');
	 	echo $this->Form->input('filename',array('type' => 'file'));
		echo $this->Form->input('contact');
		echo $this->Form->input('securityque');
		echo $this->Form->input('securityans');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
