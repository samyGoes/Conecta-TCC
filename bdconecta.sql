-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Maio-2023 às 06:25
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
-- Estrutura da tabela `tbcandidatura`
--

CREATE TABLE `tbcandidatura` (
  `codCandidatura` int(11) NOT NULL,
  `codVoluntario` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcausavaga`
--

CREATE TABLE `tbcausavaga` (
  `codCausaVaga` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
  `codCategoriaServico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcausavoluntario`
--

CREATE TABLE `tbcausavoluntario` (
  `codCausaVoluntario` int(11) NOT NULL,
  `codCategoriaServico` int(11) DEFAULT NULL,
  `codVoluntario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, '(11)96587-4333', 1, 4),
(8, '(11)2016-8242', 2, 4);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbhabivaga`
--

CREATE TABLE `tbhabivaga` (
  `codHabiVaga` int(11) NOT NULL,
  `codServico` int(11) DEFAULT NULL,
  `codHabilidadeServico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, 'Fernanda de Souza Bezerra', '2005-07-27', '548.599.388-52', 'Travessa JoÃ£o Batista Cramer', '03', '08460-63', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'Brasil', 'bezerrafernanda223@gmail.com', 'Fernanda@1', '', 'img/user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadm`
--
ALTER TABLE `tbadm`
  ADD PRIMARY KEY (`codAdm`);

--
-- Indexes for table `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  ADD PRIMARY KEY (`codCandidatura`),
  ADD KEY `fk_vaga` (`codServico`),
  ADD KEY `fk_ajudante` (`codVoluntario`);

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
-- Indexes for table `tbcausavoluntario`
--
ALTER TABLE `tbcausavoluntario`
  ADD PRIMARY KEY (`codCausaVoluntario`),
  ADD KEY `fk_codVoluntario` (`codVoluntario`),
  ADD KEY `fk_codCategoria` (`codCategoriaServico`);

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
-- Indexes for table `tbinstituicaocategoriaservico`
--
ALTER TABLE `tbinstituicaocategoriaservico`
  ADD PRIMARY KEY (`codInstituicaoCategoriaServico`),
  ADD KEY `codInstituicao` (`codInstituicao`),
  ADD KEY `codCategoriaServico` (`codCategoriaServico`);

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
-- AUTO_INCREMENT for table `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  MODIFY `codCandidatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbcategoriaservico`
--
ALTER TABLE `tbcategoriaservico`
  MODIFY `codCategoriaServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  MODIFY `codCausaVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbcausavoluntario`
--
ALTER TABLE `tbcausavoluntario`
  MODIFY `codCausaVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbfoneinstituicao`
--
ALTER TABLE `tbfoneinstituicao`
  MODIFY `codFoneInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbfonevoluntario`
--
ALTER TABLE `tbfonevoluntario`
  MODIFY `codFoneVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `codHabiVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbinstituicao`
--
ALTER TABLE `tbinstituicao`
  MODIFY `codInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbinstituicaocategoriaservico`
--
ALTER TABLE `tbinstituicaocategoriaservico`
  MODIFY `codInstituicaoCategoriaServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbservico`
--
ALTER TABLE `tbservico`
  MODIFY `codServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbvoluntario`
--
ALTER TABLE `tbvoluntario`
  MODIFY `codVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
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
