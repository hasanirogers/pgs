<?php get_header(); ?>

<div class="content-holder clearfix">
    <div class="container">
        <div class="row">
            <div class="span12">
			 <div class="row">
                <div class="span12" id="title-header">
                <div class="page-header">
                <?php get_template_part("static/static-title"); ?>
                </div></div></div>
                <div class="row">
                    <div class="span12">
                        <?php get_template_part("loop/loop-single-testi"); ?>
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