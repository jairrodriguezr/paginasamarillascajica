CREATE DATABASE archivo;

USE archivo;

CREATE TABLE usuarios (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(255) NOT NULL,
	usuario VARCHAR(255) NOT NULL UNIQUE,
	correo VARCHAR(255) NOT NULL UNIQUE,
	clave VARCHAR(255) NOT NULL,
	fecha_reg DATETIME NOT NULL,
	activo TINYINT NOT NULL,
	PRIMARY KEY (id)
)ENGINE = INNODB DEFAULT CHARSET=utf8;

CREATE TABLE categoria (
	id INT NOT NULL AUTO_INCREMENT,
	categoria VARCHAR(255) NOT NULL UNIQUE,
	PRIMARY KEY (id)
)ENGINE = INNODB DEFAULT CHARSET=utf8;

CREATE TABLE establecimientos (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(255) NOT NULL UNIQUE,
	telefono VARCHAR(10) NOT NULL UNIQUE,
	direccion VARCHAR(255) NOT NULL,
	web VARCHAR(255) NOT NULL UNIQUE,
	descripcion VARCHAR(255) NOT NULL,
	id_usuario INT NOT NULL,
	id_categoria INT NOT NULL,
	fecha_reg DATETIME NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_usuario) 
		REFERENCES usuarios(id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	FOREIGN KEY (id_categoria) 
		REFERENCES categoria(id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT

)ENGINE = INNODB DEFAULT CHARSET=utf8;



CREATE TABLE imagen (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(255) NOT NULL UNIQUE,
	imagen VARCHAR(255) NOT NULL,
	id_usuario INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_usuario) 
		REFERENCES usuarios(id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)ENGINE = INNODB DEFAULT CHARSET=utf8;

CREATE TABLE ubicacion (
	id INT NOT NULL AUTO_INCREMENT,
	ubicacion VARCHAR(255) NOT NULL,
	id_usuario INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_usuario) 
		REFERENCES usuarios(id)
		ON UPDATE CASCADE
		ON DELETE RESTRICT

)ENGINE = INNODB DEFAULT CHARSET=utf8;


