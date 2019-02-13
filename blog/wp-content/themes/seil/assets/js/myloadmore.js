jQuery(function($){
  $('.seil-ajx-more-posts').click(function(){

    var button = $(this),
      data = {
      'action': 'loadmore',
      'query': seil_loadmore_params.posts, // that's how we get params from wp_localize_script() function
      'page' : seil_loadmore_params.current_page,
    };
    var $loading = (button.data("loading") !== undefined) ? button.data("loading") : 'Load More';

    $.ajax({
        url : seil_loadmore_params.ajaxurl, // AJAX handler
        data : data,
        type : 'POST',
        beforeSend : function ( xhr ) {
          button.removeClass('seil-ajx-more-posts');
          button.addClass('seil-jax-more-posts');
          button.html('<span class="mouse-event"><i class="fa fa-spinner fa-spin"></i></span>')
        },
        complete: function(){
          button.addClass('seil-ajx-more-posts');
          button.removeClass('seil-jax-more-posts');
          button.text($loading);
        },
        success : function( data ){
          var $items = $( data ); // data is the HTML of loaded posts
          $('.seil-masonry').append( $items ).isotope( 'appended', $items );
          if( data ) {
              // button.text( 'More posts' ).prev().after(data); // insert new posts
              seil_loadmore_params.current_page++;

              if ( seil_loadmore_params.current_page == seil_loadmore_params.max_page )
                  button.remove(); // if last page, remove the button

          // Custom Scripts
          // Seil Carousel
        $('.seil-carousel').each( function() {
          var $carousel = $(this);
          var $owl_items = ($carousel.data("owl-items") !== undefined) ? $carousel.data("owl-items") : 1;
          var $items_tablet = ($carousel.data("items-tablet") !== undefined) ? $carousel.data("items-tablet") : 1;
          var $items_mobile_landscape = ($carousel.data("items-mobile-landscape") !== undefined) ? $carousel.data("items-mobile-landscape") : 1;
          var $items_mobile_portrait = ($carousel.data("items-mobile-portrait") !== undefined) ? $carousel.data("items-mobile-portrait") : 1;
          $carousel.owlCarousel ({
            loop : ($carousel.data("loop") !== undefined) ? $carousel.data("loop") : true,
            items : $carousel.data("owl_items"),
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
                items : $owl_items,
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

        // zilla Likes
        $('.zilla-likes').on('click', function() {
        var link = $(this);
        if (link.hasClass('active')) return false;

        var id = $(this).attr('id'),
            postfix = link.find('.zilla-likes-postfix').text();

        $.ajax({
          type: 'POST',
          url: zilla_likes.ajaxurl,
          data: {
            action: 'zilla-likes',
            likes_id: id,
            postfix: postfix,
          },
          xhrFields: {
            withCredentials: true,
          },
          success: function(data) {
            link.html(data).addClass('active').attr('title','You already like this');
          },
        });

        return false;
        });

        if ($('body.ajax-zilla-likes').length) {
          $('.zilla-likes').each(function() {
            var id = $(this).attr('id');
            $(this).load(zilla_likes.ajaxurl, {
              action: 'zilla-likes',
              post_id: id,
            });
          });
        }

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

          } else {
            button.remove();
          }
          setTimeout(function(){
            $('.post-item').hover(
              function(){
                $(this).addClass('seil-hover');
              },
              function(){
                $(this).removeClass('seil-hover');
              }
              );
              //Seil Social Hover Script
              $('.post-item, .seil-share').hover (
                function() {
                  $(this).addClass('seil-hover');
                },
                function() {
                  $(this).removeClass('seil-hover');
                }
              );
              var $grid = $('.seil-masonry').isotope ({
                itemSelector: '.masonry-item',
                layoutMode: 'packery',
              });
          }, 400);
        }
    });
  });
});
