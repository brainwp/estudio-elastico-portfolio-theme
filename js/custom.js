function header_scroll(){
	if( jQuery(window).width() > 767 && !( jQuery('html').hasClass('ie9') ) ){
	
		jQuery('header#main').css({ 'min-height' : jQuery(window).height() });
		
		if( jQuery('header#main .header-wrap').length == 0 )
			jQuery('header#main').wrapInner("<div class='header-wrap'></div>");
		
		var innerHeight = jQuery('.header-wrap').height();
		var documentHeight = jQuery(document).height();
		jQuery(window).scroll(function(){
			if( jQuery(window).scrollTop() < documentHeight - innerHeight ){
				jQuery('.header-wrap').css({ 'position' : 'fixed', 'top' : '0' });
			} else {
				jQuery('.header-wrap').css({ 'position' : 'absolute', 'top' : documentHeight - innerHeight });
			}
		});
		
	}
}
/*-----------------------------------------------------------------------------------*/
/*	LOADER
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
'use strict';

	$('body').prepend('<div id="spinningSquaresG"><div id="spinningSquaresG_1" class="spinningSquaresG"></div><div id="spinningSquaresG_2" class="spinningSquaresG"></div><div id="spinningSquaresG_3" class="spinningSquaresG"></div><div id="spinningSquaresG_4" class="spinningSquaresG"></div><div id="spinningSquaresG_5" class="spinningSquaresG"></div><div id="spinningSquaresG_6" class="spinningSquaresG"></div><div id="spinningSquaresG_7" class="spinningSquaresG"></div><div id="spinningSquaresG_8" class="spinningSquaresG"></div></div>');
	
	jQuery('.post-password-form').wrapInner('<div class="post-password-form-inner" />');

});

jQuery(window).load(function($){

	jQuery('body').find('#spinningSquaresG').css('display','none');
	jQuery('#content').animate({ 'opacity' : '1' }, 500);
	
	jQuery('#vertical, #vertical ul').height( jQuery(window).height() );

});
/*-----------------------------------------------------------------------------------*/
/*	PORTFOLIO PAGINATION A
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function ($) {
'use strict';

   $('.load-more li').first().slideDown();
   
   $('.load-more li a').click(function(){
   	var $this = $(this);
   	$this.css({ 'pointer-events' : 'none' });
   	
   		var url = $(this).attr('href');
   		var $wrapper = $('.grid.portfolio');
   		
   		$.get(url, function(data){
   			var filtered = jQuery(data).find('.grid.portfolio li');
   			filtered.each(function(){
   				$(this).hoverdir();
   			});
   			filtered.imagesLoaded(function(){
   				$wrapper.isotope('insert', filtered, function(){
   					$(window).trigger( 'resize' );
					$this.parent().slideUp(function(){
						$this.parent().next().slideDown();
					});
   				});
   			});
   		});
   		
   	return false;
   });
   
   $('.load-more.blog-load-more li a').click(function(){
   	var $this = $(this);
   	$this.css({ 'pointer-events' : 'none' });
   	
   		var url = $(this).attr('href');
   		var $wrapper = $('.grid.blog');
   		
   		$.get(url, function(data){
   			var filtered = jQuery(data).find('.grid.blog li');
   			filtered.each(function(){
   				$('.more-hover', this).hoverdir();
   			});
   			filtered.imagesLoaded(function(){
   				$wrapper.isotope('insert', filtered, function(){
   					$(window).trigger( 'resize' );
   					$this.parent().slideUp(function(){
   						$this.parent().next().slideDown();
   					});
   				});
   			});
   		});
   		
   	return false;
   });
   
   $('.load-more.team-load-more li a').click(function(){
   	var $this = $(this);
   	$this.css({ 'pointer-events' : 'none' });
   	
   		var url = $(this).attr('href');
   		var $wrapper = $('.grid.team');
   		
   		$.get(url, function(data){
   			var filtered = jQuery(data).find('.grid.team li');
   			filtered.each(function(){
   				$('.more-hover', this).hoverdir();
   			});
   			filtered.imagesLoaded(function(){
   				$wrapper.isotope('insert', filtered, function(){
   					$(window).trigger( 'resize' );
   					$this.parent().slideUp(function(){
   						$this.parent().next().slideDown();
   					});
   				});
   			});
   		});
   		
   	return false;
   });
   
});
/*-----------------------------------------------------------------------------------*/
/*	MOBILE NAV
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
'use strict';

	$('#mobile-nav').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 200);
		setTimeout(function(){
			$('header#main').toggleClass('active');
			$('#mobile-nav').toggleClass('active');	
		}, 200);	
	});
	
});
/*-----------------------------------------------------------------------------------*/
/*	SLIDER
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
'use strict';

	$(".rslides").responsiveSlides({
	  speed: 500,
	  timeout: script_data.slider_delay,
	  pager: true,
	  pause: true,
	  pauseControls: true
	});
	
});
/*-----------------------------------------------------------------------------------*/
/*	ISOTOPE
/*-----------------------------------------------------------------------------------*/
jQuery(window).load(function($){
'use strict';
	
	var $container = jQuery('ul.grid');
	
	$container.isotope({
		itemSelector : 'li',
		transformsEnabled : false,
		onLayout: center_items
	});
	
	jQuery('.filters a').click(function(){
		var filter = jQuery(this).attr('data-href');
		jQuery('.filters li').removeClass('active');
		jQuery(this).parent().addClass('active');
		jQuery('ul.grid').isotope({ filter: filter });
		jQuery(window).trigger('resize');
		return false;
	});
	
	jQuery(window).smartresize(function(){
		jQuery('ul.grid').isotope('reLayout');
	});
	
	jQuery(window).trigger('resize');
	
	jQuery('header#main').height( jQuery(document).height() );
	
	jQuery(window).resize(function(){
		jQuery('header#main').height( jQuery(window).height() );
		setTimeout(function(){
			jQuery('header#main').height( jQuery(document).height() );
		}, 900);
		
		jQuery('#vertical, #vertical ul').height( jQuery(window).height() );
	});
	
});

