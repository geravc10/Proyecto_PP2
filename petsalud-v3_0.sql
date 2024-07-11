-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2024 a las 23:28:56
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `petsalud-v3.0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE IF NOT EXISTS `animal` (
  `ID_ANIMAL` int(11) NOT NULL,
  `ID_TIPO_ANIMAL` int(11) NOT NULL,
  `ID_RAZA_ANIMAL` int(11) NOT NULL,
  `ID_ROL_ANIMAL` int(11) NOT NULL,
  `NOMBRE_ANIMAL` varchar(100) NOT NULL,
  `ESTADO_ANIMAL` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_ANIMAL`),
  UNIQUE KEY `ANIMAL_PK` (`ID_ANIMAL`),
  KEY `RELATION_77_FK` (`ID_TIPO_ANIMAL`),
  KEY `RELATION_78_FK` (`ID_RAZA_ANIMAL`),
  KEY `RELATION_79_FK` (`ID_ROL_ANIMAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_municipal`
--

CREATE TABLE IF NOT EXISTS `area_municipal` (
  `ID_AREA_MUNICIPAL` int(11) NOT NULL,
  `DESCRIPCION_AREA_MUNICIPAL` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_AREA_MUNICIPAL`),
  UNIQUE KEY `AREA_MUNICIPAL_PK` (`ID_AREA_MUNICIPAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campana`
--

CREATE TABLE IF NOT EXISTS `campana` (
  `ID_CAMPANA` int(11) NOT NULL,
  `ID_TIPO_DE_CAMPANA` int(11) NOT NULL,
  `ID_TRABAJADOR_MUNICIPAL` int(11) NOT NULL,
  `DESCRIPCION_CAMPANA` varchar(300) NOT NULL,
  `FECHA_DE_CREACION_` date NOT NULL,
  `FECHA_DE_CAMPANA` date NOT NULL,
  `ESTADO_CAMPANA` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_CAMPANA`),
  UNIQUE KEY `CAMPANA_PK` (`ID_CAMPANA`),
  KEY `RELATION_154_FK` (`ID_TIPO_DE_CAMPANA`),
  KEY `RELATION_155_FK` (`ID_TRABAJADOR_MUNICIPAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `ID_CIUDAD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROVINCIA` int(11) NOT NULL,
  `NOMBRE_CIUDAD` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_CIUDAD`),
  UNIQUE KEY `CIUDAD_PK` (`ID_CIUDAD`),
  KEY `RELATION_47_FK` (`ID_PROVINCIA`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ID_CIUDAD`, `ID_PROVINCIA`, `NOMBRE_CIUDAD`) VALUES
(1, 1, 'arroyo seco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_de_contacto`
--

CREATE TABLE IF NOT EXISTS `datos_de_contacto` (
  `ID_DATOS_DE_CONTACTO` int(11) NOT NULL AUTO_INCREMENT,
  `TELEFONO` varchar(100) NOT NULL,
  `CORREO_ELECTRONICO` varchar(100) DEFAULT NULL,
  `RED_SOCIAL` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_DATOS_DE_CONTACTO`),
  UNIQUE KEY `DATOS_DE_CONTACTO_PK` (`ID_DATOS_DE_CONTACTO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `datos_de_contacto`
--

INSERT INTO `datos_de_contacto` (`ID_DATOS_DE_CONTACTO`, `TELEFONO`, `CORREO_ELECTRONICO`, `RED_SOCIAL`) VALUES
(1, '03402 123456789', 'adrian@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
  `ID_DIRECCION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CIUDAD` int(11) NOT NULL,
  `NOMBRE_CALLE` varchar(100) NOT NULL,
  `NUMERO` int(11) NOT NULL,
  `BIS` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_DIRECCION`),
  UNIQUE KEY `DIRECCION_PK` (`ID_DIRECCION`),
  KEY `RELATION_46_FK` (`ID_CIUDAD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`ID_DIRECCION`, `ID_CIUDAD`, `NOMBRE_CALLE`, `NUMERO`, `BIS`) VALUES
(1, 1, 'antartida argentina', 703, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dueno_animal`
--

CREATE TABLE IF NOT EXISTS `dueno_animal` (
  `ID_DUENO_ANIMAL` int(11) NOT NULL,
  `ESTADO_DUENO_ANIMAL` tinyint(1) NOT NULL,
  `DNI` int(11) NOT NULL,
  PRIMARY KEY (`ID_DUENO_ANIMAL`),
  UNIQUE KEY `DUENO_ANIMAL_PK` (`ID_DUENO_ANIMAL`),
  KEY `RELATION_81_FK` (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE IF NOT EXISTS `especialidad` (
  `ID_ESPECIALIDAD` int(11) NOT NULL,
  `DESCRIPCION_ESPECIALIDAD` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_ESPECIALIDAD`),
  UNIQUE KEY `ESPECIALIDAD_PK` (`ID_ESPECIALIDAD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie_animal`
--

CREATE TABLE IF NOT EXISTS `especie_animal` (
  `ID_TIPO_ANIMAL` int(11) NOT NULL,
  `DESCRIPCION_TIPO_ANIMAL` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_TIPO_ANIMAL`),
  UNIQUE KEY `ESPECIE_ANIMAL_PK` (`ID_TIPO_ANIMAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE IF NOT EXISTS `familia` (
  `ID_FAMILIA` int(11) NOT NULL,
  `ID_ANIMAL` int(11) NOT NULL,
  `ID_DUENO_ANIMAL` int(11) NOT NULL,
  `DESCRPCION_FAMILIA` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_FAMILIA`),
  UNIQUE KEY `FAMILIA_PK` (`ID_FAMILIA`),
  KEY `RELATION_87_FK` (`ID_ANIMAL`),
  KEY `RELATION_88_FK` (`ID_DUENO_ANIMAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_medico`
--

CREATE TABLE IF NOT EXISTS `historial_medico` (
  `ID_HISTORIAL_MEDICO` int(11) NOT NULL,
  `ID_ANIMAL` int(11) NOT NULL,
  `FECHA_HISTORIAL` date NOT NULL,
  `DESCRIPCION_HISTORIAL` varchar(1000) NOT NULL,
  `ID_VETERINARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_HISTORIAL_MEDICO`),
  UNIQUE KEY `HISTORIAL_MEDICO_PK` (`ID_HISTORIAL_MEDICO`),
  KEY `RELATION_95_FK` (`ID_ANIMAL`),
  KEY `RELATION_174_FK` (`ID_VETERINARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_municipal`
--

CREATE TABLE IF NOT EXISTS `informacion_municipal` (
  `ID_INFORMACION_MUNICIPAL` int(11) NOT NULL,
  `ID_TIPO_INFORMACION` int(11) NOT NULL,
  `ID_TRABAJADOR_MUNICIPAL` int(11) NOT NULL,
  `DESCRIPCION_INFORMACION_MUNICI` varchar(2000) NOT NULL,
  `FECHA_CREACION_INFORMACION` date NOT NULL,
  `FECHA_SALIDA_INFORMACION` date NOT NULL,
  `ESTADO_INFORMACION` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_INFORMACION_MUNICIPAL`),
  UNIQUE KEY `INFORMACION_MUNICIPAL_PK` (`ID_INFORMACION_MUNICIPAL`),
  KEY `RELATION_172_FK` (`ID_TIPO_INFORMACION`),
  KEY `RELATION_173_FK` (`ID_TRABAJADOR_MUNICIPAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `FECHA_DE_NACIMIENTO` date NOT NULL,
  `NACIONALIDAD` varchar(100) NOT NULL,
  `INFORMACION_PERSONAL` varchar(100) DEFAULT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `APELLIDO` varchar(50) NOT NULL,
  `SEXO` tinyint(11) DEFAULT NULL,
  `DNI` int(11) NOT NULL,
  `ID_DIRECCION` int(11) NOT NULL,
  `ESTADO_PERSONA` tinyint(1) NOT NULL,
  `ID_DATOS_DE_CONTACTO` int(11) NOT NULL,
  `contraseña` int(11) NOT NULL,
  PRIMARY KEY (`DNI`),
  UNIQUE KEY `PERSONA_PK` (`DNI`),
  KEY `RELATION_40_FK` (`ID_DIRECCION`),
  KEY `RELATION_51_FK` (`ID_DATOS_DE_CONTACTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`FECHA_DE_NACIMIENTO`, `NACIONALIDAD`, `INFORMACION_PERSONAL`, `NOMBRE`, `APELLIDO`, `SEXO`, `DNI`, `ID_DIRECCION`, `ESTADO_PERSONA`, `ID_DATOS_DE_CONTACTO`, `contraseña`) VALUES
('1986-08-17', 'argentina', NULL, 'adrian', 'quilici', NULL, 32331830, 1, 1, 1, 123456);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE IF NOT EXISTS `profesional` (
  `ID_PROFESIONAL` int(11) NOT NULL,
  `ID_RUBRO_PROFESIONAL` int(11) NOT NULL,
  `ESTADO_PROFESIONAL` tinyint(1) NOT NULL,
  `DNI` int(11) NOT NULL,
  PRIMARY KEY (`ID_PROFESIONAL`),
  UNIQUE KEY `PROFESIONAL_PK` (`ID_PROFESIONAL`),
  KEY `RELATION_106_FK` (`ID_RUBRO_PROFESIONAL`),
  KEY `RELATION_107_FK` (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `ID_PROVINCIA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_PROVINCIA` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_PROVINCIA`),
  UNIQUE KEY `PROVINCIA_PK` (`ID_PROVINCIA`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`ID_PROVINCIA`, `NOMBRE_PROVINCIA`) VALUES
(1, 'santa fe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza_animal`
--

CREATE TABLE IF NOT EXISTS `raza_animal` (
  `ID_RAZA_ANIMAL` int(11) NOT NULL,
  `DESCRIPCION_RAZA_ANIMAL` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_RAZA_ANIMAL`),
  UNIQUE KEY `RAZA_ANIMAL_PK` (`ID_RAZA_ANIMAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_animal`
--

CREATE TABLE IF NOT EXISTS `rol_animal` (
  `ID_ROL_ANIMAL` int(11) NOT NULL,
  `DESCRIPCION_ROL_ANIMAL` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_ROL_ANIMAL`),
  UNIQUE KEY `ROL_ANIMAL_PK` (`ID_ROL_ANIMAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_municipal`
--

CREATE TABLE IF NOT EXISTS `rol_municipal` (
  `ID_ROL_MUNICIPAL` int(11) NOT NULL,
  `DESCRIPCION_ROL_MUNICIPAL` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_ROL_MUNICIPAL`),
  UNIQUE KEY `ROL_MUNICIPAL_PK` (`ID_ROL_MUNICIPAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro_profesional`
--

CREATE TABLE IF NOT EXISTS `rubro_profesional` (
  `ID_RUBRO_PROFESIONAL` int(11) NOT NULL,
  `DESCRIPCION_RUBRO_PROFESIONAL` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_RUBRO_PROFESIONAL`),
  UNIQUE KEY `RUBRO_PROFESIONAL_PK` (`ID_RUBRO_PROFESIONAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_campana`
--

CREATE TABLE IF NOT EXISTS `tipo_de_campana` (
  `ID_TIPO_DE_CAMPANA` int(11) NOT NULL,
  `DESCRIPCION_TIPO_CAMPANA` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_TIPO_DE_CAMPANA`),
  UNIQUE KEY `TIPO_DE_CAMPANA_PK` (`ID_TIPO_DE_CAMPANA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_informacion`
--

CREATE TABLE IF NOT EXISTS `tipo_de_informacion` (
  `ID_TIPO_INFORMACION` int(11) NOT NULL,
  `DESCRIPCION_TIPO_INFORMACION` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_INFORMACION`),
  UNIQUE KEY `TIPO_DE_INFORMACION_PK` (`ID_TIPO_INFORMACION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador_municipal`
--

CREATE TABLE IF NOT EXISTS `trabajador_municipal` (
  `ID_TRABAJADOR_MUNICIPAL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ROL_MUNICIPAL` int(11) NOT NULL,
  `ID_AREA_MUNICIPAL` int(11) NOT NULL,
  `ESTADO_TRABAJADOR_MUNICIPAL` tinyint(1) NOT NULL,
  `DNI` int(11) NOT NULL,
  PRIMARY KEY (`ID_TRABAJADOR_MUNICIPAL`),
  UNIQUE KEY `TRABAJADOR_MUNICIPAL_PK` (`ID_TRABAJADOR_MUNICIPAL`),
  KEY `RELATION_125_FK` (`DNI`),
  KEY `RELATION_131_FK` (`ID_ROL_MUNICIPAL`),
  KEY `RELATION_137_FK` (`ID_AREA_MUNICIPAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE IF NOT EXISTS `veterinario` (
  `ID_VETERINARIO` int(11) NOT NULL,
  `ID_ESPECIALIDAD` int(11) NOT NULL,
  `ESTADO_VETERINARIO` tinyint(1) NOT NULL,
  `DNI` int(11) NOT NULL,
  PRIMARY KEY (`ID_VETERINARIO`),
  UNIQUE KEY `VETERINARIO_PK` (`ID_VETERINARIO`),
  KEY `RELATION_118_FK` (`DNI`),
  KEY `RELATION_119_FK` (`ID_ESPECIALIDAD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`ID_TIPO_ANIMAL`) REFERENCES `especie_animal` (`ID_TIPO_ANIMAL`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`ID_RAZA_ANIMAL`) REFERENCES `raza_animal` (`ID_RAZA_ANIMAL`),
  ADD CONSTRAINT `animal_ibfk_3` FOREIGN KEY (`ID_ROL_ANIMAL`) REFERENCES `rol_animal` (`ID_ROL_ANIMAL`);

--
-- Filtros para la tabla `campana`
--
ALTER TABLE `campana`
  ADD CONSTRAINT `campana_ibfk_1` FOREIGN KEY (`ID_TIPO_DE_CAMPANA`) REFERENCES `tipo_de_campana` (`ID_TIPO_DE_CAMPANA`),
  ADD CONSTRAINT `campana_ibfk_2` FOREIGN KEY (`ID_TRABAJADOR_MUNICIPAL`) REFERENCES `trabajador_municipal` (`ID_TRABAJADOR_MUNICIPAL`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`ID_PROVINCIA`) REFERENCES `provincia` (`ID_PROVINCIA`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ciudad` (`ID_CIUDAD`);

--
-- Filtros para la tabla `dueno_animal`
--
ALTER TABLE `dueno_animal`
  ADD CONSTRAINT `dueno_animal_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`);

--
-- Filtros para la tabla `familia`
--
ALTER TABLE `familia`
  ADD CONSTRAINT `familia_ibfk_1` FOREIGN KEY (`ID_ANIMAL`) REFERENCES `animal` (`ID_ANIMAL`),
  ADD CONSTRAINT `familia_ibfk_2` FOREIGN KEY (`ID_DUENO_ANIMAL`) REFERENCES `dueno_animal` (`ID_DUENO_ANIMAL`);

--
-- Filtros para la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  ADD CONSTRAINT `historial_medico_ibfk_1` FOREIGN KEY (`ID_ANIMAL`) REFERENCES `animal` (`ID_ANIMAL`),
  ADD CONSTRAINT `historial_medico_ibfk_2` FOREIGN KEY (`ID_VETERINARIO`) REFERENCES `veterinario` (`ID_VETERINARIO`);

--
-- Filtros para la tabla `informacion_municipal`
--
ALTER TABLE `informacion_municipal`
  ADD CONSTRAINT `informacion_municipal_ibfk_1` FOREIGN KEY (`ID_TIPO_INFORMACION`) REFERENCES `tipo_de_informacion` (`ID_TIPO_INFORMACION`),
  ADD CONSTRAINT `informacion_municipal_ibfk_2` FOREIGN KEY (`ID_TRABAJADOR_MUNICIPAL`) REFERENCES `trabajador_municipal` (`ID_TRABAJADOR_MUNICIPAL`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`ID_DIRECCION`) REFERENCES `direccion` (`ID_DIRECCION`),
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`ID_DATOS_DE_CONTACTO`) REFERENCES `datos_de_contacto` (`ID_DATOS_DE_CONTACTO`);

--
-- Filtros para la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `profesional_ibfk_1` FOREIGN KEY (`ID_RUBRO_PROFESIONAL`) REFERENCES `rubro_profesional` (`ID_RUBRO_PROFESIONAL`),
  ADD CONSTRAINT `profesional_ibfk_2` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`);

--
-- Filtros para la tabla `trabajador_municipal`
--
ALTER TABLE `trabajador_municipal`
  ADD CONSTRAINT `trabajador_municipal_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`),
  ADD CONSTRAINT `trabajador_municipal_ibfk_2` FOREIGN KEY (`ID_ROL_MUNICIPAL`) REFERENCES `rol_municipal` (`ID_ROL_MUNICIPAL`),
  ADD CONSTRAINT `trabajador_municipal_ibfk_3` FOREIGN KEY (`ID_AREA_MUNICIPAL`) REFERENCES `area_municipal` (`ID_AREA_MUNICIPAL`);

--
-- Filtros para la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD CONSTRAINT `veterinario_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`),
  ADD CONSTRAINT `veterinario_ibfk_2` FOREIGN KEY (`ID_ESPECIALIDAD`) REFERENCES `especialidad` (`ID_ESPECIALIDAD`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
