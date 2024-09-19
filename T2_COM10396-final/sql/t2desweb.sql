-- Tabela de Usuários (Administradores)
CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    matricula VARCHAR(50) UNIQUE,
    senha VARCHAR(255)
);

-- Tabela de Laboratórios
CREATE TABLE laboratorios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    localizacao VARCHAR(100) NOT NULL,
    capacidade INT NOT NULL,
    descricao TEXT
);

-- Tabela de Solicitações de Suporte
CREATE TABLE solicitacoes_suporte (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_solicitante VARCHAR(100),
    numero_matricula VARCHAR(50),
    laboratorio_id INT,
    dia_horario DATETIME,
    tipo_solicitacao VARCHAR(50),
    descricao_solicitacao TEXT,
    protocolo VARCHAR(50) UNIQUE,
    status VARCHAR(20),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (laboratorio_id) REFERENCES laboratorios(id) ON DELETE SET NULL
);

-- Tabela de Monitorias
CREATE TABLE monitorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_monitor VARCHAR(100),
    sala VARCHAR(50),
    horario VARCHAR(50),
    disciplina VARCHAR(100)
);

-- Tabela de Informações Úteis
CREATE TABLE informacoes_uteis (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(200),
    introducao TEXT,
    link VARCHAR(255),
    data_publicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Mensagens de Contato
CREATE TABLE mensagens_contato (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_remetente VARCHAR(100),
    email VARCHAR(100),
    assunto VARCHAR(100),
    mensagem TEXT,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, matricula, senha) 
VALUES ('Administrador do sistema', '2018123456', '123456');


INSERT INTO laboratorios (nome, localizacao, capacidade, descricao) 
VALUES ('Sala 101 - Laboratório de Redes', 'Prédio Chichiu', '20', 'Laboratório com 20 Máquinas para Redes');

INSERT INTO laboratorios (nome, localizacao, capacidade, descricao) 
VALUES ('Sala 102 - Laboratório de Desenv. de Software', 'Prédio Chichiu', '25', 'Laboratório com 25 Máquinas para Desenvolvimento de Software');

INSERT INTO laboratorios (nome, localizacao, capacidade, descricao) 
VALUES ('Sala 103 - Laboratório de Seg. da Informação', 'Prédio REUNI', '15', 'Laboratório com 15 Máquinas para Segurança da Informação');

INSERT INTO laboratorios (nome, localizacao, capacidade, descricao) 
VALUES ('Sala 104 - Laboratório de IA', 'Prédio REUNI', '10', 'Laboratório com 10 Máquinas para Inteligência Artificial');

INSERT INTO laboratorios (nome, localizacao, capacidade, descricao) 
VALUES ('Sala 105 - Laboratório de Programação', 'Prédio REUNI', '30', 'Laboratório com 30 Máquinas para Programação');
