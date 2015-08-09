/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */
 (function ($)
 {

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
var Roots = {
        // All pages
        common  : {
            init: function ()
            {

               $('.section-featured-img').css({
                'height': $('.section-featured-text').height()
            });

               var body = $("body"),
               _window = $(window),
               main_nav = $("#menu-primary-navigation"),
               nav_bar = $(".navbar"),
               navbar_fixed_top = $(".navbar-fixed-top");

               //jQuery to collapse the navbar on scroll
                _window.scroll(function ()
                {
                  if (nav_bar.offset().top > 50) {
                    navbar_fixed_top.addClass("top-nav-collapse");
                  } else {
                    navbar_fixed_top.removeClass("top-nav-collapse");
                  }
                });

              /*  ==================================================
              # Initialize all the reloadable JavaScript
              ================================================== */
              if (!Modernizr.touch)
              {

                function toggleChevron(e) {
                  $(e.target)
                    .prev('.panel-heading')
                    .find("a")
                    .toggleClass('accordion-opened');
                }

                $('#accordion').on('hidden.bs.collapse', toggleChevron);
                $('#accordion').on('shown.bs.collapse', toggleChevron);

                $('.panel-group').on('show.bs.collapse', function () {
                  $('#accordion .in').collapse('hide');
                });


                 $(".animated").appear();
                 _window.trigger("scroll");
                 $(document.body).on("appear", ".animated", function ()
                 {

                     var animationType = $(this).attr("data-animation");
                     var animationDelay = $(this).attr("data-animation-delay");
                     $(this).each(function ()
                     {
                         var $this = $(this);
                         // add the custom animation delay to the element
                         $this.css({
                             "-webkit-animation-delay": animationDelay,
                             "-moz-animation-delay"   : animationDelay,
                             "animation-delay"        : animationDelay
                         });
                         // add the animation to the element
                         $this.addClass(animationType);
                         if ($this.hasClass("no-opacity"))
                         {
                             $this.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function ()
                             {
                                 $this.removeClass("no-opacity");
                             });
                         }
                     });
                 });
              }
              else
              {
               $(".animated").each(function ()
               {
                   $(this).removeClass("animated no-opacity");
               });
              }




              /*  ==================================================
               # Overlay
               /* ================================================== */
               if (Modernizr.touch) {
                  // show the close overlay button
                  $(".close-overlay").removeClass("hidden");
                  // handle the adding of hover class when clicked
                  $(".effects .img").click(function(e) {
                      e.preventDefault();
                      e.stopPropagation();
                      if (!$(this).hasClass("hover")) {
                          $(this).addClass("hover");
                      }
                  });
                  // handle the closing of the overlay
                  $(".close-overlay").click(function(e) {
                      e.preventDefault();
                      e.stopPropagation();
                      if ($(this).closest(".img").hasClass("hover")) {
                          $(this).closest(".img").removeClass("hover");
                      }
                  });
              } else {
                  // handle the mouseenter functionality
                  $(".effects .img").mouseenter(function() {
                      $(this).addClass("hover");
                  })
                  // handle the mouseleave functionality
                  .mouseleave(function() {
                      $(this).removeClass("hover");
                  });
              }

          }

      },


      single_portfolio: {
          init: function () {

              $('.grid').masonry({
                // set itemSelector so .grid-sizer is not used in layout
                itemSelector: '.grid-item',
                // use element for option
                columnWidth: '.grid-sizer',
                percentPosition: true
              });
            // translate magnific popup
              $.extend(true, $.magnificPopup.defaults, {
                tClose: 'Fermer (Echap)', // Alt text on close button
                tLoading: 'Chargement...', // Text that is displayed during loading. Can contain %curr% and %total% keys
                gallery: {
                tPrev: 'Précédent (Flèche gauche)', // Alt text on left arrow
                tNext: 'Suivant (Flèche droite)', // Alt text on right arrow
                tCounter: '%curr% sur %total%' // Markup for "1 of 7" counter
              },
              image: {
                tError: '<a href="%url%">L\'image</a> n\'a pas pu être chargée.' // Error message when image could not be loaded
              },
              ajax: {
                tError: '<a href="%url%">Le contenu</a> n\'a pas pu être chargé.' // Error message when ajax request failed
              }
            });

            $('.popup-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Chargement',
                mainClass: 'mfp-img-mobile',
                gallery: {
                  enabled: true,
                  navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
              },
              image: {
                tError: 'L\'image n\'a pas pu être chargée'
              }
            });

            $(".effects .img").click(function(e) {
                //e.preventDefault();
                //e.stopPropagation();
                //alert('click');
                $(this).children(".overlay a").click();
                //$(this).(".overlay > a").trigger( "click" );
                //return false; // Prevent event propagation and infinite loops
            });
          }
        },


        // Portfolio
       /* archive_portfolio    : {
          init: function ()
          {
            var $grid = $('.grid').isotope({
              // main isotope options
              itemSelector: '.grid-item',
              // options for masonry layout mode
              masonry: {
                columnWidth: '.grid-sizer',
              }
            });
          }
        },*/

        // Home page
        home    : {
            init: function ()
            {
                // JavaScript to be fired on the home page

                /*  ==================================================
                 # Owlcarousel
                 /* ================================================== */
                 $("#slider-news").owlCarousel({
                    items            : 1, //10 items above 1000px browser width
                    itemsDesktop     : [1000, 4], //5 items between 1000px and 901px
                    itemsDesktopSmall: [900, 3], // betweem 900px and 601px
                    itemsTablet      : [600, 2], //2 items between 600 and 0
                    itemsMobile      : false, // itemsMobile disabled - inherit from itemsTablet option
                    navigation       : true,
                    navigationText   : [
                    "<i class='glyphicon'></i>",
                    "<i class='glyphicon'></i>"
                    ]
                });
             }

         },

         post_type_archive_portfolio  : {
            init: function () {
                /*
                 * ISOTOPE
                 */


                var $container = $('#list-isotope'); //The ID for the list with all the blog posts

                $container.isotope({ //Isotope options, 'item' matches the class in the PHP
                    itemSelector: '.grid-item',
                    percentPosition: true,
                    sortBy : '*',
                    masonry: {
                      // use outer width of grid-sizer for columnWidth
                      columnWidth: '.grid-sizer'
                    }
                });

                //Add the class selected to the item that is clicked, and remove from the others
                var $optionSets = $('#filters'),
                $optionLinks = $optionSets.find('button');

                $optionLinks.click(function () {
                    var $this = $(this);
                    // don't proceed if already selected
                    if ($this.hasClass('selected')) {
                        return false;
                    }
                    var $optionSet = $this.parents('#filters');
                    $optionSets.find('.selected').removeClass('selected');
                    $this.addClass('selected');

                    //When an item is clicked, sort the items.
                    var selector = $(this).attr('data-filter');
                    $container.isotope({ filter: selector });

                    return false;
                });
            }
        },
        // About us page, note the change from about-us to about_us.
        about_us: {
            init: function ()
            {
                // JavaScript to be fired on the about us page
            }
        }
    };
// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
    fire      : function (func, funcname, args)
    {
        var namespace = Roots;
        funcname = (funcname === undefined) ? 'init' : funcname;
        if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function')
        {
            namespace[func][funcname](args);
        }
    },
    loadEvents: function ()
    {
        UTIL.fire('common');
        $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm)
        {
            UTIL.fire(classnm);
        });
    }
};
$(document).ready(UTIL.loadEvents);
})(jQuery); // Fully reference jQuery after this point.