function center_items($container){
	jQuery($container).find('.center').each(function(){
		var parentHeight = jQuery(this).parent().outerHeight() / 2;
		var thisHeight = jQuery(this).height() / 2;
		jQuery(this).css('margin-top', parentHeight - thisHeight);
	});
}
/*-----------------------------------------------------------------------------------*/
/*	HOVER DIR
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
'use strict';

	jQuery(function(){
		jQuery('ul.grid.portfolio li, .more-hover').each( function() { jQuery(this).hoverdir(); } );
	});

});
/*-----------------------------------------------------------------------------------*/
/*	GALLERY HOVER
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
'use strict';

	$('.gallery.animate li').hover(function(){
		$('.gallery li').not(this).stop().animate({ 'opacity' : '0.3' }, 200);
	}, function(){
		$('.gallery li').stop().animate({ 'opacity' : '1' }, 200);
	});
});
/*-----------------------------------------------------------------------------------*/
/*	AJAX PORTFOLIO
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
'use strict';

if( script_data.ajax_control == 1 ){
	$('body').on('click', 'ul.grid li:not(.pagination) a:not(.view), .gallery-wrapper a', function(){
		var url = $(this).attr('href');
		
		jQuery('body').find('#spinningSquaresG').css('display','block');
		
		$('.filters').slideUp();
		
		$.get(url, function(data){
		
			var filtered = jQuery(data).filter('section').removeClass('content');
			
			filtered.imagesLoaded(function(){
			
				$('ul.grid, .gallery-wrapper, .load-more').animate({ 'left' : '-100%', 'opacity' : '0' }, function(){
					filtered.find('.tab-container').easytabs();
					
					$('ul.grid, .gallery-wrapper, .load-more').css('max-height', '0px');
					$("html, body").animate({ scrollTop: 0 }, 200);
					$('#loader').html(filtered);
					
					$('#loader').find(".rslides").responsiveSlides({
					  speed: 500,
					  timeout: script_data.slider_delay,
					  pager: true,
					  pause: true,
					  pauseControls: true
					});
					
					$('#loader .rslides_tabs').eq(1).remove();
					
					$('#loader').find('.accordion > dd.active').show();
					  
					$('#loader').find('.accordion > dt > a').click(function() {
						if( $(this).parent().hasClass('active') ){
							$(this).parents('.accordion').find('dt').removeClass('active');
							$(this).parents('.accordion').find('dd').removeClass('active').slideUp();
							return false;
						} else {
							$(this).parents('.accordion').find('dt').removeClass('active');
							$(this).parents('.accordion').find('dd').removeClass('active').slideUp();
							$(this).parent().addClass('active').next().addClass('active').slideDown();
							return false;
						}
					});
					
					
					$('#loader').slideDown(function(){
						jQuery(window).trigger('resize');
					}, function(){
						jQuery('body').find('#spinningSquaresG').css('display','none');
						header_scroll();
						jQuery(window).trigger('resize');
						
					});
					
				});
			});
		});
		return false;
	});
	
	$('body').on('click', '.post-nav:not(.single .post-nav)', function(){
		var url = $(this).attr('href');
		
		jQuery('body').find('#spinningSquaresG').css('display','block');
		
		$.get(url, function(data){
			var filtered = jQuery(data).filter('section').removeClass('content');
			
			filtered.imagesLoaded(function(){
			
				filtered.find(".rslides").responsiveSlides({
				  speed: 500,
				  timeout: script_data.slider_delay,
				  pager: true,
				  pause: true,
				  pauseControls: true
				});
				
				filtered.find('.tab-container').easytabs();
				
				filtered.find('.accordion > dd.active').show();
				  
				filtered.find('.accordion > dt > a').click(function() {
					if( $(this).parent().hasClass('active') ){
						$(this).parents('.accordion').find('dt').removeClass('active');
						$(this).parents('.accordion').find('dd').removeClass('active').slideUp();
						return false;
					} else {
						$(this).parents('.accordion').find('dt').removeClass('active');
						$(this).parents('.accordion').find('dd').removeClass('active').slideUp();
						$(this).parent().addClass('active').next().addClass('active').slideDown();
						return false;
					}
				});
				
				$('#loader').animate({ 'left' : '-100%', 'opacity' : '0' }, function(){
					$("html, body").animate({ scrollTop: 0 }, 200);
					$('#loader').html(filtered).animate({ 'left' : '0', 'opacity' : '1' }, function(){
						jQuery('body').find('#spinningSquaresG').css('display','none');
					});
				});
				
			});
		});
		return false;
	});
	
	$('body').on('click', 'a.close', function(){
	
		$('.filters').slideDown();
		
		$('#loader').slideUp(function(){
			$('ul.grid, .gallery-wrapper, .load-more').css('max-height', '');
			$('ul.grid, .gallery-wrapper, .load-more').animate({ 'left' : '0', 'opacity' : '1' },function(){
				jQuery(window).trigger('resize');
			});
		});
		
		return false;
	});
}

});
/*-----------------------------------------------------------------------------------*/
/*	VERTICAL GALLERY
/*-----------------------------------------------------------------------------------*/
jQuery(window).load(function($){
'use strict';

if(jQuery('#vertical').length > 0){
	var sly = new Sly(jQuery('#vertical'), {
		horizontal: 1,
		itemNav: 'basic',
		smart: 1,
		activateOn: 'click',
		mouseDragging: 1,
		touchDragging: 1,
		releaseSwing: 1,
		startAt: 0,
		scrollBy: 1,
		activatePageOn: 'click',
		speed: 300,
		elasticBounds: 1,
		dragHandle: 1,
		dynamicHandle: 1,
		clickBar: 1,
	}).init();
	
	jQuery(window).resize(function(){
		sly.reload();
	});
}
	
});
/*-----------------------------------------------------------------------------------*/
/*	VEIW BACKGROUND
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
'use strict';

$('.view-background').click(function(){
	if( $('#content').css('left') == '0px' ){
		$('#content').animate({ 'left' : '-100%', 'opacity' : '0' });
		$('.view-background').html('<i class="icon-eye-open icon-2x"></i>');
	} else {
		$('#content').animate({ 'left' : '0', 'opacity' : '1' });
		$('.view-background').html('<i class="icon-eye-close icon-2x"></i>');
	}
	if( $(window).width() > 860 && $('header#main').css('left') == '0px' ){
		$('header#main').animate({ 'left' : '-100%', 'opacity' : '0' });
	} else if ( $(window).width() > 860 ) {
		$('header#main').animate({ 'left' : '0', 'opacity' : '1' });
	}
	return false;
});
	
});
/*-----------------------------------------------------------------------------------*/
/*	TABS
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
'use strict';

		$('.tab-container').easytabs();
		$('p:empty').remove();

});
/*-----------------------------------------------------------------------------------*/
/*	ALERTS
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
'use strict';

		$('.alert i').click(function(){
			$(this).parent().slideUp();
		});

});
/*-----------------------------------------------------------------------------------*/
/*	ACCORDION
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
'use strict';

		$('.accordion > dd.active').show();
		  
		$('.accordion > dt > a').click(function() {
			if( $(this).parent().hasClass('active') ){
				$(this).parents('.accordion').find('dt').removeClass('active');
				$(this).parents('.accordion').find('dd').removeClass('active').slideUp();
				return false;
			} else {
				$(this).parents('.accordion').find('dt').removeClass('active');
				$(this).parents('.accordion').find('dd').removeClass('active').slideUp();
				$(this).parent().addClass('active').next().addClass('active').slideDown();
				return false;
			}
		});

});
/*-----------------------------------------------------------------------------------*/
/*	header#main
/*-----------------------------------------------------------------------------------*/
jQuery(window).load(function($){
	
	header_scroll();
	center_items();
	
	jQuery(window).resize(function(){
		center_items();
	});
	
	jQuery('ul.grid.portfolio li, .more-hover').hover(function(){
		var parentHeight = jQuery(this).height() / 2;
		var thisHeight = 35;
		jQuery(this).find('.center').css('margin-top', parentHeight - thisHeight);
	}, function(){
		//nothing
	});
	
	jQuery('.horizontal .center').each(function(){
		var $this = jQuery(this);
		var parentHeight = $this.parent().height() / 2;
		var thisHeight = $this.height() / 2;
		$this.css('margin-top', parentHeight - thisHeight);
	});
});

jQuery(document).ready(function(){
	jQuery(document).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          jQuery( this ).css( position );
          jQuery( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });
});
