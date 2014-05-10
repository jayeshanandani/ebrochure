<?php echo $this->element('navigation'); ?>
<div class="institutes form">
<?php echo $this->Form->create('Institute'); ?>
	<fieldset>
		<legend><?php echo __('Edit Institute'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		//echo $this->Form->input('creator_id');
		//echo $this->Form->input('modifier_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
