-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-04-2021 a las 05:32:01
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mibase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `ci` int(11) NOT NULL,
  `sigla` varchar(8) NOT NULL,
  `nota1` int(11) NOT NULL,
  `nota2` int(11) NOT NULL,
  `nota3` int(11) NOT NULL,
  `notafinal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`ci`, `sigla`, `nota1`, `nota2`, `nota3`, `notafinal`) VALUES
(111, 'INF-111', 20, 10, 30, 60),
(111, 'INF-112', 25, 10, 15, 50),
(222, 'INF-111', 20, 28, 30, 78),
(222, 'INF-112', 16, 23, 30, 69),
(444, 'INF-111', 20, 10, 25, 55),
(444, 'INF-112', 18, 28, 20, 66),
(111, 'INF-113', 20, 25, 25, 70),
(222, 'INF-113', 15, 18, 20, 53),
(444, 'INF-113', 29, 30, 15, 74),
(333, 'INF-111', 15, 15, 15, 45),
(333, 'INF-112', 0, 21, 30, 51),
(333, 'INF-113', 18, 28, 18, 56),
(555, 'MAT-215', 25, 22, 30, 77),
(555, 'MAT-216', 12, 15, 39, 66),
(555, 'MAT-217', 30, 21, 10, 61),
(666, 'INF-111', 23, 17, 30, 70),
(666, 'INF-112', 11, 11, 30, 52),
(666, 'INF-113', 23, 27, 15, 65),
(777, 'EST-122', 12, 15, 20, 47),
(777, 'EST-123', 23, 30, 10, 63),
(777, 'EST-124', 15, 25, 30, 70),
(888, 'EST-122', 12, 18, 10, 50),
(888, 'EST-123', 26, 24, 10, 60),
(888, 'EST-124', 12, 16, 30, 58),
(999, 'EST-122', 22, 22, 22, 66),
(999, 'EST-123', 21, 29, 15, 65),
(999, 'EST-124', 19, 13, 20, 52),
(1000, 'MAT-215', 10, 12, 19, 41),
(1000, 'MAT-216', 15, 16, 20, 51),
(1000, 'MAT-217', 21, 30, 14, 65),
(1001, 'INF-111', 11, 24, 27, 62),
(1001, 'INF-112', 10, 11, 8, 29),
(1001, 'INF-113', 20, 17, 12, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fecha nacimiento` varchar(10) NOT NULL,
  `departamento` varchar(3) NOT NULL,
  PRIMARY KEY (`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `fecha nacimiento`, `departamento`) VALUES
(111, 'Jhenny Huanca', '17/12/92', 'LP'),
(222, 'Orlando Mamani Cruz', '12/11/89', 'LP'),
(333, 'Ximena Paredes Casas', '09/03/91', 'LP'),
(444, 'Alejandro Ruiz Chambi', '01/02/90', 'SC'),
(555, 'Juan Del Carpio', '03/09/93', 'CB'),
(666, 'Maria Cervantez Loza', '10/10/96', 'SC'),
(777, 'Juan Silvestre', '10/12/90', 'SC'),
(888, 'Carmen Nieves', '01/02/97', 'CB'),
(999, 'Rosa Salazar', '11/11/85', 'CB'),
(1000, 'Rodrigo Maldonado', '15/08/93', 'LP'),
(1001, 'Ramiro Gutierrez', '11/07/66', 'LP'),
(1002, 'Moises Silva', '10/10/75', 'LP'),
(1003, 'Eduardo Salcedo', '15/04/80', 'LP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ci` int(10) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `carrera` varchar(15) NOT NULL,
  `rol` varchar(10) NOT NULL,
  `color` varchar(15) NOT NULL,
  PRIMARY KEY (`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ci`, `usuario`, `password`, `carrera`, `rol`, `color`) VALUES
(111, 'jzht', 'jht17', 'informatica', 'estudiante', 'red'),
(222, 'omc', 'or123', 'informatica', 'estudiante', 'red'),
(333, 'xpc', 'xpc13', 'matematica', 'estudiante', ''),
(444, 'arc', 'ale234', 'informatica', 'estudiante', ''),
(555, 'jdc', 'jdc15', 'matematica', 'estudiante', ''),
(666, 'mcl', 'mar345', 'informatica', 'estudiante', 'red'),
(777, 'js', 'js17', 'estadistica', 'estudiante', 'green'),
(888, 'cn', 'cn18', 'estadistica', 'estudiante', ''),
(999, 'rs', 'rs19', 'estadistica', 'estudiante', ''),
(1000, 'rm', 'rm10', 'matematica', 'estudiante', ''),
(1001, 'rg', 'rg01', 'informatica', 'docente', ''),
(1002, 'ms', 'ms02', 'informatica', 'docente', ''),
(1003, 'es', 'es03', 'estadistica', 'docente', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
