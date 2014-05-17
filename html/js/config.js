require.config({
	'baseUrl': 'js/',
	'paths': {
		// lib
		'jquery': 'lib/jquery-1.8.3.min',
		'jquery.address': 'lib/jquery-address',

		// common
		'helper': 'common/helper',
		'html': 'common/html',

		// partial
		'app': 'common/app'
	},
	'shim': {
		'jquery.address': {
			'deps': ['jquery']
		}
	}
})

require(['require', 'app'], function(require, app) {
	app();
})
