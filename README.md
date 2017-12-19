# Bienvenido

Éste es un blog de principante para aprendizaje en desarrollo web, se consideran los siguientes puntos dentro del proyecto:

<ul>
    <li>Material Design</li>
    <li>Arquitectura MVC</li>
    <li>Programación orientada a objetos</li>
    <li>Preprocesadores de lenguaje</li>
</ul>

Se trabaja con HAML para la optimización de trabajo, para seguir desarrollándolo y modificarlo a tu gusto debes tener lo siguiente instalado en tu computadora:

*NodeJS https://nodejs.org/es/download/

*Instalar grunt https://gruntjs.com/getting-started

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

Si la consola no reconoce haml desde este punto escribe:

<pre><code>npm install grunt-haml-php --save-dev</pre></code>

La configuración se encuentra en gruntfile.js y en package.json

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