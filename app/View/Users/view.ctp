<?php echo $this->element('navigation'); ?>
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
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		</ul>
</div>-->
