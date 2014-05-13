<?php echo $this->element('navigation'); ?>
<div class="mediaFiles index">
	<h2><?php echo __('Media Files'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>

			<th><?php echo $this->Paginator->sort('filename'); ?></th>

	</tr>
	<?php foreach ($mediaFiles as $mediaFile): ?>
	<tr>
		
		<td><?php echo h($mediaFile['MediaFile']['filename']); ?>&nbsp;</td>
		<td class="actions">
			<?php if(AuthComponent::user('role_id')!=2){
            if($mediaFile['MediaFile']['isActive'] == 1){
                echo $this->Form->postLink(__('Deactive'), array('action' => 'deactivate', $mediaFile['MediaFile']['id']), null, __('Are you sure you want to deactivate # %s?', $mediaFile['MediaFile']['id']));
            }
       
            if($mediaFile['MediaFile']['isActive'] == 0){
                echo $this->Form->postLink(__('Active'), array('action' => 'activate', $mediaFile['MediaFile']['id']), null, __('Are you sure you want to activate # %s?', $mediaFile['MediaFile']['id']));
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
		<li><?php echo $this->Html->link(__('Generate XML'), array('controller' => 'mediafiles', 'action' => 'index.xml')); ?> </li>
	</ul>
</div>
