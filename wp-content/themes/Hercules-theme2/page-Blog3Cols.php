<?php
/**
* Template Name: Blog 3 cols
*/

get_header(); ?>

<div class="content-holder clearfix">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="row">
					<div class="span12" id="title-header">
            <div class="page-header">
          <?php get_template_part("static/static-customtitle"); ?>
            </div> 
						
			</div>
				</div>
				<div class="row">
                    <?php $show_sidebar = of_get_option('show_sidebar3');
					if($show_sidebar == "yes") { ?>
                    <div class="span8 <?php echo of_get_option('blog_sidebar_pos'); ?>" id="content">
                         <?php get_template_part("loop/loop-blog3"); ?>
                    </div>
                    <div class="span4 sidebar" id="sidebar">
                        <?php dynamic_sidebar("hs_main_sidebar"); ?>
                    </div>
                    <?php } else { ?>
					
                    <div class="span12">
                         <?php get_template_part("loop/loop-blog3"); ?>
                    </div>
                    <?php } ?>
</div>
			</div>
		</div>
	</div>
</div>
            
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="span12">
                <?php get_template_part('wrapper/wrapper-footer'); ?>
            </div>
        </div>
    </div>
</footer>
<?php get_footer(); ?>