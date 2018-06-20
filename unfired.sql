-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2018 at 01:15 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unfired`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `nome`) VALUES
(6, 'Engenharia Civil'),
(9, 'Espelharia'),
(5, 'Informática'),
(8, 'Mecatrônica');

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id`, `nome`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_area` int(11) NOT NULL,
  `descricao` varchar(300) COLLATE utf8_bin NOT NULL,
  `endereco` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `email`, `id_area`, `descricao`, `endereco`) VALUES
(2, 'Engenharia e cia.', 'engenhariaecia@gmail.com', 6, 'Empresa focada em assuntos engenhosos.', 'Rua dos Engenheiros do Hawuai, 222, Parque Brasil.'),
(3, 'Informática e CIA.', 'informaticaecia@outlook.com', 5, 'Empresa tal', 'Rua da empresa,333, Parque tal, Araraquara, São Paulo');

-- --------------------------------------------------------

--
-- Table structure for table `trabalhador`
--

CREATE TABLE `trabalhador` (
  `id` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `nome` varchar(80) COLLATE utf8_bin NOT NULL,
  `sexo` char(1) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `telefone` varchar(18) COLLATE utf8_bin NOT NULL,
  `cidade_estado` varchar(80) COLLATE utf8_bin NOT NULL,
  `data_nasc` date NOT NULL,
  `escolaridade` varchar(40) COLLATE utf8_bin NOT NULL,
  `curriculo` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `trabalhador`
--

INSERT INTO `trabalhador` (`id`, `id_area`, `id_cargo`, `nome`, `sexo`, `email`, `telefone`, `cidade_estado`, `data_nasc`, `escolaridade`, `curriculo`) VALUES
(4, 6, 1, 'Joaocito', 'F', 'marlucisol@hotmail.com', '16997344120', 'Araraquara', '2018-06-06', 'Ensino médio completo', 'teste201806171238.docx'),
(5, 9, 1, 'Joca da Silva', 'M', 'jocadoribeirao@gmail.com', '16999999', 'Ribeirão Preto', '2018-06-21', 'Curso superior completo', 'testeDocs201806191038.docx');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_empresa`
--
CREATE TABLE `view_empresa` (
`id` int(11)
,`nome` varchar(80)
,`email` varchar(100)
,`id_area` int(11)
,`descricao` varchar(300)
,`endereco` varchar(150)
,`nome_area` varchar(80)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_trabalhador`
--
CREATE TABLE `view_trabalhador` (
`id` int(11)
,`id_area` int(11)
,`id_cargo` int(11)
,`nome` varchar(80)
,`sexo` char(1)
,`email` varchar(100)
,`telefone` varchar(18)
,`cidade_estado` varchar(80)
,`data_nasc` date
,`escolaridade` varchar(40)
,`curriculo` varchar(30)
,`nome_area` varchar(80)
,`nome_cargo` varchar(80)
);

-- --------------------------------------------------------

--
-- Structure for view `view_empresa`
--
DROP TABLE IF EXISTS `view_empresa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_empresa`  AS  select `empresa`.`id` AS `id`,`empresa`.`nome` AS `nome`,`empresa`.`email` AS `email`,`empresa`.`id_area` AS `id_area`,`empresa`.`descricao` AS `descricao`,`empresa`.`endereco` AS `endereco`,`area`.`nome` AS `nome_area` from (`empresa` join `area` on((`empresa`.`id_area` = `area`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_trabalhador`
--
DROP TABLE IF EXISTS `view_trabalhador`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_trabalhador`  AS  select `trabalhador`.`id` AS `id`,`trabalhador`.`id_area` AS `id_area`,`trabalhador`.`id_cargo` AS `id_cargo`,`trabalhador`.`nome` AS `nome`,`trabalhador`.`sexo` AS `sexo`,`trabalhador`.`email` AS `email`,`trabalhador`.`telefone` AS `telefone`,`trabalhador`.`cidade_estado` AS `cidade_estado`,`trabalhador`.`data_nasc` AS `data_nasc`,`trabalhador`.`escolaridade` AS `escolaridade`,`trabalhador`.`curriculo` AS `curriculo`,`area`.`nome` AS `nome_area`,`cargo`.`nome` AS `nome_cargo` from ((`trabalhador` join `area` on((`trabalhador`.`id_area` = `area`.`id`))) join `cargo` on((`trabalhador`.`id_cargo` = `cargo`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `nome` (`nome`),
  ADD KEY `id_area` (`id_area`);

--
-- Indexes for table `trabalhador`
--
ALTER TABLE `trabalhador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trabalhador`
--
ALTER TABLE `trabalhador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`);

--
-- Constraints for table `trabalhador`
--
ALTER TABLE `trabalhador`
  ADD CONSTRAINT `trabalhador_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `trabalhador_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
