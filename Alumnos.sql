CREATE DATABASE LabWebAlumnos;

USE LabWebAlumnos;

CREATE TABLE Alumnos(
idAlumno INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(50) NOT NULL,
lastname VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
age INT(3),
location VARCHAR(50),
date TIMESTAMP
);
