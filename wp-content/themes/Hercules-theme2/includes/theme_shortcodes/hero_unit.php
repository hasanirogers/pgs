<?php
/**
 * Hero Unit
 *
 */
if (!function_exists('hero_unit_shortcode')) {

	function hero_unit_shortcode($atts, $content = null) { 
	    extract(shortcode_atts(
	        array(
				'title' => '',
				'text' => '',
				'btn_text' => 'read more',
				'btn_link' => '',
				'btn_style' => '',
				'btn_size' => '',
				'btn_icon' => '',
				'target' => '',
				'custom_class' => ''
	    ), $atts));
	 
	
		$output =  '<div class="hero-unit clearfix '.$custom_class.'">';
		
		
	 $output .= '<div class="pull-left">';
		if ($title!="") {
			$output .= '<h5>';
			$output .= $title;
			$output .= '</h5>';
		}
		
		if ($text!="") {
			$output .= '<p>';
			$output .= $text;
			$output .= '</p>';
		}
		$output .= '</div>';
		if ($btn_link!="") {	
			$output .=  '<div class="pull-right"><a href="'.$btn_link.'" title="'.$btn_text.'" class="btn btn-'.$btn_style.' btn-'.$btn_size.'" target="'.$target.'">';
			 if ($btn_icon!="") {
			$output .= '<i class="';
			$output .= $btn_icon;
			$output .= '"></i> ';
		}
			$output .= $btn_text;
			$output .= '</a></div>';
		}
	 
		$output .= '</div><!-- .hero-unit (end) -->'; 
	    return $output; 
	} 
	add_shortcode('hero_unit', 'hero_unit_shortcode');
	
}?>