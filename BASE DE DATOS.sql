-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2021 a las 13:42:26
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sys_gestiones`
--
CREATE DATABASE IF NOT EXISTS `sys_gestiones` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sys_gestiones`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE `gestion` (
  `codigoGestion` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `visitaTecnica` varchar(5) NOT NULL DEFAULT 'no',
  `fechaCreacion` date NOT NULL,
  `codigoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestioncliente`
--

CREATE TABLE `gestioncliente` (
  `codigoGestionCliente` int(11) NOT NULL,
  `atendido` varchar(5) NOT NULL DEFAULT 'no',
  `fechaCreacion` datetime NOT NULL,
  `codigoGestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `codigoTicket` int(11) NOT NULL,
  `codigoGestionCliente` int(11) NOT NULL,
  `nombreCliente` varchar(50) NOT NULL,
  `apellidoCliente` varchar(50) NOT NULL,
  `direccionCliente` varchar(300) NOT NULL,
  `telefonoCliente` varchar(20) NOT NULL,
  `codigoGestion` int(11) NOT NULL,
  `problemaExpuesto` varchar(500) NOT NULL,
  `solucionBrindada` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codigoUsuario` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigoUsuario`, `login`, `password`, `nombre`, `apellido`) VALUES
(1, 'usuario1@prueba.com', '0AKuLMbjUASD8IpSDDtmFA==', 'Ismael Enrique', 'Gutierrez Berrios'),
(2, 'usuario2@prueba.com', 'I1elR4VneUzeUJ45tpWxRg==', 'Jose Mario', 'Lopez Mora');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`codigoGestion`),
  ADD KEY `fk_gestion_and_usuario` (`codigoUsuario`);

--
-- Indices de la tabla `gestioncliente`
--
ALTER TABLE `gestioncliente`
  ADD PRIMARY KEY (`codigoGestionCliente`),
  ADD KEY `fk_gestioncliente_and_gestion` (`codigoGestion`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`codigoTicket`),
  ADD KEY `fk_ticket_and_gestionCliente` (`codigoGestionCliente`),
  ADD KEY `fk_ticket_and_gestion` (`codigoGestion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigoUsuario`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gestion`
--
ALTER TABLE `gestion`
  MODIFY `codigoGestion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gestioncliente`
--
ALTER TABLE `gestioncliente`
  MODIFY `codigoGestionCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `codigoTicket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD CONSTRAINT `fk_gestion_and_usuario` FOREIGN KEY (`codigoUsuario`) REFERENCES `usuario` (`codigoUsuario`);

--
-- Filtros para la tabla `gestioncliente`
--
ALTER TABLE `gestioncliente`
  ADD CONSTRAINT `fk_gestioncliente_and_gestion` FOREIGN KEY (`codigoGestion`) REFERENCES `gestion` (`codigoGestion`);

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_and_gestion` FOREIGN KEY (`codigoGestion`) REFERENCES `gestion` (`codigoGestion`),
  ADD CONSTRAINT `fk_ticket_and_gestionCliente` FOREIGN KEY (`codigoGestionCliente`) REFERENCES `gestioncliente` (`codigoGestionCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
