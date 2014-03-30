<div class="mstMedia index">
	<h2><?php echo __('Mst Media'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('creator_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modifier_id'); ?></th>
			<th><?php echo $this->Paginator->sort('isActive'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($mstMedia as $mstMedia): ?>
	<tr>
		<td><?php echo h($mstMedia['MstMedia']['id']); ?>&nbsp;</td>
		<td><?php echo h($mstMedia['MstMedia']['created']); ?>&nbsp;</td>
		<td><?php echo h($mstMedia['MstMedia']['creator_id']); ?>&nbsp;</td>
		<td><?php echo h($mstMedia['MstMedia']['modified']); ?>&nbsp;</td>
		<td><?php echo h($mstMedia['MstMedia']['modifier_id']); ?>&nbsp;</td>
		<td><?php echo h($mstMedia['MstMedia']['isActive']); ?>&nbsp;</td>
		<td><?php echo h($mstMedia['MstMedia']['type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mstMedia['MstMedia']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mstMedia['MstMedia']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mstMedia['MstMedia']['id']), null, __('Are you sure you want to delete # %s?', $mstMedia['MstMedia']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mst Media'), array('action' => 'add')); ?></li>
	</ul>
</div>
