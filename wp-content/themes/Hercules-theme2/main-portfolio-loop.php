<?php // Isotope Portfolio Init ?>
<?php 
	$i=1;
	if ( have_posts() ) while ( have_posts() ) : the_post(); 
	
	// Get categories
	$portfolio_cats = wp_get_object_terms($post->ID, 'portfolio_category');

	// Get tags
	$portfolio_tags = wp_get_object_terms($post->ID, 'portfolio_tag');

	// Theme Options vars
	$folio_filter = of_get_option('folio_filter');
	$folio_title = of_get_option('folio_title');
	$folio_btn = of_get_option('folio_btn');
	$folio_excerpt = of_get_option('folio_excerpt');
	$folio_excerpt_count = of_get_option('folio_excerpt_count');
	$folio_thumb_width = of_get_option('folio_thumb_width');
	$folio_thumb_height = of_get_option('folio_thumb_height');
	$custom = get_post_custom($post->ID);
	if(has_post_thumbnail($post->ID)) {
	$thumb = get_post_thumbnail_id();
	$image = vt_resize( $thumb,'' , $folio_thumb_width, $folio_thumb_height, true, 100 );
	}
	//mediaType init
	$mediaType = get_post_meta($post->ID, 'tz_portfolio_type', true);
	?>
	
	<li class="portfolio_item <?php foreach( $portfolio_cats as $portfolio_cat ) { echo $portfolio_cat->slug.' ';} ?> <?php foreach( $portfolio_tags as $portfolio_tag ) { echo $portfolio_tag->slug.' ';} ?>">
	<div class="hider"></div> 
		<div class="portfolio_item_holder">
		
			<?php
			//check thumb and media type
			if(has_post_thumbnail($post->ID) && $mediaType != 'Video' && $mediaType != 'Audio'){ 
			
				//Disable overlay_gallery if we have Image post
				$prettyType = 0;
				if($mediaType != 'Image') { 
					$prettyType = "prettyPhoto[gallery".$i."]";
				} else { 
					$prettyType = 'prettyPhoto';
				}
			?>
		
			<figure class="thumbnail thumbnail__portfolio">
			<div class="image-wrap">
			<div class="photo">
				<a class="image-wrap" title="<?php the_title();?>"><img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" /><div class="heading"><h4><?php $title = the_title('','',FALSE); echo $title; ?></h4></div></a>  
				<div class="caption" style="text-align:center; ">
				
				<?php if($folio_title == "yes") { ?>
				<!--<h4><?php $title = the_title('','',FALSE); echo substr($title, 0, 20); ?></h4>-->
				<?php } ?>
				<?php if($folio_excerpt == "yes") { ?>
				<p class="portfolio-custom"><?php $excerpt = get_the_excerpt(); echo $excerpt; /*echo my_string_limit_words($excerpt,$folio_excerpt_count);*/ ?></p>
				<?php } ?>
				<?php if($folio_btn == "yes") { ?>
				<div style="padding-left:20px; padding-right:20px;">
				<div class="line-thru">
				<!-- <a href="<?php the_permalink() ?>"><span>Read More</span></a> -->
				</div></div>
				<?php } ?>
				
				</div>
				</div>
				</div>
			</figure>
			
			<?php
			$thumbid = 0;
			$thumbid = get_post_thumbnail_id($post->ID);
		
			$images = get_children( array(
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_type' => 'attachment',
				'post_parent' => $post->ID,
				'post_mime_type' => 'image',
				'post_status' => null,
				'numberposts' => -1
						) ); 
						
				/* $images is now a object that contains all images (related to post id 1) and their information ordered like the gallery interface. */
				if ( $images ) {
					//looping through the images
					foreach ( $images as $attachment_id => $attachment ) {
					 if( $attachment->ID == $thumbid ) continue;
						$image_attributes = wp_get_attachment_image_src( $attachment_id, 'full' ); // returns an array
						$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
						$image_title = $attachment->post_title;
						?>
						<a href="<?php echo $image_attributes[0]; ?>" title="<?php the_title(); ?>" style="display:none;"><img src="<?php echo $image_attributes[0]; ?>" alt="<?php echo $alt; ?>"/></a>
					<?php
					}
				} 
			} else if(has_post_thumbnail($post->ID)) { ?>				
				<figure class="thumbnail thumbnail__portfolio">
			<div class="image-wrap">
			<div class="photo">
				<a class="image-wrap" href="<?php the_permalink() ?>" title="<?php the_title();?>"><img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" /><div class="heading-video"></div></a>
				<div class="caption" style="text-align:center; ">
				<span>
				<?php if($folio_title == "yes") { ?>
				<a href="<?php the_permalink() ?>"><h4><?php $title = the_title('','',FALSE); echo substr($title, 0, 20); ?></h4></a>
				<?php } ?>
				<?php if($folio_excerpt == "yes") { ?>
				<p class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,$folio_excerpt_count);?></p>
				<?php } ?>
				<?php if($folio_btn == "yes") { ?>
				<div style="padding-left:20px; padding-right:20px;">
				<div class="line-thru">
				<a href="<?php the_permalink() ?>"><span>Read More</span></a>
				</div></div>
				<?php } ?>
				</span>
				</div>
				</div>
				</div>
			</figure>
				
			<?php } ?>		
			
		</div>
	</li>	
	<?php $i++; endwhile; ?>