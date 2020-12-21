-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2020 a las 23:06:27
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
-- Base de datos: `dirislim_votoonline`
--

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
(1, 'JEFE EDIT', '16-12-2020'),
(2, 'COORDINADOR DE LA ETAPA 1', '18-12-2020'),
(3, 'PRESIDENTE ', '18-12-2020'),
(4, 'VOTO EN BLANCO', '19-12-2020');

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
  `idcargo` int(11) NOT NULL,
  `fecha_registro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tap_detalle_lista`
--

INSERT INTO `tap_detalle_lista` (`id`, `idempleado`, `idlista`, `idcargo`, `fecha_registro`) VALUES
(13, 54, 2, 1, '21-12-2020');

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
  `fecha_registro` text NOT NULL,
  `estado_voto` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tap_empleado`
--

INSERT INTO `tap_empleado` (`id`, `datos_completos`, `dni`, `oficina`, `cargo`, `foto`, `idroles`, `usuario`, `password`, `estado`, `ultimo_login`, `fecha_registro`, `estado_voto`) VALUES
(1, 'YOSSHI SALVADOR CONDORI MENDIETA', '76244566', 'ETF TECNOLOGIAS', 'DESARROLLADOR', 'vistas/img/usuarios/default/anonymous.png', 1, 'ycondori', '$2a$07$asxx54ahjppf45sd87a5auEWCSnPH/Xbie6O7afY7yHh2/xrAP6fO', 1, '2020-12-21 16:39:35', '16/10/2020 12:29', 1),
(2, 'SERAS CERNA CECILIA YSABEL', '08380775', '150141204 - C.S. SAN MARTIN DE PORRAS', '1591-TEC. EN ESTADISTICA I', 'vistas/img/usuarios/default/anonymous.png', 2, '08380775', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(3, 'SERRANO GOMEZ GRACIELA', '09121090', '150135202 - C.S. CIUDAD DE DIOS', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '09121090', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(4, 'SIFUENTES PE?A DORIS HAYDEE', '07815633', '150114001 - DIRIS LIMA SUR', '1591-TEC. EN ESTADISTICA I', 'vistas/img/usuarios/default/anonymous.png', 2, '07815633', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(5, 'SILVA BLAS ANA MABEL', '10209981', '150115201 - C.S. PACHACAMAC', '2501-ASIST. EJECUTIVO I', 'vistas/img/usuarios/default/anonymous.png', 2, '10209981', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(6, 'SILVA SILVA NERY MARLENI', '10591071', '150141203 - C.M.I. SAN JOSE', '2501-ASIST. EJECUTIVO I', 'vistas/img/usuarios/default/anonymous.png', 2, '10591071', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(7, 'SILVA YOVERA EMMA ROSALINA', '10590908', '150141204 - C.S. SAN MARTIN DE PORRAS', '0951-ESP. ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '10590908', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(8, 'SILVA YOVERA RIXE FELICITA', '08941296', '150141007 - ADM. RSS. VILLA EL SALVADOR', '2531-COORDINADOR/A TECNICO/A', 'vistas/img/usuarios/default/anonymous.png', 2, '08941296', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(9, 'SOLIS MEJIAS ANA MARIA', '07696311', '150114001 - DIRIS LIMA SUR', '0901-CONTADOR/A I', 'vistas/img/usuarios/default/anonymous.png', 2, '07696311', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(10, 'SOSA RAMIREZ OLGA YRENE', '08918689', '150114001 - DIRIS LIMA SUR', '2690-TECNICO/A ADMINIST. II', 'vistas/img/usuarios/default/anonymous.png', 2, '08918689', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(11, 'SOTELO MENDOZA GABY MAXIMINA', '09166508', '150141007 - ADM. RSS. VILLA EL SALVADOR', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '09166508', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(12, 'SOTELO YSLA MARISOL MILAGROS', '40988425', '150125201 - C.S. SAN BARTOLO', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '40988425', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(13, 'SOTO MARTINEZ CARLOS ALBERTO', '07849177', '150107000 - ADM.RSS.CHO-BCO-SCO', '2611-TECNICO/A EN LOGISTICA', 'vistas/img/usuarios/default/anonymous.png', 2, '07849177', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(14, 'TABOADA SEGOVIA RAFAEL IGNACIO', '40365824', '150141205 - C.M.I. JUAN PABLO II', '2505-AUXILIAR ADMINISTRATIVO', 'vistas/img/usuarios/default/anonymous.png', 2, '40365824', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(15, 'TAIPE AYLAS MARIA DEL CARMEN', '09732261', '150114001 - DIRIS LIMA SUR', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '09732261', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(16, 'TAPIA FORTON CATALINA', '06083963', '150114001 - DIRIS LIMA SUR', '2691-TECNICO/A ADMINIST. III', 'vistas/img/usuarios/default/anonymous.png', 2, '06083963', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(17, 'TASAYCO PACHECO VICTORIA', '08388077', '150114001 - DIRIS LIMA SUR', '2531-COORDINADOR/A TECNICO/A', 'vistas/img/usuarios/default/anonymous.png', 2, '08388077', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(18, 'TELLO MARTINEZ PAMELA HELEN', '40129636', '150135202 - C.S. CIUDAD DE DIOS', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '40129636', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(19, 'TORREJON MARTINEZ JORGE LUIS', '09504005', '150114001 - DIRIS LIMA SUR', '2526-TECNICO/A EN SERV. GRAL I', 'vistas/img/usuarios/default/anonymous.png', 2, '09504005', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(20, 'TORRES ELGUERA PEDRO ANTONIO', '10814201', '150111101 - C.M.I. LURIN', '2505-AUXILIAR ADMINISTRATIVO', 'vistas/img/usuarios/default/anonymous.png', 2, '10814201', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(21, 'TORRES GAMBOA SEVERO', '08962221', '150135000 - ADM. RSS. VILLA MARIA DEL TRIUNFO', '0951-ESP. ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '08962221', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(22, 'TORRES GASPAR CARLOS MANUEL', '08477357', 'DIRIS', '2690-TECNICO/A ADMINIST. II', 'vistas/img/usuarios/default/anonymous.png', 2, '08477357', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(23, 'TORRES PAUCAR WILDER TEODOCIO', '08365355', '150114001 - DIRIS LIMA SUR', '2506-CHOFER', 'vistas/img/usuarios/default/anonymous.png', 2, '08365355', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(24, 'TTITO CONDEZO JULIO CESAR', '07113066', '150114001 - DIRIS LIMA SUR', '0741-ASIST. ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '07113066', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(25, 'VALVERDE SANTA CRUZ JUAN AGUEDO', '08404434', '150107000 - ADM.RSS.CHO-BCO-SCO', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '08404434', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(26, 'VALVERDE VALVERDE CARLOS PORFIRIO', '08665994', '150114001 - DIRIS LIMA SUR', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '08665994', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(27, 'VARGAS CHAMBILLO PATRICIA JULIA', '21134320', '150114001 - DIRIS LIMA SUR', '0742-ASIST. ADMINIST. II', 'vistas/img/usuarios/default/anonymous.png', 2, '21134320', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(28, 'VASQUEZ CAYCHO IRMA CONSUELO', '15434395', '150114001 - DIRIS LIMA SUR', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '15434395', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(29, 'VASQUEZ NAVARRO CAROLINA ISABEL', '06755560', '150107000 - ADM.RSS.CHO-BCO-SCO', '2611-TECNICO/A EN LOGISTICA', 'vistas/img/usuarios/default/anonymous.png', 2, '06755560', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(30, 'VEGA ALCAZAR LUZ ELENA', '08406910', '150107000 - ADM.RSS.CHO-BCO-SCO', '2691-TECNICO/A ADMINIST. III', 'vistas/img/usuarios/default/anonymous.png', 2, '08406910', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(31, 'VEGA PAGAN MARIA MERCEDES', '04006932', '150114001 - DIRIS LIMA SUR', '0151-DIRECTOR SIST.ADM.I', 'vistas/img/usuarios/default/anonymous.png', 2, '04006932', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(32, 'VEGA VENEGAS CARLOS FELIX', '08401627', '150114001 - DIRIS LIMA SUR', '2607-ABOGADO/A', 'vistas/img/usuarios/default/anonymous.png', 2, '08401627', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(33, 'VELEZ DE VILLA ROJAS YVY VICTORIA', '07507763', '150114001 - DIRIS LIMA SUR', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '07507763', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(34, 'VERAMENDI MAYHUIRE JOSE ANTONIO', '10756139', '150141204 - C.S. SAN MARTIN DE PORRAS', '2690-TECNICO/A ADMINIST. II', 'vistas/img/usuarios/default/anonymous.png', 2, '10756139', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(35, 'VEREAU VILLARREAL SONIA IRIS', '08228061', '150135201 - C.S. SAN JUAN DE MIRAFLORES', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '08228061', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(36, 'VILA GRANADOS MARCOS DOMINGO', '07173755', '150114001 - DIRIS LIMA SUR', '2505-AUXILIAR ADMINISTRATIVO', 'vistas/img/usuarios/default/anonymous.png', 2, '07173755', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(37, 'VILCALURI MATIAS ANA MILAGROS', '41455813', '150125201 - C.S. SAN BARTOLO', '2505-AUXILIAR ADMINISTRATIVO', 'vistas/img/usuarios/default/anonymous.png', 2, '41455813', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(38, 'VILCHEZ GARCIA MARIA JULIA', '07033132', '150114001 - DIRIS LIMA SUR', '2501-ASIST. EJECUTIVO I', 'vistas/img/usuarios/default/anonymous.png', 2, '07033132', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(39, 'VILCHEZ OBANDO ELIZABETH MARGARITA', '03580970', 'DIRIS-PS LAS FLORES ', '0952-ESP. ADMINIST. II', 'vistas/img/usuarios/default/anonymous.png', 2, '03580970', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(40, 'VILLA NOVOA MARIA AMALIA', '08386859', '150141203 - C.M.I. SAN JOSE', '2526-TECNICO/A EN SERV. GRAL I', 'vistas/img/usuarios/default/anonymous.png', 2, '08386859', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(41, 'VILLANUEVA CUYA JOSE LUIS', '09967939', '150114001 - DIRIS LIMA SUR', '1231-CHOFER I', 'vistas/img/usuarios/default/anonymous.png', 2, '09967939', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(42, 'VILLANUEVA HERRERA PEDRO AGUSTIN', '10457143', '150114001 - DIRIS LIMA SUR', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '10457143', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(43, 'VILLANUEVA RAVELLO JOSE ANTONIO', '08695675', '150114001 - DIRIS LIMA SUR', '1201-ARTESANO I', 'vistas/img/usuarios/default/anonymous.png', 2, '08695675', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(44, 'VILLARRUBIA ZAPATA ALEXANDER', '41223411', '150114001 - DIRIS LIMA SUR', '2505-AUXILIAR ADMINISTRATIVO', 'vistas/img/usuarios/default/anonymous.png', 2, '41223411', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(45, 'VILLEGAS SOSA RUTH NOEMY', '80517400', '150141205 - C.M.I. JUAN PABLO II', '2505-AUXILIAR ADMINISTRATIVO', 'vistas/img/usuarios/default/anonymous.png', 2, '80517400', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(46, 'VIVAR VASQUEZ MIGUEL ANGEL', '40513120', '150114001 - DIRIS LIMA SUR', '2505-AUXILIAR ADMINISTRATIVO', 'vistas/img/usuarios/default/anonymous.png', 2, '40513120', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(47, 'ZAPATA PALACIOS GAUDENCIO', '09284556', '150141205 - C.M.I. JUAN PABLO II', '0701-ABOGADO I', 'vistas/img/usuarios/default/anonymous.png', 2, '09284556', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(48, 'ZARATE CANGALAYA BERNARDINA', '09134593', '150135205 - C.S. OLLANTAY', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '09134593', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(49, 'ZAVALETA LIZARRAGA GLORIA VICTORIA', '08278539', '150135205 - C.S. OLLANTAY', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '08278539', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(50, 'ZEA ALATA JENNY ARACELLI', '10647546', '150135000 - ADM. RSS. VILLA MARIA DEL TRIUNFO', '2101-DIGITADOR P.A.D. I', 'vistas/img/usuarios/default/anonymous.png', 2, '10647546', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(51, 'ZEGARRA ANGULO PATRICIA ROSARIO', '09353871', '150107202 - C.E. SAN PEDRO DE LOS CHORRILLOS', '2508-ESP. EN DES. INFORM. I', 'vistas/img/usuarios/default/anonymous.png', 2, '09353871', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(52, 'ZEGARRA CALDERON SORELIA INES', '06712101', '150135000 - ADM. RSS. VILLA MARIA DEL TRIUNFO', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '06712101', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(53, 'ZE?A BALLONA INES', '10595717', '150141106 - C.M.I. CESAR LOPEZ SILVA', '2689-TECNICO/A ADMINIST. I', 'vistas/img/usuarios/default/anonymous.png', 2, '10595717', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0),
(54, 'ZEVALLOS HURTADO JULIA FLORA', '07895094', '150124201 - C.S. PUCUSANA', '2691-TECNICO/A ADMINIST. III', 'vistas/img/usuarios/default/anonymous.png', 2, '07895094', '$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '0000-00-00 00:00:00', '16/10/2020 12:29', 0);

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
(1, 'LISTA EN BLANCO', 'VOTO EN BLANCO', '19-12-2020'),
(2, 'LISTA 1', 'LOS TRIGRES', '21-12-2020');

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
  `valor` int(11) NOT NULL,
  `fecha_registro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tap_votos`
--

INSERT INTO `tap_votos` (`id`, `codigo`, `valor`, `fecha_registro`) VALUES
(8, '4dpSfuWoB3', 1, '2020-12-19 18:40:24'),
(9, '1s4Gvj8Wjc', 1, '2020-12-19 20:21:30'),
(10, 'v90mlds6PC', 1, '2020-12-19 20:35:29'),
(11, 'eVGgTX1EyT', 1, '2020-12-20 17:35:05'),
(19, 'uElrOtQ7kY', 2, '2020-12-21 15:25:06'),
(20, 'rStNDFeuvG', 2, '2020-12-21 15:28:19'),
(21, 'cXhjhDqLxW', 2, '2020-12-21 15:30:24'),
(22, 'm1r5D34DHO', 2, '2020-12-21 15:41:35'),
(23, 'wIX5xFgzID', 2, '2020-12-21 16:21:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tap_cargo`
--
ALTER TABLE `tap_cargo`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `fk_tap_detalle_lista_tap_lista1_id` (`idlista`),
  ADD KEY `tap_dlista_tap_cargo` (`idcargo`);

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
-- AUTO_INCREMENT de la tabla `tap_cargo`
--
ALTER TABLE `tap_cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tap_control`
--
ALTER TABLE `tap_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tap_detalle_lista`
--
ALTER TABLE `tap_detalle_lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tap_empleado`
--
ALTER TABLE `tap_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `tap_lista`
--
ALTER TABLE `tap_lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tap_roles`
--
ALTER TABLE `tap_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tap_votos`
--
ALTER TABLE `tap_votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tap_detalle_lista`
--
ALTER TABLE `tap_detalle_lista`
  ADD CONSTRAINT `fk_tap_detalle_lista_tap_empleado1` FOREIGN KEY (`idempleado`) REFERENCES `tap_empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tap_detalle_lista_tap_lista1` FOREIGN KEY (`idlista`) REFERENCES `tap_lista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tap_dlista_tap_cargo` FOREIGN KEY (`idcargo`) REFERENCES `tap_cargo` (`id`);

--
-- Filtros para la tabla `tap_empleado`
--
ALTER TABLE `tap_empleado`
  ADD CONSTRAINT `fk_tap_empleado_tap_roles` FOREIGN KEY (`idroles`) REFERENCES `tap_roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
