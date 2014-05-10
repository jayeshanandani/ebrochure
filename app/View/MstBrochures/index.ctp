<?php echo $this->element('navigation'); ?>
<div class="mstBrochures index">
	<h2><?php echo __('Mst Brochures'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','acb'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('institute_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bgMusic'); ?></th>
			<th><?php echo $this->Paginator->sort('bgColor'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($mstBrochures as $mstBrochure): ?>
	<tr>
		<td><?php echo h($mstBrochure['MstBrochure']['id']); ?>&nbsp;</td>
		<td><?php echo h($mstBrochure['MstBrochure']['name']); ?>&nbsp;</td>
		<td><?php echo h($mstBrochure['MstBrochure']['type_id']); ?>&nbsp;</td>
		<td><?php echo h($mstBrochure['MstBrochure']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mstBrochure['Institute']['name'], array('controller' => 'institutes', 'action' => 'view', $mstBrochure['Institute']['id'])); ?>
		</td>
		<td><?php echo h($mstBrochure['MstBrochure']['bgMusic']); ?>&nbsp;</td>
		<td><?php echo h($mstBrochure['MstBrochure']['bgColor']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mstBrochure['MstBrochure']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mstBrochure['MstBrochure']['id'])); ?>
			<?php
            if($mstBrochure['MstBrochure']['isActive'] == 1){
                echo $this->Form->postLink(__('Deactive'), array('action' => 'deactivate', $mstBrochure['MstBrochure']['id']), null, __('Are you sure you want to deactivate # %s?', $mstBrochure['MstBrochure']['id']));
            }
        ?>
        <?php
            if($mstBrochure['MstBrochure']['isActive'] == 0){
                echo $this->Form->postLink(__('Active'), array('action' => 'activate', $mstBrochure['MstBrochure']['id']), null, __('Are you sure you want to activate # %s?', $mstBrochure['MstBrochure']['id']));
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
		<li><?php echo $this->Html->link(__('Generate XML'), array('controller' => 'mstBrochures', 'action' => 'index.xml')); ?> </li>
	</ul>
</div>
