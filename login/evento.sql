-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Dez-2016 às 19:15
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `nomeEvento` varchar(100) NOT NULL,
  `local` varchar(255) DEFAULT NULL,
  `listaPresente` varchar(255) DEFAULT NULL,
  `convidados` int(11) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `user_Email` varchar(255) DEFAULT NULL,
  `local_Latitude` varchar(25) DEFAULT NULL,
  `local_Longitude` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`idEvento`, `nomeEvento`, `local`, `listaPresente`, `convidados`, `url`, `user_Email`, `local_Latitude`, `local_Longitude`) VALUES
(4, 'Casamento JoÃ£o e Maria', 'Rua da silva', 'linkaqui', 45, 'joaoemaria', NULL, '-19.924152', '-43.997993'),
(6, 'Teste 1', 'Teste1 endereco', 'Teste1link', 0, 'Teste1url', NULL, '-19.917373', '-43.938255'),
(8, 'sdasd', 'fdfd', 'fdfdsfsd', 147, 'joaoemaria2', NULL, '-19.917858', '-44.030352'),
(9, 'sada', 'asdad@!dasda', 'dfsdf', 65456, 'df', NULL, '-19.917858', '-44.030352'),
(10, 'sdsdxc', 'akdsdhjkasdasd', '', 56456, '56474897498237492743', NULL, '-19.917858', '-44.030352'),
(11, 'dasdzxc', '23124', '', 5435345, '54s6d54asd', NULL, '-19.917858', '-44.030352'),
(12, 'teste2', 'teste2end', 'teste2link', 233, 'teste2url', NULL, '-19.910272', '-43.965120');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tokens`
--

CREATE TABLE `tokens` (
  `idtokens` varchar(8) NOT NULL,
  `valor` int(11) NOT NULL,
  `usado` tinyint(1) NOT NULL,
  `Usuario_CPF` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `CPF` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`CPF`, `nome`, `telefone`, `endereco`, `admin`, `senha`, `email`) VALUES
('', '', '', '', 0, 'd41d8cd98f00b204e9800998ecf8427e', ''),
('118527', 'Marcos', 'rua2', 'rua 4', 1, '83b4ef5ae4bb360c96628aecda974200', 'marcos@hotmail.com'),
('dsdd', 'sad', 'ssa', 'ddd', 0, '718b6dd54c8d1d3ad19eb99cb12f13e2', 'dd@dddd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`),
  ADD UNIQUE KEY `idEvento_UNIQUE` (`idEvento`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`idtokens`),
  ADD UNIQUE KEY `idtokens_UNIQUE` (`idtokens`),
  ADD KEY `fk_tokens_Usuário1_idx` (`Usuario_CPF`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CPF`),
  ADD UNIQUE KEY `CPF_UNIQUE` (`CPF`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `fk_tokens_Usuário1` FOREIGN KEY (`Usuario_CPF`) REFERENCES `usuario` (`CPF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
