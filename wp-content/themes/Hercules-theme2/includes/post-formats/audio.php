<?php
global $hercules_add_swfobject;
$hercules_add_swfobject = true;
global $hercules_add_playlist;
$hercules_add_playlist = true;
global $hercules_add_jplayer;
$hercules_add_jplayer = true;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>		
	<div class="row-fluid">
	<?php $hercules_post_meta = of_get_option('post_meta'); ?>
<?php if ($hercules_post_meta=='true' || $hercules_post_meta=='') { ?>
	<div class="span3">
	<?php get_template_part('includes/post-formats/post-meta'); ?>
	</div>
	<div class="span9">
	<?php }else{ ?>
	<div class="span12">
	<?php } ?>	
	<header class="post-header">				
		<?php if(!is_singular()) : ?>		
			<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to:', HS_CURRENT_THEME);?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php else :?>				
			<h1 class="post-title"><?php the_title(); ?></h1>				
		<?php endif; ?>
		
	</header>
	
	<?php 
		// get audio attribute
		$hercules_audio_title = get_post_meta(get_the_ID(), 'tz_audio_title', true);
		$hercules_audio_artist = get_post_meta(get_the_ID(), 'tz_audio_artist', true);		
		$hercules_audio_format = get_post_meta(get_the_ID(), 'tz_audio_format', true);
		$hercules_audio_url = get_post_meta(get_the_ID(), 'tz_audio_url', true);

		// get site URL
		$hercules_home_url = home_url();
		$hercules_pos = strpos($hercules_audio_url, 'wp-content');
		$hercules_audio_new = substr($hercules_audio_url, $hercules_pos, strlen($hercules_audio_url) - $hercules_pos);
		$hercules_file = $hercules_home_url.'/'.$hercules_audio_new;
	?>
	
	<div class="audio-wrap">
		<script type="text/javascript">
			jQuery(document).ready(function(){
				var myPlaylist_<?php the_ID(); ?> = new jPlayerPlaylist({
				  jPlayer: "#jquery_jplayer_<?php the_ID(); ?>",
				  cssSelectorAncestor: "#jp_container_<?php the_ID(); ?>"
				}, [
				  {
					title:"<?php echo $hercules_audio_title; ?>",
					artist:"<?php echo $hercules_audio_artist; ?>",
					<?php echo $hercules_audio_format; ?>: "<?php echo stripslashes(htmlspecialchars_decode($hercules_file)); ?>" <?php if(has_post_thumbnail()) {?>,
					poster: "<?php echo $image; ?>" <?php } ?>
				  }
				], {
				  playlistOptions: {
					enableRemoveControls: false
				  },
				  ready: function () {
					jQuery(this).jPlayer("setMedia", {
						<?php echo $audio_format; ?>: "<?php echo stripslashes(htmlspecialchars_decode($hercules_file)); ?>"
						});
					},
				  swfPath: "<?php echo get_template_directory_uri(); ?>/flash",
				  supplied: "mp3, all",
				  wmode: "window"
				});
			});
		</script>
		
		<!-- BEGIN audio -->
		<div id="jquery_jplayer_<?php the_ID(); ?>" class="jp-jplayer"></div>
		<div id="jp_container_<?php the_ID(); ?>" class="jp-audio">
			<div class="jp-type-single">
				<div class="jp-gui">
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
			<div class="jp-playlist">
				<ul>
					<li></li>
				</ul>
			</div>
		</div>
		<!-- END audio -->
	</div>
			
	<!-- Post Content -->
	<div class="post_content">
		<?php the_content(''); ?>
		<div class="clear"></div>
	</div>
	<!--// Post Content -->
	
	</div></div>
		
</article><!--//.post__holder-->