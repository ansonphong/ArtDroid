var _contains = function( needle, haystack ){
	return ( haystack.indexOf(needle) > -1 );
}
/**
 * @todo impliment grunt compress
 */
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
				destDir + '/**/.ds_store',
				destDir + '/**/.git',
				destDir + '/**/.gitignore',
				destDir + '/**/.gitmodules',
				destDir + '/**/.gitattributes',
				destDir + '/**/makefile',
				destDir + '/**/composer.json',
				destDir + '/**/Gruntfile.js',
				destDir + '/**/package.json',
				destDir + '/**/bower.json',
				destDir + '/**/conf.json',
				destDir + '/**/.editorconfig',
				destDir + '/**/.scrutinizer.yml',
				destDir + '/**/.travis.yml',
				destDir + '/**/.npmignore',
				destDir + '/**/.bin',
				destDir + '/**/.jshintrc',
				destDir + '/**/.eslintrc',
				destDir + '/**/.zuul.yml',
				destDir + '/**/.eslintrc',
				destDir + '/**/.istanbul.yml',
				destDir + '/**/.php_cs',
				destDir + '/**/.bowerrc',
				destDir + '/**/.documentup.json',
				destDir + '/**/.hidden',
				destDir + '/**/.hidden.txt',
				destDir + '/**/.bower.json',
				destDir + '/**/.tern-project',
				destDir + '/**/.target.mk',
				destDir + '/**/.deps',
				destDir + '/**/.node.d',
				destDir + '/**/.node',
				destDir + '/**/.dntrc',
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

		// make a zipfile
		/**
		 * Not functional, @todo test and make it work.
		 */
		compress: {
			main: {
				options: {
					archive: 'artdroid.zip'
				},
				files: [
					{	// includes files in path and its subdirs
						src: [ destDir ],
						dest: destDir+'../'
					}, 
				]
			}
		},

	});

	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.registerTask( 'default', ['copy', 'clean','cleanupTheme'] );
	grunt.registerMultiTask('cleanupTheme', 'Cleans up the theme.', function() {
		grunt.log.writeln('ARTDROID : Finished Cleanup');
	});

	grunt.loadNpmTasks('grunt-contrib-compress');

};