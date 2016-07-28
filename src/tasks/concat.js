module.exports = function (front_paths, admin_paths) {
    return {
        front_build: {
            options: {
                separator: ';\n'
            },
            files: [
                // Bootstrap
                {
                    dest: front_paths.js_dest + 'bootstrap.js',
                    src: [
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/transition.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/alert.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/button.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/carousel.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/collapse.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/dropdown.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/modal.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/tooltip.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/popover.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/scrollspy.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/tab.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/affix.js'
                    ]
                }
            ]
        },
        admin_build: {
            options: {
                separator: ';\n',
            },
            files: [
                // Bootstrap
                {
                    dest: admin_paths.js_dest + 'bootstrap.js',
                    src: [
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/transition.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/alert.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/button.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/carousel.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/collapse.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/dropdown.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/modal.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/tooltip.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/popover.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/scrollspy.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/tab.js',
                        admin_paths.js_src + 'common/libs/bootstrap-3.1.1/affix.js'
                    ]
                },

                // PixelAdmin
                {
                    dest: admin_paths.js_dest + 'admin.js',
                    src: [

                        // PixelAdmin App
                        admin_paths.js_src + 'common/build/utils.js',
                        admin_paths.js_src + 'common/build/app.js',
                        admin_paths.js_src + 'common/build/events.js',

                        // Touch devices
                        // admin_paths.js_src + 'common/libs/fastclick-0.6.11.js',
                        // admin_paths.js_src + 'common/libs/jquery.event.move-1.3.6.js',
                        // admin_paths.js_src + 'common/libs/jquery.event.swipe-0.5.js',

                        // External plugins
                        // admin_paths.js_src + 'common/libs/jquery.vague-0.0.4.js',
                        admin_paths.js_src + 'common/libs/select2-3.4.5/select2.js',

                        // jQuery UI
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.core.js',
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.widget.js',
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.mouse.js',
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.position.js',
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.sortable.js',
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.slider.js',
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.accordion.js',
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.menu.js',
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.autocomplete.js',
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.spinner.js',
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.progressbar.js',
                        // admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.tabs.js',

                        // PixelAdmin App Components and Plugins
                        // admin_paths.js_src + 'common/build/components_main-navbar.js',
                        admin_paths.js_src + 'common/build/components_main-menu.js',
                        // admin_paths.js_src + 'common/build/components_alert.js',
                        admin_paths.js_src + 'common/build/plugins_switcher.js',
                        // admin_paths.js_src + 'common/build/plugins_limiter.js',
                        // admin_paths.js_src + 'common/build/plugins_expanding-input.js',
                        // admin_paths.js_src + 'common/build/plugins_wizard.js',
                        // admin_paths.js_src + 'common/build/plugins_file-input.js',
                        // admin_paths.js_src + 'common/build/plugins_tasks.js',
                        // admin_paths.js_src + 'common/build/plugins_rating.js',
                        // admin_paths.js_src + 'common/libs/pixel-slimscroll.js', // Slimscroll, optimized for the main menu dropdowns / Navbar collapse

                        // Plugins
                        admin_paths.js_src + 'common/libs/bootstrap-datepicker-1.3.0/bootstrap-datepicker.js',
                        admin_paths.js_src + 'common/libs/bootstrap-timepicker-0.2.5.js',

                        // admin_paths.js_src + 'common/libs/bootstrap-tabdrop.js',
                        // admin_paths.js_src + 'common/libs/jquery.minicolors-2.1.1.js',
                        // admin_paths.js_src + 'common/libs/jquery.maskedinput-1.3.1.js',
                        // admin_paths.js_src + 'common/libs/jquery.autosize-1.18.4.js',
                        admin_paths.js_src + 'common/libs/bootbox.min-4.2.0.js',
                        // admin_paths.js_src + 'common/libs/jquery.growl-1.1.5.js',
                        // admin_paths.js_src + 'common/libs/jquery.knob-1.2.7.js',
                        // admin_paths.js_src + 'common/libs/jquery.sparkline-2.1.2.js',
                        // admin_paths.js_src + 'common/libs/jquery.easypiechart-2.1.5.js',
                        admin_paths.js_src + 'common/libs/jquery.slimscroll-1.3.2.js',
                        // {
                        // admin_paths.js_src + 'common/libs/moment-2.5.1.js',
                        // admin_paths.js_src + 'common/libs/bootstrap-datepaginator-1.1.0.js',
                        // }
                        // {
                        // admin_paths.js_src + 'common/libs/bootstrap-editable-1.5.1/bootstrap-editable.js',
                        // admin_paths.js_src + 'common/libs/bootstrap-editable-1.5.1/inputs-ext/address/address.js',
                        // admin_paths.js_src + 'common/libs/bootstrap-editable-1.5.1/inputs-ext/typeaheadjs/lib/typeahead.js',
                        // admin_paths.js_src + 'common/libs/bootstrap-editable-1.5.1/inputs-ext/typeaheadjs/typeaheadjs.js',
                        // }
                        // {
                        // admin_paths.js_src + 'common/libs/jquery.validate-1.11.1/jquery.validate.js',
                        // admin_paths.js_src + 'common/libs/jquery.validate-1.11.1/additional-methods.js',
                        // }
                        // {
                        // admin_paths.js_src + 'common/libs/jquery-datatables-1.10.0/jquery.datatables.js',
                        // admin_paths.js_src + 'common/libs/jquery-datatables-1.10.0/datatables.bootstrap3.js',
                        // }
                        // {
                        // admin_paths.js_src + 'common/libs/dropzone-amd-module-3.8.4.js',
                        // admin_paths.js_src + 'common/libs/dropzone-3.8.4.js',
                        // }
                        // {
                        admin_paths.js_src + 'common/libs/summernote-0.5.1/summernote.js',
                        // }
                        // {
                        // admin_paths.js_src + 'common/libs/bootstrap-markdown-2.2.1/markdown.js',
                        // admin_paths.js_src + 'common/libs/bootstrap-markdown-2.2.1/to-markdown.js',
                        // admin_paths.js_src + 'common/libs/bootstrap-markdown-2.2.1/bootstrap-markdown.js',
                        // }
                        // {
                        admin_paths.js_src + 'common/libs/raphael-2.1.2.min.js',
                        admin_paths.js_src + 'common/libs/morris-0.5.0.js',
                        // }
                        // {
                        // admin_paths.js_src + 'common/libs/jquery.flot-0.8.2/jquery.flot.js',
                        // admin_paths.js_src + 'common/libs/jquery.flot-0.8.2/jquery.flot.pie.js',
                        // admin_paths.js_src + 'common/build/plugins_flot.js',
                        // }


                        // PixelAdmin Extensions
                        // admin_paths.js_src + 'common/build/extensions_modal.js',
                        // admin_paths.js_src + 'common/build/extensions_bootstrap-datepicker.js',
                        // admin_paths.js_src + 'common/build/extensions_bootstrap-timepicker.js',
                        // admin_paths.js_src + 'common/build/extensions_bootstrap-datepaginator.js',
                        // admin_paths.js_src + 'common/build/extensions_bootstrap-tabdrop.js',
                        // admin_paths.js_src + 'common/build/extensions_jquery.validate.js',
                        // admin_paths.js_src + 'common/build/extensions_jquery.knob.js',
                        // admin_paths.js_src + 'common/build/extensions_jquery.sparklines.js',
                    ]
                },

                // jQuery UI Extras
                // {
                //   dest: js_dest + 'jquery-ui-extras.js',
                //   src: paths([
                //     admin_paths.js_src + 'common/build/extensions_jquery-ui-extras.js', // This line is required
                //     admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.tooltip.js',
                //     admin_paths.js_src + 'common/libs/jquery-ui-1.10.4/jquery.ui.datepicker.js',
                //     admin_paths.js_src + 'common/build/extensions_jquery-ui.datepicker.js'
                //   ])
                // },

                // IE
                // {
                //   dest: js_dest + 'ie.js',
                //   src: paths([
                //     admin_paths.js_src + 'common/libs/respond.min.js',
                //     admin_paths.js_src + 'common/libs/excanvas.js'
                //   ])
                // }

                //{
                //    dest: admin_paths.css_dest + 'global.css',
                //    src: [
                //        admin_paths.css_dest + 'bootstrap.css',
                //        admin_paths.css_dest + 'admin.css',
                //        admin_paths.css_dest + 'themes.css',
                //        admin_paths.css_dest + 'rtl.css',
                //    ]
                //},
            ]
        }
    }
};
