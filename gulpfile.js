const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');

function css(cb) {
	gulp.src('src/styles.css')
		.pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(gulp.dest('build'));
	return cb();
}

function js(cb) {
	gulp.src('src/index.js')
		.pipe(babel({ presets: ['@babel/preset-env'] }))
		.pipe(uglify())
		.pipe(gulp.dest('build'));
	return cb();
}

function move(cb) {
	// move index
	gulp.src('src/index.html')
		.pipe(gulp.dest('build'));
	// move images
	gulp.src('src/images/*')
		.pipe(gulp.dest('build/images'));
	// move files
	gulp.src('src/files/*')
		.pipe(gulp.dest('build/files'));
	return cb();
}

module.exports.default = gulp.series(css, js, move);
