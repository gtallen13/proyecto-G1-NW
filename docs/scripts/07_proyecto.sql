
DROP TABLE IF EXISTS libros;
DROP TABLE IF EXISTS libros_usuarios;
-- DROP TRIGGER IF EXISTS add_roles_usuarios;

CREATE TABLE Libros(
	idlibro INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   	nomlibro VARCHAR(25) NOT NULL,
    dsclibro VARCHAR(200) NOT NULL,
    preciolibro DOUBLE(8,2) NOT NULL,
    imglibro LONGBLOB,
    pdflibro LONGBLOB NOT NULL,
    fchpublicacion DATE,
   	fchlistado DATETIME NOT NULL,
    autor VARCHAR(25) NOT NULL,
    categoria VARCHAR(25) NOT NULL
);
CREATE TABLE libros_usuarios (
	id_libro_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usercod BIGINT(10),
    idlibro INT,
    FOREIGN KEY (usercod) REFERENCES usuario(usercod),
    FOREIGN KEY(idlibro) REFERENCES libros(idlibro)
);
DROP TABLE IF EXISTS carretilla;
CREATE TABLE carretilla(
    usercod	BIGINT(11) NOT NULL,
    idlibro INT NOT NULL,
    fchagregado DATETIME NOT NULL,
    dsclibro VARCHAR(25) NOT NULL,
    preciolibro DOUBLE(8,2) NOT NULL,
    estadoCompra VARCHAR(3) NOT NULL
);
-- CREATE TRIGGER add_roles_usuarios
-- AFTER INSERT ON usuario
-- FOR EACH ROW
-- INSERT INTO roles_usuarios(rolescod,usercod,roleuserest,roleuserfch, roleuserexp)
-- VALUES ("CLN", NEW.usercod, "ACT", now(), '2050-01-01 00:00:00')

-- DELIMITER $$
 
-- CREATE PROCEDURE  ProcedimientoRolesUsuarios
-- (
-- in usercod varchar(50),
-- in rolescod varchar(50)
-- )
-- BEGIN
-- insert into contactos(usercod, rolescod,roleuserest, roleuserexp,roleuserfch) 
-- values(usercod, rolescod, "ACT", "2050-01-01 00:00:00", now());
-- END$$
