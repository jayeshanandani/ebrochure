<?php echo $this->element('navigation'); ?>
<?php echo $this->Html->script('populatedropdowns'); ?>

<div class="mediaFiles form">

<?php echo $this->Form->create('MediaFile',array('type' => 'file')); ?>
<?php $this->Form->unlockField('filename');
		 $this->Form->unlockField('page_id'); ?>
	<fieldset>

		<legend><?php echo __('Add Media File'); ?></legend>
		<?php
       $url = $this->Html->url(array(
      'controller' => 'BrochurePages',
      'action' => 'list_pages',
       'ext' => 'json'
       ));

     $emptyPages = count($mediafiles) > 0 ? Configure::read('Select.defaultAfter') : array(
     '0' => Configure::read('Select.naBefore') . __('Select') . Configure::read('Select.naAfter')
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




		echo $this->Form->input('filename', array('type' => 'file'));
    echo $this->Form->input('imagename', array('type' => 'hidden'));



	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
