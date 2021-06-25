-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 25 Haz 2021, 06:49:08
-- Sunucu sürümü: 8.0.21
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `amfitrion_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `addition`
--

DROP TABLE IF EXISTS `addition`;
CREATE TABLE IF NOT EXISTS `addition` (
  `addition_id` int NOT NULL,
  `restaurant_id` int NOT NULL,
  `mesa_id` int NOT NULL,
  `menu_id` int DEFAULT NULL,
  `food_id` int DEFAULT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`addition_id`),
  UNIQUE KEY `MESA_KEY` (`mesa_id`),
  UNIQUE KEY `RESTAURANT_KEY` (`restaurant_id`),
  UNIQUE KEY `MENU_KEY` (`menu_id`),
  UNIQUE KEY `FOOD_KEY` (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `reservation_id` int NOT NULL,
  `reservation_count` int NOT NULL,
  `has_reservation` tinyint(1) NOT NULL DEFAULT '0',
  `trust_value` int NOT NULL,
  PRIMARY KEY (`client_id`),
  UNIQUE KEY `USER_KEY` (`user_id`),
  UNIQUE KEY `RESERVATION_KEY` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `restaurant_id` int NOT NULL,
  `client_id` int NOT NULL,
  `response_id` int NOT NULL,
  `stars` enum('1','2','3','4','5') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `text` varchar(120) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`comment_id`),
  UNIQUE KEY `RESTAURANT_KEY` (`restaurant_id`),
  UNIQUE KEY `CLIENT_KEY` (`client_id`),
  UNIQUE KEY `RESPONSE_KEY` (`response_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contains`
--

DROP TABLE IF EXISTS `contains`;
CREATE TABLE IF NOT EXISTS `contains` (
  `contains_id` int NOT NULL AUTO_INCREMENT,
  `food_id` int NOT NULL,
  `menu_id` int NOT NULL,
  PRIMARY KEY (`contains_id`),
  UNIQUE KEY `FOOD_KEY` (`food_id`),
  UNIQUE KEY `MENU_KEY` (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `cuisine` varchar(15) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `category` enum('entrada','ensalada','racion','extra','postre') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `price` int NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `host`
--

DROP TABLE IF EXISTS `host`;
CREATE TABLE IF NOT EXISTS `host` (
  `host_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `restaurant_id` int NOT NULL,
  `restaurant_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`host_id`),
  UNIQUE KEY `USER_KEY` (`user_id`),
  UNIQUE KEY `RESTAURANT_KEY` (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int NOT NULL AUTO_INCREMENT,
  `restaurant_id` int NOT NULL,
  `name` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `price` int NOT NULL DEFAULT '0',
  `is_daily` tinyint(1) NOT NULL DEFAULT '0',
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`menu_id`),
  UNIQUE KEY `RESTAURANT_KEY` (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesa`
--

DROP TABLE IF EXISTS `mesa`;
CREATE TABLE IF NOT EXISTS `mesa` (
  `mesa_id` int NOT NULL AUTO_INCREMENT,
  `restaurant_id` int NOT NULL,
  `reservation_id` int NOT NULL,
  `capacity` int NOT NULL,
  PRIMARY KEY (`mesa_id`),
  UNIQUE KEY `RESTAURANT_KEY` (`restaurant_id`),
  UNIQUE KEY `RESERVATION_KEY` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int NOT NULL AUTO_INCREMENT,
  `restaurant_id` int NOT NULL,
  `client_id` int NOT NULL,
  `date` datetime NOT NULL,
  `person_count` int NOT NULL DEFAULT '1',
  `note` varchar(120) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `has_participated` tinyint(1) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  UNIQUE KEY `RESTAURANT_KEY` (`restaurant_id`),
  UNIQUE KEY `CLIENT_KEY` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `response`
--

DROP TABLE IF EXISTS `response`;
CREATE TABLE IF NOT EXISTS `response` (
  `response_id` int NOT NULL AUTO_INCREMENT,
  `restaurant_id` int NOT NULL,
  `text` varchar(120) COLLATE utf8_turkish_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`response_id`),
  UNIQUE KEY `RESTAURANT_KEY` (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `restaurant_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(140) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `total_client` int NOT NULL,
  `average_stars` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_id` int NOT NULL AUTO_INCREMENT,
  `restaurant_id` int NOT NULL,
  `day` set('monday','tuesday','wednesday','thursday','friday','saturday','sunday') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  PRIMARY KEY (`schedule_id`),
  UNIQUE KEY `RESTAURANT_KEY` (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone_number` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `register_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
