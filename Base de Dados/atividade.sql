-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Ago-2017 às 23:25
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atividade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `estacao_id` int(11) NOT NULL,
  `temperatura` float DEFAULT NULL,
  `velocidade_vento` float DEFAULT NULL,
  `umidade` float DEFAULT NULL,
  `data` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id`, `estacao_id`, `temperatura`, `velocidade_vento`, `umidade`, `data`) VALUES
(1, 5, 12.32, 3, 42, '2017-03-01'),
(2, 1, 13, 4, 44, '2017-03-02'),
(3, 1, 15.5, 3, 46, '2017-03-03'),
(4, 1, 130.02, 5, 50, '2017-03-04'),
(7, 2, 18, 2, 65, '2017-03-01'),
(8, 2, 19, 2, 66, '2017-03-02'),
(9, 2, 20, 4, 65, '2017-03-03'),
(10, 2, 17, 5, 68, '2017-03-04'),
(11, 2, 14, 6, 68, '2017-03-05'),
(12, 2, 13, 5, 69, '2017-03-06'),
(13, 2, 11, 4, 68, '2017-03-07'),
(14, 3, 23, 1, 73, '2017-03-01'),
(15, 3, 22, 1, 74, '2017-03-02'),
(16, 3, 22.4, 1, 74, '2017-03-03'),
(17, 3, 23.5, 2, 74, '2017-03-04'),
(18, 3, 25.1, 1, 73, '2017-03-05'),
(19, 3, 27.6, 0, 72, '2017-03-06'),
(20, 3, 28, 1, 71, '2017-03-07'),
(21, 3, 28, 1, 72, '2017-03-08'),
(22, 4, 31, 2, 86, '2017-03-01'),
(23, 4, 30.6, 2, 88, '2017-03-02'),
(24, 4, 30.1, 3, 86, '2017-03-03'),
(25, 4, 29.8, 3, 85, '2017-03-04'),
(26, 4, 30.5, 4, 86, '2017-03-05'),
(27, 5, 17.2, 1, 62, '2017-03-01'),
(28, 5, 17.6, 0, 62, '2017-03-02'),
(29, 5, 18, 0, 63, '2017-03-03'),
(30, 5, 18.3, 0, 64, '2017-03-04'),
(31, 5, 17.9, 1, 64, '2017-03-05'),
(32, 5, 18.7, 1, 70, '2017-03-06'),
(33, 5, 19, 2, 71, '2017-03-07'),
(34, 5, 19.8, 1, 71, '2017-03-08'),
(35, 5, 19.3, 0, 73, '2017-03-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estacoes`
--

CREATE TABLE `estacoes` (
  `id` int(11) NOT NULL,
  `serial` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estacoes`
--

INSERT INTO `estacoes` (`id`, `serial`, `lat`, `lon`, `nome`) VALUES
(1, 'A50650A017', '-18.2108333333', '-53.2041666667', 'São Paulo'),
(2, 'B205843A03', '-11.7664444444', '-45.6497500000', 'Santa Maria'),
(3, 'A004155033', '-12.9020277778', '-45.4990555556', 'Porto Alegre'),
(4, 'A00655N019', '-28.5052777778', '-53.2658333333', 'Florianópolis'),
(5, 'A91123N234', '-18.6166666667', '-49.4166666667', 'Curitiba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estacoes`
--
ALTER TABLE `estacoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dados`
--
ALTER TABLE `dados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `estacoes`
--
ALTER TABLE `estacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
