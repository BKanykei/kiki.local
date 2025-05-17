-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Май 17 2025 г., 10:44
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myform`
--

-- --------------------------------------------------------

--
-- Структура таблицы `entries`
--

CREATE TABLE `entries` (
  `id` int NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `entries`
--

INSERT INTO `entries` (`id`, `last_name`, `name`, `age`, `group_name`, `birthday`, `about`, `photo`, `created_at`) VALUES
(3, 'Баатырова', 'Каныкей', 8, 'Инф(б)-1-23', '2003-12-01', 'Студентка ', 'uploads/1745605541_WhatsApp Image 2025-04-05 at 15.22.54.jpeg', '2025-04-25 18:25:41'),
(4, 'Баатырова ', 'Элнура', 18, 'Инф(б)-1-23', '2005-05-06', 'Студентка ', 'uploads/1745605569_WhatsApp Image 2025-04-05 at 15.12.02.jpeg', '2025-04-25 18:26:09'),
(5, 'Орозакунова', 'Айдана', 18, 'Инф(б)-1-23', '2006-06-06', 'Студентка ', 'uploads/1745605596_WhatsApp Image 2025-04-05 at 15.03.39.jpeg', '2025-04-25 18:26:36'),
(6, 'Оторбаева', 'Акылай', 17, 'Инф(б)-1-23', '2007-06-21', 'Студентка ', 'uploads/1745605689_WhatsApp Image 2025-04-05 at 15.09.04.jpeg', '2025-04-25 18:28:09'),
(7, 'Жылдызбек кызы', 'Мырзайым', 19, 'Инф(б)-1-23', '2006-01-03', 'Студентка ', 'uploads/1745605738_WhatsApp Image 2025-04-05 at 15.13.44.jpeg', '2025-04-25 18:28:58'),
(8, 'Кумарбек кызы', 'Айдана', 19, 'Инф(б)-1-23', '2005-08-17', 'Студентка ', 'uploads/1745605786_WhatsApp Image 2025-04-12 at 15.08.36.jpeg', '2025-04-25 18:29:46'),
(9, 'Курманбекова ', 'Тунук', 20, 'Инф(б)-1-23', '2005-04-06', 'Студентка ', 'uploads/1745605836_WhatsApp Image 2025-04-05 at 22.57.54.jpeg', '2025-04-25 18:30:36'),
(10, 'Уланбек кызы', 'Азима', 18, 'Инф(б)-1-23', '2006-05-22', 'Студентка ', 'uploads/1745605885_WhatsApp Image 2025-04-12 at 15.02.49.jpeg', '2025-04-25 18:31:25'),
(12, 'Керимов', 'Керим', 18, 'Инф(б)-1-23', '2007-12-12', 'Ученик', 'uploads/1747467779_2025-05-14_22-04-32.png', '2025-05-17 07:42:59');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `entries`
--
ALTER TABLE `entries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
