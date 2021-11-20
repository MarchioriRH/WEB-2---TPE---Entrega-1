-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2021 a las 19:35:05
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
(2, 'Camioneta'),
(3, 'Motocicleta'),
(4, 'Deportivo'),
(6, 'Camión'),
(7, 'Avión'),
(9, 'Helicoptero');

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
(4, 6, 14, '2021-10-08', 'Buenisimo, quiero uno rojo', 4),
(5, 5, 50, '2021-10-19', 'Quiero uno', 5),
(7, 11, 14, '2021-10-01', 'Quiero tres!', 3),
(9, 9, 39, '2021-10-19', '¿Le pueden plotear el escudo de River en el capot?', 4),
(10, 12, 31, '2021-10-12', 'Hermoso auto', 5),
(12, 6, 38, '2021-10-01', 'Muy bueno', 4),
(16, 6, 45, '2021-07-08', 'Buenisimo', 5),
(22, 11, 39, '2021-11-16', 'Buenisimo', 3),
(24, 11, 39, '2021-11-07', 'Quiero uno rojo fuego.', 5),
(26, 11, 13, '2021-11-01', 'Maquinon', 5),
(29, 5, 13, '2021-11-06', 'Me encanta esta moto, ¿hay alguna disponible?', 5),
(30, 11, 39, '2021-11-06', 'Buenisimo', 4),
(31, 11, 39, '2021-11-06', 'Me gusto', 2),
(32, 11, 39, '2021-11-06', 'Espectacular', 4),
(33, 11, 39, '2021-11-06', 'Muy bueno', 5),
(34, 11, 39, '2021-11-06', 'Quiero tres,', 5),
(40, 11, 39, '2021-11-05', 'Bueno', 2),
(42, 11, 39, '2021-11-05', 'Bueno', 2),
(63, 11, 49, '2021-11-07', 'Un maquinon', 5),
(73, 11, 38, '2021-11-12', 'perfirijg', 3),
(79, 5, 49, '2021-11-13', 'Esta muy buena', 4),
(80, 16, 49, '2021-11-17', 'Quiero uno, ¿lo mandan para arriba?', 5),
(81, 17, 31, '2021-11-18', '¿Precio?', 2),
(82, 11, 49, '2021-11-18', 'Buenisimo.... alta nave', 5),
(83, 11, 49, '2021-11-18', 'Muy bueno!', 4),
(84, 11, 49, '2021-11-18', 'Quiero saber si tienen en color verde manzana.', 4),
(85, 11, 49, '2021-11-18', 'Hay en color rojo?', 2),
(86, 11, 49, '2021-11-18', 'Quiero uno version full...', 4),
(87, 11, 49, '2021-11-18', 'Una maquina de ensueño...', 5),
(88, 11, 49, '2021-11-18', '¿En amarillo viene?', 4),
(92, 11, 13, '2021-11-18', 'Me encanto', 4),
(93, 11, 49, '2021-11-18', 'No me gusto', 1);

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
(5, 'jorgepontelli@gmail.com', '$2y$10$Unvj4BEtR3/EqQWRFbIt2ut2U3/mEiJJo8U.m4XSCCniObVnRWlQW', 'Jorge', 'Pontelli', 0),
(6, 'agusdx_2001@gmail.com', '$2y$10$JPrSZiM/m4no5qGXTKN/F.Q3eh61KTNG2glH5WuuwKhjovOpLNXO2', 'Agustin', 'Morales', 1),
(9, 'carpforever@river.com', '$2y$10$jbIIbuVh5O8g9tydwCyoJOyykW3EavvJfBJ7lDBS/7VOYPbf0fsG2', 'Antonio', 'Vespuccio', 1),
(11, 'rubenmarchiori@gmail.com', '$2y$10$MiWlSsQ1babrY0ZKqiUGoOiRetrT.wmzwdYSO69gN2Mf9rD8qlIN.', 'Ruben Horacio', 'Marchiori', 1),
(12, 'juanjoalberto@gmail.com', '$2y$10$8LwQy1Hd8rMaG.AO0blNLuqcvfCxs2nTcxuVj8q5CUPnsNObf2xdK', 'Juan Jose', 'Alberto', 0),
(13, 'pedroalfonso@gmail.com', '$2y$10$3LVR0z8tO3Na2.qu7kNfiOFLqsw/33EXeEI4OuJ1AmAJ4miEvWn2K', 'Pedro', 'Alfonso', 0),
(14, 'lotito@gmail.com', '$2y$10$in6IPFvCKE5Ha9/wxOAiY.MJ0YGQGzBAkTiXk5/7Zp8seRoWLlE2K', 'Pedro', 'Lotito', 1),
(15, 'federicoantonio@gmail.com', '$2y$10$QTRc7iB92Yl5cpSV3JGRpujZ15LzCOpkEjofgSELLQDXTQmVS.VHu', 'Jose Antonio', 'Federico', 0),
(16, 'anibal@tango.com.ar', '$2y$10$kOhZjEhfj7WVbX3sG1gBiedIu0Pk6Srcq24zmISVbot3IN4uXJXxi', 'Anibal', 'Troilo', 0),
(17, 'juanjobadia@gmail.com', '$2y$10$9yk/lxIVmKeLhbnQ8vnJj.jjeJeHcpcJ5hesx5ER1irFgviJ3pAL2', 'Juan Alberto', 'Badia', 0);

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
(5, 'Ferrari', '812 Superfast', 2019, 0, 430000, 4),
(6, 'Lamborghini', 'Aventador', 2011, 1245, 330000, 4),
(13, 'Honda', 'CBR 600', 2002, 48000, 2230000, 3),
(14, 'Aprilia', 'RS 660', 2021, 0, 35000, 3),
(31, 'Ferrari', 'F40', 2011, 123, 154666066, 4),
(38, 'Ford', 'Mustang', 1976, 45678, 3456721, 4),
(39, 'Chevrolet', 'Camaro Z3', 2018, 25000, 5000000, 4),
(45, 'Mercedes Benz', 'L1620', 2019, 125000, 8000000, 6),
(46, 'Cessna', '400 Corvalis TTx', 2017, 8900, 32000000, 7),
(49, 'Ford', 'F-150 Raptor', 2021, 0, 1500000, 2),
(50, 'Bell', '407', 1998, 15000, 3500000, 9),
(51, 'Cicare', 'Charly 7', 2021, 12, 1500000, 9);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
