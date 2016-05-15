module.exports = function (front_paths, admin_paths) {
    return {
        admin_copy: {
            files: [
                {expand: true, cwd: admin_paths.js_src, src: ['**', '!common/**'], dest: admin_paths.js_dest}
            ]
        },
        front_copy: {
            files: [
                {expand: true, cwd: front_paths.js_src, src: ['**', '!common/**'], dest: front_paths.js_dest}
            ]
        }
    }
}
