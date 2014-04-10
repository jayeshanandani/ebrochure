<div class="pageTexts form">
<?php echo $this->Form->create('PageText'); ?>
	<fieldset>
		<legend><?php echo __('Edit Page Text'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('page_id');
		echo $this->Form->input('textContent');
		echo $this->Form->input('xPos');
		echo $this->Form->input('yPos');
		echo $this->Form->input('txtWidth');
		echo $this->Form->input('txtHeight');
		echo $this->Form->input('txtFontsize');
		echo $this->Form->input('txtColor');
		echo $this->Form->input('isActive');
		echo $this->Form->input('creator_id');
		echo $this->Form->input('modified_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PageText.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PageText.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Page Texts'), array('action' => 'index')); ?></li>
	</ul>
</div>