-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 17 2023 г., 23:54
-- Версия сервера: 5.6.31
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `transformer`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `accuracy` float NOT NULL,
  `copper` varchar(3) NOT NULL,
  `voltage` int(11) NOT NULL,
  `first_current` int(11) NOT NULL,
  `second_connect` varchar(50) NOT NULL,
  `second_power` int(11) NOT NULL,
  `second_current` int(11) NOT NULL,
  `security` varchar(5) NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL COMMENT 'название',
  `image` varchar(255) DEFAULT NULL COMMENT 'фото',
  `accuracy` float NOT NULL COMMENT 'класс точности',
  `copper` varchar(3) NOT NULL COMMENT 'медная шина',
  `voltage` int(11) NOT NULL COMMENT 'номин напряжение',
  `first_current` int(11) NOT NULL COMMENT 'номин первичный ток',
  `second_connect` varchar(50) NOT NULL COMMENT 'вторичное подключение',
  `second_power` int(11) NOT NULL COMMENT 'номин вторичная мощность',
  `second_current` int(11) NOT NULL COMMENT 'вторичный номин ток',
  `security` varchar(5) NOT NULL COMMENT 'с защитой от прикосн',
  `weight` float NOT NULL COMMENT 'вес',
  `height` float NOT NULL COMMENT 'высота'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `title`, `image`, `accuracy`, `copper`, `voltage`, `first_current`, `second_connect`, `second_power`, `second_current`, `security`, `weight`, `height`) VALUES
(1, 'Трансформатор тока ТТК-30 150/5А кл. точн. 0.5 5В.А измерительный', 'image/logo2.jpg', 0.5, 'Да', 660, 150, 'Винтовое соединение', 5, 5, 'Да', 0.5, 10),
(2, 'Трансформатор тока ТТИ-А 150/5А 5ВА класс 0,5 IEK', NULL, 0.5, 'Да', 660, 150, '	Винтовое соединение', 5, 5, 'Да', 0.7, 10.5);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL COMMENT 'логин',
  `password` varchar(100) NOT NULL COMMENT 'пароль',
  `role` int(11) NOT NULL COMMENT 'роль'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `role`) VALUES
(1, 'admin', 'admin', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
