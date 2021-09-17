<?php
/**
 * OurStaff Grid
 *
 */

function ourstaff_grid_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => 'team',
		'columns' => '3',
		'rows' => '1',
		'order_by' => 'date',
		'order' => 'DESC',
		'thumb_width' => '266',
		'thumb_height' => '266',
		'excerpt_count' => '15',
		'custom_class' => ''
	), $atts));


	$spans = $columns;

	// columns
	switch ($spans) {
		case '1':
			$spans = 'span12';
			break;
		case '2':
			$spans = 'span6';
			break;
		case '3':
			$spans = 'span4';
			break;
		case '4':
			$spans = 'span3';
			break;
		case '6':
			$spans = 'span2';
			break;
	}

	// check what order by method user selected
	switch ($order_by) {
		case 'date':
			$order_by = 'post_date';
			break;
		case 'title':
			$order_by = 'title';
			break;
		case 'popular':
			$order_by = 'hs_comment_count';
			break;
		case 'random':
			$order_by = 'rand';
			break;
	}

	// check what order method user selected (DESC or ASC)
	switch ($order) {
		case 'DESC':
			$order = 'DESC';
			break;
		case 'ASC':
			$order = 'ASC';
			break;
	}

	

		global $post;
		global $my_string_limit_words;

		$numb = $columns * $rows;
						
		$args = array(
			'post_type' => $type,
			'numberposts' => $numb,
			'orderby' => $order_by,
			'order' => $order
		);		

		$posts = get_posts($args);
		$i = 0;
		$count = 1;
		$output_end = '';
		if ($numb > count($posts)) {
			$output_end = '</ul>';
		}

		$output = '<ul class="posts-grid row-fluid unstyled text-center '. $custom_class .'">';

		for ( $j=0; $j < count($posts); $j++ ) {
			$post_id = $posts[$j]->ID;
			setup_postdata($posts[$j]);
			$excerpt = get_the_excerpt();
			$teampos = get_post_meta($post_id, 'my_team_pos', true);
			$email = get_post_meta($post_id, 'my_email', true);
			$facebook = get_post_meta($post_id, 'my_facebook', true);
			$twitter = get_post_meta($post_id, 'my_twitter', true);
			$flickr = get_post_meta($post_id, 'my_flickr', true);
			$linkedin = get_post_meta($post_id, 'my_linkedin', true);
			$googleplus = get_post_meta($post_id, 'my_googleplus', true);
			$pinterest = get_post_meta($post_id, 'my_pinterest', true);
			$skype = get_post_meta($post_id, 'my_skype', true);
			if(has_post_thumbnail($post_id)) {
			$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
			$url = $attachment_url['0'];
			$ul = get_post_thumbnail_id($post_id);
			$image = vt_resize( $ul,'' , $thumb_width, $thumb_height, true, 100 );
			}
			$mediaType = get_post_meta($post_id, 'tz_portfolio_type', true);
			$prettyType = 0;

				if ($count > $columns) {
					$count = 1;
					$output .= '<ul class="posts-grid row-fluid unstyled text-center '. $custom_class .'">';
				}

				$output .= '<li class="'. $spans .'">';
					if(has_post_thumbnail($post_id)) {
																				

						$output .= '<div class="image-mail" style="position:relative; margin: 0 auto; width:'.$image['width'].'px;">';
						$output .= '<a href="mailto:'.$email.'" title="'.get_the_title($post_id).'">';
						$output .= '<div class="zoom-mail"><div style="position:absolute; top:50%; left:50%; margin: -40px 0 0 -37px;"><i class="icon-envelope-alt icon-5x icon-light"></i></div></div>';
						$output .= '<img  src="'.$image['url'].'" width="'.$thumb_width.'" height="'.$thumb_height.'" alt="'.get_the_title($post_id).'" />';
						
						$output .= '</a></div>';
					} 

					$output .= '<div class="clear"></div>';

					

					$output .= '<h5><a href="'.get_permalink($post_id).'" title="'.get_the_title($post_id).'">';
						$output .= get_the_title($post_id);
					$output .= '</a>';
					if($teampos) {
					$output .= ' <br /><span class="teampos">'.$teampos;
					}
					$output .= '</span></h5>';
					
				
					if($excerpt_count >= 1){
						$output .= '<p class="excerpt">';
							$output .= $excerpt;
						$output .= '</p>';
					}
					$output .= '<div class="social">';
					if($facebook != ''){
						
						$output .= '<a href="'.$facebook.'" target="_blank">';
						$output .= '<span class="icon-stack"><i class="icon-circle icon-stack-base"></i><i class="icon-facebook icon-2x icon-light"></i></span>';
						$output .= '</a>';
					}
					if($twitter != ''){
						$output .= '<a href="'.$twitter.'" target="_blank">';
						$output .= '<span class="icon-stack"><i class="icon-circle icon-stack-base"></i><i class="icon-twitter icon-light"></i></span>';
						$output .= '</a>';
					}
					if($flickr != ''){
						$output .= '<a href="'.$flickr.'" target="_blank">';
						$output .= '<span class="icon-stack"><i class="icon-circle icon-stack-base"></i><i class="icon-flickr icon-light"></i></span>';
						$output .= '</a>';
					}
					if($linkedin != ''){
						$output .= '<a href="'.$linkedin.'" target="_blank">';
						$output .= '<span class="icon-stack"><i class="icon-circle icon-stack-base"></i><i class="icon-linkedin icon-light"></i></span>';
						$output .= '</a>';
					}
					if($googleplus != ''){
			$output .= '<a href="'.$googleplus.'" target="_blank">';
						$output .= '<span class="icon-stack"><i class="icon-circle icon-stack-base"></i><i class="icon-googleplus icon-light"></i></span>';
						$output .= '</a>';
					}
					if($pinterest != ''){
				$output .= '<a href="'.$pinterest.'" target="_blank">';
						$output .= '<span class="icon-stack"><i class="icon-circle icon-stack-base"></i><i class="icon-pinterest icon-light"></i></span>';
						$output .= '</a>';
					}
					if($skype != ''){
					$output .= '<a href="'.$skype.'" target="_blank">';
						$output .= '<span class="icon-stack"><i class="icon-circle icon-stack-base"></i><i class="icon-skype icon-light"></i></span>';
						$output .= '</a>';
					}
		   
					$output .= '</div>';

					$output .= '</li>';
					if ($j == count($posts)-1) {
						$output .= $output_end;
					}
				if ($count % $columns == 0) {
					$output .= '</ul>';
				}
			$count++;
			$i++;		

		} // end for
		
		return $output;
}
 
add_shortcode('ourstaff_grid', 'ourstaff_grid_shortcode'); ?>