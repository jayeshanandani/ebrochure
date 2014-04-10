<div class="mstBrochureTypes view">
<h2><?php echo __('Mst Brochure Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mstBrochureType['MstBrochureType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($mstBrochureType['MstBrochureType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsActive'); ?></dt>
		<dd>
			<?php echo h($mstBrochureType['MstBrochureType']['isActive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator Id'); ?></dt>
		<dd>
			<?php echo h($mstBrochureType['MstBrochureType']['creator_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier Id'); ?></dt>
		<dd>
			<?php echo h($mstBrochureType['MstBrochureType']['modifier_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($mstBrochureType['MstBrochureType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($mstBrochureType['MstBrochureType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mst Brochure Type'), array('action' => 'edit', $mstBrochureType['MstBrochureType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mst Brochure Type'), array('action' => 'delete', $mstBrochureType['MstBrochureType']['id']), null, __('Are you sure you want to delete # %s?', $mstBrochureType['MstBrochureType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mst Brochure Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mst Brochure Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
