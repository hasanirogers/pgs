<?php
/**
 * Clientslist
 *
 */
if (!function_exists('shortcode_clientslist')) {

	function shortcode_clientslist($atts, $content = null) {
	
	global $hercules_add_carouFredSel;
    $hercules_add_carouFredSel = true;
	
		extract(shortcode_atts(array(
				'num' => '8',
				'width' => '180',
				'custom_class' => ''
		), $atts));

		$testi = get_posts('post_type=testi&orderby=post_date&numberposts='.$num);
$random = hs_gener_random(10);		

	$output = '<script type="text/javascript">
		jQuery(window).load(function() {
	  jQuery("#foo_'.$random.'").carouFredSel({
	  						responsive	: true,
							swipe : true,
	scroll: 1,
	items: {
		
		width: '.$width.',
		visible: {
							min: 1,
							max: '.$num.'
						}
	}
	  });
				});';		
		$output .= '</script>';
		$output .= '<div class="list_carousel '.$custom_class.'">';
		$output .= '<ul id="foo_'.$random.'">';
		global $post;
		global $my_string_limit_words;

		foreach($testi as $post){
				setup_postdata($post);
				$excerpt = get_the_excerpt();
				$custom = get_post_custom($post->ID);
				$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $attachment_url['0'];

						$output .= '<li>';
							
								if ( has_post_thumbnail($post->ID) ){
									$output .= '<a href="'.get_permalink($post->ID).'">';
									$output .= '<img src="'.$url.'" alt="Read More" />';
									$output .= '</a>';
								}
							
						
				$output .= '</li>';

		}
		$output .= '</ul>';
		$output .= '<div style="float: none; clear: both;"></div>';
		$output .= '</div>';
		return $output;
	}
	add_shortcode('clientslist', 'shortcode_clientslist');
}
?>