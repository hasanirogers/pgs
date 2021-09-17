<?php
/**
* Template Name: Filterable Portfolio 4 cols
*/

get_header(); ?>

<div class="content-holder clearfix">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid">
					<div class="span12" id="title-header">
            <div class="page-header">
          <?php get_template_part("static/static-customtitle"); ?>
            </div> 
						
			</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row-fluid">
                    <div class="span12">
                        <?php get_template_part("loop/loop-portfolio4"); ?>
                        
                    </div>
</div>
<div class="content-holder clearfix">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid">
					<div class="span12" style="margin-bottom:60px;">
<?php get_template_part("loop/loop-portfolio-page"); ?>
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