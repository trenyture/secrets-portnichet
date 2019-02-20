const gulp = require('gulp');
const notify = require("gulp-notify");
const gulpUtil = require('gulp-util');
const clean = require('gulp-dest-clean');
/* CSS */
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const concatCSS = require('gulp-concat-css');
const cleanCSS = require('gulp-clean-css');
/* JS */
const jshint = require('gulp-jshint');
const uglify = require('gulp-uglify');
const concatJS = require('gulp-concat');
/* IMAGES */
const image = require('gulp-image');
/* SERVER */
const refresh = require('gulp-livereload');
const lr = require('tiny-lr');
const server = lr();
const browserSync = require('browser-sync').create();
/*CONFIG*/
const devFolder = "./dev/";
const assetFolder = "./assets/";
const proxyServer = 'pornichet.local';

///////////////////////////////////////////
//			ACTIONS ON FONTS			//
/////////////////////////////////////////

/*
 * Clean the public folder of the fonts
 */
gulp.task('cleanFonts', function () {
	return gulp
			.src(devFolder + 'fonts/**', {read: false})
			.pipe(clean(assetFolder + 'fonts'));
});

/*
 * Compile Fonts from ressources to public
 */
gulp.task('fonts', gulp.series('cleanFonts', function fonts() {
	gulp.src(devFolder + 'fonts/**')
		.pipe(gulp.dest(assetFolder + 'fonts'))
		.pipe(notify({
			title: "Fonts Compiled",
			message: "Compiled file: <%= file.relative %> \n\r <%= options.date %>!",
			templateOptions: {
				date: new Date()
			}
		}))
		.pipe(browserSync.stream());
}));

///////////////////////////////////////////
//			ACTIONS ON IMAGES			//
/////////////////////////////////////////

/*
 * Clean the public folder of images
 */
gulp.task('cleanImages', function () {
	return gulp
			.src(devFolder + 'images/**', {read: false})
			.pipe(clean(assetFolder + 'images'));
});

/*
 * Compile Images from ressources to public
 */
gulp.task('images', gulp.series('cleanImages', function images() {
	gulp.src(devFolder + 'images/**')
		.pipe(image())
		.pipe(gulp.dest(assetFolder + 'images'))
		.pipe(notify({
			title: "Images Compiled",
			message: "Compiled file: <%= file.relative %> \n\r <%= options.date %>!",
			templateOptions: {
				date: new Date()
			}
		}))
		.pipe(browserSync.stream());
}));

///////////////////////////////////////////
//			ACTIONS ON STYLES			//
/////////////////////////////////////////

/*
 * Clean the public folder of styles
 */
gulp.task('cleanStyles', function () {
	return gulp
			.src(devFolder + 'sass/**', {read: false})
			.pipe(clean(assetFolder + 'styles'));
});

/*
 * minify and check syntax of all the styles (not vendors)
 */
gulp.task('styles', gulp.series('cleanStyles', function styles() {
	return gulp.src(devFolder + 'sass/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({
			outputStyle: 'compressed'
		}).on('error', sass.logError))
		.pipe(autoprefixer({
			browsers: ['last 10 versions', 'ie >= 10'],
			cascade: true
		}))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(assetFolder + 'styles'))
		.pipe(notify({
			title: "SCSS Compiled",
			message: "Compiled file: <%= file.relative %> \n\r <%= options.date %>!",
			templateOptions: {
				date: new Date()
			}
		}))
		.pipe(browserSync.stream());
}));

///////////////////////////////////////////
//			ACTIONS ON SCRIPTS			//
/////////////////////////////////////////

/*
 * Clean the public folder of scripts
 */
gulp.task('cleanScripts', function () {
	return gulp
			.src(devFolder + 'js/**', {read: false})
			.pipe(clean(assetFolder + 'scripts'));
});

/*
 * minify and check syntax of all the scripts (not vendors)
 */
gulp.task('scripts', gulp.series('cleanScripts', function scripts() {
	return gulp.src(devFolder + 'js/**/*.js')
		.pipe(jshint().on('error', gulpUtil.log))
		.pipe(jshint.reporter('default'))
		.pipe(uglify().on('error', gulpUtil.log))
		.pipe(gulp.dest(assetFolder + 'scripts'))
		.pipe(notify({
			title: "JS Compiled",
			message: "Compiled file: <%= file.relative %> \n\r <%= options.date %>!",
			templateOptions: {
				date: new Date()
			}
		}))
		.pipe(browserSync.stream());
}));

///////////////////////////////////////////
//			SERVE THE APPLET			//
/////////////////////////////////////////

/*
 * Make the passerell with the navigator (creating a web server)
 */
gulp.task('serve', function() {
	browserSync.init({
		proxy: proxyServer,
		host: proxyServer,
		open: 'external'
	});

	gulp.watch(devFolder + 'js/**', function(){
		gulp.run('scripts');
	});

	gulp.watch(devFolder + 'sass/**', function(){
		gulp.run('styles');
	});

	gulp.watch(devFolder + 'fonts/**', function(){
		gulp.run('fonts');
	});

	gulp.watch(devFolder + 'images/**', function(){
		gulp.run('images');
	});

	gulp.watch(devFolder + "**").on('change', browserSync.reload);
});

/*
 * Making the default command in gulp to create all the server
 */
gulp.task('default', gulp.series(gulp.parallel('scripts', 'styles', 'fonts', 'images', 'serve')));