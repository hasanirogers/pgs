<section class="title-section">
	<h1>
		<?php if(is_home()){ ?>
			<?php $hercules_blog_text = of_get_option('blog_text'); ?>
				<?php if($hercules_blog_text){?>
					<?php echo of_get_option('blog_text'); 
 ?>
				<?php } else { ?>
					<?php _e( 'Blog', HS_CURRENT_THEME );?>
			<?php } ?>
			
		<?php } elseif ( is_category() ) { ?>
			<?php printf( __( 'Category Archives <i class="icon-angle-right"></i> %s', HS_CURRENT_THEME ), '<span style="color:#ddd;">' . single_cat_title( '', false ) . '' ); ?>
			<small><?php echo category_description(); /* displays the category's description from the Wordpress admin */ ?></small></span>
			
		<?php } elseif ( is_tax('portfolio_category') ) { ?>
			<?php _e('Portfolio  Category: ', HS_CURRENT_THEME ); ?>
			<small><?php echo single_cat_title( '', false ); ?> </small>
		
		<?php } elseif ( is_search() ) { ?>
			<?php _e('Search for: ', HS_CURRENT_THEME );?>"<?php the_search_query(); ?>"
		
		<?php } elseif ( is_day() ) { ?>
			<?php printf( __( 'Daily Archives <i class="icon-angle-right"></i> <small>%s</small>', HS_CURRENT_THEME ), get_the_date() ); ?>
			
		<?php } elseif ( is_month() ) { ?>	
			<?php printf( __( 'Monthly Archives <i class="icon-angle-right"></i> <small>%s</small>', HS_CURRENT_THEME ), get_the_date('F Y') ); ?>
			
		<?php } elseif ( is_year() ) { ?>	
			<?php printf( __( 'Yearly Archives <i class="icon-angle-right"></i> <small>%s</small>', HS_CURRENT_THEME ), get_the_date('Y') ); ?>
		
		<?php } elseif ( is_author() ) { ?>
			<?php 
				global $author;
				$hercules_userdata = get_userdata($author);
			?>
				<?php _e('by ', HS_CURRENT_THEME );?><?php echo $hercules_userdata->display_name; ?>
				
		<?php } elseif ( is_tag() ) { ?>
			<?php printf( __( 'Tag Archives: %s', HS_CURRENT_THEME ), '<small>' . single_tag_title( '', false ) . '</small>' ); ?>
			
		<?php } elseif ( is_tax('portfolio_tag') ) { ?>
			<?php _e('Portfolio  Tag: ', HS_CURRENT_THEME ); ?>
			<small><?php echo single_tag_title( '', false ); ?> </small>
			
		<?php } else { ?>
		
			<?php if (have_posts()) : while (have_posts()) : the_post();
				$hercules_pagetitle = get_post_custom_values("page-title");
				$hercules_pagedesc = get_post_custom_values("title-desc");
				
					if($hercules_pagetitle == ""){
						the_title();
						
					} else {
						echo $pagetitle[0];
					
					}
					if($hercules_pagedesc != ""){ ?>
						<span class="title-desc"><?php echo $hercules_pagedesc[0];?></span>
					<?php }
				endwhile; endif;
			wp_reset_query();			
		} ?>
	</h1>
	<?php
		if (of_get_option('g_breadcrumbs_id') == 'yes') { ?>
			<!-- BEGIN BREADCRUMBS-->
			<?php if (function_exists('hs_breadcrumbs')) hs_breadcrumbs(); ?>
			<!-- END BREADCRUMBS -->
	<?php }
	?>
	
	<?php if(is_home()){ ?>
		
	<?php $hercules_blog_sub = of_get_option('blog_sub'); 
	$portfolioInfo = get_post_meta($post->ID, 'tz_portfolio_info', true); ?>
				<?php if($hercules_blog_sub){?>
					<?php echo "<h2>". of_get_option('blog_sub') . "</h2>"; 	?>
				<?php } ?>
				<?php } ?>
</section><!-- .title-section -->