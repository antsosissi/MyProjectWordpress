/*Reference : https://www.pixemweb.com/blog/gulp-4-0-0-with-nodejs-imagemin-browsersync-sass-sourcemaps-cleancss-more/ */

// You can declare multiple variables with one statement by starting with var and seperate the variables with a comma and span multiple lines.
// Below are all the Gulp Plugins we're using.
const gulp          = require('gulp'),
      autoprefixer  = require('gulp-autoprefixer'),
      browserSync   = require('browser-sync').create(),
      reload        = browserSync.reload,
      sass          = require('gulp-sass'),
      concat        = require('gulp-concat'),
      imagemin      = require( 'gulp-imagemin' ),
      changed       = require( 'gulp-changed' ),
      lineec        = require( 'gulp-line-ending-corrector' ),
      sourcemaps    = require('gulp-sourcemaps'),
      jshint        = require( 'gulp-jshint' ),
      uglify        = require('gulp-uglify-es').default;

const root          = './',
      scss          = root + 'src/scss/',
      js            = root + 'src/js/',
      jsDist        = root + 'assets/js/';

const phpWatchFiles   = root + '**/*.php',
      styleWatchFiles = scss + '**/*.scss';

const jsSrc = [
  js + "lib/jquery.js",
  js + "lib/jquery-ui.min.js",
  js + "lib/jquery.mCustomScrollbar.concat.min.js",
  js + "lib/popper.min.js",
  js + "lib/bootstrap.min.js",
  js + "lib/owl.carousel.min.js",
  js + "lib/jquery.matchHeight.js",
  js + "lib/easing.min.js",
  js + "lib/scrolloverflow.min.js",
  js + "lib/jquery.custom-select.js",
//  js + "lib/svg4everybody.min.js",
  js + "lib/fullpage.min.js",
  js + "lib/jquery.fancybox.js",
  js + "lib/jquery.responsiveTabs.min.js",
  js + "tabs-accordion.js",
  js + "lib/bootstrap-tabcollapse.js",
  js + "lib/gsap.min.js",
  js + "lib/DrawSVGPlugin3.min.js",
  js + "script.js",
  js + "photo-gallery.js",
  js + "form-script.js",

  js + "prehome.js",
  js + "fallingLeaves.js",
  js + "dev/projet-favoris.js",
  js + "dev/projet-filter.js",
  js + "dev/contact.js",
];


var imgSRC = root + 'src/images/**/*',
    imgDEST = root + 'assets/images/';

var fontsSRC = root + 'src/fonts/**/*',
    fontsDEST = root + 'assets/fonts';
	
//var svgSRC = root + 'src/svg/**/*',
//    svgDEST = root + 'assets/';

function imgmin() {
  return gulp.src(imgSRC)
  .pipe(changed(imgDEST))
      .pipe( imagemin([
        imagemin.gifsicle({interlaced: true}),
        imagemin.jpegtran({progressive: true}),
        imagemin.optipng({optimizationLevel: 5})
      ]))
      .pipe( gulp.dest(imgDEST));
}

function css() {
  return gulp.src(scss + 'main.scss', { sourcemaps: true })
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(autoprefixer('last 2 versions'))
    .pipe(lineec())
    .pipe(gulp.dest('assets/css', { sourcemaps: '.' }));
}

function criticalCss() {
  return gulp.src(scss + 'critical.scss', { sourcemaps: true })
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(autoprefixer('last 2 versions'))
    .pipe(lineec())
    .pipe(gulp.dest('assets/css', { sourcemaps: '.' }));
}

function fonts() {
  return gulp.src(fontsSRC)
    .pipe(gulp.dest(fontsDEST));
}

function javascript() {
  return gulp.src(jsSrc)
    .pipe(concat('app.min.js'))    
    .pipe(sourcemaps.init())
    .pipe(jshint())    
    // .pipe( jshint.reporter( "jshint-stylish" ) )
    .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(jsDist));
}

function watch() {
    browserSync.init({
      open: 'external',
      proxy: 'http://localhost/projets/bondy/srcs/',
    });
    gulp.watch(styleWatchFiles, css);
    gulp.watch(imgSRC, imgmin);
    gulp.watch(jsSrc, javascript);
    gulp.watch([phpWatchFiles, jsDist + 'devwp.js', root + '/assets/css/main.css']).on('change', reload);
}

exports.css = css;
exports.criticalCss = criticalCss;
exports.javascript = javascript;
exports.watch = watch;
exports.imgmin = imgmin;
exports.fonts = fonts;

const build = gulp.series(css, criticalCss , javascript, imgmin, fonts);
gulp.task('build', build);