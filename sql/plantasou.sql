-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2021 at 08:27 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `cultivo`
--

DROP TABLE IF EXISTS `cultivo`;
CREATE TABLE IF NOT EXISTS `cultivo` (
  `cod_cultivo` int(11) NOT NULL AUTO_INCREMENT,
  `clima` varchar(4000) DEFAULT NULL,
  `espaco` varchar(4000) DEFAULT NULL,
  `plantio` varchar(4000) DEFAULT NULL,
  `luminosidade` varchar(4000) DEFAULT NULL,
  `irrigacao` varchar(4000) DEFAULT NULL,
  `temp_colheita` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`cod_cultivo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `data` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`cod_historico`),
  KEY `cod_usuario` (`cod_usuario`),
  KEY `cod_produto` (`cod_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `preco` varchar(1000) DEFAULT NULL,
  `cod_cultivo` int(11) NOT NULL,
  PRIMARY KEY (`cod_produto`),
  KEY `cod_cultivo` (`cod_cultivo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
