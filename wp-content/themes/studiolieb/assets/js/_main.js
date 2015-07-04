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
                
                $('.section-featured-text').css({
                    'height': $('.section-featured-img').height()
                });

                var body = $("body"),
                    _window = $(window),
                    main_nav = $("#menu-primary-navigation"),
                    nav_bar = $(".navbar"),
                    navbar_fixed_top = $(".navbar-fixed-top");

                
                
              
               
                /*  ==================================================
                 # Initialize all the reloadable JavaScript
                 ================================================== */
                /*if (!Modernizr.touch)
                {
                    



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
                }*/
            }
        },
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
                        "<i class='ci-right-big-arrow'></i>",
                        "<i class='ci-left-big-arrow'></i>"
                    ]
                });

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
        'post_type_archive_portfolio': {
            init: function () {
                /*
                 * ISOTOPE
                 */

                var $container = $('#list-isotope'); //The ID for the list with all the blog posts
                $container.isotope({ //Isotope options, 'item' matches the class in the PHP
                    itemSelector: '.item',
                    layoutMode: 'masonry'
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
