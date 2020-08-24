-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Ago-2020 às 11:43
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

DROP TABLE IF EXISTS `carros`;
CREATE TABLE IF NOT EXISTS `carros` (
  `id_carros` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(30) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `ano` year(4) DEFAULT NULL,
  `placa` varchar(7) DEFAULT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `id_c` int(11) NOT NULL,
  PRIMARY KEY (`id_carros`),
  KEY `id_c` (`id_c`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id_carros`, `marca`, `modelo`, `ano`, `placa`, `cor`, `id_c`) VALUES
(1, 'Chevrolet', 'Onix', 2017, 'CVK9999', 'Branco', 1),
(2, 'Fiat', 'Palio', 2012, 'CWS9887', 'Preto', 2),
(3, 'Ford', 'Gol', 2014, 'DAA9965', 'Branco', 3),
(4, 'Citroen', 'C3', 2000, 'AJD9865', 'Azul', 4),
(5, 'Fiat', 'Uno', 2001, 'AQE6985', 'Verde', 5),
(7, 'Fiat', 'Fiat 97', 2018, 'UJH9875', 'Amarelo', 7),
(8, 'Fiat', 'Palio', 2001, 'AYH5682', 'Prata', 8),
(10, 'Fiat', 'Palio', 2014, 'AEW9653', 'Rosa', 10),
(11, 'Fiat', 'Palio', 2005, 'AWR3652', 'Roxo', 11),
(12, 'Fiat ', 'Palio', 2001, 'AOQ6635', 'Amarelo', 12),
(13, 'Fiat ', 'Uno', 2003, 'QOI3652', 'Prata', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_c` int(11) NOT NULL AUTO_INCREMENT,
  `nome_c` varchar(90) NOT NULL,
  `cpf_c` varchar(14) NOT NULL,
  `cnh_c` varchar(11) DEFAULT NULL,
  `tel` varchar(15) NOT NULL,
  `tipo_c` char(1) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `id_end` int(11) NOT NULL,
  PRIMARY KEY (`id_c`),
  KEY `id_emp` (`id_emp`),
  KEY `id_end` (`id_end`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_c`, `nome_c`, `cpf_c`, `cnh_c`, `tel`, `tipo_c`, `id_emp`, `id_end`) VALUES
(1, 'Luiz Fernando', '000.000.000-00', '99999999999', '(19) 99999-9999', 'B', 1, 2),
(2, 'Pedro Henrique Vieira', '000.000.565-00', '99999999999', '(19) 9999-9999', 'A', 2, 4),
(3, 'Testando', '123.333.333-00', '99999999999', '(19) 99999-9999', 'A', 1, 5),
(4, 'Luana Pietra Da Mota', '006.026.243-55', '98999999999', '(14) 2835-2558', 'A', 1, 6),
(5, 'João Geraldo Cauã Santos', '000.365.956-01', '99999999999', '(19) 99999-9999', 'A', 3, 8),
(7, 'Giovana Analu Moraes', '000.065.005-75', '99999999999', '(19) 9999-9999', 'A', 1, 10),
(8, 'Rita Sophia Lorena Peixoto', '125.362.674-65', '88888888888', '(19) 9999-9999', 'A', 1, 11),
(10, 'Nelson Benício Aragão', '000.345.367-00', '99999999999', '(19) 6585-6568', 'A', 1, 12),
(11, 'Stefany Isabela Viana', '154.365.654-69', '45222222222', '(19) 5856-6967', 'E', 1, 13),
(12, 'Marli Carla Heloise Moura', '451.653.698-98', '99999999999', '(19) 6985-6985', 'A', 1, 14),
(13, 'Benedito Noah Elias Ramos', '635.986.698-02', '99999999999', '(19) 9696-6666', 'A', 1, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_emp` int(11) NOT NULL AUTO_INCREMENT,
  `nome_emp` varchar(40) DEFAULT NULL,
  `nome_f` varchar(30) NOT NULL,
  `cnpj_emp` varchar(19) NOT NULL,
  `tel_emp` varchar(15) NOT NULL,
  `resp_emp` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_emp`, `nome_emp`, `nome_f`, `cnpj_emp`, `tel_emp`, `resp_emp`) VALUES
(1, 'TechonoDin', 'Din', '000.000.000/0000-00', '(19) 99999-9999', 'Gabriel Pereira'),
(2, 'Eng Soluções', 'Eng LDA', '000.000.000/0000-02', '(19) 9995-5585', 'Lucas Nascimento'),
(3, 'LuxTech', 'LuxTech', '000.000.000/0000-36', '(19) 99999-9999', 'Luiz Henrique Dos Santos'),
(4, 'HelpDesk', 'HD', '000.000.000/3697-00', '(19) 9999-9999', 'Maria Julia Dos Santos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_end` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(40) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `id_emp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_end`),
  KEY `id_emp` (`id_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_end`, `rua`, `num`, `bairro`, `cidade`, `estado`, `id_emp`) VALUES
(1, 'Rua Frederico Paul', 65, 'Centro', 'Araras', 'SP', 1),
(2, 'Rua Ferrovia 2', 71, 'Jd Alvodara', 'Araras', 'SP', NULL),
(3, 'Av Paulista', 65, 'Pq Das Arvores', 'São Paulo', 'SP', 2),
(4, 'Rua Coimbra', 65, 'Jd Das Flores', 'Campinas', 'SP', NULL),
(5, 'Rua Frederico Da Silva', 65, 'Jd Candida', 'Campinas ', 'SP', NULL),
(6, 'Rua Praxedes Lopes Pinto', 69, 'Vila Pacífico', 'Bauru', 'SP', NULL),
(7, 'Rua Dois Horizontes', 9744, 'Loteamento Cellos II', 'São Paulo', 'SP', 3),
(8, 'Rua Professor Bartolomeu Filho ', 899, 'Santa Isabel', 'Leme', 'SP', NULL),
(9, 'Rua Do Café', 77, 'Centro', 'Campinas', 'SP', 4),
(10, 'Rua Dos Madeireiros ', 12, 'Centro', 'Aurora Do Pará', 'PA', NULL),
(11, 'Rua Pompílio Marques Gouvea', 66, 'Pq Das Laranjeiras', 'Araraquara', 'SP', NULL),
(12, 'Rua Teotônio Ventura De Farias', 68, 'Jardim Esperança', 'Arapiraca', 'AL', NULL),
(13, 'Venida Presidente Dutra 1889', 45, 'Baixa União', 'Porto Velho', 'SP', NULL),
(14, 'Rua Emilio Souza', 63, 'Jd Alvorada', 'Araras', 'SP', NULL),
(15, 'Rua Emilio Souza', 65, 'Jd Alvorada', 'Araras', 'SP', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_sistemas`
--

DROP TABLE IF EXISTS `usuarios_sistemas`;
CREATE TABLE IF NOT EXISTS `usuarios_sistemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios_sistemas`
--

INSERT INTO `usuarios_sistemas` (`id`, `nome`, `login`, `senha`, `admin`) VALUES
(2, 'Guilherme Viola ', 'Admin@admin.com', 'admin', 1),
(3, 'Gustavo', 'comum@comum.com', 'comum', 0);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carros`
--
ALTER TABLE `carros`
  ADD CONSTRAINT `carros_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `clientes` (`id_c`);

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `empresa` (`id_emp`),
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`id_end`) REFERENCES `endereco` (`id_end`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `empresa` (`id_emp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
