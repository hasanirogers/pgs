<?php

	/*-----------------------------------------------------------------------------------*/
	/* Set Proper Parent/Child theme paths for inclusion
	/*-----------------------------------------------------------------------------------*/

	@define( 'HS_PARENT_DIR', get_template_directory() );
	@define( 'HS_CHILD_DIR', get_stylesheet_directory() );

	@define( 'HS_PARENT_URL', get_template_directory_uri() );
	@define( 'HS_CHILD_URL', get_stylesheet_directory_uri() );

	//Loading Custom function
	include_once(HS_CHILD_DIR . '/includes/custom-function.php');	
	
	//Loading jQuery and Scripts
	require_once HS_PARENT_DIR . '/includes/theme-scripts.php';
	
	
	//Widget and Sidebar
	require_once HS_CHILD_DIR . '/includes/sidebar-init.php';
	require_once HS_PARENT_DIR . '/includes/register-widgets.php';
	
	//Theme initialization
	require_once HS_CHILD_DIR . '/includes/theme-init.php';
	
	//Additional function
	require_once HS_PARENT_DIR . '/includes/theme-function.php';
	
	//Shortcodes
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/columns.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/shortcodes.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/posts_grid.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/alert.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/tabs.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/toggle.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/html.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/misc.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/service_box.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/clientslist.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/post_cycle.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/carousel.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/progressbar.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/skills.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/banner.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/table.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/hero_unit.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/categories.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/ourstaff_grid.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/services_grid.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/testimonials.php';
	require_once HS_PARENT_DIR . '/includes/theme_shortcodes/heading-entrance.php';
	
	
	//tinyMCE includes
	include_once(HS_PARENT_DIR . '/includes/theme_shortcodes/tinymce/tinymce_shortcodes.php');
	
	
		//Resizer for image cropping and resizing on the fly
	require_once HS_PARENT_DIR . '/includes/resizer.php';
	
	// Add the pagemeta
	include_once(HS_PARENT_DIR . '/includes/theme-pagemeta.php');
	
	// Add the servicesmeta
	include_once(HS_PARENT_DIR . '/includes/theme-servicesmeta.php');
	
	// Add the postmeta
	include_once(HS_PARENT_DIR . '/includes/theme-postmeta.php');
	
	// Add the postmeta to Portfolio posts
	include_once(HS_PARENT_DIR . '/includes/theme-portfoliometa.php');
	
	// Add the postmeta to Slider posts
	include_once(HS_PARENT_DIR . '/includes/theme-slidermeta.php');
	
	// Add the postmeta to Testimonials
	include_once(HS_PARENT_DIR . '/includes/theme-testimeta.php');
	
	// Add the postmeta to Our Team posts
	include_once(HS_PARENT_DIR . '/includes/theme-teammeta.php');

	//Loading options.php for theme customizer
	include_once(HS_CHILD_DIR . '/options.php');

	//Plugin Activation
	require_once(HS_CHILD_DIR . '/includes/class-tgm-plugin-activation.php');
	require_once(HS_CHILD_DIR . '/includes/register-plugins.php');

	
	//Loading theme textdomain
	if ( !function_exists('hercules_theme_setup')) {
		function hercules_theme_setup() {
		    load_theme_textdomain( HS_CURRENT_THEME, HS_PARENT_DIR . '/languages' );	 
		}
		add_action('after_setup_theme', 'hercules_theme_setup');
	}	
	
	// removes detailed login error information for security
	add_filter('login_errors',create_function('$hs_a', "return null;"));
	
	/* 
	 * Loads the Options Panel
	 *
	 * If you're loading from a child theme use stylesheet_directory
	 * instead of template_directory
	 */
	if ( !function_exists( 'hs_optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', HS_PARENT_URL . '/admin/' );
		require_once dirname( __FILE__ ) . '/admin/options-framework.php';
	}
	
	// Removes Trackbacks from the comment cout	
	if (!function_exists('hs_comment_count')) {
		add_filter('get_comments_number', 'hs_comment_count', 0);
		
		function hs_comment_count( $hs_count ) {
			if ( ! is_admin() ) {
				global $id;
				$hs_comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
				return count($hs_comments_by_type['comment']);
			} else {
				return $hs_count;
			}
		}
	
	}
	
	
	// Post Formats
	$hs_formats = array( 
				'aside', 
				'gallery', 
				'link', 
				'image', 
				'quote', 
				'audio',
				'video');
	add_theme_support( 'post-formats', $hs_formats ); 
	add_post_type_support( 'post', 'post-formats' );
	

