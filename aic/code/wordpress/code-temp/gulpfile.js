import pkg from 'gulp';
const { src, dest, watch, series, parallel } = pkg;
import rename from 'gulp-rename';
import browserSync from 'browser-sync';
import sassModule from 'gulp-sass';
import dartSass from 'sass';
const sass = sassModule(dartSass);
import sassGlob from 'gulp-sass-glob-use-forward';
import plumber from 'gulp-plumber';
import notify from 'gulp-notify';
import postcss from 'gulp-postcss';
import cssnext from 'postcss-cssnext';
import cleanCSS from 'gulp-clean-css';
import sourcemaps from 'gulp-sourcemaps';
import webp from 'gulp-webp';
import del from 'del';
import changed from 'gulp-changed';
import uglify from 'gulp-uglify';
import concat from 'gulp-concat';

// 読み込み先（階層が間違えていると動かないので注意）
const srcPath = {
    css: 'src/sass/**/*.scss',
    img: 'src/images/**/*',
    js: 'src/js/**/*.js',
    html: './**/*.html',
};

// 吐き出し先（なければ生成される）
const destPath = {
    css: 'assets/css/',
    img: 'assets/images/',
    js: 'assets/js/',
};

// ブラウザーシンク（リアルタイムでブラウザに反映させる処理）
const browserSyncReload = (done) => {
    browserSync.reload();
    done();
};

// Sassファイルのコンパイル処理（DartSass対応）
const browsers = ['last 2 versions', '> 5%', 'ie = 11', 'not ie <= 10', 'not dead'];

const cssSass = () => {
    return src(srcPath.css)
    .pipe(sourcemaps.init())
    .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
    .pipe(sassGlob())
    .pipe(
        sass.sync({
            includePaths: ['src/sass'],
            outputStyle: 'expanded',
        })
    )
    .pipe(postcss([cssnext(browsers)]))
    .pipe(sourcemaps.write('./'))
    .pipe(dest(destPath.css))
    .pipe(
        notify({
        message: 'OK!!!',
        onLast: true,
        })
    );
};

const cssMin = () => {
    return src(srcPath.css)
        .pipe(sourcemaps.init())
        .pipe(sassGlob())
        .pipe(
        sass.sync({
            includePaths: ['src/sass'],
            outputStyle: 'expanded',
        })
        )
        .pipe(cleanCSS()) // css 圧縮
        .pipe(
        rename({
            extname: '.min.css',
        })
        ) // .min.css にリネーム
        .pipe(dest(destPath.css)) // min.css 出力
        .pipe(sourcemaps.write('./'))
        .pipe(
        notify({
            title: 'compiled!',
            message: new Date(),
            sound: 'Pop',
        })
    );
};

// 画像webp化
const imgWebp = () => {
    return src(srcPath.img)
    .pipe(changed(destPath.img, { extension: '.webp' }))
    .pipe(
        webp({
            quality: 60,
            method: 6,
        })
    )
    .pipe(dest(destPath.img));
};

// JavaScriptの圧縮と結合
const jsMin = () => {
    return src(srcPath.js)
    .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
    .pipe(sourcemaps.init())
    .pipe(concat('bundle.min.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('./'))
    .pipe(dest(destPath.js));
};

// ファイルの変更を検知
const watchFiles = () => {
  watch(srcPath.css, series(cssSass, browserSyncReload));
  watch(srcPath.css, series(cssMin, browserSyncReload));
  watch(srcPath.img, series(imgWebp, browserSyncReload));
  watch(srcPath.js, series(jsMin, browserSyncReload));
  watch(srcPath.html, series(browserSyncReload));
};

// 画像だけ削除
const delPath = {
    img: './images/',
};
const clean = (done) => {
    del(delPath.img, { force: true });
    done();
};

// npx gulpで出力する内容
export default series(series(clean, cssSass, imgWebp, cssMin, jsMin), parallel(watchFiles));
