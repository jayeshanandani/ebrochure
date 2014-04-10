<div class="brochurePages form">
<?php echo $this->Form->create('BrochurePage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Brochure Page'); ?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('brochure_id');
		echo $this->Form->input('pageIndex');
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BrochurePage.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BrochurePage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Brochure Pages'), array('action' => 'index')); ?></li>
	</ul>
</div>
