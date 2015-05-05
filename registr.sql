-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 05 2015 г., 14:18
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `orders`
--

-- --------------------------------------------------------

--
-- Структура таблицы `registr`
--

CREATE TABLE IF NOT EXISTS `registr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` int(15) NOT NULL,
  `pol` varchar(3) NOT NULL,
  `right` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `registr`
--

//INSERT INTO `orders` (`id`, `Items`, `fullname`, `q`, `commit`) VALUES
//(0, 'tt@mail.ru', 'Milausha', 2345, 'W','user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
