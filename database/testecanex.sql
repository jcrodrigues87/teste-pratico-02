-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Set-2020 às 00:38
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testecanex`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `codigo` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `logradouro` varchar(130) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `habilidades` varchar(150) NOT NULL,
  `complemento` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `candidatos`
--

INSERT INTO `candidatos` (`codigo`, `nome`, `data_nascimento`, `email`, `telefone`, `logradouro`, `cep`, `habilidades`, `complemento`) VALUES
(1, 'Wellington Leite de Oliveira', '1993-03-11', 'wellingtonleite15@hotmail.com', '37 99999-9999', 'Rua dos Miranda, 78', '3800000', 'JS, PHP, HTML, CSS, BOOTSTRAP', NULL),
(6, 'Jessica de Paiva ', '1993-11-19', 'jessicffa5@hotmail.com', '999999', 'Rua Altamiro jose de Paula', '38900000', 'Java, Node.js, C++, PHP, Python, Go, ADVPL, Angular, Electron, React, React, MongoDB, MySQL, SQLServer, Postgres, Backend, Front-End', 'casa'),
(10, 'Caroline paivs', '1998-02-12', 'carolinepaivacamargos@gmail.com', '666666666', 'Antero torres 220', '38900000', 'Java, PHP, Python, ADVPL, Electron, React, MySQL', 'Casa'),
(11, 'Arléia Paiva ', '1975-12-22', 'arleiap@gmail.com', '6850685098', 'Praça dos açudes 33', '38900000', 'PHP, Go, React, MongoDB, SQLServer, Postgres, Backend', 'Casa '),
(32, 'Pedro Paulo de Faria', '1998-01-06', 'ppp@dominio.com.br', '37 3371-1367', 'Rua Aimores, 70', '38900-00', 'Java, Node.js, PHP, ADVPL, Angular, MySQL, SQLServer, Postgres', 'Casa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacoes`
--

CREATE TABLE `formacoes` (
  `id` int(10) NOT NULL,
  `nome_do_curso` varchar(100) NOT NULL,
  `nome_da_instituicao` varchar(100) NOT NULL,
  `data_conclusao` date NOT NULL,
  `cod_candidato` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `formacoes`
--

INSERT INTO `formacoes` (`id`, `nome_do_curso`, `nome_da_instituicao`, `data_conclusao`, `cod_candidato`) VALUES
(1, 'Analise e Desenvolvimento de Sistemas', 'IFMG', '2016-01-05', 1),
(3, 'Biologia', 'Ifmg', '2018-09-01', 6),
(5, 'Informatica', 'Puc', '2019-09-28', 11),
(6, 'Ciência da computação ', 'Ifmg ', '2011-09-28', 1),
(27, 'Engenharia da Computação', 'UNIFEI', '2019-07-30', 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_habilidades`
--

CREATE TABLE `lista_habilidades` (
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lista_habilidades`
--

INSERT INTO `lista_habilidades` (`nome`) VALUES
('Java'),
('Node.js'),
('C++'),
('PHP'),
('Python'),
('Go'),
('ADVPL'),
('Angular'),
('Electron'),
('React'),
('React Native'),
('MongoDB'),
('MySQL'),
('SQLServer'),
('Postgres'),
('Backend'),
('Front-End');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `formacoes`
--
ALTER TABLE `formacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cadidato` (`cod_candidato`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `formacoes`
--
ALTER TABLE `formacoes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `formacoes`
--
ALTER TABLE `formacoes`
  ADD CONSTRAINT `fk_cadidato` FOREIGN KEY (`cod_candidato`) REFERENCES `candidatos` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
