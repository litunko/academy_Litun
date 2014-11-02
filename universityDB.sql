-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 02 2014 г., 04:34
-- Версия сервера: 5.6.19
-- Версия PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `university`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `semester` int(20) NOT NULL,
  `final_control` char(50) NOT NULL,
  `faculty_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `name`, `semester`, `final_control`, `faculty_id`) VALUES
(1, 'English', 1, 'examination', 3),
(2, 'sdgsdgf', 3, 'test', 3),
(4, 'Mathematic', 1, 'exam', 3),
(5, 'bla', 4, 'exam', 5),
(8, 'One_course', 3, 'test', 3),
(9, 'fdfdfd', 3, 'exam', 3),
(10, 'OOP', 3, 'exam', 3),
(11, '1', 1, 'exam', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `courses_teachers`
--

CREATE TABLE IF NOT EXISTS `courses_teachers` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `course_id` int(20) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `courses_teachers`
--

INSERT INTO `courses_teachers` (`id`, `course_id`, `teacher_id`) VALUES
(4, 2, 1),
(5, 1, 1),
(7, 1, 11),
(9, 1, 14),
(10, 4, 15),
(11, 4, 16),
(12, 8, 13),
(13, 1, 18),
(14, 9, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `degrees`
--

CREATE TABLE IF NOT EXISTS `degrees` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `degrees`
--

INSERT INTO `degrees` (`id`, `name`) VALUES
(1, 'wqrwqer'),
(2, 'qwerq');

-- --------------------------------------------------------

--
-- Структура таблицы `faculties`
--

CREATE TABLE IF NOT EXISTS `faculties` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `adress` char(50) NOT NULL, -- address
  `year` date NOT NULL,
  `teacher_id` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `adress`, `year`, `teacher_id`) VALUES
(3, 'asafs', 'asdfa', '2014-10-07', 1),
(5, '1', '1', '2014-11-05', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `number_students` int(20) NOT NULL,
  `name_leader` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `number_students`, `name_leader`) VALUES
(1, 'asdfsa', 12, 'asfsdfas'),
(2, 'qwerwer', 23, 'adfasf'),
(3, '302', 12, 'Criatian'),
(4, '303', 13, 'Andru Litun');

-- --------------------------------------------------------

--
-- Структура таблицы `groups_courses`
--

CREATE TABLE IF NOT EXISTS `groups_courses` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(20) NOT NULL,
  `course_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `groups_courses`
--

INSERT INTO `groups_courses` (`id`, `group_id`, `course_id`) VALUES
(1, 3, 1),
(2, 4, 1),
(3, 4, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `name`) VALUES
(1, 'post1'),
(2, 'post2');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `first_name` char(50) NOT NULL,
  `second_name` char(50) NOT NULL,
  `date` date NOT NULL,
  `post_id` int(20) NOT NULL,
  `degree_id` int(20) NOT NULL,
  `topic` char(50) NOT NULL,
  `faculty_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `post_id` (`post_id`),
  KEY `degree_id` (`degree_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `second_name`, `date`, `post_id`, `degree_id`, `topic`, `faculty_id`) VALUES
(1, 'asdfas', 'asdf', '2014-10-09', 1, 1, 'asdfasd', 3),
(7, 'Andru', 'Litun', '2014-11-05', 2, 2, 'reeeed', 3),
(8, 'Madrile', 'Avgustine', '2014-11-12', 2, 2, 'topic', 3),
(9, 'dsv', 'xzcvxzcv', '2014-11-04', 1, 1, 'dfdfdf', 3),
(11, 'Avgust', 'Rush', '2014-11-06', 2, 2, 'topic', 3),
(12, 'Hodan', 'Dmitro', '2014-11-05', 1, 1, 'rewq', 3),
(13, 'one', 'one', '2014-11-19', 1, 1, 'one', 3),
(14, 'two', 'two', '2014-11-06', 1, 1, 'two', 3),
(15, 'mathematic', 'mathematic', '2014-11-06', 1, 1, 'math', 3),
(16, 'hello', 'hello', '2014-11-22', 1, 1, 'f', 3),
(17, 'rush2', 'rush2', '2014-11-07', 1, 1, 'rush2', 3),
(18, '1212', '1212', '2014-10-31', 1, 1, '1212', 3);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`);

--
-- Ограничения внешнего ключа таблицы `courses_teachers`
--
ALTER TABLE `courses_teachers`
  ADD CONSTRAINT `courses_teachers_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `courses_teachers_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Ограничения внешнего ключа таблицы `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Ограничения внешнего ключа таблицы `groups_courses`
--
ALTER TABLE `groups_courses`
  ADD CONSTRAINT `groups_courses_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `groups_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Ограничения внешнего ключа таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`),
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`),
  ADD CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
