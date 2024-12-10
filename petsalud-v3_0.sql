-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2024 a las 10:21:25
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
  `ID_ANIMAL` int(11) NOT NULL AUTO_INCREMENT,
  `CODIGO_ANIMAL` int(11) NOT NULL,
  `ID_TIPO_ANIMAL` int(11) NOT NULL,
  `ID_RAZA_ANIMAL` int(11) NOT NULL,
  `ID_ROL_ANIMAL` int(11) NOT NULL,
  `NOMBRE_ANIMAL` varchar(100) NOT NULL,
  `ESTADO_ANIMAL` tinyint(1) NOT NULL,
  `ESTADO_CASTRACION` int(11) NOT NULL,
  PRIMARY KEY (`ID_ANIMAL`),
  UNIQUE KEY `ANIMAL_PK` (`ID_ANIMAL`),
  UNIQUE KEY `CODIGO_ANIMAL` (`CODIGO_ANIMAL`),
  KEY `RELATION_77_FK` (`ID_TIPO_ANIMAL`),
  KEY `RELATION_78_FK` (`ID_RAZA_ANIMAL`),
  KEY `RELATION_79_FK` (`ID_ROL_ANIMAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`ID_ANIMAL`, `CODIGO_ANIMAL`, `ID_TIPO_ANIMAL`, `ID_RAZA_ANIMAL`, `ID_ROL_ANIMAL`, `NOMBRE_ANIMAL`, `ESTADO_ANIMAL`, `ESTADO_CASTRACION`) VALUES
(15, 0, 1, 1, 1, 'pepe', 1, 0),
(16, 1, 1, 1, 1, 'rufo', 0, 0),
(17, 2, 1, 1, 1, 'rufito', 1, 0),
(18, 3, 1, 3, 1, 'panky', 1, 0),
(19, 549, 1, 3, 1, 'panky luisss', 1, 0),
(20, 550, 1, 3, 2, 'carloncho bb', 1, 0),
(21, 12345, 1, 2, 1, 'pepe', 0, 0),
(22, 551, 2, 4, 1, 'otto ottito', 1, 0),
(23, 552, 3, 7, 6, 'loco', 1, 1),
(25, 12346, 2, 5, 7, 'chino', 1, 0),
(26, 12347, 2, 4, 7, 'chinito', 1, 0),
(27, 12348, 2, 4, 7, 'chinoo', 0, 0),
(28, 12349, 2, 4, 7, 'chinooo', 0, 0),
(29, 12350, 2, 4, 7, 'chinoooo', 0, 0),
(30, 12351, 2, 4, 8, 'chinooooo', 0, 0),
(31, 12352, 2, 4, 7, 'chinitoo', 0, 0),
(32, 12353, 2, 4, 8, 'chinitooo', 0, 0),
(33, 12354, 2, 4, 7, 'chinitoooo', 0, 0),
(34, 12355, 2, 5, 8, 'chinitooooo', 1, 0),
(35, 12357, 3, 7, 6, 'rene', 1, 0),
(36, 12358, 2, 4, 7, 'renee', 1, 0),
(37, 12359, 2, 4, 7, 'reneee', 1, 0),
(38, 12360, 2, 4, 8, 'reneeee', 0, 0),
(39, 12361, 1, 1, 1, 'pio', 1, 0),
(40, 548, 2, 4, 7, 'sofi', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_municipal`
--

CREATE TABLE IF NOT EXISTS `area_municipal` (
  `ID_AREA_MUNICIPAL` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_AREA_MUNICIPAL` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_AREA_MUNICIPAL`),
  UNIQUE KEY `AREA_MUNICIPAL_PK` (`ID_AREA_MUNICIPAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `area_municipal`
--

INSERT INTO `area_municipal` (`ID_AREA_MUNICIPAL`, `DESCRIPCION_AREA_MUNICIPAL`) VALUES
(1, 'cuidado animal'),
(2, 'mesa de entrada'),
(3, 'Contaduria'),
(4, 'Administracion'),
(5, 'Salud'),
(6, 'Sistemas'),
(7, 'Area de Medio Ambiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campana`
--

CREATE TABLE IF NOT EXISTS `campana` (
  `ID_CAMPANA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_DE_CAMPANA` int(11) NOT NULL,
  `ID_TRABAJADOR_MUNICIPAL` int(11) NOT NULL,
  `DESCRIPCION_CAMPANA` varchar(300) NOT NULL,
  `FECHA_DE_CREACION` date NOT NULL,
  `FECHA_DE_INICIO` date NOT NULL,
  `FECHA_DE_FIN` date NOT NULL,
  `ESTADO_CAMPANA` tinyint(1) NOT NULL,
  `ID_ESPECIE` int(11) NOT NULL,
  `ID_VETERINARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_CAMPANA`),
  UNIQUE KEY `CAMPANA_PK` (`ID_CAMPANA`),
  KEY `RELATION_154_FK` (`ID_TIPO_DE_CAMPANA`),
  KEY `RELATION_155_FK` (`ID_TRABAJADOR_MUNICIPAL`),
  KEY `FK_Campana_Especie` (`ID_ESPECIE`),
  KEY `FK_Campana_Veterinario` (`ID_VETERINARIO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `campana`
--

INSERT INTO `campana` (`ID_CAMPANA`, `ID_TIPO_DE_CAMPANA`, `ID_TRABAJADOR_MUNICIPAL`, `DESCRIPCION_CAMPANA`, `FECHA_DE_CREACION`, `FECHA_DE_INICIO`, `FECHA_DE_FIN`, `ESTADO_CAMPANA`, `ID_ESPECIE`, `ID_VETERINARIO`) VALUES
(14, 2, 3, 'castracion gatos', '2024-12-06', '2024-12-09', '2024-12-11', 1, 2, 6),
(15, 1, 3, 'Vacunacion perros', '2024-12-06', '2024-12-10', '2024-12-11', 1, 1, 1),
(16, 1, 3, 'Vacunacion perros 2', '2024-12-07', '2024-12-13', '2024-12-15', 0, 1, 6),
(17, 1, 3, 'pipip', '2024-12-08', '2025-01-01', '2025-01-02', 1, 1, 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ID_CIUDAD`, `ID_PROVINCIA`, `NOMBRE_CIUDAD`) VALUES
(1, 1, 'arroyo secooooo'),
(2, 2, 'cruz del eje'),
(4, 3, 'bahia blanca'),
(5, 4, 'bahia blanca'),
(6, 9, 'san miguel'),
(7, 9, 'san miguel'),
(8, 9, 'san miguel'),
(9, 9, 'san miguel'),
(10, 9, 'san miguel'),
(11, 9, 'san miguel'),
(12, 9, 'san miguel'),
(13, 22, 'usuahia'),
(14, 22, 'usuahia'),
(15, 19, 'arroyo seco'),
(16, 1, 'rosario'),
(17, 16, 'san miguel'),
(18, 1, 'arroyo secooooo'),
(19, 1, ''),
(20, 1, 'arroyo mojado'),
(21, 1, 'arroyo mojado'),
(22, 1, 'arroyo mojado'),
(23, 1, 'arroyo mojado'),
(24, 1, 'arroyo mojado'),
(25, 17, 'cuatro arroyos'),
(26, 1, 'arroyo seco'),
(27, 1, 'arroyo seco'),
(28, 1, 'arroyo seco'),
(29, 21, 'la banda'),
(30, 1, 'rosario'),
(31, 15, 'san martin'),
(32, 17, 'ARROYO SECO'),
(33, 11, ''),
(34, 1, 'villa constitucion'),
(35, 1, 'villa constitucion'),
(36, 19, 'mercedes'),
(37, 1, 'villa constitucion'),
(38, 1, 'villa constitucion'),
(39, 1, 'aaa'),
(40, 2, 'rio tercero'),
(41, 1, 'rosario'),
(42, 1, 'rosario'),
(43, 18, 'tulim'),
(44, 19, ''),
(45, 19, 'san luis');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `datos_de_contacto`
--

INSERT INTO `datos_de_contacto` (`ID_DATOS_DE_CONTACTO`, `TELEFONO`, `CORREO_ELECTRONICO`, `RED_SOCIAL`) VALUES
(1, '3402521506', 'adrian@gmail.com', 'KILI'),
(2, '03549 15589004', 'gerardo@gmail.com', NULL),
(3, '1114447778', 'dario@gmail.com', ''),
(4, '1114447778', 'dario@gmail.com', ''),
(5, '1114447778', 'dario@gmail.com', ''),
(6, '1114447778', 'dario@gmail.com', ''),
(7, '1114447778', 'dario@gmail.com', ''),
(8, '1114447778', 'enzo@gmail.com', ''),
(9, '1114447778', 'enzo@gmail.com', ''),
(10, '1234567890', 'enzo@gmail.com', ''),
(11, '1234567891', 'gra@gmail.com', '-'),
(12, '1234567894', 'pepe@gmail.com', '-'),
(13, '1234567891', 'luther@gmail.com', '-'),
(14, '1234567892', 'facu@gmail.com', ''),
(15, '1234567892', 'facu@gmail.com', ''),
(16, '1234567892', 'facu@gmail.com', ''),
(17, '1234567892', 'facundo@gmail.com', ''),
(18, '1234567892', 'fa@gmail.com', ''),
(19, '1234567892', 'fac@gmail.com', ''),
(20, '1234567899', 'josee@gmail.com', ''),
(21, '1234567890', 'abel@gmail.com', 'abel'),
(22, '1234567890', 'maria@gmail.com', ''),
(23, '1234567890', 'pedro@gmail.com', '-'),
(24, '1234567890', 'grace@gmail.com', ''),
(25, '1234567890', 'gracielab@gmail.com', ''),
(26, '1234567890', 'federico@gmail.com', ''),
(27, '1234567890', 'pepe2@gmail.com', ''),
(28, '1234567890', 'pepe2@gmail.com', ''),
(29, '0000000000', 'elina@gmail.com', ''),
(30, '12345678901', 'martin@gmail.com', ''),
(31, '12345678901', 'martin@gmail.com', ''),
(32, '12345678912', 'claudio@gmail.com', ''),
(33, '01234567890', 'aa@gmail.com', ''),
(34, '01234567890', 'bb@gmail.com', ''),
(35, '01234567890', 'cc@gmail.com', ''),
(36, '01234567890', 'dd@gmail.com', ''),
(37, '1234567890', 'fran@gmail.com', ''),
(38, '1234567890', 'medy@gmail.com', ''),
(39, '0123456789', 'medi@gmail.com', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`ID_DIRECCION`, `ID_CIUDAD`, `NOMBRE_CALLE`, `NUMERO`, `BIS`) VALUES
(1, 1, 'antartida argentina 10', 1456, 0),
(2, 2, 'antartida argentina', 999, 1),
(3, 5, '', 4156, 1),
(4, 6, 'belgrano 23', 4156, 1),
(5, 7, 'belgrano 23', 4156, 1),
(6, 8, 'belgrano 23', 4156, 1),
(7, 9, 'belgrano 23', 4156, 1),
(8, 10, 'belgrano 23', 4156, 1),
(9, 11, 'belgrano 23', 4156, 1),
(10, 12, 'belgrano 23', 4156, 1),
(11, 13, 'san martin', 123, 0),
(12, 14, 'san martin', 123, 0),
(13, 15, 'san martin', 234, 1),
(14, 16, 'independencia', 888, 1),
(15, 17, 'san martin', 703333, 0),
(16, 18, 'antartida argentinaaaa', 123, 0),
(17, 19, '', 1234, 0),
(18, 20, 'islas malvinas', 1234, 0),
(19, 21, 'islas malvinas', 1234, 0),
(20, 22, 'islas malvinas', 1234, 0),
(21, 23, 'islas malvinas', 1234, 0),
(22, 24, 'islas malvinasSSS', 1234, 1),
(23, 25, 'mitreeee', 454545, 0),
(24, 26, 'san martin', 123, 0),
(25, 27, 'san martin', 123, 0),
(26, 28, 'san martin', 123, 0),
(27, 29, 'antartida argentina', 123, 0),
(28, 30, 'antartida argentina', 123, 0),
(29, 31, 'islas malvinas', 456, 0),
(30, 32, 'san martin', 123, 0),
(31, 33, 'belgrano', 123, 0),
(32, 35, 'independencia', 123, 1),
(33, 36, 'independencia', 789, 0),
(34, 37, 'independencia', 789, 0),
(35, 38, 'independencia', 456, 0),
(36, 39, 'antartida argentina', 123, 0),
(37, 40, 'antartida argentina', 78, 0),
(38, 41, 'antartida argentina', 456, 0),
(39, 42, 'antartida argentina', 789, 1),
(40, 43, 'antartida argentina', 123, 1),
(41, 44, 'san martin', 123, 1),
(42, 45, 'belgrano 23', 123, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dueno_animal`
--

CREATE TABLE IF NOT EXISTS `dueno_animal` (
  `ID_DUENO_ANIMAL` int(11) NOT NULL AUTO_INCREMENT,
  `ESTADO_DUENO_ANIMAL` tinyint(1) NOT NULL,
  `DNI` int(11) NOT NULL,
  PRIMARY KEY (`ID_DUENO_ANIMAL`),
  UNIQUE KEY `DUENO_ANIMAL_PK` (`ID_DUENO_ANIMAL`),
  KEY `RELATION_81_FK` (`DNI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `dueno_animal`
--

INSERT INTO `dueno_animal` (`ID_DUENO_ANIMAL`, `ESTADO_DUENO_ANIMAL`, `DNI`) VALUES
(1, 0, 11112222),
(2, 0, 11118888),
(3, 1, 11119999),
(4, 1, 11111116);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE IF NOT EXISTS `enfermedades` (
  `ID_ENFERMEDAD` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ENFERMEDAD` varchar(255) NOT NULL,
  `DESCRIPCION_ENFERMEDAD` text,
  `ID_ESPECIE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ENFERMEDAD`),
  KEY `ID_ESPECIE` (`ID_ESPECIE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`ID_ENFERMEDAD`, `NOMBRE_ENFERMEDAD`, `DESCRIPCION_ENFERMEDAD`, `ID_ESPECIE`) VALUES
(1, 'Parvovirus canino', NULL, 1),
(2, 'Moquillo', NULL, 1),
(3, 'Rabia', NULL, 1),
(4, 'Leptospirosis', NULL, 1),
(5, 'Dermatitis por pulgas', NULL, 1),
(6, 'Rabia', NULL, 2),
(7, 'Gripe felina', NULL, 2),
(8, 'Leucemia felina', NULL, 2),
(9, 'Peritonitis infecciosa felina (PIF)', NULL, 2),
(10, 'Lombrices intestinales', NULL, 2),
(11, 'Colicos', NULL, 3),
(12, 'Anemia infecciosa equina', NULL, 3),
(13, 'Gripe equina', NULL, 3),
(14, 'Tetanos', NULL, 3),
(15, 'Laminitis (infosura)', NULL, 3),
(16, 'vacunacion', NULL, 1),
(17, 'vacunacion', NULL, 2),
(18, 'vacunacion', NULL, 3),
(19, 'castracion', NULL, 1),
(20, 'castracion', NULL, 2),
(21, 'castracion', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE IF NOT EXISTS `especialidad` (
  `ID_ESPECIALIDAD` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_ESPECIALIDAD` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_ESPECIALIDAD`),
  UNIQUE KEY `ESPECIALIDAD_PK` (`ID_ESPECIALIDAD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`ID_ESPECIALIDAD`, `DESCRIPCION_ESPECIALIDAD`) VALUES
(1, 'Clinica General'),
(2, 'Cirugia'),
(3, 'Anestesiologia'),
(4, 'Diagnostico por Imagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie_animal`
--

CREATE TABLE IF NOT EXISTS `especie_animal` (
  `ID_TIPO_ANIMAL` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_TIPO_ANIMAL` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_TIPO_ANIMAL`),
  UNIQUE KEY `ESPECIE_ANIMAL_PK` (`ID_TIPO_ANIMAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `especie_animal`
--

INSERT INTO `especie_animal` (`ID_TIPO_ANIMAL`, `DESCRIPCION_TIPO_ANIMAL`) VALUES
(1, 'Perro'),
(2, 'Gato'),
(3, 'Caballo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE IF NOT EXISTS `familia` (
  `ID_FAMILIA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ANIMAL` int(11) NOT NULL,
  `ID_DUENO_ANIMAL` int(11) NOT NULL,
  `DESCRPCION_FAMILIA` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_FAMILIA`),
  UNIQUE KEY `FAMILIA_PK` (`ID_FAMILIA`),
  KEY `RELATION_87_FK` (`ID_ANIMAL`),
  KEY `RELATION_88_FK` (`ID_DUENO_ANIMAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`ID_FAMILIA`, `ID_ANIMAL`, `ID_DUENO_ANIMAL`, `DESCRPCION_FAMILIA`) VALUES
(9, 15, 3, ''),
(10, 16, 3, ''),
(11, 17, 2, ''),
(12, 18, 3, 'era el perrito de mi infancia'),
(13, 19, 3, '-hola panky\r\n-espero que estes bien!'),
(14, 20, 3, ''),
(15, 21, 3, ''),
(16, 22, 2, '-el gato de elina'),
(17, 23, 1, ''),
(18, 25, 3, ''),
(19, 26, 3, ''),
(20, 27, 3, ''),
(21, 28, 3, ''),
(22, 29, 3, ''),
(23, 30, 3, ''),
(24, 31, 3, ''),
(25, 32, 3, ''),
(26, 33, 3, ''),
(27, 34, 3, ''),
(28, 35, 3, ''),
(29, 36, 3, ''),
(30, 37, 3, ''),
(31, 38, 3, ''),
(32, 39, 3, ''),
(33, 40, 1, 'La gata era de la calle. Vive con elina. no se sabe si esta vacunada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_medico`
--

CREATE TABLE IF NOT EXISTS `historial_medico` (
  `ID_HISTORIAL_MEDICO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ANIMAL` int(11) NOT NULL,
  `FECHA_HISTORIAL` date NOT NULL,
  `DESCRIPCION_HISTORIAL` varchar(1000) NOT NULL,
  `ID_VETERINARIO` int(11) NOT NULL,
  `ID_ENFERMEDAD` int(11) NOT NULL,
  `ID_VACUNA` int(11) DEFAULT NULL,
  `ID_VACUNA_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_HISTORIAL_MEDICO`),
  UNIQUE KEY `HISTORIAL_MEDICO_PK` (`ID_HISTORIAL_MEDICO`),
  KEY `RELATION_95_FK` (`ID_ANIMAL`),
  KEY `RELATION_174_FK` (`ID_VETERINARIO`),
  KEY `fk_enfermedad` (`ID_ENFERMEDAD`),
  KEY `FK_VacunaHistorial` (`ID_VACUNA`),
  KEY `FK_Vacuna2Historial` (`ID_VACUNA_2`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `historial_medico`
--

INSERT INTO `historial_medico` (`ID_HISTORIAL_MEDICO`, `ID_ANIMAL`, `FECHA_HISTORIAL`, `DESCRIPCION_HISTORIAL`, `ID_VETERINARIO`, `ID_ENFERMEDAD`, `ID_VACUNA`, `ID_VACUNA_2`) VALUES
(1, 23, '2024-11-29', 'no se medica por tratarse de colicos leves.', 6, 11, NULL, NULL),
(2, 19, '2024-11-30', 'se aplico crema y se le dio una pastilla para eliminar las pulgas.', 6, 5, NULL, NULL),
(3, 23, '2024-12-01', 'se aplico vacuna anti tetanos', 6, 14, NULL, NULL),
(10, 31, '2024-12-01', '', 1, 1, 3, NULL),
(11, 32, '2024-12-01', '', 1, 1, NULL, 3),
(17, 38, '2024-12-02', '', 1, 1, 8, 8),
(18, 39, '2024-12-02', '', 1, 1, 1, 2),
(19, 19, '2024-12-02', 'se medico con antimoquillo', 6, 2, NULL, NULL),
(20, 22, '2024-12-02', 'se le receto pastilla antiparasitaria', 6, 10, NULL, NULL),
(21, 22, '2024-12-02', 'refuerzo anual', 6, 16, 3, NULL),
(22, 22, '2024-12-02', 'refuerzo anual', 6, 17, 3, NULL),
(23, 19, '2024-12-02', 'otra vez crema', 6, 5, NULL, NULL),
(24, 19, '2024-12-02', 'refuerzo anual', 6, 16, 2, NULL),
(25, 40, '2024-12-02', '', 1, 1, 8, 8),
(28, 23, '2024-12-02', '', 5, 18, 9, NULL),
(29, 23, '2024-12-02', '', 5, 18, 9, NULL),
(30, 23, '2024-12-02', '', 5, 21, 9, NULL),
(31, 23, '2024-12-02', '', 5, 21, 9, NULL),
(32, 23, '2024-12-02', '', 5, 21, 9, NULL),
(33, 23, '2024-12-02', '', 5, 21, 9, NULL),
(34, 23, '2024-12-02', '', 5, 21, 9, NULL);

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
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE IF NOT EXISTS `nacionalidad` (
  `ID_NACIONALIDAD` int(11) NOT NULL AUTO_INCREMENT,
  `PAIS` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_NACIONALIDAD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`ID_NACIONALIDAD`, `PAIS`) VALUES
(1, 'Argentina'),
(2, 'Bolivia'),
(3, 'Brasil'),
(4, 'Chile'),
(5, 'Colombia'),
(6, 'Costa Rica'),
(7, 'Cuba'),
(8, 'Ecuador'),
(9, 'El Salvador'),
(10, 'Guatemala'),
(11, 'Honduras'),
(12, 'Mexico'),
(13, 'Nicaragua'),
(14, 'Panama'),
(15, 'Paraguay'),
(16, 'Peru'),
(17, 'Republica Dominicana'),
(18, 'Uruguay'),
(19, 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE IF NOT EXISTS `niveles` (
  `ID_NIVEL` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_NIVEL` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_NIVEL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`ID_NIVEL`, `DESCRIPCION_NIVEL`) VALUES
(1, 'Super usuario'),
(2, 'Trabajador Municipal'),
(3, 'Veterinario'),
(4, 'Responsable del animal'),
(5, 'Profesional'),
(6, 'Refugio de animales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `FECHA_DE_NACIMIENTO` date NOT NULL,
  `ID_NACIONALIDAD` int(11) DEFAULT NULL,
  `NACIONALIDAD` varchar(100) NOT NULL,
  `INFORMACION_PERSONAL` varchar(100) DEFAULT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `APELLIDO` varchar(50) NOT NULL,
  `SEXO` int(11) DEFAULT NULL,
  `DNI` int(11) NOT NULL,
  `ID_DIRECCION` int(11) NOT NULL,
  `ESTADO_PERSONA` tinyint(1) NOT NULL,
  `ID_DATOS_DE_CONTACTO` int(11) NOT NULL,
  `CONTRASENA` int(11) NOT NULL,
  `ID_NIVEL` int(11) NOT NULL,
  PRIMARY KEY (`DNI`),
  UNIQUE KEY `PERSONA_PK` (`DNI`),
  KEY `RELATION_40_FK` (`ID_DIRECCION`),
  KEY `RELATION_51_FK` (`ID_DATOS_DE_CONTACTO`),
  KEY `ID_DATOS_DE_CONTACTO` (`ID_DATOS_DE_CONTACTO`),
  KEY `ID_DATOS_DE_CONTACTO_2` (`ID_DATOS_DE_CONTACTO`),
  KEY `ID_NIVEL` (`ID_NIVEL`),
  KEY `SEXO` (`SEXO`),
  KEY `SEXO_2` (`SEXO`),
  KEY `SEXO_4` (`SEXO`),
  KEY `fk_nacionalidad_persona` (`ID_NACIONALIDAD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`FECHA_DE_NACIMIENTO`, `ID_NACIONALIDAD`, `NACIONALIDAD`, `INFORMACION_PERSONAL`, `NOMBRE`, `APELLIDO`, `SEXO`, `DNI`, `ID_DIRECCION`, `ESTADO_PERSONA`, `ID_DATOS_DE_CONTACTO`, `CONTRASENA`, `ID_NIVEL`) VALUES
('2024-09-04', 1, 'Argentina', '', 'grace', 'boujan', 1, 0, 27, 1, 24, 123456, 3),
('2024-08-26', 1, 'Argentina', 'graciela', 'grece', 'boujan', 1, 10101010, 28, 1, 25, 123456, 3),
('2024-07-22', 1, 'Argentina', 'hijo de wiliams', 'facundo', 'rabiti', 3, 11111111, 17, 1, 14, 123456, 3),
('2024-07-22', 1, 'Argentina', 'hijo de wiliams', 'facundo', 'rabiti', 3, 11111112, 19, 1, 16, 123456, 3),
('2024-07-22', 1, 'Argentina', 'hijo de wiliamsss', 'facundoo', 'rabitii', 3, 11111113, 20, 1, 17, 123456, 3),
('2024-07-22', 1, 'Argentina', 'hijaaa de wiliamsss', 'ss', 'rabitii', 3, 11111114, 22, 1, 19, 123456, 3),
('2022-12-18', 18, 'Uruguay', 'hermano de paooooooo', 'jose primero', 'giorsettiiiiii', 3, 11111115, 23, 1, 20, 123456, 3),
('1990-01-01', NULL, '1', '', 'franco', 'colapinto', 3, 11111116, 40, 1, 37, 123456, 4),
('1980-02-02', NULL, '8', '', 'edgar', 'medina', 3, 11111117, 41, 1, 38, 123456, 2),
('1986-08-17', 1, 'Argentina', 'hola soy maria', 'maria', 'muni', 1, 11111118, 25, 1, 22, 123456, 2),
('1980-02-01', NULL, '6', '', 'sebastian', 'medina', 3, 11111119, 42, 1, 39, 123456, 2),
('2006-09-26', 1, 'Argentina', 'adgrfasdgf', 'pepe', 'pepito', 3, 11111155, 31, 1, 28, 123456, 2),
('1960-01-01', NULL, 'Argentina', '', 'elina', 'lagorio', 1, 11112222, 32, 1, 29, 123456, 4),
('1985-01-01', NULL, 'Argentina', '', 'martin', 'bojanich', 3, 11113333, 33, 1, 30, 123456, 4),
('1900-01-01', NULL, 'Argentina', '', 'aa', 'ss', 3, 11116666, 36, 1, 33, 123456, 4),
('1900-01-01', NULL, 'Peru', '', 'bb', 'vv', 3, 11117777, 37, 1, 34, 123456, 4),
('1900-01-01', NULL, 'Argentina', '', 'ccc', 'xx', 1, 11118888, 38, 1, 35, 123456, 4),
('2000-01-01', NULL, 'Peru', '', 'dd', 'ff', 1, 11119999, 39, 1, 36, 123456, 4),
('2024-08-26', 1, 'Argentina', 'fede', 'federico', 'paez', 3, 12121212, 29, 1, 26, 123456, 3),
('2023-10-02', 1, 'Argentina', 'hijo de abel', 'abel', 'muni', 3, 12345679, 24, 1, 21, 123456, 2),
('1986-08-30', 1, 'Argentina', 'hola soy adrian luis', 'adrian', 'quilici', 3, 32331830, 1, 1, 1, 111222, 1),
('2024-08-08', 1, 'Argentina', 'hola dari', 'dario', 'cartaman', 3, 33333333, 9, 1, 6, 123456, 2),
('1990-11-01', 1, 'Argentina', NULL, 'gerardo', 'corica', NULL, 36123456, 2, 1, 2, 456789, 4),
('2024-07-21', 1, 'Argentina', 'hola enzo', 'enzo', 'romero', 3, 44444444, 11, 1, 8, 123456, 2),
('2024-07-21', 1, 'Argentina', 'hola enzo', 'enzo', 'romero', 2, 44444445, 13, 1, 10, 123456, 2),
('2024-07-30', 1, 'Argentina', 'hola gra', 'graciela', 'bojanich', 1, 55555555, 14, 0, 11, 123456, 2),
('2024-07-21', 3, 'Brasil', 'asdfasdf', 'pepe', 'muleiro', 3, 66666666, 15, 1, 12, 123456, 2),
('2024-07-27', 1, 'Argentina', 'lutherrrrr', 'luther', 'quilici', 3, 77777777, 16, 1, 13, 123456, 2),
('1976-08-17', 1, 'Argentina', 'pedrooooo', 'pedro', 'municipal', 3, 88888888, 26, 1, 23, 123456, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`ID_PROVINCIA`, `NOMBRE_PROVINCIA`) VALUES
(1, 'Santa fe'),
(2, 'Cordoba'),
(3, 'Buenos Aires'),
(4, 'Catamarca'),
(5, 'Chaco'),
(6, 'Chubut'),
(7, 'Corrientes'),
(8, 'Entre Rios'),
(9, 'Formosa'),
(10, 'Jujuy'),
(11, 'La Pampa'),
(12, 'La Rioja'),
(13, 'Mendoza'),
(14, 'Misiones'),
(15, 'Neuquen'),
(16, 'Rio Negro'),
(17, 'Salta'),
(18, 'San Juan'),
(19, 'San Luis'),
(20, 'Santa Cruz'),
(21, 'Santiago del Estero'),
(22, 'Tierra del Fuego'),
(23, 'Tucuman');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza_animal`
--

CREATE TABLE IF NOT EXISTS `raza_animal` (
  `ID_RAZA_ANIMAL` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_RAZA_ANIMAL` varchar(300) NOT NULL,
  `ID_TIPO_ANIMAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_RAZA_ANIMAL`),
  UNIQUE KEY `RAZA_ANIMAL_PK` (`ID_RAZA_ANIMAL`),
  KEY `FK_RazaEspecie` (`ID_TIPO_ANIMAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `raza_animal`
--

INSERT INTO `raza_animal` (`ID_RAZA_ANIMAL`, `DESCRIPCION_RAZA_ANIMAL`, `ID_TIPO_ANIMAL`) VALUES
(1, 'Labrador Retriever', 1),
(2, 'Bulldog Frances', 1),
(3, 'Mestizo', 1),
(4, 'Siames', 2),
(5, 'Persa', 2),
(6, 'Pura Sangre Ingles', 3),
(7, 'Arabe', 3),
(8, 'Criollo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_animal`
--

CREATE TABLE IF NOT EXISTS `rol_animal` (
  `ID_ROL_ANIMAL` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_ROL_ANIMAL` varchar(300) NOT NULL,
  `ID_TIPO_ANIMAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ROL_ANIMAL`),
  UNIQUE KEY `ROL_ANIMAL_PK` (`ID_ROL_ANIMAL`),
  KEY `FK_RolEspecie` (`ID_TIPO_ANIMAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `rol_animal`
--

INSERT INTO `rol_animal` (`ID_ROL_ANIMAL`, `DESCRIPCION_ROL_ANIMAL`, `ID_TIPO_ANIMAL`) VALUES
(1, 'Mascota', 1),
(2, 'Lazarillo', 1),
(3, 'Rescatista', 1),
(4, 'Terapia', 3),
(5, 'Traccion', 3),
(6, 'Carreras', 3),
(7, 'gato mascota', 2),
(8, 'gato terapia', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_municipal`
--

CREATE TABLE IF NOT EXISTS `rol_municipal` (
  `ID_ROL_MUNICIPAL` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_ROL_MUNICIPAL` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_ROL_MUNICIPAL`),
  UNIQUE KEY `ROL_MUNICIPAL_PK` (`ID_ROL_MUNICIPAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `rol_municipal`
--

INSERT INTO `rol_municipal` (`ID_ROL_MUNICIPAL`, `DESCRIPCION_ROL_MUNICIPAL`) VALUES
(1, 'Jefe de area'),
(2, 'Auditor interno'),
(3, 'Administrador/a'),
(4, 'Supervisor/a'),
(5, 'Operador/a'),
(6, 'Auxiliar');

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
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `ID_SEXO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_SEXO` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_SEXO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`ID_SEXO`, `DESCRIPCION_SEXO`) VALUES
(1, 'Femenino'),
(2, 'Otro'),
(3, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_campana`
--

CREATE TABLE IF NOT EXISTS `tipo_de_campana` (
  `ID_TIPO_DE_CAMPANA` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION_TIPO_CAMPANA` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_TIPO_DE_CAMPANA`),
  UNIQUE KEY `TIPO_DE_CAMPANA_PK` (`ID_TIPO_DE_CAMPANA`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_de_campana`
--

INSERT INTO `tipo_de_campana` (`ID_TIPO_DE_CAMPANA`, `DESCRIPCION_TIPO_CAMPANA`) VALUES
(1, 'Vacunacion'),
(2, 'Castracion');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `trabajador_municipal`
--

INSERT INTO `trabajador_municipal` (`ID_TRABAJADOR_MUNICIPAL`, `ID_ROL_MUNICIPAL`, `ID_AREA_MUNICIPAL`, `ESTADO_TRABAJADOR_MUNICIPAL`, `DNI`) VALUES
(3, 2, 3, 0, 32331830),
(5, 4, 6, 1, 55555555),
(6, 3, 4, 0, 66666666),
(7, 5, 6, 0, 77777777),
(8, 1, 1, 1, 12345679),
(9, 1, 1, 1, 11111118),
(10, 3, 2, 1, 88888888),
(11, 6, 7, 1, 11111155),
(12, 1, 6, 1, 11111117),
(13, 6, 7, 1, 11111119);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE IF NOT EXISTS `turnos` (
  `ID_TURNO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CAMPANA_TURNO` int(11) NOT NULL,
  `FECHA_TURNO` date NOT NULL,
  `HORA_INICIO_TURNO` time NOT NULL,
  `HORA_FIN_TURNO` time NOT NULL,
  `ESTADO_TURNO` tinyint(11) NOT NULL,
  PRIMARY KEY (`ID_TURNO`),
  KEY `FK_Turnos_Campana` (`ID_CAMPANA_TURNO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`ID_TURNO`, `ID_CAMPANA_TURNO`, `FECHA_TURNO`, `HORA_INICIO_TURNO`, `HORA_FIN_TURNO`, `ESTADO_TURNO`) VALUES
(45, 14, '2024-12-09', '10:00:00', '12:00:00', 0),
(46, 14, '2024-12-09', '12:30:00', '14:30:00', 0),
(47, 14, '2024-12-10', '10:00:00', '12:00:00', 1),
(48, 14, '2024-12-10', '12:30:00', '14:30:00', 0),
(49, 14, '2024-12-11', '10:00:00', '12:00:00', 0),
(50, 14, '2024-12-11', '12:30:00', '14:30:00', 0),
(51, 15, '2024-12-10', '09:00:00', '09:10:00', 1),
(52, 15, '2024-12-10', '09:15:00', '09:25:00', 0),
(53, 15, '2024-12-10', '09:30:00', '09:40:00', 0),
(54, 15, '2024-12-10', '09:45:00', '09:55:00', 0),
(55, 15, '2024-12-10', '10:00:00', '10:10:00', 1),
(56, 15, '2024-12-10', '10:15:00', '10:25:00', 0),
(57, 15, '2024-12-11', '09:00:00', '09:10:00', 0),
(58, 15, '2024-12-11', '09:15:00', '09:25:00', 0),
(59, 15, '2024-12-11', '09:30:00', '09:40:00', 0),
(60, 15, '2024-12-11', '09:45:00', '09:55:00', 0),
(61, 15, '2024-12-11', '10:00:00', '10:10:00', 1),
(62, 15, '2024-12-11', '10:15:00', '10:25:00', 0),
(63, 16, '2024-12-13', '09:00:00', '09:15:00', 0),
(64, 16, '2024-12-13', '09:20:00', '09:35:00', 0),
(65, 16, '2024-12-13', '09:40:00', '09:55:00', 0),
(66, 16, '2024-12-13', '10:00:00', '10:15:00', 0),
(67, 16, '2024-12-14', '09:00:00', '09:15:00', 0),
(68, 16, '2024-12-14', '09:20:00', '09:35:00', 0),
(69, 16, '2024-12-14', '09:40:00', '09:55:00', 0),
(70, 16, '2024-12-14', '10:00:00', '10:15:00', 0),
(71, 16, '2024-12-15', '09:00:00', '09:15:00', 0),
(72, 16, '2024-12-15', '09:20:00', '09:35:00', 0),
(73, 16, '2024-12-15', '09:40:00', '09:55:00', 0),
(74, 16, '2024-12-15', '10:00:00', '10:15:00', 0),
(75, 17, '2025-01-01', '10:00:00', '10:10:00', 0),
(76, 17, '2025-01-01', '10:15:00', '10:25:00', 0),
(77, 17, '2025-01-02', '10:00:00', '10:10:00', 0),
(78, 17, '2025-01-02', '10:15:00', '10:25:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos_reservados`
--

CREATE TABLE IF NOT EXISTS `turnos_reservados` (
  `ID_TURNO_RESERVADO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TURNO` int(11) NOT NULL,
  `ID_ANIMAL` int(11) NOT NULL,
  `ID_DUENO_ANIMAL` int(11) NOT NULL,
  `ID_CAMPANA` int(11) NOT NULL,
  `ESTADO_TURNO_RESERVADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_TURNO_RESERVADO`),
  KEY `FK_TURNO` (`ID_TURNO`),
  KEY `FK_ANIMAL` (`ID_ANIMAL`),
  KEY `FK_DUENO_ANIMAL` (`ID_DUENO_ANIMAL`),
  KEY `FK_CAMPANA` (`ID_CAMPANA`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `turnos_reservados`
--

INSERT INTO `turnos_reservados` (`ID_TURNO_RESERVADO`, `ID_TURNO`, `ID_ANIMAL`, `ID_DUENO_ANIMAL`, `ID_CAMPANA`, `ESTADO_TURNO_RESERVADO`) VALUES
(5, 51, 549, 3, 15, 1),
(6, 55, 550, 3, 15, 1),
(7, 61, 2, 2, 15, 1),
(9, 47, 548, 1, 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE IF NOT EXISTS `vacunas` (
  `ID_VACUNA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_VACUNA` varchar(50) NOT NULL,
  `ID_ESPECIE` int(11) NOT NULL,
  PRIMARY KEY (`ID_VACUNA`),
  KEY `FK_VacunaEspecie` (`ID_ESPECIE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`ID_VACUNA`, `NOMBRE_VACUNA`, `ID_ESPECIE`) VALUES
(1, 'Antirrabica', 1),
(2, 'Polivalente', 1),
(3, 'Antirrabica', 2),
(4, 'Triple Felina', 2),
(5, 'Antirrabica', 3),
(6, 'Tetanos', 3),
(7, 'sin vacuna', 1),
(8, 'sin vacuna', 2),
(9, 'sin vacuna', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE IF NOT EXISTS `veterinario` (
  `ID_VETERINARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ESPECIALIDAD` int(11) NOT NULL,
  `ESTADO_VETERINARIO` tinyint(1) NOT NULL,
  `DNI` int(11) NOT NULL,
  `MATRICULA` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_VETERINARIO`),
  UNIQUE KEY `VETERINARIO_PK` (`ID_VETERINARIO`),
  KEY `RELATION_118_FK` (`DNI`),
  KEY `RELATION_119_FK` (`ID_ESPECIALIDAD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`ID_VETERINARIO`, `ID_ESPECIALIDAD`, `ESTADO_VETERINARIO`, `DNI`, `MATRICULA`) VALUES
(1, 1, 1, 11111113, '123'),
(2, 2, 0, 11111114, '123'),
(3, 3, 0, 11111115, '456789'),
(4, 1, 1, 0, '789'),
(5, 1, 0, 10101010, '789'),
(6, 1, 1, 12121212, '6546');

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
  ADD CONSTRAINT `FK_Campana_Veterinario` FOREIGN KEY (`ID_VETERINARIO`) REFERENCES `veterinario` (`ID_VETERINARIO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campana_ibfk_1` FOREIGN KEY (`ID_TIPO_DE_CAMPANA`) REFERENCES `tipo_de_campana` (`ID_TIPO_DE_CAMPANA`),
  ADD CONSTRAINT `campana_ibfk_2` FOREIGN KEY (`ID_TRABAJADOR_MUNICIPAL`) REFERENCES `trabajador_municipal` (`ID_TRABAJADOR_MUNICIPAL`),
  ADD CONSTRAINT `FK_Campana_Especie` FOREIGN KEY (`ID_ESPECIE`) REFERENCES `especie_animal` (`ID_TIPO_ANIMAL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Campana_TipoCampana` FOREIGN KEY (`ID_TIPO_DE_CAMPANA`) REFERENCES `tipo_de_campana` (`ID_TIPO_DE_CAMPANA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Campana_TrabajadorMunicipal` FOREIGN KEY (`ID_TRABAJADOR_MUNICIPAL`) REFERENCES `trabajador_municipal` (`ID_TRABAJADOR_MUNICIPAL`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD CONSTRAINT `enfermedades_ibfk_1` FOREIGN KEY (`ID_ESPECIE`) REFERENCES `especie_animal` (`ID_TIPO_ANIMAL`);

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
  ADD CONSTRAINT `fk_enfermedad` FOREIGN KEY (`ID_ENFERMEDAD`) REFERENCES `enfermedades` (`ID_ENFERMEDAD`),
  ADD CONSTRAINT `FK_Vacuna2Historial` FOREIGN KEY (`ID_VACUNA_2`) REFERENCES `vacunas` (`ID_VACUNA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_VacunaHistorial` FOREIGN KEY (`ID_VACUNA`) REFERENCES `vacunas` (`ID_VACUNA`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_nacionalidad_persona` FOREIGN KEY (`ID_NACIONALIDAD`) REFERENCES `nacionalidad` (`ID_NACIONALIDAD`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`ID_DIRECCION`) REFERENCES `direccion` (`ID_DIRECCION`),
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`ID_DATOS_DE_CONTACTO`) REFERENCES `datos_de_contacto` (`ID_DATOS_DE_CONTACTO`),
  ADD CONSTRAINT `persona_ibfk_3` FOREIGN KEY (`ID_NIVEL`) REFERENCES `niveles` (`ID_NIVEL`) ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_ibfk_4` FOREIGN KEY (`SEXO`) REFERENCES `sexo` (`ID_SEXO`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `profesional_ibfk_1` FOREIGN KEY (`ID_RUBRO_PROFESIONAL`) REFERENCES `rubro_profesional` (`ID_RUBRO_PROFESIONAL`),
  ADD CONSTRAINT `profesional_ibfk_2` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`);

--
-- Filtros para la tabla `raza_animal`
--
ALTER TABLE `raza_animal`
  ADD CONSTRAINT `FK_RazaEspecie` FOREIGN KEY (`ID_TIPO_ANIMAL`) REFERENCES `especie_animal` (`ID_TIPO_ANIMAL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_animal`
--
ALTER TABLE `rol_animal`
  ADD CONSTRAINT `FK_RolEspecie` FOREIGN KEY (`ID_TIPO_ANIMAL`) REFERENCES `especie_animal` (`ID_TIPO_ANIMAL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajador_municipal`
--
ALTER TABLE `trabajador_municipal`
  ADD CONSTRAINT `trabajador_municipal_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`),
  ADD CONSTRAINT `trabajador_municipal_ibfk_2` FOREIGN KEY (`ID_ROL_MUNICIPAL`) REFERENCES `rol_municipal` (`ID_ROL_MUNICIPAL`),
  ADD CONSTRAINT `trabajador_municipal_ibfk_3` FOREIGN KEY (`ID_AREA_MUNICIPAL`) REFERENCES `area_municipal` (`ID_AREA_MUNICIPAL`);

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `FK_Turnos_Campana` FOREIGN KEY (`ID_CAMPANA_TURNO`) REFERENCES `campana` (`ID_CAMPANA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `turnos_reservados`
--
ALTER TABLE `turnos_reservados`
  ADD CONSTRAINT `FK_CAMPANA` FOREIGN KEY (`ID_CAMPANA`) REFERENCES `campana` (`ID_CAMPANA`),
  ADD CONSTRAINT `FK_DUENO_ANIMAL` FOREIGN KEY (`ID_DUENO_ANIMAL`) REFERENCES `dueno_animal` (`ID_DUENO_ANIMAL`),
  ADD CONSTRAINT `FK_TURNO` FOREIGN KEY (`ID_TURNO`) REFERENCES `turnos` (`ID_TURNO`);

--
-- Filtros para la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD CONSTRAINT `FK_VacunaEspecie` FOREIGN KEY (`ID_ESPECIE`) REFERENCES `especie_animal` (`ID_TIPO_ANIMAL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD CONSTRAINT `veterinario_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `persona` (`DNI`),
  ADD CONSTRAINT `veterinario_ibfk_2` FOREIGN KEY (`ID_ESPECIALIDAD`) REFERENCES `especialidad` (`ID_ESPECIALIDAD`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
