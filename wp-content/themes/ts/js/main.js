/*
	Note: this file was updated on June 19th 2011, to reflect
	changes in the Facebook API, so some lines differ from those
	in the tutorial.
*/

jQuery(document).ready(function ($){
    
  $(document).foundation();
    
    var menu = $('.top-bar'),
        mobmenu = $('.mob-options'),
        frontholder = $('.front-holder'),
        thumbholder = $('.thumb-holder'),
        recentholder = $('.wall ul'),
        pos = menu.offset();
  
    var homeCar = $('#home-car');
        car = $('#gallery-car');



  // home page      

  homeCar.owlCarousel({
    items: 2,
    slideSpeed: 800,
    itemsDesktop: [1199,2],
    itemsDesktopSmall: [500,1]
  });

  $(".next").click(function(){
    homeCar.trigger('owl.next');
  });
  $(".prev").click(function(){
    homeCar.trigger('owl.prev');
  });



  // single page

  var carNum = $('.single-slide').length;

  car.owlCarousel({
    items: 1,
    itemsDesktop: [1199,1],
    itemsDesktopSmall: [600,1],
    itemsTablet: [768,1],
    slideSpeed: 800,
  });

  $(".next").click(function(){
    car.trigger('owl.next');
  });
  $(".prev").click(function(){
    car.trigger('owl.prev');
  });

  if (carNum < 2) {
    $('.controls').css({'display':'none'});
  }
    

  // category page

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


  // button actions

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
    $('.contact').toggleClass('contact-open');
    $(this).toggleClass('contact-open');
    $('.mobile-button').removeClass('mobile-button-open');
    $('.main-nav').toggleClass('mobile-open');
    if($('#contact-window').hasClass('contact-open')){
      $('#contact-window').velocity('slideDown',{duration: 500, easing: 'easeInOutQuint'})
    } else {
      $('#contact-window').velocity('slideUp',{duration: 500, easing: 'easeInOutQuint'});
    }
  });

  $('.main-content').click(function(){
    $('#contact-window').velocity('slideUp',{duration: 500});
  });

  /*
	$('.but-contact').click(function(){
		$('.menu-item-work').removeClass('open');
		$(this).toggleClass('contact-open-li');
		$('.contact').toggleClass('contact-open');
	});
*/

	$('.mobile-button').click(function(){
		$(this).toggleClass('mobile-button-open');
		$('.main-nav').toggleClass('mobile-open');
	});

	$('.main-content').click(function(){
		$('.contact').removeClass('contact-open');
		$('.but-contact').removeClass('contact-open-li');
		$('.main-nav').removeClass('mobile-open');
		$('.but-work').removeClass('open');
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


