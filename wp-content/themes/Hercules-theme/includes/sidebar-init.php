<?php
function hs_elegance_widgets_init() {
// Header Widget Area 1
	// Location: at the top of the header
	register_sidebar(array(
		'name'					=> 'Header Area 1',
		'id' 					=> 'hs_header_sidebar_1',
		'description'   => __( 'Located at the top of pages.', HS_CURRENT_THEME),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="header_heading">',
		'after_title' => '</div>',
	));
	// Header Widget Area 2
	// Location: at the top of the header
	register_sidebar(array(
		'name'					=> 'Header Area 2',
		'id' 					=> 'hs_header_sidebar_2',
		'description'   => __( 'Located at the top of pages.', HS_CURRENT_THEME),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="header_follow">',
		'after_title' => '</div>',
	));
	// Sidebar Widget
	// Location: the sidebar
	register_sidebar(array(
		'name'					=> 'Sidebar',
		'id' 					=> 'hs_main_sidebar',
		'description'   => __( 'Located at the right side of pages.', HS_CURRENT_THEME),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	// before-footer Widget
	// Location: Before the footer.
	register_sidebar(array(
		'name'					=> 'Before Footer Sidebar',
		'id' 					=> 'hs_before_footer_sidebar',
		'description'   => __( 'Before the footer.', HS_CURRENT_THEME),
		'before_widget' => '<div id="%1$s" class="before-footer">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	
	// Footer Widget Area 1
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'					=> 'Footer Area 1',
		'id' 					=> 'hs_footer_sidebar_1',
		'description'   => __( 'Located at the bottom of pages.', HS_CURRENT_THEME),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="footer_heading"><h5>',
		'after_title' => '</h5></div>',
	));
	// Footer Widget Area 2
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'					=> 'Footer Area 2',
		'id' 					=> 'hs_footer_sidebar_2',
		'description'   => __( 'Located at the bottom of pages.', HS_CURRENT_THEME),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="footer_heading"><h5>',
		'after_title' => '</h5></div>',
	));
	// Footer Widget Area 3
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'					=> 'Footer Area 3',
		'id' 					=> 'hs_footer_sidebar_3',
		'description'   => __( 'Located at the bottom of pages.', HS_CURRENT_THEME),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="footer_heading"><h5>',
		'after_title' => '</h5></div>',
	));
}
/** Register sidebars by running hs_elegance_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'hs_elegance_widgets_init' );
?>