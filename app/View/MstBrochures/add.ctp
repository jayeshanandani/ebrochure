<?php echo $this->element('navigation'); ?>
<div class="mstBrochures form">
<?php echo $this->Form->create('MstBrochure',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Mst Brochure'); ?></legend>
	<?php
	    echo $this->Form->input('institute_id');
	    echo $this->Form->input('type_id');
		echo $this->Form->input('name',array('autocomplete'=>'off'));
		echo $this->Form->input('description', array('type' =>'textarea','autocomplete'=>'off' ));
		echo $this->Form->input('bgColor',array('type'=>'color'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
