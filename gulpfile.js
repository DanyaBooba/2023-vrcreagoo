var gulp = require('gulp');
var imagemin = require('gulp-imagemin'); // 7.0.0
var htmlmin = require('gulp-htmlmin');
var fileinclude = require('gulp-file-include');
var uglify = require('gulp-uglify');
var sync = require('browser-sync').create();
// var replace = require('gulp-replace');
// var webpHtmlNoSvg = require('gulp-webp-html-nosvg');
// var cssmin = require('gulp-cssmin');
// var csso = require('gulp-csso');
// var concatCss = require('gulp-concat-css');
// var autoprefixer = require('gulp-autoprefixer');
// var ttf2woff2 = require('gulp-ttf2woff2');
// var webp = require('gulp-webp');
// var concat = require('gulp-concat');

function html(done) {
    gulp.src('./src/html/**/*.html')
        .pipe(gulp.dest('./dist'));
    done();
}

function javascript(done) {

    done();
}

function php(done) {

    done();
}

function browser(done) {

    done();
}

gulp.task('default', gulp.series(
    gulp.parallel(
        html,
        javascript,
        php
    ),
    browser
)
);
