<div class="mstBrochureTypes form">
<?php echo $this->Form->create('MstBrochureType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Mst Brochure Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		//echo $this->Form->input('isActive');
		//echo $this->Form->input('creator_id');
		//echo $this->Form->input('modifier_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MstBrochureType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MstBrochureType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mst Brochure Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
