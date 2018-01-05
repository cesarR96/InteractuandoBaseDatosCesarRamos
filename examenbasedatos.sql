-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2018 a las 10:23:59
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examenbasedatos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `IDESTADO` int(11) NOT NULL,
  `ESTADO` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`IDESTADO`, `ESTADO`) VALUES
(9, 'activo'),
(10, 'inactivo'),
(11, 'bloqueado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `IDEVENTO` int(11) NOT NULL,
  `TITULO` varchar(550) COLLATE utf8_spanish2_ci NOT NULL,
  `FECHAINICIO` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `FECHAFIN` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `HORAINICIO` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `HORAFIN` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `DIACOMPLETO` tinyint(1) NOT NULL,
  `IDUSUARIO` int(11) NOT NULL,
  `IDESTADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`IDEVENTO`, `TITULO`, `FECHAINICIO`, `FECHAFIN`, `HORAINICIO`, `HORAFIN`, `DIACOMPLETO`, `IDUSUARIO`, `IDESTADO`) VALUES
(26, 'CENA', '2018-01-01', '2018-01-02', '07:00', '07:00', 0, 5, 9),
(28, 'CENA', '2018-01-01', '2018-01-02', '07:00', '07:00', 0, 5, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUSUARIO` int(11) NOT NULL,
  `NOMBREUSUARIO` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `CONTRASENA` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `IDESTADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUSUARIO`, `NOMBREUSUARIO`, `CONTRASENA`, `IDESTADO`) VALUES
(5, 'cesar', '123', 9),
(6, 'karla', '123', 9),
(7, 'daniela', '123', 9),
(8, 'monica', '123', 9),
(9, 'carmen', '123', 9),
(10, 'carmen', '123', 9),
(11, 'karla', '123', 9),
(12, 'estefany', '123', 9),
(13, 'sofia', '123', 9),
(14, 'sofia', '123', 9),
(15, 'estefany', '123', 9),
(16, 'ana', '123', 9),
(17, 'sofia', '123', 9),
(18, 'estefany', '123', 9),
(19, 'ana', '123', 9),
(20, 'sofia', '123', 9),
(21, 'estefany', '123', 9),
(22, 'ana', '123', 9),
(23, 'sofia', '123', 9),
(24, 'estefany', '123', 9),
(25, 'ana', '123', 9),
(26, 'sofia', '123', 9),
(27, 'estefany', '123', 9),
(28, 'ana', '123', 9),
(29, 'sofia', '123', 9),
(30, 'estefany', '202cb962ac59075b964b07152d234b70', 9),
(31, 'ana', '202cb962ac59075b964b07152d234b70', 9),
(32, 'sofia', '202cb962ac59075b964b07152d234b70', 9),
(33, 'estefany', 'dnV/', 9),
(34, 'ana', '202cb962ac59075b964b07152d234b70', 9),
(35, 'sofia', '202cb962ac59075b964b07152d234b70', 9),
(36, 'estefany', 'dnV/', 9),
(37, 'ana', '202cb962ac59075b964b07152d234b70', 9),
(38, 'sofia', '202cb962ac59075b964b07152d234b70', 9),
(39, 'estefany', 'dnV/', 9),
(40, 'ana', '202cb962ac59075b964b07152d234b70', 9),
(41, 'sofia', '202cb962ac59075b964b07152d234b70', 9),
(42, 'estefany', 'dnV/', 9),
(43, 'ana', 'dnV/', 9),
(44, 'sofia', 'dnV/', 9),
(45, 'estefany', 'dnV/', 9),
(46, 'ana', 'dnV/', 9),
(47, 'sofia', 'dnV/', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`IDESTADO`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`IDEVENTO`),
  ADD KEY `IDUSUARIO` (`IDUSUARIO`),
  ADD KEY `IDESTADO` (`IDESTADO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUSUARIO`),
  ADD KEY `IDESTADO` (`IDESTADO`),
  ADD KEY `IDESTADO_2` (`IDESTADO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `IDESTADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `IDEVENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`IDESTADO`) REFERENCES `estado` (`IDESTADO`) ON DELETE CASCADE,
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuarios` (`IDUSUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IDESTADO`) REFERENCES `estado` (`IDESTADO`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
