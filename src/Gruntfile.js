var front_paths = {
    js_src: 'scripts/front/',
    js_dest: '../assets/scripts/front/',

    css_src: 'styles/front/',
    css_dest: '../assets/styles/front/'
};

var admin_paths = {
    js_src: 'scripts/admin/',
    js_dest: '../assets/scripts/admin/',

    css_src: 'styles/admin/',
    css_dest: '../assets/styles/admin/'
};

var html_paths = {
    tpl_src: './../app/templates/'
};

module.exports = function (grunt) {
    /*  Load tasks  */
    require('load-grunt-tasks')(grunt);
    /*  Configure project  */
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        
        // Setup tasks
        concat: require('./tasks/concat')(front_paths, admin_paths),
        uglify: require('./tasks/uglify')(front_paths, admin_paths),
        less: require('./tasks/less')(front_paths, admin_paths),
        cssmin: require('./tasks/cssmin')(front_paths, admin_paths),
        copy: require('./tasks/copy')(front_paths, admin_paths),
        watch: require('./tasks/watch')(front_paths, admin_paths, html_paths)
    });

    /*  Register tasks  */

    // Default task.

    grunt.registerTask('admin-all', ['copy:admin_copy', 'less:admin_build', 'concat:admin_build', 'uglify:admin_minify', 'cssmin:admin_minify']);

    grunt.registerTask('admin-less', ['less:admin_build', 'cssmin:admin_minify']);

    grunt.registerTask('admin-js', ['copy:admin_copy', 'concat:admin_build', 'uglify:admin_minify']);

    grunt.registerTask('front-all', ['copy:front_copy', 'concat:front_build', 'uglify:front_minify', 'less:front_build', 'cssmin:front_minify']);

    grunt.registerTask('front-less', ['less:front_build', 'cssmin:front_minify']);

    grunt.registerTask('front-js', ['copy:front_copy', 'concat:front_build', 'uglify:front_minify']);

    grunt.registerTask('default', ['watch']);
};
