/*
	Note: this file was updated on June 19th 2011, to reflect
	changes in the Facebook API, so some lines differ from those
	in the tutorial.
*/

jQuery(document).ready(function ($){
    
  $(document).foundation();
	
	$('#wall').facebookWall({
		id:'277431094738',
access_token:'CAACEdEose0cBAMOOZAaUGghxvuUAhqJjeitFjuU3MVlAkg76EbaMWZAVLMkeb7gSwroTvWdPY99fpaE6eZCB7rTbxt6NgeQog62BciLF2mewkX8r6XIAuwXbjMWRoW300rI12As7txFlD8BhNMrgbWpDOz9uy4aQwvpAHZB1KZBjZAQZAPHsNhPZCIcNJ2UZAv4ZA9lepzkhVN8AZDZD'
	});
    
    var menu = $('.top-bar'),
        mobmenu = $('.mob-options'),
        frontholder = $('.front-holder'),
        thumbholder = $('.thumb-holder'),
        recentholder = $('.wall ul'),
        pos = menu.offset();

    //mobmenu.css({display : 'none'});
  
    $(window).scroll(function(){
        if ($(this).scrollTop() > pos.top + menu.height() && menu.hasClass('default')) {
            
            menu.fadeOut('fast', function(){
                mobmenu.css({display : 'block'});
                // $(this).css({'background-color': '#871719'});
                $(this).removeClass('default').addClass('fixed').fadeIn('fast');
            });
        } else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
            menu.fadeOut('fast', function(){
                mobmenu.css({display : 'none'});
                $(this).removeClass('fixed').addClass('default').fadeIn('fast');
            });
        }
    });
    
    /* $('.front-holder').cycle({
    	timeout: 0,
    	fx: 'carousel',
    	carouselFluid: true,
    	carouselVisible: 2,
	    slides: '.front-thumb',
	    next: '.next',
	    prev: '.prev',
    }); */

    var homeCar = $('#home-car');
        car = $('#gallery-car');

    homeCar.owlCarousel({
      items: 2,
      slideSpeed: 800,
      autoHeight: true,
      itemsDesktop: [1199,2],
      itemsDesktopSmall: [500,1]
    });

    $(".next").click(function(){
      homeCar.trigger('owl.next');
    });
    $(".prev").click(function(){
      homeCar.trigger('owl.prev');
    });
/*
    $('.gallery').cycle({
    	fx: 'carousel',
      centerHorz: true,
      centerVert: true,
    	next: '.next',
    	prev: '.prev',
      slides: '.single-slide',
    	timeout: 0,
	    speed: 600,
			manualSpeed: 300  
    });
*/
    
    var count = $('.gallery-thumbs a').length;
    
    if(count == 1) {
	    $('.gallery-thumbs').css({'display':'none'});
    }
    if(count == 2) {
	    $('.gallery-thumbs').addClass('two');
    } else if (count == 3) {
	    $('.gallery-thumbs').addClass('three');
    }
    
  
  thumbholder.imagesLoaded(function() {
    thumbholder.isotope({
      masonry: {
        gutter: 60,
        isFitWidth: true,
      },
      itemSelector: '.thumb',
      getSortData: {
        name: '.work-title',
        category: '[data-category]'
      }
    });
  });

  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
      var number = $(this).find('.number').text();
      return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };

  // bind filter button click
  $('#filters').on( 'click', 'button', function() {
    var filterValue = $(this).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    thumbholder.isotope({ 
      filter: filterValue });
  });

  $('.buttons').each( function( i, buttonGroup ) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });

	$('.but-work').click(function(){
		$('.but-contact').removeClass('contact-open-li');
		$('.contact').removeClass('contact-open');
		$(this).toggleClass('open');
	});
	$('.but-contact').click(function(){
		$('.menu-item-work').removeClass('open');
		$(this).toggleClass('contact-open-li');
		$('.contact').toggleClass('contact-open');
	})
	$('.mobile-button').click(function(){
		$(this).toggleClass('mobile-button-open');
		$('.main-nav').toggleClass('mobile-open');
	})
	$('.main-content').click(function(){
		$('.contact').removeClass('contact-open');
		$('.but-contact').removeClass('contact-open-li');
		$('.main-nav').removeClass('mobile-open');
		$('.but-work').removeClass('open');
	});
	
	$(window).stellar({
		horizontalScrolling: false,
		verticalOffset: 200
	});
	
	$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 500);
        return false;
      }
    }
  });
  
  
});

// Creating our plugin. You can optionally
// place it in a separate file.


(function($){
	
	$.fn.facebookWall = function(options){
		
		options = options || {};
		
		if(!options.id){
			throw new Error('You need to provide an user/page id!');
		}
		
		if(!options.access_token){
			throw new Error('You need to provide an access token!');
		}
		
		// Default options of the plugin:
		
		options = $.extend({
			limit: 15	// You can also pass a custom limit as a parameter.
		},options);

		// Putting together the Facebook Graph API URLs:

		var graphUSER = 'https://graph.facebook.com/'+options.id+'/?fields=name,picture&access_token='+options.access_token+'&callback=?',
			graphPOSTS = 'https://graph.facebook.com/'+options.id+'/posts/?access_token='+options.access_token+'&callback=?&date_format=U&limit='+options.limit;
		
		var wall = this;
		
		$.when($.getJSON(graphUSER),$.getJSON(graphPOSTS)).done(function(user,posts){
			
			// user[0] contains information about the user (name and picture);
			// posts[0].data is an array with wall posts;
			
			var fb = {
				user : user[0],
				posts : []
			};

			$.each(posts[0].data,function(){
				
				// We only show links and statuses from the posts feed:
				if((this.type != 'link' && this.type!='status') || !this.message){
					return true;
				}

				// Copying the user avatar to each post, so it is
				// easier to generate the templates:
				this.from.picture = fb.user.picture.data.url;
				
				// Converting the created_time (a UNIX timestamp) to
				// a relative time offset (e.g. 5 minutes ago):
				this.created_time = relativeTime(this.created_time*1000);
				
				// Converting URL strings to actual hyperlinks:
				this.message = urlHyperlinks(this.message);

				fb.posts.push(this);
			});

			// Rendering the templates:
			$('#headingTpl').tmpl(fb.user).appendTo(wall);
			
			// Creating an unordered list for the posts:
			var ul = $('<ul>').appendTo(wall);
			
			// Generating the feed template and appending:
			$('#feedTpl').tmpl(fb.posts).appendTo(ul);
		});
		
		return this;

	};

	// Helper functions:

	function urlHyperlinks(str){
		return str.replace(/\b((http|https):\/\/\S+)/g,'<a href="$1" target="_blank">$1</a>');
	}

	function relativeTime(time){
		
		// Adapted from James Herdman's http://bit.ly/e5Jnxe
		
		var period = new Date(time);
		var delta = new Date() - period;

		if (delta <= 10000) {	// Less than 10 seconds ago
			return 'Just now';
		}
		
		var units = null;
		
		var conversions = {
			millisecond: 1,		// ms -> ms
			second: 1000,		// ms -> sec
			minute: 60,			// sec -> min
			hour: 60,			// min -> hour
			day: 24,			// hour -> day
			month: 30,			// day -> month (roughly)
			year: 12			// month -> year
		};
		
		for (var key in conversions) {
			if (delta < conversions[key]) {
				break;
			}
			else {
				units = key;
				delta = delta / conversions[key];
			}
		}
		
		// Pluralize if necessary:
		
		delta = Math.floor(delta);
		if (delta !== 1) { units += 's'; }
		return [delta, units, "ago"].join(' ');
		
	}

})(jQuery);

