"use strict";

// import "isomorphic-fetch";

// Basic packages
let gulp = require("gulp");
let babel = require("gulp-babel");
let postcss = require("gulp-postcss");
let merge = require('merge-stream');
let autoprefixer = require("autoprefixer");

// Regular packages
let sass = require("gulp-sass");
let uglify = require("gulp-uglify");
let imagemin = require("gulp-imagemin");
let cleanCSS = require("gulp-clean-css");
let sourcemaps = require("gulp-sourcemaps");
let plumber = require("gulp-plumber");
let rename = require("gulp-rename");
let concat = require("gulp-concat");

/**
 * ------------------------------------------------------------
 * GULP TASKS & WATCHERS.
 * Below are the callabled tasks and watchers
 * ------------------------------------------------------------
 */

// Main build tasks.
gulp.task("default", _watcher);
gulp.task(
    "production",
    gulp.series(
        _productionStart,
        gulp.parallel(
            _handleSCSS,
            _handleProductionSCSS,
            _handleProductionScripts,
            _handleProductionScriptsPlugins,
            _handleImages
        )
    )
);

// Single tasks
gulp.task("scss", _handleSCSS);
gulp.task("images", _handleImages);

// Production tasks
gulp.task("production-scss", _handleProductionSCSS);
gulp.task("production-js", _handleProductionScripts);
gulp.task("production-js-plugins", _handleProductionScriptsPlugins);
gulp.task("production-package", _productionPackage);



/**
 * ------------------------------------------------------------
 * GULP ACTION FUNCTIONS
 * Below are all of the functions which perform the tasks
 * ------------------------------------------------------------
 */

// Define the watcher functions which run by default
function _watcher(done) {
    // Source file watchers
    gulp.watch(
        "src/js/**/*.js",
        gulp.parallel(_handleProductionScripts, _handleProductionScriptsPlugins)
    );
    gulp.watch(
        "src/**/*.scss",
        gulp.parallel(_handleSCSS, _handleProductionSCSS)
    );
    gulp.watch("src/img/**/*", gulp.series(_handleImages));

    // Distination file watchers
    done();
}

// Handle the proccessing of SCSS
function _handleSCSS(done) {
    gulp.src("src/**/*.scss")
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(concat("frontend.css"))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest("dist/css"));
    done();
}

// Handle the proccessing of SCSS for production with compression
function _handleProductionSCSS(done) {
    gulp.src("src/**/*.scss")
        .pipe(plumber())
        .pipe(sass({ outputStyle: "compressed" }))
        .pipe(cleanCSS())
        .pipe(
            postcss([
                autoprefixer({
                    cascade: false,
                    add: true,
                    remove: true,
                    supports: true,
                    flexbox: true
                })
            ])
        )
        .pipe(concat("frontend.css"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(gulp.dest("dist/css/"));
    done();
}

// Handle the proccessing of any JavaScript files with compression
function _handleProductionScripts(done) {
    gulp.src(["src/js/*.js"])
        .pipe(babel())
        .pipe(concat("app.min.js"))
        .pipe(uglify())
        .pipe(gulp.dest("dist/js"));
    done();
}

function _handleProductionScriptsPlugins(done) {
    gulp.src(["src/js/lib/*.js"])
        .pipe(concat("app-plugins.min.js"))
        .pipe(uglify())
        .pipe(gulp.dest("dist/js"));
    done();
}

// Handle image minification for production
function _handleImages(done) {
    gulp.src("src/img/*")
        .pipe(plumber())
        .pipe(
            imagemin([
                imagemin.gifsicle({ interlaced: true }),
                imagemin.jpegtran({ progressive: true }),
                imagemin.optipng({ optimizationLevel: 5 }),
                imagemin.svgo({
                    plugins: [{ removeViewBox: true }, { cleanupIDs: false }]
                })
            ])
        )
        .pipe(gulp.dest("dist/img"));
    done();
}

// Production warning messages
function _productionStart(done) {
    console.log("*** Running Production Build ***");
    console.log('*** Did you run "gulp clear" ***');
    done();
}

// Handle the CSS file merge for production
function _productionPackage(done) {
    gulp.src(["dist/css/styles.min.css"])
        .pipe(concat("app.min.css"))
        .pipe(
            postcss([
                autoprefixer({
                    cascade: false,
                    add: true,
                    remove: true,
                    supports: true,
                    flexbox: true
                })
            ])
        )
        .pipe(cleanCSS())
        .pipe(gulp.dest("dist/css"));
    done();
}
