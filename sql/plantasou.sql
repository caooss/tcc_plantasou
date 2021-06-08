-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 08-Jun-2021 às 17:10
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

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
-- Estrutura da tabela `cultivo`
--

DROP TABLE IF EXISTS `cultivo`;
CREATE TABLE IF NOT EXISTS `cultivo` (
  `cod_cultivo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `clima` varchar(4000) DEFAULT NULL,
  `espaco` varchar(4000) DEFAULT NULL,
  `plantio` varchar(4000) DEFAULT NULL,
  `luminosidade` varchar(4000) DEFAULT NULL,
  `irrigacao` varchar(4000) DEFAULT NULL,
  `temp_colheita` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`cod_cultivo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cultivo`
--

INSERT INTO `cultivo` (`cod_cultivo`, `nome`, `clima`, `espaco`, `plantio`, `luminosidade`, `irrigacao`, `temp_colheita`) VALUES
(1, 'Abóbora', 'a tempera ideal para germinação vai 25 ºC a 30 ºC e o bom desenvolvimento dos frutos, de 18 ºC a 30 ºC.', 'A abóbora é muito sensível ao frio e não suporta geadas. São adaptadas às temperaturas de primavera, verão e outono de Norte a Sul do Brasil. \r\n                              Elas se desenvolvem bem em solos com pH entre 6 e 6,5.', 'As covas devem ter dimensões aproximadas de 40 cm de comprimento, 30 cm de largura e 25 cm de profundidade, já os sulcos devem ter cerca de 30 cm de largura e 25 de profundidade.\r\nPara um cultivo mais produtivo, recomenda-se que o terreno seja plano e extenso para que as abóboras cresçam sem restrições.\r\nO plantio pode ser feito de duas maneiras: depositando as sementes diretamente na terra ou cultivando mudas, depositadas em copinhos ou vasos de papel ou plástico.\r\nPara o método com sementes, o correto é colocar de duas a três por cova, entre 1 cm e 3 cm de profundidade. Se a optar por mudas, o aconselhável é transplantá-las para a terra após o surgimento de duas folhas.', 'As abóboras e morangas crescem melhor em locais ensolarados, mas podem ser cultivadas com sombra parcial, desde que haja uma alta luminosidade.', 'Irrigue de forma a manter o solo sempre úmido, sem que fique encharcado. Plantas adultas podem ser resistentes a curtos períodos de seca.\r\nA aboboreira geralmente cresce bastante, assim uma vara pode ser fincada verticalmente no local onde as sementes são semeadas para marcar o centro da futura planta, permitindo direcionar a irrigação e evitar o desperdício de água.', 'O tempo estimado desde o momento do plantio da abóbora até a colheita é de aproximadamente cinco meses. As morangas demoram de 110 a 120 dias. É claro que isso depende dos fatores climáticos e da quantidade de água recebida.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
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
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `cod_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(1000) DEFAULT NULL,
  `vitaminas` varchar(1000) DEFAULT NULL,
  `beneficios` varchar(1000) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `cod_cultivo` int(11) NOT NULL,
  PRIMARY KEY (`cod_produto`),
  KEY `cod_cultivo` (`cod_cultivo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod_produto`, `nome`, `vitaminas`, `beneficios`, `preco`, `cod_cultivo`) VALUES
(2, 'Abóbora', 'É rico em vitamina A e C, possui fibras, potássio, magnésio, cálcio, vitamina E, ferro e vitaminas B1, B3, B5 e B6.', 'Benéfico para a visão', 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nome`, `senha`, `email`) VALUES
(1, 'Rafael', 'admin', 'admin@admin.com'),
(2, 'Rafael', '123456', 'rafael@gmail.com'),
(3, 'Lorena', '1234', 'lorena@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `cod_produto` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`),
  ADD CONSTRAINT `cod_usuario` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `cod_cultivo` FOREIGN KEY (`cod_cultivo`) REFERENCES `cultivo` (`cod_cultivo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
