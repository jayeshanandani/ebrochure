<div class="mstBrochureTypes index">
	<h2><?php echo __('Mst Brochure Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('isActive'); ?></th>-->
			<th><?php echo $this->Paginator->sort('creator_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modifier_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($mstBrochureTypes as $mstBrochureType): ?>
	<tr>
		<td><?php echo h($mstBrochureType['MstBrochureType']['id']); ?>&nbsp;</td>
		<td><?php echo h($mstBrochureType['MstBrochureType']['name']); ?>&nbsp;</td>
		<!--<td><?php echo h($mstBrochureType['MstBrochureType']['isActive']); ?>&nbsp;</td>-->
		<td><?php echo h($mstBrochureType['MstBrochureType']['creator_id']); ?>&nbsp;</td>
		<td><?php echo h($mstBrochureType['MstBrochureType']['modifier_id']); ?>&nbsp;</td>
		<td><?php echo h($mstBrochureType['MstBrochureType']['created']); ?>&nbsp;</td>
		<td><?php echo h($mstBrochureType['MstBrochureType']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mstBrochureType['MstBrochureType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mstBrochureType['MstBrochureType']['id'])); ?>
			<?php 
            if($mstBrochureType['MstBrochureType']['isActive'] == 1){
                echo $this->Form->postLink(__('Dective'), array('action' => 'deactivate', $mstBrochureType['MstBrochureType']['id']), null, __('Are you sure you want to deactivate # %s?', $mstBrochureType['MstBrochureType']['id'])); 
            }
        ?>
        <?php 
            if($mstBrochureType['MstBrochureType']['isActive'] == 0){
                echo $this->Form->postLink(__('Active'), array('action' => 'activate', $mstBrochureType['MstBrochureType']['id']), null, __('Are you sure you want to activate # %s?', $mstBrochureType['MstBrochureType']['id'])); 
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
		<li><?php echo $this->Html->link(__('Create New Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Task Creation'), array('controller' => 'mstbrochures','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('My Dashboard'), array('controller' => 'users', 'action' => 'user_info')); ?> </li>
	</ul>
</div>