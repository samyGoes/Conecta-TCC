-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Abr-2023 às 22:36
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdconecta`
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
-- Estrutura da tabela `tbcandidatura`
--

CREATE TABLE `tbcandidatura` (
  `codCandidatura` int(11) NOT NULL,
  `codVoluntario` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
  `codInstituicao` int(11) NOT NULL,
  `statusCandidatura` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, 'tocar violÃ£o'),
(4, 'moradores de rua'),
(5, 'crianÃ§as'),
(6, 'mulheres'),
(7, 'idosos'),
(8, 'meio ambiente'),
(9, 'adolescente');

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
(14, 21, 3),
(15, 22, 1),
(16, 23, 3),
(17, 24, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcausavoluntario`
--

CREATE TABLE `tbcausavoluntario` (
  `codCausaVoluntario` int(11) NOT NULL,
  `codCategoriaServico` int(11) DEFAULT NULL,
  `codVoluntario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbcausavoluntario`
--

INSERT INTO `tbcausavoluntario` (`codCausaVoluntario`, `codCategoriaServico`, `codVoluntario`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 1, 2),
(4, 2, 2),
(5, 3, 2),
(6, 4, 2),
(7, 4, 3);

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
(6, 21, 2),
(7, 22, 1),
(8, 23, 2),
(9, 24, 1);

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
-- Estrutura da tabela `tbinstituicaocategoriaservico`
--

CREATE TABLE `tbinstituicaocategoriaservico` (
  `codInstituicaoCategoriaServico` int(11) NOT NULL,
  `codInstituicao` int(11) NOT NULL,
  `codCategoriaServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(21, '16:00:00', 'tarde', 1, 'preciso de um motora!!', '08473-050', 'Conjunto Habitacional Sitio ConceiÃ§Ã£o', 'SP', 'Estrada Manuel de Oliveira Ramos', 'casa', 'Brasil', '282', 'SÃ£o Paulo', 'motorista', 'presencial', '0000-00-00', 1),
(22, '12:00:00', 'tarde', 1, 'preciso de professor de inglÃªs', '08473-050', 'Conjunto Habitacional Sitio ConceiÃ§Ã£o', 'SP', 'Estrada Manuel de Oliveira Ramos', 'casa', 'Brasil', '234', 'SÃ£o Paulo', 'professor', 'hÃ­brido', '0000-00-00', 5),
(23, '00:00:08', 'diurno', 8, 'preciso urgente', '08460-600', 'Jardim do Divino', 'SP', 'Rua Moreira Neto', 'casa', 'Brasil', '03', 'SÃ£o Paulo', 'Limpeza', 'presencial', '2023-04-21', 1),
(24, '18:00:00', 'noturno', 3, 'preciso', '08460-635', 'Jardim do Divino', 'SP', 'Travessa João Batista Cramer', 'casa', 'Brasil', '20', 'São Paulo', 'cuidador', 'presencial', '2023-04-28', 2),
(25, '00:00:00', '', 3, '', '', '', '', '', '', '', '', '', '', 'presencial', '1970-01-01', 0);

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
(1, '', '2005-07-27', '54859938852', '', '', '', '', '', '', '', '', '', '123', '', ''),
(2, 'Gabriella', '2003-03-03', '777.317.829-13', 'Avenida dos IpÃªs', '123', '08161-00', 'casa', 'Jardim dos IpÃªs', 'SÃ£o Paulo', 'SP', 'brasil', 'gabriella10@gmail.com', '123', '', ''),
(3, 'fernanda de souza bezerra ', '2005-07-27', '739.975.300-84', 'Rua Moreira Neto', '56', '08460-60', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'Brasil', 'bezerrafernanda225@gmail.com', 'Fernanda@2', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbadm`
--
ALTER TABLE `tbadm`
  ADD PRIMARY KEY (`codAdm`);

--
-- Índices para tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  ADD PRIMARY KEY (`codCandidatura`),
  ADD KEY `fk_vaga` (`codServico`),
  ADD KEY `fk_Ong` (`codInstituicao`),
  ADD KEY `fk_ajudante` (`codVoluntario`);

--
-- Índices para tabela `tbcategoriaservico`
--
ALTER TABLE `tbcategoriaservico`
  ADD PRIMARY KEY (`codCategoriaServico`);

--
-- Índices para tabela `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  ADD PRIMARY KEY (`codCausaVaga`),
  ADD KEY `fk_CausaVaga` (`codCategoriaServico`),
  ADD KEY `fk_ServicoVaga` (`codServico`);

--
-- Índices para tabela `tbcausavoluntario`
--
ALTER TABLE `tbcausavoluntario`
  ADD PRIMARY KEY (`codCausaVoluntario`),
  ADD KEY `fk_codVoluntario` (`codVoluntario`),
  ADD KEY `fk_codCategoria` (`codCategoriaServico`);

--
-- Índices para tabela `tbfoneinstituicao`
--
ALTER TABLE `tbfoneinstituicao`
  ADD PRIMARY KEY (`codFoneInstituicao`),
  ADD KEY `codInstituicao` (`codInstituicao`);

--
-- Índices para tabela `tbfonevoluntario`
--
ALTER TABLE `tbfonevoluntario`
  ADD PRIMARY KEY (`codFoneVoluntario`),
  ADD KEY `codVoluntario` (`codVoluntario`);

--
-- Índices para tabela `tbfotosinstituicao`
--
ALTER TABLE `tbfotosinstituicao`
  ADD PRIMARY KEY (`codfotoInstituicao`),
  ADD KEY `codInstituicao` (`codInstituicao`);

--
-- Índices para tabela `tbhabilidadeservico`
--
ALTER TABLE `tbhabilidadeservico`
  ADD PRIMARY KEY (`codHabilidadeServico`);

--
-- Índices para tabela `tbhabivaga`
--
ALTER TABLE `tbhabivaga`
  ADD PRIMARY KEY (`codHabiVaga`),
  ADD KEY `fk_habiVagaServ` (`codHabilidadeServico`),
  ADD KEY `fk_serv` (`codServico`);

--
-- Índices para tabela `tbinstituicao`
--
ALTER TABLE `tbinstituicao`
  ADD PRIMARY KEY (`codInstituicao`);

--
-- Índices para tabela `tbinstituicaocategoriaservico`
--
ALTER TABLE `tbinstituicaocategoriaservico`
  ADD PRIMARY KEY (`codInstituicaoCategoriaServico`),
  ADD KEY `codInstituicao` (`codInstituicao`),
  ADD KEY `codCategoriaServico` (`codCategoriaServico`);

--
-- Índices para tabela `tbservico`
--
ALTER TABLE `tbservico`
  ADD PRIMARY KEY (`codServico`),
  ADD KEY `fk_Instituicao` (`codInstituicao`);

--
-- Índices para tabela `tbvoluntario`
--
ALTER TABLE `tbvoluntario`
  ADD PRIMARY KEY (`codVoluntario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbadm`
--
ALTER TABLE `tbadm`
  MODIFY `codAdm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  MODIFY `codCandidatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcategoriaservico`
--
ALTER TABLE `tbcategoriaservico`
  MODIFY `codCategoriaServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  MODIFY `codCausaVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tbcausavoluntario`
--
ALTER TABLE `tbcausavoluntario`
  MODIFY `codCausaVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbfoneinstituicao`
--
ALTER TABLE `tbfoneinstituicao`
  MODIFY `codFoneInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tbfonevoluntario`
--
ALTER TABLE `tbfonevoluntario`
  MODIFY `codFoneVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbfotosinstituicao`
--
ALTER TABLE `tbfotosinstituicao`
  MODIFY `codfotoInstituicao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbhabilidadeservico`
--
ALTER TABLE `tbhabilidadeservico`
  MODIFY `codHabilidadeServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbhabivaga`
--
ALTER TABLE `tbhabivaga`
  MODIFY `codHabiVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbinstituicao`
--
ALTER TABLE `tbinstituicao`
  MODIFY `codInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbinstituicaocategoriaservico`
--
ALTER TABLE `tbinstituicaocategoriaservico`
  MODIFY `codInstituicaoCategoriaServico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbservico`
--
ALTER TABLE `tbservico`
  MODIFY `codServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tbvoluntario`
--
ALTER TABLE `tbvoluntario`
  MODIFY `codVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  ADD CONSTRAINT `fk_Ong` FOREIGN KEY (`codInstituicao`) REFERENCES `tbinstituicao` (`codInstituicao`),
  ADD CONSTRAINT `fk_ajudante` FOREIGN KEY (`codVoluntario`) REFERENCES `tbvoluntario` (`codVoluntario`),
  ADD CONSTRAINT `fk_vaga` FOREIGN KEY (`codServico`) REFERENCES `tbservico` (`codServico`);

--
-- Limitadores para a tabela `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  ADD CONSTRAINT `fk_CausaVaga` FOREIGN KEY (`codCategoriaServico`) REFERENCES `tbcategoriaservico` (`codCategoriaServico`),
  ADD CONSTRAINT `fk_ServicoVaga` FOREIGN KEY (`codServico`) REFERENCES `tbservico` (`codServico`);

--
-- Limitadores para a tabela `tbinstituicaocategoriaservico`
--
ALTER TABLE `tbinstituicaocategoriaservico`
  ADD CONSTRAINT `tbinstituicaocategoriaservico_ibfk_1` FOREIGN KEY (`codInstituicao`) REFERENCES `tbinstituicao` (`codInstituicao`),
  ADD CONSTRAINT `tbinstituicaocategoriaservico_ibfk_2` FOREIGN KEY (`codCategoriaServico`) REFERENCES `tbcategoriaservico` (`codCategoriaServico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
