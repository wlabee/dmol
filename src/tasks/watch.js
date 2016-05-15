module.exports = function (front_paths,admin_paths,html_paths) {
  return {
        front_js: {
            files: [
                front_paths.js_src + '**/*.js',
                '!' + front_paths.js_src + '**/*.min.js'
                //'!' + js_src + 'build/*.js',
            ],
            tasks: ['newer:copy:front_copy','newer:uglify:front_minify'],
            options:{spawn: false,reloasd:true}
        },
        front_less: {
            files: [
                //front_paths.css_src + '*.less',
                front_paths.css_src + '**/*.less'
            ],
            tasks: ['newer:less:front_build', 'newer:cssmin:front_minify']
        },
        admin_js: {
            files: [
                admin_paths.js_src + '**/*.js',
                '!' + admin_paths.js_src + '**/*.min.js'
                //'!' + js_src + 'build/*.js',
            ],
            tasks: ['newer:copy:admin_copy','newer:uglify:admin_minify'],
            options:{spawn: false,reloasd:true}
        },
        admin_less: {
            files: [
                //admin_paths.css_src + '*.less',
                admin_paths.css_src + '**/*.less'
            ],
            tasks: ['newer:less:admin_build', 'newer:cssmin:admin_minify']
        }
    }
}
