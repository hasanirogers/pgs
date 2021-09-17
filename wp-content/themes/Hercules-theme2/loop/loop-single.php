<?php /* Loop Name: Loop single */ ?>
<?php if (have_posts()) : while (have_posts()) : the_post();                
	// The following determines what the post format is and shows the correct file accordingly
	$format = get_post_format();
	get_template_part( 'includes/post-formats/'.$format );  
		         
	if($format == '')
		get_template_part( 'includes/post-formats/standard' );
	get_template_part( 'includes/post-formats/share-buttons' );
	wp_link_pages('before=<div class="pagination">&after=</div>');
?>


			<!-- END .entry-meta -->
				
					<!--BEGIN .pager .single-pager -->
				<ul class="pager single-pager">
					<?php if (get_next_post()) : ?>
					<li class="next"><?php next_post_link('%link', __('<i class="icon-angle-right"></i>', HS_CURRENT_THEME)) ?></li>
				<?php endif; ?>
				<?php if (get_previous_post()) : ?>
					<li class="previous"><?php previous_post_link('%link', __('<i class="icon-angle-left"></i>', HS_CURRENT_THEME)) ?></li>
				<?php endif; ?>

			
				<!--END .pager .single-pager -->
				</ul>
<?php get_template_part( 'includes/post-formats/related-posts' ); ?>
			<?php comments_template('', true); ?>

	
	
<?php
	endwhile; endif; 
?>