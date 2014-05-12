<?php echo $this->Html->image('gnulogo.png'); 
		 ?>

   <div class="right" id="cssmenu">
	<ul>
   <?php if(Auth::user('Role.role') == 'admin' || Auth::user('Role.role') == 'superadmin') { ?>
   	<li class='has-sub'><?php echo $this->Html->link(__("User Management"),"") ?>
      <ul>
         <li> <?php echo $this->Html->link(__("View All User"),array('controller' => 'users', 'action' => 'user_info')) ?>
         </li>
         <li><?php  echo $this->Html->link(__("Add New User"),array('controller' => 'users', 'action' => 'add')) ?>
         </li>
      </ul>
   	</li>
      <?php } ?>

         <li class='has-sub'><?php echo $this->Html->link(__("Media Management"),"") ?>
      <ul>
         <li> <?php echo $this->Html->link(__("View Media Files"),array('controller' => 'mediaFiles', 'action' => 'index'))?>
         </li>
         <li><?php echo $this->Html->link(__("Upload File"),array('controller' => 'media_files', 'action' => 'add'))?>
         </li>
      </ul>
      </li>
      <?php if(Auth::user('Role.role') == 'superadmin') { ?>
   	<li class='has-sub'><?php echo $this->Html->link(__("Institute Management"),"") ?>
      <ul>
         <li><?php echo $this->Html->link(__("Institute Management"),array('controller' => 'institutes', 'action' => 'index')) ?>
         </li>
         <li><?php echo $this->Html->link(__("Add Institute"),array('controller' => 'institutes', 'action' => 'add'))?>
         </li>
      </ul>
   	</li>
      <?php } ?>
   		<li class='has-sub'><?php echo $this->Html->link(__("Brochure Management"),"") ?>
      <ul>                                  
         <li><?php if(Auth::user('Role.role') == 'admin' || Auth::user('Role.role') == 'superadmin') { echo $this->Html->link(__("View All Categories"),array('controller' => 'mst_brochure_types', 'action' => 'index')); } ?>
         </li>
         <li><?php if(Auth::user('Role.role') == 'admin' || Auth::user('Role.role') == 'superadmin') { echo $this->Html->link(__("Add New Category"),array('controller' => 'mst_brochure_types', 'action' => 'add')); } ?>
         <li><?php echo $this->Html->link(__("View All Task"),array('controller' => 'mst_brochures', 'action' => 'index'))?>
         </li>
         <li> <?php echo $this->Html->link(__("Add New Task"),array('controller' => 'mst_brochures', 'action' => 'add'))?>
         </li>
          <li> <?php echo $this->Html->link(__("New Page"),array('controller' => 'brochure_pages', 'action' => 'add'))?>
         </li>
         <li>  <?php echo $this->Html->link(__("Content"),array('controller' => 'page_texts', 'action' => 'add')) ?>
         </li>
      </ul>
   	</li>
      <li class='active'><?php echo $this->Html->link(__("Logout",true),array('controller' => 'users' ,'action'=>'logout'))?></li>
	</ul>

	<div class="clear-both"></div>
</div>