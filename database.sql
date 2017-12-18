CREATE DATABASE `blog`;
USE `blog`;

-- Creación de tablas
CREATE TABLE `usuarios`(id int(3) PRIMARY KEY AUTO_INCREMENT, nombre char(30) NOT NULL, 
            apellido char(30) NOT NULL, correo varchar(100) NOT NULL, pass varchar(255) NOT NULL,
            nivel char(50) NOT NULL);

CREATE TABLE `categorias`(id int(3) PRIMARY KEY AUTO_INCREMENT, nombre char(100) NOT NULL);

CREATE TABLE `notas`(id int(3) PRIMARY KEY AUTO_INCREMENT, titulo char(100) NOT NULL, descripcion text NOT NULL, 
            foto text NOT NULL, id_usuario int(3) NOT NULL, id_categoria int(3) NOT NULL, relevante boolean,
            palabras_clave varchar(255) NOT NULL, fecha date NOT NULL, 
            FOREIGN KEY(id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,
            FOREIGN KEY(id_categoria) REFERENCES categorias(id) ON DELETE CASCADE);

CREATE TABLE `comentarios`(id int(3) PRIMARY KEY AUTO_INCREMENT, descripcion text, fecha date, id_usuario int(3), id_nota int(3),
        FOREIGN KEY(id_usuario) REFERENCES usuarios(id), FOREIGN KEY(id_nota) REFERENCES notas(id));
