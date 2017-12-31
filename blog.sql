CREATE DATABASE blogPersonal DEFAULT CHARACTER SET utf8;

USE blogPersonal;

CREATE TABLE usuarios (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    nombre VARCHAR(25) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    foto TEXT CHARACTER SET utf8 NOT NULL,
    fecha_registro DATETIME NOT NULL,
    activo TINYINT NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE entradas (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    autor_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    texto TEXT CHARACTER SET utf8 NOT NULL,
    fecha DATETIME NOT NULL,
    activa TINYINT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(autor_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE comentarios (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    autor_id INT NOT NULL,
    entrada_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    texto TEXT CHARACTER SET utf8 NOT NULL,
    fecha DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(autor_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY(entrada_id)
        REFERENCES entradas(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE lenguajeProg (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    imagen TEXT CHARACTER SET utf8 NOT NULL,
    color1 VARCHAR(255) NOT NULL,
    color2 VARCHAR(255) NOT NULL,
    activo TINYINT NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE entradasProgs (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    autor_id INT NOT NULL,
    lenguaje_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    texto TEXT CHARACTER SET utf8 NOT NULL,
    imagen TEXT CHARACTER SET utf8 NOT NULL,
    fecha DATETIME NOT NULL,
    activa TINYINT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(lenguaje_id)
        REFERENCES lenguajeProg(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY(autor_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE ubicacion (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL ,
    direccion VARCHAR(80) NOT NULL,
    lat FLOAT(10,6) NOT NULL,
    lng FLOAT(10,6) NOT NULL,
    tipo VARCHAR(30) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE entradasImg (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    autor_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    texto TEXT CHARACTER SET utf8 NOT NULL,
    imagen TEXT CHARACTER SET utf8 NOT NULL,
    fecha DATETIME NOT NULL,
    ubicacion INT NOT NULL,
    activa TINYINT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(autor_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY(ubicacion)
        REFERENCES ubicacion(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);
