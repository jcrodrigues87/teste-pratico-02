<?php
	include "modell/DataAcess/BancoTaletos.Model.Database.php";
	
	$sql ="CREATE TABLE cad_habilidades(
			id int(10) UNSIGNED NOT NULL,
			descricao varchar(45) NOT NULL DEFAULT ''
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
		
		INSERT INTO cad_habilidades (id, descricao) VALUES
		(1, 'Java'),
		(2, 'Node.js'),
		(3, 'C++'),
		(4, 'PHP'),
		(5, 'Python'),
		(6, 'GO'),
		(7, 'ADVPL'),
		(8, 'Angular'),
		(9, 'Electon'),
		(10, 'React'),
		(11, 'React Native'),
		(12, 'MongoDB'),
		(13, 'Mysql'),
		(14, 'SQLServer'),
		(15, 'Postgress'),
		(16, 'Backend'),
		(17, 'Front-End');

		CREATE TABLE cad_pessoa (
		  id int(10) UNSIGNED NOT NULL,
		  dtnascimento date DEFAULT NULL,
		  email varchar(80) DEFAULT '',
		  telefone varchar(15) DEFAULT NULL,
		  cep varchar(45) DEFAULT '',
		  uf varchar(2) DEFAULT NULL,
		  cidade varchar(45) DEFAULT '',
		  bairro varchar(60) DEFAULT '',
		  rua varchar(60) DEFAULT '',
		  numero varchar(10) DEFAULT '',
		  complemento varchar(45) DEFAULT '',
		  nome varchar(45) DEFAULT ''
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

		INSERT INTO cad_pessoa (id, dtnascimento, email, telefone, cep, uf,cidade,bairro,rua,numero,complemento,nome) VALUES
		(24, '1990-07-07', 'fabiohr10@gmail.com', '37998030040', '37925000', 'MG', 'piumenta									', 'Novo Tempo', 'Almir Paiva Rezende 276', '300', '', 'Fabio'),
		(25, '1989-02-25', 'sanu-carlapta@hotmail.com', '37998559575', '37925000', 'MG', 'Piumhi											', 'totonha tome', 'Ari almada', '343', '', 'Sany carla');

		CREATE TABLE cad_pessoa_formacao (
		  id int(10) UNSIGNED NOT NULL,
		  cad_pessoa_id int(10) UNSIGNED DEFAULT NULL,
		  curso varchar(45) DEFAULT NULL,
		  instituicao varchar(45) DEFAULT NULL,
		  dataconclusao date DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

		CREATE TABLE cad_pessoa_habilidade (
		  id int(10) UNSIGNED NOT NULL,
		  cad_pessoa_id int(10) UNSIGNED NOT NULL DEFAULT 0,
		  cad_habilidade_id int(10) UNSIGNED NOT NULL DEFAULT 0
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

		ALTER TABLE cad_habilidades
		  ADD PRIMARY KEY (id);


		ALTER TABLE cad_pessoa
		  ADD PRIMARY KEY (id);


		ALTER TABLE cad_pessoa_formacao
		  ADD PRIMARY KEY (id),
		  ADD KEY FK_cad_pessoa_formacao_1 (cad_pessoa_id);

		ALTER TABLE cad_pessoa_habilidade
		  ADD PRIMARY KEY (id),
		  ADD KEY FK_cad_pessoa_habilidade_1 (cad_pessoa_id),
		  ADD KEY FK_cad_pessoa_habilidade_hab (cad_habilidade_id);

		ALTER TABLE cad_habilidades
		  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

		ALTER TABLE cad_pessoa
		  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

		ALTER TABLE cad_pessoa_formacao
		  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;


		ALTER TABLE cad_pessoa_habilidade
		  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

		ALTER TABLE cad_pessoa_formacao
		  ADD CONSTRAINT FK_cad_pessoa_formacao_1 FOREIGN KEY (cad_pessoa_id) REFERENCES cad_pessoa (id);

		ALTER TABLE cad_pessoa_habilidade
		  ADD CONSTRAINT FK_cad_pessoa_habilidade_1 FOREIGN KEY (cad_pessoa_id) REFERENCES cad_pessoa (id),
		  ADD CONSTRAINT FK_cad_pessoa_habilidade_hab FOREIGN KEY (cad_habilidade_id) REFERENCES cad_habilidades (id);
		COMMIT;";
	
$banco = new Database();
$banco->insert($sql,array());

echo "instalado com sucesso";


?>
<a href='index.php'>Ir pagina inicial</a>