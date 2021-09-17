<?php /* Static Name: Search */ ?>
<!-- BEGIN SEARCH FORM -->
<?php if ( of_get_option('g_search_box_id') == 'yes') { ?>  
 
	
	<div id="sb-search" class="sb-search hidden-phone">
						<form id="search-header" class="navbar-form" method="get" action="<?php echo home_url(); ?>/" accept-charset="utf-8">
						
							<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="s" id="search">
							<input class="sb-search-submit" type="submit" id="submit" value="">
							<span class="sb-icon-search"><i class="icon-search"></i></span>
							
						</form>
						
					</div>
					
					  <script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>
<?php } ?>
<!-- END SEARCH FORM -->