
DROP TABLE IF EXISTS libros;

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

