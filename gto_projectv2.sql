-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2022 a las 00:32:23
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gto_project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_depto` varchar(90) NOT NULL,
  `encargado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre_depto`, `encargado`) VALUES
(1, 'Informatica', 2),
(2, 'Planeacion', 0),
(3, 'Eficiencia Administrativa', 0),
(4, 'Servicios Al Personal', 0),
(5, 'Control Escolar', 0),
(6, 'Secretaria', 0),
(7, 'Jefatura', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones_depto`
--

DROP TABLE IF EXISTS `funciones_depto`;
CREATE TABLE IF NOT EXISTS `funciones_depto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_depto` int(11) NOT NULL,
  `funciones_depto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_solicitante` int(11) NOT NULL,
  `id_depto` int(11) NOT NULL,
  `id_tramite` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_cierre` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estatus` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `id_solicitante`, `id_depto`, `id_tramite`, `fecha_registro`, `fecha_cierre`, `estatus`) VALUES
(1, 2, 1, 3, '2022-06-05 22:10:15', '2022-06-05 22:10:15', 'Cerrada'),
(2, 2, 1, 3, '2022-06-05 20:13:42', '2022-06-06 03:13:42', 'Cerrada'),
(3, 2, 3, 12, '2022-06-05 20:30:04', '2022-06-06 03:30:04', 'Cerrada'),
(4, 2, 4, 25, '2022-06-05 20:33:33', '2022-06-05 20:32:10', 'Cerrada'),
(5, 2, 1, 5, '2022-06-05 20:33:50', '2022-06-05 20:33:50', 'Cerrada'),
(6, 2, 4, 29, '2022-06-05 22:07:23', '0000-00-00 00:00:00', 'Abierta'),
(7, 3, 2, 13, '2022-06-05 22:24:40', '0000-00-00 00:00:00', 'Abierta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_externos`
--

DROP TABLE IF EXISTS `solicitud_externos`;
CREATE TABLE IF NOT EXISTS `solicitud_externos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_solicitante` int(11) NOT NULL,
  `id_depto` int(11) NOT NULL,
  `id_tramite` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_cierre` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estatus` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud_externos`
--

INSERT INTO `solicitud_externos` (`id`, `id_solicitante`, `id_depto`, `id_tramite`, `fecha_registro`, `fecha_cierre`, `estatus`) VALUES
(1, 2, 2, 10, '2022-06-05 22:14:02', '2022-06-05 22:14:02', 'Cerrada'),
(2, 2, 4, 30, '2022-06-05 22:15:20', '2022-06-05 22:15:20', 'Cerrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

DROP TABLE IF EXISTS `tramites`;
CREATE TABLE IF NOT EXISTS `tramites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_depto` int(11) NOT NULL,
  `tramite` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`id`, `id_depto`, `tramite`) VALUES
(1, 1, 'Mantenimiento Preventivo'),
(2, 1, 'Mantenimiento Correctivo'),
(3, 1, 'Carrera Administrativa'),
(4, 1, 'Ipac 1 y 2'),
(5, 1, 'Reclamos de Ipac'),
(6, 1, 'Correo Institucional'),
(7, 1, 'Soporte Técnico'),
(8, 1, 'Planea'),
(9, 1, 'Programa MAS'),
(10, 2, 'Mantenimiento Menor de Escuelas'),
(11, 2, 'Sistema de Inscripcion Automatizada'),
(12, 2, 'Reposicion de Mobiliario'),
(13, 2, 'Estadística 911'),
(14, 2, 'Programa Anual de Obra'),
(15, 2, 'Microplaneación'),
(16, 2, 'Programación Detallada'),
(17, 3, 'Libros'),
(18, 3, 'Entrega de Material'),
(19, 3, 'Inventarios'),
(20, 3, 'Pago a Terceros'),
(21, 3, 'Compras'),
(22, 3, 'Tiendas Escolares'),
(23, 3, 'Material de Limpieza'),
(24, 3, 'Esc. Tiempo Completo'),
(25, 3, 'Mant. Vehiculos'),
(26, 4, 'Reclamos'),
(27, 4, 'Reintegros'),
(28, 4, 'Altas Pagos'),
(29, 4, 'Movimientos Afiliatorios'),
(30, 4, 'Nómina'),
(31, 4, 'Credenciales'),
(32, 4, 'Registro Sispro'),
(33, 5, 'Altas y Bajas'),
(34, 5, 'Correcciones'),
(35, 5, 'Cambios de Escuela'),
(36, 5, 'Actualización en SCE'),
(37, 5, 'Certificados'),
(38, 5, 'Becas'),
(39, 5, 'Preinscripción'),
(40, 6, 'Recepción de Documentos'),
(41, 6, 'Información'),
(42, 6, 'Apoyo Registro de Usuarios'),
(43, 6, 'Entrega de Materiales'),
(44, 6, 'Registro de Llamadas'),
(45, 6, 'Apoyo Áreas'),
(46, 7, 'Programa Ver Bien'),
(47, 7, 'Consejo Participación Personal'),
(48, 7, 'Cruz Roja (Colecta)'),
(49, 7, 'Contratos y/o Convenios'),
(50, 7, 'Archivistica'),
(51, 7, 'Tramites Aseguradoras'),
(52, 7, 'Regularización Inmuebles'),
(53, 7, 'Teletón (Colecta)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(90) NOT NULL,
  `password` varchar(30) NOT NULL,
  `rfc` varchar(90) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `tipo_usuario` varchar(30) NOT NULL,
  `centro_trabajo` varchar(120) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `rfc`, `correo`, `tipo_usuario`, `centro_trabajo`, `imagen`, `fecha_registro`) VALUES
(2, 'Administrador', 'Admin2022', 'AAA010101AAA', 'admin@gto.com', '1', '', 'vistas/assets/img/team-2.jpg', '2022-06-03 17:50:15'),
(3, 'Usuario Interno', '', 'UIT010101XAXX', '', '2', '', '', '2022-06-02 13:05:16'),
(4, 'Usuario Externo', '', 'PAVJ960525NA9', 'julieta.victoria.vargas@gmail.com', '3', 'GDL Espacio', '', '2022-06-05 22:18:35');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_usuariosdepartamentos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_usuariosdepartamentos`;
CREATE TABLE IF NOT EXISTS `vista_usuariosdepartamentos` (
`idusuario` int(11)
,`nombre` varchar(90)
,`nombredepto` varchar(90)
,`idencargado` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_usuariosdepartamentos`
--
DROP TABLE IF EXISTS `vista_usuariosdepartamentos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_usuariosdepartamentos`  AS  select `usuarios`.`id` AS `idusuario`,`usuarios`.`nombre` AS `nombre`,`departamentos`.`nombre_depto` AS `nombredepto`,`departamentos`.`encargado` AS `idencargado` from (`usuarios` join `departamentos` on((`usuarios`.`id` = `departamentos`.`encargado`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
