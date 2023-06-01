-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jun-2023 às 18:56
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
-- Estrutura da tabela `tbavaliacao`
--

CREATE TABLE `tbavaliacao` (
  `codAvaliacao` int(11) NOT NULL,
  `codVoluntario` int(11) DEFAULT NULL,
  `codInstituicao` int(11) DEFAULT NULL,
  `numAvaliacao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Extraindo dados da tabela `tbcategoriaservico`
--

INSERT INTO `tbcategoriaservico` (`codCategoriaServico`, `nomeCategoria`) VALUES
(14, 'Crianças'),
(15, 'Adolescentes'),
(18, 'moradores de rua'),
(20, 'deficientes'),
(21, 'meio ambiente');

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
(18, 26, 14),
(19, 26, 15);

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
(8, 14, 4),
(9, 15, 4);

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
(17, '(11) 97701-3618', 1, 10),
(18, '(11) 95205-9562', 2, 10);

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

--
-- Extraindo dados da tabela `tbhabilidadeservico`
--

INSERT INTO `tbhabilidadeservico` (`codHabilidadeServico`, `nomeHabilidadeServico`) VALUES
(3, 'Inglês'),
(4, 'Cozinhar'),
(5, 'FrancÃªs');

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
(10, 26, 3);

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
  `descInstituicao` varchar(400) NOT NULL,
  `fotoInstituicao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbinstituicao`
--

INSERT INTO `tbinstituicao` (`codInstituicao`, `nomeInstituicao`, `logInstituicao`, `numLogInstituicao`, `cepInstituicao`, `compInstituicao`, `bairroInstituicao`, `cidadeInstituicao`, `estadoInstituicao`, `paisInstituicao`, `emailInstituicao`, `cnpjInstituicao`, `senhaInstituicao`, `descInstituicao`, `fotoInstituicao`) VALUES
(10, 'Ong Raio de sol', 'Estrada Manuel de Oliveira Ramos ', '282', '08473-050', 'casa', 'Conjunto Habitacional Sitio Conceição', 'São Paulo', 'São Paulo', 'Brasil', 'OngRaioSol@gmail.com', '78.806.858/0001-35', 'Ongraio1@', 'somos uma ong em apoio às crianças em estado de vulnerabilidade nas periferias de São Paulo', 'img-instituicao/10.jpg');

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
(26, '08:00:00', 'matutino', 10, 'Precisamos de professores de inglês que estão dispostos a ensinar \r\n', '08461-200', 'Cidade Popular', 'SP', 'Rua Paulo Ramos', 'casa', 'Brasil', '60', 'São Paulo', 'Professor de Inglês', 'presencial', '2023-05-10', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsolicitacaocategoria`
--

CREATE TABLE `tbsolicitacaocategoria` (
  `codSolicitacaoCategoria` int(11) NOT NULL,
  `codInstituicao` int(11) NOT NULL,
  `nomeCategoria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusSolicitacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsolicitacaohabilidade`
--

CREATE TABLE `tbsolicitacaohabilidade` (
  `codSolicitacaoHabilidade` int(11) NOT NULL,
  `codInstituicao` int(11) NOT NULL,
  `nomeHabilidade` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusSolicitacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
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
  `descVoluntario` varchar(400) NOT NULL,
  `fotoVoluntario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbvoluntario`
--

INSERT INTO `tbvoluntario` (`codVoluntario`, `nomeVoluntario`, `dataNascVoluntario`, `cpfVoluntario`, `logVoluntario`, `numLogVoluntario`, `cepVoluntario`, `compVoluntario`, `bairroVoluntario`, `cidadeVoluntario`, `estadoVoluntario`, `paisVoluntario`, `emailVoluntario`, `senhaVoluntario`, `descVoluntario`, `fotoVoluntario`) VALUES
(4, 'Fernanda de Souza Bezerra', '2005-07-27', '548.599.388-52', 'Travessa JoÃ£o Batista Cramer', '03', '08460-63', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'Brasil', 'bezerrafernanda223@gmail.com', 'Fernanda@1', 'Tenho 17 anos e creio que por meio do trabalho voluntário podemos melhorar o mundo, nem que seja com pequenos gestos, normalmente trabalho com instituições que apoiam crianças e adolescentes ', 'img-voluntario/4.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbadm`
--
ALTER TABLE `tbadm`
  ADD PRIMARY KEY (`codAdm`);

--
-- Índices para tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD PRIMARY KEY (`codAvaliacao`),
  ADD KEY `fk_AvaliacaoVoluntario` (`codVoluntario`),
  ADD KEY `fk_AvaliacaoInstituicao` (`codInstituicao`);

--
-- Índices para tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  ADD PRIMARY KEY (`codCandidatura`),
  ADD KEY `fk_vaga` (`codServico`),
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
-- Índices para tabela `tbservico`
--
ALTER TABLE `tbservico`
  ADD PRIMARY KEY (`codServico`),
  ADD KEY `fk_Instituicao` (`codInstituicao`);

--
-- Índices para tabela `tbsolicitacaocategoria`
--
ALTER TABLE `tbsolicitacaocategoria`
  ADD PRIMARY KEY (`codSolicitacaoCategoria`),
  ADD KEY `fk_SolicitacaoCategoria` (`codInstituicao`);

--
-- Índices para tabela `tbsolicitacaohabilidade`
--
ALTER TABLE `tbsolicitacaohabilidade`
  ADD PRIMARY KEY (`codSolicitacaoHabilidade`),
  ADD KEY `fk_SolicitacaoHabilidade` (`codInstituicao`);

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
-- AUTO_INCREMENT de tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  MODIFY `codAvaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcandidatura`
--
ALTER TABLE `tbcandidatura`
  MODIFY `codCandidatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcategoriaservico`
--
ALTER TABLE `tbcategoriaservico`
  MODIFY `codCategoriaServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  MODIFY `codCausaVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tbcausavoluntario`
--
ALTER TABLE `tbcausavoluntario`
  MODIFY `codCausaVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbfoneinstituicao`
--
ALTER TABLE `tbfoneinstituicao`
  MODIFY `codFoneInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tbfonevoluntario`
--
ALTER TABLE `tbfonevoluntario`
  MODIFY `codFoneVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbfotosinstituicao`
--
ALTER TABLE `tbfotosinstituicao`
  MODIFY `codfotoInstituicao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbhabilidadeservico`
--
ALTER TABLE `tbhabilidadeservico`
  MODIFY `codHabilidadeServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbhabivaga`
--
ALTER TABLE `tbhabivaga`
  MODIFY `codHabiVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbinstituicao`
--
ALTER TABLE `tbinstituicao`
  MODIFY `codInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbservico`
--
ALTER TABLE `tbservico`
  MODIFY `codServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tbsolicitacaocategoria`
--
ALTER TABLE `tbsolicitacaocategoria`
  MODIFY `codSolicitacaoCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbsolicitacaohabilidade`
--
ALTER TABLE `tbsolicitacaohabilidade`
  MODIFY `codSolicitacaoHabilidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbvoluntario`
--
ALTER TABLE `tbvoluntario`
  MODIFY `codVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD CONSTRAINT `fk_AvaliacaoInstituicao` FOREIGN KEY (`codInstituicao`) REFERENCES `tbinstituicao` (`codInstituicao`),
  ADD CONSTRAINT `fk_AvaliacaoVoluntario` FOREIGN KEY (`codVoluntario`) REFERENCES `tbvoluntario` (`codVoluntario`);

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
-- Limitadores para a tabela `tbsolicitacaocategoria`
--
ALTER TABLE `tbsolicitacaocategoria`
  ADD CONSTRAINT `fk_SolicitacaoCategoria` FOREIGN KEY (`codInstituicao`) REFERENCES `tbinstituicao` (`codInstituicao`);

--
-- Limitadores para a tabela `tbsolicitacaohabilidade`
--
ALTER TABLE `tbsolicitacaohabilidade`
  ADD CONSTRAINT `fk_SolicitacaoHabilidade` FOREIGN KEY (`codInstituicao`) REFERENCES `tbinstituicao` (`codInstituicao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
