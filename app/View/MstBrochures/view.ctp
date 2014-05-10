<?php echo $this->element('navigation'); ?>
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

<div class="related">
    <h3><?php echo __('Related Pages'); ?></h3>
    
    <?php if (!empty($mstBrochure['BrochurePage'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('Media Id'); ?></th>
        <th><?php echo __('Page index'); ?></th>
        <th><?php echo __('Is Foreground'); ?></th>
        <th><?php echo __('has text'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($mstBrochure['BrochurePage'] as $pages): ?>
        <tr>
            <td><?php echo $pages['id']; ?></td>
            <td><?php echo $pages['media_id']; ?></td>
            <td><?php echo $pages['pageIndex']; ?></td>
            <td><?php echo $pages['isForeGround']; ?></td>
            <td><?php echo $pages['hasText']; ?></td>
            
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('controller' => 'brochure_pages', 'action' => 'view', $pages['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('controller' => 'brochure_pages', 'action' => 'edit', $pages['id'])); ?>
                <?php
            if($pages['isActive'] == 1){
                echo $this->Form->postLink(__('Deactive'), array('controller' => 'brochure_pages','action' => 'deactivate', $pages['id']), null, __('Are you sure you want to deactivate # %s?', $pages['id']));
            }
        ?>
        <?php
            if($pages['isActive'] == 0){
                echo $this->Form->postLink(__('Active'), array('controller' => 'brochure_pages','action' => 'activate', $pages['id']), null, __('Are you sure you want to activate # %s?', $pages['id']));
            }
        ?>

        <?php echo $this->Html->link(__('Generate Page XML'), array('controller' => 'page_texts','action' => 'index.xml')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>
 
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('Add Pages'), array('controller' => 'brochure_pages', 'action' => 'add')); ?> </li>
             <li><?php echo $this->Html->link(__('Generate XML'), array('controller' => 'brochure_pages', 'action' => 'index.xml')); ?> </li>
        </ul>
    </div>
</div>