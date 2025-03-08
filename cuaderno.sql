-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 07:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuaderno`
--

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE `modulos` (
  `id` varchar(60) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `id` varchar(60) NOT NULL,
  `rol_id` varchar(60) NOT NULL,
  `modulo_id` varchar(60) NOT NULL,
  `r` int(11) NOT NULL,
  `w` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registros`
--

CREATE TABLE `registros` (
  `id` varchar(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registros`
--

INSERT INTO `registros` (`id`, `nombre`, `apellido`, `status`) VALUES
('167c1dff48b21d', 'el registro', 'nooo', 0),
('67c1df868f9c9', 'hola', 'mojo', 0),
('67c1dfc90f58c3.08457067', 'nuevo nom', 'oooj', 0),
('67c1e2f3ab15b5.04652169', 'concilio', 'fernando', 0),
('67c1e556b68894.88613166', 'concilio', 'fernandos', 0),
('67c1e59b841ed5.85589859', 'concilio', 'fernandos', 0),
('67c1e5c0dd30a9.28744586', 'carlo', 'fernandiño', 0),
('67c202f710f745.46977641', 'elnom', 'bre', 0),
('67c2030fe470d3.46355984', 'virgulilla', 'jajaja XDDD', 0),
('67c21b42808db4.86768492', 'alfredo gonofredo', 'mn', 0),
('67c21dcfee6de8.98791598', 'tocino', 'biscocho', 0),
('67c2225a460810.13279230', 'anacaro', 'decaro', 0),
('67c2297856d4d2.00604612', 'ostia', 'tio', 0),
('67c22d37407253.65605431', 'capriccio', 'urbamo', 0),
('67c3f2e9133de3.29521684', 'hola', 'canson', 0),
('67c3f3503d8278.53517604', 'Anderson', 'Cabrera', 1),
('67c3f360597771.07177069', 'esto es otra cosa', 'no c xD', 0),
('67c4c2c901fa02.23000943', 'Alejandro', 'Buitrago', 1),
('67c4c4b08392b9.83664373', 'Andres', 'Rincon', 1),
('67c511e17327b5.46473334', 'otro registro', 'mas', 0),
('67c54131dc19b7.13443484', 'nuevo registro', 'apartir de nose', 0),
('67c6187ad97e47.78160409', 'Paton', 'Bauza', 0),
('67c618c5674430.36537717', 'sdsdsd', 'sooooosaaaaa', 0),
('67c626bc87b3c7.03867470', 'Sergio ', 'cazuelaz', 0),
('a6sd54s6d54', 'sebasttopol', 'hola', 0),
('a6sd54s6d54sdd', 'dfgdf', 'dfg', 0),
('as56d4a6sd54', 'sosobra', 'asdd', 0),
('registros_67c1dfde089289.44657532', 'nuevo nom', 'oooj', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` varchar(40) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `status`) VALUES
('67c93a4fa0a661.10017893', 'Vendedor', 'Rol para ventas', 1),
('67c93aa50bc6c0.23522713', 'Admin', 'Administrador del sitio', 1),
('67c9dd73f13eb7.54260594', 'eliminable', 'aldkjasdjkl', 0),
('67c9dda559ded9.51385382', 'asdasdas', 'asdasdasd', 0),
('67c9dda9133534.90117198', 'ddsdssd', 'sdsdsdsd', 0),
('67ca1c4d811b23.74278146', 'Agente de ventas', 'Rol de vendedor', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(30) NOT NULL,
  `documento` varchar(30) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `documento`, `tipo_documento`, `nombres`, `apellidos`, `email`, `password`, `status`) VALUES
('67c67ac43b8993.94684642', '12321', '', 'Sebastian', 'Lopez Gallego', 'sebaslg96@gmail.com', '123', 1),
('67c67da4955794.23412195', '86546545', '', 'Raul', 'Alfonsin', 'dfgdfg', '65446', 1),
('67c786794f3109.14043433', '987978', '', 'Luna', 'Lopez', '', '', 0),
('67c7868591f433.92496084', '65465464', '', 'Pablo', 'Guaimarez', '', '', 1),
('67c7af416bf354.86480233', '1', '', 'testeo user', 'asd', 'jeje', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 1),
('67c7c8ad09c2c6.84596912', '78987', '', 'leopoldo', 'gomez', '', '', 1),
('67c7c8b2d663f7.36285255', '78987', '', 'leopoldo', 'gomez', '', '', 0),
('67c7c946498204.84334087', '7894654', '', 'sdfsdfd', 'sdfsdfds', '', '', 1),
('67c7cb6e4815b5.24446698', '789879', '', 'PEPO', 'Perez', '', '', 1),
('67c8da974054b9.42035304', '65465465', '', 'coquimbo', 'chileno', 'correito', '1234', 1),
('67c8dabdb08882.60858551', '321321', '', '', 'TEST', 'asdasd', 'adadasdsa', 0),
('67c9072eebf618.23329924', '999446', '', 'Saturno', 'V', 'cohete@gmail.com', '0247c25fa0e1edb82d6b1acddbea38a7b806a2b2bfc84a53aa015b4dd6e3dbe4', 0),
('67c9158b0a06e5.57481080', '4655000', '', 'STS', 'Discovery', 'SRBs@gmail.com', 'a9be84ad9b0bd66d70a2d64b2688018cd1f8e35fa0ff120a1b544d95574eb244', 0),
('67c915e4626bb0.14864600', '98797897', '', 'Carlos', 'juanin', 'asdklj', '0b2807248588360200b214ba96a4af653b832cbf599820f575ed23e636ba7018', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
