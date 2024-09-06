create database if not exists agendaversa;

use agendaversa;

create table usuario (
	id int auto_increment primary key not null,
	nome varchar(45) not null,
    sobrenome varchar(100) not null,
    email varchar(140) unique not null,
    senha varchar(255) not null,
    created_at timestamp default CURRENT_TIMESTAMP,
    updated_at timestamp default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
);

create table tarefa(
	id int auto_increment primary key not null,
	titulo varchar(45) not null,
    descricao varchar(100),
    hora_inicio datetime,
    hora_fim datetime,
    created_at timestamp default CURRENT_TIMESTAMP,
    updated_at timestamp default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
);
