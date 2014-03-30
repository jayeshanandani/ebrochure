<div class="mediaFiles form">
<?php echo $this->Form->create('MediaFile'); ?>
	<fieldset>
		<legend><?php echo __('Edit Media File'); ?></legend>
	<?php
		//echo $this->Form->input('id');
		//echo $this->Form->input('user_id');
		//echo $this->Form->input('creator_id');
		//echo $this->Form->input('modifier_id');
		//echo $this->Form->input('isActive');
		echo $this->Form->input('name');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		
		<li><?php echo $this->Html->link(__('List Media Files'), array('action' => 'index')); ?></li>
		
		<li><?php echo $this->Html->link(__('My Dashboard'), array('controller' => 'users', 'action' => 'user_info')); ?> </li>
	</ul>
</div>
