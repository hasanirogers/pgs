<?php /* Wrapper Name: Footer */ ?>
<?php if ( is_active_sidebar( 'hs_footer_sidebar_1' ) || is_active_sidebar( 'hs_footer_sidebar_2' ) || is_active_sidebar( 'hs_footer_sidebar_3' ) ) : ?>
<div class="row-fluid footer-widgets">
 
    <div class="span4">
        <?php dynamic_sidebar("hs_footer_sidebar_1"); ?>
    </div>
    <div class="span4">
        <?php dynamic_sidebar("hs_footer_sidebar_2"); ?>
    </div>
    <div class="span4">
        <?php dynamic_sidebar("hs_footer_sidebar_3"); ?>
    </div>
</div>
<?php endif; ?>