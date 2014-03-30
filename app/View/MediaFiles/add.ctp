<div class="mediaFiles form">
<?php echo $this->Form->create('MediaFile',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Media File'); ?></legend>
	<?php



		echo $this->Form->input('filename',array('type' => 'file'));


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
