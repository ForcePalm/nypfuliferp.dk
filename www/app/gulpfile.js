const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
const watch = require('gulp-watch');
const uglify = require('gulp-uglify');

let isMinifying = false;
let isMinifyingJS = false;

// Define a task to minify CSS and rename the output file
gulp.task('minify-css', () => {
  if (!isMinifying) {
    isMinifying = true;

  return gulp.src(['webroot/css/**/*.css', '!webroot/css/**/*.min.css']) // Path to your CSS files
    .pipe(cleanCSS())
    .pipe(rename('styles.min.css')) // Rename the output file
    .pipe(gulp.dest('webroot/css')) // Output directory for the renamed file
    .on('end', () => {
      isMinifying = false; // Reset the flag after the task is done
    });
  }
});

// Define a task to minify JavaScript
gulp.task('minify-js', () => {
  if (!isMinifyingJS) {
    isMinifyingJS = true;

    return gulp.src(['webroot/js/**/*.js', '!webroot/js/**/*.min.js'])
      .pipe(uglify())
      .pipe(rename('scripts.min.js'))
      .pipe(gulp.dest('webroot/js'))
      .on('end', () => {
        isMinifyingJS = false; // Reset the flag after the task is done
      });
  }
});

// Define a watch task using gulp-watch with specific events
gulp.task('watch', () => {
  watch(['webroot/css/**/*.css', '!webroot/css/**/*.min.css'], { events: ['add', 'change', 'unlink'] }, (file) => {
    const filePath = file.relative;
    // Check if the file path is not the path of the minified file
    if (filePath !== 'styles.min.css') {
      console.log(filePath);
      gulp.series('minify-css')();
    }

  });

  watch(['webroot/js/**/*.js', '!webroot/js/**/*.min.js'], { events: ['add', 'change', 'unlink'] }, (file) => {
    const filePath = file.relative;
    if (filePath !== 'scripts.min.js') {
      gulp.series('minify-js')();
    }
  });
});

// Define a default task to run when you run 'gulp' without arguments
gulp.task('default', gulp.series('minify-css', 'minify-js', 'watch'));