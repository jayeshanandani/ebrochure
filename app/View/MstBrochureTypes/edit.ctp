<?php echo $this->element('navigation'); ?>
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

