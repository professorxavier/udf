drop database if exists techday;

create database techday;
use techday;

create table inscritos (

	inscrito_id int auto_increment primary key,
    nome varchar(200) not null,
    rgm varchar(200) not null,
	email varchar(200) not null,
    curso varchar(200) not null,
    tag varchar(200) not null
    

);