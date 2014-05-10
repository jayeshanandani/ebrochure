<?php echo $this->element('navigation'); ?>
<div class="institutes view">
<h2><?php echo __('Institute'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator Id'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['creator_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier Id'); ?></dt>
		<dd>
			<?php echo h($institute['Institute']['modifier_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
