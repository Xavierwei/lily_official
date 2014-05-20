require.config({
	'paths': {
		// lib
		'jquery': 'lib/jquery-1.8.3.min',
		'skrollr' : 'lib/skrollr.min',
		'Handlebars': 'lib/handlebars',
		'jquery.address': 'lib/jquery-address',
		'imagesLoaded' : 'lib/imagesloaded.pkgd.min'
	},
	shim: {
	    'Handlebars': {
	     	exports: 'Handlebars'
	    },
	    'imagesLoaded' : {
	    	exports : 'imagesLoaded'
	    },
	    'jquery.queryloader': {
	    	deps : ['jquery', 'imagesLoaded']
	    }
	 }
})

require([
	'require',
	'jquery',
	'skrollr',
	'Handlebars',
	'imagesLoaded',
	'jquery.address'
], function(require, $, skrollr, Handlebars, imagesLoaded, jqueryAddress) {
	require(['common/app'], function(app) {
		app();
	})
})
