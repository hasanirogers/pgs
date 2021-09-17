<article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>
	
	<?php 
		if (has_post_thumbnail() ):
			$lightbox = get_post_meta(get_the_ID(), 'tz_image_lightbox', TRUE);
			if($lightbox == 'yes')
				$lightbox = TRUE;
			else
				$lightbox = FALSE;
		$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array( '9999','9999' ), false, '' );
	?>

	<div class="post-thumb clearfix">		
		<?php
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
			$image = vt_resize( $thumb,'' , 1170, 450, true, 100 );
		
		if($lightbox) : ?>			
			<figure class="featured-thumbnail thumbnail large">
			<div class="hider-page"></div>
				<a class="image-wrap" data-rel="prettyPhoto" title="<?php the_title(); ?>" href="<?php echo $src[0]; ?>"><img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" /><span class="zoom-icon"></span></a>
			</figure>
			<div class="clear"></div>	        
				<span class="overlay">
					<span class="arrow"></span>
				</span>			
		<?php else: ?>		
			<figure class="featured-thumbnail thumbnail large">
				<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" />
			</figure>
			<div class="clear"></div>			
		<?php endif; ?>		
	</div>
	<?php endif; ?>
	<div class="row-fluid">
	<?php $post_meta = of_get_option('post_meta'); ?>
<?php if ($post_meta=='true' || $post_meta=='') { ?>
	<div class="span3">
	<?php get_template_part('includes/post-formats/post-meta'); ?>
	</div>
	<div class="span9">
	<?php }else{ ?>
	<div class="span12">
	<?php } ?>
	<header class="post-header">	
		<?php if(!is_singular()) : ?>
		<?php $blog_author_name = of_get_option('blog_author_name');
              $post_author = of_get_option('post_author');		
		if ($post_author=='true' || $post_author=='') { ?>
		<span class="post_author"><?php echo $blog_author_name; ?> <?php the_author_posts_link() ?></span>
		<?php } ?>
			<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to:', HS_CURRENT_THEME);?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php else :?>
		<?php $blog_author_name = of_get_option('blog_author_name');
		$post_author = of_get_option('post_author');
		if ($post_author=='true' || $post_author=='') { ?>
		<span class="post_author"><?php echo $blog_author_name; ?> <?php the_author_posts_link() ?></span>
		<?php } ?>
			<h2 class="post-title"><?php the_title(); ?></h2>
		<?php endif; ?>
	</header>
	<?php if(!is_singular()) : ?>				
	<!-- Post Content -->
	<div class="post_content">
		<?php $post_excerpt = of_get_option('post_excerpt'); ?>
		<?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>		
			<div class="excerpt">			
			<?php 
				$content = get_the_content();
				$excerpt = get_the_excerpt();
			if (has_excerpt()) {
				the_excerpt();
			} else {
				if(!is_search()) {
				echo my_string_limit_words($content,55);
				} else {
				echo my_string_limit_words($excerpt,55);
				}
			} ?>			
			</div>
		<?php } ?>
		<a href="<?php the_permalink() ?>" class="btn btn-large"><?php _e('Read More', HS_CURRENT_THEME); ?></a>
		<div class="clear"></div>
	</div>
				
	<?php else :?>	
	<!-- Post Content -->
	<div class="post_content">	
		<?php the_content(''); ?>
		<div class="clear"></div>
	</div>
	<!-- //Post Content -->	
	<?php endif; ?>
	</div>		
	</div>	

</article><!--//.post__holder-->