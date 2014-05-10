<?php echo $this->element('navigation'); ?>
<div class="brochurePages view">
<h2><?php echo __('Brochure Page'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($brochurePage['BrochurePage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brochure Id'); ?></dt>
		<dd>
			<?php echo h($brochurePage['BrochurePage']['brochure_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('PageIndex'); ?></dt>
		<dd>
			<?php echo h($brochurePage['BrochurePage']['pageIndex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsForeGround'); ?></dt>
		<dd>
			<?php echo h($brochurePage['BrochurePage']['isForeGround']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('HasText'); ?></dt>
		<dd>
			<?php echo h($brochurePage['BrochurePage']['hasText']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media Id'); ?></dt>
		<dd>
			<?php echo h($brochurePage['BrochurePage']['media_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsActive'); ?></dt>
		<dd>
			<?php echo h($brochurePage['BrochurePage']['isActive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($brochurePage['BrochurePage']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($brochurePage['BrochurePage']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator Id'); ?></dt>
		<dd>
			<?php echo h($brochurePage['BrochurePage']['creator_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier Id'); ?></dt>
		<dd>
			<?php echo h($brochurePage['BrochurePage']['modifier_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
