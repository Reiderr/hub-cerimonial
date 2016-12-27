-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Dez-2016 às 03:10
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
  `Usuario_CPF` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('118527', 'Marcos', 'rua2', 'rua 4', 1, '83b4ef5ae4bb360c96628aecda974200', 'marcos@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`),
  ADD UNIQUE KEY `idEvento_UNIQUE` (`idEvento`),
  ADD KEY `fk_Evento_Usuário_idx` (`Usuario_CPF`);

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
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_Evento_Usuário` FOREIGN KEY (`Usuario_CPF`) REFERENCES `usuario` (`CPF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `fk_tokens_Usuário1` FOREIGN KEY (`Usuario_CPF`) REFERENCES `usuario` (`CPF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
