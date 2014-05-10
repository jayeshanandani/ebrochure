<?php echo $this->element('navigation'); ?>
<div class="mediaFiles view">
<h2><?php echo __('Media File'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mediaFile['MediaFile']['id']); ?>
			&nbsp;
		</dd>
		<!--<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mediaFile['MediaFile']['id'], array('controller' => 'users', 'action' => 'view', $mediaFile['mediaFile']['id'])); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($mediaFile['MediaFile']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator Id'); ?></dt>
		<dd>
			<?php echo h($mediaFile['MediaFile']['creator_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($mediaFile['MediaFile']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier Id'); ?></dt>
		<dd>
			<?php echo h($mediaFile['MediaFile']['modifier_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsActive'); ?></dt>
		<dd>
			<?php echo h($mediaFile['MediaFile']['isActive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($mediaFile['MediaFile']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($mediaFile['MediaFile']['type']); ?>
			&nbsp;
		</dd>
		<?php $image = array('jpg','png','jpeg');
		      if (in_array($mediaFile['MediaFile']['type'],$image)) {
		?>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo $this->Html->image('uploads/'.$mediaFile['MediaFile']['name'].'.'.$mediaFile['MediaFile']['type']); }?>
			&nbsp;
		</dd>
		<?php $media = array('pdf');
		      if (in_array($mediaFile['MediaFile']['type'],$media)) {
		?>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo $this->Html->image('webroot/img/uploads/'.$mediaFile['MediaFile']['name'].'.'.$mediaFile['MediaFile']['type']); }?>
			&nbsp;
		</dd>

	</dl>
</div>
