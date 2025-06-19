-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2025 at 01:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `almacenes`
--

CREATE TABLE `almacenes` (
  `id` varchar(30) NOT NULL,
  `modify_date` date NOT NULL,
  `modify_by` varchar(60) NOT NULL,
  `status` int(1) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text NOT NULL,
  `config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `almacenes`
--

INSERT INTO `almacenes` (`id`, `modify_date`, `modify_by`, `status`, `nombre`, `descripcion`, `config`) VALUES
('685249663b196', '2025-06-18', '1', 1, 'Almacen la Quinta', 'Ubicado en la calle 4', '{\"title\":\"Facturita\",\"secondTitle\":\"Venta\\/Recibo\",\"documentType\":\"Resporete\",\"storeName\":\"La Quinua\",\"storeNit\":\"54654546\",\"storeAddress\":\"enrique segoviano\",\"storePhone\":\"3215666\",\"storeEmail\":\"se@dsd.co\",\"reportSuffix\":\"LQN\",\"reportFooter1\":\"jjijiji\",\"reportFooter2\":\"sdijdf\"}'),
('68532855eb589', '2025-06-18', '1', 1, 'Visperas del Mar', 'Ubicado en Bolivia', '{\"title\":\"Recibo de Ventas\",\"secondTitle\":\"Venta\",\"documentType\":\"Recibo de venta\",\"storeName\":\"Fajas Mimi\",\"storeNit\":\"26286642\",\"storeAddress\":\"CL 12 # 7 - 49\",\"storePhone\":\"000000000\",\"storeEmail\":\"ventasfajasmimi@gmail.com\",\"reportSuffix\":\"RECIBO\",\"reportFooter1\":\"Para cualquier cambio o reclamo es indispensable presentar esta factura. Plazo para cambios o garant&iacute;as &uacute;nicamente hasta 30 d&iacute;as despu&eacute;s de la compra. Prendas en promoci&oacute;n no tienen cambio. No se hace devoluci&oacute;n de dinero. Las prendas deben conservar su ticket original, para que se pueda realizar alg&uacute;n cambio. Gracias por su compra\",\"reportFooter2\":\"Software Design and Development By 7d Studio 00000080124406-0\"}');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_modificacion` date NOT NULL,
  `creado_por` varchar(30) NOT NULL,
  `modificado_por` varchar(30) NOT NULL,
  `documento` varchar(30) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` varchar(60) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `timestamp`, `fecha_modificacion`, `creado_por`, `modificado_por`, `documento`, `direccion`, `nombre`, `email`, `telefono`, `status`) VALUES
('6850eedb814b61.32045595', '2025-06-17 04:28:11', '2025-06-16', '1', '1', '1321', 'avenida 23 con 33', 'secilio marchesin', 'cecills2d1@gmail.com', '321324', 1),
('6851bce5e75c78.27014715', '2025-06-17 19:07:17', '2025-06-17', '1', '1', '98787', 'dasds', 'Sebastian', 'sebassasalag96@gmail.com', '23435435534', 1),
('6851c38c9f7f09.34170740', '2025-06-17 19:35:40', '2025-06-17', '1', '1', '123', 'werwe', 'Raul', 'sebaslg96@gmail.com', '3106019959', 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `config_key` varchar(100) NOT NULL,
  `config_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_key`, `config_value`) VALUES
('configBillReport', '{\"title\":\"Recibo de Ventas\",\"secondTitle\":\"Venta\",\"documentType\":\"Recibo de venta\",\"storeName\":\"Fajas Mimi\",\"storeNit\":\"26286642\",\"storeAddress\":\"CL 12 # 7 - 49\",\"storePhone\":\"3104270002\",\"storeEmail\":\"ventasfajasmimi@gmail.com\",\"reportSuffix\":\"RECIBO\",\"reportFooter1\":\"Para cualquier cambio o reclamo es indispensable presentar esta factura. Plazo para cambios o garant&iacute;as &uacute;nicamente hasta 30 d&iacute;as despu&eacute;s de la compra. Prendas en promoci&oacute;n no tienen cambio. No se hace devoluci&oacute;n de dinero. Las prendas deben conservar su ticket original, para que se pueda realizar alg&uacute;n cambio. Gracias por su compra\",\"reportFooter2\":\"Software Design and Development By 7d Studio 00000080124406-0\"}');

-- --------------------------------------------------------

--
-- Table structure for table `factura_detalle`
--

CREATE TABLE `factura_detalle` (
  `id` varchar(30) NOT NULL,
  `factura_maestro_id` varchar(30) NOT NULL,
  `producto_id` varchar(30) NOT NULL,
  `producto_codigo` varchar(150) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `total` double NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `factura_maestro`
--

CREATE TABLE `factura_maestro` (
  `id` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modify_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modify_by` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `titulo` varchar(160) NOT NULL,
  `subtitulo` varchar(160) NOT NULL,
  `nombre_reporte` varchar(160) NOT NULL,
  `nombre_almacen` varchar(160) NOT NULL,
  `nit` varchar(60) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pagina_web` varchar(150) NOT NULL,
  `prefijo_consecutivo` varchar(10) NOT NULL,
  `numero_consecutivo` double NOT NULL,
  `autor` varchar(30) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `identidad_cliente` varchar(60) NOT NULL,
  `telefono_cliente` varchar(60) NOT NULL,
  `tipo_pago` varchar(60) NOT NULL,
  `descuento` double NOT NULL,
  `subtotal` double NOT NULL,
  `iva` double NOT NULL,
  `abono` double NOT NULL,
  `total` double NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `factura_maestro`
--

INSERT INTO `factura_maestro` (`id`, `timestamp`, `modify_date`, `modify_by`, `status`, `imagen`, `titulo`, `subtitulo`, `nombre_reporte`, `nombre_almacen`, `nit`, `direccion`, `telefono`, `email`, `pagina_web`, `prefijo_consecutivo`, `numero_consecutivo`, `autor`, `cliente`, `identidad_cliente`, `telefono_cliente`, `tipo_pago`, `descuento`, `subtotal`, `iva`, `abono`, `total`, `comentario`) VALUES
('68547aea5c9c45.33899393', '2025-06-19 21:02:34', '2025-06-19 21:02:34', '1', 1, '', 'Facturita', 'Venta/Recibo', 'Resporete', 'La Quinua', '54654546', 'enrique segoviano', '3215666', 'se@dsd.co', 'http://localhost/crud_master', 'LQN', 34, 'Root root', 'Raul', '123', '3106019959', 'Transferencia', 0, 25000, 0, 25000, 25000, 'asdsa'),
('68547b83073073.73961584', '2025-06-19 21:05:07', '2025-06-19 21:05:07', '1', 1, '', 'Facturita', 'Venta/Recibo', 'Resporete', 'La Quinua', '54654546', 'enrique segoviano', '3215666', 'se@dsd.co', 'http://localhost/crud_master', 'LQN', 35, 'Root root', 'Raul', '123', '3106019959', 'Transferencia', 0, 25000, 0, 25000, 25000, 'asdsa'),
('6854816caec5a2.57076631', '2025-06-19 21:30:20', '2025-06-19 21:30:20', '1', 1, '', 'Facturita', 'Venta/Recibo', 'Resporete', 'La Quinua', '54654546', 'enrique segoviano', '3215666', 'se@dsd.co', 'http://localhost/crud_master', 'LQN', 36, 'Root root', 'Raul', '123', '3106019959', 'Transferencia', 0, 25000, 0, 25000, 25000, ''),
('685481a7193263.53986532', '2025-06-19 21:31:19', '2025-06-19 21:31:19', '1', 1, '', 'Facturita', 'Venta/Recibo', 'Resporete', 'La Quinua', '54654546', 'enrique segoviano', '3215666', 'se@dsd.co', 'http://localhost/crud_master', 'LQN', 37, 'Root root', 'Raul', '123', '3106019959', 'Transferencia', 0, 25000, 0, 25000, 25000, ''),
('685497897eadd6.70540858', '2025-06-19 23:04:41', '2025-06-19 23:04:41', '1', 1, '', 'Facturita', 'Venta/Recibo', 'Resporete', 'La Quinua', '54654546', 'enrique segoviano', '3215666', 'se@dsd.co', 'http://localhost/crud_master', 'LQN', 38, 'Root root', 'Raul', '123', '3106019959', 'efectivo', 0, 50468, 0, 50468, 50468, ''),
('685497ef013039.55710188', '2025-06-19 23:06:23', '2025-06-19 23:06:23', '1', 1, '', 'Facturita', 'Venta/Recibo', 'Resporete', 'La Quinua', '54654546', 'enrique segoviano', '3215666', 'se@dsd.co', 'http://localhost/crud_master', 'LQN', 39, 'Root root', 'Raul', '123', '3106019959', 'efectivo', 0, 50702, 0, 50702, 50702, 'hola :3');

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE `modulos` (
  `id` varchar(60) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modulos`
--

INSERT INTO `modulos` (`id`, `nombre`, `descripcion`, `status`) VALUES
('almacenes', 'Almacenes', 'Almacenes del sistema', 1),
('clientes', 'Clientes', '', 1),
('dashboard', 'Dashboard', 'Dashboard del sitio', 1),
('permisos', 'Permisos', '', 1),
('productos', 'Productos', '', 1),
('registros', 'Registros', '', 1),
('roles', 'Roles', '', 1),
('usuarios', 'usuarios', '', 1),
('ventas', 'Ventas', '', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`id`, `rol_id`, `modulo_id`, `r`, `w`, `u`, `d`) VALUES
('684351423667d', '67c93a4fa0a661.10017893', 'permisos', 1, 0, 0, 0),
('6843514237ffe', '67c93a4fa0a661.10017893', 'roles', 1, 0, 0, 0),
('68435142395d5', '67c93a4fa0a661.10017893', 'usuarios', 1, 0, 0, 0),
('68546579a1717', '67c93aa50bc6c0.23522713', 'almacenes', 1, 1, 1, 1),
('68546579a33b5', '67c93aa50bc6c0.23522713', 'clientes', 1, 1, 1, 1),
('68546579a7a66', '67c93aa50bc6c0.23522713', 'dashboard', 1, 1, 1, 1),
('68546579ab363', '67c93aa50bc6c0.23522713', 'permisos', 1, 1, 1, 1),
('68546579aee89', '67c93aa50bc6c0.23522713', 'productos', 1, 1, 1, 1),
('68546579b2ce0', '67c93aa50bc6c0.23522713', 'registros', 1, 1, 1, 1),
('68546579bab9e', '67c93aa50bc6c0.23522713', 'roles', 1, 1, 1, 1),
('68546579c2364', '67c93aa50bc6c0.23522713', 'usuarios', 1, 1, 1, 1),
('68546579c5fc9', '67c93aa50bc6c0.23522713', 'ventas', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modificado` datetime NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `timestamp`, `modificado`, `codigo`, `nombre`, `precio`, `descripcion`, `status`) VALUES
('6850f0d07bda43.09319168', '2025-06-18 05:07:44', '2025-06-16 23:36:32', '123-789-4441', 'productoso', 10000, 'descripcion descripciosa', 0),
('68524bdc27d331.70162514', '2025-06-18 05:17:16', '2025-06-18 00:17:16', '234', 'sdffds', 234, 'dfsdf', 1),
('685461b5caa1b1.54437396', '2025-06-19 19:15:01', '2025-06-19 14:15:01', '10-45-100', 'pataconsitos', 25000, 'los pata cones', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registros`
--

CREATE TABLE `registros` (
  `id` varchar(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('67c4c4b08392b9.83664373', 'Andres', 'Rincon', 0),
('67c511e17327b5.46473334', 'otro registro', 'mas', 0),
('67c54131dc19b7.13443484', 'nuevo registro', 'apartir de nose', 0),
('67c6187ad97e47.78160409', 'Paton', 'Bauza', 0),
('67c618c5674430.36537717', 'sdsdsd', 'sooooosaaaaa', 0),
('67c626bc87b3c7.03867470', 'Sergio ', 'cazuelaz', 0),
('6850a42caa9871.53414582', 'ddddddddddddddddd', 'aaaaaaa', 0),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `status`) VALUES
('67c93a4fa0a661.10017893', 'Vendedor', 'Rol para ventas', 1),
('67c93aa50bc6c0.23522713', 'Admin', 'Administrador del sitio', 1),
('67c9dd73f13eb7.54260594', 'eliminable', 'aldkjasdjkl', 0),
('67c9dda559ded9.51385382', 'asdasdas', 'asdasdasd', 0),
('67c9dda9133534.90117198', 'ddsdssd', 'sdsdsdsd', 0),
('67ca1c4d811b23.74278146', 'Agente de ventas', 'Rol de vendedor', 2),
('68520d698dd0c6.61519857', 'vendedorsitos', 'asdlkj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys_log`
--

CREATE TABLE `sys_log` (
  `log_key` varchar(60) NOT NULL,
  `log_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_modules`
--

CREATE TABLE `sys_modules` (
  `id` varchar(30) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_modules`
--

INSERT INTO `sys_modules` (`id`, `nombre`, `descripcion`, `status`) VALUES
('usuarios', 'Usuarios', 'Users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(30) NOT NULL,
  `rol_id` varchar(30) NOT NULL,
  `documento` varchar(30) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `rol_id`, `documento`, `tipo_documento`, `nombres`, `apellidos`, `email`, `password`, `status`) VALUES
('1', '67c93aa50bc6c0.23522713', '1', 'Cedula', 'Root', 'root', 'root', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 1),
('67c67ac43b8993.94684642', '', '12321', '', 'Sebastian', 'Lopez Gallego', 'sebaslg96@gmail.com', '123', 0),
('67c67da4955794.23412195', '', '86546545', '', 'Raul', 'Alfonsin', 'dfgdfg', '65446', 0),
('67c786794f3109.14043433', '', '987978', '', 'Luna', 'Lopez', '', '', 0),
('67c7868591f433.92496084', '', '65465464', '', 'Pablo', 'Guaimarez', '', '', 0),
('67c7c8ad09c2c6.84596912', '', '78987', '', 'leopoldo', 'gomez', '', '', 0),
('67c7c8b2d663f7.36285255', '', '78987', '', 'leopoldo', 'gomez', '', '', 0),
('67c7c946498204.84334087', '', '7894654', '', 'sdfsdfd', 'sdfsdfds', '', '', 0),
('67c7cb6e4815b5.24446698', '', '789879', '', 'PEPO', 'Perez', '', '', 0),
('67c8da974054b9.42035304', '', '65465465', '', 'coquimbo', 'chileno', 'correito', '1234', 0),
('67c8dabdb08882.60858551', '', '321321', '', '', 'TEST', 'asdasd', 'adadasdsa', 0),
('67c9072eebf618.23329924', '', '999446', '', 'Saturno', 'V', 'cohete@gmail.com', '0247c25fa0e1edb82d6b1acddbea38a7b806a2b2bfc84a53aa015b4dd6e3dbe4', 0),
('67c9158b0a06e5.57481080', '', '4655000', '', 'STS', 'Discovery', 'SRBs@gmail.com', 'a9be84ad9b0bd66d70a2d64b2688018cd1f8e35fa0ff120a1b544d95574eb244', 0),
('67c915e4626bb0.14864600', '', '98797897', '', 'Carlos', 'juanin', 'asdklj', '0b2807248588360200b214ba96a4af653b832cbf599820f575ed23e636ba7018', 0),
('68433c5d7731c1.05132320', '67c93aa50bc6c0.23522713', '1111665498', 'Cedula', 'ses', 'sdsd', 'otrosi@si.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 0),
('68435132d58d69.22940635', '67c93a4fa0a661.10017893', '1193215288', 'Cedula', 'Luna', 'Lopez Gallego', 'luna@lopez.com', '615ed7fb1504b0c724a296d7a69e6c7b2f9ea2c57c1d8206c5afdf392ebdfd25', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_key`);

--
-- Indexes for table `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factura_maestro_id` (`factura_maestro_id`);

--
-- Indexes for table `factura_maestro`
--
ALTER TABLE `factura_maestro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_consecutivo_2` (`numero_consecutivo`),
  ADD KEY `numero_consecutivo` (`numero_consecutivo`);

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`,`modulo_id`),
  ADD KEY `modulo_id` (`modulo_id`);

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
-- Indexes for table `sys_log`
--
ALTER TABLE `sys_log`
  ADD PRIMARY KEY (`log_key`);

--
-- Indexes for table `sys_modules`
--
ALTER TABLE `sys_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `factura_maestro`
--
ALTER TABLE `factura_maestro`
  MODIFY `numero_consecutivo` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD CONSTRAINT `factura_detalle_ibfk_1` FOREIGN KEY (`factura_maestro_id`) REFERENCES `factura_maestro` (`id`);

--
-- Constraints for table `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
