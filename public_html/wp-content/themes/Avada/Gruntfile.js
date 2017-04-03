var shell = require('shelljs');

module.exports = function(grunt) {
	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON("package.json"),
		po2mo: {
			options: {
			},
			files: {
				src: 'languages/*.po',
				expand: true,
			},
		},
		less: {
			development: {
				files: {
					'style.css': 'less/style.less',
					'shortcodes.css': 'less/shortcodes.less'
				}
			}
		},
		watch: {
			css: {
				files: ['**/*.less'],
				tasks: ['less:development']
			}
		},
	});

	grunt.loadNpmTasks("grunt-contrib-less");
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-po2mo');

	grunt.registerTask('watchCSS', ['watch:css']);
	grunt.registerTask("default", ["less:development"]);

	grunt.registerTask('langUpdate', "Update languages", function() {
		shell.exec('tx pull -r avada.avadapo -a --minimum-perc=10');
		shell.exec('grunt po2mo');
	});
};