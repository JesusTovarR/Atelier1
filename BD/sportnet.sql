-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-11-2016 a las 08:51:10
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sportnet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organiser`
--

CREATE TABLE IF NOT EXISTS `organiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `naissance` date DEFAULT NULL,
  `mail` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `organiser`
--

INSERT INTO `organiser` (`id`, `firstname`, `name`, `naissance`, `mail`, `password`) VALUES
(1, 'Tovar', 'Jesus', NULL, 'jesus@gmail.com', 'holahola'),
(2, 'Tovar', 'Jesus', NULL, 'jesus@2gmail.com', 'holahola'),
(3, 'Rocha', 'Jesus', NULL, 'rocha@gmail.com', '1234'),
(4, 'Rocha', 'Jesus', NULL, 'rocha@gmail.com', '1234'),
(5, 'Mendez', 'Daniel', NULL, 'mendez@gmail.com', '1234'),
(6, 'Tovar', 'Jesus', '1995-02-18', 'j@gmail.com', '1234'),
(7, NULL, NULL, NULL, NULL, NULL),
(8, 'Tovar', 'Jesus', '1990-02-02', 'yo@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `mail` varchar(20) DEFAULT NULL,
  `naissance` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblevent`
--

CREATE TABLE IF NOT EXISTS `tblevent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `place` varchar(20) DEFAULT NULL,
  `dicipline` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `inscription` int(1) NOT NULL,
  `id_organiser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trial`
--

CREATE TABLE IF NOT EXISTS `trial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `date_trial` date DEFAULT NULL,
  `id_event` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trial_participants`
--

CREATE TABLE IF NOT EXISTS `trial_participants` (
  `id_p` int(11) NOT NULL,
  `id_t` int(11) NOT NULL,
  PRIMARY KEY (`id_p`,`id_t`),
  KEY `id_t` (`id_t`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trial_participants`
--
ALTER TABLE `trial_participants`
  ADD CONSTRAINT `trial_participants_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `participants` (`id`),
  ADD CONSTRAINT `trial_participants_ibfk_2` FOREIGN KEY (`id_t`) REFERENCES `trial` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
