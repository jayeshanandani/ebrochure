<div class="mstBrochures form">
<?php echo $this->Form->create('MstBrochure',array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Mst Brochure'); ?></legend>
	<?php
	    echo $this->Form->input('institute_id');
	    echo $this->Form->input('type_id');
		echo $this->Form->input('name');

		echo $this->Form->input('description');

		//echo $this->Form->input('creator_id');
		//echo $this->Form->input('modifier_id');
		//echo $this->Form->input('bgMusic',array('type'=>'file'));
		echo $this->Form->input('bgColor',array('type'=>'color'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mst Brochures'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Add Pages to the task'), array('controller' => 'brochurepages', 'action' => 'add')); ?> </li>
	</ul>
</div>
