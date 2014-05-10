<?php echo $this->Html->image('gnulogo.png'); 
		 ?>

   <div class="right" id="cssmenu">
	<ul>
   	<li class='has-sub'><?php echo $this->Html->link(__("User Management"),"") ?>
      <ul>
         <li> <?php echo $this->Html->link(__("View All User",true),"/user_info")?>
         </li>
         <li><?php if(Auth::hasRole('admin')) { echo $this->Html->link(__("Add New User",true),"/add"); }?>
         </li>
      </ul>
   	</li>
         <li class='has-sub'><?php echo $this->Html->link(__("Media Management"),"") ?>
      <ul>
         <li> <?php echo $this->Html->link(__("View Media Files",true),"/media") ?>
         </li>
         <li><?php echo $this->Html->link(__("Upload File",true),"/upload")?>
         </li>
      </ul>
      </li>
   	<li class='has-sub'><?php echo $this->Html->link(__("Institute Management"),"") ?>
      <ul>
         <li><?php echo $this->Html->link(__("Institute Management",true),"/institute") ?>
         </li>
         <li><?php echo $this->Html->link(__("Add Institute",true),"/add_inst")?>
         </li>
      </ul>
   	</li>
   		<li class='has-sub'><?php echo $this->Html->link(__("Brochure Management"),"") ?>
      <ul>                                  
         <li><?php echo $this->Html->link(__("View All Categories",true),"/create brochure") ?>
         </li>
         <li><?php echo $this->Html->link(__("Add New Category",true),"/add type") ?>
         <li><?php echo $this->Html->link(__("View All Task",true),"/mst_br")?>
         </li>
         <li> <?php echo $this->Html->link(__("Add New Task",true),"/add task")?>
         </li>
          <li> <?php echo $this->Html->link(__("New Page",true),"/br_pages")?>
         </li>
         <li>  <?php echo $this->Html->link(__("Content",true),"/page_text") ?>
         </li>
      </ul>
   	</li>
      <li class='active'><?php echo $this->Html->link(__("Logout",true),array('controller' => 'users' ,'action'=>'logout' ,'plugin'=>false)) ?></li>
	</ul>

	<div class="clear-both"></div>
</div>