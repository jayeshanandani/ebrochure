<div class="mstMedia view">
<h2><?php echo __('Mst Media'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mstMedia['MstMedia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($mstMedia['MstMedia']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator Id'); ?></dt>
		<dd>
			<?php echo h($mstMedia['MstMedia']['creator_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($mstMedia['MstMedia']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier Id'); ?></dt>
		<dd>
			<?php echo h($mstMedia['MstMedia']['modifier_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsActive'); ?></dt>
		<dd>
			<?php echo h($mstMedia['MstMedia']['isActive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($mstMedia['MstMedia']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mst Media'), array('action' => 'edit', $mstMedia['MstMedia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mst Media'), array('action' => 'delete', $mstMedia['MstMedia']['id']), null, __('Are you sure you want to delete # %s?', $mstMedia['MstMedia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mst Media'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mst Media'), array('action' => 'add')); ?> </li>
	</ul>
</div>
