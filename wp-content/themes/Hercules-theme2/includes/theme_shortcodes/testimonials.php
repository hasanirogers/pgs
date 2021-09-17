<?php
//Testimonials
if (!function_exists('shortcode_testimonials')) {

	function shortcode_testimonials($atts, $content = null) {
		extract(shortcode_atts(array(
				'slug' => '',
				'excerpt_count' => '30',
				'custom_class' => ''
		), $atts));

		$testi = get_posts('post_type=testi&numberposts=1&post_date&name='.$slug);

		$output = '<div class="testimonials">';
		
		global $post;
		global $my_string_limit_words;

		foreach($testi as $post){
				setup_postdata($post);
				$excerpt = get_the_excerpt();
				$custom = get_post_custom($post->ID);
				if ( isset($custom["my_testi_caption"][0]) ) {
					$testiname = $custom["my_testi_caption"][0];
				}
				if ( isset($custom["my_testi_url"][0]) ) {
					$testiurl = $custom["my_testi_url"][0];
				}
				if ( isset($custom["my_testi_info"][0]) ) {
					$testiinfo = $custom["my_testi_info"][0];
				}				
				
				$output .= '<div class="testi-item">';
						$output .= '<div class="testi-item_blockquote">';
							
							
								$output .= my_string_limit_words($excerpt,$excerpt_count);
							$output .= '<div class="clear"></div>';

					$output .= '</div>';

					$output .= '<small class="testimonials-meta">';
							if( isset($testiname) ) { 
							$output .= '<a href="'.get_permalink($post->ID).'">';
								$output .= '<span class="user-testimonials">';
									$output .= $testiname;
								$output .= '</span></a>';
							}
							
							if( isset($testiinfo) ) { 
								$output .= '<span class="info-testimonials">';
									$output .= $testiinfo;
								$output .= '</span><br>';
							}
							
							if( isset($testiurl) ) { 
								$output .= '<a href="'.$testiurl.'">';
									$output .= $testiurl;
								$output .= '</a>';
							}
							
						$output .= '</small>';
						
				$output .= '</div>';

		}
		$output .= '</div>';
		return $output;
	}
	add_shortcode('testimonials', 'shortcode_testimonials');
}
?>