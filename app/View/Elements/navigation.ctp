
<!--<div id="dashboard">
  <div style="float:left"><?php echo $this->Html->link(__("Dashboard",true),"/dashboard") ?></div>
  <div style="float:left;padding-left:10px">
 	 <ul id="sddm">USER MANAGEMENT<ul><?php echo $this->Html->link(__("View All User",true),"/user_info") ?>
  		               <li><?php echo $this->Html->link(__("Add New User",true),"/add")?></li></ul>
  	</ul>
  </div>
  <div style="float:left;padding-left:10px">
  <ul id="sddm">MEDIA MANAGEMENT<ul><?php echo $this->Html->link(__("View Media Files",true),"/media") ?>
		                  <li><?php echo $this->Html->link(__("Upload File",true),"/upload")?></li></ul>
  </ul>
  </div>
  <div style="float:left;padding-left:10px">
  <ul>INSTITUTE MANAGEMENT<ul><?php echo $this->Html->link(__("Institute Management",true),"/institute") ?>
                          <li><?php echo $this->Html->link(__("Add Institute",true),"/add_inst")?></li></ul>
  </ul></div>
  <div style="float:left;padding-left:10px">	
  	<ul id="sddm">BROCHURE MANAGEMENT<ul><?php echo $this->Html->link(__("View All Categories",true),"/create brochure") ?>
                           <li><?php echo $this->Html->link(__("Add New Category",true),"/add type") ?></li></ul>
                           <ul><?php echo $this->Html->link(__("View All Task",true),"/mst_br")?>
		                       <li><?php echo $this->Html->link(__("Add New Task",true),"/add task")?></li></ul>
		                       <ul><?php echo $this->Html->link(__("New Page",true),"/br_pages")?></ul>
		                       <ul><?php echo $this->Html->link(__("Content",true),"/page_text") ?></ul>
  	</ul>
  </div>
  <div style="float:right;padding-left:10px"><?php echo $this->Html->link(__("Sign Out",true),"/logout") ?></div>
  <div style="clear:both"></div>
  </div>-->

 <?php echo $this->Html->script('menu'); 
     echo $this->Html->css('default'); 
  echo $this->fetch('css');
    echo $this->fetch('script'); ?>



<ul id="sddm">
  <li><a href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()">USER MANAGEMENT</a>
    <div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
    <?php echo $this->Html->link(__("View All User",true),"/user_info") ?>
    <?php if(Auth::hasRole('admin')) { echo $this->Html->link(__("Add New User",true),"/add"); }?>
  </div>
  </li>
  <li><a href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()">MEDIA MANAGEMENT</a>
    <div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
    <?php echo $this->Html->link(__("View Media Files",true),"/media") ?>
   <?php echo $this->Html->link(__("Upload File",true),"/upload")?>
                   
    </div>
  </li>
  <li><a href="#" onmouseover="mopen('m3')" onmouseout="mclosetime()">INSTITUTE MANAGEMENT</a>
    <div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
    <?php echo $this->Html->link(__("Institute Management",true),"/institute") ?>
   <?php echo $this->Html->link(__("Add Institute",true),"/add_inst")?>

    </div>
  </li>
  <li><a href="#" onmouseover="mopen('m4')" onmouseout="mclosetime()">BROCHURE MANAGEMENT</a>
    <div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
    <?php echo $this->Html->link(__("View All Categories",true),"/create brochure") ?>
                           <?php echo $this->Html->link(__("Add New Category",true),"/add type") ?>
                           <?php echo $this->Html->link(__("View All Task",true),"/mst_br")?>
                           <?php echo $this->Html->link(__("Add New Task",true),"/add task")?>
                           <?php echo $this->Html->link(__("New Page",true),"/br_pages")?>
                           <?php echo $this->Html->link(__("Content",true),"/page_text") ?>
    </div>
  </li>
  <li><?php echo $this->Html->link(__("Sign Out",true),"/logout") ?>
  </li>
</ul>
<div style="clear:both"></div>
