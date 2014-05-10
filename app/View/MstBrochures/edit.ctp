<?php echo $this->element('navigation'); ?>
<div class="mstBrochures form">
<?php echo $this->Form->create('MstBrochure'); ?>
	<fieldset>
		<legend><?php echo __('Edit Mst Brochure'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description',array('type' => 'textarea'));
		//echo $this->Form->input('institute_id');
		//echo $this->Form->input('creator_id');
		//echo $this->Form->input('modifier_id');
		echo $this->Form->input('bgMusic',array('type' => 'file'));
		echo $this->Form->input('bgColor',array('type' => 'color'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
