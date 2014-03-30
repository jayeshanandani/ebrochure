<div class="mstMedia form">
<?php echo $this->Form->create('MstMedia'); ?>
	<fieldset>
		<legend><?php echo __('Add Mst Media'); ?></legend>
	<?php
		echo $this->Form->input('creator_id');
		echo $this->Form->input('modifier_id');
		echo $this->Form->input('isActive');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mst Media'), array('action' => 'index')); ?></li>
	</ul>
</div>
