<?php echo AuthComponent::user('id'); ?>
<?php echo $this->Session->read('User.username'); ?>

<div class="users index">

	<p>
	</p>
	<div class="paging">

	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<!--<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?></li>-->
		<!--<li><?php echo $this->Html->link(__('List Media Files'), array('controller' => 'media_files', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media File'), array('controller' => 'media_files', 'action' => 'add')); ?> </li>-->
		<!--<li><?php echo $this->Html->link(__('List User Logs'), array('controller' => 'user_logs', 'action' => 'user_info')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Log'), array('controller' => 'user_logs', 'action' => 'add')); ?> </li>-->
		<li><?php echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?></li>
	</ul>
</div>
