-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2021 a las 00:17:59
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
-- Base de datos: `vehiculos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `tipo`) VALUES
(1, 'Sedan'),
(2, 'Camioneta'),
(3, 'Motocicleta'),
(4, 'Deportivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `año` int(11) NOT NULL,
  `kilometros` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `marca`, `modelo`, `año`, `kilometros`, `precio`, `id_categoria`) VALUES
(1, 'Mercedes Benz', 'Clase C', 2019, 10000, 55300, 1),
(2, 'Mercedes Benz', 'Clase E', 2015, 44000, 42000, 1),
(3, 'BMW', 'X5 M Sport', 2013, 112000, 23400, 1),
(4, 'Porsche', 'Cayenne Turbo', 2017, 46000, 67000, 1),
(5, 'Ferrari', '812 Superfast', 2021, 0, 430000, 4),
(6, 'Lamborghini', 'Aventador', 2011, 31500, 330000, 4),
(7, 'Porsche', '911 Turbo S', 2020, 22000, 238000, 4),
(8, 'Chevrolet', 'Camaro ZL1', 2018, 15000, 48000, 4),
(9, 'Dodge', 'RAM 1500 TRX', 2019, 48000, 5230000, 2),
(10, 'Volkswagen', 'Amarok 4x4 Comfortline V6 Aut 258Cv', 2021, 0, 4550000, 2),
(11, 'Ford', 'F-150 Raptor', 2021, 0, 6680000, 2),
(12, 'Toyota', 'Hilux Gazoo Racing', 2019, 45000, 4897333, 2),
(13, 'Honda', 'CBR 600', 2002, 48000, 2230000, 3),
(14, 'Aprilia', 'RS 660', 2021, 0, 35000, 3),
(15, 'Aprilia', 'RSV4', 2021, 0, 62000, 3),
(16, 'Harley Davidson', 'Dina Street Bob 1600', 2019, 18000, 28000, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
