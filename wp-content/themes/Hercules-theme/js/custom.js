jQuery(window).load(function(){
  jQuery('.hider-page').fadeOut(800);
});

jQuery(document).ready(function(){
jQuery('a[data-rel]').each(function() {
    jQuery(this).attr('rel', jQuery(this).data('rel'));
});
		// Init navigation menu
		
			// main navigation init
			jQuery('ul.sf-menu').superfish({

				delay:       1000, 		// the delay in milliseconds that the mouse can remain outside a sub-menu without it closing
				animation:   {opacity:'show' ,height:'show'}, // used to animate the sub-menu open
				speed:       'normal',  // animation speed 
				autoArrows:  false,   // generation of arrow mark-up (for submenu)
				disableHI: true // to disable hoverIntent detection
			});

		// Init Mobile Menu
		jQuery('.sf-menu').mobileMenu();
				// Init for si.files
		SI.Files.stylizeAll();

		//Zoom fix
	
			// IPad/IPhone
		  	var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
		    ua = navigator.userAgent,
		 
		    gestureStart = function () {
		        viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";
		    },
		 
		    scaleFix = function () {
		      if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
		        viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
		        document.addEventListener("gesturestart", gestureStart, false);
		      }
		    };
			scaleFix();

			
jQuery('.skills').appear(function() {

jQuery(".chart").each(function() {
var $t = jQuery(this);
var size = jQuery(this).attr('data-size');
var bgcolor = jQuery(this).attr('data-bgcolor');
var fgcolor = jQuery(this).attr('data-fgcolor');
var donutwidth = jQuery(this).attr('data-donutwidth');
    $t.easyPieChart({ 
				animate: 2000,
				barColor: fgcolor,
				trackColor: bgcolor,
				lineWidth: donutwidth,
				lineCap: 'square',
				size: size,
				scaleColor: false,
onStep: function(value) {
                        this.$el.find('span').text(~~value);
                    }				
     });
});
});


	jQuery('.bars').appear(function() {
		jQuery('.progress').each(function() {
			var percentage = jQuery(this).find('.bar').attr('data-progress');
			jQuery(this).find('.bar').css('width', '0%');
			jQuery(this).find('.bar').animate({ width:percentage + '%'}, { duration: 800, easing: 'swing'});
		});
	});
	
// transition effect
		style = 'easeInOutCubic';

		// if the mouse hover the image
		jQuery('.photo').hover(
			function() {
				//display heading and caption
				jQuery(this).children('a').children('div:first').stop(false,true).animate({bottom:'0%', opacity: 0.7},{duration:700, easing: style});
				jQuery(this).children('div:last').stop(false,true).animate({bottom:'0%', opacity: 1},{duration:700, easing: style});
			},

			function() {
				//hide heading and caption
				jQuery(this).children('a').children('div:first').stop(false,true).animate({bottom:'0%',opacity: 0},{duration:700, easing: style});
				jQuery(this).children('div:last').stop(false,true).animate({bottom:'-60%',opacity: 1},{duration:600, easing: style});
			}
		);
// ---------------------------------------------------------
// Prettyphoto
// ---------------------------------------------------------
	var viewportWidth = jQuery('body').innerWidth();
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({
		overlay_gallery: true,
		theme: 'pp_default',
		social_tools: false,
	 	changepicturecallback: function(){
			// 767px is presumed here to be the widest mobile device. Adjust at will.
			if (viewportWidth < 767) {
			   jQuery(".pp_pic_holder.pp_default").css("top",window.pageYOffset+"px");
			}
		}
	});
// ---------------------------------------------------------
// Back to Top
// ---------------------------------------------------------
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('#back-top').fadeIn();
		} else {
			jQuery('#back-top').fadeOut();
		}
	});
	jQuery('#back-top a').click(function () {
		jQuery('body,html').stop(false, false).animate({
			scrollTop: 0
		}, 800);
		return false;
	});
// ---------------------------------------------------------
// Add accordion active class
// ---------------------------------------------------------

	jQuery('.accordion').on('show', function (e) {
         jQuery(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
		   
    });
    jQuery('.accordion').on('hide', function (e) {
       jQuery(this).find('.accordion-toggle').not(jQuery(e.target)).removeClass('active');
    });
	

jQuery('.accordion').on('shown hidden', function(e){
    jQuery(e.target).siblings('.accordion-heading').find('.accordion-toggle i').toggleClass('icon-plus icon-minus');
});
// ---------------------------------------------------------
// Isotope Init
// ---------------------------------------------------------
	jQuery("#portfolio-grid").css({"visibility" : "visible"});
// ---------------------------------------------------------
// Menu Android
// ---------------------------------------------------------
	if(window.orientation!=undefined){
		var regM = /ipod|ipad|iphone/gi,
			result = navigator.userAgent.match(regM)
		if(!result) {
			jQuery('.sf-menu li').each(function(){
				if(jQuery(">ul", this)[0]){
					jQuery(">a", this).toggle(
						function(){
							return false;
						},
						function(){
							//window.location.href = $(this).attr("href");
						}
					);
				} 
			})
		}
	}
});
	
