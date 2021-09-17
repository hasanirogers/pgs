<?php
/**
* Template Name: Home Page With Slideshow
*/

get_header(); ?>

<div class="content-holder clearfix">
	<?php get_template_part("static/static-slider"); ?>
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