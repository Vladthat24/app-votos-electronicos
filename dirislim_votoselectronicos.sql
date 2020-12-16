-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2020 a las 19:00:11
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
-- Base de datos: `dirislim_votoselectronicos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tap_control`
--

CREATE TABLE `tap_control` (
  `id` int(11) NOT NULL,
  `codigo` text NOT NULL,
  `idempleado` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `ip` text NOT NULL,
  `valor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tap_detalle_lista`
--

CREATE TABLE `tap_detalle_lista` (
  `id` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `idlista` int(11) NOT NULL,
  `cargo` text NOT NULL,
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
  `foto` text NOT NULL,
  `idroles` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha_registro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tap_empleado`
--

INSERT INTO `tap_empleado` (`id`, `datos_completos`, `dni`, `oficina`, `cargo`, `foto`, `idroles`, `usuario`, `password`, `estado`, `ultimo_login`, `fecha_registro`) VALUES
(1, 'YOSSHI SALVADOR CONDORI MENDIETA', '76244566', 'ETF TECNOLOGIAS', 'DESARROLLADOR', 'vistas/img/usuarios/default/anonymous.png', 1, 'ycondori', '$2a$07$asxx54ahjppf45sd87a5auEWCSnPH/Xbie6O7afY7yHh2/xrAP6fO', 1, '2020-12-14 10:32:07', '2020-10-16 12:29:13'),
(2, 'CONDORI MENDIETA', '47685177', 'OFICINA EDIT', 'CARGO EDIT', 'vistas/img/usuarios/condori/546.jpg', 1, 'condori', '$2a$07$asxx54ahjppf45sd87a5au.lf5qdcT9Rz/oWMx30tybcsRAF4F60S', 0, '0000-00-00 00:00:00', '14-12-2020');

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

--
-- Volcado de datos para la tabla `tap_lista`
--

INSERT INTO `tap_lista` (`id`, `nombre`, `descripcion`, `fecha_registro`) VALUES
(1, 'Array', 'Array', 'Array'),
(2, 'Array', 'Array', 'Array'),
(3, 'Array', 'Array', 'Array');

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
-- Indices de la tabla `tap_control`
--
ALTER TABLE `tap_control`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tap_detalle_lista`
--
ALTER TABLE `tap_detalle_lista`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tap_detalle_lista_tap_empleado1_id` (`idempleado`),
  ADD KEY `fk_tap_detalle_lista_tap_lista1_id` (`idlista`);

--
-- Indices de la tabla `tap_empleado`
--
ALTER TABLE `tap_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tap_empleado_tap_roles_id` (`idroles`);

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
-- AUTO_INCREMENT de la tabla `tap_control`
--
ALTER TABLE `tap_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tap_detalle_lista`
--
ALTER TABLE `tap_detalle_lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tap_empleado`
--
ALTER TABLE `tap_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tap_lista`
--
ALTER TABLE `tap_lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tap_roles`
--
ALTER TABLE `tap_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tap_votos`
--
ALTER TABLE `tap_votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tap_detalle_lista`
--
ALTER TABLE `tap_detalle_lista`
  ADD CONSTRAINT `fk_tap_detalle_lista_tap_empleado1` FOREIGN KEY (`idempleado`) REFERENCES `tap_empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tap_detalle_lista_tap_lista1` FOREIGN KEY (`idlista`) REFERENCES `tap_lista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tap_empleado`
--
ALTER TABLE `tap_empleado`
  ADD CONSTRAINT `fk_tap_empleado_tap_roles` FOREIGN KEY (`idroles`) REFERENCES `tap_roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
