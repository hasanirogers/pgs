<?php
global $hercules_add_swfobject;
$hercules_add_swfobject = true;
global $hercules_add_playlist;
$hercules_add_playlist = true;
global $hercules_add_jplayer;
$hercules_add_jplayer = true;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>				
	
	<?php 
		// get video attribute
		$video_title = get_post_meta(get_the_ID(), 'tz_video_title', true);
		$video_artist = get_post_meta(get_the_ID(), 'tz_video_artist', true);
		$embed = get_post_meta(get_the_ID(), 'tz_video_embed', true);
		$m4v_url = get_post_meta(get_the_ID(), 'tz_m4v_url', true);
		$ogv_url = get_post_meta(get_the_ID(), 'tz_ogv_url', true);

		// get site URL
		$home_url = get_template_directory_uri();

		$pos1 = strpos($m4v_url, 'wp-content');
		$m4v_new = substr($m4v_url, $pos1, strlen($m4v_url) - $pos1);
		$file1 = $home_url.'/'.$m4v_new;

		$pos2 = strpos($ogv_url, 'wp-content');
		$ogv_new = substr($ogv_url, $pos2, strlen($ogv_url) - $pos2);
		$file2 = $home_url.'/'.$ogv_new;
		
		// get thumb
		if(has_post_thumbnail()) {
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
			$image = vt_resize( $thumb,'' , 1200, 675, true, 100 );
		}
	?>
	
	<div class="video-wrap">
		<?php
			if ($embed != '') {
				echo stripslashes(htmlspecialchars_decode($embed));
			} else { ?>
			<script type="text/javascript">
			
			
jQuery(document).ready(function(){
	jQuery("#jquery_jplayer_<?php the_ID(); ?>").jPlayer({
		ready: function () {
			jQuery(this).jPlayer("setMedia", {
			title:"<?php echo $video_title; ?>",
			artist:"<?php echo $video_artist; ?>",
			free:true,
			m4v: "<?php echo stripslashes(htmlspecialchars_decode($file1)); ?>",
			ogv: "<?php echo stripslashes(htmlspecialchars_decode($file2)); ?>",
			poster:"<?php echo $image['url']; ?>"
		});
		},
		ended: function () {
			jQuery(this).jPlayer("setMedia", {
			title:"<?php echo $video_title; ?>",
			artist:"<?php echo $video_artist; ?>",
			free:true,
			m4v: "<?php echo stripslashes(htmlspecialchars_decode($file1)); ?>",
			ogv: "<?php echo stripslashes(htmlspecialchars_decode($file2)); ?>",
			poster:"<?php echo $image['url']; ?>"
		});
		},
		pause: function (event) {
		if (event.jPlayer.status.currentTime === 0) {
			jQuery(this).jPlayer("setMedia", {
			title:"<?php echo $video_title; ?>",
			artist:"<?php echo $video_artist; ?>",
			free:true,
			m4v: "<?php echo stripslashes(htmlspecialchars_decode($file1)); ?>",
			ogv: "<?php echo stripslashes(htmlspecialchars_decode($file2)); ?>",
			poster:"<?php echo $image['url']; ?>"
		});
		}
		},
swfPath: "<?php echo get_template_directory_uri(); ?>/flash",
		supplied: "ogv, m4v, all",
		cssSelectorAncestor: "#jp_container_<?php the_ID(); ?>",
		size: {
							width: "100%",
							height: "100%"
							},
		smoothPlayBar: true,
		keyEnabled: true
		
});
});
</script>
				
				<!-- BEGIN video -->	
				<div id="jp_container_<?php the_ID(); ?>" class="jp-video fullwidth playlist">
					<div class="jp-type-list-parent">
						<div class="jp-type-single">
							<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
							<div class="jp-gui">
								<div class="jp-video-play">
									<a href="javascript:;" class="jp-video-play-icon" tabindex="1" title="Play">Play</a>
								</div>
								<div class="jp-interface">
									<div class="jp-progress">
										<div class="jp-seek-bar">
											<div class="jp-play-bar"></div>
										</div>
									</div>
									<div class="jp-duration"></div>
									<div class="jp-time-sep"></div>
									<div class="jp-current-time"></div>
									<div class="jp-controls-holder">
										<ul class="jp-controls">
											<li><a href="javascript:;" class="jp-previous" tabindex="1" title="Previous"><span>Previous</span></a></li>
											<li><a href="javascript:;" class="jp-play" tabindex="1" title="Play"><span>Play</span></a></li>
											<li><a href="javascript:;" class="jp-pause" tabindex="1" title="Pause"><span>Pause</span></a></li>
											<li><a href="javascript:;" class="jp-next" tabindex="1" title="Next"><span>Next</span></a></li>
											<li><a href="javascript:;" class="jp-stop" tabindex="1" title="Stop"><span>Stop</span></a></li>
										</ul>
										<div class="jp-volume-bar">
											<div class="jp-volume-bar-value"></div>
										</div>
										<ul class="jp-toggles">
											<li><a href="javascript:;" class="jp-mute" tabindex="1" title="Mute"><span>Mute</span></a></li>
											<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="Unmute"><span>Unmute</span></a></li>
										</ul>
									</div>
								</div>
								<div class="jp-no-solution">
									<span>Update Required. </span>To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
								</div>	
							</div>
						</div>			
					</div>
					<div class="jp-playlist">
						<ul>
							<li></li>
						</ul>
					</div>
				</div><!-- END video -->
			<?php }
		?>
		
	</div>
			
<div class="row-fluid">
	<div class="span3">
	<?php get_template_part('includes/post-formats/post-meta'); ?>
	</div>
	<div class="span9">
		<header class="post-header">	
		<?php if(!is_singular()) : ?>
		<?php $blog_author_name = of_get_option('blog_author_name');
              $post_author = of_get_option('post_author');		
		if ($post_author=='true' || $post_author=='') { ?>
		<span class="post_author"><?php echo $blog_author_name; ?> <?php the_author_posts_link() ?></span>
		<?php } ?>
			<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to:', HS_CURRENT_THEME);?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php else :?>
		<?php $blog_author_name = of_get_option('blog_author_name');
		$post_author = of_get_option('post_author');
		if ($post_author=='true' || $post_author=='') { ?>
		<span class="post_author"><?php echo $blog_author_name; ?> <?php the_author_posts_link() ?></span>
		<?php } ?>
			<h2 class="post-title"><?php the_title(); ?></h2>
		<?php endif; ?>
	</header>
	<?php if(!is_singular()) : ?>				
	<!-- Post Content -->
	<div class="post_content">
		<?php $post_excerpt = of_get_option('post_excerpt'); ?>
		<?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>		
			<div class="excerpt">			
			<?php 
				$content = get_the_content();
				$excerpt = get_the_excerpt();
			if (has_excerpt()) {
				the_excerpt();
			} else {
				if(!is_search()) {
				echo my_string_limit_words($content,55);
				} else {
				echo my_string_limit_words($excerpt,55);
				}
			} ?>			
			</div>
		<?php } ?>
		<a href="<?php the_permalink() ?>" class="btn btn-large"><?php _e('Read more', HS_CURRENT_THEME); ?></a>
		<div class="clear"></div>
	</div>
					
	<?php else :?>	
	<!-- Post Content -->
	<div class="post_content">	
		<?php the_content(''); ?>
		<div class="clear"></div>
	</div>
	<!-- //Post Content -->	
	<?php endif; ?>
	</div>	 </div>       
 
</article><!--//.post__holder-->