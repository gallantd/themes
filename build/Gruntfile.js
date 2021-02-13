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
                    src: 'preload.scss',
                    dest: '../iruncanada/css/preload.css',
                }, {
                  src: 'postload.scss',
                  dest: '../iruncanada/css/postload.css',
                }]
            }
        },
        concat: {
            dist: {
                src: [
                    'node_modules/jquery/dist/jquery.min.js',
                    'node_modules/lazyload/lazyload.js',
                    'js/*.js',
                ],
                dest: '../iruncanada/js/script.js',
            }
        },
        uglify: {
            build: {
                src: '../iruncanada/js/script.js',
                dest: '../iruncanada/js/script.js'
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