// Removing rel from category
add_filter( 'the_category', 'hs_remove_cat_rel' );
function hs_remove_cat_rel( $hs_list )
{
    return str_replace(
        array ( 'rel="category tag"', 'rel="category"' ), '', $hs_list
    );
}
	
	// enable shortcodes in sidebar
	add_filter('widget_text', 'do_shortcode');
	
	// custom excerpt ellipses for 2.9+
	if(!function_exists('hs_custom_excerpt_more')) {
	
		function hs_custom_excerpt_more($more) {
			return 'Read More &raquo;';
		}
		add_filter('excerpt_more', 'hs_custom_excerpt_more');
	
	}
	
	// no more jumping for read more link
	if(!function_exists('hs_no_more_jumping')) {
		
		function hs_no_more_jumping($post) {
			return '&nbsp;<a href="'.get_permalink().'" class="read-more">'.'Continue Reading'.'</a>';
		}
		add_filter('excerpt_more', 'hs_no_more_jumping');
		
	}
	
function hs_admin_css(){ 
echo '<style type="text/css">';
	$hercules_custom_css = of_get_option('custom_css');
		if($hercules_custom_css) {
		echo of_get_option('custom_css'); 
} 
		 $hercules_background = of_get_option('body_background');
			if ($hercules_background != '') {
				if ($hercules_background['image'] != '') {
					echo 'body { background-image:url('.$hercules_background['image']. '); background-repeat:'.$hercules_background['repeat'].'; background-position:'.$hercules_background['position'].';  background-attachment:'.$hercules_background['attachment'].'; }';
				}
				if($hercules_background['color'] != '') {
					echo 'body { background-color:'.$hercules_background['color']. '}';
				}
			};
			
$hercules_global_color = of_get_option('global_color'); 
			if($hercules_global_color) {
			echo '.blue, #ascrail2000 div, .progress .bar, .ourclients .hr, .clients .hr {
background:'.$hercules_global_color.';
}
.blue h5{
color:#ffffff;
}
.blue a {color:#ffffff; opacity:0.60;filter: alpha(opacity=60); -moz-opacity: 0.6; }
.blue a:hover{opacity:1;filter: alpha(opacity=100); -moz-opacity: 1;}
.blue .hr{
background:#ffffff;
}';
			}
			
$hercules_mainmenu_submenu_hover_button_color = of_get_option('mainmenu_submenu_hover_button_color'); 
			if($hercules_mainmenu_submenu_hover_button_color) {
			
			echo '.sf-menu li li > a:hover, .sf-menu li li.sfHover > a, .sf-menu li li.current-menu-item > a { background: '.$hercules_mainmenu_submenu_hover_button_color.' url('.HS_PARENT_URL .'/images/line-menu.png) repeat-x bottom; }';
			}
			
$hercules_mainmenu_submenu_button_color = of_get_option('mainmenu_submenu_button_color'); 
			if($hercules_mainmenu_submenu_button_color) {
			
			echo '.sf-menu li li a { background: '.$hercules_mainmenu_submenu_button_color.' url('.HS_PARENT_URL .'/images/line-menu.png) repeat-x bottom; }';
			}

$hercules_mainmenu_line_button_color = of_get_option('mainmenu_line_button_color'); 
			if($hercules_mainmenu_line_button_color) {
			
			echo '.sf-menu > li.sfHover > a span, .sf-menu > li.current-menu-item > a span, .sf-menu > li.current-menu-ancestor  > a span, .sf-menu > li > a span, .sf-menu > li > a:hover span { background: '.$hercules_mainmenu_line_button_color.'; }';
			}
			
$hercules_mainmenu_hover_button_color = of_get_option('mainmenu_hover_button_color'); 
			if($hercules_mainmenu_hover_button_color) {
			
			echo '.sf-menu > li > a:hover, .sf-menu > li.sfHover > a {
 background:'.$hercules_mainmenu_hover_button_color.';
}';
			}

$hercules_mainmenu_current_button_color = of_get_option('mainmenu_current_button_color'); 
			if($hercules_mainmenu_current_button_color) {
			
			echo '.sf-menu > li.current-menu-item > a, .sf-menu > li.current-menu-ancestor  > a {
 background:'.$hercules_mainmenu_current_button_color.';
}';
			}
			
			
$hercules_subtitle_styling = of_get_option('subtitle_color'); 
			if($hercules_subtitle_styling) {
			
			echo '.title-section h2 {
    color: '.$hercules_subtitle_styling.';
}';
			}
		 $hercules_links_styling = of_get_option('links_color'); 
			if($hercules_links_styling) {
				echo 'a {color:'.$hercules_links_styling.'}';
				echo '.button {background:'.$hercules_links_styling.'}';
				echo '.nav-pills > .active > a,
.nav-pills > .active > a:hover,
.nav-pills > .active > a:focus {
  color: '.$hercules_links_styling.';
}';

echo '.form-submit input[type="submit"]:hover,
.btn:hover,
.btn:focus {
  color: #ffffff;
  text-decoration: none;
  background-color: '.$hercules_links_styling.';
  border-color: '.$hercules_links_styling.';
}';

echo '.ourclients .flex-control-paging li a.flex-active {
    background: none repeat scroll 0% 0% transparent;
    border: 2px solid '.$hercules_links_styling.';
}';

