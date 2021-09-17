<?php /* Static Name: Logo */ ?>
<!-- BEGIN LOGO -->                     
<div class="logo pull-left">                            
		<?php if(of_get_option('logo_type') == 'text_logo'){?>
				<?php if( is_front_page() || is_home() || is_404() ) { ?>
						<h1 class="logo_h logo_h__txt"><a href="<?php echo home_url(); ?>/" title="<?php hs_site_tagline(); ?>" class="logo_link"><?php hs_site_title(); ?></a></h1>
				<?php } else { ?>
						<h2 class="logo_h logo_h__txt"><a href="<?php echo home_url(); ?>/" title="<?php hs_site_tagline(); ?>" class="logo_link"><?php hs_site_title(); ?></a></h2>
				<?php } ?>
				<!-- Site Tagline -->
				<p class="logo_tagline"><?php hs_site_tagline(); ?></p>
		<?php } else { ?>
				<?php if(of_get_option('logo_url') == ''){ ?>
						<a href="<?php echo home_url(); ?>/" class="logo_h logo_h__img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php hs_site_tagline(); ?>"></a>
				<?php } else  { ?>
						<a href="<?php echo home_url(); ?>/" class="logo_h logo_h__img"><img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php hs_site_tagline(); ?>"></a>
				<?php }?>
		<?php }?>		
</div>
<!-- END LOGO -->