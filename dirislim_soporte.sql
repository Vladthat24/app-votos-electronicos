-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-05-2020 a las 22:57:38
-- Versión del servidor: 10.1.44-MariaDB-cll-lve
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dirislim_soporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Soporte Informatico', '2019-08-16 17:48:28'),
(3, 'Coordinación Tecnología', '2019-08-16 17:49:09'),
(4, 'Desarrollo de Software ', '2019-08-16 17:49:30'),
(5, 'REDES Y TELECOMUNICACIONES', '2019-12-16 15:05:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(3, 'Juan Villegas', 2147483647, 'juan@hotmail.com', '(300) 341-2345', 'Calle 23 # 45 - 56', '1980-11-02', 5, '2017-12-23 20:11:04', '2017-12-24 01:11:04'),
(4, 'Pedro Pérez', 2147483647, 'pedro@gmail.com', '(399) 876-5432', 'Calle 34 N33 -56', '1970-08-07', 0, '0000-00-00 00:00:00', '2017-12-23 23:26:28'),
(5, 'Miguel Murillo', 325235235, 'miguel@hotmail.com', '(254) 545-3446', 'calle 34 # 34 - 23', '1976-03-04', 0, '0000-00-00 00:00:00', '2017-12-23 23:25:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `estado` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `estado`, `fecha`) VALUES
(1, 'PENDIENTE', '2019-08-27 14:42:01'),
(3, 'EN PROCESO', '2019-12-13 21:31:31'),
(4, 'TERMINADO', '2019-08-27 14:42:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE `soporte` (
  `id` int(11) NOT NULL,
  `soporte` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `soporte`
--

INSERT INTO `soporte` (`id`, `soporte`, `fecha`) VALUES
(1, 'ASIGNAR SOPORTE', '2019-08-30 07:30:14'),
(2, 'DIEGO FER CHAVEZ HINOJOSA', '2019-09-17 19:33:02'),
(9, 'RUBEN PORFIRIO SALAS MENDOZA', '2019-12-02 20:39:27'),
(10, 'EDDIE SALGADO LOPEZ', '2019-12-13 21:51:24'),
(11, 'JAVIER GERMAN RODRIGUEZ CONDORI', '2019-12-13 21:51:34'),
(12, 'LUIS ALBERTO GIUDICHE ESCUDERO', '2019-12-13 21:51:43'),
(13, 'CARLOS LUIS GONZAGA ARIAS CONDE', '2019-12-13 21:51:53'),
(14, 'JULIO CESAR GUARDIA VILCA', '2019-12-13 21:52:03'),
(15, 'YOSSHI SALVADOR CONDORI MENDIETA', '2019-12-13 21:52:23'),
(16, 'JOHN ROBERT NOVOA ALVARADO', '2020-04-30 16:45:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `observacion` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `oficina` text COLLATE utf8_spanish_ci NOT NULL,
  `area` text COLLATE utf8_spanish_ci NOT NULL,
  `cargo` text COLLATE utf8_spanish_ci NOT NULL,
  `cel` text COLLATE utf8_spanish_ci NOT NULL,
  `sede` text COLLATE utf8_spanish_ci NOT NULL,
  `piso` text COLLATE utf8_spanish_ci NOT NULL,
  `id_soporte` int(11) NOT NULL,
  `soporte` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `id_estado` int(11) NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `id_categoria`, `codigo`, `descripcion`, `observacion`, `nombre`, `oficina`, `area`, `cargo`, `cel`, `sede`, `piso`, `id_soporte`, `soporte`, `id_estado`, `imagen`, `fecha`) VALUES
(1, 1, '10001', 'Charito de Abastecimiento tiene problemas para imprimir ', 'impresora el rodillo esta quemado y arruga las horas ', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 15:44:31'),
(2, 1, '10002', 'David Hermosa problema con su PC no enciende', 'se configuro nueva ip, usuario tiene internet ', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 15:54:55'),
(3, 1, '10003', 'Laboratorio tiene problemas de red', 'Se soluciono el encendido, se le recomendo que no prenda el cpu conectado con el usb', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 15:55:35'),
(4, 1, '10004', 'Problemas técnicos con la maquina de Demid', 'SE LE REALIZO MANTENIMIENTO PREVENTIVO Y ARRANCO EL CPU DEL QF OFELIA-DEMID QUEDANDO OK', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 20:13:26'),
(7, 1, '10006', 'Atasco de papel en impresora de Kardex   pinillos piso 2', 'se retiro la hoja atracada y comenzó a imprimir sin problemas', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 16:51:43'),
(8, 1, '10007', 'Jose de RRHH tiene problemas con el CPU  No enciende', 'a', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 22:33:05'),
(9, 5, '50001', 'kardex probles de red  siga internet', 'configuracion de ip ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 21:09:31'),
(10, 1, '10008', 'XIOMARA DE TRAMITE DOCUMENTARIO SOLICITA CAMBIO DE TÓNER ', 'SE REVISÓ SU TONER, NO ESTÁ EN FUNCIONAMIENTO', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-18 21:33:56'),
(11, 1, '10009', 'RECUPERACION DE INFORMACION PS LEONCIO PRADO', 'se realizo la recuperación de 23 Gb de almacenamiento y se entrego al usuario', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 21:38:16'),
(12, 1, '10010', 'configurar impresora abastecimientos obtencion piso 2 pinillos usuario paola arana', 'Se configuro la impresora, se reinicio el equipo principal obteniendo un resultado favorable.', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 14:58:36'),
(13, 1, '10011', 'OASIS DE VILLA Instalacion de Office ', '', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 22:36:42'),
(14, 1, '10012', 'CS Julio C Tello Problemas con el Sistema Operativo', '', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/10012/223.jpg', '2019-12-17 21:14:39'),
(16, 1, '10013', 'IMPRESORA TICKETERA CMI MANUEL BARRETO PROBLEMAS TECNICOS', 'LA ETICKETERA NO TIENE CONECTIVIDAD CON LA PC, PUERTOS DE COMUNICACION SIN FUNCIONAMIENTO, PROBADO CON CABLE USB Y DE RED , SE DEBE DESCARTAR PLACA', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 18:20:31'),
(17, 1, '10014', 'DESA, Usuario: Adeltmo / Equipo no Enciende ', '', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 22:52:33'),
(18, 1, '10015', 'RRHH, Usuario: Carito / Caja de Datos - Red (No tiene Internet)', '', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 22:55:17'),
(19, 1, '10016', 'MONITOREO, Instalación de CPU\'S/ Revisión de Cableado', '', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 22:55:04'),
(20, 1, '10017', 'RRHH,Usuario: Pilar/Instalación de Impresora', '', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-16 22:54:54'),
(21, 1, '10018', 'configurar impresora usuario selene piso 2 pinillos ', 'ayer se le configuro la impresora Minolta por movimiento de sitio a todo el área de programación con el apoyo de Yosshi', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 19:59:01'),
(23, 1, '10020', 'configurar impresora lexmark abastecimientos piso 2 jefatura', 'Se le configuro la impresora al usuario todo conforme', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 19:56:38'),
(24, 1, '10021', 'pc no enciende abastecimientos gerber piso 2', 'Se le realizo el mantenimiento preventivo del CPU el cual levanto quitándole el video que tenia, se le puso directo con el integrado. se le devolvió todo conforme.', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 19:55:23'),
(25, 1, '10022', 'epidemiologia  fap piso 2 monitoreo por impresora', 'se reviso cables de conexión y la impresora esta operativa', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 17:04:55'),
(26, 1, '10023', 'sabrina - monitoreo piso 2 -fap - por impresora ', 'RESTOS DE PAPEL ATASCADO, SE TUVO QUE DESARMAR LA IMPRESORA PARA LIBERAR TROZOS DE PAPEL', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 17:29:55'),
(27, 1, '10024', 'No imprime sr. Percy Abastecimientos - prog. piso 2 - Pinillos', 'Se configuro la impresora, se reinicio el equipo principal obteniendo un resultado favorable.', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 23:42:12'),
(28, 1, '10025', 'SILVIA FUENTES  de Servicios Generales, maquina presenta problema de encendido.', 'Se le configuro la no pago automático por ahorro de energía del CPU quedando ok', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 19:52:10'),
(29, 1, '10026', 'Entregar CPU a Jose Donayre RRHH -FAP 2DO Piso', 'SE ENTREGÓ EL CPU, USUARIO DIO CONFORMIDAD', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 18:22:28'),
(30, 1, '10027', 'impresora konica minolta de terceros - logistica ', 'impresora conectada a todas las PCs de oficina programación ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 19:02:02'),
(31, 1, '10028', 'impresora konica minolta de terceros - logistica ', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 21:14:27'),
(32, 1, '10029', 'crear carpeta comprtida - Abastecimientos Jefatura', 'QUEDÓ CONFORME PAMELA BAZÁN; 3 USUARIOS COMPARTIDOS - ABASTECIMIENTO', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-17 23:27:39'),
(35, 1, '10032', 'configurar impresora - abastecimientos - machupicchu', 'impresora configurada con todas las PCs indicadas', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-18 21:34:24'),
(37, 1, '10033', '03 Usuarios de la oficina de Patrimonio tienen problemas para imprimir ', 'Se le configuro a los 3 usuarios la impresora POCHITO-69 y DESKTOP-625U5PP todo conforme', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-20 16:14:53'),
(45, 1, '10035', 'SONIA- RRHH- La computadora no enciende', 'revisión de cables de energía , la pc queda operativa', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-18 17:57:24'),
(50, 1, '10036', 'Usuario: Ibeth, Problemas con su equipo', '', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-18 18:39:43'),
(51, 1, '10037', 'ALFONSO DE ASESORIA JURIDICA NO PUEDE IMPRIMIR ', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-19 15:57:52'),
(52, 1, '10038', 'Capacitacion, Usuario:Maribel Cuya, Error al momento de imprimir.', 'Se le instalo la impresora Epson al usuario Capacitaciòn adicional al Lexmark que ya tenia instalado, asi tambien al otra usuaria se le indico el  uso de la fotocopiadora de la Lexmark ya que no sabia apretar los botones  para copia. ademas indica que queria que le libere el bloqueo de yotube se le dijo que haga un documento dirigido al Jefe de ETF-TI para la autorizaciòn respectiva .', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-18 20:54:06'),
(53, 1, '10039', 'Secretaria Tecnica, Usuario:Coral,Error al momento de imprimir.', 'Se le reinstalo el drive de impresion para corregir dejando todo conforme usuario Coral', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-18 20:49:10'),
(54, 1, '10040', 'Laboratorio,Usuario:Doctora Uliana,Error al momento de imprimir.', 'Se soluciono impresion de Laboratorio del usuario dra. Uliana Tenorio y demas usuarios dejando todo ok', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-19 17:53:40'),
(55, 1, '10041', 'JUAN DE TRAMITE DOCUMENTARIO NO ENCIENDE SU COMPUTADORA', 'problema resuelto ', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-19 15:21:53'),
(56, 1, '10042', 'TERESA ESTACIO PROBLEMAS CON SU COMPUTADORA', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-19 15:57:42'),
(57, 1, '10043', 'IRMA SOLICITA PONER UN PUNTO DE INTERNET', 'solucionado , se dejo un punto de red activo', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-20 14:57:43'),
(58, 1, '10044', 'CARLOS DE PATRIMONIO TIENE PROBLEMAS PARA IMPRIMIR', 'Se solucionò problemas de impresiòn a Patrimonio 01 usuario pochito-69, así también se le indico que la máquina compartida debe estar encendido.', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-20 15:35:27'),
(59, 1, '10045', 'DRA ZOILA INSTALACION DE MS PROJECT Y AUTOCAD', 'instalaciones completas', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-20 16:52:23'),
(60, 1, '10046', 'revisar pc acceso a red - kardex sra. Gloria', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-20 16:52:01'),
(61, 1, '10047', 'revision de pc - SIS-  EESS ALICIA LASTRES', 'navegador reinstalado', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-20 17:22:04'),
(62, 1, '10048', 'PILAR DE RECURSOS HUMANOS PROBLEMAS PARA IMPRIMIR ', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-20 18:27:06'),
(65, 1, '10049', 'revision de CPU PRECOACTIVO - TESORERIA  PISO 3 - ´PINILLOS', 'pc queda operativa', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-20 21:53:35'),
(66, 1, '10050', 'ASESORÍA JURÍDICA NO PUEDE IMPRIMIR ', 'Cable desconectado, se soluciono problema de red e impresora.', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-20 21:00:01'),
(67, 1, '10051', 'ps alicia lastres - laboratorio revision de cpu', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-20 23:21:10'),
(69, 1, '10052', 'JUAN ORBEGOSO NO PRENDE SU CPU', 'Se cambio cable poder quemado, se recomendó al usuario Sr. Orbegoso que cambie el Sistema  Eléctrico', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-20 23:10:04'),
(70, 1, '10053', 'PS QUEBRA VERDE - INSTALACION DE SWITCH Y UN PUNTO DE RED- FARMACIA', 'EL TRABAJO SE REALIZARA EL DIA SABADO 21-2019. Se realizo el trabajo de cableado de red al Servicio de farmacia todo conforme. asi mismo solicitan instalacion de 5 puntos mas, se le informo al jefe via wasat, tambien se trajo un CPU del PS Quebrada Verde para su revisión..  Se realizo mantenimiento preventivo CPU de Selena de Programacion se le cambio el disco y se formateo', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-21 22:42:22'),
(71, 1, '10054', 'YOANA DE LA OCI PRESENTA PROBLEMAS PARA IMPRIMIR ', 'UNIDAD DE IMAGEN ERRÓNEA, PROCEDÍ A CAMBIARLA QUEDANDO IMPRESIÓN EN OPTIMAS CONDICIONES', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-23 22:58:48'),
(72, 1, '10055', 'revision de cpu del ps Quebrada Verde, traido x ruben', 'Se arreglo la computadora.', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-23 16:25:31'),
(73, 1, '10056', 'reconfigurar impresora de Presupuesto, devido a que recibe impresion de otras oficinas', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-23 18:20:12'),
(75, 1, '10057', 'Configurar impresoras ufiem fap piso 4, contacto lurdes', 'Se configuro el mismo día la impresora de UFIEM todo conforme', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-26 14:56:07'),
(77, 1, '10059', 'VICTOR DE PATRIMONIO NO ENCIENDE SU CPU', 'usb conectado, problema con el booteo del bios resuelto', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-23 20:54:12'),
(78, 1, '10060', 'JOSE ZARATE PROBLEMAS CON SU COMPUTADORA', 'pc solucionado ', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-23 21:21:24'),
(79, 1, '10061', 'PACHECO DE ASESORIA JURIDICA NO PUEDE IMPRIMIR', 'se corrigio el problema en el panel de la impresora, adicional se corrigio la falta de internet en la pc del usuario.', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-23 22:31:14'),
(80, 1, '10062', 'SADITH DEL CSCM DE BARRANCO TIENE PROBLEMAS DE INTERNET', 'SE CONFIGURÓ LA TARJETA DE RED, QUEDANDO RESUELTO EL PROBLEMA DE INTERNET, DANDO CONFORMIDAD ESTHEFANY ', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-23 23:08:35'),
(81, 1, '10063', 'Revision de Teclado - Salud Mental - FAP Piso 3', 'TECLADO SUFRIÓ DERRAME DE JUGO, QUEDÓ OPERATIVO', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-26 16:10:40'),
(82, 1, '10064', 'Configurar Impresora - Abastecimientos Piso 2 - Pinillos - Karla Barrutia', 'problema se movio el cable de la imprersora hacia la pc que comparte ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-26 15:29:50'),
(83, 1, '10065', 'No hay internet en una parte de la DEMID, Revisar  - Ana Mendoza - FAP SOTANO', 'Se reviso la red en conjunto con el Javier Rodriguez encontrando todo conforme', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-26 20:32:35'),
(84, 1, '10066', 'No hay internet en una parte de la DEMID, Revisar  - Ana Mendoza - FAP SOTANO', 'FUIMOS A REVISAR CON RUBEN, ESTÁ CON RED OPERATIVA', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-26 18:10:02'),
(85, 1, '10067', 'PROBLEMAS DE IMPRESION - DESA - IMPRESORO HP - LEXMARK', 'Se soluciono problemas de impresión, lexmark falta tonner y HP lo vio Javier dejando todo ok ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-26 20:31:12'),
(86, 1, '10068', 'PC - PS ALICIA LASTRES - OBSTETRICIA NO ENCIENDE', 'UPS DAÑADO, SE RECOMENDÓ EQUIPOS DE PROTECCION DE ENERGÍA PARA QJE LO ADQUIERA POR CAJA CHICA', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-27 16:20:24'),
(87, 1, '10069', 'PC - ABASTECIMIENTOS - PROBLEMAS DE SO - REINSTALAR', 'Resuelto, se formateo la pc a windows 10. ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-27 21:34:33'),
(88, 1, '10070', 'RUTH DE PLANEAMIENTO TIENE PROBLEMAS AL SCANEAR', 'el scaner presenta una linea grande de macha negra ', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/10070/877.jpg', '2019-12-27 18:37:53'),
(89, 1, '10071', 'REVISION DE CPU - INGRESADO POR PERSONAL DEL PS HUERTOS DE MANCHAY', 'Se formateo el equipo. presenta pequeños detalles con el disco duro, pero el funcionamiento es optimo', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-27 21:35:11'),
(90, 1, '10072', 'MARIELA TIENE PROBLEMAS AL INICIAR SU EQUIPO', 'PROBLEMA DE USUARIO Y CONTRASEÑA VALIDADA', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-27 22:20:48'),
(91, 1, '10073', 'UFIEM LAPTOP LENOVO NO DA IMAGEN - FAP PISO 4 - CONTACTO LURDES', 'SE HIZO MANTENIMIENTO Y PRUEBAS DE COMPONENTES,  SE ENTREGA LAPTOP A LOURDES, ESTÁ PENDIENTE EL ARREGLO DEL DISPOSITIVO DE VIDEO PREVIA CONFIRMACIÓN DE ELLOS', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-30 15:03:08'),
(92, 1, '10074', 'PS. JOSE MARIA ARGUEDAS - SJL - INST. CABLE RED', 'Se reviso la pc, se resolvio los problemas en el sistema operativo. pendiente limpieza del pc', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-30 15:04:19'),
(93, 1, '10075', 'PS. JESUS PODEROSO - ADMISION PC NO RECUERDAN CLAVE - CONTACTO ELIZABETH VARGAS ', 'Clave fue reseteada. Se indico al usuario las medidas para evitar estos inconvenientes.', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-30 15:06:04'),
(94, 1, '10076', 'Revision y Configuracion de Impresora - Fap Piso 3- Salud Bucal - CD. Galindo', 'Se configuró la impresora de modo compartido marca HP todo conforme.', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-30 15:44:34'),
(95, 1, '10077', 'PC COMUNICACIONES - ELIZABETH LOZANO - NO ENCIENDE', 'CABLES MAL CONECTADOS', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-30 17:38:36'),
(96, 1, '10078', 'Problemas con la maquina de la Docotra Paniagua', 'Se atendio su cpu dejando todo conforme, se recomendó que tiene que solicitar a futuro mantenimiento preventivo para evitar futuras caidas. ', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-30 17:49:16'),
(98, 1, '10079', 'pc jose zarate en palomar se cuelga', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-30 14:57:15'),
(99, 1, '10080', 'revicion de pc - programacion terceros - Selene', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2019-12-31 10:42:51'),
(100, 1, '10081', 'CECILIA DE ASESORIA JURIDICA TIENE PROBLEMAS AL INICIAR SU EQUIPO', 'resolve', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-02 10:58:33'),
(101, 1, '10082', 'MARIELA DE ABASTECIMIENTO NO PUEDE IMPRIMIR ', 'pendiente por petición del usuario', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-02 12:00:29'),
(102, 1, '10083', 'SARA DE FAP 3ER PISO INSTALACION DE ESCANER', 'Se configuro el escaner hp fap 3cer piso todo conforme', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-02 12:00:59'),
(103, 1, '10084', 'EPIDEMILOGIA NO PUEDE IMPRIMIR', 'Se le soluciono problemas de impresion al usuario, en el compartido de seguridad los check estaban deshabilitados por que que se le activo todo conforme', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-02 12:01:35'),
(104, 1, '10085', 'UFIEM- CAMBIO DE MONITOR DE VIDEO - LURDES', 'se realizo el cambio de monitor ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-02 15:03:32'),
(107, 1, '10088', 'PIGUI DE ASESORIA JURIDICA NO PUEDE IMPRIMIR', 'ya esta resuelto ;)', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-02 15:27:12'),
(108, 1, '10089', 'CECILIA DE ASESORIA JURIDICA TIENE PROBLEMAS AL INICIAR SU EQUIPO', ' al final era problema de impresora', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-02 16:05:15'),
(111, 1, '10091', 'ADELINA SANTANA TIENE PROBLEMAS CON EL SIAF', 'Se atendió al usuario restableciendo el SIAF todo conforme', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-03 08:47:34'),
(112, 1, '10092', 'no ngresa a pagina de banco de sangre - ufiem - itusaca', 'RESUELTO INGRESO A LA PAGINA', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-03 10:11:26'),
(113, 1, '10093', 'apoyo a cableado - 4piso FAP - monitoreo', 'Se instalo 3 puntos de Red en 2do. piso FAP area almacen_DEMID, se termino de Intalar 2 de los 3 equipos nuevos marca DELL ya que un usuario ya estaba instalandolo. se dejo todo conforme a excepcion pendiente el Officce y antivirus.', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-03 10:18:48'),
(114, 1, '10094', 'pc miguel de abastecimientos - terceros no prende', 'PROBLEMA DE ENERGÍA, YA ENCIENDE ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-06 08:51:21'),
(115, 1, '10095', 'ELIZABETH TAPIA DE INMUNIZACIONES NO PRENDE SU COMPUTADORA', 'Se atendio al usuario todo conforme. solo era apretar el boton del encendido', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-06 09:15:08'),
(116, 1, '10096', 'laptop no ingresa su clave de inicio - piso 4 -  SERV_GRALES.', 'Solucionado', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-06 09:19:13'),
(117, 1, '10097', 'ELIZABETH DE PLANEAMIENTO TIENE PROBLEMAS AL INICIAR SESIÓN ', 'everything is ok', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-06 09:27:36'),
(118, 1, '10098', 'ALCIDES DE LA DEMID SOLICITA CABLE DE RED PARA EL DESPLAZAMIENTO DE 01 IMPRESORA', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-06 11:53:35'),
(120, 1, '10100', 'instalar mainboar y fuente para pc de serv-grales. Sra. Silvia', 'SE ENSAMBLÓ PC EN UN CASE COMPATIBLE, SE ENTREGÓ OPERATIVO A LA SRA. SILVIA FUENTES', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-06 16:05:30'),
(123, 1, '10103', 'SILVIA DE SERVICIOS GENERALES NO TIENE SISTEMA DE TRAMITE', 'resuelto.', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-07 09:24:39'),
(124, 1, '10104', 'ELIZABETH DE PLANEAMIENTO NO PUEDE IMPRIMIR', 'se volvio a reinstalar las insumos de imagen y toner solucionado', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-07 09:29:39'),
(125, 1, '10105', 'cambiar cable usb - dra. Gioconda -FAP- PISO 2 - SERV_FUNERARIOS', 'la impresora tenia un aviso de (esperar, USB) aparentemente no conectaba el puerto, pero al cambiar de cable a uno de 5mts el servicio se reestablecio', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-07 09:41:04'),
(127, 1, '10106', 'PRUEBA', '', 'ERNESTO ALEJANDRO LA TORRE CRUZ', 'PRUEBA', 'PRUEBA', 'PRUEBA', '917023452', 'Pinillos', '1', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-07 10:13:06'),
(131, 1, '10107', 'MONITOR SE PRENDE Y APAGA - LLEVAR CABLE VGA Y REVISAR', 'RESUELTO GARANTIA DE CPU', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-07 16:22:49'),
(132, 1, '10108', 'revision de impresora no imprime- OEA - LUDEÑA', 'Se le reviso la impresora desconectando el cable USB y volviendo la conectar para que reconosca el drive de la impresora. Dejando todo operativo', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-07 17:43:09'),
(133, 1, '10109', 'DRA. LETICIA DESA - REVISION DE CPU - FAP PISO 2', 'Se realizo mantenimiento de la memoria RAM, se le retiro la tarjeta de video instalado  mucho calienta el cpu, dejanto todo conforme', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-07 17:45:09'),
(134, 1, '10110', 'MELINDA DE RRHH NO PUEDE IMPRIMIR ', 'Se soluciono problema de Impresion todo conforme', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-08 08:48:22'),
(135, 1, '10111', 'ANTHONY DE LA DG NO ENCIENDE SU CPU', 'limpieza de pc, desenergizacion del pc. todo ok', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-08 08:48:44'),
(136, 1, '10112', 'SILVIA FUENTES NO TIENE INTERNET', 'SE CONFIGURO NIC, QUEDA OK', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-08 08:49:45'),
(137, 1, '10113', 'CAROLINA NEYRA DEL CUARTO PISO DE LA FAP NO IMPRIME ', 'se volvio a instalar driver de impresora', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-08 08:53:56'),
(138, 1, '10114', 'ADELINA SANTANA TIENE PROBLEMAS CON EL INGRESO A SU EQUIPO DE COMPUTO', 'solucionado cambio de contraseña', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-08 08:54:37'),
(139, 1, '10115', 'laboratorio pc dr. razo no prende', 'pc diagnosticada y acta generada. fuente de poder en mal estado', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-08 09:09:12'),
(140, 1, '10116', 'DRA. GALINDO PROBLEMAS DE TV', 'solucionado', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-08 10:35:48'),
(141, 1, '10117', 'DEMID - JULIO VELASQUEZ - EXEL COMPARTIDO', 'se realiazo el compartido ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-08 10:36:34'),
(142, 1, '10118', 'JUANCARLOS DE LABORATORIO SOLICITA ACTUALIZACIÓN  DE OFFICE', 'Se le actualizo el Officce 2013 todo conforme', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-08 14:53:16'),
(143, 1, '10119', 'RITA HUAMAN PARIONA DEL COE INSTALACIÓN DEL SISTEMA DE TRAMITE', 'Se instalo solo el icono de Tramite de DIRIS LS mas no el acceso no obstante se le indico que tiene que hacer una solicitud de acceso a la administraciòn con a tencion a la oficina para hacer efectivo lo solicitado.', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-09 09:45:42'),
(144, 1, '10120', 'instalar monitor, en la ADMINISTRACION, ', 'instalacion completa', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-09 11:12:04'),
(145, 1, '10121', 'revisar impresora - DESA- Sec. Maria Lopez', 'Se soluciono el tema de impresión con apoyo del miau', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-09 11:12:44'),
(146, 1, '10122', 'pc de ruth no prende - Planeamiento', 'Se reviso conexión eléctrica del CPU dejando todo operativo', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-10 08:40:56'),
(147, 1, '10123', 'Configurar Impresora Juan Elias piso 4 pinillos', 'se configuro 2 pc a la impresora', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-10 09:16:02'),
(148, 1, '10124', 'pc dra. benel, mas puntos de red de demid', 'Se reviso las conexiones electricas de la CPU dejando operativo. En Demid pendiente ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-10 09:19:56'),
(149, 1, '10125', 'DRA OSCCORIMA SE OLVIDO SU CLAVE', 'SE RESETEO LA CONTRASEÑA', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-10 11:22:05'),
(150, 1, '10126', 'UFIEM - CONFIGURAR IMPRESORA - Y REVISON DE RED EN ALGUNAS PC', 'Se configuro la Red general a los CPUs e Impresoras y posterior se reconfiguro con la Red Anterior independiente por reparación por personal técnico de Movistar', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-10 12:16:50'),
(151, 1, '10127', 'INMUNIZACIONES REVISION DE CPU E IMPRESORAS', 'Se reviso las conecciones electricas de la PC dejando todo conforme, asi tambien se reviso las impresoras HP una le falta tonner y el otro le falta mantenimiento, se le indico que tiene que hacer docuemnto', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-10 12:19:16'),
(152, 1, '10128', 'ppto. diris ls - piso 3 - TANIA', 'Se soluciono el tema de encendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-13 08:44:24'),
(153, 1, '10129', 'FREDY HUARCAYA DE DESA NO PUEDE ABRIR EL ACROBAT', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-13 08:45:57'),
(154, 1, '10130', 'UFIEM - CONFIGURAR IMPRESORA - Y REVISON DE CPU - FAP PISO 4', 'Atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-13 08:46:54'),
(155, 1, '10131', 'PC DRA. MONZON NO PRENDE - FAP PISO 4', 'solucionado', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-13 15:53:41'),
(156, 1, '10132', 'PC MAGDALENA NO PRENDE - FAP PISO 3', 'falto prender el supresor de picos', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-13 15:54:14'),
(157, 1, '10133', 'FAP - PISO 3 - IMPRESORA DEL DR. ALEGRIA NO IMPRIME', 'solucionado cables mal conectados', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-14 09:05:20'),
(158, 1, '10134', 'DEMID - PC PAOLA JARA NO ENCIENDE', 'se detecto fuende de poder malograda', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-14 09:06:05'),
(159, 1, '10135', 'CONFIGURAR - IMPRESORA PARA IMPRESION EN DEMID -SOTANO', 'solucionado', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-14 09:06:50'),
(160, 1, '10136', 'PC DE EPI- MAGDALENA NO LEVANTA - FAP PISO 3', 'solucionado se limpio la memoria ram', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-14 10:44:32'),
(161, 1, '10137', 'entrega e instalacion de SUPRESOR DE PICO - PALOMAR JOSE ZARATE', 'se entrego y se instalo el supresor de picos', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-14 14:44:46'),
(162, 1, '10138', 'CAROLINA NEYRA FAP PISO 4 - PC NO PRENDE', 'pc placa malograda ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-14 14:45:24'),
(164, 1, '10139', 'Se ha desconfigurado la impresora y por lo tanto no puedo imprimir desde mi pc y debo imprimir mapas. ', 'se reconfiguro la impresora', 'JESUS CRISOSTOMO ZARATE TAMARA', 'EPIDEMIOLOGÍA E INTELIGENCIA SANITARIA', 'UNIDAD DE ANÁLISIS ESPACIAL', 'ING GEOGRAFO', '997908242', 'Fap', '3', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-16 10:23:39'),
(165, 1, '10140', 'ANITA DE DEMID PROBLEMAS CON SU EQUIPO N°4', 'solucionado ', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-16 10:31:24'),
(166, 1, '10141', 'YOANA DE LA OCI PRESENTA PROBLEMAS PARA IMPRIMIR ', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-16 10:51:09'),
(167, 1, '10142', 'ADELINA SANTANA TIENE PROBLEMAS CON EL INTERNET', 'solucionado se limpio temporales', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-16 14:48:58'),
(168, 1, '10143', 'ALFONSO DE ASESORIA JURIDICA NO PUEDE IMPRIMIR ', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-16 15:25:01'),
(169, 1, '10144', 'PC NO IMPRIME - ABASTECIMIENTOS - VIKY TASAYCO', 'solucionado se reconfiguro la impresora', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-17 08:49:04'),
(170, 1, '10145', 'NO IMPRIME - TBC - FAP PISO 3 - LIC MIRIAM', 'se resolvio en la fecha.', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-17 11:04:52'),
(171, 1, '10146', 'OCI - NO IMPRIMEN - PISO 3', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-17 15:07:53'),
(173, 1, '10147', 'laboratorio no hay internet', 'solicionado cable desconectado', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-20 09:03:17'),
(174, 1, '10148', 'solicita acceso a impresora', 'usuario esta de vacaciones', 'DORIS HAYDEE SIFUENTES PEÑA', 'ETF EPIDEMIOLOGIA E INTELIGENCIA SANITARIA', 'NOTIFICACION', 'TEC ESTADISTICO', '995121363', 'Fap', '3', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-20 10:31:39');
INSERT INTO `ticket` (`id`, `id_categoria`, `codigo`, `descripcion`, `observacion`, `nombre`, `oficina`, `area`, `cargo`, `cel`, `sede`, `piso`, `id_soporte`, `soporte`, `id_estado`, `imagen`, `fecha`) VALUES
(176, 1, '10149', 'INSTALACION DE TRAMITE DOCUMENTARIO', 'instalacion hecha', 'IVET INES MUCHA CASTRO', 'ETF DE SEGUROS', 'SEGUROS', 'TEC ADMINISTRATIVA', '987590740', 'Fap', '4', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-21 15:47:32'),
(177, 1, '10150', 'Teclado no funciona segun usuario-  de pc de trasmision - presupuesto- piso 3', 'se intercambio de teclado por uno funcional de la oficina de ti. El teclado ya no funciona', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-22 09:20:56'),
(178, 1, '10151', 'se hizo la instalacion de tramite documentario, pero al momento de abrir no responde', 'Resuelto por conexion anydesk, dhcp instalaba una PE /24. se corrigio a /21', 'IVET INES MUCHA CASTRO', 'ETF DE SEGUROS', 'SEGUROS', 'TEC ADMINISTRATIVA', '987590740', 'Fap', '4', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/10151/708.png', '2020-01-22 10:45:11'),
(179, 1, '10152', 'ZULIA ARANA DE LOGISTICA - PROBLEMAS CON SU MAQUINA, NO ENCIENDE ', 'Se formateo la PC, aparentemente el sistema operativo estaba corrupto, y era el origen del problema en la pc. Todo quedo OK', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-23 10:46:24'),
(180, 3, '30001', 'SOLICITO PODER EXPLOTAR LA BASE DE DATOS DEL SISTEMA DE TRAMITE DOCUMENTARIO PARA PODER HACERLE SEGUIMIENTO A LOS DOCUMENTOS INGRESADOS A MI OFICINA', 'debera acercarse a la oficina de ETF-TI , para absolver su inquietud', 'JULIA NANCY ALVAREZ REYNA DE LOVERA', 'EF PRESTACIONES Y GESTIÓN EN SALUD', 'SECRETARIA', 'SECRETARIA', '993129998', 'Fap', '4', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-24 09:26:52'),
(181, 1, '10153', 'revision pc de oci - rosa liv', 'Se instalo en su CPU otro PDF dejando todo conforme', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-24 12:39:27'),
(182, 1, '10154', 'UFIEM - CONFIGURAR IMPRESORA - y red - piso 4', 'Se configuro CPUs e Impresora por configuraciòn de la Red General ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-24 12:40:29'),
(183, 1, '10155', 'UFIEM - CONFIGURAR IMPRESORA - y red - piso 4', 'SOLUCIONADO', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-24 12:40:55'),
(184, 3, '30002', 'DEMID - PC NO PRENDE - ANDREWS', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-27 09:06:52'),
(185, 1, '10156', 'REVISAR SWITCH DE - SEC. TECNICA MARIBEL CUYA', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-27 10:01:02'),
(186, 1, '10157', 'NO PRENDE LA COMPUTADORA DE LA DRA BENEL MEJIA', 'SE HIZO MANTENIMIENTO, MAINBOARD NO LEVANTA, A LA ESPERA DE COMPRA X CAJA CHICA ', 'JULIA NANCY ALVAREZ REYNA DE LOVERA', 'EF PRESTACIONES Y GESTIÓN EN SALUD', 'SECRETARIA', 'SECRETARIA', '993129998', 'Fap', '4', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-27 10:45:33'),
(187, 1, '10158', 'impresora no imprime - CAPACITACION - LIC. SOLEDAD ROMANI', 'se reviso la impresora lexmark, la impresora imprime correctamente', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-29 09:13:23'),
(188, 1, '10159', 'pc de integracion contable - Lic,. Ana solis no tiene internet', 'se reviso el swicht que se encuentra en el servicio, se reincio el swicht , la latencia regreso a la normalidad', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-29 11:59:03'),
(194, 1, '10160', 'MENTAL DE MONITOREO - PABLO- PROBLEMAS CON LA IMPRESION', 'Se reviso impresora HP LaserJet MFP M631 , el cual presentaba problemas de compartimiento.  se reinicio todo el proceso de compartimiento, los equipos pueden imprimir sin ningún percance.', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-01-30 09:58:03'),
(195, 1, '10161', 'cambio de teclado sra. pilar de rrhh - fap piso 2', 'no se encontro teclado USB disponible para la usuaria', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-03 09:12:57'),
(196, 1, '10162', 'PRECOACTIVO - POR IMPRESORA', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-03 10:19:53'),
(197, 1, '10163', 'solicita acceso a Impresora', 'solucionado se configuro impresora', 'DORIS HAYDEE SIFUENTES PEÑA', 'ETF EPIDEMIOLOGIA E INTELIGENCIA SANITARIA', 'NOTIFICACION', 'TEC ESTADISTICO', '995121363', 'Fap', '3', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-05 09:49:35'),
(198, 1, '10164', 'palomar - por pc - serv_grales', 'solucionado ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-05 12:30:21'),
(199, 1, '10165', 'asesoria legal - verificacion de instalacion de pc', 'solucionado ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-05 12:31:03'),
(201, 1, '10167', 'La PC de mi computadora no prende, ya se verificó enchufes y todo está conectado', 'se reviso la pc y se encontro la placa y fuente de poder en mal estado se necesita cambiar placa y fuente', 'ROCIO DEL PILAR CRESPO PERAUNA', 'Epidemiología e Inteligencia Sanitaria', 'Vigilancia Epidemiologica', 'Enfermera', '981042321', 'Fap', '3', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-06 15:25:48'),
(202, 1, '10168', 'REVISION DE RED -SECRETARIA ECONOMIA -', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-06 15:35:54'),
(203, 1, '10169', 'instalacion de autocad - monitoreo', 'se instalo el software autocad al usuario', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-07 09:59:09'),
(204, 1, '10170', 'impresora de presupuesto - no imprime', 'solucionado', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-07 14:17:37'),
(205, 3, '30003', 'activar office 2019 pc anita demid', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-07 17:52:12'),
(206, 1, '10171', 'no puedo imprimir, la impresión sale como posible virus', 'se reinstalo la impresora ', 'MAGDALENA MOSCOL HERRERA', 'EPIDEMIOLOGIA E INTELIGENCIA SANITARIA', 'SECRETARIA', 'SECRETARIA', '999444042', 'Fap', '3', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-10 08:33:32'),
(207, 1, '10172', 'goyito x pc ', 'se cambio  de slot memoria ram', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-10 09:21:09'),
(208, 1, '10173', 'ursula no imprime', 'solucionado impresora reconfigurada', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-10 09:21:36'),
(209, 1, '10174', 'monica zevallos - referencias problemas con el office', 'se realizo la activacion de office', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-10 09:42:22'),
(210, 1, '10175', 'problemas con pc- charito de vih sida', 'solucionado limpieza de temporales', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-10 09:43:24'),
(211, 1, '10176', 'pc no prende - sec tecnica - ', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-10 09:44:27'),
(212, 1, '10177', 'pc apreco no enciende ', 'solucionado', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-10 11:05:25'),
(213, 1, '10178', 'Problemas con el mouse, no permite seleccionar ningún archivo. ', 'solucionado', 'SABRINA MILAGROS LARA DURAN', 'ETF Calidad y Seguridad del Paciente', 'Secretaria', 'Secretaria', '937262341', 'Fap', '4', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-11 08:42:30'),
(214, 1, '10179', 'PROBLEMAS AL INGRESAR A LA COMPUTADORA DE MONICA QUIROZ RENIPRESS', '', 'JULIA NANCY ALVAREZ REYNA DE LOVERA', 'EF PRESTACIONES Y GESTIÓN EN SALUD', 'SECRETARIA', 'SECRETARIA', '993129998', 'Fap', '4', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-11 10:40:19'),
(215, 1, '10180', 'Charito de Abastecimiento tiene problemas para imprimir ', 'LA MAQUINA PRINCIPAL ESTABA APAGADA.', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-12 08:42:27'),
(216, 1, '10181', 'solicita acceso a impresora', '', 'DORIS HAYDEE SIFUENTES PEÑA', 'ETF EPIDEMIOLOGIA E INTELIGENCIA SANITARIA', 'NOTIFICACION', 'TEC ESTADISTICO', '995121363', 'Fap', '3', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-12 16:13:52'),
(217, 1, '10182', 'VALENTINO TIENE PROBLEMAS CON SU TRAMITE DOCUMENTARIO', 'solcuionado se creo usario de tramite', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-13 09:53:24'),
(218, 1, '10183', 'GISELA RODRIGUEZ DE LA OCI NO PUEDE ENTRAR AL SIAF', 'solucionado', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-13 15:01:23'),
(219, 1, '10184', 'instalar cpu - oficina de abastecimientos', 'PCs instaladas', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-17 14:28:58'),
(220, 1, '10185', 'Revision pc de la DG', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-17 14:47:32'),
(221, 1, '10186', 'auditorio pc de tbc - no proyecta', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-18 09:03:42'),
(222, 1, '10187', 'La impresora no esta configurada y no puedo imprimir. Gracias', '', 'CONSUELO ALOR ROJAS', 'EPIDEMIOLOGIA E INTELIGENCIA SANITARIA', 'PRESUPUESTO', 'TECNICO ADMINISTRATIVO', '945632166', 'Fap', '3', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-18 09:48:43'),
(223, 1, '10188', 'mover impresora de ASESORIA LEGAL', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-18 14:16:43'),
(224, 1, '10189', 'mover impresora de ASESORIA LEGAL', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-18 14:17:25'),
(225, 1, '10190', 'computadora colapso y no levanta.', '', 'MARIA DEL CARMEN TAIPE AYLAS', 'Epidemiologia e inteligencia sanitaria', 'Vigilancia Epidemiologica', 'Nutricionista', '941461074', 'Fap', '3', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-18 14:41:05'),
(226, 1, '10191', 'CECILIA DE ASESORIA JURIDICA TIENE PROBLEMAS CON SU MOUSE', 'Se le reviso el cpu absolviendo el teclado con reinicio dejando todo ok', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-19 08:43:51'),
(227, 1, '10192', 'MARCO DE PATRIMONIO TIENE PROBLEMAS CON EL SIGA', 'El usuario tiene instalaciones recientes de servicios de VPN creando conflictos en su computadora. No hay problemas con el SIGA, solo es un conflicto interno ocacionado por el mismo usuario.', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-20 12:40:44'),
(228, 1, '10193', 'No puedo abrir el google Chrome para abrir mis corrreos', '', 'ROCIO DEL PILAR CRESPO PERAUNA', 'Epidemiología e Inteligencia Sanitaria', 'Vigilancia Epidemiologica', 'Enfermera', '981042321', 'Fap', '3', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-24 08:28:47'),
(229, 1, '10194', 'ADELINA TIENE PROBLEMAS CON EL SIAF', 'solucionado se limpio temporales', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-24 08:38:18'),
(230, 1, '10195', 'EMPERATRIZ JEFA DE ASESORIA JURIDICA NO TIENE INTERNET ', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-24 08:39:41'),
(231, 1, '10196', 'armar pc - administracion', 'Se instalo una maquina usada, se realizo cableado de Red y se configuro la impresora de la Oficina de Administraciòn', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-24 08:40:25'),
(232, 1, '10197', 'no ingresa a internet - jefe asesoria juridica', 'solucionado configuracion de red', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-24 08:41:34'),
(234, 1, '10198', 'asesoria juridica', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-25 12:35:51'),
(235, 1, '10199', 'desa punto de red - habilitar una pc', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-25 12:36:52'),
(237, 1, '10201', 'GISELA RODRIGUEZ DE LA OCI NO PUEDE ENTRAR AL SIGA', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-26 15:45:55'),
(238, 1, '10202', 'BENDEZU DE ASESORIA JURIDICA NO TIENE INTERNET', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 09:21:08'),
(239, 1, '10203', 'GISELA RODRIGUEZ DE LA OCI NO PUEDE ENTRAR AL SIGA', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 09:23:25'),
(240, 1, '10204', 'ASESORIA JURICA - X IMPRESORA', 'atendido se reconfiguro ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 14:51:27'),
(241, 1, '10205', 'PATRIMONIO - REPARACION DE PC', 'atendido pc formateado ', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 14:52:01'),
(242, 1, '10206', 'TRESORERIA - CHARO X SIAF ACCESO', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 14:53:02'),
(243, 1, '10207', 'DEMID- ACTIVACION OFFICE', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 14:53:55'),
(244, 1, '10208', 'LABORATORIO - REVISION DE PC USUARIO SIN DATOS ', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 14:56:46'),
(245, 1, '10209', 'INSTALACION DE PUNTO DE RED EN DG', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 14:57:36'),
(246, 1, '10210', 'VACUNAS - MONITOREO PISO 2 PC NO PRENDE ', 'Vacunas 3cer piso se reviso que hubo deconeccion de cable de energia para la PC el cual se corrio, asi mismo se le reintalo el Office 2016 ya que algunos archivos no habria, pero igual se le indico que el archivo esta dañado. Se le dejo todo ok', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 15:00:23'),
(247, 1, '10211', 'CONFIGURAR IMPRESORA EN DESA', 'Se configuro para 5 usuarios la impresora lexmar del Biologo Ronal Intimayta', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 15:01:02'),
(248, 1, '10212', 'NUTRICION - CONFIGURAR IMPRESORA', 'Se configuro los CPUs de Nutrición con la impresora de PCT todo ok, se sugiere que su CPU de Lic. Percy se formatee', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 15:01:40'),
(249, 1, '10213', 'LIC. CHINGA - MONITOREO PISO 3 - FAP', 'Se soluciono problema de conectividad de Red', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 15:02:43'),
(250, 1, '10214', 'EPIDEMIOLOGIA- PISO 3 FAP', 'se entrego equipo de computo', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 16:32:14'),
(251, 1, '10215', 'ASESORIA JURICA - X IMPRESORA', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 16:32:45'),
(252, 1, '10216', 'ELOY - CONF. IMPRESORAS', 'se configuro impresora HP', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-27 16:48:32'),
(253, 1, '10217', 'auditorio - por configuracion de proyeccion', 'se configuro el proyector para reunión de capacitación, se presto un MOUSE USB para laptop', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'CARLOS LUIS GONZAGA ARIAS CONDE', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-28 08:59:09'),
(254, 1, '10218', 'dg x internet', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-28 08:59:39'),
(255, 1, '10219', 'kardex - sra gloria x siga', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-28 09:01:13'),
(256, 1, '10220', 'ana solis - x SIAF ACCESO', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-28 09:01:43'),
(257, 1, '10221', 'LA IMPRESORA NO PUEDE IMPRIMIR - SECRETARIA TECNICA CARMEN QUISPE ', '', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-28 09:47:30'),
(258, 1, '10222', 'NUTRICION - CONFIGURAR IMPRESORA -', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-28 11:46:12'),
(259, 1, '10223', 'CONF. IMPRESORA DE CPU - LABORATORIO', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-02-28 11:46:51'),
(260, 1, '10224', 'desa - hector bazan x pc', 'solucionado es su momento', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-02 08:38:58'),
(261, 1, '10225', 'sec. tecnica x impresora', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-02 08:39:29'),
(262, 1, '10226', 'carlos vega - no tiene internet', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-02 08:40:15'),
(263, 1, '10227', 'walter chacon del coe tiene problemas en el encendido de su computadora', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-02 08:43:43'),
(264, 1, '10228', 'OCI ACCESO SIGA- SIAF', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-02 09:33:40'),
(265, 1, '10229', 'juana huanca - pc  no inicia windows', 'solucionado', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-02 11:30:14'),
(266, 1, '10230', 'laboratorio - no reconoce usb', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-02 11:30:43'),
(267, 1, '10231', 'oaj - no ingresa con clave pc', 'atendido', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-02 11:31:14'),
(268, 1, '10232', 'TRASLADO DE EQUIPO INFORMÁTICO A OTRO ESCRITORIO - ELVIS ABASTECIMIENTO 2 PISO', 'Se realizo la instalación del equipo y la configuración de los api de Diris lima sur', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-02 12:11:07'),
(269, 1, '10233', 'ING CESAR PEREDA PROBLEMAS CON LA CONEXION DE UN EQUIPO DE COMPUTO', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-03 10:50:46'),
(270, 1, '10234', 'LIC CARMEN BAUTISTA TIENE PROBLEMAS CON EL ENCENDIDO DE SU EQUIPOS - EPIDEMIOLOGIA FAP', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-03 10:51:43'),
(271, 1, '10235', 'ABOGADO RODOLFO JEFE DE ABASTECIMIENTO TIENE PROBLEMAS CON SU CPU', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-03 10:53:25'),
(272, 1, '10236', 'DRA DURAND DE DESA DE LA FAP NO PUEDE IMPRIMIR ', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-03 10:54:01'),
(273, 1, '10237', 'SELENE DE ABASTECIMIENTO NO CUENTA CON INTERNET ', 'Se resolvió el problema de internet cambiando la ip del equipo', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-04 10:08:47'),
(274, 1, '10238', 'MARY AVILES DE PATRIMONIO TIENE PROBLEMAS CON EL TRAMITE DOCUMENTARIO', 'Se configuro el tramite con el navegador predeterminado y se instalo el anydesk', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-04 10:09:43'),
(276, 1, '10239', 'ING ABEL SOLICITA LA CREACIÓN DE USUARIO DE SU EQUIPO DE CÓMPUTO', '1. SE TRASLADÓ UNA COMPUTADORA COMPLETA (CPU, MONITOR, TECLADO, MOUSE Y UPS) AL ESCRITORIO DEL SR ABEL RAMIREZ. SE HIZO LAS CONEXIONES Y BACKUP EN UNA CARPETA DEL DISCO C; DE ACUERDO A SU SOLICITUD, SE DEJÓ LA PC EN FUNCIONAMIENTO EFECTUANDO SU USO EL MISMO USUARIO. 2. SE REVISÓ 5 TABLETS (LENOVO TAB 2 A7 - 30) ENTREGANDO AL SR ABEL RAMÍREZ ENCENDIDAS (FUNCIONANDO), TODAS LAS TABLETS QUEDAN CON SU CARGADOR RESPECTIVO 3. SE CONECTÓ OTRA COMPUTADORA A UN NUEVO AMBIENTE CONFIGURANDO LA IMPRESORA Y PROGRAMAS PARA SU CORRECTO FUNCIONAMIENTO, SE HIZO LAS PRUEBAS RESULTANDO OPERATIVA. 4. SE CONFIGURÓ EL SISTEMA OPERATIVO DE UNA LAPTOP (LENOVO THINKPAD COREI7 DE 8 GENERACIÓN) NUEVA Y LA INSTALACIÓN DE LOS PROGRAMAS DE OFIMÁTICA Y LOS UTILITARIOS QUEDANDO CONCLUIDA SU INSTALACIÓN. ', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'JAVIER GERMAN RODRIGUEZ CONDORI', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-04 17:28:56'),
(277, 1, '10240', 'DR WELL DE ASESORIA JURIDICA INDICA QUE SU PANTALLA ESTA NEGRA', 'Se soluciono el problema de bios presionando F1 ', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-09 10:01:11'),
(278, 1, '10241', 'ELIZABETH DE PLANEAMIENTO NO PUEDE IMPRIMIR', 'Se selecciono la impresora correcta desde su word, donde presentaba el problema', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-09 10:32:54'),
(279, 1, '10242', 'DR WELL DE ASESORIA JURIDICA INDICA QUE SU PANTALLA ESTA NEGRA', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'DIEGO FER CHAVEZ HINOJOSA', 1, 'vistas/img/productos/default/anonymous.png', '2020-03-09 10:56:55'),
(280, 1, '10243', 'OFICINA DEL SR TIPA SOLICITAN PERSONAL PARA INSTALAR UN EQUIPO DE COMPUTO', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-10 15:37:38'),
(281, 1, '10244', 'EN LA OFICINA DEL SR TIPA SOLICITAN UN PERSONAL POR QUE NO TIENEN INTERNET', '', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-10 15:38:09'),
(284, 1, '10245', 'PROBLEMAS CON LA IMPRESORA DE SALUD SEXUAL FAP -3 PISO', '', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-03-12 09:42:03'),
(285, 1, '10246', 'katia de la administracion por pc', '', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 0, 'JULIO CESAR GUARDIA VILCA', 1, 'vistas/img/productos/default/anonymous.png', '2020-03-16 09:22:27'),
(290, 1, '10249', 'ANTIVIRUS VENCIDO', 'SE ESTA ESPERANDO LA ENTRAGA DE LOS ANTIVIRUS POR PARTE DEL AREA DE ABASTECIMIENTO', 'ELMER LEONEL CAMPOS ACASIETE', 'ETF CVZ', 'JEFATURA', 'JEFE', '995214115', 'Fap', '2', 0, 'YOSSHI SALVADOR CONDORI MENDIETA', 4, 'vistas/img/productos/default/anonymous.png', '2020-04-29 10:32:32'),
(293, 1, '10250', 'MAQUINA DE PLANEAMIENTO NO ENCIENDE 4 PISO PINILLOS', 'maquina de quien?', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'DIEGO FER CHAVEZ HINOJOSA', 1, 'vistas/img/productos/default/anonymous.png', '2020-04-29 12:03:06'),
(296, 1, '10251', 'RRHH CONTROL DE ASISTENCIA - EQUIPO NO ENCIENDE ', 'Se realizo mantenimiento, se cambio la fuente de alimentacion por estar dañado, se le puso pasta termica y sopleteada , asi tambien se le activo el oficce', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-04-30 12:11:57'),
(297, 1, '10252', 'problemas con mi ordenador no prende ', 'ubique al usuario a pesar que estaba en el 2do piso desa que solucione problemas de Red', 'RUTH ROXANA HUAYHUAS RODAS', 'ais', 'ESANS', 'equipo técnico', '983264523', 'Fap', '3', 0, 'RUBEN PORFIRIO SALAS MENDOZA', 4, 'vistas/img/productos/default/anonymous.png', '2020-04-30 12:21:53'),
(298, 1, '10253', 'COFIGURACION DE IMPRESORA', '', 'MONICA HUAMANI PUMATANCA', 'AIS', 'NUTRICION', 'COORDINADORA', '999950185', 'Fap', '3', 0, 'JOHN ROBERT NOVOA ALVARADO', 4, 'vistas/img/productos/default/anonymous.png', '2020-04-30 12:34:14'),
(299, 1, '10254', 'No abre PDF', '', 'RUTH ROXANA HUAYHUAS RODAS', 'ais', 'ESANS', 'equipo técnico', '983264523', 'Fap', '3', 0, 'JOHN ROBERT NOVOA ALVARADO', 4, 'vistas/img/productos/default/anonymous.png', '2020-04-30 13:04:54'),
(300, 1, '10255', 'La pantalla de mi equipo de computo (monitor) no cuenta con cable de energía.', '', 'JACKIE BETSY ANGELES ALTAMIRANO', 'Dirección de Monitoreo y Gestión Sanitaria', 'Estrategia Sanitaria de Prevención y Control de Tuberculosis', 'Equipo Tecnico', '948655730', 'Fap', '3', 0, 'JOHN ROBERT NOVOA ALVARADO', 4, 'vistas/img/productos/default/anonymous.png', '2020-04-30 13:16:30'),
(301, 1, '10256', 'tengo problemas con el internet', '', 'GRACIELA NAJARRO BELLIDO', 'recursos humanos', 'RRHH', 'secretaria', '985021212', 'Fap', '4', 0, '', 0, 'vistas/img/productos/default/anonymous.png', '2020-04-30 15:54:23'),
(302, 1, '', 'IMPRESORA DICE: SIN CONEXIÓN', '', 'BRENDA KATHERINE MENDOZA CHAFLOQUE', 'tecnica', 'DSAIA', 'ASISTENTE ADMINISTRATIVO', '983514757', 'Fap', '2', 0, '', 0, 'vistas/img/productos//124.jpg', '2020-04-30 17:28:19'),
(303, 1, '1', 'no se puede acceder al google, sale un mensaje que dice la conexión no es privada', '', 'MONICA HUAMANI PUMATANCA', 'AIS', 'NUTRICION', 'COORDINADORA', '999950185', 'Fap', '3', 0, '', 0, 'vistas/img/productos/default/anonymous.png', '2020-05-05 09:37:14'),
(304, 1, '2', 'Dificultades para utilizar el Zoom en las computadoras de la Estrategia de Nutrición', '', 'MONICA HUAMANI PUMATANCA', 'AIS', 'NUTRICION', 'COORDINADORA', '999950185', 'Fap', '3', 0, '', 0, 'vistas/img/productos/default/anonymous.png', '2020-05-12 09:57:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `oficina` text COLLATE utf8_spanish_ci NOT NULL,
  `area` text COLLATE utf8_spanish_ci NOT NULL,
  `cargo` text COLLATE utf8_spanish_ci NOT NULL,
  `cel` text COLLATE utf8_spanish_ci NOT NULL,
  `sede` text COLLATE utf8_spanish_ci NOT NULL,
  `piso` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `oficina`, `area`, `cargo`, `cel`, `sede`, `piso`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, '76244561', 'Administrador', 'ETFSOPORTE', 'SOPORTE', 'SOPORTE INFORMATICO', '917023456', 'Pinillos', '1', 'admin', '$2a$07$asxx54ahjppf45sd87a5auEWCSnPH/Xbie6O7afY7yHh2/xrAP6fO', 'Administrador', 'vistas/img/usuarios/admin/674.jpg', 1, '2020-05-14 09:46:53', '2020-05-14 14:46:53'),
(70, '76244566', 'YOSSHI SALVADOR CONDORI MENDIETA', 'TECNOLOGIA DE LA INFORMACION', 'PROGRAMACIÓN Y DESARROLLO INFORMÁTICO', 'DESARROLLADOR JUNIOR', '91702454', 'Pinillos', '2', 'ycondori', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Informatico', 'vistas/img/usuarios/ycondori/298.jpg', 1, '2020-04-30 11:42:38', '2020-04-30 16:42:38'),
(71, '76244577', 'ERNESTO ALEJANDRO LA TORRE CRUZ', 'PRUEBA', 'PRUEBA', 'PRUEBA', '917023452', 'Pinillos', '1', 'elatorre', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Usuario', 'vistas/img/usuarios/elatorre/125.png', 1, '2020-04-30 11:49:33', '2020-04-30 16:49:33'),
(73, '10634035', 'RUBEN PORFIRIO SALAS MENDOZA', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE', 'SOPORTE', '923723422', 'Pinillos', '2', 'rsalas', '$2a$07$asxx54ahjppf45sd87a5auKv9R1Tr8EhdTiX.zKyAymV3nZQpgP36', 'Informatico', '', 1, '2020-05-13 10:57:56', '2020-05-13 15:57:56'),
(74, '47685177', 'DIEGO FER CHAVEZ HINOJOSA', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE', 'SOPORTE', '917023454', 'Pinillos', '2', 'dchavez', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Informatico', '', 1, '2020-04-29 12:11:07', '2020-04-29 17:11:07'),
(76, '40463112', 'JACK PAUL LAZARO GOMEZ', 'TECNOLOGIA DE LA INFORMACION', 'JEFATURA', 'JEFE', '942820939', 'Pinillos', '2', 'jlazaro', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Administrador', '', 1, '2019-12-16 10:18:33', '2019-12-16 15:18:33'),
(77, '43800035', 'ELIZABETH MERY OCHOA CARHUAMACA', 'TECNOLOGIA DE LA INFORMACION', 'SECRETARÍA', 'SECRETARIA', '967249151', 'Pinillos', '2', 'eochoa', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Administrador', '', 1, '2020-03-10 15:37:09', '2020-03-10 20:37:09'),
(78, '10216202', 'EDDIE SALGADO LOPEZ', 'TECNOLOGIA DE LA INFORMACION', 'REDES Y TELECOMUNICACIONES', 'COORDINADOR ', '924695698', 'Pinillos', '2', 'esalgado', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Informatico', '', 1, '2020-01-03 08:47:09', '2020-01-03 13:47:09'),
(79, '41738608', 'JAVIER GERMAN RODRIGUEZ CONDORI', 'TECNOLOGIA DE LA INFORMACION', 'REDES Y TELECOMUNICACIONES', 'SOPORTE', '987245469', 'Pinillos', '2', 'jrodriguez', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Informatico', '', 1, '2020-03-05 09:04:47', '2020-03-05 14:04:47'),
(80, '09934648', 'LUIS ALBERTO GIUDICHE ESCUDERO', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE TECNICO', 'COORDINADOR', '943223735', 'Pinillos', '2', 'lgiudiche', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Administrador', '', 1, '2020-05-08 10:13:49', '2020-05-08 15:13:49'),
(81, '70132691', 'CARLOS LUIS GONZAGA ARIAS CONDE', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE', 'SOPORTE', '927055190', 'Pinillos', '2', 'carias', '$2a$07$asxx54ahjppf45sd87a5auGsSZNN5/DIFCbH8n0NJ.apBty6a1d1y', 'Informatico', 'vistas/img/usuarios/carias/287.jpg', 1, '2020-02-28 09:19:05', '2020-02-28 14:19:05'),
(82, '46563517', 'JULIO CESAR GUARDIA VILCA', 'TECNOLOGIA DE LA INFORMACION', 'SOPORTE', 'SOPORTE', '992972257', 'Pinillos', '2', 'jguardia', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Informatico', '', 1, '2020-03-02 11:28:29', '2020-03-02 16:28:29'),
(83, '09626761', 'LOURDES ROSARIO GARAY BAMBAREN', 'ETF LABORATORIO', 'LABORATORIO', 'TEC MEDICO', '964104046', 'Pinillos', '1', 'lrosario', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Usuario', '', 1, '2020-01-16 09:34:28', '2020-01-16 14:34:28'),
(84, '10629584', 'MARTHA CECILIA CHAVEZ QUISPE', 'dirección de monitoreo y gestión publica', 'Monitoreo', 'Enfermera', '999638052', 'Fap', '4', 'MELANIE', '$2a$07$asxx54ahjppf45sd87a5autQStkMS8b5kYO91hkinko/XviuO8ebe', 'Usuario', '', 1, '0000-00-00 00:00:00', '2020-01-16 04:53:36'),
(85, '06237703', 'JULIA NANCY ALVAREZ REYNA DE LOVERA', 'EF PRESTACIONES Y GESTIÓN EN SALUD', 'SECRETARIA', 'SECRETARIA', '993129998', 'Fap', '4', 'jalvarez', '$2a$07$asxx54ahjppf45sd87a5auGtADy3gp6TRPdir1lDPhq3LWYKi.qg.', 'Usuario', '', 1, '2020-03-11 09:39:58', '2020-03-11 14:39:58'),
(86, '06028893', 'MELINA ANATOLIA TIZA AYALA', 'laboratorio', 'laboratorio', 'Tecnica en Enfermeria', '990621316', 'Pinillos', '1', 'mtiza', '$2a$07$asxx54ahjppf45sd87a5au9bVOecFxBlALgEP3tcfX3iT4dXGLnpu', 'Usuario', '', 1, '0000-00-00 00:00:00', '2020-01-16 04:53:49'),
(87, '08874969', 'NANCY PANDO ROCHA', 'Dirección de Monitoreo y Gestión Sanitaria', 'ETF Seguimiento Monitoreo y Seguro', 'Secretaria', '920103191', 'Fap', '4', 'npando', '$2a$07$asxx54ahjppf45sd87a5auEOhAfjqaEWwXeEaz32O2GW5pJrnG4u2', 'Usuario', '', 1, '2020-01-20 10:56:05', '2020-01-20 15:56:05'),
(88, '21547894', 'ULIANA TENORIO PORTILLA DE PIMENTEL', 'LABORATORIO', 'OFICINA DE GESTIÓN', 'EQUIPO TÉCNICO', '996511403', 'Pinillos', '1', 'TENORIO', '$2a$07$asxx54ahjppf45sd87a5au6ktNYhn8gvsbfamGcKrJe44ZHGTx3Y2', 'Usuario', 'vistas/img/usuarios/TENORIO/421.jpg', 1, '0000-00-00 00:00:00', '2020-01-16 14:57:20'),
(89, '32124807', 'ANA YOLANDA MILLA CRISTOBAL', 'laboratorio ', 'laboratorio', 'Encargada de tuberculosis', '995818922', 'Pinillos', '1', 'amilla', '$2a$07$asxx54ahjppf45sd87a5auE1V6FJSVb1BkzWjvr2gwiTWWv2VQhLm', 'Usuario', 'vistas/img/usuarios/amilla/410.jpg', 1, '0000-00-00 00:00:00', '2020-01-16 14:57:18'),
(90, '41077739', 'KATIA ALINA NAJARRO ORIHUELA DE GOMEZ', 'LABORATORIO', 'LABORATORIO', 'ANALISTA', '998866330', 'Pinillos', '1', 'kaylin1027', '$2a$07$asxx54ahjppf45sd87a5auVaB2CBg.WsBz8jZz493dcyC21X.6Uga', 'Usuario', 'vistas/img/usuarios/kaylin1027/473.jpg', 1, '0000-00-00 00:00:00', '2020-01-16 14:57:16'),
(91, '09182543', 'NILDA ROXANNA GAMARRA PAREDES', 'laboratorio', 'laboratorio', 'biologo', '951387083', 'Pinillos', '1', 'ngamarra', '$2a$07$asxx54ahjppf45sd87a5auOtbV62pI0MTvFzma0z1U0g7f.pmYJc6', 'Usuario', 'vistas/img/usuarios/ngamarra/150.jpg', 1, '0000-00-00 00:00:00', '2020-01-16 14:57:14'),
(92, '07517287', 'MAGDALENA MOSCOL HERRERA', 'EPIDEMIOLOGIA E INTELIGENCIA SANITARIA', 'SECRETARIA', 'SECRETARIA', '999444042', 'Fap', '3', 'mmoscolh', '$2a$07$asxx54ahjppf45sd87a5aulWI/NxSFxo./fflDo0dXvMg7mmvrmFK', 'Usuario', '', 1, '2020-02-10 09:35:13', '2020-02-10 14:35:13'),
(93, '41074642', 'ROIMER TORRES SALAS', 'laboratorio', 'ROM', 'tecnico laboratorio', '982639912', 'Pinillos', '1', 'roitorres', '$2a$07$asxx54ahjppf45sd87a5auPTgZGh3ZUQTYfnL8vxLzbIGPiyUOSye', 'Usuario', 'vistas/img/usuarios/roitorres/996.jpg', 1, '0000-00-00 00:00:00', '2020-01-16 15:02:17'),
(94, '42829795', 'JESUS CRISOSTOMO ZARATE TAMARA', 'EPIDEMIOLOGÍA E INTELIGENCIA SANITARIA', 'UNIDAD DE ANÁLISIS ESPACIAL', 'ING GEOGRAFO', '997908242', 'Fap', '3', 'jzaratet', '$2a$07$asxx54ahjppf45sd87a5auTnvzNP0KgNkqOk3wI7MYJ41xdtv6.nK', 'Usuario', '', 1, '2020-01-16 10:07:24', '2020-01-16 15:07:24'),
(95, '07023375', 'ROSA LUZ VILCA BENGOA DE GARATE', 'epidemiologia e inteligencia sanitaria', 'vigilancia epidemiologica ', 'medico', '996639968', 'Fap', '3', 'RVILCAB', '$2a$07$asxx54ahjppf45sd87a5auXaARLNhKVLnPXMPgP.U6U3bPI6ooTaq', 'Usuario', '', 1, '0000-00-00 00:00:00', '2020-01-16 15:05:14'),
(96, '09291754', 'MARIA CARMENCITA ROMERO VERA', 'laboratorio', 'ROM', 'tecnica en laboratorio', '971305630', 'Pinillos', '1', 'carmencita', '$2a$07$asxx54ahjppf45sd87a5au3Bww8yjSonqioXo1DWDPS5k8VTIfN4i', 'Usuario', 'vistas/img/usuarios/carmencita/915.jpg', 1, '0000-00-00 00:00:00', '2020-01-16 15:05:15'),
(97, '07815633', 'DORIS HAYDEE SIFUENTES PEÑA', 'ETF EPIDEMIOLOGIA E INTELIGENCIA SANITARIA', 'NOTIFICACION', 'TEC ESTADISTICO', '995121363', 'Fap', '3', 'dsifuentes', '$2a$07$asxx54ahjppf45sd87a5ausZN1KCfwyBFBbV7j68q5cIzBcFRbPOW', 'Usuario', '', 1, '2020-02-12 16:12:40', '2020-02-12 21:12:40'),
(98, '09433926', 'MONICA YVONNE SALAZAR ANGULO', 'EPIDEMIOLOGIA E INTELIGENCIA SANITARIA', 'VIGILANCIA EPIDEMIOLOGICA', 'TECNOLOGO MEDICO', '961082314', 'Fap', '3', 'Msalazara', '$2a$07$asxx54ahjppf45sd87a5auddtZA5a0oerLprSdO3S8grMGzgYvjee', 'Usuario', '', 1, '0000-00-00 00:00:00', '2020-01-16 15:23:21'),
(99, '15583437', 'ITA NANCY MARCOS SACIGA', 'EPIDEMIOLOGIA E INTELIGENCIA SANITARIA', 'VIGILANCIA EPIDEMIOLOGICA', 'ENFERMERA', '982071030', 'Fap', '3', 'imarcoss', '$2a$07$asxx54ahjppf45sd87a5auRwuvzzfeT9iLe6PgxRHLjKMmuS/XGtm', 'Usuario', '', 1, '0000-00-00 00:00:00', '2020-01-16 15:23:19'),
(100, '10080700', 'ELLIE ROY CHAÑA TOLEDO', 'Epidemiologia e Inteligencia Sanitaria', 'Analisis Epidemiologico', 'Epidemiologo', '995380000', 'Fap', '3', 'erchanat', '$2a$07$asxx54ahjppf45sd87a5auGR3FeEABE6k967WX.hFd4zzHk0af8KW', 'Usuario', '', 1, '0000-00-00 00:00:00', '2020-02-03 13:47:57'),
(101, '41368801', 'MIRTHA LUCIA PALOMINO PLAZA', 'CALIDAD Y SEGURIDAD DEL PACIENTE', 'LIBRO DE RECLAMACIONES', 'EQUIPO TECNICO', '990099203', 'Fap', '4', 'mpalomino', '$2a$07$asxx54ahjppf45sd87a5au32aR2e0tpjpwopx2baJx0G2vaDxd.rC', 'Usuario', '', 1, '2020-01-20 10:33:54', '2020-01-20 15:33:54'),
(102, '46762772', 'SABRINA MILAGROS LARA DURAN', 'ETF Calidad y Seguridad del Paciente', 'Secretaria', 'Secretaria', '937262341', 'Fap', '4', 'slara', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Usuario', '', 1, '2020-02-26 12:02:56', '2020-02-26 17:02:56'),
(103, '47183552', 'IVET INES MUCHA CASTRO', 'ETF DE SEGUROS', 'SEGUROS', 'TEC ADMINISTRATIVA', '987590740', 'Fap', '4', 'IMUCHA', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Usuario', '', 1, '2020-01-22 15:34:17', '2020-01-22 20:34:17'),
(104, '43546615', 'ROCIO DEL PILAR CRESPO PERAUNA', 'Epidemiología e Inteligencia Sanitaria', 'Vigilancia Epidemiologica', 'Enfermera', '981042321', 'Fap', '3', 'rcrespoperauna', '$2a$07$asxx54ahjppf45sd87a5au2KkZIQfm5Nv8JQGkU1tzr79RtzL2kHC', 'Usuario', '', 1, '2020-04-14 15:02:10', '2020-04-14 20:02:10'),
(106, '09732261', 'MARIA DEL CARMEN TAIPE AYLAS', 'Epidemiologia e inteligencia sanitaria', 'Vigilancia Epidemiologica', 'Nutricionista', '941461074', 'Fap', '3', '12345', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Usuario', '', 1, '2020-02-18 14:39:46', '2020-02-18 19:39:46'),
(107, '43348256', 'MONICA CECILIA QUIROZ LUYO', 'Prestaciones y Gestión Sanitaria', 'RENIPRESS', 'ENFERMERA', '986021307', 'Fap', '4', 'MONICA', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Usuario', '', 1, '0000-00-00 00:00:00', '2020-01-29 16:15:35'),
(108, '10304310', 'ELOY MAIER VALENCIA REYES', 'prestaciones', 'categorizacion', 'equipo tecnico', '976800617', 'Fap', '4', 'eloy218', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Usuario', '', 1, '0000-00-00 00:00:00', '2020-01-29 16:15:35'),
(109, '42278703', 'FRANZ ENRIQUE LLACZA MAYORCA', 'prestaciones', 'categorizacion', 'equipo de categorizacion', '992769555', 'Fap', '4', '42278703', '$2a$07$asxx54ahjppf45sd87a5auvtB0gorHHZfcimELHbK0VG8qI5i/XWm', 'Usuario', '', 1, '2020-01-29 12:21:49', '2020-02-21 17:18:53'),
(110, '07020721', 'CONSUELO ALOR ROJAS', 'EPIDEMIOLOGIA E INTELIGENCIA SANITARIA', 'PRESUPUESTO', 'TECNICO ADMINISTRATIVO', '945632166', 'Fap', '3', 'calor', '$2a$07$asxx54ahjppf45sd87a5au/3z76DoEJ8QSdFefN2aIW3yNnKN9kVG', 'Usuario', '', 1, '2020-02-18 09:47:36', '2020-02-18 14:47:36'),
(111, '09752574', 'GISSELA JACQUELINE NEYRA ALVAREZ', 'ETF Calidad y Seguridad del Paciente', 'Acreditacion', 'Equipo Técnico', '990739417', 'Fap', '4', 'Gneyra', '$2a$07$asxx54ahjppf45sd87a5aumF2OOksHp9sj1D8d/TtrW2FgPX.Elpm', 'Usuario', '', 1, '0000-00-00 00:00:00', '2020-04-29 15:01:40'),
(112, '06639054', 'CAROLINA YOLANDA NEIRA CANALES', 'ETF Calidad y Seguridad del Paciente', 'Mejora Continua', 'Equipo Tecnico', '999008119', 'Fap', '4', 'CNEIRA', '$2a$07$asxx54ahjppf45sd87a5aulJb4tBQ..VW2ekbTdz0aWHDDUSgs9I.', 'Usuario', '', 1, '0000-00-00 00:00:00', '2020-04-29 15:01:41'),
(113, '70255928', 'OSHIN PAMELA CANALES HUAMAN', 'ETF ESA', 'DSAIA', 'Ingeniero', '943968161', 'Fap', '2', 'pamelacanales', '$2a$07$asxx54ahjppf45sd87a5auz/15bZwKIra4aS7GVftNyHZKUnuZjFW', 'Usuario', '', 1, '2020-04-29 10:16:18', '2020-04-29 15:16:18'),
(114, '72806934', 'BRENDA KATHERINE MENDOZA CHAFLOQUE', 'tecnica', 'DSAIA', 'ASISTENTE ADMINISTRATIVO', '983514757', 'Fap', '2', 'BMENDOZA', '$2a$07$asxx54ahjppf45sd87a5auvNpo.lJPFliqc3xWoRuJo7ASM35EIHe', 'Usuario', '', 1, '2020-04-30 17:24:25', '2020-04-30 22:24:25'),
(115, '16692582', 'MARTHA ELENA COLMENARES TUME', 'ECOLOGIA Y SALUD AMBIENTAL', 'DSAIA', 'BIOLOGO', '985547938', 'Fap', '2', 'MARTHA', '$2a$07$asxx54ahjppf45sd87a5auzxbC/uMPo0W7Doa5.2QcARwgREDotmW', 'Usuario', '', 1, '2020-04-29 10:22:42', '2020-04-29 15:22:42'),
(116, '08130711', 'ELMER LEONEL CAMPOS ACASIETE', 'ETF CVZ', 'JEFATURA', 'JEFE', '995214115', 'Fap', '2', 'ecampos', '$2a$07$asxx54ahjppf45sd87a5auxXZmlxyeodzNlHAKYeUA0RFV.4mdi12', 'Usuario', '', 1, '2020-04-29 10:31:08', '2020-04-29 15:31:08'),
(117, '41682894', 'ERIKA MATILDE PEREDA VASQUEZ', 'DSAIA', 'ETF ESA', 'BIOLOGA', '948461705', 'Fap', '2', 'EPEREDA', '$2a$07$asxx54ahjppf45sd87a5au.Q0AzQFFS3nmwIL0cfoCDTDyDYraU0K', 'Usuario', '', 1, '2020-04-29 10:37:18', '2020-04-29 15:38:01'),
(118, '40273655', 'RONALD FORTUNATO INTIMAYTA SAYRITUPAC', 'AGUA PARA CONSUMO HUMANO E INOCUIDAD ALIMENTIRIA', 'DSAIA', 'BIOLOGO', '980346068', 'Fap', '2', 'RINTIMAYTA', '$2a$07$asxx54ahjppf45sd87a5auQW9Pw196B51UcZdjon/pN7IETmcIt/K', 'Usuario', '', 1, '2020-05-04 10:30:30', '2020-05-04 15:30:30'),
(119, '76376014', 'CHRISTIAN ANTONIO ORELLANA DEL CASTILLO', 'ETF', 'ETF', 'Soporte Técnico ', '946224360', 'Pinillos', '2', 'christian', '$2a$07$asxx54ahjppf45sd87a5au9p0DqboBusVPJb4qVv6M/j4JmCXLLSG', 'Informatico', '', 1, '0000-00-00 00:00:00', '2020-04-30 16:45:32'),
(120, '42566608', 'JOHN ROBERT NOVOA ALVARADO', 'ETF TI', 'REDES', 'SOPORTE INFORMATICO', '902159774', 'Pinillos', '2', 'jnovoa', '$2a$07$asxx54ahjppf45sd87a5aukT6epwjhMCG.vIDdVe8WK70dX8aLHMK', 'Informatico', 'vistas/img/usuarios/jnovoa/875.jpg', 1, '2020-05-07 10:15:33', '2020-05-07 15:15:33'),
(121, '10099720', 'RUTH ROXANA HUAYHUAS RODAS', 'ais', 'ESANS', 'equipo técnico', '983264523', 'Fap', '3', 'rhuayhuas', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Usuario', '', 1, '2020-04-30 13:04:27', '2020-04-30 18:04:27'),
(122, '40782050', 'MONICA HUAMANI PUMATANCA', 'AIS', 'NUTRICION', 'COORDINADORA', '999950185', 'Fap', '3', 'MHUAMANI', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Usuario', '', 1, '2020-05-12 09:55:57', '2020-05-12 14:55:57'),
(123, '40494670', 'JACKIE BETSY ANGELES ALTAMIRANO', 'Dirección de Monitoreo y Gestión Sanitaria', 'Estrategia Sanitaria de Prevención y Control de Tuberculosis', 'Equipo Tecnico', '948655730', 'Fap', '3', 'jangeles', '$2a$07$asxx54ahjppf45sd87a5auo2CWJqjD89eUeWMXOP3tQybSjyJ8eYW', 'Usuario', '', 1, '2020-04-30 13:13:39', '2020-04-30 18:13:39'),
(124, '40597381', 'GRACIELA NAJARRO BELLIDO', 'recursos humanos', 'RRHH', 'secretaria', '985021212', 'Fap', '4', 'gnajarro', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Usuario', '', 1, '2020-04-30 15:52:45', '2020-04-30 20:52:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(17, 10001, 3, 1, '[{\"id\":\"1\",\"descripcion\":\"Aspiradora Industrial \",\"cantidad\":\"2\",\"stock\":\"13\",\"precio\":\"1200\",\"total\":\"2400\"},{\"id\":\"2\",\"descripcion\":\"Plato Flotante para Allanadora\",\"cantidad\":\"2\",\"stock\":\"7\",\"precio\":\"6300\",\"total\":\"12600\"},{\"id\":\"3\",\"descripcion\":\"Compresor de Aire para pintura\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"4200\",\"total\":\"4200\"}]', 3648, 19200, 22848, 'Efectivo', '2017-12-24 01:11:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `soporte`
--
ALTER TABLE `soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
