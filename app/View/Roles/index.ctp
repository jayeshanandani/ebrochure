<div class="mstRoles index">
	<h2><?php echo __('Mst Roles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('creator_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modifier_id'); ?></th>
			<th><?php echo $this->Paginator->sort('isActive'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($mstRoles as $mstRole): ?>
	<tr>
		<td><?php echo h($mstRole['MstRole']['id']); ?>&nbsp;</td>
		<td><?php echo h($mstRole['MstRole']['created']); ?>&nbsp;</td>
		<td><?php echo h($mstRole['MstRole']['creator_id']); ?>&nbsp;</td>
		<td><?php echo h($mstRole['MstRole']['modified']); ?>&nbsp;</td>
		<td><?php echo h($mstRole['MstRole']['modifier_id']); ?>&nbsp;</td>
		<td><?php echo h($mstRole['MstRole']['isActive']); ?>&nbsp;</td>
		<td><?php echo h($mstRole['MstRole']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mstRole['MstRole']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mstRole['MstRole']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mstRole['MstRole']['id']), null, __('Are you sure you want to delete # %s?', $mstRole['MstRole']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mst Role'), array('action' => 'add')); ?></li>
	</ul>
</div>
