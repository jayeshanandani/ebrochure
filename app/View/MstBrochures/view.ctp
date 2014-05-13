<?php echo $this->element('navigation'); ?>
<div class="related">
    <h3><?php echo __('Related Pages'); ?></h3>
    
    <?php if (!empty($mstBrochure['BrochurePage'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __('Page index'); ?></th>
        <th><?php echo __('Is Foreground'); ?></th>
        <th><?php echo __('has text'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($mstBrochure['BrochurePage'] as $pages): ?>
        <tr>
            <td><?php echo $pages['pageIndex']; ?></td>
            <td>
            <?php 
            if($pages['isForeGround'] ==1 ) {
            	echo "Yes"; 
            } else{
            	echo "No";
            }
            ?></td>
                       <td>
            <?php 
            if($pages['hasText'] ==1 ) {
            	echo "Yes"; 
            } else{
            	echo "No";
            }
            ?></td>
            
            <td class="actions">
                <?php echo $this->Html->link(__('View Page Text'), array('controller' => 'page_texts', 'action' => 'view', $pages['id'])); ?>
                <?php echo $this->Html->link(__('Edit page details' ), array('controller' => 'brochure_pages', 'action' => 'edit', $pages['id'])); ?>
                <?php if(AuthComponent::user('role_id')!=2){
            if($pages['isActive'] == 1){
                echo $this->Form->postLink(__('Deactive'), array('controller' => 'brochure_pages','action' => 'deactivate', $pages['id']), null, __('Are you sure you want to deactivate # %s?', $pages['id']));
            }
       
            if($pages['isActive'] == 0){
                echo $this->Form->postLink(__('Active'), array('controller' => 'brochure_pages','action' => 'activate', $pages['id']), null, __('Are you sure you want to activate # %s?', $pages['id']));
            }
        }
        ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>
 
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('Add Pages'), array('controller' => 'brochure_pages', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>