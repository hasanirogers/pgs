<?php
/**
* Template Name: Page With Wide Content
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
                </div>
			</div>
		</div>
	</div>
</div>

<?php get_template_part("loop/loop-page"); ?>
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