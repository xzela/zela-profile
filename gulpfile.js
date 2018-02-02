const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const babel = require('gulp-babel');

gulp.task('minify-css', () => {
	return gulp.src('src/styles.css')
		.pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(gulp.dest('build'));
});

gulp.task('babel-js', () => {
	return gulp.src('src/**/*.js')
		.pipe(babel({ presets: ['es2015'] }))
		.pipe(gulp.dest('build'));
});

gulp.task('copy-html', () => {
	return gulp.src('src/index.html')
		.pipe(gulp.dest('build'));
});

gulp.task('copy-images', () => {
	return gulp.src('src/images/*')
		.pipe(gulp.dest('build/images'));
});

gulp.task('copy-files', () => {
	return gulp.src('src/files/*')
		.pipe(gulp.dest('build/files'));
});

gulp.task('default', ['minify-css', 'babel-js', 'copy-html', 'copy-images', 'copy-files']);
