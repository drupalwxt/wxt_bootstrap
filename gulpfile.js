/**
 * @file
 *
 * Defines gulp tasks to be run by Gulp task runner.
 */
'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));

var sassSrcDir = 'sass';
var sassDestDir = 'css';

function scss() {
  return gulp.src(sassSrcDir + '/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest(sassDestDir))
}

exports.default = scss;
exports.scss = scss;
