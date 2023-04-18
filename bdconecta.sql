-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Abr-2023 às 21:40
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdconecta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbadm`
--

CREATE TABLE `tbadm` (
  `codAdm` int(11) NOT NULL,
  `nomeAdm` varchar(50) NOT NULL,
  `loginAdm` varchar(40) NOT NULL,
  `senhaAdm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoriaservico`
--

CREATE TABLE `tbcategoriaservico` (
  `codCategoriaServico` int(11) NOT NULL,
  `nomeCategoria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbcategoriaservico`
--

INSERT INTO `tbcategoriaservico` (`codCategoriaServico`, `nomeCategoria`) VALUES
(1, 'inglÃªs'),
(2, 'inglÃªs'),
(3, 'tocar violÃ£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcausavaga`
--

CREATE TABLE `tbcausavaga` (
  `codCausaVaga` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
  `codCategoriaServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbcausavaga`
--

INSERT INTO `tbcausavaga` (`codCausaVaga`, `codServico`, `codCategoriaServico`) VALUES
(1, 15, 1),
(2, 15, 2),
(3, 18, 1),
(4, 18, 2),
(5, 18, 3),
(6, 19, 1),
(7, 19, 2),
(8, 19, 3),
(9, 20, 1),
(10, 20, 2),
(11, 20, 3),
(12, 21, 1),
(13, 21, 2),
(14, 21, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfoneinstituicao`
--

CREATE TABLE `tbfoneinstituicao` (
  `codFoneInstituicao` int(11) NOT NULL,
  `numFoneInstituicao` varchar(15) NOT NULL,
  `numSeqFone` int(20) NOT NULL,
  `codInstituicao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbfoneinstituicao`
--

INSERT INTO `tbfoneinstituicao` (`codFoneInstituicao`, `numFoneInstituicao`, `numSeqFone`, `codInstituicao`) VALUES
(1, '11111111111', 0, 1),
(2, '111111111', 0, 1),
(3, '11111111111', 0, 2),
(4, '11111111111', 0, 2),
(5, '11965874333', 0, 3),
(6, '1120168242', 0, 3),
(7, '11965874333', 0, 4),
(8, '1120168242', 0, 4),
(9, '11965874333', 0, 5),
(10, '1120168242', 0, 5),
(11, '11965874333', 0, 6),
(12, '1120168242', 0, 6),
(13, '11965874333', 0, 7),
(14, '1120168242', 0, 7),
(15, '11965874333', 0, 8),
(16, '1120168242', 0, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfonevoluntario`
--

CREATE TABLE `tbfonevoluntario` (
  `codFoneVoluntario` int(11) NOT NULL,
  `numFoneVoluntario` varchar(15) NOT NULL,
  `numSeqFone` int(20) NOT NULL,
  `codVoluntario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbfonevoluntario`
--

INSERT INTO `tbfonevoluntario` (`codFoneVoluntario`, `numFoneVoluntario`, `numSeqFone`, `codVoluntario`) VALUES
(1, '11965874333', 0, 1),
(2, '1120168242', 0, 1),
(3, '11111111111', 0, 2),
(4, '11111111111', 0, 2),
(5, '11965874333', 0, 3),
(6, '1120168242', 0, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfotosinstituicao`
--

CREATE TABLE `tbfotosinstituicao` (
  `codfotoInstituicao` int(11) NOT NULL,
  `fotosInstituicao` varchar(200) NOT NULL,
  `codInstituicao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbhabilidadeservico`
--

CREATE TABLE `tbhabilidadeservico` (
  `codHabilidadeServico` int(11) NOT NULL,
  `nomeHabilidadeServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbhabilidadeservico`
--

INSERT INTO `tbhabilidadeservico` (`codHabilidadeServico`, `nomeHabilidadeServico`) VALUES
(1, 'inglÃªs'),
(2, 'tocar ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbhabivaga`
--

CREATE TABLE `tbhabivaga` (
  `codHabiVaga` int(11) NOT NULL,
  `codServico` int(11) DEFAULT NULL,
  `codHabilidadeServico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbhabivaga`
--

INSERT INTO `tbhabivaga` (`codHabiVaga`, `codServico`, `codHabilidadeServico`) VALUES
(1, 19, 1),
(2, 19, 2),
(3, 20, 1),
(4, 20, 2),
(5, 21, 1),
(6, 21, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbinstituicao`
--

CREATE TABLE `tbinstituicao` (
  `codInstituicao` int(11) NOT NULL,
  `nomeInstituicao` varchar(100) NOT NULL,
  `logInstituicao` varchar(50) NOT NULL,
  `numLogInstituicao` varchar(10) NOT NULL,
  `cepInstituicao` char(9) NOT NULL,
  `compInstituicao` varchar(50) NOT NULL,
  `bairroInstituicao` varchar(40) NOT NULL,
  `cidadeInstituicao` varchar(30) NOT NULL,
  `estadoInstituicao` varchar(100) NOT NULL,
  `paisInstituicao` varchar(100) NOT NULL,
  `emailInstituicao` varchar(30) NOT NULL,
  `cnpjInstituicao` char(18) NOT NULL,
  `senhaInstituicao` varchar(10) NOT NULL,
  `descInstituicao` varchar(60) NOT NULL,
  `fotoInstituicao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbinstituicao`
--

INSERT INTO `tbinstituicao` (`codInstituicao`, `nomeInstituicao`, `logInstituicao`, `numLogInstituicao`, `cepInstituicao`, `compInstituicao`, `bairroInstituicao`, `cidadeInstituicao`, `estadoInstituicao`, `paisInstituicao`, `emailInstituicao`, `cnpjInstituicao`, `senhaInstituicao`, `descInstituicao`, `fotoInstituicao`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '93.491.338/0001-74', '1234', '', 'img-instituicao/1.jpg'),
(2, 'Ong AbraÃ§o', 'Avenida dos IpÃªs', '123', '08161-000', 'casa', 'Jardim dos IpÃªs', 'SÃ£o Paulo', 'SP', 'brasil', 'ong@gmail.com', '62823257011801', '123', '', ''),
(3, 'ong cachorros fofos', 'Rua Moreira Neto', '03', '08460-600', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'Brasil', 'ongDogs@gmail.com', '30.790.743/0001-73', '123', '', ''),
(4, 'ong cachorros fofos', '', '03', '08460-600', 'casa', '', '', '', 'Brasil', 'ongDogs1@gmail.com', '02.178.282/0001-47', '123', '', ''),
(5, 'ong cachorros fofos', 'Rua Moreira Neto', '03', '08460-600', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'Brasil', 'ongDogs2@gmail.com', '48.761.843/0001-37', 'Fernanda@', '', ''),
(6, 'ong criancinhas', 'Rua Moreira Neto', '03', '08460-600', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'Brasil', 'criancinhas@gmail.com', '96.797.283/0001-13', 'Fernanda@1', '', ''),
(7, 'ong Ana ', 'Rua Moreira Neto', '55', '08460-600', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'Brasil', 'ongAna@gmail.com', '16.078.243/0001-82', 'Aninha@1', '', ''),
(8, 'ong julia', 'Rua Moreira Neto', '03', '08460-600', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'Brasil', 'ongJulia@gmail.com', '64.565.749/0001-69', 'Ongjulia@1', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbservico`
--

CREATE TABLE `tbservico` (
  `codServico` int(11) NOT NULL,
  `horarioServico` time NOT NULL,
  `periodoServico` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codInstituicao` int(11) NOT NULL,
  `descServico` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cepLocalServico` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairroLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logradouroLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complementoLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paisLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroLocalServico` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidadeLocalServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomeservico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoServico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataInicioServico` date NOT NULL,
  `qntdVagaServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbservico`
--

INSERT INTO `tbservico` (`codServico`, `horarioServico`, `periodoServico`, `codInstituicao`, `descServico`, `cepLocalServico`, `bairroLocalServico`, `estadoLocalServico`, `logradouroLocalServico`, `complementoLocalServico`, `paisLocalServico`, `numeroLocalServico`, `cidadeLocalServico`, `nomeservico`, `tipoServico`, `dataInicioServico`, `qntdVagaServico`) VALUES
(5, '15:00:00', 'diurno', 1, 'djnvidivjikjijopvo aoao', '08460-600', 'Jardim do Divino', 'SP', 'Rua Moreira Neto', 'casa', 'Brasil', '600', 'SÃ£o Paulo', 'cozinheiro', 'presencial', '0000-00-00', 5),
(6, '15:00:00', 'diurno', 1, 'djnvidivjikjijopvo aoao', '08460-600', 'Jardim do Divino', 'SP', 'Rua Moreira Neto', 'casa', 'Brasil', '600', 'SÃ£o Paulo', 'cozinheiro', 'presencial', '0000-00-00', 5),
(7, '15:00:00', 'diurno', 1, 'djnvidivjikjijopvo aoao', '08460-600', 'Jardim do Divino', 'SP', 'Rua Moreira Neto', 'casa', 'Brasil', '600', 'SÃ£o Paulo', 'cozinheiro', 'presencial', '0000-00-00', 5),
(8, '13:00:00', 'diurno', 1, 'fjkibfkjbkdfk bkifmjfkm', '08460-600', 'Jardim do Divino', 'SP', 'Rua Moreira Neto', 'casa', 'Brasil', '03', 'SÃ£o Paulo', 'cozinheiro', 'presencial', '0000-00-00', 5),
(9, '12:00:00', 'diurno', 1, 'hbhjbhbjhjjnjujhuj', '08460-600', 'Jardim do Divino', 'SP', 'Rua Moreira Neto', 'casa', 'Brasil', '03', 'SÃ£o Paulo', 'cozinheiro', 'presencial', '0000-00-00', 5),
(10, '12:00:00', 'diurno', 1, 'hbhjbhbjhjjnjujhuj', '08460-600', 'Jardim do Divino', 'SP', 'Rua Moreira Neto', 'casa', 'Brasil', '03', 'SÃ£o Paulo', 'cozinheiro', 'presencial', '0000-00-00', 5),
(11, '12:00:00', 'diurno', 1, 'hbhjbhbjhjjnjujhuj', '08460-600', 'Jardim do Divino', 'SP', 'Rua Moreira Neto', 'casa', 'Brasil', '03', 'SÃ£o Paulo', 'cozinheiro', 'presencial', '0000-00-00', 5),
(12, '12:00:00', 'diurno', 1, 'hbhjbhbjhjjnjujhuj', '08460-600', 'Jardim do Divino', 'SP', 'Rua Moreira Neto', 'casa', 'Brasil', '03', 'SÃ£o Paulo', 'cozinheiro', 'presencial', '0000-00-00', 5),
(13, '12:00:00', 'diurno', 1, 'hbhjbhbjhjjnjujhuj', '08460-600', 'Jardim do Divino', 'SP', 'Rua Moreira Neto', 'casa', 'Brasil', '03', 'SÃ£o Paulo', 'cozinheiro', 'presencial', '0000-00-00', 5),
(14, '16:00:00', 'tarde', 1, 'preciso de um motora!!', '08473-050', 'Conjunto Habitacional Sitio ConceiÃ§Ã£o', 'SP', 'Estrada Manuel de Oliveira Ramos', 'casa', 'Brasil', '282', 'SÃ£o Paulo', 'motorista', 'presencial', '0000-00-00', 1),
(15, '16:00:00', 'tarde', 1, 'preciso de um motora!!', '08473-050', 'Conjunto Habitacional Sitio ConceiÃ§Ã£o', 'SP', 'Estrada Manuel de Oliveira Ramos', 'casa', 'Brasil', '282', 'SÃ£o Paulo', 'motorista', 'presencial', '0000-00-00', 1),
(16, '16:00:00', 'tarde', 1, 'preciso de um motora!!', '08473-050', 'Conjunto Habitacional Sitio ConceiÃ§Ã£o', 'SP', 'Estrada Manuel de Oliveira Ramos', 'casa', 'Brasil', '282', 'SÃ£o Paulo', 'motorista', 'presencial', '0000-00-00', 1),
(17, '16:00:00', 'tarde', 1, 'preciso de um motora!!', '08473-050', 'Conjunto Habitacional Sitio ConceiÃ§Ã£o', 'SP', 'Estrada Manuel de Oliveira Ramos', 'casa', 'Brasil', '282', 'SÃ£o Paulo', 'motorista', 'presencial', '0000-00-00', 1),
(18, '16:00:00', 'tarde', 1, 'preciso de um motora!!', '08473-050', 'Conjunto Habitacional Sitio ConceiÃ§Ã£o', 'SP', 'Estrada Manuel de Oliveira Ramos', 'casa', 'Brasil', '282', 'SÃ£o Paulo', 'motorista', 'presencial', '0000-00-00', 1),
(19, '16:00:00', 'tarde', 1, 'preciso de um motora!!', '08473-050', 'Conjunto Habitacional Sitio ConceiÃ§Ã£o', 'SP', 'Estrada Manuel de Oliveira Ramos', 'casa', 'Brasil', '282', 'SÃ£o Paulo', 'motorista', 'presencial', '0000-00-00', 1),
(20, '16:00:00', 'tarde', 1, 'preciso de um motora!!', '08473-050', 'Conjunto Habitacional Sitio ConceiÃ§Ã£o', 'SP', 'Estrada Manuel de Oliveira Ramos', 'casa', 'Brasil', '282', 'SÃ£o Paulo', 'motorista', 'presencial', '0000-00-00', 1),
(21, '16:00:00', 'tarde', 1, 'preciso de um motora!!', '08473-050', 'Conjunto Habitacional Sitio ConceiÃ§Ã£o', 'SP', 'Estrada Manuel de Oliveira Ramos', 'casa', 'Brasil', '282', 'SÃ£o Paulo', 'motorista', 'presencial', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvoluntario`
--

CREATE TABLE `tbvoluntario` (
  `codVoluntario` int(11) NOT NULL,
  `nomeVoluntario` varchar(50) NOT NULL,
  `dataNascVoluntario` date NOT NULL,
  `cpfVoluntario` char(14) NOT NULL,
  `logVoluntario` varchar(60) NOT NULL,
  `numLogVoluntario` varchar(10) NOT NULL,
  `cepVoluntario` char(8) NOT NULL,
  `compVoluntario` varchar(60) NOT NULL,
  `bairroVoluntario` varchar(60) NOT NULL,
  `cidadeVoluntario` varchar(50) NOT NULL,
  `estadoVoluntario` varchar(100) NOT NULL,
  `paisVoluntario` varchar(100) NOT NULL,
  `emailVoluntario` varchar(50) NOT NULL,
  `senhaVoluntario` varchar(15) NOT NULL,
  `descVoluntario` varchar(60) NOT NULL,
  `fotoVoluntario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbvoluntario`
--

INSERT INTO `tbvoluntario` (`codVoluntario`, `nomeVoluntario`, `dataNascVoluntario`, `cpfVoluntario`, `logVoluntario`, `numLogVoluntario`, `cepVoluntario`, `compVoluntario`, `bairroVoluntario`, `cidadeVoluntario`, `estadoVoluntario`, `paisVoluntario`, `emailVoluntario`, `senhaVoluntario`, `descVoluntario`, `fotoVoluntario`) VALUES
(1, 'fernanda de souza bezerra ', '2005-07-27', '54859938852', 'Rua Moreira Neto', '505', '08460-60', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'brasil', 'bezerrafernanda223@gmail.com', '123', '', ''),
(2, 'Gabriella', '2003-03-03', '777.317.829-13', 'Avenida dos IpÃªs', '123', '08161-00', 'casa', 'Jardim dos IpÃªs', 'SÃ£o Paulo', 'SP', 'brasil', 'gabriella10@gmail.com', '123', '', ''),
(3, 'fernanda de souza bezerra ', '2005-07-27', '739.975.300-84', 'Rua Moreira Neto', '56', '08460-60', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'Brasil', 'bezerrafernanda225@gmail.com', 'Fernanda@2', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadm`
--
ALTER TABLE `tbadm`
  ADD PRIMARY KEY (`codAdm`);

--
-- Indexes for table `tbcategoriaservico`
--
ALTER TABLE `tbcategoriaservico`
  ADD PRIMARY KEY (`codCategoriaServico`);

--
-- Indexes for table `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  ADD PRIMARY KEY (`codCausaVaga`),
  ADD KEY `fk_CausaVaga` (`codCategoriaServico`),
  ADD KEY `fk_ServicoVaga` (`codServico`);

--
-- Indexes for table `tbfoneinstituicao`
--
ALTER TABLE `tbfoneinstituicao`
  ADD PRIMARY KEY (`codFoneInstituicao`),
  ADD KEY `codInstituicao` (`codInstituicao`);

--
-- Indexes for table `tbfonevoluntario`
--
ALTER TABLE `tbfonevoluntario`
  ADD PRIMARY KEY (`codFoneVoluntario`),
  ADD KEY `codVoluntario` (`codVoluntario`);

--
-- Indexes for table `tbfotosinstituicao`
--
ALTER TABLE `tbfotosinstituicao`
  ADD PRIMARY KEY (`codfotoInstituicao`),
  ADD KEY `codInstituicao` (`codInstituicao`);

--
-- Indexes for table `tbhabilidadeservico`
--
ALTER TABLE `tbhabilidadeservico`
  ADD PRIMARY KEY (`codHabilidadeServico`);

--
-- Indexes for table `tbhabivaga`
--
ALTER TABLE `tbhabivaga`
  ADD PRIMARY KEY (`codHabiVaga`),
  ADD KEY `fk_habiVagaServ` (`codHabilidadeServico`),
  ADD KEY `fk_serv` (`codServico`);

--
-- Indexes for table `tbinstituicao`
--
ALTER TABLE `tbinstituicao`
  ADD PRIMARY KEY (`codInstituicao`);

--
-- Indexes for table `tbservico`
--
ALTER TABLE `tbservico`
  ADD PRIMARY KEY (`codServico`),
  ADD KEY `fk_Instituicao` (`codInstituicao`);

--
-- Indexes for table `tbvoluntario`
--
ALTER TABLE `tbvoluntario`
  ADD PRIMARY KEY (`codVoluntario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadm`
--
ALTER TABLE `tbadm`
  MODIFY `codAdm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbcategoriaservico`
--
ALTER TABLE `tbcategoriaservico`
  MODIFY `codCategoriaServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  MODIFY `codCausaVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbfoneinstituicao`
--
ALTER TABLE `tbfoneinstituicao`
  MODIFY `codFoneInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbfonevoluntario`
--
ALTER TABLE `tbfonevoluntario`
  MODIFY `codFoneVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbfotosinstituicao`
--
ALTER TABLE `tbfotosinstituicao`
  MODIFY `codfotoInstituicao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbhabilidadeservico`
--
ALTER TABLE `tbhabilidadeservico`
  MODIFY `codHabilidadeServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbhabivaga`
--
ALTER TABLE `tbhabivaga`
  MODIFY `codHabiVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbinstituicao`
--
ALTER TABLE `tbinstituicao`
  MODIFY `codInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbservico`
--
ALTER TABLE `tbservico`
  MODIFY `codServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbvoluntario`
--
ALTER TABLE `tbvoluntario`
  MODIFY `codVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  ADD CONSTRAINT `fk_CausaVaga` FOREIGN KEY (`codCategoriaServico`) REFERENCES `tbcategoriaservico` (`codCategoriaServico`),
  ADD CONSTRAINT `fk_ServicoVaga` FOREIGN KEY (`codServico`) REFERENCES `tbservico` (`codServico`);

--
-- Limitadores para a tabela `tbfoneinstituicao`
--
ALTER TABLE `tbfoneinstituicao`
  ADD CONSTRAINT `tbfoneinstituicao_ibfk_1` FOREIGN KEY (`codInstituicao`) REFERENCES `tbinstituicao` (`codInstituicao`);

--
-- Limitadores para a tabela `tbfonevoluntario`
--
ALTER TABLE `tbfonevoluntario`
  ADD CONSTRAINT `tbfonevoluntario_ibfk_1` FOREIGN KEY (`codVoluntario`) REFERENCES `tbvoluntario` (`codVoluntario`);

--
-- Limitadores para a tabela `tbfotosinstituicao`
--
ALTER TABLE `tbfotosinstituicao`
  ADD CONSTRAINT `tbfotosinstituicao_ibfk_1` FOREIGN KEY (`codInstituicao`) REFERENCES `tbinstituicao` (`codInstituicao`);

--
-- Limitadores para a tabela `tbhabivaga`
--
ALTER TABLE `tbhabivaga`
  ADD CONSTRAINT `fk_habiVagaServ` FOREIGN KEY (`codHabilidadeServico`) REFERENCES `tbhabilidadeservico` (`codHabilidadeServico`),
  ADD CONSTRAINT `fk_serv` FOREIGN KEY (`codServico`) REFERENCES `tbservico` (`codServico`);

--
-- Limitadores para a tabela `tbservico`
--
ALTER TABLE `tbservico`
  ADD CONSTRAINT `fk_Instituicao` FOREIGN KEY (`codInstituicao`) REFERENCES `tbinstituicao` (`codInstituicao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
