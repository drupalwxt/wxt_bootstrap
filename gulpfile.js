/**
 * @file
 *
 * Defines gulp tasks to be run by Gulp task runner.
 */

/* eslint-env node */

var gulp = require('gulp');

// ========== CONFIG ==========

var sassSrcDir = 'sass';
var sassDestDir = 'css';

// Patterns that Sass should watch for reprocessing.
// Glob pattern documentation: https://github.com/isaacs/node-glob.
var sassWatchPatterns = [
  sassSrcDir + '/**.scss'
];

// Host:port that the backend server (Apache, Nginx..) is listening on.
var reloadBackend = 'localhost:8081';

// Port used for main web connection.
var reloadFrontendPort = 8080;

// Patterns that reload server should watch for changes.

// Note: Any stylesheet compiled by Sass shouldn't need to be watched here
// because they should be injected into the HTML automatically by the
// 'sass' task.
var reloadWatchPatterns = [
  '/**/*.@(png|jpe?g|gif|ico|svg|tiff)'
];

// ========== SASS ==========
var sass = require('gulp-sass');

gulp.task('sass', function () {
  'use strict';
  return gulp.src(sassSrcDir + '/*.scss')
    .pipe(sass(/*{outputStyle: 'compressed'}*/).on('error', sass.logError))
    .pipe(gulp.dest(sassDestDir))
    .pipe(browserSync.stream());
});

gulp.task('sass:watch', ['sass'], function () {
  'use strict';
  gulp.watch(sassWatchPatterns, ['sass']);
});

// ========== BROWSER-SYNC / RELOAD ==========

var browserSync = require('browser-sync');
var reload  = browserSync.reload;

gulp.task('browser-sync', function() {
    'use strict';
    browserSync({
        proxy: reloadBackend,
        port: reloadFrontendPort,
        open: true,
        notify: false
    });
});

// ========== MAIN WATCH ==========

gulp.task('watch', ['browser-sync', 'sass:watch'], function () {
    'use strict';
    gulp.watch(reloadWatchPatterns, reload);
});
