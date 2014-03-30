<div class="users form">
<?php echo $this->Form->create('User',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
	  echo $this->Form->input('role_id', array('options' => array('1'=>'admin','2'=> 'user')));
		echo $this->Form->input('username');
		echo $this->Form->input('pwd', array('type' => 'password','label'=>'Password'));
    echo $this->Form->input('pwd_repeat', array('type' => 'password','label'=>'Password repeat'));
		echo $this->Form->input('firstname');
		echo $this->Form->input('middlename');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email');
    echo $this->Form->input('contact');
    echo $this->Form->input('securityque', array(
    	'options' => array('What is your nick name'=>'What is your nick name','What is your favorite cuisine'=> 'What is your favorite cuisine','The name of your native'=> 'The name of your native','The name of your favorite teacher'=> 'The name of your favorite teacher', 'Your favorite technology'=>'Your favorite technology'),'empty' => '(choose one)'));
    echo $this->Form->input('securityans');

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'user_info')); ?></li>
		<li><?php echo $this->Html->link(__('My Dashboard'), array('controller'=>'Users','action' => 'user_info')); ?></li>
	</ul>
</div>
