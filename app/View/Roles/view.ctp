<div class="mstRoles view">
<h2><?php echo __('Mst Role'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mstRole['MstRole']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timecreated'); ?></dt>
		<dd>
			<?php echo h($mstRole['MstRole']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator Id'); ?></dt>
		<dd>
			<?php echo h($mstRole['MstRole']['creator_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timemodified'); ?></dt>
		<dd>
			<?php echo h($mstRole['MstRole']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier Id'); ?></dt>
		<dd>
			<?php echo h($mstRole['MstRole']['modifier_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsActive'); ?></dt>
		<dd>
			<?php echo h($mstRole['MstRole']['isActive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($mstRole['MstRole']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mst Role'), array('action' => 'edit', $mstRole['MstRole']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mst Role'), array('action' => 'delete', $mstRole['MstRole']['id']), null, __('Are you sure you want to delete # %s?', $mstRole['MstRole']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mst Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mst Role'), array('action' => 'add')); ?> </li>
	</ul>
</div>
