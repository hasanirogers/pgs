<?php /* Loop Name: Loop single testi */ ?>
<div class="page-header">
	<h1><?php the_title(); ?></h1>
</div>          
<?php if (have_posts()) : while (have_posts()) : the_post();
	$custom = get_post_custom($post->ID);
	
?>
<article id="post-<?php the_ID(); ?>" class="">

		<?php if(has_post_thumbnail()) {
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
				$image = vt_resize( $thumb,'' , 145, 145, true, 100 );
			?>
			<figure class="featured-thumbnail thumbnail hidden-phone">
				<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" />
			</figure>
		<?php } ?>  
		<div class="">               
			<?php the_content(); ?>
		</div>

</article> <div class="clear"></div>         
<?php endwhile; else: ?>
<div class="no-results">
	<?php echo '<p><strong>' . __('There has been an error.', HS_CURRENT_THEME) . '</strong></p>'; ?>
	<p><?php _e('We apologize for any inconvenience, please', HS_CURRENT_THEME); ?> <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', HS_CURRENT_THEME); ?></a> <?php _e('or use the search form below.', HS_CURRENT_THEME); ?></p>
	<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
</div><!--no-results-->
<?php endif; ?>

<ul class="pager single-pager">
	<li class="previous">
		<?php previous_post_link('%link', __('&laquo; Previous post', HS_CURRENT_THEME)) ?>
		</li><!--.previous-->
	<li class="next">
		<?php next_post_link('%link', __('Next Post &raquo;', HS_CURRENT_THEME)) ?>
	</li><!--.next-->
</ul><!--.pager-->