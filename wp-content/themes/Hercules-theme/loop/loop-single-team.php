<?php /* Loop Name: Loop single team */ ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	$custom = get_post_custom($post->ID);
	$teampos = $custom["my_team_pos"][0];
	$teaminfo = $custom["my_team_info"][0];
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<article class="team-holder single-post">

			

		<?php if(has_post_thumbnail()) {
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'thumbnail'); //get img URL
			$image = vt_resize( $thumb,'' , 145, 145, false, 100 );
		?>
		<figure class="featured-thumbnail">
			<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" />
		</figure>
		<?php } ?>
		<div class="team-content post-content">
		<?php if($teampos) { ?>
				<h2><?php echo $teampos; ?></h2>
			<?php } ?>
			<?php the_content(); ?>
			<span class="page-desc"><?php echo $teaminfo; ?></span>
		</div><!--.post-content-->
	</article>
</div><!-- #post-## -->
<?php endwhile; /* end loop */ endif; ?>