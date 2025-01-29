-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Jan-2025 às 06:41
-- Versão do servidor: 8.3.0
-- versão do PHP: 8.2.18

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
-- Estrutura da tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_com` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `id_obj` int DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `fk_c_id_usuario` (`id_usuario`),
  KEY `fk_c_id_obj` (`id_obj`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id_com`, `id_usuario`, `id_obj`, `comentario`, `nome`) VALUES
(50, 34, 19, 'opa!!!', 'Mundo Animal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto`
--

DROP TABLE IF EXISTS `objeto`;
CREATE TABLE IF NOT EXISTS `objeto` (
  `id_obj` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_criacao` date NOT NULL,
  `data_chegada` date NOT NULL,
  `condicao` varchar(255) NOT NULL,
  `historia` text NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `pais_origem` varchar(255) NOT NULL,
  `cidade_origem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_obj`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `objeto`
--

INSERT INTO `objeto` (`id_obj`, `nome`, `data_criacao`, `data_chegada`, `condicao`, `historia`, `arquivo`, `pais_origem`, `cidade_origem`) VALUES
(19, 'Cachorro chupetão GEEK', '0000-00-00', '0000-00-00', 'Boa', 'Os aldeídos são compostos orgânicos caracterizados por possuir um grupo funcional carbonila (C=O) ligado a pelo menos um átomo de hidrogênio e localizado na extremidade da cadeia carbônica. Em química, aldeído é uma função orgânica que se caracteriza pela presença em sua estrutura do grupamento carbonila na extremidade da cadeia, caracterizando a presença de um grupo -CHO na extremidade do composto orgânico, denominado aldoxila, metanoila ou formila. Os aldeídos graxos contêm entre 8 e 13 átomos de carbono em sua composição molecular e têm um aroma frutado ou floral muito agradável. Eles podem ser detectados facilmente em concentrações muito baixas. Eles são, na realidade, uma família de componentes que podem ser metálicos, amiláceos, cítricos ou cerosos.', '67999505ac616.jpg', 'Brasil', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recuperar_senha`
--

DROP TABLE IF EXISTS `recuperar_senha`;
CREATE TABLE IF NOT EXISTS `recuperar_senha` (
  `email` varchar(255) NOT NULL,
  `token` char(100) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `usado` tinyint NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `recuperar_senha`
--

INSERT INTO `recuperar_senha` (`email`, `token`, `data_criacao`, `usado`) VALUES
('uriel.2022316043@aluno.iffar.edu.br', '4c06af688027deceb8918ecd4e121217f7fb0199039c8f81d9555ed8d7dcd8bf06e99305dac40e060f6b59c29a83dc7af281', '2025-01-06 11:20:32', 0),
('uriel.2022316043@aluno.iffar.edu.br', '0eb3d9bd5f38d76302fa8e91eead965283f059335ad95c31aac07db24d573b33e67ee20309375b7b41acb6639d4b8fa3c794', '2025-01-06 11:32:54', 1),
('uriel.2022316043@aluno.iffar.edu.br', 'e1f4b54d9b5c69c1a3499c9dcdcb33241251b2d23d9649b32b2372b4dbe0d80b537689b965196eb2aa0c890653c3f4e9c739', '2025-01-29 03:29:50', 1),
('uriel.2022316043@aluno.iffar.edu.br', '83476db93b4c5cdc9ad90a57be52f9be7faa34cf6bf195930adc6f39b6d53f7d3b2768b1fbf9d3ace2dad783a490e1f4fb1f', '2025-01-29 03:35:28', 0),
('uriel.2022316043@aluno.iffar.edu.br', '30b09cac77919ba8e3d96d4cdff20fc32239c990ec435bec1d4a1839e4a2a7bb758d370a0af3b45319de85f8b870f550d7dd', '2025-01-29 03:36:19', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `status` int NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `senha`, `data_nasc`, `cpf`, `status`, `email`) VALUES
(34, 'Mundo Animal', 'ddd', '2024-07-27', '00022233352', 0, 'mundoanimal@gmail.com'),
(37, 'admnistrador', '123', '2000-05-24', '77788899900', 1, 'adm@gmail.com'),
(40, 'Aldeído', '123', '0000-00-00', '99988877766', 0, 'aldeido@gmail.com'),
(42, 'Uriel Montanha', '$argon2i$v=19$m=65536,t=4,p=1$N2lFSW9KMDBiSUVXcVB6aw$DgoV67VKjeGIsrkgZfVjILY7KFN/3ILbOW05DmiRGrQ', '2007-04-04', '123.123.123', 0, 'uriel.2022316043@aluno.iffar.edu.br');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_c_id_obj` FOREIGN KEY (`id_obj`) REFERENCES `objeto` (`id_obj`),
  ADD CONSTRAINT `fk_c_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
