/*USUARIO PARA DATOS*/
CREATE USER 'usuarioDatos'@localhost IDENTIFIED BY '123456';

GRANT SELECT, INSERT, UPDATE, DELETE ON retos.* TO 'usuarioDatos'@localhost;

/*USUARIO PARA ESTRUCTURAS*/
CREATE USER 'usuarioEstructura'@localhost IDENTIFIED BY '123456';

GRANT CREATE, DROP, INDEX, ALTER ON retos.* TO 'usuarioEstructura'@localhost;