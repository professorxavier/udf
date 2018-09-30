-- Delete o Banco de Dados Caso exista
DROP DATABASE IF EXISTS techday;

-- Cria o Banco
CREATE DATABASE techday;

-- Usa a Banco
USE techday;

-- Tabela Inscritos
CREATE TABLE inscritos (
	inscrito_id int UNSIGNED auto_increment,
	nome varchar(200) not null,
	rgm varchar(10) UNIQUE not null,
	email varchar(200) UNIQUE not null,
	idcurso int UNSIGNED not null,
	tag varchar(200) not null,
	ativo int not null DEFAULT 1,
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	modified TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(inscrito_id)
);

-- Restrição no campo ativo na tabela inscritos
ALTER TABLE inscritos ADD CONSTRAINT Ck_ativo_inscrito CHECK(ativo in(1,0));

-- Tabela Estática Curso
CREATE TABLE curso (
	idcurso int UNSIGNED not null auto_increment,
	iniciais varchar(3) not null,
	curso varchar(150) not null,
	created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	modified TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(idcurso)
);

-- Inserindo registros na tabela estática
INSERT INTO curso VALUES(NULL,'ADS','Análise e Desenvolvimento de Sistemas',now(),now()),(NULL,'SI','Sistemas de Informação',now(),now()),(NULL,'JD','Jogos Digitais',now(),now());

-- Adicionando Contraint e Foreign key
ALTER TABLE inscritos ADD CONSTRAINT fk_id_curso FOREIGN KEY(idcurso) REFERENCES curso(idcurso);