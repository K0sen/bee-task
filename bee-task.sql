-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 31 2017 г., 16:44
-- Версия сервера: 10.1.22-MariaDB
-- Версия PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bee-task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` tinyint(4) NOT NULL,
  `name` char(20) NOT NULL,
  `email` char(50) NOT NULL,
  `text` varchar(1500) NOT NULL,
  `image` char(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `email`, `text`, `image`, `status`) VALUES
(1, 'first', 'virging@df.net', 'adsfasf asdf asdf asdf adsf ', 'bee.png', 1),
(2, 'second', 'macho@email.com', 'adsfjaklj ads fadsfj klasflas fasdf adsf ', 'amco.npg', 0),
(3, 'third', 'alpha@email.com', 'adsfjaklj aasdfadsf s', 'amdssd.npg', 0),
(4, 'Jimmy Carr', 'lol@sdf.net', 'adsfadsfasdfad fa', 'dssdf.jpg', 0),
(5, 'Orlando Blum', 'rororo@fkf.e', 'asafasdf adfads fa sf', 'adfads.ne', 1),
(6, 'Gorelka', 'rororo@fkf.e', 'asafasdf adfads fa sf', 'adfads.nde', 0),
(7, 'Ochag', 'rdfro@fkf.e', 'asafasdf adfads fa sf', 'adfads.se', 0),
(8, 'Steven King', 'rsd@fkf.e', 'asafasdf adfads fa sf', 'adfads.nfe', 1),
(9, 'Vernor', 'vcrozier0@ted.com', 'synthesize 24/365 content', 'image/png', 1),
(10, 'Jan', 'jmethven1@trellian.com', 'whiteboard sticky action-items', 'image/jpeg', 0),
(11, 'Mahala', 'mlortz2@shareasale.com', 'disintermediate 24/365 e-commerce', 'image/png', 0),
(12, 'Audre', 'awinstone3@blogs.com', 'seize killer systems', 'image/pjpeg', 0),
(13, 'Gray', 'gspilstead4@guardian.co.uk', 'engineer out-of-the-box ROI', 'image/x-tiff', 0),
(14, 'Mic', 'moakshott5@craigslist.org', 'cultivate cross-media relationships', 'image/jpeg', 0),
(15, 'Lurline', 'ldrought6@google.fr', 'reintermediate open-source experiences', 'image/png', 0),
(36, 'Hurley', 'hcowler@ted.com', 'expedite open-source channels', 'image/png', 0),
(37, 'Jedidiah', 'jmullengers@nature.com', 'matrix ubiquitous users', 'image/jpeg', 0),
(38, 'adsf', 'admin@mvc.com', '1.213\n2.  3122\n3. 312', 'dsfads', 1),
(39, 'adf', 'admin@mvc.com', 'asdfa', 'Bee-twin.png', 0),
(40, 'adf', 'admin@mvc.com', 'asdfa', 'Bee-twin.png', 0),
(41, 'sdfsdf', 'admin@mvc.com', 'fadsf', 'Bee.png', 0),
(42, 'df', 'admin@mvc.com', 'sadf', 'Bee-twin.png', 0),
(43, 'adsf', 'admin@mvc.com', 'alert\nvalidation\nedited\n', 'Bee-twin.png', 0),
(44, 'adsf', 'admin@mvc.com', 'sfad', 'Bee-twin.png', 0),
(45, 'adsfa', 'asdf@dsf.afs', 'adsf', 'Bee-twin.png', 0),
(46, 'adsfa', 'asdf@dsf.afs', 'adsf', 'Bee-twin.png', 0),
(47, 'df', 'admin@mvc.com', 'sdf', 'Bee-twin.png', 0),
(48, 'sdf', 'admin@mvc.com', 'sf', 'Bee-twin.png', 0),
(49, 'asdfadsfdsa', 'asdf@dsf.afs', '1.32\n2. 342\n3.  das das           df\n4. adf', 'Bee-twin.png', 1),
(50, 'adsfasd', 'dsf@dsf.net', '1. Find Frodo.\r\n2. Assemble a team\r\n3. Rush to Mordor', 'Bee-twin.png', 0),
(51, 'dsf', 'asdfasdf@asdf.ner', '3. Fly in the evening with a girlfriend to watch sunsetl', 'Bee.gif', 1),
(52, 'df', 'fdsf@dsf.net', 'dsf', '1867.jpg', 0),
(53, 'ghf', 'gfh@gd.ner', ' ', 'med_1438204121_00032.jpg', 0),
(54, 'fsdf', 'sdf@ads.asd', 'sd', 'rock.png', 0),
(55, 'f', 'dsf@dsf.net', 's', 'rock.png', 0),
(56, 'NAME123', 'admin@mvc.com', 'TEXT23', 'med_1438204121_00032.jpg', 0),
(57, 'C:\\xampp\\htdocs\\', 'sdfsdf@dsf.df', 'sdf', 'rock.exe', 0),
(58, 'adsf', 'dsf@dsf.netopop', 'd', 'med_1438204121_00032.jpg', 0),
(59, 'adsfasd', 'admin@mvc.com', 'a', 'rock.exe', 0),
(60, 'adsfa', 'admin@mvc.com', 'sd', 'Bee-twin.png', 0),
(61, 'adsf', 'admin@mvc.com', 'Представьте: вы потерпели крушение на чужой планете, теперь вам нужно вернуться на Землю. Перед вами три инопланетянина — Ти, Эфф и Арр. Для каждого из них у вас есть именной артефакт, который заставит его помочь вам. Но есть проблема: вы не знаете, кто из них кто.\r\n\r\nВы можете задать им три вопроса с ответами «да» или «нет» (каждый вопрос должен быть адресован одному инопланетянину). Ти всегда будет говорить правду, Эфф всегда будет лгать, а Арр просто выберет случайный ответ.\r\n\r\nЕще одна сложность: они могут понимать вас, но ответят на своем языке. Ответ будет звучать как «озо» или «улу». Вы не знаете, какое из этих слов значит «да», а какое — «нет».\r\n\r\nКакие три вопроса вы зададите, чтобы определить имя каждого из инопланетян?\r\n\r\nhttps://ed.ted.com/lessons/can-you-solve-the-three-gods-riddle-alex-gendler#review', '1867.jpg', 0),
(62, 'я', 'admin@mvc.com', 'https://learn.javascript.ru/closures\r\nhttps://learn.javascript.ru/keyboard-events', 'Bee-twin.png', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
