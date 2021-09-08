-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Ago-2021 às 20:13
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
-- Banco de dados: `plantasou`
--
CREATE DATABASE IF NOT EXISTS `plantasou` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `plantasou`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `cultivo`
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
  `id_imagem` int(11) NOT NULL,
  `src` varchar(1000) NOT NULL,
  `nome_php` varchar(30) NOT NULL,
  PRIMARY KEY (`cod_cultivo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cultivo`
--

INSERT INTO `cultivo` (`cod_cultivo`, `nome`, `clima`, `plantio`, `luminosidade`, `irrigacao`, `temp_colheita`, `id_imagem`, `src`, `nome_php`) VALUES
(4, 'Abóbora Japonesa', 'A temperatura ideal para germinação vai de 20 ºC a 28ºC e o bom desenvolvimento dos frutos, de 18 ºC a 30 ºC. A abóbora é muito sensível ao frio e não suporta geadas.', 'As covas devem ter dimensões aproximadas de 40 cm de comprimento, 30 cm de largura e 25 cm de profundidade, já os sulcos devem ter cerca de 30 cm de largura e 25 de profundidade.\r\nO distanciamento aconselhado é de 2 a 3 metros entre linhas e de 1 a 2 metros entre cada planta na mesma fileira.', 'As abóboras crescem melhor em locais ensolarados, mas podem ser cultivadas com sombra parcial, desde que haja uma alta luminosidade.', 'Irrigue de forma a manter o solo sempre úmido, sem que fique encharcado. Plantas adultas podem ser resistentes a curtos períodos de seca.\r\nA abóbora geralmente cresce bastante, assim uma vara pode ser fincada verticalmente no local onde as sementes são semeadas para marcar o centro da futura planta, permitindo direcionar a irrigação e evitar o desperdício de água.', 'O tempo estimado desde o momento do plantio da abóbora até a colheita é de aproximadamente cinco meses. As morangas demoram de 110 a 120 dias. É claro que isso depende dos fatores climáticos e da quantidade de água recebida.', 1, 'abobora.jpg', 'abobora'),
(5, 'Tomate', 'Por ser um alimento com origem em áreas quentes, não suporta temperaturas muito frias, a temperatura ideal é entre 20 ºC e 26 ºC e não deve ultrapassar 35 ºC.', 'Os tomates podem ser plantados em pequenos vasos e plantas, não necessitando de grandes áreas para que a planta se desenvolva com saúde e vigor. No caso de plantação em pequenas hortas, é possível produzir tomates maiores e em grandes quantidades, mas para isso é preciso estar atento a algumas orientações básicas de como plantar tomate orgânico.\r\nNa hora de plantar os tomates é preciso muita atenção por parte do produtor. É recomendado realizar pequenas mudas do tomateiro antes de colocá-lo no solo. Em uma sementeira, coloque de duas a cinco sementes em cada buraco, com cerca de 1cm de profundidade. Caso opte por tomates menores ou do tipo anão, faça o plantio diretamente no vaso ou na jardineira escolhida, nessa situação não há necessidade de transportar o cultivo.\r\n', 'Precisa de alta luminosidade e recebe luz solar por no mínimo 6 horas.', 'Deve estar sempre bem irrigado, duas vezes ao dia seria o suficiente.', 'O período de colheita irá variar de acordo com o tipo de tomate plantado e com sua forma de desenvolvimento. Tomates com crescimento regular do tipo determinado, que crescem em moitas e dão frutos em menos tempo, poderão ser colhidos entre 7 e 8 semanas. Já os tomates maiores, com crescimento do tipo indeterminado, podem demorar entre 10 e 16 semanas para amadurecerem.', 2, 'tomate.jpeg', 'tomate'),
(6, 'Alho-poró', 'Se desenvolve melhor em clima ameno, com temperaturas entre 13°C e 24°C, mas pode ser cultivado em clima mais quente se o solo for mantido bem úmido, embora normalmente seja necessário um período de temperaturas relativamente baixas para seu desenvolvimento adequado.', 'O espaçamento recomendado é de 30 a 50 cm de profundidade e de 15 a 20 cm entre as plantas.\r\nO plantio de alho-poró é feito por sementes, que são semeadas aproximadamente a 1 cm de profundidade, no local definitivo ou em sementeiras. Neste último caso, o transplante é feito quando as mudas estão com 10 a 20 cm de altura, o que ocorre aproximadamente dois meses após a semeadura. As mudas devem ficar com o pseudocaule quase totalmente enterrado no solo, deixando apenas a extremidade com a folhagem visível.', 'Cultive preferencialmente com luz solar direta ao menos por algumas horas diariamente. Também pode ser cultivado em sombra parcial com boa luminosidade.', 'Irrigue com frequência para que o solo seja mantido úmido, mas sem que fique encharcado.', 'A colheita do alho-poró é feita geralmente entre 120 e 150 dias após o plantio, dependendo das condições de cultivo. As plantas são geralmente colhidas quando seus pseudocaules têm de 2,5 a 4 cm de diâmetro. A planta é arrancada inteira, e suas folhas podem ser aparadas. As folhas são comestíveis, mas são menos apreciadas e usadas que o pseudocaule.', 3, 'alho_poro.jpeg', 'alho_poro'),
(7, 'Mexerica', 'Temperatura entre 23ºC e 32ºC.', 'Faça covas com 50 centímetros de profundidade e de largura. Para os espaçamentos, recomenda-se medidas de 7 metros entre linhas e 3,5 metros entre plantas.\r\nPara maior desenvolvimento escolha a área de plantio que mais se adequa à fruteira. Certifique-se de que o plantio ocorre em solo profundo, permeável e com boa fertilidade.', 'Local bem iluminado, pois a espécie precisa de sol pleno para se desenvolver.', 'A irrigação deve ser constante.', 'Seu ponto de colheita ideal é quando o fruto começa a mudar de cor, passando do verde para amarela/alaranjada.', 4, 'mexerica.jpeg', 'mexerica');

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
  `data_` varchar(20) DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`cod_historico`),
  KEY `cod_usuario` (`cod_usuario`),
  KEY `cod_produto` (`cod_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`cod_historico`, `cod_usuario`, `cod_produto`, `quantidade_produto`, `data_`, `total`) VALUES
(1, 2, 12, 5, '20-07-2021', 25),
(2, 2, 11, 2, '20-07-2021', 3.78),
(18, 2, 11, 50, '20-07-2021', 94.5),
(19, 2, 12, 50, '20-07-2021', 250);

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
  `cod_cultivo` int(255) NOT NULL,
  `imagem` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`cod_produto`),
  KEY `cod_cultivo` (`cod_cultivo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod_produto`, `nome`, `vitaminas`, `beneficios`, `preco`, `cod_cultivo`, `imagem`) VALUES
(11, 'Abóbora Japonesa', 'Abóbora é um vegetal com poucas calorias e rica em potássio, vitamina C e betacaroteno;', ' Ela benéfica para a visão, coração, pele e imunidade.', 1.89, 4, 'abobora.jpg'),
(12, 'Tomate', 'Com uma alta quantidade de vitaminas A, C, K e cálcio;', 'É rico em licopeno, um antioxidante que ajuda a proteger a pele dos danos causados pela luz do sol. O consumo frequente do alimento ajuda na textura e na saúde da sua pele, já que ajuda a minimizar poros dilatados, curar a acne e erupções cutâneas ou tratar pequenas queimaduras. Devido à presença de vitamina K e cálcio, o tomate ajuda a fortalecer e reparar os ossos.', 5, 4, 'tomate.jpeg'),
(13, 'Alho-poró', 'É rica em fibras, carotenóides, vitamina E, A, C e minerais como selênio, cálcio, zinco, cobre e manganês, além de ter poucas calorias;', 'Ela ajuda na visão, na digestão e no fortalecimento dos ossos.', 2.9, 4, 'alho_poro.jpeg'),
(14, 'Mexerica', 'É pobre em gorduras e fonte de vitaminas C, A e B6. Além disso, contém tiamina, folato, potássio, cálcio, ferro e magnésio.', 'Previne envelhecimento precoce, reduz inflamações, alivia a prisão de ventre, aumenta a imunidade, afasta doenças hepáticas e previne anemia.', 3, 4, 'mexerica.jpeg');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nome`, `senha`, `email`) VALUES
(1, 'ADM', 'admin', 'admin@admin.com'),
(2, 'Rafael', '123456', 'rafael@gmail.com'),
(3, 'Lorena', '1234', 'lorena@gmail.com'),
(4, 'Luiza', '123l', 'luiza@gmail.com'),
(5, 'Pirolla', '123', 'pirolla@gmail.com'),
(6, 'Pirolla', '12345', 'pirolla@gmail.com');

--
-- Restrições para despejos de tabelas
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
