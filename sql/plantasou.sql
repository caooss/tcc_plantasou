-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2021 at 06:13 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cultivo`
--

INSERT INTO `cultivo` (`cod_cultivo`, `nome`, `clima`, `plantio`, `luminosidade`, `irrigacao`, `temp_colheita`) VALUES
(1, 'Abóbora Japonesa', 'A temperatura ideal para germinação vai de 20 ºC a 28ºC e o bom desenvolvimento dos frutos, de 18 ºC a 30 ºC. A abóbora é muito sensível ao frio e não suporta geadas.', 'As covas devem ter dimensões aproximadas de 40 cm de comprimento, 30 cm de largura e 25 cm de profundidade, já os sulcos devem ter cerca de 30 cm de largura e 25 de profundidade.\r\nO distanciamento aconselhado é de 2 a 3 metros entre linhas e de 1 a 2 metros entre cada planta na mesma fileira.', 'As abóboras crescem melhor em locais ensolarados, mas podem ser cultivadas com sombra parcial, desde que haja uma alta luminosidade.', 'Irrigue de forma a manter o solo sempre úmido, sem que fique encharcado. Plantas adultas podem ser resistentes a curtos períodos de seca.\r\nA abóbora geralmente cresce bastante, assim uma vara pode ser fincada verticalmente no local onde as sementes são semeadas para marcar o centro da futura planta, permitindo direcionar a irrigação e evitar o desperdício de água.', 'O tempo estimado desde o momento do plantio da abóbora até a colheita é de aproximadamente cinco meses. As morangas demoram de 110 a 120 dias. É claro que isso depende dos fatores climáticos e da quantidade de água recebida.'),
(2, 'Tomate', 'Por ser um alimento com origem em áreas quentes, não suporta temperaturas muito frias, a temperatura ideal é entre 20 ºC e 26 ºC e não deve ultrapassar 35 ºC.', 'Os tomates podem ser plantados em pequenos vasos e plantas, não necessitando de grandes áreas para que a planta se desenvolva com saúde e vigor. No caso de plantação em pequenas hortas, é possível produzir tomates maiores e em grandes quantidades, mas para isso é preciso estar atento a algumas orientações básicas de como plantar tomate orgânico.\r\nNa hora de plantar os tomates é preciso muita atenção por parte do produtor. É recomendado realizar pequenas mudas do tomateiro antes de colocá-lo no solo. Em uma sementeira, coloque de duas a cinco sementes em cada buraco, com cerca de 1cm de profundidade. Caso opte por tomates menores ou do tipo anão, faça o plantio diretamente no vaso ou na jardineira escolhida, nessa situação não há necessidade de transportar o cultivo.', 'Precisa de alta luminosidade e recebe luz solar por no mínimo 6 horas.', 'Deve estar sempre bem irrigado, duas vezes ao dia seria o suficiente.', 'O período de colheita irá variar de acordo com o tipo de tomate plantado e com sua forma de desenvolvimento. Tomates com crescimento regular do tipo determinado, que crescem em moitas e dão frutos em menos tempo, poderão ser colhidos entre 7 e 8 semanas. Já os tomates maiores, com crescimento do tipo indeterminado, podem demorar entre 10 e 16 semanas para amadurecerem.'),
(3, 'Caju', 'Tropical, com temperatura média de 27ºC.', 'Recomenda-se distância mínima de sete metros entre as covas, cujas medidas devem ser de 40x40x40 centímetros, o espaçamento indicado é de dez metros.\r\nEmbora se desenvolva em qualquer tipo de solo, o leve é o mais adequado para o cultivo. A planta também tolera solos mais argilosos, mas nesse caso é importante que o terreno tenha boa drenagem.', 'O cajueiro se desenvolve bem em sol pleno.', 'Em locais bem secos, pelo menos no primeiro ano você deve fazer uma irrigação no plantio do caju. A cada 15 dias, irriga-se aproximadamente 15 litros de água por planta.', 'Um ano após o plantio.');

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
  `preco` float DEFAULT NULL,
  `cod_cultivo` int(255) NOT NULL,
  `imagem` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`cod_produto`),
  KEY `cod_cultivo` (`cod_cultivo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`cod_produto`, `nome`, `vitaminas`, `beneficios`, `preco`, `cod_cultivo`, `imagem`) VALUES
(2, 'Abóbora Japonesa', 'É rico em vitamina A e C, possui fibras, potássio, magnésio, cálcio, vitamina E, ferro e vitaminas B1, B3, B5 e B6.', 'Benéfico para a visão', 1.89, 1, '0641ab8e01b7f3b5fe5c340082784021.png'),
(8, 'Tomate', 'Com uma alta quantidade de vitaminas A e C, o fruto melhora bastante a visão e ainda pode reduzir o risco de desenvolver cataratas. Devido à presença de vitamina K e cálcio, o tomate ajuda a fortalecer e reparar os ossos.', 'O  tomate é rico em licopeno, um antioxidante que ajuda a proteger a pele dos danos causados pela luz do sol. O consumo frequente do alimento ajuda na textura e na saúde da sua pele, já que ajuda a minimizar poros dilatados, curar a acne e erupções cutâneas ou tratar pequenas queimaduras.', 0.1, 2, 'a6c049eb3e152678f4305e8cfb7d64f3.jpg'),
(9, 'Caju', 'O caju é um alimento rico em fibras e vitamina C, além de possuir fósforo, magnésio, potássio, zinco, ferro, cobre e cálcio.', 'Ele é interessante para melhorar a imunidade, proteger a visão, ajudar na saúde do coração e até mesmo no controle do diabetes.', 5, 3, '340133f33ae76107c32c5ee4d927769bjpeg');

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
(1, 'Rafael', 'admin', 'admin@admin.com'),
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