echo '.footer a {
    color: '.$hercules_links_styling.';
}';

echo '.twitter .stream-item-header .account-group .username {
    color: '.$hercules_links_styling.';
}';
echo '.footer-widgets .social a:hover {
    color: '.$hercules_links_styling.';
}';	
echo '.social a:hover {
    color: '.$hercules_links_styling.';
}	';	
echo '.photo .heading, .photo .heading-video {
    bottom: 0px;
    background: none repeat scroll 0% 0% '.$hercules_links_styling.';		
			}';
echo '.nav-pills span a:hover {
    color: '.$hercules_links_styling.';
    padding: 6px;
    text-decoration: none;
}';
echo '.twitter i {
    color: '.$hercules_links_styling.';
    position: absolute;
    left: 0px;
}';
echo '.zoom-icon, .zoom-insta, .zoom-icon-video, .image-mail:hover .zoom-mail {
	background:'.$hercules_links_styling.';
			}';
			}
			echo '</style>';
	 } 
add_action( 'wp_head', 'hs_admin_css' ); 

	// category id in body and post class
	if(!function_exists('hs_category_id_class')) {
		
		function hs_category_id_class($hs_classes) {
			global $post;
			foreach((get_the_category()) as $category)
				$hs_classes [] = 'cat-' . $category->cat_ID . '-id';
				return $hs_classes;
		}
		add_filter('post_class', 'hs_category_id_class');
		add_filter('body_class', 'hs_category_id_class');
		
	}
	
	// Threaded Comments
	if(!function_exists('hs_enable_threaded_comments')) {
		function hs_enable_threaded_comments()
		{
			if (!is_admin()) {
				if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
					wp_enqueue_script('comment-reply');
				}
			}	
		}
		add_action('get_header', 'hs_enable_threaded_comments');
	}
	
function hs_site_title()   {
	if ( of_get_option('sitetitle') != '' ) {
		echo of_get_option('sitetitle');
	}else {
	bloginfo( 'name' );
}
}
function hs_site_tagline()   {
	if ( of_get_option('tagline') != '' ) {
		echo of_get_option('tagline');
	}else {
	bloginfo('description');
}
}
 /* 
 * The CSS file selected in the options panel 'stylesheet' option
 * is loaded on the theme front end
 *
 * If you'd prefer to use the 'auto_stylesheet' option, replace
 * of_get_option('stylesheet') with of_get_option('auto_stylesheet')
 *
 * If the "Default" option is selected, "0" is returned (equivalent to false),
 * which means no files will be registered or enqueued
 */
 
function hs_options_stylesheets_alt_style()   {
	if ( of_get_option('stylesheet') ) {
		wp_enqueue_style( 'hs_options_stylesheets_alt_style', of_get_option('stylesheet'), array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'hs_options_stylesheets_alt_style' );


	// Navigation with description
	if (! class_exists('hs_description_walker')) {
		class hs_description_walker extends Walker_Nav_Menu {
			function start_el(&$output, $item, $depth, $args) {
				global $wp_query;
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$class_names = $value = '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
				$class_names = ' class="'. esc_attr( $class_names ) . '"';

				//$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
				
				$output .= $indent . '<li ' . $value . $class_names .'>';

				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

				$description  = ! empty( $item->description ) ? '<span class="desc">'.esc_attr( $item->description ).'</span>' : '';

				if($depth != 0) {
					$description = $append = $prepend = "";
				}

				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before;

				if (isset($prepend))
					$item_output .= $prepend;

				$item_output .= apply_filters( 'the_title', $item->title, $item->ID );

				if (isset($append))
					$item_output .= $append;
				
				$item_output .= $description.$args->link_after;		
                $item_output .= '<span></span>';				
				$item_output .= '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}
	}
	
//Detach & Re-Attach Media Attachment
	
add_filter("manage_upload_columns", 'hs_upload_columns');
add_action("manage_media_custom_column", 'hs_media_custom_columns', 0, 2);
function hs_upload_columns($columns) {
    unset($columns['parent']);
    $columns['better_parent'] = "Parent";
    return $columns;
}
function hs_media_custom_columns($column_name, $id) {
    $post = get_post($id);
    if($column_name != 'better_parent')
        return;
        if ( $post->post_parent > 0 ) {
            if ( get_post($post->post_parent) ) {
                $title =_draft_or_post_title($post->post_parent);
            }
            ?>
            <strong><a href="<?php echo get_edit_post_link( $post->post_parent ); ?>"><?php echo $title ?></a></strong>, <?php echo get_the_time(__('Y/m/d',HS_CURRENT_THEME)); ?>
            <br />
            <a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Re-Attach',HS_CURRENT_THEME); ?></a>
            <?php
        } else {
            ?>
            <?php _e('(Unattached)',HS_CURRENT_THEME); ?><br />
            <a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Attach',HS_CURRENT_THEME); ?></a>
            <?php
        }
}
?>