-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 18:05:37
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

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
(1, 'Sedan 4 puertas'),
(2, 'Camioneta'),
(3, 'Motocicleta'),
(4, 'Deportivo'),
(6, 'Camion'),
(7, 'Avion'),
(11, 'Helicoptero'),
(12, 'Sedan Hatchback'),
(13, 'Ciclomotor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `comment` varchar(500) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id_comment`, `id_usuario`, `id_vehiculo`, `fecha`, `comment`, `score`) VALUES
(1, 6, 15, '2021-10-04', 'Buenisima, quiero una', 4),
(2, 6, 14, '2021-10-14', '¿En rojo hay?', 3),
(6, 1, 41, '2021-10-19', 'Quiero una en verde militar.', 4),
(7, 4, 5, '2021-10-04', 'Dame 2.', 4),
(8, 1, 6, '2021-10-01', 'Quiero un Countach, ¿se puede conseguir?', 3),
(9, 1, 3, '2021-07-19', 'Quiero una en verde militar.', 5),
(10, 1, 6, '2021-07-19', 'Quiero una en verde militar.', 5),
(12, 1, 3, '2021-11-05', 'hjmhjmjh', 3),
(13, 1, 10, '2021-11-05', 'nuighiuhiuhi', 4),
(14, 1, 10, '2021-11-05', 'miohuhiug', 4),
(15, 1, 15, '2021-11-05', 'minbuibiu', 4),
(16, 1, 3, '2021-11-05', 'mioubuyguyf', 4),
(17, 1, 3, '2021-11-05', 'esreser', 3),
(18, 1, 44, '2021-11-05', 'iojfsdouhfdov', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `pathh` varchar(300) NOT NULL,
  `fk_id_vehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `pathh`, `fk_id_vehiculo`) VALUES
(3, 'img/vehiculos/619cf8ba52e14.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `passwrd` varchar(150) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `mail`, `passwrd`, `nombre`, `apellido`, `rol`) VALUES
(1, 'rubenmarchiori@gmail.com', '$2y$10$a0xFDYzTl2LSQe43Ci2YZuzNBDKKcyQSvree7k53ogiD9zCgBI7Ri', 'Ruben Horacio', 'Marchiori', 1),
(4, 'rubengorosito@gmail.com', '$2y$10$vab.p/xkN1S..U9FcVIfOOJ91JlIfViiB78WNCQP5DLYg9ONUAq0y', 'Ruben', 'Gorosito', 0),
(5, 'jorgepontelli@gmail.com', '$2y$10$Unvj4BEtR3/EqQWRFbIt2ut2U3/mEiJJo8U.m4XSCCniObVnRWlQW', 'Jorge', 'Pontelli', 0),
(6, 'agusdx_2001@gmail.com', '$2y$10$JPrSZiM/m4no5qGXTKN/F.Q3eh61KTNG2glH5WuuwKhjovOpLNXO2', 'Agustin', 'Morales', 1),
(7, 'fedecasas@gmail.com', '$2y$10$HGiUZSA4Dk/az1KxN5AHeOJUStd.ux2V3/OnTrUJeADtg1neXETj2', 'Federico', 'Casas', 0),
(8, 'fedebal@hotmail.com', '$2y$10$go9nPz93qMjW2jxI.2rnNu/aJjyRejysx75nw/gABiZYJe9IO965S', 'Federico', 'Bal', 0),
(9, 'carpforever@river.com', '$2y$10$jbIIbuVh5O8g9tydwCyoJOyykW3EavvJfBJ7lDBS/7VOYPbf0fsG2', 'Antonio', 'Vespuccio', 0),
(13, 'rubenmorales@gmail.com', '$2y$10$1HcCAmlPVr8OahBQAS0L..CN.N2.Ap8KShwIcPhTrgl/I3XRYcYiy', 'Ruben Horacio', 'Morales', 0),
(16, 'pedrito@gmail.com', '$2y$10$RCoZkoHYLhpx5JliFn/4euHZG4QIeT8T9yYl/3lnDeqOj2RPaFZ7m', 'Pedro', 'Morales', 0);

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
(5, 'Ferrari', '812 Superfast', 2019, 45, 430000, 4),
(6, 'Lamborghini', 'Aventador', 2011, 1245, 330000, 4),
(10, 'Volkswagen', 'Amarok 4x4 Comfortline V6 Aut 258Cv Heavy Duty', 2021, 2021, 8000000, 2),
(13, 'Honda', 'CBR 600', 2002, 48000, 2230000, 3),
(14, 'Aprilia', 'RS 660', 2021, 0, 35000, 3),
(15, 'Aprilia', 'RSV4', 2021, 1000, 62000, 3),
(16, 'Harley Davidson', 'Dina Street Bob 1600', 2019, 18000, 28000, 3),
(31, 'Ferrari', 'F40', 2011, 123, 154666066, 4),
(39, 'Chevrolet', 'Camaro Z3', 2018, 25000, 5000000, 4),
(41, 'Ford', 'F150 Raptor', 2021, 15200, 12000000, 2),
(42, 'Porsche', '911', 2019, 22365, 53336333, 4),
(43, 'Toyota', 'Gazoo Racing', 2020, 21000, 8000000, 2),
(44, 'Mercedes Benz', 'Clase C', 2021, 15000, 9000000, 1),
(46, 'Cessna', '400 Corvalis TTx', 2017, 8900, 32000000, 7),
(47, 'VOLVO', 'FH16', 2021, 59000, 12000000, 6),
(51, 'Mercedes Benz', 'AMG', 2021, 21000, 1000000, 1),
(57, 'SCANIA', '620S Highline', 2021, 1, 14000000, 6),
(59, 'BELL', 'CH3', 1989, 123000, 345678899, 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_usuario` (`id_usuario`,`id_vehiculo`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `fk_id_vehiculo` (`fk_id_vehiculo`);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`fk_id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
