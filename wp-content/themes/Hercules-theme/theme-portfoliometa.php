<?php

/*-----------------------------------------------------------------------------------

	Add image upload metaboxes to Portfolio items

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$hr_prefix = 'tz_';
 
$hercules_meta_box_portfolio = array(
	'id' => 'tz-meta-box-portfolio',
	'title' =>  __('Portfolio Options', HS_CURRENT_THEME),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
    	array(
			'name' =>  __('Format', HS_CURRENT_THEME),
			'desc' => __('Choose post format that most fit your needs. ', HS_CURRENT_THEME),
			'id' => $hr_prefix . 'portfolio_type',
			"type" => "select",
			'std' => 'Image',
			'options' => array('Image', 'Slideshow', 'Grid Gallery', 'Video', 'Audio')
		),
    	array(
    	   'name' => __('Subtitle', HS_CURRENT_THEME),
    	   'desc' => __('Input subtitle for the project. ', HS_CURRENT_THEME),
    	   'id' => $hr_prefix . 'portfolio_subtitle',
    	   'type' => 'text',
    	   'std' => ''
    	),
    	array(
    	   'name' => __('Client', HS_CURRENT_THEME),
    	   'desc' => __('Input project owner name. ', HS_CURRENT_THEME),
    	   'id' => $hr_prefix . 'portfolio_client',
    	   'type' => 'text',
    	   'std' => ''
    	),
			array(
    	   'name' => __('Info', HS_CURRENT_THEME),
    	   'desc' => __('Additional info for this portfolio item.', HS_CURRENT_THEME),
    	   'id' => $hr_prefix . 'portfolio_info',
    	   'type' => 'text',
    	   'std' => ''
    	),
    	array(
    	   'name' => __('URL', HS_CURRENT_THEME),
    	   'desc' => __('Input the project URL (external link)', HS_CURRENT_THEME),
    	   'id' => $hr_prefix . 'portfolio_url',
    	   'type' => 'text',
    	   'std' => ''
    	),
    	array(
			'name' =>  __('Featured', HS_CURRENT_THEME),
			'desc' => __('Show project on the main page. ', HS_CURRENT_THEME),
			'id' => $hr_prefix . 'portfolio_featured',
			"type" => "select",
			'std' => '',
			'options' => array('', 'Featured')
		)
	)
);

$hercules_meta_box_portfolio_image = array(
	'id' => 'tz-meta-box-portfolio-image',
	'title' =>  __('Image Settings', HS_CURRENT_THEME),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Enable Lightbox',HS_CURRENT_THEME),
				"desc" => __('Check this to enable the lightbox.',HS_CURRENT_THEME),
				"id" => $hr_prefix."image_lightbox",
				"type" => "select",
				'std' => 'no',
				'options' => array('yes', 'no'),
			),
	),	
);


$hercules_meta_box_portfolio_video = array(
	'id' => 'tz-meta-box-portfolio-video',
	'title' => __('Video Settings', HS_CURRENT_THEME),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Title',HS_CURRENT_THEME),
				"desc" => __('Input the video title (for playlist).',HS_CURRENT_THEME),
				"id" => $hr_prefix."video_title",
				"type" => "text",
    	   		"std" => ""
			),
		array( "name" => __('Artist',HS_CURRENT_THEME),
				"desc" => __('Input the video artist (for playlist).',HS_CURRENT_THEME),
				"id" => $hr_prefix."video_artist",
				"type" => "text",
    	   		"std" => ""
			),
		array( "name" => __('URL #1',HS_CURRENT_THEME),
				"desc" => __('Input URL to the <b>m4v</b> video format.',HS_CURRENT_THEME),
				"id" => $hr_prefix."m4v_url",
				"type" => "text",
    	   		"std" => ""
			),
		array( "name" => __('URL #2',HS_CURRENT_THEME),
				"desc" => __('Input URL to the <b>ogv</b> video format.',HS_CURRENT_THEME),
				"id" => $hr_prefix."ogv_url",
				"type" => "text",
    	   		"std" => ""
			),
		array( "name" => __('Embedded Code',HS_CURRENT_THEME),
				"desc" => __('You can include embedded code here.<br><b>Attention!</b> This code overwrite your video URL(s).',HS_CURRENT_THEME),
				"id" => $hr_prefix."video_embed",
				"type" => "textarea",
    	   		"std" => ""
			)
	),
	
);

$hercules_meta_box_portfolio_audio = array(
	'id' => 'tz-meta-box-portfolio-audio',
	'title' =>  __('Audio Settings', HS_CURRENT_THEME),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Title',HS_CURRENT_THEME),
				"desc" => __('Input the audio title (for playlist).',HS_CURRENT_THEME),
				"id" => $hr_prefix."audio_title",
				"type" => "text",
    	   		"std" => ""
			),
		array( "name" => __('Artist',HS_CURRENT_THEME),
				"desc" => __('Input the audio artist (for playlist).',HS_CURRENT_THEME),
				"id" => $hr_prefix."audio_artist",
				"type" => "text",
    	   		"std" => ""
			),
		array( "name" => __('Audio format',HS_CURRENT_THEME),
				"desc" => __('Choose audio format.',HS_CURRENT_THEME),
				"id" => $hr_prefix."audio_format",
				"type" => "select",
				"std" => "mp3",
				"options" => array('mp3', 'wav', 'ogg')
			),
		array( "name" => __('Audio URL',HS_CURRENT_THEME),
				"desc" => __('Input the audio URL.',HS_CURRENT_THEME),
				"id" => $hr_prefix."audio_url",
				"type" => "text",
    	   		"std" => ""
			)
	)
);

add_action('admin_menu', 'tz_add_box_portfolio');


/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function tz_add_box_portfolio() {
	global $hercules_meta_box_portfolio, $hercules_meta_box_portfolio_image, $hercules_meta_box_portfolio_video, $hercules_meta_box_portfolio_audio;
	
	add_meta_box($hercules_meta_box_portfolio['id'], $hercules_meta_box_portfolio['title'], 'tz_show_box_portfolio', $hercules_meta_box_portfolio['page'], $hercules_meta_box_portfolio['context'], $hercules_meta_box_portfolio['priority']);

	add_meta_box($hercules_meta_box_portfolio_image['id'], $hercules_meta_box_portfolio_image['title'], 'tz_show_box_portfolio_image', $hercules_meta_box_portfolio_image['page'], $hercules_meta_box_portfolio_image['context'], $hercules_meta_box_portfolio_image['priority']);

	add_meta_box($hercules_meta_box_portfolio_video['id'], $hercules_meta_box_portfolio_video['title'], 'tz_show_box_portfolio_video', $hercules_meta_box_portfolio_video['page'], $hercules_meta_box_portfolio_video['context'], $hercules_meta_box_portfolio_video['priority']);
	
	add_meta_box($hercules_meta_box_portfolio_audio['id'], $hercules_meta_box_portfolio_audio['title'], 'tz_show_box_portfolio_audio', $hercules_meta_box_portfolio_audio['page'], $hercules_meta_box_portfolio_audio['context'], $hercules_meta_box_portfolio_audio['priority']);

}


/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function tz_show_box_portfolio() {
	global $hercules_meta_box_portfolio, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('Please choose desired Portfolio Format and fill additional fields. ', HS_CURRENT_THEME).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="tz_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($hercules_meta_box_portfolio['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select id="' . $field['id'] . '" name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break; 
			
		}

	}
 
	echo '</table>';
}

function tz_show_box_portfolio_image() {
	global $hercules_meta_box_portfolio_image, $post;
 	
	// Use nonce for verification
	echo '<input type="hidden" name="tz_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($hercules_meta_box_portfolio_image['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;
		}

	}
 
	echo '</table>';
}

function tz_show_box_portfolio_video() {
	global $hercules_meta_box_portfolio_video, $post;
 	
	// Use nonce for verification
	echo '<input type="hidden" name="tz_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($hercules_meta_box_portfolio_video['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:20px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			//If textarea		
			case 'textarea':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" rows="8" cols="5" style="width:75%; margin-right: 20px; float:left;">', $meta ? $meta : $field['std'], '</textarea>';
			
			break;
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select id="' . $field['id'] . '" name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;

		}

	}
 
	echo '</table>';
}

function tz_show_box_portfolio_audio() {
	global $hercules_meta_box_portfolio_audio, $post;
 	
	// Use nonce for verification
	echo '<input type="hidden" name="tz_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($hercules_meta_box_portfolio_audio['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:20px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			//If textarea		
			case 'textarea':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" rows="8" cols="5" style="width:75%; margin-right: 20px; float:left;">', $meta ? $meta : $field['std'], '</textarea>';
			
			break;
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;
		}

	}
 
	echo '</table>';
}

 
add_action('save_post', 'tz_save_data_portfolio');


/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function tz_save_data_portfolio($post_id) {
	global $hercules_meta_box_portfolio, $hercules_meta_box_portfolio_video, $hercules_meta_box_portfolio_audio, $hercules_meta_box_portfolio_image;
 
	// verify nonce
	if (!isset($_POST['tz_meta_box_nonce']) || !wp_verify_nonce($_POST['tz_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	foreach ($hercules_meta_box_portfolio['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

	foreach ($hercules_meta_box_portfolio_image['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	foreach ($hercules_meta_box_portfolio_video['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	foreach ($hercules_meta_box_portfolio_audio['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
}