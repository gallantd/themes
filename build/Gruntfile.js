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
            basic: {
                src: [
                    'node_modules/jquery/dist/jquery.min.js',
                    'node_modules/lazyload/lazyload.js',
                    'js/script.js',
                ],
                dest: '../iruncanada/js/script.js',
            },
            extras: {
              src : ['js/single.js'],
              dest: '../iruncanada/js/single.js',
            }
        },
        uglify: {
            build: {
              files: [{
                expand: true,
                cwd: '../iruncanada/js',
                src: '*.js',
                dest: '../iruncanada/js',
                rename: function (dst, src) {
                  return dst + '/' + src.replace('.js', '.js');
                }
        }]
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
