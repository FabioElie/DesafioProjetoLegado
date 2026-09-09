CREATE DATABASE IF NOT EXISTS desafio_legado CHARACTER SET utf8 COLLATE utf8_general_ci;
USE desafio_legado;

CREATE TABLE IF NOT EXISTS Usuario (
  id_usuario int(11) AUTO_INCREMENT PRIMARY KEY,
  nome varchar(100) NOT NULL,
  cpf varchar(14) UNIQUE NOT NULL,
  senha varchar(255) NOT NULL,
  email varchar(100) UNIQUE NOT NULL,
  perfil int(11)
);

INSERT INTO Usuario (nome, cpf, senha, email, perfil) VALUES
('Administrador', '123.456.789-01', 'senha@123', 'admin@email.com', 1),
('Ana Paula Souza', '123.456.789-02', 'senha@123', 'anapaula@email.com', 2),
('Fabio Elie', '123.456.789-03', 'senha@123', 'fabioelie@email.com', 2);

CREATE TABLE IF NOT EXISTS Evento (
  id_evento int(11) AUTO_INCREMENT PRIMARY KEY,
  nome varchar(100) NOT NULL,
  data date NOT NULL,
  capacidade_maxima int(11) NOT NULL
);

CREATE TABLE IF NOT EXISTS Setor (
  id_setor int(11) AUTO_INCREMENT PRIMARY KEY,
  nome varchar(100) NOT NULL,
  capacidade int(11) NOT NULL
);

INSERT INTO Evento (nome, data, capacidade_maxima) VALUES
('Show de Abertura', '2026-10-15', 5000),
('Congresso de Tecnologia', '2026-11-20', 1200);

INSERT INTO Setor (nome, capacidade) VALUES
('Pista', 3000),
('Camarote', 500),
('Arquibancada', 1500);
