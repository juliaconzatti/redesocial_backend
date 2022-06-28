CREATE TABLE clientes(
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    usuario VARCHAR(15) NOT NULL,
    senha VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE clubes(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(130) NOT NULL,
    descricao TEXT NOT NULL,
    autor VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE forum(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(120) NOT NULL,
    comentario TEXT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE resenhas(
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR (70) NOT NULL,
    resenha TEXT NOT NULL,
    PRIMARY KEY (id)
    
);

CREATE TABLE atualizacoes(
    id INT NOT NULL AUTO_INCREMENT,
    paginas INT NOT NULL,
    comentario TEXT NOT NULL,
    PRIMARY KEY (id)
);
