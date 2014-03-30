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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		
		<li><?php echo $this->Html->link(__('List Institutes'), array('action' => 'index')); ?></li>
	</ul>
</div>
