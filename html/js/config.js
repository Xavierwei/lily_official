require.config({
	'paths': {
		// lib
		'jquery': 'lib/jquery-1.8.3.min',
		'skrollr' : 'lib/skrollr.min',
		'Handlebars': 'lib/handlebars',
		'jquery.address': 'lib/jquery-address'
	},
	shim: {
	    'Handlebars': {
	     	exports: 'Handlebars'
	    }
	 }
})

require([
	'require',
	'jquery',
	'skrollr',
	'Handlebars',
	'jquery.address'
], function(require, jquery, skrollr, Handlebars, jqueryAddress) {
	require(['common/app'], function(app) {
		app();
	})
})
