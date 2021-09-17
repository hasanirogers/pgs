<div class="row-fluid">
<?php $counter=1;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('post_type=post&posts_per_page=12&paged='. $paged);if(have_posts()):while(have_posts()):the_post();if($counter==1):?>


<ul class="posts-grid row-fluid unstyled "><?php elseif($counter==4): ?><?php endif; ?>

<li class="span3">


<?php if(has_post_thumbnail()) {                            
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
			$image = vt_resize( $thumb,'' , 1000, 600, true, 100 );
		?>
		
		<figure class="featured-thumbnail thumbnail large">
		<div class="hider-page"></div>
		<a href="<?php the_permalink();?>"><img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" /><div class="zoom-icon"></div></a>
		</figure><?php } ?> 
		<div class="post_date_grid"><span><?php the_time('d'); ?></span><?php the_time('M Y'); ?></div>
		<div class="caption">
<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
<p class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,20);?></p>
<a class="btn" href="<?php the_permalink() ?>">Read More</a></div>
</li><!-- /.col -->

<?php if($counter==4): ?></ul><!-- /.row cols2 -->
<?php $counter=0;endif;$counter++;endwhile;if($counter==4):?><!-- /.row cols2 --><?php endif;endif; ?>

</div>
<?php get_template_part('includes/post-formats/post-nav'); ?>