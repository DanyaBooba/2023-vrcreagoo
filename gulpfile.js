var gulp = require('gulp');
var imagemin = require('gulp-imagemin'); // 7.0.0
var htmlmin = require('gulp-htmlmin');
var uglify = require('gulp-uglify');

function pages(done) {
    gulp.src('./src/index.php')
        .pipe(gulp.dest('./dist'))
        .pipe(gulp.src('./src/more/**/*.php'))
        .pipe(gulp.dest('./dist/more'));
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
    gulp.src('./src/assets/css/**/*.css')
        .pipe(gulp.dest('./dist/assets/css'));

    done();
}

function img(done) {
    gulp.src('./src/assets/img/**/*')
        .pipe(gulp.dest('./dist/assets/img'));

    done();
}

function assets(done) {
    gulp.src('./src/assets/models/**/*')
        .pipe(gulp.dest('./dist/assets/models'));

    done();
}

function staticfolder(done) {
    gulp.src('./src/static/**/*')
        .pipe(gulp.dest('./dist/static'));

    done();
}

// function test(done) {
//     gulp.src('./src/__/html/**/*.html')
//         .pipe(gulp.dest('./dist'))
//         .pipe(gulp.src('./src/__/php/**/*.php'))
//         .pipe(gulp.dest('./dist/php'))
//         .pipe(gulp.src('./src/__/js/**/*.js'))
//         .pipe(gulp.dest('./dist/js'));

//     done();
// }

gulp.task('default', gulp.parallel(
    pages,
    javascript,
    php,
    css,
    img,
    staticfolder,
    assets
));

// gulp.task('test', gulp.parallel(
//         pages,
//         javascript,
//         php,
//         css,
//         img,
//         assets,
//         staticfolder,
//         test
// ));
