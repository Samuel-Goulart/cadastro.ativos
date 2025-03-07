-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/03/2025 às 02:00
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ativo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ativos`
--

CREATE TABLE `ativos` (
  `idAtivo` int(11) NOT NULL,
  `descriçaoAtivo` varchar(200) NOT NULL,
  `quantidadeAtivo` int(11) NOT NULL,
  `statusAtivo` varchar(200) NOT NULL,
  `observaçaoAtivo` varchar(200) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `usuarioCadastro` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `marca` varchar(85) NOT NULL,
  `urlImagem` varchar(100) NOT NULL,
  `quantidadeMinAtivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ativos`
--

INSERT INTO `ativos` (`idAtivo`, `descriçaoAtivo`, `quantidadeAtivo`, `statusAtivo`, `observaçaoAtivo`, `dataCadastro`, `usuarioCadastro`, `idMarca`, `idTipo`, `marca`, `urlImagem`, `quantidadeMinAtivo`) VALUES
(72, 'Carregador de Notebook 19V', 5, 'S', 'carregador da 19v', '2025-02-18 20:35:27', 47, 10, 6, '', 'cadastro.ativos/img_ativo/20250219003546.png', 20),
(73, 'notebook book 4', 5, 'S', 'notebook cinza', '2025-02-20 21:33:13', 47, 14, 7, '', 'cadastro.ativos/img_ativo/20250221013313.jpeg', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `descriçaoMarca` varchar(200) NOT NULL,
  `statusMarca` varchar(200) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `usuarioCadastro` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marca`
--

INSERT INTO `marca` (`idMarca`, `descriçaoMarca`, `statusMarca`, `dataCadastro`, `usuarioCadastro`) VALUES
(10, 'Lenovo', 'S', '2025-02-17 21:12:08', '21'),
(11, 'Asus', 'S', '2025-02-17 21:12:20', '21'),
(12, 'Intel', 'S', '2025-02-17 21:12:28', '21'),
(13, 'AMD', 'S', '2025-02-17 21:12:38', '21'),
(14, 'Samsung', 'S', '2025-02-17 21:12:49', '21'),
(15, 'LG', 'S', '2025-02-17 21:12:56', '21'),
(16, 'Positivo', 'S', '2025-02-17 21:13:03', '21'),
(17, 'Nokia', 'S', '2025-02-17 21:14:22', '21'),
(18, 'Toshiba', 'S', '2025-02-17 21:14:35', '21'),
(19, 'Sony ', 'S', '2025-02-17 21:14:44', '21'),
(20, 'HP', 'S', '2025-02-17 21:15:00', '21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentaçao`
--

CREATE TABLE `movimentaçao` (
  `idMovimentaçao` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAtivo` int(11) NOT NULL,
  `localOrigem` varchar(200) NOT NULL,
  `localDestino` varchar(200) NOT NULL,
  `dataMovimentaçao` datetime NOT NULL,
  `descriçaoMovimentaçao` varchar(300) NOT NULL,
  `quantidadeUso` int(10) NOT NULL,
  `quantidadeMov` int(11) NOT NULL,
  `statusMov` varchar(2) NOT NULL DEFAULT 'S',
  `tipoMovimentacao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `movimentaçao`
--

INSERT INTO `movimentaçao` (`idMovimentaçao`, `idUsuario`, `idAtivo`, `localOrigem`, `localDestino`, `dataMovimentaçao`, `descriçaoMovimentaçao`, `quantidadeUso`, `quantidadeMov`, `statusMov`, `tipoMovimentacao`) VALUES
(16, 21, 72, 'ss', 'ss', '2025-02-21 19:27:28', 'ss', 2, 2, 'S', 'adicionar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE `tipo` (
  `idTipo` int(11) NOT NULL,
  `descriçaoTipo` varchar(200) NOT NULL,
  `statusTipo` varchar(20) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `usuarioCadastro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo`
--

INSERT INTO `tipo` (`idTipo`, `descriçaoTipo`, `statusTipo`, `dataCadastro`, `usuarioCadastro`) VALUES
(5, 'Smartphones', 'S', '2025-02-17 21:16:21', 21),
(6, 'Desktops ', 'N', '2025-02-17 21:16:32', 21),
(7, 'Laptops', 'S', '2025-02-17 21:16:41', 21),
(8, 'Impressora', 'S', '2025-02-17 21:17:32', 21),
(9, 'Hardware ', 'S', '2025-02-17 21:19:17', 21);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senhaUsuario` varchar(200) NOT NULL,
  `turmaUsuario` varchar(80) NOT NULL,
  `admin` varchar(2) NOT NULL DEFAULT 'N',
  `dataCadastro` datetime NOT NULL,
  `dataAlteracao` datetime NOT NULL,
  `usuarioAlteraçao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `usuario`, `senhaUsuario`, `turmaUsuario`, `admin`, `dataCadastro`, `dataAlteracao`, `usuarioAlteraçao`) VALUES
(22, 'admin', 'admin', 'YWRtaW4xMjEz', '10', 'S', '2025-01-24 01:04:15', '2025-01-24 01:04:15', 0),
(47, 'samuel', 'samuel', 'MDEyMzQ1NjdTYSU=', '13', 'N', '2025-02-21 21:27:38', '0000-00-00 00:00:00', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ativos`
--
ALTER TABLE `ativos`
  ADD PRIMARY KEY (`idAtivo`);

--
-- Índices de tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`),
  ADD KEY `usuarioCadastro` (`usuarioCadastro`);

--
-- Índices de tabela `movimentaçao`
--
ALTER TABLE `movimentaçao`
  ADD PRIMARY KEY (`idMovimentaçao`),
  ADD KEY `idUsuario` (`idUsuario`,`idAtivo`);

--
-- Índices de tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idTipo`),
  ADD KEY `usuarioCadastro` (`usuarioCadastro`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ativos`
--
ALTER TABLE `ativos`
  MODIFY `idAtivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `movimentaçao`
--
ALTER TABLE `movimentaçao`
  MODIFY `idMovimentaçao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
