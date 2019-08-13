-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2019 a las 15:34:14
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contrato`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adenda`
--

CREATE TABLE `adenda` (
  `id_adenda` int(11) NOT NULL,
  `tipo` enum('Consultoria','Bienes y Servicios','Supervision','Ejecucion','Otro') NOT NULL,
  `categoria` enum('Ampliacion de Plazo','Ampliacion de Alcance','Otro') NOT NULL,
  `beneficiario` varchar(80) NOT NULL,
  `empresa` varchar(80) NOT NULL,
  `ent_financiera` varchar(80) NOT NULL,
  `no_contrato` varchar(50) NOT NULL,
  `moneda` enum('BS','USD','EUR') NOT NULL,
  `monto` float NOT NULL,
  `objeto` longtext NOT NULL,
  `supervision` longtext NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `respaldo` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id_contrato` int(11) NOT NULL,
  `tipo` enum('Consultoria','Bienes y Servicios','Supervision','Ejecucion','Otro') NOT NULL,
  `adenda` enum('Ampliacion de Plazo','Ampliacion de Alcance','Otro') NOT NULL,
  `beneficiario` varchar(80) NOT NULL,
  `empresa` varchar(80) NOT NULL,
  `ent_financiera` varchar(80) NOT NULL,
  `no_contrato` varchar(50) NOT NULL,
  `moneda` enum('BS','USD','EUR') NOT NULL,
  `monto` float NOT NULL,
  `objeto` longtext NOT NULL,
  `supervision` longtext NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `estado` enum('0','1','2','3','4') NOT NULL,
  `respaldo` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pass` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `nombre`, `pass`) VALUES
(1, 'administrador', 'Admiinistrador', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'daniela.conde', 'Daniela Teresa Conde Mena', '47a39aecfc096e6d80ed5c51733906b263ab9eba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adenda`
--
ALTER TABLE `adenda`
  ADD PRIMARY KEY (`id_adenda`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id_contrato`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adenda`
--
ALTER TABLE `adenda`
  MODIFY `id_adenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
