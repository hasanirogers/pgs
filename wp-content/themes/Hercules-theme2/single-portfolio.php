<?php get_header(); ?>

<div class="content-holder clearfix">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span12">
                       
                    </div>
                </div>
                <div id="content" class="row-fluid">
                    <div class="span12">
					
                        <?php get_template_part("loop/loop-single-portfolio"); ?>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <?php get_template_part('wrapper/wrapper-footer'); ?>
            </div>
        </div>
    </div>
</footer>
<?php get_footer(); ?>