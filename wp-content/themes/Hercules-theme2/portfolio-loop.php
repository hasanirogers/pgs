<?php // Theme Options vars
$folio_filter = of_get_option('folio_filter'); ?>

<?php
switch ($folio_filter) {
	case 'cat': ?>
		<div class="filter-wrapper clearfix">
		
				
				<div style="text-align:center;">
				<div id="filters" class="filter nav nav-pills">
					<?php
						$count_posts = wp_count_posts('portfolio');
					?>
					<span class="active"><a href="#" data-count="<?php echo $count_posts->publish; ?>" data-filter><?php echo __('Show all', HS_CURRENT_THEME); ?></a></span>
					<?php 
						$filter_array = array();
						$portfolio_categories = get_categories(array('taxonomy'=>'portfolio_category'));
						foreach($portfolio_categories as $portfolio_category) {
							$filter_array[$portfolio_category->slug] = $portfolio_category->count;
						}
						
						$the_query = new WP_Query();
						if ($paged == 0)
							$paged = 1;
						$custom_count = ($paged - 1) * $items_count;
						
						if($feautered=='yes'){ 
						$the_query->query('post_type=portfolio&showposts='. $items_count .'&offset=' . $custom_count . '&meta_key=tz_portfolio_featured');
						}else{
						$the_query->query('post_type=portfolio&showposts='. $items_count .'&offset=' . $custom_count);
						}
						
						
						while( $the_query->have_posts() ) :
							$the_query->the_post();
							$post_id = $the_query->post->ID;
							$terms = get_the_terms( $post_id, 'portfolio_category');
							if ( $terms && ! is_wp_error( $terms ) ) {
								foreach ( $terms as $term )
									$filter_array[$term->slug] = $term;
							}
						endwhile;
						foreach ($filter_array as $key => $value)
							if ( isset($value->count) ) {
								echo '<span><a href="#" data-count="'. $value->count .'" data-filter=".'.$key.'">' . $value->name . '</a></span>';
							}							
						wp_reset_postdata();
					?>
				</div>
				<div class="clear"></div>
			</div></div>
		
		<?php
		break;
	case 'tag': ?>
		<div class="filter-wrapper clearfix">
			<div style="text-align:center;">
				
				<div id="tags" class="filter nav nav-pills">
					<?php
						$count_posts = wp_count_posts('portfolio');
					?>
					<span class="active"><a href="#" data-count="<?php echo $count_posts->publish; ?>" data-filter><?php echo __('Show all', HS_CURRENT_THEME); ?></a></span>
					<?php 
						$filter_array = array();
						$portfolio_tags = get_terms('portfolio_tag');
						foreach($portfolio_tags as $portfolio_tag) {
							$filter_array[$portfolio_tag->slug] = $portfolio_tag->count;
						}

						$the_query = new WP_Query();
						if ($paged == 0) {
							$paged = 1;
						}
						$custom_count = ($paged - 1) * $items_count;
						$the_query->query('post_type=portfolio&showposts='. $items_count .'&offset=' . $custom_count);
						while( $the_query->have_posts() ) :
							$the_query->the_post();
							$post_id = $the_query->post->ID;
							$terms = get_the_terms( $post_id, 'portfolio_tag');
							if ( $terms && ! is_wp_error( $terms ) ) {
								foreach ( $terms as $term )
									$filter_array[$term->slug] = $term;
							}
						endwhile;
						foreach ($filter_array as $key => $value)
							if ( isset($value->count) ) {
								echo '<span><a href="#" data-count="'. $value->count .'" data-filter=".'.$key.'">' . $value->name . '</a></span>';
							}
						wp_reset_postdata();
					?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<?php
		break;
	default:
		break;
}?>

<?php 
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	if($feautered=='yes'){ 
	$wp_query->query("post_type=portfolio&paged=".$paged.'&showposts='.$items_count.'&meta_key=tz_portfolio_featured' ); 
	}else{
	$wp_query->query("post_type=portfolio&paged=".$paged.'&showposts='.$items_count ); 
	} 
?>
	
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title">not_found</h1>
		<div class="entry-content">
			
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php // Theme Options vars
	$layout_mode = of_get_option('layout_mode');
?>

