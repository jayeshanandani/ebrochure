<?php echo $this->element('navigation'); ?>
<div class="pageTexts view">
<h2><?php echo __('Page Text'); ?></h2>
	<dl>
		<dt><?php echo __('TextContent'); ?></dt>
		<dd>
			<?php echo h($pageText['PageText']['textContent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('XPos'); ?></dt>
		<dd>
			<?php echo h($pageText['PageText']['xPos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('YPos'); ?></dt>
		<dd>
			<?php echo h($pageText['PageText']['yPos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TxtWidth'); ?></dt>
		<dd>
			<?php echo h($pageText['PageText']['txtWidth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TxtHeight'); ?></dt>
		<dd>
			<?php echo h($pageText['PageText']['txtHeight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TxtFontsize'); ?></dt>
		<dd>
			<?php echo h($pageText['PageText']['txtFontsize']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('TxtColor'); ?></dt>
		<dd>
			<?php echo h($pageText['PageText']['txtColor']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Page Text'), array('action' => 'edit', $pageText['PageText']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Page Texts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page Text'), array('action' => 'add')); ?> </li>
	</ul>
</div>
