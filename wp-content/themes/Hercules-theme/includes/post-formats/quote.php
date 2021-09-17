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
	<?php if(is_singular()) : ?>
		<h1 class="post-title"><?php the_title(); ?></h1>
	<?php endif; ?>
	</header>

	<?php $quote =  get_post_meta(get_the_ID(), 'tz_quote', true); ?>
	<?php $author =  get_post_meta(get_the_ID(), 'tz_author_quote', true); ?>

	<div class="quote-wrap clearfix">
		<blockquote>
			<?php echo $quote; ?>
		</blockquote>
		<?php if($author) {
			echo '<cite>&mdash; ' . $author . '</cite>';
		} ?>
	</div>
	
	<!-- Post Content -->
	<div class="post_content">
		<?php the_content(''); ?>
		<div class="clear"></div>
	</div>
	<!-- //Post Content -->
	
	</div></div>

</article><!--//.post-holder-->