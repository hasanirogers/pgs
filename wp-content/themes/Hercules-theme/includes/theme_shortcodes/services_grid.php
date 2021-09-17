<?php
/**
 * Services Grid
 *
 */

function services_grid_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => 'services',
		'columns' => '3',
		'rows' => '1',
		'order_by' => 'date',
		'order' => 'DESC',
		'excerpt_count' => '15',
		'custom_class' => '',
		'icon_align' => 'pull-left',
		'icon_color' => '',
		'icon_size' => 'icon-5x',
		'link_text' => 'Read More'
	), $atts));

    $icon_align2 = '';
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
	
	// icon align
	switch ($icon_align) {
		case 'pull-left':
			$icon_align = 'pull-left';
			break;
		case 'pull-right':
			$icon_align = 'pull-right';
			break;
		case 'center':
			$icon_align2 = 'text-center';
			break;
		case 'none':
			$icon_align = '';
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

		$output = '<ul style="padding: 20px 0 20px 0;" class="posts-grid row-fluid unstyled services-grid '. $icon_align2 .' '. $custom_class .'">';

		for ( $j=0; $j < count($posts); $j++ ) {
			$post_id = $posts[$j]->ID;
			setup_postdata($posts[$j]);
			$excerpt = get_the_excerpt();

			$icon = get_post_meta($post_id, 'my_serv_icon', true);
			$url = get_post_meta($post_id, 'my_serv_url', true);


				if ($count > $columns) {
					$count = 1;
					$output .= '<ul class="posts-grid row-fluid unstyled services-grid '. $icon_align2 .' '. $custom_class .'">';
				}

				$output .= '<li class="'. $spans .'">';
					
																				
                   if($icon){
						if($url){ 
							$output .= '<a href="'.$url.'" class="services-link" title="'.$url.'">';
						}
						//$output .= '<span style="color:'.$icon_color.'"><i class="'.$icon.' '.$icon_size.' '.$icon_align.'"></i></span>';
						$output .= '<img src="'.get_template_directory_uri().'/images/'.$icon.'.png" class="'.$icon_size.' '.$icon_align.'">';
						if($url){ 
							$output .= '</a>';
						}
					}
					
					
if($url){ 
						$output .= '<a href="'.$url.'" class="services-link" title="'.$url.'">';
						}
					$output .= '<h5>';
						$output .= get_the_title($post_id);
					$output .= '</h5>';
					if($url){ 
						$output .= '</a>';
						}
					
				$output .= '<div class="clear"></div>';
					if($excerpt_count >= 1){
						$output .= '<p class="excerpt">';
							$output .= $excerpt;
						$output .= '</p>';
					}
                   // if($link){
						//$output .= '<a href="'.get_permalink($post_id).'" class="btn btn-primary" title="'.get_the_title($post_id).'">';
						//$output .= $link_text;
						//$output .= '</a>';
					//}
					
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
 
add_shortcode('services_grid', 'services_grid_shortcode'); ?>