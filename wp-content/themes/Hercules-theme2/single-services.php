<?php get_header(); ?>

<div class="content-holder clearfix">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span8 <?php echo of_get_option('blog_sidebar_pos'); ?>" id="content">
                        <?php get_template_part("loop/loop-single-services"); ?>
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