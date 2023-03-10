/*Juan Manuel Rincón Navarro*/

/*CREAR TABLA PROFESORES*/
CREATE TABLE PROFESORES(

	id smallint unsigned NOT NULL AUTO_INCREMENT,
	nombre varchar (100) NOT NULL,
    correo varchar (100) UNIQUE NOT NULL,
    password varchar (255) NOT NULL,
	CONSTRAINT PK_idProfesor PRIMARY KEY(id)
);

/*CREAR TABLA CATEGORIAS*/
CREATE TABLE CATEGORIAS(

	id tinyint unsigned NOT NULL AUTO_INCREMENT,
	nombre varchar (100) UNIQUE NOT NULL,
	CONSTRAINT PK_idCategoria PRIMARY KEY(id)
);

/*CREAR TABLA RETOS*/
CREATE TABLE RETOS(	
    id smallint unsigned NOT NULL AUTO_INCREMENT,
	nombre varchar (100) NOT NULL,
	dirigido varchar (100) NOT NULL,
	descripcion varchar (500),
    fechaInicioInscripcion Date NOT NULL,
    fechaFinInscripcion Date NOT NULL,
    fechaInicioReto timestamp NOT NULL,
    fechaFinReto timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    fechaPublicacion timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    publicado bit NOT NULL,
    idProfesor smallint unsigned NOT NULL,
    idCategoria tinyint unsigned NOT NULL,
	CONSTRAINT PK_idReto PRIMARY KEY(id),
	CONSTRAINT FK_idProfesor FOREIGN KEY (idProfesor) REFERENCES PROFESORES(id),
    CONSTRAINT FK_idCategoria FOREIGN KEY (idCategoria) REFERENCES CATEGORIAS(id)
);