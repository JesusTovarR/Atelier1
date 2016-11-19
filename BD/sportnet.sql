-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-11-2016 a las 01:16:58
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3
drop database sportnet;
create database sportnet;
use  sportnet;
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
-- Estructura de tabla para la tabla `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `author` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `page`
--

INSERT INTO `page` (`id`, `title`, `text`, `date`, `author`) VALUES
(1, 'Main', 'Accueil\r\n-------\r\n\r\nMiniwiki: un wiki tout mimi\r\n---------------------------\r\n\r\nIl est *mini*, il est *wiki* mon **miniwiki**\r\n\r\nMiniwiki, mais il fait le maximum !\r\n-----------------------------------\r\n\r\nJe suis un moteur de wiki crée à l''occasion du projet de programmation web par les étudiants de l''iut Charlemagne.\r\n\r\n----\r\n\r\nLiens\r\n-----\r\n\r\n* Pour apprendre la syntaxe [Markdown] (http://daringfireball.net/projects/markdown)\r\n* Ce lien pointe vers le site de l''[iut](http://iut-charlemagne.univ-lorraine.fr)\r\n\r\n\r\n\r\n', '2012-12-06', 1),
(2, 'Rock', 'Le rock est un genre musical apparu il y a longtemps (mais pas trop non plus) aux états unis\r\n\r\n## Les genres de Rock\r\n\r\nLe rock se décompose en de très nombreuses branches qu''il est impossible d''énumérer.\r\n\r\nMais si on essayait quand même, on pourrait citer\r\n\r\n* le [[Rock]] \r\n* le [[Punk-Rock]]\r\n* le [[Rock Musette]]\r\n* le [[Rock Crevette]]\r\n* les autres types de rock\r\n\r\n#Les fameux groupes de rock\r\n\r\nParmi les groupes de rock, on dénombre\r\n\r\n# Les Rolling Stones\r\n# Stray Cats\r\n# Deep Purple\r\n\r\nA noter que Justin Bibier et Britney Spears ne sont pas les meilleurs représentants de ce genre musical.\r\n\r\n## L''avenir du rock\r\n\r\nOn attend toujours l''inventeur du Rock numérique.\r\n\r\n## citation\r\n\r\n> Le rock c''est comme un parapluie qui laisserait passer l''eau (Mary Poppins)\r\n', '2012-12-06', 1),
(3, 'Punk-Rock', '## Descriptif\r\n\r\nLe punk rock est un mouvement issu du Rock où le batteur a l''autorisation de jouer très fort pour couvrir le son des autres instruments.\r\n\r\n## Lien\r\n\r\n[wikipedia](http://fr.wikipedia.org/wiki/Punk_rock)\r\n\r\n\r\n## Citation\r\n\r\n> J''ai toujours eu du mal avec le punk (Mozart)\r\n', '2012-12-06', 1),
(4, 'Rock Musette', '## Descriptif\r\n\r\nLe rock musette permet de se balancer au son de l''accordéon électrique.\r\n\r\n', '2015-10-12', 2),
(5, 'Rock Crevette', '## Le Rock Crevette\r\n\r\nCe n''est pas pour les marins d''eau douce !!! \r\n\r\n## Citation\r\n\r\n> Le rock crevette c''est de la musique Palourde (Flipper le Dauphin)\r\n', '2012-12-06', 2),
(8, 'Les meilleures blagues droles', '* un programme javelot, tu le lances, il plante.\r\n\r\n* pour l''examen d''HTML, je balise\r\n\r\n* j''ai pris une nouvelle résolution pour noel : 800*600\r\n\r\n* ah, ca y est, c''est tombé en marche.\r\n\r\n----\r\n\r\nDans un réfrigirateur, 10 oeufs sont alignés dans le bac à oeufs.\r\nLe 1er dit au 2ème:" tu ne trouves pas qu''il a une drôle de tête le dernier oeuf?"\r\nLe 2ème répond :"bah oui!, tu as raison !!!"\r\nLe 2ème oeuf se retourne sur le 3ème et lui dit........ ainsi de suite jusquau 9ème oeuf, qui se retourne vers le 10ème oeuf et lui dit : "C''est vraie que pour un oeuf t''as une drôle de tête."\r\nLe 10ème se retourne vers son voisin et lui répond "Imbécile moi je suis in kiwi" ', '2012-12-06', 3),
(9, 'Mi pagina', 'hola2', '2016-11-17', 4),
(11, 'Hola', 'Ma premier page créée déjà modifié', '2016-11-17', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `mail` varchar(20) DEFAULT NULL,
  `n_dossard` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

--
-- Volcado de datos para la tabla `tblevent`
--

INSERT INTO `tblevent` (`id`, `name`, `description`, `place`, `dicipline`, `start_date`, `end_date`, `status`, `inscription`, `id_organiser`) VALUES
(1, 'Event', 'Le plus joli\r\n\r\nawjbdklfkbjskjfbk.sb cmnx cnxc ksbc\r\njasbf,msb,f,kjhbsdakfjhbsdkjfhbklasdhfblkd', 'Nancy', 'Individuel', '2016-11-01', '2016-11-04', 0, 0, 1),
(2, 'Event2', 'lkahdjhasdjkfbjkasdbvjknadvn\r\nasdfjnskadbvkbvlasd\r\nsjdvnkjsdbvjbvkln', 'Nancy2', 'otra', '2016-11-02', '2016-11-19', 0, 0, 1),
(3, 'Teleton', 'jabskbdasbckasjbc', 'Nancy', '10 km', '2016-01-25', '2016-01-29', 0, 0, 1),
(4, 'Marathon', 'ksjfhksdbfkbdkjbcksbdc', 'Marseille', 'VTT', '2017-03-02', '2017-03-10', 0, 0, 5),
(5, 'Caminar', 'jgvsdjfvjkahsdvbjkcdvasdkvfc', 'Paris', 'Marcher', '2017-03-02', '2017-03-10', 0, 0, 5),
(6, 'My event', 'VENEZ', 'Nancy', 'Natation', '2016-02-26', '2016-02-29', 1, 1, 6),
(8, 'My event2', 'Allez y!', 'Paris', 'VTT', '2017-03-02', '2017-03-10', 1, 0, 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `trial`
--

INSERT INTO `trial` (`id`, `name`, `description`, `price`, `date_trial`, `id_event`) VALUES
(1, '0', 'LJWBDKJB', 5, '2016-01-01', 1),
(2, '0', 'SALKFNJL', 5, '2016-01-01', 6),
(3, 'KSEF', 'sndfdb', 10, '2016-01-01', 7),
(4, 'My trial', 'bonjour', 5, '2016-01-01', 6),
(5, 'Marathon', 'haskhd', 3, '2016-01-01', 8);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(128) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `level` int(11) NOT NULL COMMENT '-100:NONE; 100:USER; 500:ADMIN',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `level`) VALUES
(1, 'john', '$2y$10$st3OSGl37z4XM5jIRNWD4ORqeiv65LNv6J2cbMKsKXawwFofZ2zGa', 100),
(2, 'tom', '$2y$10$.2dix/dSHVQt32zIaxVYguy.3D2Iki.0as9fX7dgH1splrhfzHPAa', 100),
(3, 'mike', '$2y$10$NqACSfKhW0UZFcGtSy5t.uvs6Hj3EurQ0UpFlxqdR0m6uhDHP8nHa', 500),
(4, 'Jose', '1234', 100),
(5, 'Jesus', '1234', 100);

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
