<?php echo $this->element('navigation'); ?>
<?php echo $this->Html->script('populatedropdowns'); ?>
<div class="pageTexts form">
<?php echo $this->Form->create('PageText'); ?>
	<fieldset>
		<legend><?php echo __('Add Page Text'); ?></legend>
		<?php
$url             = $this->Html->url(array(
    'controller' => 'BrochurePages',
    'action' => 'list_pages',
    'ext' => 'json'
));

$emptyPages = count($pages) > 0 ? Configure::read('Select.defaultAfter') : array(
    '0' => Configure::read('Select.naBefore') . __('Select Brochure First') . Configure::read('Select.naAfter')
);
echo $this->Form->input('brochure_id', array(
    'id' => 'brochures',
    'empty' => 'Please Select First',
    'rel' => $url
));
echo $this->Form->input('page_id', array(
    'id' => 'pages',
    'empty' => $emptyPages
));

		echo $this->Form->input('textContent',array('type'=>'textarea','autocomplete'=>'off'));
		echo $this->Form->input('xPos',array('autocomplete'=>'off'));
		echo $this->Form->input('yPos',array('autocomplete'=>'off'));
		echo $this->Form->input('txtWidth',array('autocomplete'=>'off'));
		echo $this->Form->input('txtHeight',array('autocomplete'=>'off'));
		echo $this->Form->input('txtFontsize',array('autocomplete'=>'off'));
		echo $this->Form->input('txtColor',array('type'=>'color'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>