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
                    dest: '../clean-slate/css/style.css',
                }]
            }
        },
        concat: {
            dist: {
                src: [
                    'js/*.js'
                ],
                dest: '../clean-slate/js/script.js',
            }
        },
        uglify: {
            build: {
                src: '../clean-slate/js/script.js',
                dest: '../clean-slate/js/script.js'
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
    grunt.registerTask('build', ['concat', 'sass','uglify']);
};
