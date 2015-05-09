create database EngineDevelop;
use EngineDevelop;

create table usuarios(
	cedula varchar(15) not null,
	nombre varchar(20),
	apellido varchar(20),
	email varchar(20),
	telefono varchar(13),
	rol varchar(20),
	password varchar(255),
	salt varchar(255),
	primary key(cedula)
);

create table empresa(
	nit varchar(15),
	nombre varchar(50),
	telefono varchar(13),
	direccion varchar(20),
	representante varchar(15),
	primary key(nit,representante),
	foreign key (representante) references usuarios(cedula)
);