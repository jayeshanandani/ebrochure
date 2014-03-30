<div class="mediaFiles index">
	<h2><?php echo __('Media Files'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('creator_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modifier_id'); ?></th>
			<th><?php echo $this->Paginator->sort('isActive'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>-->
			<th><?php echo $this->Paginator->sort('filename'); ?></th>
			<!--<th class="actions"><?php echo __('Actions'); ?></th>-->
	</tr>
	<?php foreach ($mediaFiles as $mediaFile): ?>
	<tr>
		<!--<td><?php echo h($mediaFile['MediaFile']['id']); ?>&nbsp;</td>-->
		<!--<td>
			<?php echo $this->Html->link($mediaFile['User']['id'], array('controller' => 'users', 'action' => 'view', $mediaFile['User']['id'])); ?>
		</td>-->
		<!--<td><?php echo h($mediaFile['MediaFile']['created']); ?>&nbsp;</td>
		<td><?php echo h($mediaFile['MediaFile']['creator_id']); ?>&nbsp;</td>
		<td><?php echo h($mediaFile['MediaFile']['modified']); ?>&nbsp;</td>
		<td><?php echo h($mediaFile['MediaFile']['modifier_id']); ?>&nbsp;</td>
		<td><?php echo h($mediaFile['MediaFile']['isActive']); ?>&nbsp;</td>
		<td><?php echo h($mediaFile['MediaFile']['name']); ?>&nbsp;</td>-->
		<td><?php echo h($mediaFile['MediaFile']['filename']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mediaFile['MediaFile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mediaFile['MediaFile']['id'])); ?>
			<?php
            if($mediaFile['MediaFile']['isActive'] == 1){
                echo $this->Form->postLink(__('Active'), array('action' => 'activate', $mediaFile['MediaFile']['id']), null, __('Are you sure you want to deactivate # %s?', $mediaFile['MediaFile']['id']));
            }
        ?>
        <?php
            if($mediaFile['MediaFile']['isActive'] == 0){
                echo $this->Form->postLink(__('Deactive'), array('action' => 'deactivate', $mediaFile['MediaFile']['id']), null, __('Are you sure you want to activate # %s?', $mediaFile['MediaFile']['id']));
            }
        ?>
        <?php echo $this->Html->link(__('View pdf'), array('action' => 'viewpdf')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Media File'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('My Dashboard'), array('controller' => 'users', 'action' => 'user_info')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>-->
	</ul>
</div>
