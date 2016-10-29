/**
 * @file
 * Defines grunt tasks to be run by Grunt task runner.
 */

/* eslint-env node */

module.exports = function (grunt) {
  'use strict';
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // Compile SASS files into minified CSS.
    sass: {
      options: {},
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'css/style.css': 'sass/style.scss'
        }
      }
    },

    // Watch these files and notify of changes.
    watch: {
      grunt: {files: ['gruntfile.js']},

      sass: {
        files: [
          'sass/**/*.scss'
        ],
        tasks: ['sass']
      }
    },

    browserSync: {
      dev: {
        bsFiles: {
          src: [
            'css/*.css'
          ]
        },
        options: {
          watchTask: true,
          proxy: "yoursite.dev"
        }
      }
    }

  });

  // Load externally defined tasks. //
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-browser-sync');

  // Establish tasks we can run from the terminal. //
  grunt.registerTask('init', ['sass']);
  grunt.registerTask('default', ['watch']);
  grunt.registerTask('browsersync', ['browserSync', 'watch']);

};
