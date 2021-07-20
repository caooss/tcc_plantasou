-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 20, 2021 at 10:22 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantasou`
--
CREATE DATABASE IF NOT EXISTS `plantasou` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `plantasou`;

-- --------------------------------------------------------

--
-- Table structure for table `cultivo`
--

DROP TABLE IF EXISTS `cultivo`;
CREATE TABLE IF NOT EXISTS `cultivo` (
  `cod_cultivo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `clima` varchar(4000) DEFAULT NULL,
  `plantio` varchar(4000) DEFAULT NULL,
  `luminosidade` varchar(4000) DEFAULT NULL,
  `irrigacao` varchar(4000) DEFAULT NULL,
  `temp_colheita` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`cod_cultivo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cultivo`
--

INSERT INTO `cultivo` (`cod_cultivo`, `nome`, `clima`, `plantio`, `luminosidade`, `irrigacao`, `temp_colheita`) VALUES
(4, 'Abóbora Japonesa', 'A temperatura ideal para germinação vai de 20 ºC a 28ºC e o bom desenvolvimento dos frutos, de 18 ºC a 30 ºC. A abóbora é muito sensível ao frio e não suporta geadas.', 'As covas devem ter dimensões aproximadas de 40 cm de comprimento, 30 cm de largura e 25 cm de profundidade, já os sulcos devem ter cerca de 30 cm de largura e 25 de profundidade.\r\nO distanciamento aconselhado é de 2 a 3 metros entre linhas e de 1 a 2 metros entre cada planta na mesma fileira.', 'As abóboras crescem melhor em locais ensolarados, mas podem ser cultivadas com sombra parcial, desde que haja uma alta luminosidade.', 'Irrigue de forma a manter o solo sempre úmido, sem que fique encharcado. Plantas adultas podem ser resistentes a curtos períodos de seca.\r\nA abóbora geralmente cresce bastante, assim uma vara pode ser fincada verticalmente no local onde as sementes são semeadas para marcar o centro da futura planta, permitindo direcionar a irrigação e evitar o desperdício de água.', 'O tempo estimado desde o momento do plantio da abóbora até a colheita é de aproximadamente cinco meses. As morangas demoram de 110 a 120 dias. É claro que isso depende dos fatores climáticos e da quantidade de água recebida.');

-- --------------------------------------------------------

--
-- Table structure for table `historico`
--

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `cod_historico` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `cod_produto` int(11) DEFAULT NULL,
  `quantidade_produto` int(11) DEFAULT NULL,
  `data_` varchar(20) DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`cod_historico`),
  KEY `cod_usuario` (`cod_usuario`),
  KEY `cod_produto` (`cod_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historico`
--

INSERT INTO `historico` (`cod_historico`, `cod_usuario`, `cod_produto`, `quantidade_produto`, `data_`, `total`) VALUES
(1, 2, 12, 5, '20-07-2021', 25),
(2, 2, 11, 2, '20-07-2021', 3.78),
(18, 2, 11, 50, '20-07-2021', 94.5),
(19, 2, 12, 50, '20-07-2021', 250);

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `cod_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(1000) DEFAULT NULL,
  `vitaminas` varchar(1000) DEFAULT NULL,
  `beneficios` varchar(1000) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `cod_cultivo` int(255) NOT NULL,
  `imagem` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`cod_produto`),
  KEY `cod_cultivo` (`cod_cultivo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`cod_produto`, `nome`, `vitaminas`, `beneficios`, `preco`, `cod_cultivo`, `imagem`) VALUES
(11, 'Abóbora Japonesa', 'aaaaaa', 'aaaaaa', 1.89, 4, '69f008040fdd6057f2e988a9b3b0956f.png'),
(12, 'Tomate', 'bbbbbbb', 'bbbbbbb', 5, 4, '484b19ed7bdcc1d694646966cf6c884e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nome`, `senha`, `email`) VALUES
(1, 'ADM', 'admin', 'admin@admin.com'),
(2, 'Rafael', '123456', 'rafael@gmail.com'),
(3, 'Lorena', '1234', 'lorena@gmail.com'),
(4, 'Luiza', '123l', 'luiza@gmail.com'),
(5, 'Pirolla', '123', 'pirolla@gmail.com'),
(6, 'Pirolla', '12345', 'pirolla@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `cod_produto` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`),
  ADD CONSTRAINT `cod_usuario` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`);

--
-- Constraints for table `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `cod_cultivo` FOREIGN KEY (`cod_cultivo`) REFERENCES `cultivo` (`cod_cultivo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
