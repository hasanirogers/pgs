<?php $post_meta = of_get_option('post_meta'); ?>
<?php if ($post_meta=='true' || $post_meta=='') { ?>
	<!-- Post Meta -->
	<div class="post_date"><span><?php the_time('d'); ?></span><?php the_time('M Y'); ?></div>
	<div class="post_meta">
	<ul>
		<li><span class="post_category"><i class="icon-folder-open-alt"></i><?php the_category(', ') ?></span></li>
		<li><span class="post_comment"><i class="icon-comments-alt"></i><?php comments_popup_link('No comments', '1 comment', '% comments', 'comments-link', 'Comments are closed'); ?></span></li>
		<li><span class="post_permalink"><i class="icon-link"></i><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to:', HS_CURRENT_THEME);?> <?php the_title(); ?>"><?php _e('Permalink', HS_CURRENT_THEME) ?></a></span></li>
		
		</ul>
	</div>
	<!--// Post Meta -->
<?php } ?>