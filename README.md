# Bienvenido

Éste es un blog de principante para aprendizaje en desarrollo web, se consideran los siguientes puntos dentro del proyecto:

<ul>
    <li>Material Design</li>
    <li>Arquitectura MVC</li>
    <li>Programación orientada a objetos</li>
    <li>Preprocesadores de lenguaje</li>
</ul>

Se trabaja con HAML para la optimización de trabajo, para seguir desarrollándolo y modificarlo a tu gusto debes tener lo siguiente instalado en tu computadora:

<ol>
	<li>NodeJS -> <a href="https://nodejs.org/es/download/" target="_blank">https://nodejs.org/es/download/</a></li>
	<li>Instalar composer -> <a href="https://getcomposer.org/download/" target="_blank">https://getcomposer.org/download/</a></li>
	<li>Instalar grunt -> <a href="https://gruntjs.com/getting-started" target="_blank">https://gruntjs.com/getting-started</a></li>
</ol>

Instalación de grunt: Una vez instalado Node dirígete a tu servidor local donde estará tu proyecto, por ejemplo:

<strong>Para xampp: </strong>
<pre><code>C:\xampp\htdocs\NombreDeLaCarpeta</pre></code>

<strong>Para wampp:</strong>

<pre><code>C:\wampp\www\NombreDeLaCarpeta</pre></code>

Abre esa ruta en tu simbolo de sistema o consola, después escribe:

<pre><code>npm install -g grunt-cli</pre></code>

Esto instalará grunt en tu equipo Después de ello instala todas las dependencias en tu proyecto con:

<pre><code>npm install</pre></code>

Puedes verificar escribiendo:

<pre><code>grunt -v</pre></code>

Finalmente para instalar HAML PHP escribe:

<pre><code>npm install grunt-haml-php --save-dev</pre></code>

<strong>Si hay errores en la instalación deberás escribir los archivos gruntfile.js y en package.json</strong>

<strong><h3>package.json</h3></strong>
<pre><code>
{
    "name": "blog",
    "version": "0.1.0",
    "devDependencies": {
        "grunt": "~0.4.5",
        "grunt-contrib-jshint": "~0.10.0",
        "grunt-contrib-nodeunit": "~0.4.1",
        "grunt-contrib-uglify": "~0.5.0",
        "grunt-haml-php": "^0.5.0"
    }
}
</code></pre>

<strong><h3>gruntfile.js</h3></strong>
<pre><code>
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
                    src: ['views/**/*.haml'], //Esta es mi ruta, retornará al mismo directorio, puedes modificar esto a tu gusto
                    dest: '',
                    ext: '.php' //Creará un archivo php a la mano de ejecutar haml, por ejemplo: index.haml => indes.php
                }]
            },
        }
    });

    grunt.loadNpmTasks('grunt-haml-php');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.registerTask('default', ['uglify']);
};
</code></pre>

<p>Después de esto puedes correr el comando: <code><pre>npm install</pre></code></p>

Puedes revisar la documentación de inicio en:

*https://www.npmjs.com/package/grunt-haml-php

Tienes que escribir en los archivos con extensión .haml, después de ello compila en la consola dentro de la dirección antes mencionada escribiendo:

<pre><code>grunt haml:compile</pre></code>

Si no tienes error te retornará un mensaje de confirmación, en la url de tu web visita los archivos con extensión .php ya que no reconocerá los .haml

# Modificación de la conexión a la base de datos

Antes de correr el proyecto en tu web no olvides moficar el archivo <strong>database.php</strong> situado en: <strong>config/model/database.php</strong>
En el que tienes que modificar el valor de las siguientes variables:<br>

<strong>
    <ul>
        <li>$DB_HOST = '127.0.0.1/localhost';</li>
        <li>$DB_USER = 'root';</li>
        <li>$DB_PASS = 'llena este campo si tienes una cotraseña;</li>
        <li>$DB_NAME = 'inserta aquí tu nombre de base de datos';</li>
    </ul>
</strong>