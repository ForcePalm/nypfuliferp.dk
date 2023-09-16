const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
const watch = require('gulp-watch');

let isMinifying = false;

// Define a task to minify CSS and rename the output file
gulp.task('minify-css', () => {
  if (!isMinifying) {
    isMinifying = true;

  return gulp.src('webroot/css/styles.css') // Path to your CSS files
    .pipe(cleanCSS())
    .pipe(rename('styles.min.css')) // Rename the output file
    .pipe(gulp.dest('webroot/css')) // Output directory for the renamed file
    .on('end', () => {
      isMinifying = false; // Reset the flag after the task is done
    });
  }
});

// Define a watch task using gulp-watch with specific events
gulp.task('watch', () => {
  watch('webroot/css/**/*.css', { events: ['add', 'change', 'unlink'] }, (file) => {
    const filePath = file.relative;
    // Check if the file path is not the path of the minified file
    if (filePath !== 'styles.min.css') {
      console.log(filePath);
      gulp.series('minify-css')();
    }

  });
});

// Define a default task to run when you run 'gulp' without arguments
gulp.task('default', gulp.series('minify-css', 'watch'));