var gulp         = require( 'gulp' );
var gutil        = require( 'gulp-util' );
var concat       = require( 'gulp-concat' );
//var notify       = require( 'gulp-notify' );
var sass         = require( 'gulp-sass' );
var scopeCss     = require( 'gulp-scope-css' );
var autoprefixer = require( 'gulp-autoprefixer' );
var minifyCSS    = require( 'gulp-minify-css' );
var uglify       = require( 'gulp-uglify' );
var plumber      = require('gulp-plumber');
var rename       = require("gulp-rename");
var bower        = require('gulp-bower');

var dir_bower    = './bower_components/',
    dir_assets = './assets/',
    dir_vendor = dir_assets + 'vendor/',
    dir_sass   = dir_assets + 'sass/',
    dir_css    = dir_assets + 'css/',
    dir_js     = dir_assets + 'js/';


/*
* Vendors Copy
* */
gulp.task( 'vendors-copy', function()
{
	// bootstrap
	gulp.src( dir_bower + 'bootstrap-sass-official/assets/**/' )
		.pipe( gulp.dest( dir_vendor + 'bootstrap' ) );

	// mini colors
	gulp.src( dir_bower + 'jquery-minicolors/**/' )
		.pipe( gulp.dest( dir_vendor + 'jquery-minicolors' ) );

	// touchspin
	gulp.src( dir_bower + 'bootstrap-touchspin/dist/**/' )
		.pipe( gulp.dest( dir_vendor + 'touchspin' ) );

	// hifont
	gulp.src( dir_vendor + 'hi-font-back/fonts/**/' )
		.pipe( gulp.dest( dir_css + 'font-backend/fonts' ) );

	gulp.src( dir_vendor + 'hi-font-front/fonts/**/' )
		.pipe( gulp.dest( dir_css + 'font-frontend/fonts' ) );

	// x-editable
	gulp.src( dir_bower + 'x-editable/dist/bootstrap3-editable/**/' )
		.pipe( gulp.dest( dir_vendor + 'x-editable' ) );

	// x-editable
	gulp.src( dir_bower + 'x-editable/dist/bootstrap3-editable/img/**/' )
		.pipe( gulp.dest( dir_css + 'x-editable/img/' ) );

	// Clamp.js
	gulp.src( dir_bower + 'Clamp.js/clamp.js' )
		.pipe( gulp.dest( dir_vendor + 'clamp' ) );

	// pretty photo
	gulp.src( dir_vendor + 'pretty-photo/css/prettyPhoto.css' )
		.pipe( minifyCSS( ) )
		.pipe( gulp.dest( dir_css + 'pretty-photo/css/' )
	);

	gulp.src( dir_vendor + 'pretty-photo/images/prettyPhoto/**/' )
		.pipe( gulp.dest( dir_css + 'pretty-photo/images/prettyPhoto/' )
	);

	// sortable
	gulp.src( dir_bower + 'jquery-sortable/source/js/jquery-sortable-min.js' )
		.pipe( gulp.dest( dir_vendor + 'jquery-sortable' ) );

	//gulp.src('').pipe( notify( 'Vendor copy complete...' ) );
} );

/* JS */
/* BACKEND */
// vendors
gulp.task( 'backend-vendors-js', function()
{
	gulp.src( [
		dir_vendor + 'store.js/store.js',
		dir_vendor + 'jquery-minicolors/jquery.minicolors.js',
		dir_vendor + 'replaceall/replaceall.js',
		dir_vendor + 'clamp/clamp.js',
		dir_vendor + 'pretty-photo/js/jquery.prettyPhoto.js',
		dir_vendor + 'jquery-sortable/jquery-sortable-min.js',

		//	dir_vendor + 'bootstrap/javascripts/bootstrap/affix.js',
		//	dir_vendor + 'bootstrap/javascripts/bootstrap/alert.js',
		dir_vendor + 'bootstrap/javascripts/bootstrap/button.js',
		//	dir_vendor + 'bootstrap/javascripts/bootstrap/crousel.js',
		dir_vendor + 'bootstrap/javascripts/bootstrap/collapse.js',
		//	dir_vendor + 'bootstrap/javascripts/bootstrap/dropdown.js',
		dir_vendor + 'bootstrap/javascripts/bootstrap/modal.js',
		dir_vendor + 'bootstrap/javascripts/bootstrap/tooltip.js',
		dir_vendor + 'bootstrap/javascripts/bootstrap/popover.js',
		//	dir_vendor + 'bootstrap/javascripts/bootstrap/scrollspy.js',
		dir_vendor + 'bootstrap/javascripts/bootstrap/tab.js',
		dir_vendor + 'bootstrap/javascripts/bootstrap/transition.js',
		/* 3rd */
		dir_vendor + 'touchspin/jquery.bootstrap-touchspin.js',
		dir_vendor + 'x-editable/js/bootstrap-editable.js',

	] )
		.pipe( uglify() )
		.pipe( concat( 'hi-backend.min.js' ) )
		//.pipe( notify( 'Create file: <%= file.relative %>!' ) )
		.pipe( gulp.dest( dir_js ) );
});

