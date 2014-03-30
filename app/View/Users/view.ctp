<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['role_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['creator_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['modifier_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsActive'); ?></dt>
		<dd>
			<?php echo h($user['User']['isActive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($user['User']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Middlename'); ?></dt>
		<dd>
			<?php echo h($user['User']['middlename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($user['User']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($user['User']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Securityque'); ?></dt>
		<dd>
			<?php echo h($user['User']['securityque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Securityans'); ?></dt>
		<dd>
			<?php echo h($user['User']['securityans']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'user_info')); ?> </li>

		<li><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Media Files'); ?></h3>
	<?php if (!empty($user['MediaFile'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Media Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Creator Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modifier Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('IsActive'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Mime'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['MediaFile'] as $mediaFile): ?>
		<tr>
			<td><?php echo $mediaFile['id']; ?></td>
			<td><?php echo $mediaFile['media_id']; ?></td>
			<td><?php echo $mediaFile['created']; ?></td>
			<td><?php echo $mediaFile['creator_id']; ?></td>
			<td><?php echo $mediaFile['modified']; ?></td>
			<td><?php echo $mediaFile['modifier_id']; ?></td>
			<td><?php echo $mediaFile['user_id']; ?></td>
			<td><?php echo $mediaFile['isActive']; ?></td>
			<td><?php echo $mediaFile['name']; ?></td>
			<td><?php echo $mediaFile['mime']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'media_files', 'action' => 'view', $mediaFile['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'media_files', 'action' => 'edit', $mediaFile['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'media_files', 'action' => 'delete', $mediaFile['id']), null, __('Are you sure you want to delete # %s?', $mediaFile['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Media File'), array('controller' => 'media_files', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related User Logs'); ?></h3>
	<?php if (!empty($user['UserLog'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Accesstime'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Ip'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UserLog'] as $userLog): ?>
		<tr>
			<td><?php echo $userLog['id']; ?></td>
			<td><?php echo $userLog['user_id']; ?></td>
			<td><?php echo $userLog['accesstime']; ?></td>
			<td><?php echo $userLog['status']; ?></td>
			<td><?php echo $userLog['ip']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_logs', 'action' => 'view', $userLog['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_logs', 'action' => 'edit', $userLog['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_logs', 'action' => 'delete', $userLog['id']), null, __('Are you sure you want to delete # %s?', $userLog['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Log'), array('controller' => 'user_logs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
