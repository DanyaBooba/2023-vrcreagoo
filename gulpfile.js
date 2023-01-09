var gulp = require('gulp');
var imagemin = require('gulp-imagemin'); // 7.0.0
var htmlmin = require('gulp-htmlmin');
var fileinclude = require('gulp-file-include');
var uglify = require('gulp-uglify');
var sync = require('browser-sync').create();
var cssmin = require('gulp-cssmin');
var concatCss = require('gulp-concat-css');
var autoprefixer = require('gulp-autoprefixer');
// var replace = require('gulp-replace');
// var webpHtmlNoSvg = require('gulp-webp-html-nosvg');
// var csso = require('gulp-csso');
// var ttf2woff2 = require('gulp-ttf2woff2');
// var webp = require('gulp-webp');
// var concat = require('gulp-concat');

function html(done) {
    gulp.src('./src/html/**/*.html')
        .pipe(gulp.dest('./dist'));
    done();
}

function javascript(done) {
    gulp.src('./src/js/**/*.js')
        .pipe(gulp.dest('./dist/js'));

    done();
}

function php(done) {
    gulp.src('./src/php/**/*.php')
        .pipe(gulp.dest('./dist/php'));

    done();
}

function css(done) {
    gulp.src('./src/css/**/*.css')
        .pipe(gulp.dest('./dist/css'));

    done();
}

function browser(done) {
    sync.init({
        server: './dist'
    });

    gulp.watch('./src/**/*.html', html).on('change', sync.reload);
    gulp.watch('./src/**/*.js', javascript).on('change', sync.reload);
    gulp.watch('./src/**/*.php', php).on('change', sync.reload);
    gulp.watch('./src/**/*.css', css).on('change', sync.reload);

    done();
}

function img(done) {
    gulp.src('./src/img/**/*')
        .pipe(gulp.dest('./dist/img'));

    done();
}

function assets(done) {
    gulp.src('./src/--i/**/*')
        .pipe(gulp.dest('./dist/i'));

    done();
}

function test(done) {
    gulp.src('./src/__/html/**/*.html')
        .pipe(gulp.dest('./dist'))
        .pipe(gulp.src('./src/__/php/**/*.php'))
        .pipe(gulp.dest('./dist/php'))
        .pipe(gulp.src('./src/__/js/**/*.js'))
        .pipe(gulp.dest('./dist/js'));

    done();
}

gulp.task('default', gulp.series(
    gulp.parallel(
        html,
        javascript,
        php,
        css,
        img,
        assets
    ),
    browser
));

gulp.task('build', gulp.parallel(
        html,
        javascript,
        php,
        css,
        img,
        assets
));

gulp.task('test', gulp.parallel(
        html,
        javascript,
        php,
        css,
        img,
        assets,
        test
));
