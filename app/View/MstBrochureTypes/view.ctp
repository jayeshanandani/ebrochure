<?php echo $this->element('navigation'); ?>
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

<div class="related">
    <h3><?php echo __('Related Pages'); ?></h3>
    
    <?php if (!empty($mstBrochureType['MstBrochure'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('name'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($mstBrochureType['MstBrochure'] as $brochures): ?>
        <tr>
            <td><?php echo $brochures['id']; ?></td>
            <td><?php echo $brochures['name']; ?></td>
           
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('controller' => 'mst_brochures', 'action' => 'view', $brochures['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('controller' => 'mst_brochures', 'action' => 'edit', $brochures['id'])); ?>
                <?php
            if($brochures['isActive'] == 1){
                echo $this->Form->postLink(__('Deactive'), array('action' => 'deactivate', $brochures['id']), null, __('Are you sure you want to deactivate # %s?', $brochures['id']));
            }
        ?>
        <?php
            if($brochures['isActive'] == 0){
                echo $this->Form->postLink(__('Active'), array('action' => 'mst_brochures', $brochures['id']), null, __('Are you sure you want to activate # %s?', $brochures['id']));
            }
        ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>
 
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('Add New Brochure'), array('controller' => 'mst_brochures', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
