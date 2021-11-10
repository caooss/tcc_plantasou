-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10-Nov-2021 às 20:50
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
  `src` varchar(1000) NOT NULL,
  `nome_php` varchar(30) NOT NULL,
  PRIMARY KEY (`cod_cultivo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cultivo`
--

INSERT INTO `cultivo` (`cod_cultivo`, `nome`, `clima`, `plantio`, `luminosidade`, `irrigacao`, `temp_colheita`, `src`, `nome_php`) VALUES
(4, 'Abóbora Japonesa', 'A temperatura ideal para germinação vai de 20 ºC a 28ºC e o bom desenvolvimento dos frutos, de 18 ºC a 30 ºC. A abóbora é muito sensível ao frio e não suporta geadas.', 'As covas devem ter dimensões aproximadas de 40 cm de comprimento, 30 cm de largura e 25 cm de profundidade, já os sulcos devem ter cerca de 30 cm de largura e 25 de profundidade.\r\nO distanciamento aconselhado é de 2 a 3 metros entre linhas e de 1 a 2 metros entre cada planta na mesma fileira.', 'As abóboras crescem melhor em locais ensolarados, mas podem ser cultivadas com sombra parcial, desde que haja uma alta luminosidade.', 'Irrigue de forma a manter o solo sempre úmido, sem que fique encharcado. Plantas adultas podem ser resistentes a curtos períodos de seca.\r\nA abóbora geralmente cresce bastante, assim uma vara pode ser fincada verticalmente no local onde as sementes são semeadas para marcar o centro da futura planta, permitindo direcionar a irrigação e evitar o desperdício de água.', 'O tempo estimado desde o momento do plantio da abóbora até a colheita é de aproximadamente cinco meses. As morangas demoram de 110 a 120 dias. É claro que isso depende dos fatores climáticos e da quantidade de água recebida.', '69f008040fdd6057f2e988a9b3b0956f.jpg', 'abobora'),
(5, 'Tomate', 'Por ser um alimento com origem em áreas quentes, não suporta temperaturas muito frias, a temperatura ideal é entre 20 ºC e 26 ºC e não deve ultrapassar 35 ºC.', 'Os tomates podem ser plantados em pequenos vasos e plantas, não necessitando de grandes áreas para que a planta se desenvolva com saúde e vigor. No caso de plantação em pequenas hortas, é possível produzir tomates maiores e em grandes quantidades, mas para isso é preciso estar atento a algumas orientações básicas de como plantar tomate orgânico. Na hora de plantar os tomates é preciso muita atenção por parte do produtor. É recomendado realizar pequenas mudas do tomateiro antes de colocá-lo no solo. Em uma sementeira, coloque de duas a cinco sementes em cada buraco, com cerca de 1cm de profundidade. Caso opte por tomates menores ou do tipo anão, faça o plantio diretamente no vaso ou na jardineira escolhida, nessa situação não há necessidade de transportar o cultivo.', 'Precisa de alta luminosidade e recebe luz solar por no mínimo 6 horas.', 'Deve estar sempre bem irrigado, duas vezes ao dia seria o suficiente.', 'O período de colheita irá variar de acordo com o tipo de tomate plantado e com sua forma de desenvolvimento. Tomates com crescimento regular do tipo determinado, que crescem em moitas e dão frutos em menos tempo, poderão ser colhidos entre 7 e 8 semanas. Já os tomates maiores, com crescimento do tipo indeterminado, podem demorar entre 10 e 16 semanas para amadurecerem.', 'c8f81d13e4081dfa2eb366d7a41c35ce.jpg', 'tomate'),
(6, 'Alho-poró', 'Se desenvolve melhor em clima ameno, com temperaturas entre 13°C e 24°C, mas pode ser cultivado em clima mais quente se o solo for mantido bem úmido, embora normalmente seja necessário um período de temperaturas relativamente baixas para seu desenvolvimento adequado.', 'O espaçamento recomendado é de 30 a 50 cm de profundidade e de 15 a 20 cm entre as plantas.\r\nO plantio de alho-poró é feito por sementes, que são semeadas aproximadamente a 1 cm de profundidade, no local definitivo ou em sementeiras. Neste último caso, o transplante é feito quando as mudas estão com 10 a 20 cm de altura, o que ocorre aproximadamente dois meses após a semeadura. As mudas devem ficar com o pseudocaule quase totalmente enterrado no solo, deixando apenas a extremidade com a folhagem visível.', 'Cultive preferencialmente com luz solar direta ao menos por algumas horas diariamente. Também pode ser cultivado em sombra parcial com boa luminosidade.', 'Irrigue com frequência para que o solo seja mantido úmido, mas sem que fique encharcado.', 'A colheita do alho-poró é feita geralmente entre 120 e 150 dias após o plantio, dependendo das condições de cultivo. As plantas são geralmente colhidas quando seus pseudocaules têm de 2,5 a 4 cm de diâmetro. A planta é arrancada inteira, e suas folhas podem ser aparadas. As folhas são comestíveis, mas são menos apreciadas e usadas que o pseudocaule.', '102b3273f1c6c867309fe6bb2b198c65.jpg', 'alho_poro'),
(7, 'Mexerica', 'Temperatura entre 23ºC e 32ºC.', 'Faça covas com 50 centímetros de profundidade e de largura. Para os espaçamentos, recomenda-se medidas de 7 metros entre linhas e 3,5 metros entre plantas. Para maior desenvolvimento escolha a área de plantio que mais se adequa à fruteira. Certifique-se de que o plantio ocorre em solo profundo, permeável e com boa fertilidade.', 'Local bem iluminado, pois a espécie precisa de sol pleno para se desenvolver.', 'A irrigação deve ser constante.', 'Seu ponto de colheita ideal é quando o fruto começa a mudar de cor, passando do verde para amarela/alaranjada.', '2ace5144c5d6b6898603e4e8a6b69069.jpg', 'mexerica'),
(8, 'Abobrinha Paulista', 'As abobrinhas não toleram as baixas temperaturas e são sensíveis a geadas. Elas preferem regiões com temperatura no patamar de 20 a 35 graus célsius.\r\nSeguindo a recomendação de espaçamento para a cultivação, geralmente vai de 0,9 m x 0,9 m a 1 m x 1,5 m.', 'Semeie as sementes de abobrinha no local definitivo da horta, colocando 2 ou 3 sementes por cova a cerca de 2 cm de profundidade.', 'Preferencialmente deve ser cultivada em locais ensolarados, mas pode ser cultivada em sombra parcial, desde que haja uma alta luminosidade.', 'Irrigue de forma a manter o solo sempre úmido, sem que fique encharcado.', 'A colheita da abobrinha pode começar de 45 a 80 dias depois do plantio, dependendo das condições do cultivo.', '31dd7062c5feb87112fdcd73c89fe74f.jpg', 'abobrinha_paulista'),
(9, 'Melancia', 'Preferência de clima quente, na faixa entre 21ºC e 35ºC, mas ela suporta temperaturas de até 15ºC.', 'Preferência de solos de textura média, arenoso, profundos, bem drenados e com boa disponibilidade de nutrientes. Evite solos pesados e sujeitos a encharcamentos.\r\nO indicado é de 1 metro entre covas e 3 metros entre fileiras.', 'Luminosidade e temperatura entre 18ºC e 30ºC.', 'Deve ser feita diariamente com pouca água até a germinação da planta. Da germinação até a frutificação, faça a irrigação com maior quantidade de água menos vezes por dia.', 'Varia de 65 a 100 dias após o plantio.', '4c3f7366737a72793aecb0c44d2afcca.png', 'melancia'),
(10, 'Melão', 'O melão se desenvolve melhor em uma temperatura entre 18°C e 35°C.', 'Faça buracos de 2 a 3 centímetros de profundidade, coloque de duas a três sementes e cubra com terra compactando levemente.\r\nO melão exige um distanciamento de três a cinco metros entre eles e outras plantas.', 'O melão precisa ficar exposto à luz solar diariamente.', 'O cultivo de melão necessita ser irrigado diariamente, mas deve ser feito até três dias antes da colheita para aumentar os açúcares no fruto.', 'A colheita pode ser feita 55 a 75 dias depois do plantio.', '946f8ac8da5063af3bcfd7adf12ef61e.png', 'melao'),
(11, 'Beterraba', 'A beterraba gosta mais de climas amenos, porém alguns cultivares vão bem em temperaturas mais altas. No geral, deve-se respeitar um intervalo entre 10ºC e 24ºC.', 'O plantio direto pode ser por semeadura em canteiros definitivos com 30 cm de altura e 0,9 metros de largura.  Faça sulcos de 30cm e com 2cm de profundidade, colocando uma semente a cada 5 cm ou caso deseje, você pode cultivar beterraba em vasos.\r\nPara não errar, semeie e plante entre os meses de abril e junho. O cultivo pode-se dar em sistema de semeadura direta e plantio por mudas. As mudas podem ser semeadas em tubetes ou sementeiras, o que ajuda a evitar a contaminação da semente. Para o plantio direto, recomendo colocar as sementes em água durante 12 horas e em seguida lavar em água corrente, deixando secar a sombra.', 'Beterraba gosta de luz. Minha dica é deixar ao menos algumas horas por dia sob luz direta do sol. Porém, vale lembrar que se trata de um tubérculo que gosta de temperaturas amenas.', 'Irrigue com frequência deixando o solo úmido, mas nunca deixe o solo ficar encharcado. Isso prejudica o desenvolvimento da beterraba.', 'A colheita da beterraba orgânica varia de acordo com seu cultivo, mas em geral as raízes são colhidas quando apresentarem diâmetro de 8 a 12 cm e comprimento de 7 cm, que ocorre mais ou menos em 80 dias após a semeadura. Não deixe passar muito do tempo de colheita, pois as raízes ficam duras.', '9a9c14baa517ad25d57c2b6a775dffe3.png', 'beterraba'),
(12, 'Pepino', 'O clima ideal para o plantio do pepineiro é um clima quente, de temperaturas que variam de 26ºC a 28ºC, ao abrigo do vento.', 'Se for semear, faça isso já no local definitivo, pois as mudas de pepino não toleram bem o transplante. A semeadura deve ser feita em local com temperaturas acima de 20ºC, a 2 cm de profundidade, de 4 a 6 sementes por cova. As sementes irão germinar de 5 a 15 dias.\r\nPara plantar pepino tutorado, o espaçamento recomendado é de 60 cm a 1 m entre linhas e 45 cm entre as plantas. Para rasteiras, o espaçamento entre linhas é de 2 m e de 75 cm a 1 m entre as plantas e, por fim, para o caso de pepinos para conserva, o espaçamento entre linhas é de 1 m e 20 cm entre as plantas.', 'O pepino precisa de luz solar direta por pelo menos 4 horas todos os dias.', 'A irrigação deve ocorrer sempre que perceber que o solo está secando. Lembre-se de nunca encharcar o solo, para não apodrecer as raízes.', 'A colheita pode ser realizada de 50 a 60 dias do plantio, mas isso depende da cultivar e do uso. Os pepinos destinados a conservas geralmente são colhidos mais cedo que os demais, quando atingem de 3 cm a 9 cm de comprimento. Faça em torno de 3 colheitas por semana, pois isso estimula a produtividade.', '7e2dcbf5ee9e65c98604374e7b430ac2.png', 'pepino'),
(13, 'Cebolinha', 'A cebolinha se desenvolve melhor em temperaturas entre 13°C e 14°C.', 'Afofe o solo e faça buracos de 3 cm, depois coloque 3 sementes em cada buraco que fizer e coloque a terra por cima, compactando gentilmente. Em dias quentes a germinação irá ser mais rápida, já em dias frios será um processo mais lento.\r\nÉ necessário que a profundidade do solo seja de pelo menos 10 cm. Entre uma cebolinha e outra planta deverá ter 15 cm de distância.', 'A cebolinha necessita de no mínimo 4 horas de sol direto.', 'A cebolinha deve ser regada diariamente sem exagero, apenas para umedecer o solo.', 'A cebolinha pode ser colhida 90 dias depois do plantio. Para colher, basta cortar na parte em que a cor verde escura começa.', 'd0c1a00663136f6a830eff9babd98bc2.png', 'cebolinha');

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
  `cod_tabela` int(11) NOT NULL,
  PRIMARY KEY (`cod_historico`),
  KEY `cod_usuario` (`cod_usuario`),
  KEY `cod_produto` (`cod_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`cod_historico`, `cod_usuario`, `cod_produto`, `quantidade_produto`, `data_`, `cod_tabela`) VALUES
(1, 2, 12, 5, '20-07-2021', 1),
(4, 2, 11, 2, '20-07-2021', 1),
(18, 2, 11, 50, '20-07-2021', 2),
(28, 2, 11, 1, '30-07-2021', 3),
(29, 2, 12, 1, '30-07-2021', 3),
(30, 2, 11, 2, '30-07-2021', 4),
(31, 2, 12, 2, '30-07-2021', 4),
(32, 2, 14, 1, '06-10-2021', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod_produto`, `nome`, `vitaminas`, `beneficios`, `preco`, `cod_cultivo`, `imagem`) VALUES
(11, 'Abóbora Japonesa', 'Abóbora é um vegetal com poucas calorias e rica em potássio, vitamina C e betacaroteno;', 'Ela benéfica para a visão, coração, pele e imunidade.', 19.3, 4, '69f008040fdd6057f2e988a9b3b0956f.jpg'),
(12, 'Tomate', 'Com uma alta quantidade de vitaminas A, C, K e cálcio;', 'É rico em licopeno, um antioxidante que ajuda a proteger a pele dos danos causados pela luz do sol. O consumo frequente do alimento ajuda na textura e na saúde da sua pele, já que ajuda a minimizar poros dilatados, curar a acne e erupções cutâneas ou tratar pequenas queimaduras. Devido à presença de vitamina K e cálcio, o tomate ajuda a fortalecer e reparar os ossos.', 26.4, 5, 'c8f81d13e4081dfa2eb366d7a41c35ce.jpg'),
(13, 'Alho-poró', 'É rica em fibras, carotenóides, vitamina E, A, C e minerais como selênio, cálcio, zinco, cobre e manganês, além de ter poucas calorias;', 'Ela ajuda na visão, na digestão e no fortalecimento dos ossos.', 12.6, 6, '102b3273f1c6c867309fe6bb2b198c65.jpg'),
(14, 'Mexerica', 'É pobre em gorduras e fonte de vitaminas C, A e B6. Além disso, contém tiamina, folato, potássio, cálcio, ferro e magnésio.', 'Previne envelhecimento precoce, reduz inflamações, alivia a prisão de ventre, aumenta a imunidade, afasta doenças hepáticas e previne anemia.', 25, 7, '2ace5144c5d6b6898603e4e8a6b69069.jpg'),
(15, 'Abobrinha Paulista', 'Vitamina E, A, C', 'A abobrinha é rica em fibras, carotenoides e minerais como selênio, cálcio, zinco, cobre e manganês, além de ter poucas calorias.', 7.98, 8, 'c51724ec0140e28eea04e34603c79848.jpg'),
(16, 'Melancia', 'A melancia é uma fruta bastante refrescante que possui vitamina C, A, além de minerais.', 'Por ter muita água, ela ajuda a hidratar o organismo. O consumo regular ajuda a prevenir doenças cardiovasculares e melhora a imunidade.', 6.2, 9, '39eb2214d8eb418a5076b70d6c78ccc9.png'),
(17, 'Melão', 'Vitamina C, A e Complexo B', 'O melão é uma fruta com baixas calorias que tem propriedades diuréticas, ajudando a diminuir a retenção de líquidos e antioxidantes, prevenindo o envelhecimento precoce da pele. Contém minerais como o cálcio, potássio e fibras. É um alimento rico em água que melhora o funcionamento do intestino, evita a prisão de ventre e ajuda na hidratação do corpo, podendo ser uma opção saudável e refrescante nos dias quentes.', 6.08, 10, '8b978d5d0de5f71d17fde883d687bcf3.png'),
(18, 'Beterraba', 'Rica em vitaminas A, B, C e minerais como sódio, potássio, zinco, magnésio e ferro.', 'A planta roxa também atua na prevenção de doenças e do envelhecimento dos tecidos.', 3.06, 11, 'ae4d372c269e019a84bd4d143f2d1d55.png'),
(19, 'Pepino', 'O vegetal é fonte de vitaminas A, C, K e do complexo B e contém minerais como magnésio, potássio, fósforo, cálcio e manganês, além de antioxidantes.', 'O pepino ajuda a emagrecer, porque é pobre em calorias e dá a sensação de saciedade; Melhora a contração e saúde muscular, por conter potássio e magnésio; Melhora a circulação sanguínea, por ser pobre em gorduras e rico em água; Mantém a hidratação, por ser feito principalmente de água', 23.7, 12, 'b7fb1fac30ba5891233083caca21cb7a.png'),
(20, 'Cebolinha', 'Vitamina A e C', 'Ela contém antioxidantes e substâncias anti-inflamatórias em grande quantidade.', 25.24, 13, '735d834f271405f6d1067f4a28d6822c.png');

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
(6, 'Jack', '456', 'jaques@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `cod_produto` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`) ON DELETE CASCADE,
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
