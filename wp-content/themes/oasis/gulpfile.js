var gulp = require('gulp');
var connect = require('gulp-connect');
var sass = require('gulp-sass');

gulp.task('connect', ()=> {
	connect.server({
		livereload : true,
		fallback   : "index.html",
		port       : 8000
	})
});

gulp.task('sass', ()=> {
	gulp.src('sass/**/*.scss')
	.pipe(sass().on('error', sass.logError))
	.pipe(gulp.dest('./'))
	.pipe(connect.reload());
});

/*gulp.task('html', ()=> {
	gulp.src('templates/*.html')
	.pipe(connect.reload());
});*/

gulp.task('watch', ()=> {
	// gulp.watch('angular/**/*.ts', ['ts']);
	gulp.watch('sass/**/*.scss', ['sass']);
	// gulp.watch('templates/*.html', ['html']);
});

gulp.task('default',[/*'ts',*/ 'sass', 'connect', /*'html',*/ 'watch']);