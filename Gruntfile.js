module.exports = function(grunt) {
    require('load-grunt-tasks')(grunt);
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                implementation: 'sass',
                style: 'minify'
            },
            dist: {
                files: [{
                    expand: true,
                    cwd: 'build/style/',
                    src: ['*.scss'],
                    dest: 'build/',
                    ext: '.css'
                }]
            }
        },
        cssmin: {
            options: {
                mergeIntoShorthands: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'style.css': ['build/*.css']
                }
              }
            },
        concat: {
            dist: {
                src: [
                    'build/js/*.js'
                ],
                dest: 'build/script.js',
            }
        },
        uglify: {
            build: {
                src: 'build/script.js',
                dest: 'script.js'
            }
        },
        watch: {
            options: {
                livereload: true
            },
            scripts: {
                files: 'build/js/*.js',
                tasks: ['jshint', 'concat', 'uglify', 'clean'],
                options: {
                    debounceDelay: 250,
                },
            },
            css: {
                files: 'build/style/**/*.scss',
                tasks: ['sass', 'cssmin', 'clean'],
                options: {
                    livereload: true,
                },
            }
        },
        jshint: {
            all: {
                src: ['build/js/*.js'],
            },
        },
        clean: {
            dist: [
                'build/*.css',
                'build/script.js'
            ]
        }
    });

    grunt.registerTask('default', ['concat', 'sass', 'cssmin','uglify']);
   grunt.registerTask('dev', ['clean', 'watch']);

};