<?php echo $this->element('navigation'); ?>
<div class="brochurePages form">
<?php echo $this->Form->create('BrochurePage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Brochure Page'); ?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('brochure_id');
		echo $this->Form->input('isForeGround');
		echo $this->Form->input('hasText');
		//echo $this->Form->input('media_id');
		//echo $this->Form->input('isActive');
		//echo $this->Form->input('creator_id');
		//echo $this->Form->input('modifier_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
