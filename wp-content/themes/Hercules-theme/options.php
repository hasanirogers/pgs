<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

if(!function_exists('optionsframework_option_name')) {
	function optionsframework_option_name() {
		// This gets the theme name from the stylesheet (lowercase and without spaces)
		$hs_themename = HS_CURRENT_THEME;
		
		$optionsframework_settings = get_option('optionsframework');
		$optionsframework_settings['id'] = $hs_themename;
		update_option('optionsframework', $optionsframework_settings);		
	}
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

 
if(!function_exists('optionsframework_options')) {

	function optionsframework_options() {
	
		// Logo type
		$hs_logo_type = array(
			"image_logo" => __("Image Logo", HS_CURRENT_THEME),
			"text_logo" => __("Text Logo", HS_CURRENT_THEME)
		);
		// Header position
		$sf_header_array = array(
			"stickyheader" => "sticky_header",
			"normalheader" => "normal_header"
			//"absolute_box" => "header_absolute_box",
			//"fixed_full" => "header_fixed_full",
			//"fixed_box" => "header_fixed_box"
		);
		// Search box in the header
		$g_search_box = array(
			"no" => "No",
			"yes" => "Yes"
		);

		// Breadcrumbs in the page
		$g_breadcrumbs = array(
			"no" => "No",
			"yes" => "Yes"
		);		
		
		// Background Defaults
		$hs_background_defaults = array(
			'color' => '#ffffff', 
			'image' => '', 
			'repeat' => 'repeat',
			'position' => 'top center',
			'attachment'=>'scroll'
		);
		
		// Superfish fade-in animation
		$sf_f_animation_array = array(
			"show" => "Enable fade-in animation",
			"false" => "Disable fade-in animation"
		);
		
		// Superfish slide-down animation
		$sf_sl_animation_array = array(
			"show" => "Enable slide-down animation",
			"false" => "Disable slide-down animation"
		);
		
		// Superfish animation speed
		$sf_speed_array = array(
			"slow" => "Slow","normal" => "Normal",
			"fast" => "Fast"
		);
		
		// Superfish arrows markup
		$sf_arrows_array = array(
			"true" => "Yes",
		"false" => "No"
		);		
		
		// Defined Stylesheet Paths
// Use get_template_directory_uri if it's a parent theme

	
	
		// Fonts
		$hs_typography_mixed_fonts = array_merge( options_typography_get_os_fonts() , options_typography_get_google_fonts() );
		asort($hs_typography_mixed_fonts);
		
		
		// Slider effects
		$sl_effect_array = array("random" => "random", "simpleFade" => "simpleFade", "curtainTopLeft" => "curtainTopLeft", "curtainTopRight" => "curtainTopRight", "curtainBottomLeft" => "curtainBottomLeft", "curtainBottomRight" => "curtainBottomRight", "curtainSliceLeft" => "curtainSliceLeft", "curtainSliceRight" => "curtainSliceRight", "blindCurtainTopLeft" => "blindCurtainTopLeft", "blindCurtainTopRight" => "blindCurtainTopRight", "blindCurtainBottomLeft" => "blindCurtainBottomLeft", "blindCurtainBottomRight" => "blindCurtainBottomRight", "blindCurtainSliceBottom" => "blindCurtainSliceBottom", "blindCurtainSliceTop" => "blindCurtainSliceTop", "stampede" => "stampede", "mosaic" => "mosaic", "mosaicReverse" => "mosaicReverse", "mosaicRandom" => "mosaicRandom", "topLeftBottomRight" => "topLeftBottomRight", "bottomRightTopLeft" => "bottomRightTopLeft", "bottomLeftTopRight" => "bottomLeftTopRight", "bottomLeftTopRight" => "bottomLeftTopRight", "scrollRight" => "scrollRight", "scrollBottom" => "scrollBottom");
	 
	    // Slide alignment
	    $sl_alignment_array = array("topLeft" => "topLeft", "topCenter" => "topCenter", "topRight" => "topRight", "centerLeft" => "centerLeft", "center" => "center", "centerRight" => "centerRight", "bottomLeft" => "bottomLeft", "bottomCenter" => "bottomCenter", "bottomRight" => "bottomRight");
	    
		// Slide easing
	    $sl_easing_array = array("easeInQuad" => "easeInQuad", "easeOutQuad" => "easeOutQuad", "easeInOutQuad" => "easeInOutQuad", "easeInCubic" => "easeInCubic", "easeOutCubic" => "easeOutCubic", "easeInOutCubic" => "easeInOutCubic", "easeInQuart" => "easeInQuart", "easeOutQuart" => "easeOutQuart", "easeInOutQuart" => "easeInOutQuart", "easeInQuint" => "easeInQuint", "easeOutQuint" => "easeOutQuint", "easeInOutQuint" => "easeInOutQuint", "easeInSine" => "easeInSine", "easeOutSine" => "easeOutSine", "easeInOutSine" => "easeInOutSine", "easeInExpo" => "easeInExpo", "easeOutExpo" => "easeOutExpo", "easeInOutExpo" => "easeInOutExpo", "easeInCirc" => "easeInCirc", "easeOutCirc" => "easeOutCirc", "easeInOutCirc" => "easeInOutCirc", "easeInElastic" => "easeInElastic", "easeOutElastic" => "easeOutElastic", "easeInOutElastic" => "aseInOutElastic", "easeInBack" => "easeInBack", "easeOutBack" => "easeOutBack", "easeInOutBack" => "easeInOutBack", "easeInBounce" => "aseInBounce", "easeOutBounce" => "easeOutBounce", "easeInOutBounce" => "easeInOutBounce");
		
		// Banner effects
		$sl_banner_array = array("moveFromLeft" => "moveFromLeft", "moveFromRight" => "moveFromRight", "moveFromTop" => "moveFromTop", "moveFromBottom" => "moveFromBottom", "fadeIn" => "fadeIn", "fadeFromLeft" => "fadeFromLeft", "fadeFromRight" => "fadeFromRight", "fadeFromTop" => "fadeFromTop", "fadeFromBottom" => "fadeFromBottom");
	 
		// Slider columns
		$sl_columns_array = array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20");
	 
		// Slider rows
		$sl_rows_array = array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20");
	 
		// Slideshow
		$sl_slideshow_array = array("true" => "Yes","false" => "No");
	 
		// Thumbnails
		$sl_thumbnails_array = array("true" => "Yes","false" => "No");
	 
		// Slider control navigation
		$sl_control_nav_array = array("true" => "Yes","false" => "No");
	 
	    // Portrait
		$sl_portrait_array = array("true" => "Yes","false" => "No");
	 
		// Slider direct navigation
		$sl_dir_nav_array = array("true" => "Yes","false" => "No");
	 
		// Slider direct navigation on hover
		$sl_dir_nav_hide_array = array("true" => "Yes","false" => "No");
	 
		// Slider play/pause button
		$sl_play_pause_button_array = array("true" => "Yes","false" => "No");

		// Slider loader
		$sl_loader_array = array("no" => "no", "pie" => "pie", "bar" => "bar");
		
		// Slider control navigation
		$sl_wrapper = array("true" => "Wide","false" => "Box");
		
		// Footer menu
		$hs_footer_menu_array = array("true" => "Yes","false" => "No");
		
		// Featured image size on the blog.
		$hs_post_image_size_array = array("normal" => "Normal size","large" => "Large size");
		
		// Featured image size on the single page.
		$hs_single_image_size_array = array("normal" => "Normal size","large" => "Large size");
		
		// Meta for blog
		$hs_post_meta_array = array("true" => "Yes","false" => "No");
		
		// Meta for blog
		$hs_post_excerpt_array = array(
			"true" => "Yes",
			"false" => "No"
		);
			
		// If using image radio buttons, define a directory path
		$hs_imagepath =  get_template_directory_uri() . '/includes/images/';
			
		$hs_options = array();

	
		$hs_options[] = array( "name" => "General",
							"type" => "heading");
												
		
		$hs_options['body_background'] = array( 
							"name" =>  "Body styling",
							"desc" => "Change the background style.",
							"id" => "body_background",
							"std" => $hs_background_defaults, 
							"type" => "background");
		
		$hs_options['header_color'] = array( "name" => "Header background color",
							"desc" => "Change the header background color.",
							"id" => "header_color",
							"std" => "#ffffff",
							"type" => "color");

		$hs_options['header_position'] = array( "name" => "Header position",
                            "desc" => "Change the header position",
                            "id" => "header_position",
                            "std" => "sticky_header",
                            "type" => "select",
                            "class" => "tiny", //mini, tiny, small
                            "options" => $sf_header_array);					
		
		$hs_options['links_color'] = array( "name" => "Buttons and links color",
							"desc" => "Change the color of buttons and links.",
							"id" => "links_color",
							"std" => "#28a0ff",
							"type" => "color");
							
		$hs_options['subtitle_color'] = array( "name" => "Subtitle color",
							"desc" => "Change the color of subtitle.",
							"id" => "subtitle_color",
							"std" => "#28a0ff",
							"type" => "color");	

		$hs_options['global_color'] = array( "name" => "Global color",
							"desc" => "Change the global color for the elements like progress bars etc.",
							"id" => "global_color",
							"std" => "#28a0ff",
							"type" => "color");						
							
							
		$hs_options['google_mixed_3'] = array( 'name' => 'Body Text',
							'desc' => 'Choose your prefered font for body text. <em>Note: fonts marked with <strong>*</strong> symbol will be loaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'google_mixed_3',
							'std' => array( 'size' => '14px', 'lineheight' => '22px', 'face' => 'Open Sans', 'style' => 'normal', 'weight' => '400', 'character'  => 'latin', 'color' => '#4e4e4e'),
							'type' => 'typography',
							'options' => array(
									'faces' => $hs_typography_mixed_fonts )
							);
							
		$hs_options['h1_heading'] = array( 'name' => 'H1 Heading',
							'desc' => 'Choose your prefered font for H1 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol will be loaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h1_heading',
							'std' => array( 'size' => '40px', 'lineheight' => '44px', 'face' => 'Raleway', 'style' => 'normal', 'weight' => '900',  'character'  => 'latin', 'color' => '#282d30'),
							'type' => 'typography',
							'options' => array(
									'faces' => $hs_typography_mixed_fonts )
							);
		
		$hs_options['h2_heading'] = array( 'name' => 'H2 Heading',
							'desc' => 'Choose your prefered font for H2 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol will be loaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h2_heading',
							'std' => array( 'size' => '40px', 'lineheight' => '44px', 'face' => 'Raleway', 'style' => 'normal', 'weight' => '700', 'character'  => 'latin', 'color' => '#282d30'),
							'type' => 'typography',
							'options' => array(
									'faces' => $hs_typography_mixed_fonts )
							);
							
		$hs_options['h3_heading'] = array( 'name' => 'H3 Heading',
							'desc' => 'Choose your prefered font for H3 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol will be loaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h3_heading',
							'std' => array( 'size' => '34px', 'lineheight' => '34px', 'face' => 'Raleway', 'style' => 'normal', 'weight' => '500', 'character'  => 'latin', 'color' => '#282d30'),
							'type' => 'typography',
							'options' => array(
									'faces' => $hs_typography_mixed_fonts )
							);
		
		$hs_options['h4_heading'] = array( 'name' => 'H4 Heading',
							'desc' => 'Choose your prefered font for H4 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol will be loaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h4_heading',
							'std' => array( 'size' => '28px', 'lineheight' => '32px', 'face' => 'Raleway', 'style' => 'normal', 'weight' => '500', 'character'  => 'latin', 'color' => '#282d30'),
							'type' => 'typography',
							'options' => array(
									'faces' => $hs_typography_mixed_fonts )
							);
							
		$hs_options['h5_heading'] = array( 'name' => 'H5 Heading',
							'desc' => 'Choose your prefered font for H5 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol will be loaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h5_heading',
							'std' => array( 'size' => '24px', 'lineheight' => '28px', 'face' => 'Raleway', 'style' => 'normal', 'weight' => '200', 'character'  => 'latin', 'color' => '#282d30'),
							'type' => 'typography',
							'options' => array(
									'faces' => $hs_typography_mixed_fonts )
							);
							
		$hs_options['h6_heading'] = array( 'name' => 'H6 Heading',
							'desc' => 'Choose your prefered font for H6 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol will be loaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h6_heading',
							'std' => array( 'size' => '18px', 'lineheight' => '24px', 'face' => 'Raleway', 'style' => 'normal', 'weight' => '200', 'character'  => 'latin', 'color' => '#282d30'),
							'type' => 'typography',
							'options' => array(
									'faces' => $hs_typography_mixed_fonts )
							);
		
		
		$hs_options['g_search_box_id'] = array( "name" => "Display search box?",
							"desc" => "Display search box in the header?",
							"id" => "g_search_box_id",
							"type" => "radio",
							"std" => "yes",
							"options" => $g_search_box);

		$hs_options['g_breadcrumbs_id'] = array( "name" => "Display breadcrumbs?",
							"desc" => "Display breadcrumbs in the page?",
							"id" => "g_breadcrumbs_id",
							"type" => "radio",
							"std" => "no",
							"options" => $g_breadcrumbs);
		
		$hs_options[] = array( "name" => "Custom CSS",
							"desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",
							"id" => "custom_css",
							"std" => "",
							"type" => "textarea");		
		
		$hs_options[] = array( "name" => "Theme styles",
							"type" => "heading");
							
		$hs_options[] = array( "name" => "Select a Stylesheet to be Loaded",
	"desc" => "This is a manually defined list of stylesheets.",
	"id" => "stylesheet",
	"std" => "0",
	"type" => "images",
	"options" => array(
	"0" => $hs_imagepath . 'dafoult.png') // There is no "default" stylesheet to load
	//get_stylesheet_directory_uri() . '/css/blue.css' => $hs_imagepath . 'blue.png')
	//get_stylesheet_directory_uri() . '/css/green.css' => $hs_imagepath . 'green.png',
	//get_stylesheet_directory_uri() . '/css/red.css' => $hs_imagepath . 'red.png')
);	
	
	
	
	
		
		$hs_options[] = array( "name" => "Logo & Favicon",
							"type" => "heading");
		
		$hs_options['hs_logo_type'] = array( "name" => "What kind of logo?",
							"desc" => "Select whether you want your main logo to be an image or text. If you select 'image' you can put in the image url in the next option, and if you select 'text' your Site Title will be shown instead.",
							"id" => "logo_type",
							"std" => "text_logo",
							"type" => "radio",
							"options" => $hs_logo_type);

		$hs_options[] = array( 'name' => 'Logo Typography',
							'desc' => 'Choose your prefered font for menu. <em>Note: fonts marked with <strong>*</strong> symbol will be loaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'logo_typography',
							'std' => array( 'size' => '30px', 'lineheight' => '20px', 'face' => 'Raleway', 'style' => 'normal', 'weight' => '900', 'character'  => 'latin', 'color' => '#000000'),
							'type' => 'typography',
							'options' => array(
									'faces' => $hs_typography_mixed_fonts )
							);
		$hs_options[] = array( "name" => "Site tagline",
							"desc" => "Write Your Site tagline.",
							"id" => "tagline",
							"std" => "Clean & responsive theme",
							"class" => "tiny",
							"type" => "text");
							
		$hs_options['logo_url'] = array( "name" => "Logo Image Path",
							"desc" => "Click Upload or Enter the direct path to your <strong>logo image</strong>. For example <em>http://your_website_url_here/wp-content/themes/themeXXXX/images/logo.png</em>",
							"id" => "logo_url",
							"std" => get_stylesheet_directory_uri() . "/images/logo.png",
							"type" => "upload");
							
		$hs_options['favicon'] = array( "name" => "Favicon",
							"desc" => "Click Upload or Enter the direct path to your <strong>favicon</strong>. For example <em>http://your_website_url_here/wp-content/themes/themeXXXX/favicon.ico</em>",
							"id" => "favicon",
							"std" => get_stylesheet_directory_uri() . "/favicon.ico",
							"type" => "upload");
							
		
		
		$hs_options[] = array( "name" => "Navigation",
							"type" => "heading");

		$hs_options[] = array( 'name' => 'Menu Typography',
							'desc' => 'Choose your prefered font for menu. <em>Note: fonts marked with <strong>*</strong> symbol will be loaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'menu_typography',
							'std' => array( 'size' => '15px', 'lineheight' => '30px', 'face' => 'Lato', 'style' => 'normal', 'weight' => '700', 'character'  => 'latin', 'color' => '#aaaaaa'),
							'type' => 'typography',
							'options' => array(
									'faces' => $hs_typography_mixed_fonts )
							);
							
		$hs_options['mainmenu_current_button_color'] = array( "name" => "Current/active main menu button color",
							"desc" => "Change the color of the current/active main menu button.",
							"id" => "mainmenu_current_button_color",
							"std" => "#0c2342",
							"type" => "color");	

		$hs_options['mainmenu_hover_button_color'] = array( "name" => "Hover main menu button color",
							"desc" => "Change the color of the hover main menu button.",
							"id" => "mainmenu_hover_button_color",
							"std" => "#28a0ff",
							"type" => "color");	
							
        $hs_options['mainmenu_line_button_color'] = array( "name" => "Color of the line under the button",
							"desc" => "Change the color of the line under the button.",
							"id" => "mainmenu_line_button_color",
							"std" => "#0b93ff",
							"type" => "color");
							
		$hs_options['mainmenu_submenu_button_color'] = array( "name" => "Submenu button color",
							"desc" => "Change the color of the submenu button.",
							"id" => "mainmenu_submenu_button_color",
							"std" => "#28a0ff",
							"type" => "color");

		$hs_options['mainmenu_submenu_hover_button_color'] = array( "name" => "Submenu hover/active button color",
							"desc" => "Change the color of the hover/active submenu button.",
							"id" => "mainmenu_submenu_hover_button_color",
							"std" => "#64baff",
							"type" => "color");												
		
		//$hs_options[] = array( "name" => "Delay",
		//					"desc" => "miliseconds delay on mouseout.",
		//					"id" => "sf_delay",
		//					"std" => "1000",
			//				"class" => "tiny",
			//				"type" => "text");
		
		//$hs_options[] = array( "name" => "Fade-in animation",
		//					"desc" => "Fade-in animation.",
		//				"id" => "sf_f_animation",
			//				"std" => "show",
			//				"type" => "radio",
			//				"options" => $sf_f_animation_array);
		
		//$hs_options[] = array( "name" => "Slide-down animation",
			//				"desc" => "Slide-down animation.",
			//				"id" => "sf_sl_animation",
			//				"std" => "show",
			//				"type" => "radio",
			//				"options" => $sf_sl_animation_array);
		
		//$hs_options[] = array( "name" => "Speed",
		//					"desc" => "Animation speed.",
			//				"id" => "sf_speed",
			//				"type" => "select",
			//				"std" => "normal",
				//			"class" => "tiny", //mini, tiny, small
				//			"options" => $sf_speed_array);
		
		//$hs_options[] = array( "name" => "Arrows markup",
			//				"desc" => "Do you want to generate arrow mark-up?",
			//				"id" => "sf_arrows",
			//				"std" => "false",
				//			"type" => "radio",
				//			"options" => $sf_arrows_array);		
		
		
		$hs_options[] = array( "name" => "Slider Settings",
                            "type" => "heading");
 
        $hs_options['sl_effect'] = array( "name" => "Sliding effect",
                            "desc" => "Select your animation type",
                            "id" => "sl_effect",
                            "std" => "random",
                            "type" => "select",
                            "class" => "tiny", //mini, tiny, small
                            "options" => $sl_effect_array);
							
		$hs_options['sl_alignment'] = array( "name" => "Slide alignment",
                            "desc" => "Select alignment of the slides",
                            "id" => "sl_alignment",
                            "std" => "topCenter",
                            "type" => "select",
                            "class" => "tiny", //mini, tiny, small
                            "options" => $sl_alignment_array);
							
		$hs_options['sl_easing'] = array( "name" => "Slide easing effect",
                            "desc" => "Slideshow easing",
                            "id" => "sl_easing",
                            "std" => "easeInOutExpo",
                            "type" => "select",
                            "class" => "tiny", //mini, tiny, small
                            "options" => $sl_easing_array);					
 
        $hs_options['sl_columns'] = array( "name" => "Number of columns",
                            "desc" => "Number of columns",
                            "id" => "sl_columns",
                            "std" => "12",
                            "type" => "select",
                            "class" => "small", //mini, tiny, small
                            "options" => $sl_columns_array);
 
        $hs_options['sl_rows'] = array( "name" => "Number of rows",
                            "desc" => "Number of rows",
                            "id" => "sl_rows",
                            "std" => "8",
                            "type" => "select",
                            "class" => "small", //mini, tiny, small
                            "options" => $sl_rows_array);
 
       // $hs_options[] = array( "name" => "Banner effect",
        //                "desc" => "Select your banner animation type",
         //               "id" => "sl_banner",
         //               "std" => "fadeFromBottom",
          //              "type" => "select",
           //             "class" => "tiny", //mini, tiny, small
            //            "options" => $sl_banner_array);
 
        $hs_options['sl_pausetime'] = array( "name" => "Pause time",
                            "desc" => "Pause time (ms).",
                            "id" => "sl_pausetime",
                            "std" => "3000",
                            "class" => "tiny",
                            "type" => "text");
							
		$hs_options['sl_height'] = array( "name" => "Slideshow height",
                            "desc" => "Height of the slideshow in px or in %.",
                            "id" => "sl_height",
                            "std" => "540px",
                            "class" => "tiny",
                            "type" => "text");					
 
        $hs_options['sl_animation_speed'] = array( "name" => "Animation speed",
                            "desc" => "Animation speed (ms).",
                            "id" => "sl_animation_speed",
                            "std" => "1200",
                            "class" => "tiny",
                            "type" => "text");
 
   $hs_options['but_text'] = array( "name" => "Button Text",
                            "desc" => "Enter the text of the button. Leave it blank if you don't want to show the button.",
                            "id" => "but_text",
                            "std" => "Read More",
                            "class" => "tiny",
                            "type" => "text");
							
		$hs_options['headline_color'] = array( "name" => "Headline color",
							"desc" => "Change the headline text color.",
							"id" => "headline_color",
							"std" => "#ffffff",
							"type" => "color");		

		$hs_options['caption_color'] = array( "name" => "Caption color",
							"desc" => "Change the caption text color.",
							"id" => "caption_color",
							"std" => "#d9d9d9",
							"type" => "color");						
 
        $hs_options['sl_slideshow'] = array( "name" => "Slideshow",
                            "desc" => "Animate slider automatically?",
                            "id" => "sl_slideshow",
                            "std" => "true",
                            "type" => "radio",
                            "options" => $sl_slideshow_array);
 
        $hs_options['sl_thumbnails'] = array( "name" => "Thumbnails",
                            "desc" => "Display thumbnails?",
                            "id" => "sl_thumbnails",
                            "std" => "true",
                            "type" => "radio",
                            "options" => $sl_thumbnails_array);
 
        $hs_options['sl_control_nav'] = array( "name" => "Pagination",
                            "desc" => "Display pagination",
                            "id" => "sl_control_nav",
                            "std" => "true",
                            "type" => "radio",
                            "options" => $sl_control_nav_array);
							
      //  $hs_options['sl_portrait'] = array( "name" => "Portrait",
      //                      "desc" => "Select yes if you don't want that your images are cropped",
       //                     "id" => "sl_portrait",
       //                     "std" => "true",
       //                     "type" => "radio",
       //                     "options" => $sl_portrait_array);
 
 
        $hs_options['sl_dir_nav'] = array( "name" => "Next & Prev navigation",
                            "desc" => "Display next & prev navigation?",
                            "id" => "sl_dir_nav",
                            "std" => "true",
                            "type" => "radio",
                            "options" => $sl_dir_nav_array);
 
        $hs_options[] = array( "name" => "Display next & prev navigation only on hover?",
                            "desc" => "If true the navigation button (prev, next and play/stop buttons) will be visible on hover state only, if false they will be visible always",
                            "id" => "sl_dir_nav_hide",
                            "std" => "true",
                            "type" => "radio",
                            "options" => $sl_dir_nav_hide_array);
 
      //  $hs_options['sl_play_pause_button'] = array( "name" => "Play/Pause button",
         //                   "desc" => "Display Play/Pause button?",
         //                   "id" => "sl_play_pause_button",
          //                  "std" => "true",
           //                 "type" => "radio",
           //                 "options" => $sl_play_pause_button_array);

        $hs_options['sl_loader'] = array( "name" => "Loader",
                            "desc" => "Slider loader",
                            "id" => "sl_loader",
                            "std" => "bar",
                            "type" => "select",
                            "class" => "small", //mini, tiny, small
                            "options" => $sl_loader_array);
		
		
		
		$hs_options[] = array( "name" => "Blog",
							"type" => "heading");
		
		$hs_options[] = array( "name" => "Blog Single Page Title",
							"desc" => "Enter Your Blog Title used on Blog page.",
							"id" => "blog_text",
							"std" => "Blog",
							"type" => "text");
							
		$hs_options[] = array( "name" => "Blog Single Page Subtitle",
							"desc" => "Enter Your Blog Subtitle used on Blog page.",
							"id" => "blog_sub",
							"std" => "The place where we write some words",
							"type" => "text");					
		
		$hs_options[] = array( "name" => "Related Posts Title",
							"desc" => "Enter Your Title used on Single Post page for related posts.",
							"id" => "blog_related",
							"std" => "Related Posts",
							"type" => "text");
							
		$hs_options[] = array( "name" => "The text before the author's name.",
							"desc" => "Enter Your text before the author's name that appears in the list of articles.",
							"id" => "blog_author_name",
							"std" => "Written by",
							"type" => "text");		

		$hs_options['post_author'] = array( "name" => "Enable post author for blog posts?",
							"desc" => "Enable or Disable post author name for blog posts.",
							"id" => "post_author",
							"std" => "true",
							"type" => "radio",
							"options" => $hs_post_meta_array);					
		
		$hs_options['blog_sidebar_pos'] = array( "name" => "Sidebar position",
							"desc" => "Choose sidebar position.",
							"id" => "blog_sidebar_pos",
							"std" => "right",
							"type" => "images",
							"options" => array(
								'left' => $hs_imagepath . '2cl.png',
								'right' => $hs_imagepath . '2cr.png')
								//'col' => $hs_imagepath . '1col.png')
							);
		
		$hs_options['post_image_size'] = array( "name" => "Blog standard post type image size",
							"desc" => "Featured image size on the blog.",
						"id" => "post_image_size",
						"type" => "select",
						"std" => "large",
						"class" => "small", //mini, tiny, small
						"options" => $hs_post_image_size_array);
		
		$hs_options['single_image_size'] = array( "name" => "Single, standard post type image size",
							"desc" => "Featured image size on the single page.",
							"id" => "single_image_size",
							"type" => "select",
							"std" => "large",
							"class" => "small", //mini, tiny, small
							"options" => $hs_single_image_size_array);
		
		$hs_options['post_meta'] = array( "name" => "Enable Meta for blog posts?",
							"desc" => "Enable or Disable meta information for blog posts.",
							"id" => "post_meta",
							"std" => "true",
							"type" => "radio",
							"options" => $hs_post_meta_array);
		
		$hs_options['post_excerpt'] = array( "name" => "Enable excerpt for blog posts?",
							"desc" => "Enable or Disable excerpt for blog posts.",
							"id" => "post_excerpt",
							"std" => "true",
							"type" => "radio",
							"options" => $hs_post_excerpt_array);
							
		$hs_options['show_sidebar3'] = array( "name" => "Show sidebar in the blog with columns?",
							"desc" => "Enable or Disable sidebar for blog with columns.",
							"id" => "show_sidebar3",
							"std" => "no",
							"type" => "radio",
							"options" => array(
											"yes" => "Yes",
											"no"	=> "No"));	

		$hs_options[] = array( "name" => "Portfolio",
							"type" => "heading");

		$hs_options['folio_filter'] = array( "name" => "Filter",
							"desc" => "Portfolio filter.",
							"id" => "folio_filter",
							"std" => "cat",
							"type" => "select",
							"options" => array(
											"cat"	=>	"by Category",
											"tag"	=>	"by Tags",
											//"both"	=>	"Both (by Category and Tags)",
											"none"	=>	"None"));
		
		$hs_options['folio_title'] = array( "name" => "Show title?",
							"desc" => "Enable or Disable title for portfolio posts.",
							"id" => "folio_title",
							"std" => "yes",
							"type" => "radio",
							"options" => array(
											"yes" => "Yes",
											"no"	=> "No"));

		$hs_options['folio_excerpt'] = array( "name" => "Show excerpt?",
							"desc" => "Enable or Disable excerpt for portfolio posts.",
							"id" => "folio_excerpt",
							"std" => "yes",
							"type" => "radio",
							"options" => array(
											"yes" => "Yes",
											"no"	=> "No"));

		$hs_options['folio_excerpt_count'] = array( "name" => "Excerpt words",
							"desc" => "Excerpt length (words).",
							"id" => "folio_excerpt_count",
							"std" => "8",
							"class" => "small",
							"type" => "text");
							
		$hs_options['folio_thumb_width'] = array( "name" => "Portfolio Thumb Width",
							"desc" => "Enter Portfolio Thumb Width.",
							"id" => "folio_thumb_width",
							"std" => "1000",
							"class" => "small",
							"type" => "text");	

		$hs_options['folio_thumb_height'] = array( "name" => "Portfolio Thumb Height",
							"desc" => "Enter Portfolio Thumb Height.",
							"id" => "folio_thumb_height",
							"std" => "1000",
							"class" => "small",
							"type" => "text");					

		$hs_options['folio_btn'] = array( "name" => "Show button?",
							"desc" => "Enable or Disable button for portfolio posts.",
							"id" => "folio_btn",
							"std" => "yes",
							"type" => "radio",
							"options" => array(
											"yes" => "Yes",
											"no"	=> "No"));

		$hs_options['layout_mode'] = array( "name" => "Layout",
							"desc" => "Portfolio has different layout modes. You can set and change the layout mode via this option.",
							"id" => "layout_mode",
							"type" => "select",
							"std" => "fitRows",
							"class" => "small", //mini, tiny, small
							"options" => array(
											"fitRows" => "fitRows",
											"masonry" => "masonry"));

		$hs_options['items_count2'] = array( "name" => "Portfolio 2 columns items amount",
							"desc" => "Portfolio items amount for Portfolio 2 columns template.",
							"id" => "items_count2",
							"std" => "4",
							"class" => "small",
							"type" => "text");

		$hs_options['items_count3'] = array( "name" => "Portfolio 3 columns items amount",
							"desc" => "Portfolio items amount for Portfolio 3 columns template.",
							"id" => "items_count3",
							"std" => "9",
							"class" => "small",
							"type" => "text");
		
		$hs_options['items_count4'] = array( "name" => "Portfolio 4 columns items amount",
							"desc" => "Portfolio items amount for Portfolio 4 columns template.",
							"id" => "items_count4",
							"std" => "8",
							"class" => "small",
							"type" => "text");
							
		$hs_options['items_count5'] = array( "name" => "Portfolio Featured on first page",
							"desc" => "Amount of featured portfolio items on homepage.",
							"id" => "items_count5",
							"std" => "8",
							"class" => "small",
							"type" => "text");					
							
		$hs_options[] = array( "name" => "SEO",
							"type" => "heading");
		
		$hs_options['sitetitle'] = array( "name" => "Site Title",
							"desc" => "Enter Site Title or leave it blank to use default.",
							"id" => "sitetitle",
							"std" => "HERCULES",
							"type" => "text");
		
		$hs_options['keywords'] = array( "name" => "Meta keywords",
							"desc" => "Write a meta keywords list. Separate the words or phrases using a comma.",
							"id" => "keywords",
							"std" => "clean, responsive",
							"type" => "textarea");
		$hs_options['description'] = array( "name" => "Meta description",
							"desc" => "Write a meta description text. In a few words, explain what this site is about.",
							"id" => "description",
							"std" => "This is a responsive theme by Hercules",
							"type" => "textarea");
		
		
		$hs_options[] = array( "name" => "Footer",
							"type" => "heading");
		
		$hs_options['footer_text'] = array( "name" => "Footer copyright text",
							"desc" => "Enter text used in the right side of the footer. HTML tags are allowed.",
							"id" => "footer_text",
							"std" => "Copyrights &copy; 2013. Hercules Design. All Rights Reserved.",
							"type" => "textarea");
		
		$hs_options[] = array( "name" => "Google Analytics Code",
							"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
							"id" => "ga_code",
							"std" => "",
							"type" => "textarea");
		
		$hs_options['feed_url'] = array( "name" => "Feedburner URL",
							"desc" => "Feedburner is a Google service that takes care of your RSS feed. Paste your Feedburner URL here to let readers see it in your website.",
							"id" => "feed_url",
							"std" => "",
							"type" => "text");
		
		$hs_options['footer_menu'] = array( "name" => "Display Footer Menu?",
							"desc" => "Do you want to display footer menu?",
							"id" => "footer_menu",
							"std" => "true",
							"type" => "radio",
							"options" => $hs_footer_menu_array);

		$hs_options[] = array( 'name' => 'Footer Menu Typography',
							'desc' => 'Choose your prefered font for menu. <em>Note: fonts marked with <strong>*</strong> symbol will be loaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'footer_menu_typography',
							'std' => array( 'size' => '13px', 'lineheight' => '22px', 'face' => 'Raleway', 'style' => 'normal', 'weight' => '600', 'character'  => 'latin', 'color' => '#7a7a79'),
							'type' => 'typography',
							'options' => array(
									'faces' => $hs_typography_mixed_fonts )
							);
		
		return $hs_options;
	}
	
}

/* 
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');


if(!function_exists('optionsframework_custom_scripts')) {

	function optionsframework_custom_scripts() { ?>

		<script type="text/javascript">
		jQuery(document).ready(function($) {

			$('#example_showhidden').click(function() {
					$('#section-example_text_hidden').fadeToggle(400);
			});
			
			if ($('#example_showhidden:checked').val() !== undefined) {
				$('#section-example_text_hidden').show();
			}
			
		});
		</script>

		<?php
		}

}



/**
* Front End Customizer
*
* WordPress 3.4 Required
*/
add_action( 'customize_register', 'hercules_register' );

if(!function_exists('hercules_register')) {

	function hercules_register($wp_customize) {
		/**
		 * This is optional, but if you want to reuse some of the defaults
		 * or values you already have built in the options panel, you
		 * can load them into $options for easy reference
		 */
		$hs_options = optionsframework_options();
		
		
		
		/*-----------------------------------------------------------------------------------*/
		/*	General
		/*-----------------------------------------------------------------------------------*/
		$wp_customize->add_section( 'hercules_header', array(
			'title' => __( 'General', HS_CURRENT_THEME ),
			'priority' => 200
		));
		
		/* Background Image*/
		$wp_customize->add_setting( 'hercules[body_background][image]', array(
			'default' => $hs_options['body_background']['std']['image'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'body_background_image', array(
			'label'   => 'Background Image',
			'section' => 'hercules_header',
			'settings'   => 'hercules[body_background][image]'
		) ) );
		
		
		/* Background Color*/
		$wp_customize->add_setting( 'hercules[body_background][color]', array(
			'default' => $hs_options['body_background']['std']['color'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background', array(
			'label'   => 'Background Color',
			'section' => 'hercules_header',
			'settings'   => 'hercules[body_background][color]'
		) ) );
		
		/* Header position */
		$wp_customize->add_setting( 'hercules[header_position]', array(
				'default' => $hs_options['header_position']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_header_position', array(
				'label' => $hs_options['header_position']['name'],
				'section' => 'hercules_header',
				'settings' => 'hercules[header_position]',
				'type' => $hs_options['header_position']['type'],
				'choices' => $hs_options['header_position']['options']
		) ); 
		
		/* Header Color */
		$wp_customize->add_setting( 'hercules[header_color]', array(
			'default' => $hs_options['header_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
			'label'   => $hs_options['header_color']['name'],
			'section' => 'hercules_header',
			'settings'   => 'hercules[header_color]'
		) ) );
		
		
		/* Body Font Face */
		$wp_customize->add_setting( 'hercules[google_mixed_3][face]', array(
			'default' => $hs_options['google_mixed_3']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'hercules_google_mixed_3', array(
				'label' => $hs_options['google_mixed_3']['name'],
				'section' => 'hercules_header',
				'settings' => 'hercules[google_mixed_3][face]',
				'type' => 'select',
				'choices' => $hs_options['google_mixed_3']['options']['faces']
		) );
		
		
		/* Buttons and Links Color */
		$wp_customize->add_setting( 'hercules[links_color]', array(
			'default' => $hs_options['links_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'links_color', array(
			'label'   => $hs_options['links_color']['name'],
			'section' => 'hercules_header',
			'settings'   => 'hercules[links_color]'
		) ) );
		
		/* H1 Heading font face */
		$wp_customize->add_setting( 'hercules[h1_heading][face]', array(
			'default' => $hs_options['h1_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'hercules_h1_heading', array(
				'label' => $hs_options['h1_heading']['name'],
				'section' => 'hercules_header',
				'settings' => 'hercules[h1_heading][face]',
				'type' => 'select',
				'choices' => $hs_options['h1_heading']['options']['faces']
		) );
		
		/* H2 Heading font face */
		$wp_customize->add_setting( 'hercules[h2_heading][face]', array(
			'default' => $hs_options['h2_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'hercules_h2_heading', array(
				'label' => $hs_options['h2_heading']['name'],
				'section' => 'hercules_header',
				'settings' => 'hercules[h2_heading][face]',
				'type' => 'select',
				'choices' => $hs_options['h2_heading']['options']['faces']
		) );

		/* H3 Heading font face */
		$wp_customize->add_setting( 'hercules[h3_heading][face]', array(
			'default' => $hs_options['h3_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'hercules_h3_heading', array(
				'label' => $hs_options['h3_heading']['name'],
				'section' => 'hercules_header',
				'settings' => 'hercules[h3_heading][face]',
				'type' => 'select',
				'choices' => $hs_options['h3_heading']['options']['faces']
		) );

		/* H4 Heading font face */
		$wp_customize->add_setting( 'hercules[h4_heading][face]', array(
			'default' => $hs_options['h4_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'hercules_h4_heading', array(
				'label' => $hs_options['h4_heading']['name'],
				'section' => 'hercules_header',
				'settings' => 'hercules[h4_heading][face]',
				'type' => 'select',
				'choices' => $hs_options['h4_heading']['options']['faces']
		) );

		/* H5 Heading font face */
		$wp_customize->add_setting( 'hercules[h5_heading][face]', array(
			'default' => $hs_options['h5_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'hercules_h5_heading', array(
				'label' => $hs_options['h5_heading']['name'],
				'section' => 'hercules_header',
				'settings' => 'hercules[h5_heading][face]',
				'type' => 'select',
				'choices' => $hs_options['h5_heading']['options']['faces']
		) );
		
		/* H6 Heading font face */
		$wp_customize->add_setting( 'hercules[h6_heading][face]', array(
			'default' => $hs_options['h6_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'hercules_h6_heading', array(
				'label' => $hs_options['h6_heading']['name'],
				'section' => 'hercules_header',
				'settings' => 'hercules[h6_heading][face]',
				'type' => 'select',
				'choices' => $hs_options['h6_heading']['options']['faces']
		) );
		
		
		/* Search Box*/
		$wp_customize->add_setting( 'hercules[g_search_box_id]', array(
				'default' => $hs_options['g_search_box_id']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_g_search_box_id', array(
				'label' => $hs_options['g_search_box_id']['name'],
				'section' => 'hercules_header',
				'settings' => 'hercules[g_search_box_id]',
				'type' => $hs_options['g_search_box_id']['type'],
				'choices' => $hs_options['g_search_box_id']['options']
		) );
		
		
		/*-----------------------------------------------------------------------------------*/
		/*	Logo
		/*-----------------------------------------------------------------------------------*/
		
		$wp_customize->add_section( 'hercules_logo', array(
			'title' => __( 'Logo', HS_CURRENT_THEME ),
			'priority' => 201
		) );
		
		/* Logo Type */
		$wp_customize->add_setting( 'hercules[hs_logo_type]', array(
				'default' => $hs_options['hs_logo_type']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_hs_logo_type', array(
				'label' => $hs_options['hs_logo_type']['name'],
				'section' => 'hercules_logo',
				'settings' => 'hercules[hs_logo_type]',
				'type' => $hs_options['hs_logo_type']['type'],
				'choices' => $hs_options['hs_logo_type']['options']
		) );
		
		/* Logo Path */
		$wp_customize->add_setting( 'hercules[logo_url]', array(
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_url', array(
			'label' => $hs_options['logo_url']['name'],
			'section' => 'hercules_logo',
			'settings' => 'hercules[logo_url]'
		) ) );
		
		
		
		/*-----------------------------------------------------------------------------------*/
		/*  Slider
		/*-----------------------------------------------------------------------------------*/
		 
		$wp_customize->add_section( 'hercules_slider', array(
			'title' => __( 'Slider', HS_CURRENT_THEME ),
			'priority' => 202
		) );
		/* Slide easing */
		$wp_customize->add_setting( 'hercules[sl_easing]', array(
				'default' => $hs_options['sl_easing']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sl_easing', array(
				'label' => $hs_options['sl_easing']['name'],
				'section' => 'hercules_slider',
				'settings' => 'hercules[sl_easing]',
				'type' => $hs_options['sl_easing']['type'],
				'choices' => $hs_options['sl_easing']['options']
		) ); 
		
		/* Slide alignment */
		$wp_customize->add_setting( 'hercules[sl_alignment]', array(
				'default' => $hs_options['sl_alignment']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sl_alignment', array(
				'label' => $hs_options['sl_alignment']['name'],
				'section' => 'hercules_slider',
				'settings' => 'hercules[sl_alignment]',
				'type' => $hs_options['sl_alignment']['type'],
				'choices' => $hs_options['sl_alignment']['options']
		) ); 
		/* Slider Effect */
		$wp_customize->add_setting( 'hercules[sl_effect]', array(
				'default' => $hs_options['sl_effect']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sl_effect', array(
				'label' => $hs_options['sl_effect']['name'],
				'section' => 'hercules_slider',
				'settings' => 'hercules[sl_effect]',
				'type' => $hs_options['sl_effect']['type'],
				'choices' => $hs_options['sl_effect']['options']
		) );
		/* Slideshow height */
		$wp_customize->add_setting( 'hercules[sl_height]', array(
				'default' => $hs_options['sl_height']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sl_height', array(
				'label' => $hs_options['sl_height']['name'],
				'section' => 'hercules_slider',
				'settings' => 'hercules[sl_height]',
				'type' => $hs_options['sl_height']['type']
		) );
		
		/* Pause time */
		$wp_customize->add_setting( 'hercules[sl_pausetime]', array(
				'default' => $hs_options['sl_pausetime']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sl_pausetime', array(
				'label' => $hs_options['sl_pausetime']['name'],
				'section' => 'hercules_slider',
				'settings' => 'hercules[sl_pausetime]',
				'type' => $hs_options['sl_pausetime']['type']
		) );
		 
		/* Animation speed */
		$wp_customize->add_setting( 'hercules[sl_animation_speed]', array(
				'default' => $hs_options['sl_animation_speed']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sl_animation_speed', array(
				'label' => $hs_options['sl_animation_speed']['name'],
				'section' => 'hercules_slider',
				'settings' => 'hercules[sl_animation_speed]',
				'type' => $hs_options['sl_animation_speed']['type']
		) );
		 
		/* Auto slideshow */
		$wp_customize->add_setting( 'hercules[sl_slideshow]', array(
				'default' => $hs_options['sl_slideshow']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sl_slideshow', array(
				'label' => $hs_options['sl_slideshow']['name'],
				'section' => 'hercules_slider',
				'settings' => 'hercules[sl_slideshow]',
				'type' => $hs_options['sl_slideshow']['type'],
				'choices' => $hs_options['sl_slideshow']['options']
		) );
		 
		/* Slide thumbnails */
		$wp_customize->add_setting( 'hercules[sl_thumbnails]', array(
				'default' => $hs_options['sl_thumbnails']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sl_thumbnails', array(
				'label' => $hs_options['sl_thumbnails']['name'],
				'section' => 'hercules_slider',
				'settings' => 'hercules[sl_thumbnails]',
				'type' => $hs_options['sl_thumbnails']['type'],
				'choices' => $hs_options['sl_thumbnails']['options']
		) );
		 
		/* Show pagination? */
		$wp_customize->add_setting( 'hercules[sl_control_nav]', array(
				'default' => $hs_options['sl_control_nav']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sl_control_nav', array(
				'label' => $hs_options['sl_control_nav']['name'],
				'section' => 'hercules_slider',
				'settings' => 'hercules[sl_control_nav]',
				'type' => $hs_options['sl_control_nav']['type'],
				'choices' => $hs_options['sl_control_nav']['options']
		) );   
		 
	/* Display Portrait option */
	//	$wp_customize->add_setting( 'hercules[sl_portrait]', array(
		//		'default' => $hs_options['sl_portrait']['std'],
		//		'type' => 'option'
		//) );
		//$wp_customize->add_control( 'hercules_sl_portrait', array(
		//		'label' => $hs_options['sl_portrait']['name'],
		//		'section' => 'hercules_slider',
		//		'settings' => 'hercules[sl_portrait]',
		//		'type' => $hs_options['sl_portrait']['type'],
		//		'choices' => $hs_options['sl_portrait']['options']
		//) );
		
		
		/* Display next & prev navigation? */
		$wp_customize->add_setting( 'hercules[sl_dir_nav]', array(
				'default' => $hs_options['sl_dir_nav']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sl_dir_nav', array(
				'label' => $hs_options['sl_dir_nav']['name'],
				'section' => 'hercules_slider',
				'settings' => 'hercules[sl_dir_nav]',
				'type' => $hs_options['sl_dir_nav']['type'],
				'choices' => $hs_options['sl_dir_nav']['options']
		) );
		 
		/* Play/Pause button */
	//	$wp_customize->add_setting( 'hercules[sl_play_pause_button]', array(
		//		'default' => $hs_options['sl_play_pause_button']['std'],
		//		'type' => 'option'
		//) );
		//$wp_customize->add_control( 'hercules_sl_play_pause_button', array(
		//		'label' => $hs_options['sl_play_pause_button']['name'],
		//		'section' => 'hercules_slider',
		//		'settings' => 'hercules[sl_play_pause_button]',
		//		'type' => $hs_options['sl_play_pause_button']['type'],
		//		'choices' => $hs_options['sl_play_pause_button']['options']
		//) );
		

		/* Loader */
		$wp_customize->add_setting( 'hercules[sl_loader]', array(
				'default' => $hs_options['sl_loader']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sl_loader', array(
				'label' => $hs_options['sl_loader']['name'],
				'section' => 'hercules_slider',
				'settings' => 'hercules[sl_loader]',
				'type' => $hs_options['sl_loader']['type'],
				'choices' => $hs_options['sl_loader']['options']
		) );
		
		/*-----------------------------------------------------------------------------------*/
		/*	SEO
		/*-----------------------------------------------------------------------------------*/
		$wp_customize->add_section( 'hercules_seo', array(
				'title' => __( 'Seo', HS_CURRENT_THEME ),
				'priority' => 205
		) );
		/* SEO title */
		$wp_customize->add_setting( 'hercules[sitetitle]', array(
				'default' => $hs_options['sitetitle']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_sitetitle', array(
				'label' => $hs_options['sitetitle']['name'],
				'section' => 'hercules_seo',
				'settings' => 'hercules[sitetitle]',
				'type' => 'text'
		) );
		$wp_customize->add_setting( 'hercules[keywords]', array(
				'default' => $hs_options['keywords']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_keywords', array(
				'label' => $hs_options['keywords']['name'],
				'section' => 'hercules_seo',
				'settings' => 'hercules[keywords]',
				'type' => 'text'
		) );
		/* SEO Description */
		$wp_customize->add_setting( 'hercules[description]', array(
				'default' => $hs_options['description']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_description', array(
				'label' => $hs_options['description']['name'],
				'section' => 'hercules_seo',
				'settings' => 'hercules[description]',
				'type' => 'text'
		) );
		
		/*-----------------------------------------------------------------------------------*/
		/*	Blog
		/*-----------------------------------------------------------------------------------*/
		
		
		$wp_customize->add_section( 'hercules_blog', array(
				'title' => __( 'Blog', HS_CURRENT_THEME ),
				'priority' => 203
		) );
		
		/* Blog image size */
		$wp_customize->add_setting( 'hercules[post_image_size]', array(
				'default' => $hs_options['post_image_size']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_post_image_size', array(
				'label' => $hs_options['post_image_size']['name'],
				'section' => 'hercules_blog',
				'settings' => 'hercules[post_image_size]',
				'type' => $hs_options['post_image_size']['type'],
				'choices' => $hs_options['post_image_size']['options']
		) );
		
		/* Single post image size */
		$wp_customize->add_setting( 'hercules[single_image_size]', array(
				'default' => $hs_options['single_image_size']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_single_image_size', array(
				'label' => $hs_options['single_image_size']['name'],
				'section' => 'hercules_blog',
				'settings' => 'hercules[single_image_size]',
				'type' => $hs_options['single_image_size']['type'],
				'choices' => $hs_options['single_image_size']['options']
		) );
		
		/* Post Meta */
		$wp_customize->add_setting( 'hercules[post_meta]', array(
				'default' => $hs_options['post_meta']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_post_meta', array(
				'label' => $hs_options['post_meta']['name'],
				'section' => 'hercules_blog',
				'settings' => 'hercules[post_meta]',
				'type' => $hs_options['post_meta']['type'],
				'choices' => $hs_options['post_meta']['options']
		) );
		
		/* Post Excerpt */
		$wp_customize->add_setting( 'hercules[post_excerpt]', array(
				'default' => $hs_options['post_excerpt']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_post_excerpt', array(
				'label' => $hs_options['post_excerpt']['name'],
				'section' => 'hercules_blog',
				'settings' => 'hercules[post_excerpt]',
				'type' => $hs_options['post_excerpt']['type'],
				'choices' => $hs_options['post_excerpt']['options']
		) );
		
		
		
		/*-----------------------------------------------------------------------------------*/
		/*	Footer
		/*-----------------------------------------------------------------------------------*/
		
		$wp_customize->add_section( 'hercules_footer', array(
			'title' => __( 'Footer', HS_CURRENT_THEME ),
			'priority' => 204
		) );
		
			
		/* Footer Copyright Text */
		$wp_customize->add_setting( 'hercules[footer_text]', array(
				'default' => $hs_options['footer_text']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_footer_text', array(
				'label' => $hs_options['footer_text']['name'],
				'section' => 'hercules_footer',
				'settings' => 'hercules[footer_text]',
				'type' => 'text'
		) );
		
		
		/* Display Footer Menu */
		$wp_customize->add_setting( 'hercules[footer_menu]', array(
				'default' => $hs_options['footer_menu']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'hercules_footer_menu', array(
				'label' => $hs_options['footer_menu']['name'],
				'section' => 'hercules_footer',
				'settings' => 'hercules[footer_menu]',
				'type' => $hs_options['footer_menu']['type'],
				'choices' => $hs_options['footer_menu']['options']
		) );
		

		
	};

}