/*
 *	DiamondSlider
 *
 *	Version: 1.0
 *	Copyright 2014 Grafixes
 *	http://grafixes.com
 */
(function (e)
{
    "use strict";
    e.diamondslider = function (t, n)
    {
        var r = e(t);
        var i = {};
        r.vars = e.extend({}, e.diamondslider.defaults, n);
        i = {init : function ()
        {
            r.find(".slides .shape").addClass("active");
            if (r.vars.sliding == true)
            {
                r.append('<ul class="diamond-dir-nav"><li class="diamond-prev-nav"><a href="#"></a></li><li class="diamond-next-nav"><a href="#"></a></li></ul>');
            }
            r.container = r.find(".slides");
            r.prevNav = r.find(".diamond-dir-nav .diamond-prev-nav");
            r.nextNav = r.find(".diamond-dir-nav .diamond-next-nav");
            r.filter = r.vars.filter;
            r.filterSelector = r.vars.filterSelector;
            r.container.wrap("<div class='diamond-viewport'></div>");
            r.setup();
            if (r.vars.sliding == true)
            {
                r.navigation();
            }
            e(window).bind("resize orientationchange", i.resize);
            if (r.filter == true)
            {
                e(r.filterSelector).on("click", "a", i.filter)
            }
        }, resize : function ()
        {
            r.reset();
            r.setup();
            r.navActivity()
        }, filter : function (t)
        {
            var n = e(this).attr("data-filter");
            e(r.filterSelector).find("ul .active").removeClass("active");
            e(this).closest("li").addClass("active");
            r.container.find("li").each(function ()
            {
                var t = e(this).attr("data-category").split(" ");
                if (n === "*")
                {
                    e(this).addClass("active");
                    e(this).fadeTo(300, 1)
                }
                else
                {
                    if (jQuery.inArray(n, t) !== -1)
                    {
                        e(this).fadeTo(300, 1);
                        e(this).addClass("active")
                    }
                    else
                    {
                        e(this).removeClass("active");
                        e(this).fadeTo(300, 0)
                    }
                }
            });
            setTimeout(i.resize, 500);
            t.preventDefault()
        }, destroy: function ()
        {
        }};
        r.setup = function ()
        {
            r.doMath();
            r.doCSS();
            var e = 0;
            var t = r.activeN;
            var n = r.rowOddN, i = r.rowEvenN;
            if (r.rowsN == 2 && t > r.rowEvenN && t - r.rowEvenN < r.rowEvenN)
            {
                var s = Math.ceil((r.rowEvenN - (t - r.rowEvenN)) / 2);
                n = t - r.rowEvenN + s;
                i = r.rowEvenN - s
            }
            var o = 0;
            r.slidingSlides = 0;
            while (true)
            {
                var u = (r.shapeW + r.gutter) / 2;
                var a = (r.shapeW + r.gutter) / 2;
                var f = 0;
                if (r.rowsN == 1)
                {
                    a = 0;
                }
                for (var l = 0; l < r.rowsN; l++)
                {
                    if (l % 2 == 0)
                    {
                        if (t < r.rowEvenN)
                        {
                            f = Math.floor((r.rowEvenN - t) / 2) * (r.shapeW + r.gutter);
                        }
                        else if (i < r.rowEvenN)
                        {
                            f = Math.floor((r.rowEvenN - i) / 2) * (r.shapeW + r.gutter);
                        }
                        for (var c = 0; c < i; c++)
                        {
                            r.active.eq(e).css({left: r.initOffset + (a + (r.shapeW + r.gutter) * c + f) + o, top: r.initOffset + u * l, display: "block"});
                            e++;
                            t--
                        }
                    }
                    else
                    {
                        if (t < r.rowOddN)
                        {
                            f = Math.floor((r.rowOddN - t) / 2) * (r.shapeW + r.gutter);
                        }
                        for (var d = 0; d < n; d++)
                        {
                            r.active.eq(e).css({left: r.initOffset + ((r.shapeW + r.gutter) * d + f) + o, top: r.initOffset + u * l, display: "block"});
                            e++;
                            t--
                        }
                    }
                }
                o += r.viewportW;
                r.slidingSlides++;
                if (r.vars.sliding === false || t <= 0)
                {
                    break
                }
            }
        };
        r.reset = function ()
        {
            r.container.css({transform: "translate3d(0,0,0)", "-webkit-transform": "translate3d(0,0,0)"});
            r.navActivity()
        };
        r.doCSS = function ()
        {
            r.find(".diamond-viewport").css({width: r.viewportW, "margin-left": (r.w - r.viewportW) / 2});
            r.container.animate({height: r.h, width: r.slidingSlides * r.viewportW}, 400)
        };
        r.doMath = function ()
        {
            r.offset = 0;
            r.active = r.container.find(".active");
            r.w = r.width();
            r.initOffset = r.find(".shape").width() * .2;
            r.shapeW = r.find(".shape").width() * 1.4;
            r.gutter = r.vars.gutterWidth;
            r.itemN = r.find(".shape").length;
            r.activeN = r.active.length;
            r.rowsN = r.vars.rows;
            r.rowEvenN = Math.floor((r.w - r.shapeW) / (r.shapeW + r.gutter));
            r.rowOddN = Math.floor((r.w + r.gutter) / (r.shapeW + r.gutter));
            if (e(window).width() <= 2 * (r.shapeW + r.gutter) && r.vars.sliding == true)
            {
                r.rowEvenN = r.rowOddN = 1;
            }
            r.viewportW = r.rowOddN * r.shapeW + (r.rowOddN - 1) * r.gutter;
            if (r.rowsN === "auto")
            {
                var t = r.activeN;
                var n = 0;
                while (true)
                {
                    if (t <= 0)
                    {
                        break;
                    }
                    if (n % 2 == 0)
                    {
                        t -= r.rowEvenN;
                    }
                    else
                    {
                        t -= r.rowOddN;
                    }
                    n++
                }
                r.rowsN = n
            }
            if (e(window).width() <= 2 * (r.shapeW + r.gutter) && r.vars.sliding == true)
            {
                r.rowsN = 1;
            }
            if (r.rowsN == 1)
            {
                r.viewportW = r.rowEvenN * r.shapeW + (r.rowEvenN - 1) * r.gutter;
            }
            if ((r.rowsN - 1) % 2 == 0)
            {
                var n2 = r.rowsN / 2 + .5;
                if (r.rowsN == 1)
                {
                    n2 = 1;
                }
                r.h = n2 * (r.shapeW + r.gutter) - 12
            }
            else
            {
                var n3 = (r.rowsN - 1) / 2 + 1;
                r.h = n3 * (r.shapeW + r.gutter) - 12
            }
        };
        r.navActivity = function ()
        {
            if (r.offset == 0)
            {
                r.prevNav.addClass("inactive");
            }
            else
            {
                r.prevNav.removeClass("inactive");
            }
            if (r.offset + r.viewportW == r.slidingSlides * r.viewportW)
            {
                r.nextNav.addClass("inactive");
            }
            else
            {
                r.nextNav.removeClass("inactive")
            }
        };
        r.doNav = function (e)
        {
            var t = function ()
            {
                if (e === "prev")
                {
                    if (r.offset != 0)
                    {
                        r.offset -= r.viewportW;
                    }
                    else
                    {
                        r.offset -= 0;
                    }
                    r.navActivity()
                }
                else if (e === "next")
                {
                    if (r.offset + r.viewportW != r.slidingSlides * r.viewportW)
                    {
                        r.offset += r.viewportW;
                    }
                    else
                    {
                        r.offset += 0;
                    }
                    r.navActivity()
                }
                return r.offset * -1 + "px"
            };
            var n = t();
            var i = function ()
            {
                r.container.css({"-webkit-transform": "translate3d(" + n + ", 0px, 0px)", "-moz-transform": "translate3d(" + n + ", 0px, 0px)", "-o-transform": "translate3d(" + n + ", 0px, 0px)", "-ms-transform": "translate3d(" + n + ", 0px, 0px)", transform: "translate3d(" + n + ", 0px,0px)"})
            };
            var s = function ()
            {
                r.container.stop(true, true).animate({left: n}, 1e3, "easeInOutExpo")
            };
            if (Modernizr.csstransforms3d)
            {
                i();
            }
            else
            {
                s()
            }
        };
        r.navigation = function ()
        {
            r.navActivity();
            r.prevNav.on("click", "a", function (e)
            {
                r.doNav("prev");
                e.preventDefault()
            });
            r.nextNav.on("click", "a", function (e)
            {
                r.doNav("next");
                e.preventDefault()
            });
            r.swipe({swipeLeft: function ()
            {
                r.doNav("next")
            }, swipeRight     : function ()
            {
                r.doNav("prev")
            }, threshold      : 0})
        };
        i.init()
    };
    e.diamondslider.defaults = {rows: "auto", gutterWidth: 12, sliding: false, filter: false, filterSelector: "#diamond-filter"};
    e.fn.diamondslider = function (t)
    {
        if (t === undefined)
        {
            t = {};
        }
        if (typeof t === "object")
        {
            return this.each(function ()
            {
                new e.diamondslider(this, t)
            })
        }
        return false;
    };
})(jQuery);