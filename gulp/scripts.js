var gulp = require('gulp'),
webpack = require('webpack');

gulp.task('scripts', function() {
    webpack(require('../webpack.config.js'), function(e, stats) {
        if (e) {
            console.log(e.toString());
        }

        console.log(stats.toString());
        console.log("Webpack completed!");
    });
});