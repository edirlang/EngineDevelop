create database EngineDevelop;
use EngineDevelop;

create table usuarios(
	cedula varchar(15) not null,
	nombre varchar(20),
	apellido varchar(20),
	email varchar(50),
	telefono varchar(13),
	rol varchar(20),
	password varchar(255),
	salt varchar(255),
	primary key(cedula)
);

create table asesor(
	cod_usuario varchar(15),
	salario int,
	fecha date,
	primary key(cod_usuario),
	foreign key (cod_usuario) references usuarios (cedula)
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

create table oferta(
	id int NOT NULL AUTO_INCREMENT,
	nombre varchar(20),
	descripcion text,
	precio int,
	archivo varchar(255),
	primary key(id)
);

create table solicitud(
	id int NOT NULL AUTO_INCREMENT,
	cliente varchar(15),
	tipo varchar(20),
	descripcion text,
	fecha date,
	hora TIME,
	estado varchar(1),
	primary key(id),
	foreign key(cliente) references usuarios(cedula)
);

create table solicitud_asesor(
	solicitud int,
	asesor varchar(15),
	fecha date,
	hora time,
	respuesta text,
	primary key(solicitud, asesor),
	foreign key(solicitud) references solicitud(id),
	foreign key (asesor) references asesor(cod_usuario)
);

create table factura(
	id int AUTO_INCREMENT,
	fecha date,
	hora time,
	cliente varchar(15),
	asesor varchar(15),
	total int,
	estado varchar(1),
	primary key (id),
	foreign key (cliente) references usuarios(cedula),
	foreign key (asesor) references asesor(cod_usuario)	
);

create table servicio(
	id int,
	nombre varchar(20),
	valor int,
	primary key(id),
	foreign key(id) references factura (id)
);