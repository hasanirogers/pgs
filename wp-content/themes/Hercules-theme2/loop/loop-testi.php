<?php /* Loop Name: Loop testi */ ?>
<?php if (have_posts()) : ?>
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('post_type=testi&posts_per_page=3&paged='. $paged ); ?>
		<?php while (have_posts()) : the_post(); ?>
<?php
$custom = get_post_custom($post->ID);
	$testiname = $custom["my_testi_caption"][0];
	$testiurl = $custom["my_testi_url"][0];
	$testiinfo = $custom["my_testi_info"][0];
?>
<article id="post-<?php the_ID(); ?>" class="testimonial clearfix" style="margin-bottom:25px;">
	<blockquote class="testimonial_bq">
		<?php if(has_post_thumbnail()) {                            
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
			$image = vt_resize( $thumb,'' , 145, 145, false, 100 );
		?>
		<figure class="featured-thumbnail thumbnail hidden-phone">
			<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" />
		</figure>
		<?php } ?>  
		<div class="testimonial_content">
			<?php the_content(); ?>                   
			<small>
				<?php if($testiname) { ?>
					<span class="user"><?php echo $testiname; ?></span><?php _e(', ', 'HS_CURRENT_THEME'); ?>
				<?php } ?>
				<?php if($testiinfo) { ?>
					<span class="info"><?php echo $testiinfo; ?></span><br />
				<?php } ?>
				<?php if($testiurl) { ?>
					<a href="<?php echo $testiurl; ?>"><?php echo $testiurl; ?></a>
				<?php } ?>
			</small>
		</div>
	</blockquote>
</article>     
		<?php endwhile; else: ?>   
			<div class="no-results">
	<?php echo '<p><strong>' . __('There has been an error.', 'HS_CURRENT_THEME') . '</strong></p>'; ?>
	<p><?php _e('We apologize for any inconvenience, please', 'HS_CURRENT_THEME'); ?> <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'HS_CURRENT_THEME'); ?></a> <?php _e('or use the search form below.', 'HS_CURRENT_THEME'); ?></p>
	<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
</div><!--no-results-->
	<?php endif; ?>

<?php 
	get_template_part('includes/post-formats/post-nav');
?>