<script>
	jQuery(document).ready(function($) {
	//jQuery(window).load(function($){
	var $container = jQuery('#portfolio-grid'),
			filters = {},
			items_count = jQuery(".portfolio_item").size();
		
		$container.imagesLoaded( function(){	
			setColumnWidth();
			$container.isotope({
				itemSelector : '.portfolio_item',
				hiddenClass : 'portfolio_hidden',
				resizable : false,
				transformsEnabled : true,
				layoutMode: '<?php echo $layout_mode; ?>'
			});		
		});
		
		function getNumColumns(){
			
			var $folioWrapper = jQuery('#portfolio-grid').data('cols');
			
			if($folioWrapper == '1col') {
				var winWidth = jQuery("#portfolio-grid").width();		
				var column = 1;		
				return column;
			}
			
			if($folioWrapper == '2cols') {
				var winWidth = jQuery("#portfolio-grid").width();		
				var column = 2;		
				if (winWidth<380) column = 1;
				return column;
			}
			
			else if ($folioWrapper == '3cols') {
				var winWidth = jQuery("#portfolio-grid").width();		
				var column = 3;		
				if (winWidth<380) column = 1;
				else if(winWidth>=380 && winWidth<788)  column = 2;
				else if(winWidth>=788 && winWidth<1160)  column = 3;
				else if(winWidth>=1160) column = 3;
				return column;
			}
			
			else if ($folioWrapper == '4cols') {
				var winWidth = jQuery("#portfolio-grid").width();		
				var column = 4;		
				if (winWidth<380) column = 1;
				else if(winWidth>=380 && winWidth<788)  column = 2;
				else if(winWidth>=788 && winWidth<1160)  column = 3;
				else if(winWidth>=1160) column = 4;		
				return column;
			}
			else if ($folioWrapper == '5cols') {
				var winWidth = jQuery("#portfolio-grid").width();		
				var column = 5;		
				if (winWidth<380) column = 1;
				else if(winWidth>=380 && winWidth<788)  column = 2;
				else if(winWidth>=788 && winWidth<1160)  column = 3;
				else if(winWidth>=1160) column = 5;		
				return column;
			}
			else if ($folioWrapper == '6cols') {
				var winWidth = jQuery("#portfolio-grid").width();		
				var column = 5;		
				if (winWidth<380) column = 1;
				else if(winWidth>=380 && winWidth<788)  column = 2;
				else if(winWidth>=788 && winWidth<1160)  column = 3;
				else if(winWidth>=1160) column = 6;		
				return column;
			}
			else if ($folioWrapper == '8cols') {
				var winWidth = jQuery("#portfolio-grid").width();		
				var column = 5;		
				if (winWidth<380) column = 1;
				else if(winWidth>=380 && winWidth<788)  column = 2;
				else if(winWidth>=788 && winWidth<1160)  column = 3;
				else if(winWidth>=1160) column = 8;		
				return column;
			}
		}
		
		function setColumnWidth(){
			var columns = getNumColumns();		
		
			var containerWidth = jQuery("#portfolio-grid").width();		
			var postWidth = containerWidth/columns;
			postWidth = Math.floor(postWidth);
	 	
			jQuery(".portfolio_item").each(function(index){
				jQuery(this).css({"width":postWidth+"px"});
jQuery(".hider").delay(1800).fadeOut("slow");
		
			});
			
}
			
		function arrange(){
			setColumnWidth();		
			$container.isotope('reLayout');	
		}
			
		jQuery(window).on("debouncedresize", function( event ) {	
			arrange();		
		});
		
		
		// Filter projects
		$('.filter a').click(function(){
			var $this = $(this).parent('span');
			// don't proceed if already active
			if ( $this.hasClass('active') ) {
				return;
			}

			var $optionSet = $this.parents('.filter');
			// change active class
			$optionSet.find('.active').removeClass('active');
			$this.addClass('active');

			var selector = $(this).attr('data-filter');
			$container.isotope({ filter: selector });

			var hiddenItems = 0,
				showenItems = 0;
			jQuery(".portfolio_item").each(function(){
				if ( jQuery(this).hasClass('portfolio_hidden') ) {
					hiddenItems++;
				};
			});

			showenItems = items_count - hiddenItems;
			if ( ($(this).attr('data-count')) > showenItems ) {				
				jQuery(".pagination__posts").css({"display" : "block"});
			} else {
				jQuery(".pagination__posts").css({"display" : "none"});
			}
			return false;
		});	
	});
</script>
<ul id="portfolio-grid" class="filterable-portfolio thumbnails portfolio-<?php echo $cols; ?>" data-cols="<?php echo $cols; ?>">
	<?php get_template_part('main-portfolio-loop'); ?>
</ul>

<?php 
if($feautered==''){ 
	get_template_part('includes/post-formats/post-nav');
	}
	$wp_query = null;
	$wp_query = $temp;
?>