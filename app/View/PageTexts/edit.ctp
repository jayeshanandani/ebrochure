<?php echo $this->element('navigation'); ?>
<div class="pageTexts form">
<?php echo $this->Form->create('PageText'); ?>
	<fieldset>
		<legend><?php echo __('Edit Page Text'); ?></legend>
	<?php
		echo $this->Form->input('textContent');
		echo $this->Form->input('xPos');
		echo $this->Form->input('yPos');
		echo $this->Form->input('txtWidth');
		echo $this->Form->input('txtHeight');
		echo $this->Form->input('txtFontsize');
		echo $this->Form->input('txtColor',array('type'=>'color'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Page Texts'), array('action' => 'index')); ?></li>
	</ul>
</div>
