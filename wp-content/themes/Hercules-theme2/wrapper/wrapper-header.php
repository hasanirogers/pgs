<?php /* Wrapper Name: Header */ ?>
<?php if ( is_active_sidebar( 'hs_header_sidebar_1' ) || is_active_sidebar( 'hs_header_sidebar_2' ) )  : ?>
<?php
global $hercules_add_animatedheader;
$hercules_add_animatedheader = true;
	?>
<div class="row-fluid">
<div class="span12 pre-header">
<div class="span4" style="font-size:12px;">
		<?php dynamic_sidebar("hs_header_sidebar_1"); ?>
    </div>
	

<div class="span8">
<div class="pull-right">
    	<?php dynamic_sidebar("hs_header_sidebar_2"); ?>  
		</div>
    <div style="width:50%; height:20px; float:right;">
<?php get_template_part("static/static-search"); ?>
</div>
</div>
</div>
</div>
<?php endif; ?>
<div class="row-fluid post-header">

    <div class="span3">
    	<?php get_template_part("static/static-logo"); ?>
    </div>
	<div class="span9">
    	<?php get_template_part("static/static-nav"); ?>
    </div>

</div>
<!--<div class="row"> -->
    
<!-- </div> -->