<?php $hercules_cameraid = uniqid(); ?>

<script type="text/javascript">
		jQuery(function() {
			var myCamera = jQuery('#camera<?php echo $hercules_cameraid; ?>');
				myCamera.camera({
					alignment           : '<?php echo of_get_option('sl_alignment'); ?>', //topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
					autoAdvance         : <?php echo of_get_option('sl_slideshow'); ?>,   //true, false
					mobileAutoAdvance   : <?php echo of_get_option('sl_slideshow'); ?>, //true, false. Auto-advancing for mobile devices
					barDirection        : 'leftToRight',    //'leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'
					barPosition         : 'top',    //'bottom', 'left', 'top', 'right'
					cols                : <?php echo of_get_option('sl_columns'); ?>,
					easing              : '<?php echo of_get_option('sl_easing'); ?>',  //for the complete list http://jqueryui.com/demos/effect/easing.html
					mobileEasing        : '',   //leave empty if you want to display the same easing on mobile devices and on desktop etc.
					fx                  : '<?php echo of_get_option('sl_effect'); ?>',    //'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft',          'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight'
													//you can also use more than one effect, just separate them with commas: 'simpleFade, scrollRight, scrollBottom'
					mobileFx            : '',   //leave empty if you want to display the same effect on mobile devices and on desktop etc.
					gridDifference      : 250,  //to make the grid blocks slower than the slices, this value must be smaller than transPeriod
					height              : '<?php echo of_get_option('sl_height'); ?>', //here you can type pixels (for instance '300px'), a percentage (relative to the width of the slideshow, for instance '50%') or 'auto'
					imagePath           : 'images/',    //he path to the image folder (it serves for the blank.gif, when you want to display videos)
					loader              : '<?php echo of_get_option('sl_loader'); ?>',    //pie, bar, none (even if you choose "pie", old browsers like IE8- can't display it... they will display always a loading bar)
					loaderColor         : '#ffffff',
					loaderBgColor       : '#000000',
					loaderOpacity       : .2,    //0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1
					loaderPadding       : 1,    //how many empty pixels you want to display between the loader and its background
					loaderStroke        : 8,    //the thickness both of the pie loader and of the bar loader. Remember: for the pie, the loader thickness must be less than a half of the pie diameter
					minHeight           : '',  //you can also leave it blank
					navigation          : <?php echo of_get_option('sl_dir_nav'); ?>, //true or false, to display or not the navigation buttons
					navigationHover     : <?php echo of_get_option('sl_dir_nav_hide'); ?>,    //if true the navigation button (prev, next and play/stop buttons) will be visible on hover state only, if false they will be visible always
					pagination          : <?php echo of_get_option('sl_control_nav'); ?>,
					//playPause           : <?php echo of_get_option('sl_play_pause_button'); ?>,   //true or false, to display or not the play/pause buttons
					playPause           : false,   //true or false, to display or not the play/pause buttons
					pieDiameter         : 33,
					piePosition         : 'rightTop',   //'rightTop', 'leftTop', 'leftBottom', 'rightBottom'
					//portrait            : <?php echo of_get_option('sl_portrait'); ?>, //true, false. Select true if you don't want that your images are cropped
					portrait            : false, //true, false. Select true if you don't want that your images are cropped
					rows                : <?php echo of_get_option('sl_rows'); ?>,
					slicedCols          : <?php echo of_get_option('sl_columns'); ?>,
					slicedRows          : <?php echo of_get_option('sl_rows'); ?>,
					thumbnails          : <?php echo of_get_option('sl_thumbnails'); ?>,
					time                : <?php echo of_get_option('sl_pausetime'); ?>,   //milliseconds between the end of the sliding effect and the start of the next one
					transPeriod         : <?php echo of_get_option('sl_animation_speed'); ?>, //lenght of the sliding effect in milliseconds

									////////callbacks

					onEndTransition     : function() {  },  //this callback is invoked when the transition effect ends
					onLoaded            : function() { jQuery('.camera_overlayer').fadeIn("slow"); 
                                                       jQuery('.camera_bar').fadeIn("slow"); },  //this callback is invoked when the image on a slide has completely loaded
					onStartLoading      : function() {  },  //this callback is invoked when the image on a slide start loading
					onStartTransition   : function() {  }   //this callback is invoked when the transition effect starts
				});
		});
</script>
<div class="fluid_container" style="height:<?php echo of_get_option('sl_height'); ?>;">
<div id="camera<?php echo $hercules_cameraid; ?>" class="camera_wrap_4 camera_wrap camera_emboss pattern_2" >
	<?php
		query_posts("post_type=slider&posts_per_page=-1&post_status=publish&orderby=date");
		while ( have_posts() ) : the_post();

		$hercules_custom = get_post_custom($post->ID);
		$hercules_url = get_post_custom_values("my_slider_url");
		$hercules_headline = get_post_custom_values("my_slider_headline");
		$hercules_caption = get_post_custom_values("my_slider_caption");
		$sl_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		$sl_small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider-thumb');
	
	    $hercules_headlineeffect = get_post_meta($post->ID, 'my_headlineeffect', true);
		$hercules_captioneffect = get_post_meta($post->ID, 'my_captioneffect', true);
		$hercules_buttoneffect = get_post_meta($post->ID, 'my_buttoneffect', true);
		$hercules_captionlocation = get_post_meta($post->ID, 'my_captionlocation', true);
		
		$hercules_headlinetop = get_post_meta($post->ID, 'my_headlinetop', true);
        $hercules_captiontop = get_post_meta($post->ID, 'my_captiontop', true);
        $hercules_buttontop = get_post_meta($post->ID, 'my_buttontop', true);
		
		if($hercules_captionlocation== 'left') {
		$location = "left:0;";
		}else{
		$location = "right:0;";
		}

		if(has_post_thumbnail()){

		echo "<div ";
				echo "data-src='";
				echo $sl_image_url[0];
				echo "' data-link='". $hercules_url[0] ."'";
				echo " data-thumb='";
				echo $sl_small_image_url[0];
				echo "'>";
				if($hercules_headline[0]) { ?>
				
					<div style="position:absolute; <?php echo $location; ?> top:<?php echo $hercules_headlinetop;?>%; padding:5px; width:60%;" class="<?php echo $hercules_headlineeffect; ?> camera_caption">
					<h2 >
					<span style="color:<?php echo of_get_option('headline_color'); ?>;"><?php echo stripslashes(htmlspecialchars_decode($hercules_headline[0])); ?></span>
					</h2>
					</div>
					<?php } ?>
					<?php if($hercules_caption[0]) { ?>
					<div style="position:absolute; <?php echo $location; ?> top:<?php echo $hercules_captiontop;?>%; padding:5px; width:60%;" class="<?php echo $hercules_captioneffect; ?> camera_caption">
					<h5>
					<span style="color:<?php echo of_get_option('caption_color'); ?>;"><?php echo stripslashes(htmlspecialchars_decode($hercules_caption[0])); ?></span>
					</h5>
					</div>
					<?php } ?>
				<?php if(of_get_option('but_text')) { ?>
					<div style="position:absolute; <?php echo $location; ?> top:<?php echo $hercules_buttontop;?>%; width:60%;" class="<?php echo $hercules_buttoneffect; ?>  camera_caption">
					<a class="btn_slide" href="<?php echo $hercules_url[0]; ?>"><?php echo of_get_option('but_text'); ?></a>
					</div>
			<?php }
				
		echo "</div>";

		}
	endwhile;
	wp_reset_query(); ?>
</div></div>