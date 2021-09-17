<?php 
/**
* Template Name: Full width blog
*/
get_header(); ?>

<div class="content-holder clearfix">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid">
					<div id="title-header" class="span12">
            <div class="page-header">
          <?php get_template_part("static/static-customtitle"); ?>
            </div> 
                </div>
                <div class="row-fluid">
                    <div class="span12" id="content">
                        <?php get_template_part("loop/loop-blog"); ?>
                    </div>
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