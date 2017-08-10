const gulp = require('gulp');
const watch = require('gulp-watch');
const browserSync = require('browser-sync');
const connect  = require('gulp-connect-php');


gulp.task('connect', function(callback) {
    connect.server({
        base: 'app',
        port: 8001
    }, callback);
});

gulp.task('watch', ['connect'], function() {
    browserSync({
        proxy: '127.0.0.1:8001',
        port: 8910
    });

    watch('./app/*.php', function() {
        browserSync.reload();
    });
    watch('./app/assets/styles/**/*.css', function() {
        gulp.start('cssInject');
    });
    watch('./app/assets/scripts/**/*.js', function() {
        gulp.start('scriptsRefresh');
    });
});

gulp.task('cssInject', ['styles'], function() {
    return gulp.src('./app/temp/styles/styles.css')
        .pipe(browserSync.stream());
});

gulp.task('scriptsRefresh', ['scripts'], function() {
    browserSync.reload();
});
