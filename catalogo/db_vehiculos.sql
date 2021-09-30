-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2021 a las 22:53:01
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
-- Base de datos: `db_vehiculos`
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `passwrd` varchar(150) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `mail`, `passwrd`, `nombre`, `apellido`) VALUES
(1, 'rubenmarchiori@gmail.com', '$2y$10$a0xFDYzTl2LSQe43Ci2YZuzNBDKKcyQSvree7k53ogiD9zCgBI7Ri', 'Ruben Horacio', 'Marchiori'),
(3, 'rubenmarchiori@gmail.com', '$2y$10$wR6pDQ2rRj76usmj8qa1/OZfvRz5UJWp9JqqGDXmKjbyLB6Cy9jw2', 'Ruben', 'Marchiori'),
(4, 'rubengorosito@gmail.com', '$2y$10$vab.p/xkN1S..U9FcVIfOOJ91JlIfViiB78WNCQP5DLYg9ONUAq0y', 'Ruben', 'Gorosito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `anio` int(11) NOT NULL,
  `kilometros` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `marca`, `modelo`, `anio`, `kilometros`, `precio`, `id_categoria`) VALUES
(3, 'BMW', 'X5 M Sport', 2020, 112000, 3000000, 1),
(5, 'Ferrari', '812 Superfast', 2021, 0, 430000, 4),
(6, 'Lamborghini', 'Aventador', 2011, 31500, 330000, 4),
(7, 'Porsche', '911 Turbo S', 2020, 50000, 238000, 4),
(9, 'Dodge', 'RAM 1500 TRX', 2019, 48000, 5230000, 2),
(10, 'Volkswagen', 'Amarok 4x4 Comfortline V6 Aut 258Cv Heavy Duty', 2021, 2021, 8000000, 2),
(13, 'Honda', 'CBR 600', 2002, 48000, 2230000, 3),
(14, 'Aprilia', 'RS 660', 2021, 0, 35000, 3),
(15, 'Aprilia', 'RSV4', 2021, 0, 62000, 3),
(16, 'Harley Davidson', 'Dina Street Bob 1600', 2019, 18000, 28000, 3),
(31, 'Ferrari', 'F40', 2011, 123, 54666066, 4),
(38, 'Ford', 'Mustang', 1976, 45678, 3456721, 4),
(39, 'Chevrolet', 'Camaro Z3', 2018, 25000, 5000000, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `FK_id_categoria` (`id_categoria`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
