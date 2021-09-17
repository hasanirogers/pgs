<?php /* Loop Name: Loop single portfolio */ ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<!--BEGIN .hentry -->
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="row-fluid">
			<div class="span12">
			<?php
				// get the media elements
				$mediaType = get_post_meta($post->ID, 'tz_portfolio_type', true);
				switch ($mediaType) {
					case "Image":
						hs_image($post->ID, 'portfolio-main');
						break;

					case "Slideshow":
					global $hercules_add_flexslider;
                    $hercules_add_flexslider = true;
						hs_gallery($post->ID, 'portfolio-main');
						break;

					case "Grid Gallery":
						hs_grid_gallery($post->ID, 'portfolio-main');
						break;

					case "Video":
					global $hercules_add_swfobject;
                    $hercules_add_swfobject = true;
                    global $hercules_add_playlist;
                    $hercules_add_playlist = true;
                    global $hercules_add_jplayer;
                    $hercules_add_jplayer = true;
						hs_video($post->ID);
						break;

					case "Audio":
					global $hercules_add_swfobject;
                    $hercules_add_swfobject = true;
                    global $hercules_add_playlist;
                    $hercules_add_playlist = true;
                    global $hercules_add_jplayer;
                    $hercules_add_jplayer = true;
						hs_audio($post->ID);
						break;

					default:
						break;
				}?>
				
			</div>
</div>
<div class="row-fluid">
	<div class="span3">
	<div class="post_date"><span><?php the_time('d'); ?></span><?php the_time('M Y'); ?></div>
			<!-- BEGIN .entry-content -->
		
		
				<!-- BEGIN .entry-meta -->
				
					<?php
						// get the meta information and display if supplied
						$portfolioClient = get_post_meta($post->ID, 'tz_portfolio_client', true);
						$portfolioSub = get_post_meta($post->ID, 'tz_portfolio_subtitle', true);
						$portfolioInfo = get_post_meta($post->ID, 'tz_portfolio_info', true);
						$portfolioURL = get_post_meta($post->ID, 'tz_portfolio_url', true);


				

					if (!empty($portfolioClient) || !empty($portfolioSub) || !empty($portfolioInfo) || !empty($portfolioURL)) {
						echo '<div class="post_meta"><ul class="portfolio-meta-list">';
					}
					
					if (!empty($portfolioClient)) {
					  echo '<li>';
						echo '<strong class="portfolio-meta-key"><i class="icon-tag"></i>' . __('Client: ', HS_CURRENT_THEME) . '</strong>';
						echo '<span>' . $portfolioClient . '</span>';
            echo '</li>';
					}

					if (!empty($portfolioInfo)) {
					echo '<li>';
						echo '<strong class="portfolio-meta-key"><i class="icon-list-alt"></i>' . __('Services: ', HS_CURRENT_THEME) . '</strong>';
						echo '<span>' . $portfolioInfo . '</span>';
						echo '</li>';
					}

					if (!empty($portfolioURL)) {
						echo '<li>';
						//echo '<span class="portfolio-meta-key">' . __('Live preview:', HS_CURRENT_THEME) . '</span>';
						echo "<i class=\"icon-link\"></i><a href='$portfolioURL'>" . __('Launch Project', HS_CURRENT_THEME) . "</a>";
						echo '</li>';
					}

					if (!empty($portfolioClient) || !empty($portfolioDate) || !empty($portfolioInfo) || !empty($portfolioURL)) {
						echo '</ul></div>';
					}?>	
					
					
					<!--BEGIN .pager .single-pager -->
				<ul class="pager single-pager">
					<?php if (get_next_post()) : ?>
					<li class="next"><?php next_post_link('%link', __('<i class="icon-angle-right"></i>', HS_CURRENT_THEME)) ?></li>
				<?php endif; ?>
				<?php if (get_previous_post()) : ?>
					<li class="previous"><?php previous_post_link('%link', __('<i class="icon-angle-left"></i>', HS_CURRENT_THEME)) ?></li>
				<?php endif; ?>

			
				<!--END .pager .single-pager -->
				</ul>
						</div>
			
				<div class="span9">

				<h1 class="post-title"><?php the_title(); ?></h1>
				<?php
					if (!empty($portfolioSub)) {
						echo '<h5>';
						echo $portfolioSub;
						echo '</h5>';
					}
				?>
<?php the_content(); ?>
<?php get_template_part('includes/post-formats/share-buttons'); ?>
		</div>
				</div>		
						
		<div class="row-fluid">
			<div class="span12"><?php comments_template('', true); ?></div>
		</div>
	</div>
<?php endwhile; endif; ?>