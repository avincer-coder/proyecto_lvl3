-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2023 a las 11:58:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_materias`
--

CREATE TABLE `alumnos_materias` (
  `alumno` int(100) NOT NULL,
  `materia` int(100) NOT NULL,
  `id` int(100) NOT NULL,
  `calificacion` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `alumnos_materias`
--

INSERT INTO `alumnos_materias` (`alumno`, `materia`, `id`, `calificacion`) VALUES
(21413423, 24, 16, 1),
(2342342, 24, 17, 10),
(123423, 28, 18, 8),
(2342342, 28, 19, 9),
(21413423, 28, 20, 9),
(2342342, 9, 21, 8),
(123423, 9, 22, 9),
(123423, 21, 23, 9),
(21413423, 21, 24, 8),
(32445345, 5, 29, 8),
(32445345, 21, 30, 9);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `alumnos_materias_view`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `alumnos_materias_view` (
`direccion` varchar(100)
,`fecha_nacimiento` date
,`id_alumno` int(100)
,`am_id` int(100)
,`nombre_materia` varchar(100)
,`nombre` varchar(100)
,`correo` varchar(250)
,`id_materia` int(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros_clases`
--

CREATE TABLE `maestros_clases` (
  `DNI` int(100) NOT NULL,
  `materia` int(100) NOT NULL,
  `id_maestroMateria` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `maestros_clases`
--

INSERT INTO `maestros_clases` (`DNI`, `materia`, `id_maestroMateria`) VALUES
(1235415, 9, 5),
(343, 5, 10),
(43523234, 13, 13),
(123423, 24, 36),
(25443, 21, 40);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `maestros_clases_view`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `maestros_clases_view` (
`materia_ID` int(11)
,`apellido` varchar(100)
,`password` varchar(100)
,`DNI` int(100)
,`nombre` varchar(100)
,`correo` varchar(250)
,`direccion` varchar(100)
,`fecha_nacimiento` date
,`materia` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `ID` int(11) NOT NULL,
  `materia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`ID`, `materia`) VALUES
(1, 'Biomedicina'),
(2, 'Ciencias básicas'),
(3, 'Geografia'),
(4, 'Idiomas'),
(5, 'Botanica'),
(6, 'Fisica'),
(7, 'Español'),
(8, 'Mecanica'),
(9, 'Taller 1'),
(10, 'Programacion'),
(11, 'pphp'),
(12, 'Java'),
(13, 'JavaScript'),
(14, 'Python'),
(15, 'C++'),
(16, 'GO'),
(17, 'React'),
(18, 'termodinaimca'),
(19, 'robotica'),
(20, 'Metafisica'),
(21, 'Cuantica'),
(22, 'Clima'),
(23, 'Termodinamica'),
(24, 'Aleman'),
(25, 'Aleman'),
(26, 'Termodinamica'),
(27, 'NanoTecnologia'),
(28, 'Biotecnologia Aplicada'),
(29, 'Inovaciones'),
(30, 'Temp climatica');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `materia_maestros_alumnos_view`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `materia_maestros_alumnos_view` (
`id_maestroMateria` int(100)
,`id_materia` int(11)
,`nombre_materia` varchar(100)
,`nombre_maestro` varchar(100)
,`cantidad_alumnos` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `tabla_alumnos_logmaestro`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `tabla_alumnos_logmaestro` (
`calificacion` int(50)
,`direccion` varchar(100)
,`fecha_nacimiento` date
,`id_alumno` int(100)
,`am_id` int(100)
,`nombre_materia` varchar(100)
,`nombre` varchar(100)
,`correo` varchar(250)
,`id_materia` int(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `DNI` int(100) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `roll` enum('admin','alumno','maestro','') DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `correo`, `nombre`, `password`, `roll`, `apellido`, `direccion`, `fecha_nacimiento`) VALUES
(2, 'admin@admin', 'admin', 'admin', 'admin', NULL, NULL, NULL),
(6, 'juan@maestro', 'DIEGO', 'DIEGO', 'maestro', 'DIEGO', 'DIEGO', '2020-12-12'),
(343, 'Libel@maestro', 'Libel', 'Libel', 'maestro', 'Libel', 'Libel', '2020-12-12'),
(3242, 'Dante@maestro', 'Dante', 'Dante', 'maestro', 'Dante', 'Dante', '2020-12-12'),
(25443, 'maestro@maestro', 'maestro', 'maestro', 'maestro', 'maestro', 'maestro', '2023-12-06'),
(123423, 'Perry@alumno', 'Perry', 'Perry', 'alumno', 'Perry', 'Perry', '2020-12-12'),
(1235415, 'saul@maestro', 'saul', 'saul', 'maestro', 'saul', 'saul', '2023-12-28'),
(2342342, 'juanito@alumno', 'juanito', 'juanito', 'alumno', 'juanito', 'juanito', '2020-12-12'),
(21413423, 'pedro@alumno', 'esperanza', 'pedro', 'alumno', 'esperanza', 'esperanza', '0000-00-00'),
(32445345, 'alumno@alumno', 'alumno', 'alumno', 'alumno', 'alumno', 'alumno', '2020-12-12'),
(43523234, 'Thor@maestro', 'Steve', 'Steve', 'maestro', 'Steve', 'Steve', '2020-12-12'),
(2147483647, 'marco@maestro', 'marco', 'marco', 'maestro', 'marco', 'marco', '2020-12-12');

-- --------------------------------------------------------

--
-- Estructura para la vista `alumnos_materias_view`
--
DROP TABLE IF EXISTS `alumnos_materias_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alumnos_materias_view`  AS SELECT `usuarios`.`direccion` AS `direccion`, `usuarios`.`fecha_nacimiento` AS `fecha_nacimiento`, `usuarios`.`DNI` AS `id_alumno`, `alumnos_materias`.`id` AS `am_id`, `materias`.`materia` AS `nombre_materia`, `usuarios`.`nombre` AS `nombre`, `usuarios`.`correo` AS `correo`, `alumnos_materias`.`materia` AS `id_materia` FROM ((`alumnos_materias` join `materias` on(`alumnos_materias`.`materia` = `materias`.`ID`)) join `usuarios` on(`alumnos_materias`.`alumno` = `usuarios`.`DNI`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `maestros_clases_view`
--
DROP TABLE IF EXISTS `maestros_clases_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `maestros_clases_view`  AS SELECT `materias`.`ID` AS `materia_ID`, `usuarios`.`apellido` AS `apellido`, `usuarios`.`password` AS `password`, `usuarios`.`DNI` AS `DNI`, `usuarios`.`nombre` AS `nombre`, `usuarios`.`correo` AS `correo`, `usuarios`.`direccion` AS `direccion`, `usuarios`.`fecha_nacimiento` AS `fecha_nacimiento`, `materias`.`materia` AS `materia` FROM ((`maestros_clases` join `materias` on(`materias`.`ID` = `maestros_clases`.`materia`)) join `usuarios` on(`usuarios`.`DNI` = `maestros_clases`.`DNI`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `materia_maestros_alumnos_view`
--
DROP TABLE IF EXISTS `materia_maestros_alumnos_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `materia_maestros_alumnos_view`  AS SELECT `mc`.`id_maestroMateria` AS `id_maestroMateria`, `m`.`ID` AS `id_materia`, `m`.`materia` AS `nombre_materia`, `u`.`nombre` AS `nombre_maestro`, count(`ua`.`DNI`) AS `cantidad_alumnos` FROM ((((`materias` `m` join `maestros_clases` `mc` on(`m`.`ID` = `mc`.`materia`)) join `usuarios` `u` on(`mc`.`DNI` = `u`.`DNI`)) left join `alumnos_materias` `am` on(`m`.`ID` = `am`.`materia`)) left join `usuarios` `ua` on(`am`.`alumno` = `ua`.`DNI`)) GROUP BY `m`.`ID`, `u`.`DNI` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `tabla_alumnos_logmaestro`
--
DROP TABLE IF EXISTS `tabla_alumnos_logmaestro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabla_alumnos_logmaestro`  AS SELECT `am`.`calificacion` AS `calificacion`, `u`.`direccion` AS `direccion`, `u`.`fecha_nacimiento` AS `fecha_nacimiento`, `u`.`DNI` AS `id_alumno`, `am`.`id` AS `am_id`, `m`.`materia` AS `nombre_materia`, `u`.`nombre` AS `nombre`, `u`.`correo` AS `correo`, `am`.`materia` AS `id_materia` FROM ((`alumnos_materias` `am` join `materias` `m` on(`am`.`materia` = `m`.`ID`)) join `usuarios` `u` on(`am`.`alumno` = `u`.`DNI`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos_materias`
--
ALTER TABLE `alumnos_materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materia` (`materia`),
  ADD KEY `alumno` (`alumno`);

--
-- Indices de la tabla `maestros_clases`
--
ALTER TABLE `maestros_clases`
  ADD PRIMARY KEY (`id_maestroMateria`),
  ADD KEY `Alazar` (`materia`),
  ADD KEY `dni` (`DNI`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`DNI`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos_materias`
--
ALTER TABLE `alumnos_materias`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `maestros_clases`
--
ALTER TABLE `maestros_clases`
  MODIFY `id_maestroMateria` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_materias`
--
ALTER TABLE `alumnos_materias`
  ADD CONSTRAINT `alumno` FOREIGN KEY (`alumno`) REFERENCES `usuarios` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materia` FOREIGN KEY (`materia`) REFERENCES `materias` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maestros_clases`
--
ALTER TABLE `maestros_clases`
  ADD CONSTRAINT `Alazar` FOREIGN KEY (`materia`) REFERENCES `materias` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dni` FOREIGN KEY (`DNI`) REFERENCES `usuarios` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
