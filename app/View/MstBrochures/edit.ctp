<div class="mstBrochures form">
<?php echo $this->Form->create('MstBrochure'); ?>
	<fieldset>
		<legend><?php echo __('Edit Mst Brochure'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('type_id');
		echo $this->Form->input('description');
		//echo $this->Form->input('institute_id');
		//echo $this->Form->input('creator_id');
		//echo $this->Form->input('modifier_id');
		echo $this->Form->input('bgMusic');
		echo $this->Form->input('bgColor');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MstBrochure.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MstBrochure.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mst Brochures'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Institutes'), array('controller' => 'institutes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institute'), array('controller' => 'institutes', 'action' => 'add')); ?> </li>
	</ul>
</div>
