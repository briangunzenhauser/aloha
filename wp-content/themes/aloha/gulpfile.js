var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');

gulp.task('sass', function () {
  	return gulp.src('./app/scss/*.scss')
    	.pipe(sass().on('error', sass.logError))
    	.pipe(cleanCSS({debug: true}, (details) => {
	      console.log(`${details.name}: ${details.stats.originalSize}`);
	      console.log(`${details.name}: ${details.stats.minifiedSize}`);
	    }))
   		.pipe(gulp.dest('./dist/css/'));
});


gulp.task('watch', function () {
  gulp.watch('./app/**/*.scss', ['sass']);
});

gulp.task('default', function() {
  
});