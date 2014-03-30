<div class="institutes index">
	<h2><?php echo __('Institutes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('created'); ?></th>-->
			<th><?php echo $this->Paginator->sort('creator_id'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('modified'); ?></th>-->
			<th><?php echo $this->Paginator->sort('modifier_id'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('isActive'); ?></th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($institutes as $institute): ?>
	<tr>
		<td><?php echo h($institute['Institute']['id']); ?>&nbsp;</td>
		<td><?php echo h($institute['Institute']['name']); ?>&nbsp;</td>
		<!--<td><?php echo h($institute['Institute']['created']); ?>&nbsp;</td>-->
		<td><?php echo h($institute['Institute']['creator_id']); ?>&nbsp;</td>
		<!--<td><?php echo h($institute['Institute']['modified']); ?>&nbsp;</td>-->
		<td><?php echo h($institute['Institute']['modifier_id']); ?>&nbsp;</td>
		<!--<td><?php echo h($institute['Institute']['isActive']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $institute['Institute']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $institute['Institute']['id'])); ?>
			<?php 
            if($institute['Institute']['isActive'] == 1){
                echo $this->Form->postLink(__('Active'), array('action' => 'activate', $institute['Institute']['id']), null, __('Are you sure you want to deactivate # %s?', $institute['Institute']['id'])); 
            }
        ?>
        <?php 
            if($institute['Institute']['isActive'] == 0){
                echo $this->Form->postLink(__('Deactive'), array('action' => 'deactivate', $institute['Institute']['id']), null, __('Are you sure you want to activate # %s?', $institute['Institute']['id'])); 
            }
        ?>
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
		<li><?php echo $this->Html->link(__('New Institute'), array('action' => 'add')); ?></li>
		<!--<li><?php echo $this->Html->link(__('Create Task'), array('controller'=>'Tasks','action' => 'add')); ?></li>-->
		<li><?php echo $this->Html->link(__('My Dashboard'), array('controller'=>'Users','action' => 'user_info')); ?></li>
	</ul>
</div>
