var _contains = function( needle, haystack ){
	return ( haystack.indexOf(needle) > -1 );
}

module.exports = function(grunt) {
	var destDir = '../../../../artdroid/';

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		buildTheme: {},
		copy: {
			main: {
				src: './**',
				dest: destDir,
				flatten: false,
				filter: 'isFile',
				options: {
					/*
					process: function (content, srcpath) {
						if( _contains( 'page', srcpath ) )
							return '';
						else
							return content;
					},
					*/
				},
			},
		},
		cleanupTheme:{
			theme:[]
		},
		clean:{
			options:{
				force: true,
			},
			theme:[
				destDir + 'node_modules',
				destDir + '/**/*.md',
				destDir + '/**/*.psd',
				destDir + '/**/docs/',
				destDir + '/**/.DS_Store',
				destDir + '/**/.git',
				destDir + '/**/Gruntfile.js',
				destDir + '/**/package.json',
				destDir + '/**/bower.json',
				destDir + '/**/conf.json',
			],
			postworld:[
				destDir + 'postworld/_archive',
				destDir + 'postworld/dev',
				destDir + 'postworld/docs',
				destDir + 'postworld/log',
				destDir + 'postworld/node_modules',
				destDir + 'postworld/**/angular-scenario.js',
				destDir + 'postworld/**/tests/',
				destDir + 'postworld/**/pwSiteGlobals.js',
				destDir + 'postworld/**/pwAdminGlobals.js',
			]
		},
	});

	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.registerTask( 'default', ['copy', 'clean','cleanupTheme'] );

	grunt.registerMultiTask('cleanupTheme', 'Cleans up the theme.', function() {
		grunt.log.writeln('ARTDROID : Finished Cleanup');
	});


};