// builder
gulp.task( 'backend-builder-js', function()
{
	gulp.src( [
			dir_js + 'dev/hi-builder.js',
			dir_js + 'dev/hi-tinymce.js'
	] )
		//.pipe( uglify() )
		.pipe( concat( 'hi-builder.min.js' ) )
		//.pipe( notify( 'Create file: <%= file.relative %>!' ) )
		.pipe( gulp.dest( dir_js ) );
} );

gulp.task( 'backend-js', [ 'backend-vendors-js', 'backend-builder-js' ] );

/* FRONTEND */
gulp.task( 'frontend-js', function()
{
	gulp.src( [
		dir_vendor + 'clamp/clamp.js',
		dir_vendor + 'pretty-photo/js/jquery.prettyPhoto.js',
		dir_js     + 'dev/hi-frontend.js'
	] )
		.pipe( uglify() )
		.pipe( concat( 'hi-frontend.min.js' ) )
		//.pipe( notify( 'Create file: <%= file.relative %>!' ) )
		.pipe( gulp.dest( dir_js ) );
} );

gulp.task( 'all-js', [ 'backend-vendors-js', 'backend-builder-js', 'frontend-js' ] );



/*
* CSS
* */
// bootstrap
gulp.task( 'bootstrap-css', function()
{
	gulp.src( dir_sass + 'hi-bootstrap.scss' )
		.pipe( sass() )
		.pipe( autoprefixer( { browsers: ['last 2 versions'], cascade: true } ) )
		.pipe( scopeCss( '#HI' ) )
		.pipe( minifyCSS( ) )
		//.pipe( notify( 'Create file: <%= file.relative %>!' ) )
		.pipe( gulp.dest( dir_css ) );
} );

// backend
gulp.task( 'backend-css', function()
{
	gulp.src( dir_sass + 'hi-backend.scss' )
		.pipe( sass(  ) )
		.pipe( autoprefixer( { browsers: ['last 2 versions'] } ) )
		.pipe( minifyCSS( ) )
		//.pipe( notify( 'Create file: <%= file.relative %>!' ) )
		.pipe( gulp.dest( dir_css )
	);
} );

// frontend
gulp.task( 'frontend-css', function()
{
	gulp.src( dir_sass + 'hi-frontend.scss' )
		.pipe( sass(  ) )
		.pipe( autoprefixer( { browsers: ['last 2 versions'] } ) )
		.pipe( minifyCSS( ) )
		//.pipe( notify( 'Create file: <%= file.relative %>!' ) )
		.pipe( gulp.dest( dir_css )
	);
} );

// vendors css
gulp.task( 'vendors-css', function()
{
	gulp.src( dir_vendor + 'jquery-minicolors/jquery.minicolors.css' )
		.pipe( scopeCss( '#HI' ) )
		.pipe( minifyCSS( ) )
		.pipe( gulp.dest( dir_css + 'minicolors' ) );

	gulp.src( dir_vendor + 'jquery-minicolors/jquery.minicolors.png' )
		.pipe( gulp.dest( dir_css + 'minicolors' ) );

	gulp.src( dir_vendor + 'hi-font-back/style.css' )
		.pipe( minifyCSS( ) )
		.pipe( gulp.dest( dir_css + 'font-backend/' )
	);

	gulp.src( dir_vendor + 'hi-font-front/style.css' )
		.pipe( minifyCSS( ) )
		.pipe( gulp.dest( dir_css + 'font-frontend/' )
	);

	gulp.src( dir_vendor + 'x-editable/css/bootstrap-editable.css' )
		.pipe( scopeCss( '#HI' ) )
		.pipe( minifyCSS( ) )
		.pipe( gulp.dest( dir_css + 'x-editable/css/' )
	);

	//gulp.src( '' ).pipe( notify( 'Vendors CSS done.' ) )
} );

gulp.task( 'all-css', [	'vendors-css', 'frontend-css', 'backend-css', 'bootstrap-css' ] );


gulp.task( 'default', [
	'all-js',
	'all-css'
] );


gulp.task('watch', function () {
	gulp.watch( dir_assets + 'sass/hi-frontend.scss', [ 'frontend-css' ] );
	gulp.watch( dir_assets + 'sass/hi-backend.scss', [ 'backend-css' ] );
	gulp.watch( dir_assets + 'sass/bootstrap/**/*.scss', [ 'bootstrap-css' ] );
	gulp.watch( dir_assets + 'sass/interface/**/*.scss', [ 'backend-css' ] );

	gulp.watch( dir_js + 'dev/hi-builder.js', [ 'backend-builder-js' ] );
	gulp.watch( dir_js + 'dev/hi-frontend.js', [ 'frontend-js' ] );
});