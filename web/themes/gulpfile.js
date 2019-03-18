var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var imagemin = require('gulp-imagemin');

gulp.task('default' , defaultTask);
function defaultTask(done){
    console.log('Hello meena');
    done();
}

gulp.task('mycompiler', function(){
    return gulp.src('custom/boot_cdn/sass/header.scss')
        .pipe(sass())
        .pipe(gulp.dest('custom/boot_cdn/css'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('browserSync', function() {
    browserSync.init({
        open: 'external',
        hostname: 'localhost',
        proxy: 'http://localhost:8888/cricket/web/' 
    });
});
 
gulp.task('images', function(){
    return gulp.src('custom/boot_cdn/css/images/**/*.+(png|jpg|jpeg|gif|svg)')
    .pipe(imagemin())
    .pipe(gulp.dest('custom/boot_cdn/newimages'))
});

gulp.task('watch', gulp.parallel('browserSync',function(){
    gulp.watch('custom/boot_cdn/sass/header.scss',gulp.series('mycompiler'));
}));

