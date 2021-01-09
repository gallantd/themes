module.exports = function(grunt) {
    require('load-grunt-tasks')(grunt);
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                implementation: 'sass',
            },
            dist: {
                options: {
                    outputStyle: 'compressed'
                },
                files: [{
                    src: 'style.scss',
                    dest: '../css/style.css',
                }]
            }
        },
        concat: {
            dist: {
                src: [
                    'js/*.js'
                ],
                dest: '../js/script.js',
            }
        },
        uglify: {
            build: {
                src: '../js/script.js',
                dest: '../js/script.js'
            }
        },
        watch: {
            options: {
                livereload: true
            },
            scripts: {
                files: 'js/*.js',
                tasks: ['concat', 'uglify'],
                options: {
                    livereload: true
                },
            },
            css: {
                files: 'scss/*.scss',
                tasks: ['sass'],
                options: {
                    livereload: true,
                },
            }
        }
    });
    grunt.registerTask('default', ['concat', 'sass','uglify']);
    grunt.registerTask('dev', ['watch']);
};
