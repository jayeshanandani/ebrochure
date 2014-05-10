<?php echo $this->element('navigation'); ?>
<div class="mstBrochureTypes form">
<?php echo $this->Form->create('MstBrochureType'); ?>
	<fieldset>
		<legend><?php echo __('Add Mst Brochure Type'); ?></legend>
	<?php
		echo $this->Form->input('name',array('autocomplete'=>'off'));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
