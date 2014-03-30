<div class="changePasswords view">
<h2><?php echo __('Change Password'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($changePassword['ChangePassword']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($changePassword['User']['id'], array('controller' => 'users', 'action' => 'view', $changePassword['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timemodified'); ?></dt>
		<dd>
			<?php echo h($changePassword['ChangePassword']['timemodified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Change Password'), array('action' => 'edit', $changePassword['ChangePassword']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Change Password'), array('action' => 'delete', $changePassword['ChangePassword']['id']), null, __('Are you sure you want to delete # %s?', $changePassword['ChangePassword']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Change Passwords'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Change Password'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
