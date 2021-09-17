<?php /* Wrapper Name: Before Footer */ ?>
<?php if ( is_active_sidebar( 'hs_before_footer_sidebar' ) ) : ?>
<div id="before-footer" class="content-holder clearfix">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span12">
<?php dynamic_sidebar("hs_before_footer_sidebar"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>