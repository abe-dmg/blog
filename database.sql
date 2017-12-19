CREATE DATABASE `blog`;
USE `blog`;

-- Creación de tablas
CREATE TABLE `usuarios`(id int(3) PRIMARY KEY AUTO_INCREMENT, nombre char(30) NOT NULL, 
            apellido char(30) NOT NULL, correo varchar(100) NOT NULL UNIQUE, pass varchar(255) NOT NULL,
            nivel char(50) NOT NULL);

CREATE TABLE `categorias`(id int(3) PRIMARY KEY AUTO_INCREMENT, nombre char(100) NOT NULL);

CREATE TABLE `notas`(id int(3) PRIMARY KEY AUTO_INCREMENT, titulo char(100) NOT NULL, descripcion text NOT NULL, 
            foto text NOT NULL, id_usuario int(3) NOT NULL, id_categoria int(3) NOT NULL, relevante boolean,
            palabras_clave varchar(255) NOT NULL, fecha date NOT NULL, 
            CONSTRAINT notes_fk FOREIGN KEY(id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT category_fk FOREIGN KEY(id_categoria) REFERENCES categorias(id) ON DELETE CASCADE ON UPDATE CASCADE);

CREATE TABLE `comentarios`(id int(3) PRIMARY KEY AUTO_INCREMENT, descripcion text, fecha date, id_usuario int(3), id_nota int(3),
        CONSTRAINT user_coment_fk FOREIGN KEY(id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE ON UPDATE CASCADE, 
        CONSTRAINT note_coment_fk FOREIGN KEY(id_nota) REFERENCES notas(id) ON DELETE CASCADE ON UPDATE CASCADE) ;

-- Inserción de datos
INSERT INTO categorias(nombre) VALUES ('Inteligencia Artificial'),('Domótica'),('Big Data'),('Internet de las Cosas');