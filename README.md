# Bienvenido

Éste es un blog de principante para aprendizaje en desarrollo web, se consideran los siguientes puntos dentro del proyecto:

*Material Design *Arquitectura MVC *Programación orientada a objetos *Preprocesadores de lenguaje

Se trabaja con HAML para la optimización de trabajo, para seguir desarrollándolo y modificarlo a tu gusto debes tener lo siguiente instalado en tu computadora:

*NodeJS https://nodejs.org/es/download/

*Instalar grunt https://gruntjs.com/getting-started

Instalación de grunt: Una vez instalado Node dirígete a tu servidor local donde estará tu proyecto, por ejemplo:

*Para xampp = C:\xampp\htdocs\NombreDeLaCarpeta *Para wampp = C:\wampp\www\NombreDeLaCarpeta

Abre esa ruta en tu simbolo de sistema o consola, después escribe:

*npm install -g grunt-cli

Esto instalará grunt en tu equipo Después de ello instala todas las dependencias en tu proyecto con:

*npm install

Puedes verificar escribiendo:

*grunt -v

Si la consola no reconoce haml desde este punto escribe:

*npm install grunt-haml-php --save-dev

La configuración se encuentra en gruntfile.js y en package.json

Puedes revisar la documentación de inicio en:

*https://www.npmjs.com/package/grunt-haml-php

Tienes que escribir en los archivos con extensión .haml, después de ello compila en la consola dentro de la dirección antes mencionada escribiendo:

*grunt haml:compile

Si no tienes error te retornará un mensaje de confirmación, en la url de tu web visita los archivos con extensión .php ya que no reconocerá los .haml

# Modificación de la conexión a la base de datos

Antes de correr el proyecto en tu web no olvides moficar el archivo database.php situado en: config/model/database.php
En el que va el nombre del servidor, usuario, contraseña y nombre de base de datos.