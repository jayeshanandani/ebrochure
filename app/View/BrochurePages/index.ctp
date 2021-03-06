<?php echo $this->element('navigation'); ?>
<div class="brochurePages index">
	<h2><?php echo __('Brochure Pages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('brochure_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pageIndex'); ?></th>
			<th><?php echo $this->Paginator->sort('isForeGround'); ?></th>
			<th><?php echo $this->Paginator->sort('hasText'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($brochurePages as $brochurePage): ?>
	<tr>
		<td><?php echo h($brochurePage['MstBrochure']['name']);  ?>&nbsp;</td>
		<td><?php echo h($brochurePage['BrochurePage']['pageIndex']); ?>&nbsp;</td>
		 <td>
            <?php 
            if($brochurePage['BrochurePage']['isForeGround'] ==1 ) {
            	echo "Yes"; 
            } else{
            	echo "No";
            }
            ?></td>
                       <td>
            <?php 
            if($brochurePage['BrochurePage']['hasText'] ==1 ) {
            	echo "Yes"; 
            } else{
            	echo "No";
            }
            ?></td>
		
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $brochurePage['BrochurePage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $brochurePage['BrochurePage']['id'])); ?>
			<?php if(AuthComponent::user('role_id')!=2) {
            if($brochurePage['BrochurePage']['isActive'] == 1){
                echo $this->Form->postLink(__('Deactive'), array('action' => 'deactivate', $brochurePage['BrochurePage']['id']), null, __('Are you sure you want to deactivate # %s?', $brochurePage['BrochurePage']['id']));
            }
        
            if($brochurePage['BrochurePage']['isActive'] == 0){
                echo $this->Form->postLink(__('Active'), array('action' => 'activate', $brochurePage['BrochurePage']['id']), null, __('Are you sure you want to activate # %s?', $brochurePage['BrochurePage']['id']));
            }
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
		<li><?php echo $this->Html->link(__('New Brochure Page'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Page Texts'), array('controller' => 'pagetexts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Generate XML'), array('controller' => 'brochurepages', 'action' => 'index.xml')); ?> </li>
		<li><?php echo $this->Html->link(__('My Dashboard'), array('controller' => 'users', 'action' => 'user_info')); ?> </li>
	</ul>
</div>
