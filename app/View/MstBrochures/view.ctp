<div class="mstBrochures view">
<h2><?php echo __('Mst Brochure'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mstBrochure['MstBrochure']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($mstBrochure['MstBrochure']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type Id'); ?></dt>
		<dd>
			<?php echo h($mstBrochure['MstBrochure']['type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($mstBrochure['MstBrochure']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institute'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mstBrochure['Institute']['name'], array('controller' => 'institutes', 'action' => 'view', $mstBrochure['Institute']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($mstBrochure['MstBrochure']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($mstBrochure['MstBrochure']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator Id'); ?></dt>
		<dd>
			<?php echo h($mstBrochure['MstBrochure']['creator_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier Id'); ?></dt>
		<dd>
			<?php echo h($mstBrochure['MstBrochure']['modifier_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BgMusic'); ?></dt>
		<dd>
			<?php echo h($mstBrochure['MstBrochure']['bgMusic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BgColor'); ?></dt>
		<dd>
			<?php echo h($mstBrochure['MstBrochure']['bgColor']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mst Brochure'), array('action' => 'edit', $mstBrochure['MstBrochure']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mst Brochure'), array('action' => 'delete', $mstBrochure['MstBrochure']['id']), null, __('Are you sure you want to delete # %s?', $mstBrochure['MstBrochure']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mst Brochures'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mst Brochure'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Institutes'), array('controller' => 'institutes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institute'), array('controller' => 'institutes', 'action' => 'add')); ?> </li>
	</ul>
</div>
