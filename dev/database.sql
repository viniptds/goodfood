-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 21-Set-2018 às 19:26
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2458163_tcc`
--
CREATE DATABASE IF NOT EXISTS `good_food` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `good_food`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `COD_CLI` int(11) NOT NULL,
  `USER` varchar(50) NOT NULL,
  `NOME` varchar(200) NOT NULL,
  `DATA_N` date DEFAULT NULL,
  `ENDERECO` varchar(200) DEFAULT NULL,
  `TEL` varchar(15) NOT NULL,
  `CPF` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `SENHA` varchar(40) DEFAULT NULL,
  `CEP` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_produto`
--

CREATE TABLE `cliente_produto` (
  `USER` varchar(50) NOT NULL,
  `COD_PRO` int(11) NOT NULL,
  `COD_PAR` int(11) NOT NULL,
  `QUANT_PRO` int(11) NOT NULL,
  `COD_PED` int(11) NOT NULL,
  `DATA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

CREATE TABLE `parceiro` (
  `COD_PAR` int(11) NOT NULL,
  `NOME` varchar(200) NOT NULL,
  `CNPJ` varchar(20) NOT NULL,
  `TEL` varchar(15) NOT NULL,
  `ENDERECO` varchar(200) DEFAULT NULL,
  `USER` varchar(50) NOT NULL,
  `SENHA` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`COD_PAR`, `NOME`, `CNPJ`, `TEL`, `ENDERECO`, `USER`, `SENHA`) VALUES
(1, 'Maju Lanches', '5647316716', '33661310', 'Rua Joaquim Jorge', 'maju', '12345678'),
(2, 'Santa Hora', '684138138', '33661187', 'Rua Carlos Bleinrot', 'santa', '10101010');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `COD_PED` int(11) NOT NULL,
  `COD_CLI` int(11) NOT NULL,
  `COD_PAR` int(11) NOT NULL,
  `DATA_PED` datetime NOT NULL,
  `FORMA_PAG` varchar(25) NOT NULL,
  `TOTAL_PED` double NOT NULL,
  `ENDERECO` varchar(200) NOT NULL,
  `STATUS` varchar(15) NOT NULL,
  `DATA_ENTR` datetime DEFAULT NULL,
  `OBS` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `COD_PRO` int(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `DESCR` varchar(200) DEFAULT NULL,
  `PRECO` double DEFAULT NULL,
  `GENERO` varchar(20) NOT NULL,
  `COD_PAR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`COD_PRO`, `NOME`, `DESCR`, `PRECO`, `GENERO`, `COD_PAR`) VALUES
(1, 'Misto Quente', 'Pao, presunto, queijo', 9.5, 'Lanche', 1),
(2, 'X-Bacon', 'Pão, hambúrguer, queijo, bacon, alface e tomate', 14.5, 'Cachorro-Quente', 2),
(3, 'Cachorro-Quente Simples', 'Pão, salsicha, batata palha, catchup, alface e tomate', 5, 'Cachorro-Quente', 1),
(4, 'X-Calabresa', 'Pão, calabresa, hambúrguer, presunto, mussarela, milho, alface e tomate', 13, 'Lanche', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD UNIQUE KEY `COD_CLI` (`COD_CLI`);

--
-- Indexes for table `parceiro`
--
ALTER TABLE `parceiro`
  ADD UNIQUE KEY `COD_PAR` (`COD_PAR`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD UNIQUE KEY `COD_PED` (`COD_PED`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD UNIQUE KEY `COD_PRO` (`COD_PRO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `COD_CLI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `COD_PAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `COD_PED` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `COD_PRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
