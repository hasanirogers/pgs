<?php if(!is_singular()) : ?>

	<?php $post_image_size = of_get_option('post_image_size'); ?>
	<?php if($post_image_size=='' || $post_image_size=='normal'){ ?>
		<?php if(has_post_thumbnail()) { ?>
			<figure class="featured-thumbnail thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
		<?php } ?>
	<?php } else { ?>
		<?php if(has_post_thumbnail()) { ?>
				<?php
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
					//$image = aq_resize( $img_url, 1400, 480, true ); //resize & crop img
					$image = vt_resize( $thumb,'' , 1400, 480, true, 100 );
				?>
				<figure class="featured-thumbnail thumbnail large">
				<div class="hider-page"></div>
					<a class="image-wrap" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" /><span class="zoom-icon"></span></a>
				</figure>
		<?php } ?>
	<?php } ?>

<?php else :?>

<?php $single_image_size = of_get_option('single_image_size'); ?>
<?php if ($single_image_size == '' || $single_image_size == 'normal'){ ?>
	<?php if(has_post_thumbnail()) { ?>
		<figure class="featured-thumbnail thumbnail"><?php the_post_thumbnail(); ?></figure>
	<?php } ?>
<?php } else { ?>
	<?php if(has_post_thumbnail()) { ?>
		<?php
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
			$image = vt_resize( $thumb,'' , 1400, 480, true, 100 );
		?>
		<figure class="featured-thumbnail thumbnail large">
		<div class="hider-page"></div>
			<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" />
		</figure>
	<?php } ?>
<?php } ?>

<?php endif; ?>