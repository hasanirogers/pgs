<article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>
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
	<?php get_template_part('includes/post-formats/post-thumb'); ?>
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
		<a href="<?php the_permalink() ?>" class="btn btn-large"><?php _e('Read more', HS_CURRENT_THEME); ?></a>
		<div class="clear"></div>
	</div>
			
	<?php else :?>	
	<!-- Post Content -->
	<div class="post_content">	
	<?php get_template_part('includes/post-formats/post-thumb'); ?>
		<?php the_content(''); ?>
		<div class="clear"></div>
	</div>
	<!-- //Post Content -->	
	<?php endif; ?>
	
</div></div>
</article>