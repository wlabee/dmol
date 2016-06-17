module.exports = function (front_paths, admin_paths) {
    return {
        front_minify: {
            options: {
                compress: {
                    drop_console: true
                },
                beautify: {
                    ascii_only: true,
                    quote_keys: true
                }
            },
            files: [
                {
                    expand: true,
                    cwd: front_paths.js_dest,
                    src: ['**/*.js', '!**/*.min.js'],
                    dest: front_paths.js_dest,
                    rename: function (dest, src) {
                        var path = require('path');
                        // Prefix each javascript file with the folder name into the destination
                        var dest_src = dest + path.dirname(src);
                        return path.join(dest_src, path.basename(src).replace('.js', '.min.js'));
                    }
                }
            ]
        },
        admin_minify: {
            options: {
                compress: {
                    drop_console: true
                },
                beautify: {
                    ascii_only: true,
                    quote_keys: true
                }
            },
            files: [
                //{
                //    expand: true,
                //    cwd: admin_paths.js_src,
                //    src: ['**/*.js', '!**/*.min.js', '!common/**'],
                //    dest: admin_paths.js_dest,
                //    rename: function (dest, src) {
                //        var path = require('path');
                //        // Prefix each javascript file with the folder name into the destination
                //        var dest_src = dest + path.dirname(src);
                //        return path.join(dest_src, path.basename(src).replace('.js', '.min.js'));
                //    }
                //},
                {
                    expand: true,
                    cwd: admin_paths.js_dest,
                    src: ['**/*.js', '!**/*.min.js'],
                    dest: admin_paths.js_dest,
                    rename: function (dest, src) {
                        var path = require('path');
                        // Prefix each javascript file with the folder name into the destination
                        var dest_src = dest + path.dirname(src);
                        return path.join(dest_src, path.basename(src).replace('.js', '.min.js'));
                    }
                }
            ]
        }
    }
}
