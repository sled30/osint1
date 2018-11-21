-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Ноя 10 2018 г., 22:40
-- Версия сервера: 10.1.26-MariaDB-0+deb9u1
-- Версия PHP: 7.0.30-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `osint`
--

-- --------------------------------------------------------

--
-- Структура таблицы `avito_avto`
--

CREATE TABLE `avito_avto` (
  `id` int(11) NOT NULL COMMENT 'id',
  `id_avto` int(20) NOT NULL,
  `mileage` varchar(25) NOT NULL COMMENT '"Пробег"',
  `color` varchar(20) NOT NULL COMMENT '"цвет"',
  `status` varchar(20) NOT NULL COMMENT '"Состояние"',
  `price` varchar(20) NOT NULL COMMENT '"Цена"',
  `owner` varchar(20) NOT NULL COMMENT '"Владелец"',
  `sity` int(11) NOT NULL COMMENT '"Город"',
  `phone_number` int(14) NOT NULL COMMENT '"Номер владельца"',
  `link_ad` varchar(200) NOT NULL COMMENT '"Cсылка на объявление"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `avito_avtor_name`
--

CREATE TABLE `avito_avtor_name` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `avito_name_avto`
--

CREATE TABLE `avito_name_avto` (
  `id` int(20) NOT NULL,
  `model` varchar(25) NOT NULL COMMENT '"Модель" ',
  `year_of_manufacture` int(6) NOT NULL COMMENT '"Год вып"',
  `version` varchar(20) NOT NULL COMMENT '"Модификация"',
  `type` varchar(20) NOT NULL COMMENT '"Тип двигателя"',
  `actuator` varchar(20) NOT NULL COMMENT '"Привод"',
  `body_type` varchar(20) NOT NULL COMMENT '"Тип кузова"',
  `rudder` varchar(10) NOT NULL COMMENT '"Руль"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='данные о машине';

-- --------------------------------------------------------

--
-- Структура таблицы `avito_sity`
--

CREATE TABLE `avito_sity` (
  `id` int(10) NOT NULL,
  `sity_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `dict_load_file`
--

CREATE TABLE `dict_load_file` (
  `id` int(5) NOT NULL,
  `status` int(5) NOT NULL,
  `name` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `dict_load_file`
--

INSERT INTO `dict_load_file` (`id`, `status`, `name`) VALUES
(1, 1, 'загружен'),
(3, 2, 'очереди'),
(5, 3, 'залит в БД');

-- --------------------------------------------------------

--
-- Структура таблицы `loadd_file`
--

CREATE TABLE `loadd_file` (
  `id` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` int(3) NOT NULL,
  `load_info` int(50) NOT NULL,
  `errors` int(50) NOT NULL,
  `stream` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `login_name` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `role` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `ip_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `login_user`
--

INSERT INTO `login_user` (`id`, `login_name`, `password`, `first_name`, `last_name`, `role`, `group`, `ip_create`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'admin', 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `phone`
--

CREATE TABLE `phone` (
  `id` int(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `source`
--

CREATE TABLE `source` (
  `id` int(11) NOT NULL,
  `source` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `source`
--

INSERT INTO `source` (`id`, `source`) VALUES
(1, 'Авито авто ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `avito_avto`
--
ALTER TABLE `avito_avto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `avito_avtor_name`
--
ALTER TABLE `avito_avtor_name`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `avito_name_avto`
--
ALTER TABLE `avito_name_avto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `avito_sity`
--
ALTER TABLE `avito_sity`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dict_load_file`
--
ALTER TABLE `dict_load_file`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `loadd_file`
--
ALTER TABLE `loadd_file`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `avito_avto`
--
ALTER TABLE `avito_avto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- AUTO_INCREMENT для таблицы `avito_avtor_name`
--
ALTER TABLE `avito_avtor_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `avito_name_avto`
--
ALTER TABLE `avito_name_avto`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `avito_sity`
--
ALTER TABLE `avito_sity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `dict_load_file`
--
ALTER TABLE `dict_load_file`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `loadd_file`
--
ALTER TABLE `loadd_file`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `source`
--
ALTER TABLE `source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
