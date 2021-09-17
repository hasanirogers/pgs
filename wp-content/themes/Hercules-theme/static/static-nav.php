<?php /* Static Name: Navigation */ 
	if (has_nav_menu('header_menu')) { ?>
		<!-- BEGIN MAIN NAVIGATION  -->
		<nav class="nav nav__primary clearfix"> 
			<?php wp_nav_menu( array(
				'container'		=> 'ul', 
				'menu_class'    => 'sf-menu', 
				'menu_id'       => 'topnav',
				'depth'         => 0,
				'theme_location'=> 'header_menu',
				'walker'		=> new hs_description_walker()
			)); ?>
		 </nav>
		 
		 <div class="navbar">
        <div class="navbar-inner">
            <div class="container2">
		 
                <a href="#" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-th-list"></span> Navigate to...
                </a>
                
                <div class="nav-collapse collapse">
                  	<?php wp_nav_menu( array(
				'container'		=> 'ul', 
				'menu_class'    => 'nav', 
				'menu_id'       => 'mobile-nav',
				'depth'         => 0,
				'theme_location'=> 'header_menu',
				'walker'		=> new hs_description_walker()
			)); ?>
                </div>
       </div>
        </div>
         </div>
		<!-- END MAIN NAVIGATION -->
<?php } ?>