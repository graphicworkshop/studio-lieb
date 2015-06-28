/* A polyfill for browsers that don't support ligatures. */
/* The script tag referring to this file must be placed before the ending body tag. */

/* To provide support for elements dynamically added, this script adds
   method 'icomoonLiga' to the window object. You can pass element references to this method.
*/
(function () {
	'use strict';
	function supportsProperty(p) {
		var prefixes = ['Webkit', 'Moz', 'O', 'ms'],
			i,
			div = document.createElement('div'),
			ret = p in div.style;
		if (!ret) {
			p = p.charAt(0).toUpperCase() + p.substr(1);
			for (i = 0; i < prefixes.length; i += 1) {
				ret = prefixes[i] + p in div.style;
				if (ret) {
					break;
				}
			}
		}
		return ret;
	}
	var icons;
	if (!supportsProperty('fontFeatureSettings')) {
		icons = {
			'facebook': '&#xe601;',
			'googleplus': '&#xe602;',
			'left-big-arrow': '&#xe603;',
			'mail': '&#xe604;',
			'quote-left': '&#xe605;',
			'quote-right': '&#xe606;',
			'right-big-arrow': '&#xe607;',
			'round-arrow': '&#xe608;',
			'star': '&#xe609;',
			'thumb': '&#xe60a;',
			'twitter': '&#xe60b;',
			'user': '&#xe60c;',
			'youtube': '&#xe60d;',
			'clock': '&#xe60e;',
			'clock-outline': '&#xe60f;',
			'arrows-down': '&#xe610;',
			'arrow': '&#xe611;',
			'document': '&#xe612;',
			'arrows-right': '&#xe600;',
			'0': 0
		};
		delete icons['0'];
		window.icomoonLiga = function (els) {
			var classes,
				el,
				i,
				innerHTML,
				key;
			els = els || document.getElementsByTagName('*');
			if (!els.length) {
				els = [els];
			}
			for (i = 0; ; i += 1) {
				el = els[i];
				if (!el) {
					break;
				}
				classes = el.className;
				if (/ci-/.test(classes)) {
					innerHTML = el.innerHTML;
					if (innerHTML && innerHTML.length > 1) {
						for (key in icons) {
							if (icons.hasOwnProperty(key)) {
								innerHTML = innerHTML.replace(new RegExp(key, 'g'), icons[key]);
							}
						}
						el.innerHTML = innerHTML;
					}
				}
			}
		};
		window.icomoonLiga();
	}
}());