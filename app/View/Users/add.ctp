<?php echo $this->element('navigation'); ?>
<div class="users form">
<?php echo $this->Form->create('User',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
	  echo $this->Form->input('role_id', array('options' => array('1'=>'admin','2'=> 'user')));
		echo $this->Form->input('username',array('autocomplete'=>'off'));
		echo $this->Form->input('pwd', array('type' => 'password','label'=>'Password'));
    echo $this->Form->input('pwd_repeat', array('type' => 'password','label'=>'Password repeat'));
		echo $this->Form->input('firstname',array('autocomplete'=>'off'));
		echo $this->Form->input('middlename',array('autocomplete'=>'off'));
		echo $this->Form->input('lastname',array('autocomplete'=>'off'));
		echo $this->Form->input('email',array('autocomplete'=>'off'));
    echo $this->Form->input('contact',array('autocomplete'=>'off'));
    echo $this->Form->input('securityque', array(
    	'options' => array('What is your nick name'=>'What is your nick name','What is your favorite cuisine'=> 'What is your favorite cuisine','The name of your native'=> 'The name of your native','The name of your favorite teacher'=> 'The name of your favorite teacher', 'Your favorite technology'=>'Your favorite technology'),'empty' => '(choose one)'));
    echo $this->Form->input('securityans',array('autocomplete'=>'off'));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		</ul>
</div>
