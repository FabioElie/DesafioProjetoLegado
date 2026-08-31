
CREATE TABLE Usuario (
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
('Fabio Elie', '123.456.789-03', 'senha@123', 'fabioelie@email.com', 2)

