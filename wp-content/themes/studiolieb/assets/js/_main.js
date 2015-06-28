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
                var body = $("body"),
                    _window = $(window),
                    main_nav = $("#menu-primary-navigation, #carousel-link"),
                    nav_bar = $(".navbar"),
                    navbar_fixed_top = $(".navbar-fixed-top");
                /*	==================================================
                 # One Page Navigation
                 ================================================== */
                // adds scrollTo functionality
                main_nav.onePageNav({
                    changeHash     : true,
                    easing         : "easeInOutExpo",
                    scrollSpeed    : 800,
                    scrollOffset   : 60,
                    scrollThreshold: 0.5
                });
                _window.scroll(function ()
                {
                    if (nav_bar.offset().top < 780)
                    {
                        navbar_fixed_top.hide();
                    }
                    else if (nav_bar.offset().top > 780)
                    {
                        navbar_fixed_top.show();
                        if (nav_bar.offset().top > 850)
                        {
                            navbar_fixed_top.addClass("top-nav-collapse");
                        }
                        else
                        {
                            navbar_fixed_top.removeClass("top-nav-collapse");
                        }
                    }
                });
                // Closes the Responsive Menu on Menu Item Click
                $('.navbar-collapse ul li a').click(function ()
                {
                    $('.navbar-toggle:visible').click();
                });
                /*	==================================================
                 # Focus state for append/prepend inputs
                 ================================================== */
                $('.input-group').on('focus', '.form-control',function ()
                {
                    $(this).closest('.input-group, .form-group').addClass('focus');
                }).on('blur', '.form-control', function ()
                    {
                        $(this).closest('.input-group, .form-group').removeClass('focus');
                    });
                /*	==================================================
                 # Round Shape
                 # Set image as background
                 ================================================== */
                $('.round-shape').each(function ()
                {
                    var background_url = $(this).children('img').attr('src');
                    $(this).css('background-image', 'url(' + background_url + ')');
                });
                /*	==================================================
                 # DiamondSlider
                 # Inspired by @grafixes
                 ================================================== */
                $("#diamondslider-team").diamondslider({
                    rows       : 2,
                    gutterWidth: 12,
                    sliding    : true,
                    filter     : false
                });
                // Hovers diamondslider item
                $(".diamondslider .slides > li").hover(
                    function ()
                    {
                        var itemhover = $(this).find(".item-hover");
                        if (!itemhover.hasClass("show"))
                        {
                            itemhover.stop().show();
                            itemhover.find(".hover-title").stop().animate({ "margin-top": "37.3134%" }, 300, "easeInOutCirc");
                        }
                    },
                    function ()
                    {
                        var itemhover = $(this).find(".item-hover");
                        if (!itemhover.hasClass("show"))
                        {
                            itemhover.find(".hover-title").stop().animate({ "margin-top": "-30%" }, 300, "easeInOutCirc");
                            itemhover.stop().hide();
                        }
                    }
                );
                /*	==================================================
                 # Easy pie chart
                 # http://github.com/rendro/easy-pie-chart/
                 /* ================================================== */
                var showChart = function ()
                {
                    $(".chart").easyPieChart({
                        easing    : "easeInOut",
                        barColor  : "#ffffff",
                        trackColor: "#d82c2e",
                        scaleColor: false,
                        lineWidth : 4,
                        size      : 152
                    });
                };
                /*	==================================================
                 # Thumnail Grid with expanding preview
                 /* ================================================== */
                $(function ()
                {
                    Grid.init();
                });
                /*	==================================================
                 # Owlcarousel
                 /* ================================================== */
                $("#sellers").owlCarousel({
                    items            : 4, //10 items above 1000px browser width
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
                /*	==================================================
                 # Custom Form
                 /* ================================================== */
                $('select').selectpicker();
                /*	==================================================
                 # Initialize all the reloadable JavaScript
                 ================================================== */
                if (!Modernizr.touch)
                {
                    $(".animated").appear();
                    _window.trigger("scroll");
                    $(document.body).on("appear", ".animated", function ()
                    {
                        showChart();
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
            }
        },
        // Home page
        home    : {
            init: function ()
            {
                // JavaScript to be fired on the home page
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
