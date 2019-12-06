-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Dez-2019 às 12:14
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teknisa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agendamento`
--

CREATE TABLE `tb_agendamento` (
  `ID` int(11) NOT NULL,
  `IDSALA` int(11) NOT NULL,
  `HORAFIM` time NOT NULL,
  `HORAINI` time NOT NULL,
  `DATA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_colaborador`
--

CREATE TABLE `tb_colaborador` (
  `ID` int(11) NOT NULL,
  `NOMECOLAB` varchar(50) NOT NULL,
  `EMAILCOLAB` varchar(50) NOT NULL,
  `TELEFONECOLAB` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_salareuniao`
--

CREATE TABLE `td_salareuniao` (
  `ID` int(11) NOT NULL,
  `NOMESALA` varchar(50) NOT NULL,
  `QUANTCAD` int(11) NOT NULL,
  `COMPUTADOR` tinyint(1) NOT NULL,
  `PROJETOR` tinyint(1) NOT NULL,
  `VIDEOCHAMADA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDSALA` (`IDSALA`);

--
-- Índices para tabela `tb_colaborador`
--
ALTER TABLE `tb_colaborador`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `td_salareuniao`
--
ALTER TABLE `td_salareuniao`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_colaborador`
--
ALTER TABLE `tb_colaborador`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `td_salareuniao`
--
ALTER TABLE `td_salareuniao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  ADD CONSTRAINT `tb_agendamento_ibfk_1` FOREIGN KEY (`IDSALA`) REFERENCES `td_salareuniao` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
