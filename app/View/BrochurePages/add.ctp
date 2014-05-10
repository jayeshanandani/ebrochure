<?php echo $this->element('navigation'); ?>
<div class="brochurePages form">
<?php echo $this->Form->create('BrochurePage'); ?>
	<fieldset>
		<legend><?php echo __('Add Brochure Page'); ?></legend>
	<?php
		echo $this->Form->input('brochure_id');
		//echo $this->Form->input('pageIndex');
		echo $this->Form->input('isForeGround');
		echo $this->Form->input('hasText');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
