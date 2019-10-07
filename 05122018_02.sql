-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 10 2019 г., 00:43
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `05122018_02`
--
CREATE DATABASE IF NOT EXISTS `05122018_02` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `05122018_02`;

-- --------------------------------------------------------

--
-- Структура таблицы `client_base`
--

CREATE TABLE IF NOT EXISTS `client_base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `usermail` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client_base`
--

INSERT INTO `client_base` (`id`, `username`, `usermail`, `comment`) VALUES
(1, 'Dafnia', 'soffi@mail.com', 'большой кусочек пиццы');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `src` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `name`, `src`, `priority`, `active`) VALUES
(1, 'Finnair', '/images/finnair.png', 10, 1),
(2, 'Eventworld', '/images/event.png', 20, 1),
(3, 'Letidor', '/images/Letidor.png', 30, 1),
(4, 'Viking line', '/images/viking.png', 40, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `src` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `features`
--

INSERT INTO `features` (`id`, `title`, `text`, `src`, `priority`) VALUES
(1, 'Уникальный подход', 'Мы подходим к идеям разработки с самых необычных сторон, что позволяет удивлять будущих пользователей.', '<i class=\"fa fa-bookmark-o aria-hidden=true fa-3x\"></i>', 10),
(2, 'Монетизация', 'Правильный дизайн быстро приводит потенциальных клиентов к покупке, поэтому наша команда уделяет этому самую важную роль.', '<i class=\"fa fa-money aria-hidden=true fa-3x\"></i>', 20),
(3, 'Повышение функционала', 'Разработанные нами проекты всегда готовы к дополнительным расширеням функционала. За счет гибкости разработки, мы в кратчайшие добавим новые модули и решения.', '<i class=\"fa fa-shopping-cart aria-hidden=true fa-3x\"></i>', 30),
(4, 'Оптимизация процессов', 'Весь оборот и отчетность по клиентам будут доступны в специальной системе userBox, которая разработана нашей командой для оптимизации процессов работы с клиентами.', '<i class=\"fa fa-users aria-hidden=true fa-3x\"></i>', 40);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `href` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `href`, `priority`, `active`) VALUES
(1, 'О нас', '#about-us', 10, 1),
(2, 'Преимущества', '#features', 20, 1),
(3, 'Как заказать', '#contact-us', 30, 1),
(4, 'Стоимость', '#price', 40, 1),
(5, 'Отзывы', '#reviews', 50, 1),
(6, 'Контакты', '#footer', 60, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `line1` varchar(100) NOT NULL,
  `line2` varchar(100) NOT NULL,
  `line3` varchar(100) NOT NULL,
  `line4` varchar(100) NOT NULL,
  `line5` varchar(100) NOT NULL,
  `priority` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `special` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `src`, `name`, `cost`, `line1`, `line2`, `line3`, `line4`, `line5`, `priority`, `active`, `special`) VALUES
(1, '/images/png/radio1.png', 'Сайт-визитка', 15, '<b>1</b> страница', '<b>Эксклюзивный</b> дизайн', '<b>Адаптивная</b> верстка', '<b>Внутренняя</b> оптимизация', '<s>Платформа userBox</s>', 10, 1, 0),
(2, '/images/png/joy1.png', 'Сайт компании', 40, 'до <b>10</b> страниц', '<b>Эксклюзивный</b> дизайн', '<b>Адаптивная</b> верстка', '<b>Внутренняя</b> оптимизация', '<s>Платформа userBox</s>', 20, 1, 0),
(3, '/images/png/science1.png', 'Магазин', 220, '<b>Эксклюзивный</b> дизайн', '<b>Адаптивная</b> верстка', '<b>Внутренняя</b> оптимизация', '<b>Маркетинг</b> решения', 'Платформа <b>userBox</b>', 30, 1, 0),
(4, '/images/png/tools1.png', 'Интернет-портал', 500, '<b>Эксклюзивный</b> дизайн', '<b>Адаптивная</b> верстка', '<b>Внутренняя</b> оптимизация', '<b>Маркетинг</b> решения', 'Платформа <b>userBox</b>', 40, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `priority` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `src`, `review`, `name`, `company`, `priority`, `active`) VALUES
(1, '/images/baklanov.jpg', '\"Выражаем благодарность компании за работу над улучшением нашего сайта finnair.com Я высоко оцениваю качество выполненных работ по анализу потребностей пользователей и проектированию интерфейса новой системы личных сообщений. Считаю необходимым отдельно упомянуть ответственность по отношению к срокам выполнения поставленных задач и неукоснительное следование целям заказчика.\"', 'Илья Бакланов', 'Finnair', 10, 1),
(2, '/images/starik.jpg', '\"С начала нашего сотрудничества чувствуется ответственное отношение менеджера к нашему проекту. В процессе своей деятельности специалисты компании подтвердили свой высокий профессиональный статус и оперативность в решении проблем. Нам отвечали своевременно на все возникающие вопросы, предоставляли консультации и рекомендации относительно нашего сайта. Чувствуется, что в данной компании работают настоящие профессионалы своего дела.\"', 'Анна Старик', 'Eventworld', 20, 1),
(3, '/images/vorobiov.jpg', '\"Был проведен комплексный анализ портала в плоскостях юзабилити и SEO, по результатам которого предоставлен развернутый экспертный отчет с рекомендациями по оптимизации визуальной и текстовой составляющих. Итоговые материалы были достойно оформлены и написаны доступным и понятным языком. Полученный документ лег в основу измененной концепции работы над сайтом \"Viking Line\"\"', 'Денис Воробьев', 'Viking Line', 30, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `socials`
--

CREATE TABLE IF NOT EXISTS `socials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `href` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `socials`
--

INSERT INTO `socials` (`id`, `name`, `href`, `src`, `priority`, `active`) VALUES
(1, 'Twitter', 'https://twitter.com/', '', 10, 1),
(2, 'Facebook', 'https://www.facebook.com/', '', 20, 1),
(3, 'Google+', 'https://plus.google.com/', '', 30, 1),
(4, 'Instagram', 'https://instagram.com/', '', 40, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
