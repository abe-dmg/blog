module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                src: 'src/<%= pkg.name %>.js',
                dest: 'build/<%= pkg.name %>.min.js'
            }
        },

        haml: {
            compile: {
                files: [{
                    expand: true,
                    src: ['views/**/*.haml'], 
                    dest: '',
                    ext: '.php'
                }]
            },
        }
    });


    grunt.loadNpmTasks('grunt-haml-php');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.registerTask('default', ['uglify']);
};