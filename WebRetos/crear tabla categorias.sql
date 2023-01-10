/*Juan Manuel Rincón Navarro*/
USE appretos;

CREATE TABLE Subcategorias(

	id tinyint unsigned NOT NULL AUTO_INCREMENT,
	nombre varchar (50) NOT NULL,
	idCategoria tinyint unsigned NOT NULL,
	CONSTRAINT PK_idSubCategoria PRIMARY KEY(id),
	CONSTRAINT FK_Categorias FOREIGN KEY(idCategoria) REFERENCES Categorias(id)
);