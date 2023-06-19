-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jun-2023 às 22:43
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

--
-- Extraindo dados da tabela `tbcandidatura`
--

INSERT INTO `tbcandidatura` (`codCandidatura`, `codVoluntario`, `codServico`, `statusCandidatura`) VALUES
(1, 4, 26, 'pendente'),
(4, 11, 26, 'pendente');

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
(21, 'meio ambiente'),
(22, 'Idosos'),
(23, 'Animais ');

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
(19, 26, 15),
(21, 28, 21),
(22, 29, 14);

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
(9, 15, 4),
(10, 18, 10),
(11, 21, 10),
(13, 14, 11),
(14, 21, 11),
(15, 22, 14),
(16, 23, 14),
(17, 14, 15),
(18, 15, 15),
(19, 22, 15),
(27, 18, 12),
(28, 20, 12),
(29, 21, 12),
(30, 22, 12),
(31, 23, 12),
(32, 15, 16),
(33, 21, 16),
(34, 22, 16),
(35, 23, 16),
(36, 14, 17),
(37, 15, 17);

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
(18, '(11) 95205-9562', 2, 10),
(19, '(11) 95380-5993', 1, 11),
(20, '', 2, 11),
(21, '(11) 92584-5682', 1, 12),
(22, '', 2, 12),
(23, '(67) 98378-4340', 1, 13),
(24, '', 2, 13);

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
(8, '(11)2016-8242', 2, 4),
(9, '(11) 95991-1849', 1, 5),
(10, '', 2, 5),
(11, '(11) 5698-2355', 1, 6),
(12, '', 2, 6),
(13, '(11) 95991-1849', 1, 7),
(14, '', 2, 7),
(15, '(11) 5698-2355', 1, 8),
(16, '', 2, 8),
(17, '(11) 5698-2355', 1, 9),
(18, '', 2, 9),
(19, '(11) 95991-1849', 1, 10),
(20, '', 2, 10),
(21, '(11) 97701-3618', 1, 11),
(22, '', 2, 11),
(23, '', 1, 12),
(24, '(11) 95897-0126', 2, 12),
(25, '(11) 94516-1148', 1, 13),
(26, '', 2, 13),
(27, '(11) 94516-1148', 1, 14),
(28, '', 2, 14),
(29, '(11) 95205-9562', 1, 15),
(30, '', 2, 15),
(31, '(11) 92587-3410', 1, 16),
(32, '', 2, 16),
(33, '(11) 96787-4406', 1, 17),
(34, '', 2, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfotosinstituicao`
--

CREATE TABLE `tbfotosinstituicao` (
  `codfotoInstituicao` int(11) NOT NULL,
  `fotosInstituicao` varchar(200) NOT NULL,
  `codInstituicao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbfotosinstituicao`
--

INSERT INTO `tbfotosinstituicao` (`codfotoInstituicao`, `fotosInstituicao`, `codInstituicao`) VALUES
(1, 'galeria-instituicao/647e1708e3758.png', 10),
(2, 'galeria-instituicao/647e1dad28e23.png', 10),
(3, 'galeria-instituicao/647e1e934e551.jpg', 10),
(4, 'galeria-instituicao/647e1e99d5308.jpg', 10),
(5, 'galeria-instituicao/647e1f447d26c.jpg', 10);

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
(10, 26, 3),
(11, 29, 3);

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
(10, 'Ong Raio de sol', 'Estrada Manuel de Oliveira Ramos ', '282', '08473-050', 'casa', 'Conjunto Habitacional Sitio Conceição', 'São Paulo', 'São Paulo', 'Brasil', 'OngRaioSol@gmail.com', '78.806.858/0001-35', 'Ongraio1@', 'somos uma ong em apoio às crianças em estado de vulnerabilidade nas periferias de São Paulo', 'img-instituicao/10.jpg'),
(11, 'Ong FLorAzul', 'Rua Manuel Félix de Lima', '300', '08191-290', '', 'Jardim Romano', 'São Paulo', 'SP', 'Brasil', 'ongflorazul@gmail.com', '82.479.237/0001-61', 'OngAzul1@', 'A Ong Flor Azul é um movimento voluntário da sociedade para fortalecer o combate ao coronavírus no Estado de São Paulo,. que não possui vínculos partidários. O grupo ...', 'img-instituicao/11.jpg'),
(12, 'Ong Amor em Movimento', 'Avenida Tomás Lopes de Camargo', '123', '08191-230', 'casa', 'Jardim Romano', 'São Paulo', 'SP', 'Brasil', 'OngAmorEmMovimento@gmail.com', '70.089.965/0001-88', 'OngAmor1@', '\"Promover através de Ações e Gestos o desenvolvimento da comunidade local, contribuindo para o fortalecimento dos vínculos familiares e sociais.\"', 'img-instituicao/12.png'),
(13, 'Ong Decolar', 'Servidão do Passarinho', '666', '88066-552', 'casa', 'Armação do Pântano do Sul', 'Florianópolis', 'SC', 'Brasil', 'ongdecolar@gmail.com', '64.309.992/0001-16', 'Decolar1@', 'Somos uma ONG que busca trabalhar com as periferias.', 'img-instituicao/13.png');

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
(26, '08:00:00', 'matutino', 10, 'Precisamos de professores de inglês que estão dispostos a ensinar \r\n', '08461-200', 'Cidade Popular', 'SP', 'Rua Paulo Ramos', 'casa', 'Brasil', '60', 'São Paulo', 'Professor de Inglês', 'presencial', '2023-05-10', 3),
(28, '08:00:00', 'matutino', 10, 'precisamos de jardineiros para cuidar do nosso espaço\r\n', '08460-635', 'Jardim do Divino', 'SP', 'Travessa João Batista Cramer', 'Casa', 'Brasil', '60', 'São Paulo', 'jardineiro(a)', 'presencial', '2023-06-05', 5),
(29, '15:00:00', 'vespertino', 10, 'precisamos de professores para nossas crianças', '08191-260', 'Jardim Romano', 'SP', 'Rua André Furtado de Mendonça', 'Casa', 'Brasil', '800', 'São Paulo', 'professor ', 'ead', '2023-06-05', 3);

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

--
-- Extraindo dados da tabela `tbsolicitacaocategoria`
--

INSERT INTO `tbsolicitacaocategoria` (`codSolicitacaoCategoria`, `codInstituicao`, `nomeCategoria`, `statusSolicitacao`) VALUES
(4, 10, 'Idosos', 'aceito'),
(5, 10, 'Animais ', 'aceito');

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
  `fotoVoluntario` varchar(50) NOT NULL,
  `visibilidadeVoluntario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbvoluntario`
--

INSERT INTO `tbvoluntario` (`codVoluntario`, `nomeVoluntario`, `dataNascVoluntario`, `cpfVoluntario`, `logVoluntario`, `numLogVoluntario`, `cepVoluntario`, `compVoluntario`, `bairroVoluntario`, `cidadeVoluntario`, `estadoVoluntario`, `paisVoluntario`, `emailVoluntario`, `senhaVoluntario`, `descVoluntario`, `fotoVoluntario`, `visibilidadeVoluntario`) VALUES
(4, 'Fernanda de Souza Bezerra', '2005-07-27', '548.599.388-52', 'Travessa JoÃ£o Batista Cramer', '03', '08460-63', 'casa', 'Jardim do Divino', 'SÃ£o Paulo', 'SP', 'Brasil', 'bezerrafernanda223@gmail.com', 'Fernanda@1', 'Tenho 17 anos e creio que por meio do trabalho voluntário podemos melhorar o mundo, nem que seja com pequenos gestos, normalmente trabalho com instituições que apoiam crianças e adolescentes ', 'img-voluntario/4.png', 'on'),
(10, 'Gabriella Ferreira Alves', '2005-05-22', '503.807.788-90', 'Rua Paulo Ramos', '48', '08461-20', 'Casa', 'Cidade Popular', 'São Paulo', 'SP', 'Brasil', 'ferreiraalvesg2@outlook.com', 'gabiGabi2@', 'Quero ser uma voluntária!', 'img-voluntario/10.png', 'on'),
(11, 'Marcos Eric de Medeiros', '2004-07-02', '481.230.448-28', 'Avenida Tomás Lopes de Camargo', '800', '08191-23', 'Casa', 'Jardim Romano', 'São Paulo', 'SP', 'Brasil', 'srmarcoserick1@gmail.com', '02072004mM.', 'Amo cuidar de animais e gostaria de poder demonstrar esse sentimento que eu tenho por animais.', 'img-voluntario/11.jpg', 'on'),
(12, 'Kauã Ferreira da Silva', '2004-09-09', '388.178.558-20', 'Travessa Michel Lambert', '34', '08473-55', 'casa 2', 'Conjunto Habitacional Barro Branco II', 'São Paulo', 'SP', 'Brasil', 'kauasimone.1@gmail.com', 'Kauas2simone!', 'estou disposto a aceitar qualquer tipo de trabalho voluntário que se encaixe com meu perfil.', 'img-voluntario/12.png', 'on'),
(14, 'Ryan Gustavo Santos de Jesus', '2005-08-26', '528.342.778-18', 'Rua. Cachoeira Escaramuça', '719', '08110-78', 'Casa 2', 'Vila Itaim', 'São Paulo', 'SP', 'Brasil', 'ryangustavo23@gmail.com', 'Ryanzin@26', 'Olá, meu nome é Ryan.\r\nTenho 17 anos.\r\nAceito trabalhar como voluntário em áreas que se adequam o meu perfil.', 'img-voluntario/14.jpg', 'on'),
(15, 'Sandra Regina de Souza', '1983-06-26', '316.469.188-27', 'Avenida Tomás Lopes de Camargo', '800', '08191-23', 'casa', 'Jardim Romano', 'São Paulo', 'SP', 'Brasil', 'sandrargnsz@gmail.com', '10022713Sr', 'Sou professora e gosto muito de ajudar crianças', 'img-voluntario/15.jpg', 'on'),
(16, 'Fabio Medeiros da Silva', '1981-04-27', '293.822.098-75', 'Avenida Tomás Lopes de Camargo', '800', '08191-23', 'Casa', 'Jardim Romano', 'São Paulo', 'SP', 'Brasil', 'fabiomedeiross02@gmail.com', '10022713Sr', 'Amo animais', 'img-voluntario/16.jpg', 'on'),
(17, 'Maria José de Jesus Ferreira', '1945-09-11', '602.802.030-39', 'Rua Paulo Ramos', '48', '08461-20', 'Casa 1', 'Cidade Popular', 'São Paulo', 'SP', 'Brasil', 'mariaj@gmail.com', 'mariaJ1', 'Sou idosa mas sou dura na queda !\r\nQuero fazer bolinhos para as crianças.', 'img-voluntario/17jpeg', 'on');

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
  MODIFY `codCandidatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbcategoriaservico`
--
ALTER TABLE `tbcategoriaservico`
  MODIFY `codCategoriaServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tbcausavaga`
--
ALTER TABLE `tbcausavaga`
  MODIFY `codCausaVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tbcausavoluntario`
--
ALTER TABLE `tbcausavoluntario`
  MODIFY `codCausaVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `tbfoneinstituicao`
--
ALTER TABLE `tbfoneinstituicao`
  MODIFY `codFoneInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tbfonevoluntario`
--
ALTER TABLE `tbfonevoluntario`
  MODIFY `codFoneVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `tbfotosinstituicao`
--
ALTER TABLE `tbfotosinstituicao`
  MODIFY `codfotoInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbhabilidadeservico`
--
ALTER TABLE `tbhabilidadeservico`
  MODIFY `codHabilidadeServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbhabivaga`
--
ALTER TABLE `tbhabivaga`
  MODIFY `codHabiVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbinstituicao`
--
ALTER TABLE `tbinstituicao`
  MODIFY `codInstituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbservico`
--
ALTER TABLE `tbservico`
  MODIFY `codServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tbsolicitacaocategoria`
--
ALTER TABLE `tbsolicitacaocategoria`
  MODIFY `codSolicitacaoCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbsolicitacaohabilidade`
--
ALTER TABLE `tbsolicitacaohabilidade`
  MODIFY `codSolicitacaoHabilidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbvoluntario`
--
ALTER TABLE `tbvoluntario`
  MODIFY `codVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
