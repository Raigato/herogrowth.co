jQuery(document).ready(function($) {
  "use strict";
  //Seil Get Padding Script
  $('.seil-sidebar .vertical-scrollbox').css('padding-bottom',$('.seil-footer').height());
  $('.seil-main-wrap').css('margin-left',$('.seil-sidebar').width());

  //Seil Nav Script
  $('.seil-toggle').on('click', function() {
    $('body').toggleClass('sidebar-open');
    $(this).toggleClass('active');
  });

  //Seil Outside Click Remove Class Script
  $(document).on('click', function(e) {
    if ($(e.target).is('.seil-sidebar, .seil-sidebar *, .seil-toggle, .seil-toggle *') === false) {
      $('body').removeClass('sidebar-open');
      $('.seil-toggle').removeClass('active');
    }
  });

  //Seil Nav Script
  $('.seil-navigation ul li.has-submenu > a').on('click', function(e) {
    e.preventDefault();
    var element = $(this).parent('.has-submenu');
    if (element.hasClass('active')) {
      element.removeClass('active');
      element.find('.has-submenu').removeClass('active');
      element.find('.submenu').slideUp();
    }
    else {
      element.addClass('active');
      element.children('.submenu').slideDown();
      element.siblings('.has-submenu').children('.submenu').slideUp();
      element.siblings('.has-submenu').removeClass('active');
      element.siblings('.has-submenu').find('.has-submenu').removeClass('active');
      element.siblings('.has-submenu').find('.submenu').slideUp();
    }
    e.stopPropagation();
  });

  //Seil Vertical Vcrollbox Script
  $(window).load(function() {
    $('.vertical-scrollbox').mCustomScrollbar ({
      axis: 'y',
      scrollInertia: 200,
      autoHideScrollbar: true,
      autoDraggerLength: true,
      advanced: {
        updateOnContentResize: true
      }
    });
  });

  //Seil Horizontal Scrollbox Script
  $(window).load(function() {
    $('.horizontal-scrollbox').mCustomScrollbar ({
      axis: 'x',
      scrollInertia: 200,
      autoHideScrollbar: true,
      autoDraggerLength: true,
      advanced: {
        updateOnContentResize: true
      }
    });
  });

  //Seil Add Class Script
  $('body:has(.posts-wrap)').addClass('gray-bg');

  //Seil Masonry script
  $(window).load( function() {
    var $grid = $('.seil-masonry').isotope ({
      itemSelector: '.masonry-item',
      layoutMode: 'packery',
    });
    var filterFns = {
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match( /ium$/ );
      }
    };
    $('.filter-buttons').on( 'click', 'a', function() {
      var filterValue = $( this ).attr('data-filter');
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
    });
    $('.filter-buttons').each( function( i, buttonGroup ) {
      var $buttonGroup = $( buttonGroup );
      $buttonGroup.on( 'click', 'a', function() {
        $buttonGroup.find('.active').removeClass('active');
        $(this).addClass('active');
      });
    });
  });

  //Seil Carousel Slider Script
  // function seil_owl_carousel() {
    $('.seil-carousel').each( function() {
      var $carousel = $(this);
      var $items = ($carousel.data("items") !== undefined) ? $carousel.data("items") : 1;
      var $items_tablet = ($carousel.data("items-tablet") !== undefined) ? $carousel.data("items-tablet") : 1;
      var $items_mobile_landscape = ($carousel.data("items-mobile-landscape") !== undefined) ? $carousel.data("items-mobile-landscape") : 1;
      var $items_mobile_portrait = ($carousel.data("items-mobile-portrait") !== undefined) ? $carousel.data("items-mobile-portrait") : 1;
      $carousel.owlCarousel ({
        loop : ($carousel.data("loop") !== undefined) ? $carousel.data("loop") : true,
        items : $carousel.data("items"),
        margin : ($carousel.data("margin") !== undefined) ? $carousel.data("margin") : 0,
        dots : ($carousel.data("dots") !== undefined) ? $carousel.data("dots") : true,
        nav : ($carousel.data("nav") !== undefined) ? $carousel.data("nav") : false,
        navText : ["<div class='slider-no-current'><span class='current-no'></span><span class='total-no'></span></div><span class='current-monials'></span>", "<div class='slider-no-next'></div><span class='next-monials'></span>"],
        autoplay : ($carousel.data("autoplay") !== undefined) ? $carousel.data("autoplay") : false,
        autoplayTimeout : ($carousel.data("autoplay-timeout") !== undefined) ? $carousel.data("autoplay-timeout") : 5000,
        animateOut : ($carousel.data("animateout") !== undefined) ? $carousel.data("animateout") : false,
        animateIn : ($carousel.data("animatein") !== undefined) ? $carousel.data("animatein") : false,
        mouseDrag : ($carousel.data("mouse-drag") !== undefined) ? $carousel.data("mouse-drag") : true,
        autoWidth : ($carousel.data("auto-width") !== undefined) ? $carousel.data("auto-width") : false,
        autoHeight : ($carousel.data("auto-height") !== undefined) ? $carousel.data("auto-height") : false,
        responsiveClass: true,
        responsive : {
          0 : {
            items : $items_mobile_portrait,
          },
          480 : {
            items : $items_mobile_landscape,
          },
          768 : {
            items : $items_tablet,
          },
          960 : {
            items : $items,
          }
        }
      });
      var totLength = $(".owl-dot", $carousel).length;
      $(".total-no", $carousel).html(totLength);
      $(".current-no", $carousel).html(totLength);
      $carousel.owlCarousel();
      $(".current-no", $carousel).html(1);
      $carousel.on('changed.owl.carousel', function(event) {
        var total_items = event.page.count;
        var currentNum = event.page.index + 1;
        $(".total-no", $carousel ).html(total_items);
        $(".current-no", $carousel).html(currentNum);
      });
    });
  // }
  // seil_owl_carousel();

  //Seil Hover Script
  $('.post-item, .seil-share').hover (
    function() {
      $(this).addClass('seil-hover');
    },
    function() {
      $(this).removeClass('seil-hover');
    }
  );

  //Seil Magnific Popup Video Script
  $('.seil-popup-video').magnificPopup ({
    mainClass: 'mfp-fade',
    type: 'iframe',
    closeMarkup:'<div class="mfp-close" title="%title%"></div>',
    iframe: {
      patterns: {
        youtube: {
          index: 'youtube.com/',
          id: function(url) {
            var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
            if ( !m || !m[1] ) return null;
            return m[1];
          },
          src: 'https://www.youtube.com/embed/%id%?autoplay=1'
        },
        vimeo: {
          index: 'vimeo.com/',
          id: function(url) {
            var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
            if ( !m || !m[5] ) return null;
            return m[5];
          },
          src: 'https://player.vimeo.com/video/%id%?autoplay=1'
        }
      }
    }
  });

  //Seil Magnific Popup Script
  $('.seil-popup').magnificPopup ({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    closeMarkup:'<div class="mfp-close" title="%title%"></div>',
    image: {
      verticalFit: true,
      titleSrc: function(item) {
        return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
      }
    },
    gallery: {
      enabled: true,
      arrowMarkup:'<div title="%title%" class="mfp-arrow mfp-arrow-%dir%"></div>',
    },
    zoom: {
      enabled: true,
      duration: 300, // don't foget to change the duration also in CSS
      opener: function(element) {
        return element.find('img');
      }
    }
  });

  // Seil Onclick Slideup Script
  $('.alert').on('click', 'button.close', function() {
    $(this).parent().slideUp(500, function() {
      $(this).remove();
    });
  });

  //Seil Progress Bar Script
  var progress_bar = $('.progress-bar');
  progress_bar.css("max-width:");
  $('.seil-skills').waypoint(function() {
    $('.progress').each(function() {
      var $this = $(this);
      $('.progress-bar', $this).animate ({
        width:$('.progress-bar', $this).attr('data-percent')
      },800);
    });
  },
  {
    offset: '100%'
  });


  //Seil Preloader Script
  $(window).load(function() {
    $('.seil-preloader').fadeOut(500, function() {});
  });

  //Seil Back Top Script
  jQuery('.seil-back-top').hide();
  jQuery(function () {
    jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() > 150) {
        jQuery('.seil-back-top').fadeIn();
      }
      else {
        jQuery('.seil-back-top').fadeOut();
      }
    });
    jQuery('.seil-back-top a').click(function () {
      jQuery('body,html').animate ({
        scrollTop: 0
      }, 1000);
    return false;
    });
  });

   // Accordion Active Only One At a Time.
  $('.collapse-others').each(function() {
    var $this = $(this);
    $('.collapse', $this).on('show.bs.collapse', function (e) {
      var all = $this.find('.collapse');
      var actives = $this.find('.collapsing, .collapse.in');
      all.each(function (index, element) {
        $(element).collapse('hide');
      })
      actives.each(function (index, element) {
        $(element).collapse('show');
      })
    });
  });

});