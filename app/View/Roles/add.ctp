<div class="mstRoles form">
<?php echo $this->Form->create('MstRole'); ?>
	<fieldset>
		<legend><?php echo __('Add Mst Role'); ?></legend>
	<?php
		//echo $this->Form->input('timecreated');
		//echo $this->Form->input('creator_id');
		//echo $this->Form->input('timemodified');
		//echo $this->Form->input('modifier_id');
		//echo $this->Form->input('isActive');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mst Roles'), array('action' => 'index')); ?></li>
	</ul>
</div>
