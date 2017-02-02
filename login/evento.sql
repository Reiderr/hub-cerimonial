-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Fev-2017 às 17:07
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
-- Estrutura da tabela `dados_casamento`
--

CREATE TABLE `dados_casamento` (
  `evento_ID` int(255) NOT NULL,
  `texto_2` text NOT NULL,
  `imagem_1` varchar(255) NOT NULL,
  `imagem_2` varchar(255) NOT NULL,
  `texto_1` text NOT NULL,
  `lista_presentes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dados_casamento`
--

INSERT INTO `dados_casamento` (`evento_ID`, `texto_2`, `imagem_1`, `imagem_2`, `texto_1`, `lista_presentes`) VALUES
(1, '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_evento`
--

CREATE TABLE `dados_evento` (
  `evento_ID` int(255) NOT NULL,
  `texto_2` text NOT NULL,
  `imagem_1` varchar(255) NOT NULL,
  `imagem_2` varchar(255) NOT NULL,
  `texto_1` text NOT NULL,
  `evento_facebook` varchar(255) DEFAULT NULL,
  `fanpage_facebook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dados_evento`
--

INSERT INTO `dados_evento` (`evento_ID`, `texto_2`, `imagem_1`, `imagem_2`, `texto_1`, `evento_facebook`, `fanpage_facebook`) VALUES
(2, 'texto padrÃ£o (a fazer)', '', '', 'texto padrÃ£o(a fazer)', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `nomeEvento` varchar(100) NOT NULL,
  `local` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `user_Email` varchar(255) DEFAULT NULL,
  `local_Latitude` varchar(25) DEFAULT NULL,
  `local_Longitude` varchar(25) DEFAULT NULL,
  `layout` varchar(255) NOT NULL,
  `published` varchar(30) DEFAULT NULL,
  `data_evento` datetime DEFAULT NULL,
  `tipo_evento` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`idEvento`, `nomeEvento`, `local`, `url`, `user_Email`, `local_Latitude`, `local_Longitude`, `layout`, `published`, `data_evento`, `tipo_evento`) VALUES
(1, 'teste1', NULL, 'teste1', 'marcosreider@hotmail.com', NULL, NULL, '1', 'admin', '2017-02-04 00:00:00', 'casamento'),
(2, 'teste2', NULL, 'teste2', 'marcosreider@hotmail.com', '-19.905268', '-44.007177', '1', NULL, '2017-02-02 00:00:00', 'festa');

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
('118527', 'Marcos', 'rua2', 'rua 4', 1, '83b4ef5ae4bb360c96628aecda974200', 'marcos@hotmail.com'),
('11852774630', 'Marcos Reider', '31998755464', 'rua de teste', 0, '83b4ef5ae4bb360c96628aecda974200', 'marcosreider@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dados_casamento`
--
ALTER TABLE `dados_casamento`
  ADD PRIMARY KEY (`evento_ID`);

--
-- Indexes for table `dados_evento`
--
ALTER TABLE `dados_evento`
  ADD PRIMARY KEY (`evento_ID`);

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
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `dados_casamento`
--
ALTER TABLE `dados_casamento`
  ADD CONSTRAINT `casamento_ID_msg` FOREIGN KEY (`evento_ID`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `dados_evento`
--
ALTER TABLE `dados_evento`
  ADD CONSTRAINT `evento_ID_msg` FOREIGN KEY (`evento_ID`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `fk_tokens_Usuário1` FOREIGN KEY (`Usuario_CPF`) REFERENCES `usuario` (`CPF`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
