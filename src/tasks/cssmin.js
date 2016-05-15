module.exports = function (front_paths,admin_paths) {
  return {
    front_minify: {
      expand: true,
      cwd: front_paths.css_dest,
      src: ['**/*.css', '!**/*.min.css'],
      dest: front_paths.css_dest,
      ext: '.min.css'
    },
    admin_minify: {
      expand: true,
      cwd: admin_paths.css_dest,
      src: ['**/*.css', '!**/*.min.css'],
      dest: admin_paths.css_dest,
      ext: '.min.css'
    }
  }
}