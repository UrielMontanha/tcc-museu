-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 31/10/2024 às 14:22
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc_museu`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

DROP TABLE IF EXISTS `avaliacoes`;
CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id_aval` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_obj` int DEFAULT NULL,
  `avaliacao` text,
  PRIMARY KEY (`id_aval`),
  KEY `fk_id_usuario` (`id_usuario`),
  KEY `fk_id_obj` (`id_obj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_com` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_obj` int DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_com`),
  KEY `fk_c_id_usuario` (`id_usuario`),
  KEY `fk_c_id_obj` (`id_obj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `objeto`
--

DROP TABLE IF EXISTS `objeto`;
CREATE TABLE IF NOT EXISTS `objeto` (
  `id_obj` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_criacao` date NOT NULL,
  `data_chegada` date NOT NULL,
  `condicao` varchar(255) NOT NULL,
  `historia` text NOT NULL,
  `arquivo` date NOT NULL,
  `pais_origem` varchar(255) NOT NULL,
  `cidade_origem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_obj`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `objeto`
--

INSERT INTO `objeto` (`id_obj`, `nome`, `data_criacao`, `data_chegada`, `condicao`, `historia`, `arquivo`, `pais_origem`, `cidade_origem`) VALUES
(4, 'Spider', '0000-00-00', '0000-00-00', 'Boa', 'sssssss', '0000-00-00', 'EUA', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nasc` datetime NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `status` int NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `senha`, `data_nasc`, `cpf`, `status`, `email`) VALUES
(31, 'VERLEI', 'das', '2024-07-12 00:00:00', '00022233355', 0, 'uriel.2223@aluno.iffar.br'),
(32, '', '', '0000-00-00 00:00:00', '', 0, ''),
(34, 'Mundo Animal', 'dasdsadsadsadas', '2024-07-27 00:00:00', '00022233352', 0, 'uriel.2022316043@aluno.iffar.br'),
(37, 'Uriel', '123', '2000-05-24 00:00:00', '77788899900', 0, 'uriel.2022316043@aluno.iffar.edu.br'),
(38, 'Jonas', '22', '2000-05-24 00:00:00', '44433322211', 0, 'jonas.2022310916@aluno.iffar.edu.br');

-- --------------------------------------------------------

--
-- Estrutura para tabela `visita`
--

DROP TABLE IF EXISTS `visita`;
CREATE TABLE IF NOT EXISTS `visita` (
  `id_visita` int NOT NULL,
  `data` datetime DEFAULT NULL,
  `hora` datetime DEFAULT NULL,
  `num_visitas` int DEFAULT NULL,
  PRIMARY KEY (`id_visita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_id_obj` FOREIGN KEY (`id_obj`) REFERENCES `objeto` (`id_obj`),
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_c_id_obj` FOREIGN KEY (`id_obj`) REFERENCES `objeto` (`id_obj`),
  ADD CONSTRAINT `fk_c_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
