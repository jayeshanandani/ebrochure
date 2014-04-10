<div class="mstBrochureTypes form">
<?php echo $this->Form->create('MstBrochureType'); ?>
	<fieldset>
		<legend><?php echo __('Add Mst Brochure Type'); ?></legend>
	<?php
		echo $this->Form->input('name');

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mst Brochure Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
