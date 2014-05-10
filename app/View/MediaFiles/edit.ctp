<?php echo $this->element('navigation'); ?>
<div class="mediaFiles form">
<?php echo $this->Form->create('MediaFile'); ?>
	<fieldset>
		<legend><?php echo __('Edit Media File'); ?></legend>
	<?php
		//echo $this->Form->input('id');
		//echo $this->Form->input('user_id');
		//echo $this->Form->input('creator_id');
		//echo $this->Form->input('modifier_id');
		//echo $this->Form->input('isActive');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>