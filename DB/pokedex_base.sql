-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.10-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para pokedex_test
CREATE DATABASE IF NOT EXISTS `pokedex` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pokedex`;

-- Volcando estructura para tabla pokedex_test.ability
CREATE TABLE IF NOT EXISTS `ability` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `generation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla pokedex_test.pokemon
CREATE TABLE IF NOT EXISTS `pokemon` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `height` int(10) NOT NULL,
  `weight` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla pokedex_test.pokemon_ability
CREATE TABLE IF NOT EXISTS `pokemon_ability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pokemon_id` int(11) NOT NULL,
  `ability_id` int(11) NOT NULL,
  `slot` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pokemon_ability_pokemon` (`pokemon_id`),
  KEY `FK_pokemon_ability_ability` (`ability_id`),
  CONSTRAINT `FK_pokemon_ability_ability` FOREIGN KEY (`ability_id`) REFERENCES `ability` (`id`),
  CONSTRAINT `FK_pokemon_ability_pokemon` FOREIGN KEY (`pokemon_id`) REFERENCES `pokemon` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1932 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla pokedex_test.pokemon_type
CREATE TABLE IF NOT EXISTS `pokemon_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pokemon_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `slot` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pokemon_id` (`pokemon_id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `pokemon_type_ibfk_1` FOREIGN KEY (`pokemon_id`) REFERENCES `pokemon` (`id`),
  CONSTRAINT `pokemon_type_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1213 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla pokedex_test.type
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
