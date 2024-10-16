-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Out-2024 às 21:59
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
-- Estrutura da tabela `avaliacoes`
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
-- Estrutura da tabela `comentarios`
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
-- Estrutura da tabela `objeto`
--

DROP TABLE IF EXISTS `objeto`;
CREATE TABLE IF NOT EXISTS `objeto` (
  `id_obj` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_criacao` date NOT NULL,
  `condicao` varchar(255) NOT NULL,
  `historia` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `pais_origem` varchar(255) NOT NULL,
  `cidade_origem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_obj`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `objeto`
--

INSERT INTO `objeto` (`id_obj`, `nome`, `data_criacao`, `condicao`, `historia`, `foto`, `pais_origem`, `cidade_origem`) VALUES
(1, 'homem aranha', '0000-00-00', 'quase boa', 'É um estudante do ensino médio órfão que vive com seu tio Ben e sua tia May. Parker foi mordido por uma aranha radioativa em uma exposição científica e adquire a agilidade de um aracnídeo. O estudante é capaz de andar nas paredes e tetos e desenvolve um aparelho que o permite lançar teias artificiais.', '66b5f9ac4ec33.jpg', 'EUA', ''),
(2, 'Espada medieval', '0000-00-00', 'Mais ou menos', 'A espada era o instrumento bélico favorito na Idade Média (seguido pelo arco e pela lança). É uma arma de curto alcance e, pelos conceitos da época, bem perigosa. A espada era utilizada em grande escala nessa época, nas Guerras Santas, nas batalhas contra os mouros etc.', 'espada-viking-ulfberht.webp', 'Inglaterra', ''),
(3, 'Machado viking', '0000-00-00', 'Boa', 'Vikings e europeus medievais usavam machados como armas e ferramentas. Os machados vikings eram tipicamente menores e mais versáteis do que seus equivalentes medievais, que eram maiores e usados principalmente para a guerra.', 'mach.jpg', 'Noruega', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `senha`, `data_nasc`, `cpf`, `status`, `email`) VALUES
(31, 'VERLEI', 'das', '2024-07-12 00:00:00', '00022233355', 0, 'uriel.2223@aluno.iffar.br'),
(32, '', '', '0000-00-00 00:00:00', '', 0, ''),
(34, 'Mundo Animal', 'dasdsadsadsadas', '2024-07-27 00:00:00', '00022233352', 0, 'uriel.2022316043@aluno.iffar.br'),
(37, 'Uriel', '123', '2000-05-24 00:00:00', '77788899900', 0, 'uriel.2022316043@aluno.iffar.edu.br'),
(38, 'Jonas', '22', '2000-05-24 00:00:00', '44433322211', 0, 'jonas.2022310916@aluno.iffar.edu.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visita`
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
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_id_obj` FOREIGN KEY (`id_obj`) REFERENCES `objeto` (`id_obj`),
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

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
