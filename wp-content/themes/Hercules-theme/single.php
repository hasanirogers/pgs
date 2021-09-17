<?php get_header(); ?>
<div class="content-holder clearfix">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="row">
                <div class="span12" id="title-header">
                <div class="page-header">
                <section class="title-section">
                <?php $blog_text = of_get_option('blog_text'); ?>
				<?php if($blog_text){?>
				<?php echo "<h1>". of_get_option('blog_text') . "</h1>"; 	} ?>
                <?php $blog_sub = of_get_option('blog_sub');  ?>
				<?php if($blog_sub){?>
			    <?php echo "<h2>". of_get_option('blog_sub') . "</h2>"; 	?>
				<?php } ?>
          </section>
            </div> 
                </div>
                   </div>
                 <div class="row">
                
                    <div class="span8 <?php echo of_get_option('blog_sidebar_pos'); ?>" id="content">
                     
                        <?php get_template_part("loop/loop-single"); ?>
                    </div>
                    <div class="span4 sidebar" id="sidebar">
                        <?php dynamic_sidebar("hs_main_sidebar"); ?>
                    </div>
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