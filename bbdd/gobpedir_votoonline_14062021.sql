-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2021 a las 02:13:51
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gobpedir_votoonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tap_acceso`
--

CREATE TABLE `tap_acceso` (
  `idacceso` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `idroles` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `estadopassword` int(11) NOT NULL,
  `ultimo_login` text NOT NULL,
  `fecha_registro` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tap_acceso`
--

INSERT INTO `tap_acceso` (`idacceso`, `idempleado`, `idroles`, `usuario`, `password`, `estadopassword`, `ultimo_login`, `fecha_registro`, `estado`) VALUES
(1, 1, 1, '76244566', '$2a$07$asxx54ahjppf45sd87a5auCqEMOm1sCRLMMpW8tVIxyp1GD./Wzku', 1, '2021-06-14 18:25:36', '16/10/2020 12:29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tap_cargo`
--

CREATE TABLE `tap_cargo` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `fecha_registro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tap_cargo`
--

INSERT INTO `tap_cargo` (`id`, `nombre`, `fecha_registro`) VALUES
(4, 'VOTO EN BLANCO', '19-12-2020'),
(5, 'TESORERO', '24-12-2020'),
(6, 'TESORERA', '27-12-2020'),
(7, 'VOCAL 1', '27-12-2020'),
(8, 'VOCAL 2', '27-12-2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tap_detalle_lista`
--

CREATE TABLE `tap_detalle_lista` (
  `id` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `idlista` int(11) NOT NULL,
  `idcargo` int(11) NOT NULL,
  `fecha_registro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tap_empleado`
--

CREATE TABLE `tap_empleado` (
  `id` int(11) NOT NULL,
  `datos_completos` text NOT NULL,
  `dni` text NOT NULL,
  `oficina` text NOT NULL,
  `cargo` text NOT NULL,
  `foto` text DEFAULT NULL,
  `fecha_registro` text NOT NULL,
  `estado_voto` int(11) NOT NULL,
  `codigovoto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tap_empleado`
--

INSERT INTO `tap_empleado` (`id`, `datos_completos`, `dni`, `oficina`, `cargo`, `foto`, `fecha_registro`, `estado_voto`, `codigovoto`) VALUES
(1, 'YOSSHI SALVADOR CONDORI MENDIETA', '76244566', 'ETF TECNOLOGIAS', 'DESARROLLADOR PAPI CHULO', '', '16/10/2020 12:29', 0, 'asdasd'),
(3484, 'SALVADOR CONDORI MENDIETA', '47685177', 'ETF PRUEBA', 'PRUEBA', '', '14-06-2021', 0, '12asdasd'),
(3485, 'SALVADOR CONDORI MENDIETA', '76248555', 'ETF PRUEBA', 'COORDINADOR', '', '14-06-2021', 0, 'asdasd'),
(3486, 'PRUEBA PRRUEBA PRUEBA', '46691585', 'TECNOLOGIA', 'COORDINADOR', '', '14-06-2021', 0, 'asdasd'),
(3487, 'SALVADOR MENDIETA CONDORI', '99999999', 'TECNOLOGIA', 'REDES', '', '14-06-2021', 0, 'asdasd'),
(3488, 'SALVADOR CONDORI MENDIETA', '76244555', 'ETF PRUEBA', 'COORDINADOR', '', '14-06-2021', 0, '12312312'),
(3489, 'CONDORI', '99959595', 'ETF MANTENIMIENTO', 'PRUEBA', '', '14-06-2021', 0, 'asdasd'),
(3490, 'SALVADOR CONDORI MENDIETA', '76244568', 'ETF PRUEBA', 'JEFE DE OFICINA', '', '14-06-2021', 0, NULL),
(3491, 'SALVADOR CONDORI MENDIETA', '76244568', 'ETF PRUEBA', 'JEFE DE OFICINA', '', '14-06-2021', 0, NULL),
(3492, 'SALVADOR CONDORI MENDIETA', '93654564', 'ETF MANTENIMIENTO', 'PRUEBA', 'vistas/img/usuarios/93654564/214.jpg', '14-06-2021', 0, NULL),
(3493, 'SALVADOR CONDORI MENDIETA', '85269989', 'ETF PRUEBA', 'PRUEBA', 'vistas/img/usuarios/85269989/466.jpg', '14-06-2021', 0, NULL),
(3494, 'MENDIETA ', '87987654', 'ETF PRUEBA', 'PRUEBA', 'vistas/img/usuarios/87987654/645.png', '14-06-2021', 0, NULL),
(3495, 'SALVADOR CONDORI MENDIETA', '85656555', 'ETF PRUEBA', 'PRUEBA', 'vistas/img/usuarios/85656555/258.png', '14-06-2021', 0, NULL),
(3496, 'SALVADOR CONDORI MENDIETA', '12315648', 'ETF PRUEBA', 'COORDINADOR', 'vistas/img/usuarios/12315648/402.jpg', '14-06-2021', 0, NULL),
(3497, 'SALVADOR CONDORI MENDIETA', '95956556', 'ETF PRUEBA', 'COORDINADOR', 'vistas/img/usuarios/95956556/429.jpg', '14-06-2021', 0, NULL),
(3498, 'SALVADOR CONDORI MENDIETA', '15975366', 'ETF PRUEBA', 'PRUEBA', 'vistas/img/usuarios/15975366/872.jpg', '14-06-2021', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tap_lista`
--

CREATE TABLE `tap_lista` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_registro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tap_roles`
--

CREATE TABLE `tap_roles` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tap_roles`
--

INSERT INTO `tap_roles` (`id`, `nombre`, `fecha_registro`) VALUES
(1, 'ADMINISTRADOR', '2020-12-11 10:40:52'),
(2, 'ELECTORES', '2020-12-11 10:09:10'),
(3, 'INFORMATICO', '2020-12-11 10:09:10'),
(4, 'COMITE ELECTORAL', '2020-12-11 10:09:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tap_votos`
--

CREATE TABLE `tap_votos` (
  `id` int(11) NOT NULL,
  `codigo` text NOT NULL,
  `valor` text NOT NULL,
  `fecha_registro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tap_acceso`
--
ALTER TABLE `tap_acceso`
  ADD PRIMARY KEY (`idacceso`),
  ADD KEY `tap_acceso_empleado_FK` (`idempleado`),
  ADD KEY `tap_acceso_roles_FK` (`idroles`);

--
-- Indices de la tabla `tap_cargo`
--
ALTER TABLE `tap_cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tap_detalle_lista`
--
ALTER TABLE `tap_detalle_lista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tap_detalle_lista_tap_lista1_id` (`idlista`),
  ADD KEY `tap_dlista_tap_cargo` (`idcargo`);

--
-- Indices de la tabla `tap_empleado`
--
ALTER TABLE `tap_empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tap_lista`
--
ALTER TABLE `tap_lista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tap_roles`
--
ALTER TABLE `tap_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tap_votos`
--
ALTER TABLE `tap_votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tap_acceso`
--
ALTER TABLE `tap_acceso`
  MODIFY `idacceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tap_cargo`
--
ALTER TABLE `tap_cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tap_detalle_lista`
--
ALTER TABLE `tap_detalle_lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tap_empleado`
--
ALTER TABLE `tap_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3499;

--
-- AUTO_INCREMENT de la tabla `tap_lista`
--
ALTER TABLE `tap_lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tap_roles`
--
ALTER TABLE `tap_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tap_votos`
--
ALTER TABLE `tap_votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2457;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tap_acceso`
--
ALTER TABLE `tap_acceso`
  ADD CONSTRAINT `tap_acceso_empleado_FK` FOREIGN KEY (`idempleado`) REFERENCES `tap_empleado` (`id`),
  ADD CONSTRAINT `tap_acceso_roles_FK` FOREIGN KEY (`idroles`) REFERENCES `tap_roles` (`id`);

--
-- Filtros para la tabla `tap_detalle_lista`
--
ALTER TABLE `tap_detalle_lista`
  ADD CONSTRAINT `fk_tap_detalle_lista_tap_empleado1` FOREIGN KEY (`id`) REFERENCES `tap_empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tap_detalle_lista_tap_lista1` FOREIGN KEY (`idlista`) REFERENCES `tap_lista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tap_dlista_tap_cargo` FOREIGN KEY (`idcargo`) REFERENCES `tap_cargo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
