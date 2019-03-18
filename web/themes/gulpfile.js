var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('default' , defaultTask);

function defaultTask(done){
    console.log('Hello meena');
    done();
}

gulp.task('mycomplier', function(){
    return gulp.src('custom/boot/sass/header.scss')
        .pipe(sass())
        .pipe(gulp.dest('custom/boot/css'))
});