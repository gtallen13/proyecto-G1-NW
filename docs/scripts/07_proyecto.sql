
DROP TABLE IF EXISTS autores;
DROP TABLE IF EXISTS idiomas;
DROP TABLE IF EXISTS libros;

CREATE TABLE autores(
	idautor INT AUTO_INCREMENT NOT NULL,
    nomautor VARCHAR(25) NOT NULL,
    apelautor VARCHAR(25) NOT NULL,
    nacionalidad VARCHAR(25) NOT NULL,
    fchnacimiento DATETIME NOT NULL,
    PRIMARY KEY (idautor)
);
CREATE TABLE idiomas(
	ididioma INT AUTO_INCREMENT NOT NULL,
    nomidioma VARCHAR(25) NOT NULL,
    PRIMARY KEY (ididioma)
);

CREATE TABLE Libros(
	idlibro INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   	nomlibro VARCHAR(25) NOT NULL,
    dsclibro VARCHAR(25) NOT NULL,
    preciolibro DOUBLE(8,2) NOT NULL,
    imglibro BLOB,
    pdflibro BLOB,
    fchpublicacion DATETIME,
   	fchlistado DATETIME
);
ALTER TABLE libros ADD idautor INT NOT NULL;
ALTER TABLE libros ADD CONSTRAINT fk_id_autor FOREIGN KEY (idautor) REFERENCES autores(idautor);
ALTER TABLE libros ADD catid BIGINT(8) NOT NULL;
ALTER TABLE libros ADD CONSTRAINT fk_cat_id FOREIGN KEY (catid) REFERENCES categorias(catid);
ALTER TABLE libros ADD ididioma INT NOT NULL;
ALTER TABLE libros ADD CONSTRAINT fk_id_idioma FOREIGN KEY (ididioma) REFERENCES idiomas(ididioma);
