<div class="tasks form">
<?php echo $this->Form->create('Task'); ?>
	<fieldset>
		<legend><?php echo __('Add Task'); ?></legend>
	<?php
		echo $this->Form->input('institute_id');
		echo $this->Form->input('task',array(
    	'options' => array('Brochure'=>'Brochure','E-Invitations'=> 'E-Invitations','Flyers'=> 'Flyers','Newsletter'=> 'Newsletter', 'Announcement'=>'Announcement'),'empty' => '(choose one)'));
		//echo $this->Form->input('creator_id');
		//echo $this->Form->input('modifier_id');
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
		<li><?php echo $this->Html->link(__('New Institute'), array('controller' => 'institutes', 'action' => 'add')); ?> </li>
	</ul>
</div>
