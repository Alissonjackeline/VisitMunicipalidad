-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-11-2022 a las 05:28:25
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `idarea` int(11) NOT NULL AUTO_INCREMENT,
  `nomarea` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `condicion` tinyint(4) NOT NULL,
  PRIMARY KEY (`idarea`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `nomarea`, `condicion`) VALUES
(1, 'GERENCIA DE ADMINISTRACION', 1),
(2, 'GERENCIA DE CATASTRO', 1),
(3, 'PROCURADORIA MUNICIPAL', 1),
(4, 'SUB GERENCIA DE CONTABILIDAD', 1),
(5, 'GERENCIA DE PLANEAMIENTO Y PRESUPUESTO', 1),
(6, 'SUB GERENCIA DE PROGRAMACION E INVERSIONES', 1),
(7, 'OFICINA COMITÉ DE SEGURIDAD Y SALUD EN EL TRABAJO', 1),
(8, 'GERENCIA', 1),
(9, 'GERENCIA MUNICIPAL', 1),
(10, 'GERENCIA DE ASESORIA LEGAL', 1),
(11, 'GERENCIA DE DESARROLLO URBANO', 1),
(12, 'SUB GERENCIA DE FORMULACION DE PROYECTOS', 1),
(13, 'SUB GERENCIA GENERAL DE INFRAESTRUCTURA Y ORNATO P', 1),
(14, 'SUB GERENCIA DE RECURSOS HUMANOS', 1),
(15, 'TRAMITE DOCUMENTARIO', 1),
(16, 'GERENCIA DE RENTAS', 1),
(17, 'CODISEC', 1),
(18, 'SUB GERENCIA DE FISCALIZACION Y COMERCIALIZACION', 1),
(19, 'SECRETARIA GENERAL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `idfuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `nomfuncionario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `condicion` tinyint(4) NOT NULL,
  `idarea` int(11) DEFAULT NULL,
  PRIMARY KEY (`idfuncionario`),
  KEY `idarea` (`idarea`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `nomfuncionario`, `cargo`, `condicion`, `idarea`) VALUES
(1, 'juanito', 'secretario', 1, 2),
(2, 'alis', 'secretario', 0, 11),
(3, 'juanita1', 'secretario', 1, 6),
(4, 'juanita2', 'secretario', 1, 9),
(5, 'brayan', 'administrador', 1, 4),
(6, 'Brayan', 'administrador', 1, 6),
(7, 'bernye', 'administrador', 1, 6),
(8, 'Liliana', 'secretario', 1, 9),
(9, 'Julissa', 'secretaria', 1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE IF NOT EXISTS `permiso` (
  `idpermiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Escritorio'),
(2, 'Visitas'),
(3, 'Oficinas'),
(4, 'Acceso'),
(5, 'Configuracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `num_documento` varchar(20) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `num_documento`, `telefono`, `email`, `cargo`, `login`, `clave`, `condicion`) VALUES
(1, 'Astrid Jazmin Orozco Silva', '72154871', '547821', 'admin@gmail.com', 'Administrador', 'admin', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 1),
(2, 'juan', '30115425', '054789521', 'juan@hotmail.com', 'Administrador', 'juan', '65e929fec596ec36c4283491f1b5ff18b059526d369f23d912ec38e819184126', 1),
(3, 'Alisson orozco', '72497345', '2654665', 'izabeth_4@hotmail.com', 'Administrador', 'admin2', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 0),
(4, 'daniel Gonzales', '78942346', '9495565', 'daniel@gmail.com', 'Administrador', 'daniel', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 1),
(5, 'betsua sarvia rondoy', '72497633', '972134895', 'betsua@gmail.com', 'Vigilante', 'betsua', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 1),
(6, 'liliana silva', '75894277', '975461378', 'izabeth_4@hotmail.com', 'Vigilante', 'liliana06', 'ed92e4c7e54e3f4a29d8041ec93124bd3c1ec4825701cac42b3fffaf0bd7120a', 1),
(7, 'Liliana Elizabeth Silva Galan', '75489617', '987213485', 'astrid12@gmail.com', 'Vigilante', 'astrid11', '692dadb5c2fa51de6721cfad0438efc75f6aeaea293d1ed1077d2bebacaf362b', 1),
(8, 'Daniel Correa', '78467899', '987213456', 'danielcorea@gmail.com', 'Vigilante', 'daniel18', '692dadb5c2fa51de6721cfad0438efc75f6aeaea293d1ed1077d2bebacaf362b', 1),
(10, 'daniel123', '72489655', '98754619', 'daniel123@gmail.com', 'Administrador', 'daniel123', 'ed92e4c7e54e3f4a29d8041ec93124bd3c1ec4825701cac42b3fffaf0bd7120a', 1),
(11, 'juan valencia', '72487599', '9875467852', 'juanv@gmail.com', 'Administrador', 'juanv', 'ed92e4c7e54e3f4a29d8041ec93124bd3c1ec4825701cac42b3fffaf0bd7120a', 1),
(12, 'melina12', '78467922', '986742157', 'melina@gmail.com', 'Vigilante', 'melina', 'ed92e4c7e54e3f4a29d8041ec93124bd3c1ec4825701cac42b3fffaf0bd7120a', 1),
(13, 'Juan manuel montejo', '75493157', '98754624', 'juanmontejo@gmail.com', 'Supervisor', 'manuel', 'fd6262c9439abc2c5859dbd20b5b3afec25aeb246320605183971f6749907e58', 1),
(14, 'pruebanom', '549656656', '5263252653', 'prueba1@gmail.com', 'Vigilante', 'prueba1', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 1),
(15, 'Maria Castillo Jimenez', '78451378', '98754612', 'maria@gmail.com', 'Vigilante', 'maria', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

DROP TABLE IF EXISTS `usuario_permiso`;
CREATE TABLE IF NOT EXISTS `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL,
  PRIMARY KEY (`idusuario_permiso`),
  KEY `fk_u_permiso_usuario_idx` (`idusuario`),
  KEY `fk_usuario_permiso_idx` (`idpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(99, 3, 1),
(100, 3, 2),
(101, 3, 3),
(102, 3, 4),
(103, 3, 5),
(109, 4, 1),
(110, 4, 2),
(111, 4, 3),
(112, 4, 4),
(113, 4, 5),
(188, 14, 1),
(189, 13, 1),
(190, 13, 2),
(191, 13, 3),
(195, 7, 1),
(196, 7, 2),
(197, 7, 5),
(201, 10, 1),
(202, 10, 2),
(203, 10, 3),
(204, 10, 4),
(205, 10, 5),
(206, 8, 1),
(207, 8, 2),
(208, 8, 5),
(209, 2, 1),
(210, 2, 2),
(211, 2, 3),
(212, 2, 4),
(213, 2, 5),
(214, 11, 1),
(215, 11, 2),
(216, 6, 1),
(217, 6, 2),
(218, 6, 5),
(219, 12, 1),
(220, 12, 2),
(231, 1, 1),
(232, 1, 2),
(233, 1, 3),
(234, 1, 4),
(235, 1, 5),
(239, 15, 1),
(240, 15, 2),
(241, 15, 5),
(242, 5, 1),
(243, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

DROP TABLE IF EXISTS `visita`;
CREATE TABLE IF NOT EXISTS `visita` (
  `idvisita` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `visitante` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `motivo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idarea` int(11) DEFAULT NULL,
  PRIMARY KEY (`idvisita`),
  KEY `idusuario` (`idusuario`),
  KEY `idarea` (`idarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`idarea`) REFERENCES `area` (`idarea`);

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_u_permiso_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `visita_ibfk_5` FOREIGN KEY (`idarea`) REFERENCES `area` (`idarea`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
