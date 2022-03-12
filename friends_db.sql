DROP DATABASE IF EXISTS friends_db;
CREATE DATABASE IF NOT EXISTS friends_db;
USE friends_db;

#tabla tipousuarios
CREATE TABLE IF NOT EXISTS tipousuarios(
	id TINYINT(1) UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	tipousuario VARCHAR(45) NOT NULL,
	PRIMARY KEY(id)
)ENGINE=INNODB;


#tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios(
	id INT UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(45),
	apellido VARCHAR(45),
	email VARCHAR(45) UNIQUE NOT NULL,
	contraseña VARCHAR(255) NOT NULL,
	usuario VARCHAR(45) UNIQUE,
	tipousuarios_id TINYINT(1) 	UNSIGNED DEFAULT 2 NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (tipousuarios_id) REFERENCES tipousuarios(id) ON UPDATE CASCADE ON DELETE NO ACTION
)ENGINE=INNODB;

#tabla talles
CREATE TABLE IF NOT EXISTS talles(
	id INT UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	talle VARCHAR(45) NOT NULL,
	PRIMARY KEY(id)
)ENGINE=INNODB;

#tabla categorias
CREATE TABLE IF NOT EXISTS categorias(
	id INT UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	categoria VARCHAR(45) NOT NULL,
	PRIMARY KEY(id)
)ENGINE=INNODB;

#tabla remeras
CREATE TABLE IF NOT EXISTS remeras(
	id INT UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(45) NOT NULL,
	precio DECIMAL(5, 0) UNSIGNED NOT NULL,
	color VARCHAR(45) NOT NULL,
	imagen VARCHAR(100) NOT NULL,
	categorias_id INT UNSIGNED NOT NULL,
	talles_id INT UNSIGNED NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (categorias_id) REFERENCES categorias(id) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (talles_id) REFERENCES talles(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;

#tabla remeras_usuarios
CREATE TABLE IF NOT EXISTS remeras_usuarios(
	id INT UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	usuarios_id INT UNSIGNED NOT NULL,
	remeras_id INT UNSIGNED NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (usuarios_id) REFERENCES usuarios(id) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (remeras_id) REFERENCES remeras(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;

#INSERT INTOS

#tipousuarios
INSERT INTO tipousuarios SET id = 1, tipousuario = "Administrador";
INSERT INTO tipousuarios SET id = 2, tipousuario = "Usuario";

#usuarios
INSERT INTO usuarios 
(id, nombre, apellido, email, contraseña, usuario, tipousuarios_id)
VALUES
(1, 'Lautaro', 'Morel', 'lautaro.morel@davinci.edu.ar', '1234', 'lautaromorel', 1),
(2, 'Jonatan', 'Jorge', 'jonatan.jorge@davinci.edu.ar', '1234', 'jonatanjorge', 1),
(3, 'Juan', 'Perez', 'juanperez@davinci.edu.ar','1234', 'juanperez', 2),
(4, 'Cosme', 'Fulanito', 'cosmefulanito@davinci.edu.ar', '1234', 'cosmefulanito', 2),
(5, 'Ricardo', 'Gonzalez', 'ricardogonzalez@davinci.edu.ar','1234', 'ricardogonzalez', 2);

#categorias
INSERT INTO categorias SET id = 1, categoria = "Hombre"; 
INSERT INTO categorias SET id = 2, categoria = "Mujer"; 

#talles
INSERT INTO talles SET id = 1, talle = "XS"; 
INSERT INTO talles SET id = 2, talle = "S"; 
INSERT INTO talles SET id = 3, talle = "M"; 
INSERT INTO talles SET id = 4, talle = "L"; 
INSERT INTO talles SET id = 5, talle = "XL"; 

#remeras
INSERT INTO remeras 
(id, nombre, precio, color, imagen, categorias_id, talles_id)
VALUES
(1, 'Frankie say relax', '1200', 'negra', 'img/remeras/frankie_say_relax.jpg', 2, 2),
(2, 'How you doin', '1000', 'negra', 'img/remeras/how_you_doin.jpg', 1, 4),
(3, 'Rachel', '800', 'blanca', 'img/remeras/rachel.jpg', 2, 1),
(4, 'Chandler', '950', 'negra', 'img/remeras/chandler.jpg', 1, 2),
(5, 'Central Perk', '1500', 'gris', 'img/remeras/central_perk.jpg', 1, 5),
(6, 'Phoebe', '1250', 'negra', 'img/remeras/phoebe.jpg', 2, 2),
(7, 'Friends con foto', '1000', 'blanca', 'img/remeras/friends.jpg', 1, 3),
(8, 'Unagi', '1500', 'gris', 'img/remeras/unagi.jpg', 1, 2),
(9, 'Friends personajes', '1140', 'verde', 'img/remeras/friends_personajes.jpg', 1, 2),
(10, 'Girls', '1650', 'gris', 'img/remeras/girls.jpg', 2, 5),
(11, 'Sillon', '1020', 'gris', 'img/remeras/sillon.jpg', 2, 3),
(12, "I'm fine", '1650', 'azul', 'img/remeras/im_fine.jpg', 1, 5),
(13, "Friends", '1399', 'negra', 'img/remeras/friends_nofoto.jpg', 1, 4),
(14, "Buzo friends", '1850', 'rojo', 'img/remeras/friends_buzo.jpg', 1, 2),
(15, "I'll there for you", '1625', 'gris', 'img/remeras/ill_be_there_for_you.jpg', 2, 1),
(16, "Buzo central perk", '1950', 'negro', 'img/remeras/central_perk_buzo.jpg', 2, 3);
