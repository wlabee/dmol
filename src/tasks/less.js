module.exports = function (front_paths,admin_paths) {
    return {
      front_build: {
            options: {
                paths: [front_paths.css_src]
            },
            files: [
                {
                    expand: true,
                    cwd: front_paths.css_src,
                    src: ['**/*.less','!common/**/*.less'],
                    dest: front_paths.css_dest,
                    ext: '.css'
                }
            ]
        },
        admin_build: {
            options: {
                paths: [admin_paths.css_src]
            },
            files: [
                {
                    expand: true,
                    cwd: admin_paths.css_src,
                    src: ['**/*.less','!common/**/*.less'],
                    dest: admin_paths.css_dest,
                    ext: '.css'
                },
                //固定输出less
                {
                    dest: admin_paths.css_dest + 'bootstrap.css',
                    src: [admin_paths.css_src + '../common/bootstrap-3.*/bootstrap.less']
                },
                {
                    dest: admin_paths.css_dest + 'admin.css',
                    src: [admin_paths.css_src + 'common/admin.less']
                },
                //{
                //    dest: admin_paths.css_dest + 'widgets.css',
                //    src: [admin_paths.css_src + 'common/admin-less/widgets/widgets.less']
                //},
                //{
                //    dest: admin_paths.css_dest + 'pages.css',
                //    src: [admin_paths.css_src + 'common/admin-less/pages/pages.less']
                //},
                {
                    dest: admin_paths.css_dest + 'themes.css',
                    src: [admin_paths.css_src + 'common/admin-less/themes/themes.less']
                },
                {
                    dest: admin_paths.css_dest + 'rtl.css',
                    src: [admin_paths.css_src + 'common/admin-less/rtl/rtl.less']
                }
            ]
        }
    }
}
