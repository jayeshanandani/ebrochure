<div class="pageTexts index">
	<h2><?php echo __('Page Texts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('page_id'); ?></th>
			<th><?php echo $this->Paginator->sort('textContent'); ?></th>
			<th><?php echo $this->Paginator->sort('xPos'); ?></th>
			<th><?php echo $this->Paginator->sort('yPos'); ?></th>
			<th><?php echo $this->Paginator->sort('txtWidth'); ?></th>
			<th><?php echo $this->Paginator->sort('txtHeight'); ?></th>
			<th><?php echo $this->Paginator->sort('txtFontsize'); ?></th>
			<th><?php echo $this->Paginator->sort('txtColor'); ?></th>
			<!--<th><?php echo $this->Paginator->sort('isActive'); ?></th>-->
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('creator_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pageTexts as $pageText): ?>
	<tr>
		<td><?php echo h($pageText['PageText']['id']); ?>&nbsp;</td>
		<td><?php echo h($pageText['PageText']['page_id']); ?>&nbsp;</td>
		<td><?php echo h($pageText['PageText']['textContent']); ?>&nbsp;</td>
		<td><?php echo h($pageText['PageText']['xPos']); ?>&nbsp;</td>
		<td><?php echo h($pageText['PageText']['yPos']); ?>&nbsp;</td>
		<td><?php echo h($pageText['PageText']['txtWidth']); ?>&nbsp;</td>
		<td><?php echo h($pageText['PageText']['txtHeight']); ?>&nbsp;</td>
		<td><?php echo h($pageText['PageText']['txtFontsize']); ?>&nbsp;</td>
		<td><?php echo h($pageText['PageText']['txtColor']); ?>&nbsp;</td>
		<!--<td><?php echo h($pageText['PageText']['isActive']); ?>&nbsp;</td>-->
		<td><?php echo h($pageText['PageText']['created']); ?>&nbsp;</td>
		<td><?php echo h($pageText['PageText']['modified']); ?>&nbsp;</td>
		<td><?php echo h($pageText['PageText']['creator_id']); ?>&nbsp;</td>
		<td><?php echo h($pageText['PageText']['modified_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pageText['PageText']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pageText['PageText']['id'])); ?>
			<?php 
            if($pageText['PageText']['isActive'] == 1){
                echo $this->Form->postLink(__('Dective'), array('action' => 'deactivate', $pageText['PageText']['id']), null, __('Are you sure you want to deactivate # %s?', $pageText['PageText']['id'])); 
            }
        ?>
        <?php 
            if($pageText['PageText']['isActive'] == 0){
                echo $this->Form->postLink(__('Active'), array('action' => 'activate', $pageText['PageText']['id']), null, __('Are you sure you want to activate # %s?', $pageText['PageText']['id'])); 
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
		<li><?php echo $this->Html->link(__('New Page Text'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('My Dashboard'), array('controller' => 'users', 'action' => 'user_info')); ?> </li>
	</ul>
</div>
