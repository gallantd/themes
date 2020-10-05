'use strict';
module.exports = function(grunt) {

    grunt.initConfig({
        sass: {
            dist: {
                options: {
                    style: 'compressed',
                    compass: false,
                    sourcemap: false
                },
                files: {
                    'style.css': [
                        'build/style/style.scss'
                    ]
                }
            }
        },
        uglify: {
            dist: {
                files: {
                    'script.js': [
                        'build/js/script.js'
                    ]
                }
            }
        },
        watch: {
            options: {
                livereload: true
            },
            sass: {
                files: [
                    'build/style/*.scss'
                ],
                tasks: ['sass']
            },
            js: {
                files: [
                    'build/js/*.js'
                ],
                tasks: ['uglify']
            }
        },
        clean: {
            dist: [
                'build/style/style.min.css',
                'build/js/script.min.js'
            ]
        }
    });

    // Load tasks
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-sass');

    // Register tasks
    grunt.registerTask('build', [
        'sass',
        'uglify'
    ]);
    grunt.registerTask('dev', [
        'watch'
    ]);

};