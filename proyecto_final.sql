-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 19:07:19
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `DNI` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`DNI`, `nombre`, `correo`, `direccion`, `fecha`, `apellido`) VALUES
(1, 'a', 'a@a', 'a', '2023-11-08', 'a'),
(2, 'b', 'b@b', 'b', '2023-02-02', 'b');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `alumnos_materia_view`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `alumnos_materia_view` (
`id_alumno` int(100)
,`am_id` int(11)
,`nombre_materia` varchar(100)
,`nombre` varchar(100)
,`correo` varchar(100)
,`id_materia` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_materias`
--

CREATE TABLE `alumno_materias` (
  `alumno` int(11) NOT NULL,
  `materia` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno_materias`
--

INSERT INTO `alumno_materias` (`alumno`, `materia`, `id`) VALUES
(2, 1, 27),
(1, 4, 40),
(1, 2, 41),
(1, 1, 42),
(1, 3, 43),
(2, 2, 45),
(2, 3, 47),
(2, 4, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_guarani`
--

CREATE TABLE `clase_guarani` (
  `nombre_alumno` int(100) NOT NULL,
  `calificacion` varchar(100) DEFAULT NULL,
  `mensaje` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clase_guarani`
--

INSERT INTO `clase_guarani` (`nombre_alumno`, `calificacion`, `mensaje`) VALUES
(1, '5', 'holaaaa');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `clase_guarani_view`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `clase_guarani_view` (
`nombre_alumno` int(100)
,`calificacion` varchar(100)
,`mensaje` varchar(100)
,`DNI` int(100)
,`nombre` varchar(100)
,`correo` varchar(100)
,`direccion` varchar(200)
,`fecha` date
,`apellido` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `clase` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`nombre`, `email`, `direccion`, `fecha`, `clase`) VALUES
('alvin', 'arr@arr', 'a', '2023-12-12', 'primera'),
('Fernando', 'fernando.com', 'españa', '2023-04-04', 'historia'),
('MMM', 'J@J', 'YYYY', '2023-11-08', 'J'),
('Lopez', 'Jaimito', '2023-11-01', '0000-00-00', NULL),
('Jaimy', 'Jaimy.com', 'portugal', '2023-10-10', 'artes'),
('a', 'jefe@jefe', 'a', '2023-12-12', 'primera'),
('Jeremy', 'jeremy.com', 'panama', '2023-03-03', 'literatura'),
('Lucas', 'lucas.com', 'uruguay', '2023-02-02', 'fisica'),
('Myriam', 'myriam.com', 'estados unidos', '2028-08-08', 'ingles'),
('Nacimento', 'nacimento.com', 'brasil', '2023-01-01', 'deporte'),
('Neo', 'neo.com', 'alemania', '2023-09-09', 'quimica'),
('Paula', 'paula.com', 'argentina', '2023-04-04', 'musica'),
('Roxan', 'roxan.com', 'suecia', '2023-07-07', 'matematicas'),
('Sandra', 'sandra.com', 'colombia', '2023-05-05', 'danza'),
('Stefany', 'stefany.com', 'mexico', '2023-06-06', 'español'),
('a', 'yyy@yyy', 'a', '2023-12-12', 'primera'),
('a', 'zzz@zzz', 'a', '2023-12-12', 'primera');

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
(4, 'Idiomas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `correo` varchar(250) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `roll` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo`, `nombre`, `password`, `roll`, `apellido`, `direccion`, `fecha_nacimiento`) VALUES
('a@a', 'a', 'a', 'alumno', 'a', 'a', '2023-01-01'),
('admin@admin', 'admin', 'a', 'admin', NULL, NULL, NULL),
('alumno@alumno', 'alumno', 'mmm', 'alumno', NULL, NULL, NULL),
('b@b', 'b', 'b', 'alumno', 'b', 'b', '2023-02-02'),
('maestro@maestro', 'El master', 'a', 'maestro', 'a', 'a', '2023-02-02');

-- --------------------------------------------------------

--
-- Estructura para la vista `alumnos_materia_view`
--
DROP TABLE IF EXISTS `alumnos_materia_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alumnos_materia_view`  AS SELECT `alumnos`.`DNI` AS `id_alumno`, `alumno_materias`.`id` AS `am_id`, `materias`.`materia` AS `nombre_materia`, `alumnos`.`nombre` AS `nombre`, `alumnos`.`correo` AS `correo`, `alumno_materias`.`materia` AS `id_materia` FROM ((`alumno_materias` join `materias` on(`alumno_materias`.`materia` = `materias`.`ID`)) join `alumnos` on(`alumno_materias`.`alumno` = `alumnos`.`DNI`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `clase_guarani_view`
--
DROP TABLE IF EXISTS `clase_guarani_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clase_guarani_view`  AS SELECT `cg`.`nombre_alumno` AS `nombre_alumno`, `cg`.`calificacion` AS `calificacion`, `cg`.`mensaje` AS `mensaje`, `a`.`DNI` AS `DNI`, `a`.`nombre` AS `nombre`, `a`.`correo` AS `correo`, `a`.`direccion` AS `direccion`, `a`.`fecha` AS `fecha`, `a`.`apellido` AS `apellido` FROM (`clase_guarani` `cg` join `alumnos` `a` on(`cg`.`nombre_alumno` = `a`.`DNI`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `alumno_materias`
--
ALTER TABLE `alumno_materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumnos_materia_alumno` (`alumno`),
  ADD KEY `alumnos_materia_materia` (`materia`);

--
-- Indices de la tabla `clase_guarani`
--
ALTER TABLE `clase_guarani`
  ADD PRIMARY KEY (`nombre_alumno`),
  ADD UNIQUE KEY `nombre_alumno` (`nombre_alumno`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno_materias`
--
ALTER TABLE `alumno_materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_materias`
--
ALTER TABLE `alumno_materias`
  ADD CONSTRAINT `alumnos_materia_alumno` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_materia_materia` FOREIGN KEY (`materia`) REFERENCES `materias` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase_guarani`
--
ALTER TABLE `clase_guarani`
  ADD CONSTRAINT `aaaa` FOREIGN KEY (`nombre_alumno`) REFERENCES `alumnos` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
