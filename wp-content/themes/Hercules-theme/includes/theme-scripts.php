<?php
/*	Register javascript
/*-----------------------------------------------------------------------------------*/

add_action('init', 'hercules_register_script');
add_action('wp_footer', 'hercules_print_script_footer');
add_action('init', 'hercules_register_head');

function hercules_register_script() {

wp_register_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider.js', array('jquery'), '2.1',true);
wp_register_script('carouFredSel', get_template_directory_uri().'/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), '6.2',true);
	
wp_register_script('superfish', get_template_directory_uri().'/js/superfish.js', array('jquery'), '1.7.3',true);
wp_register_script('easing', get_template_directory_uri().'/js/jquery.easing.1.3.js', array('jquery'), '1.3',true);
wp_register_script('prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js', array('jquery'), '3.1.5',true);
wp_register_script('mobilemenu', get_template_directory_uri().'/js/jquery.mobilemenu.js', array('jquery'), '1.0',true);
wp_register_script('si_files', get_template_directory_uri().'/js/si.files.js', array('jquery'), '1.0',true);
wp_register_script('custom', get_template_directory_uri().'/js/custom.js', array('jquery'), '1.0',true);		
wp_register_script('appear', get_template_directory_uri().'/js/jquery.appear.js', array('jquery'), '1.0.0',true);
wp_register_script('classie', get_template_directory_uri().'/js/classie.js', array('jquery'), '1.0.0',true);

wp_register_script('AnimatedHeader', get_template_directory_uri().'/js/AnimatedHeader.js', array('jquery'), '1.0.0',true);
wp_register_script('camera', get_template_directory_uri().'/js/camera.min.js', array('jquery'), '1.3.4',true);
wp_register_script('isotope', get_template_directory_uri().'/js/jquery.isotope.js', array('jquery'), '1.5.25',true);
wp_register_script('debouncedresize', get_template_directory_uri().'/js/jquery.debouncedresize.js', array('jquery'), '1.0',true);

wp_register_script('swfobject', home_url().'/wp-includes/js/swfobject.js', array('jquery'), '2.2',true);
wp_register_script('playlist', get_template_directory_uri().'/js/jplayer.playlist.min.js', array('jquery'), '2.1.0',true);
wp_register_script('jplayer', get_template_directory_uri().'/js/jquery.jplayer.min.js', array('jquery'), '2.2.0',true);

wp_register_script('easypie', get_template_directory_uri().'/js/jquery.easy-pie-chart.js', array('jquery'), '1.0.0',true);
wp_register_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', array('jquery'), '2.3.0',true);

}

function hercules_register_head() {
if (!is_admin()) {
wp_register_script('uisearch', get_template_directory_uri().'/js/uisearch.js', array('jquery'), '1.0.0');
wp_register_script('modernizr', get_template_directory_uri().'/js/modernizr.js', array('jquery'), '2.0.6');
wp_register_script('jflickrfeed', get_template_directory_uri().'/js/jflickrfeed.js', array('jquery'), '1.0',false);
wp_enqueue_script('uisearch');
wp_enqueue_script('modernizr');
	}
}

function hercules_print_script_footer() {
	global $hercules_add_flexslider;
	global $hercules_add_donutchart;
    global $hercules_add_carouFredSel;
	global $hercules_add_swfobject;
	global $hercules_add_playlist;
	global $hercules_add_jplayer;
	global $hercules_add_animatedheader;
	
	wp_enqueue_script(array(
		'superfish', 
		'easing', 
		'prettyPhoto', 
		'mobilemenu', 
		'si_files', 
		'custom', 
		'appear', 
		'classie',
		'uisearch',
		'bootstrap'
	));
	
	if ( $hercules_add_animatedheader ) {
	wp_enqueue_script('AnimatedHeader');
	}
	
	if ( $hercules_add_jplayer ) {
	wp_enqueue_script('jplayer');
	}
	
	if ( $hercules_add_playlist ) {
	wp_enqueue_script('playlist');
	}
	
	if ( $hercules_add_swfobject ) {
	wp_enqueue_script('swfobject');
	}
	
	if ( $hercules_add_donutchart ) {
	wp_enqueue_script('easypie');
	}
	
	if ( $hercules_add_flexslider ) {
	wp_enqueue_script('flexslider');
	}
	
	if ( $hercules_add_carouFredSel ) {
	wp_enqueue_script('carouFredSel');
	}
	if(is_page_template('page-home-with-slideshow.php')) {
			
    wp_enqueue_script('camera');
    }
	if(is_page_template('page-Portfolio2Cols-filterable.php') || is_page_template('page-Portfolio3Cols-filterable.php') || is_page_template('page-Portfolio4Cols-filterable.php') || is_page_template('page-home-portfolio4cols.php')) {	
    wp_enqueue_script('isotope');
	wp_enqueue_script('debouncedresize');
	}
}

// Loading styles
function hercules_styles()
{
if (!is_admin()) {
		wp_register_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.css', false, '2.3', 'all' );
		wp_enqueue_style( 'bootstrap' );
		wp_register_style( 'responsive', get_template_directory_uri() . '/bootstrap/css/responsive.css', false, '2.3', 'all' );
		wp_enqueue_style( 'responsive' );
		wp_register_style( 'prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', false, '1.0', 'all' );
		wp_enqueue_style( 'prettyPhoto' );
		wp_register_style( 'camera', get_template_directory_uri() . '/css/camera.css', false, '1.0', 'all' );
		wp_register_style( 'mainstyle', get_template_directory_uri() . '/css/style.css', false, '1.0', 'all' );
		wp_enqueue_style( 'mainstyle' );
	
     if(is_page_template('page-home-with-slideshow.php') ) {
			wp_enqueue_style( 'camera' );
    }
	}
}
add_action('wp_enqueue_scripts','hercules_styles');

/*	Register and load admin javascript
/*-----------------------------------------------------------------------------------*/

function hs_admin_js($hook) {
	if ($hook == 'post.php' || $hook == 'post-new.php') {
		wp_register_script('hs-admin', get_template_directory_uri() . '/js/jquery.custom.admin.js', 'jquery');
		wp_enqueue_script('hs-admin');
	}
}
add_action('admin_enqueue_scripts','hs_admin_js',10,1);
?>