-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 23 2025 г., 23:08
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `beautyed`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `masters`
--

CREATE TABLE `masters` (
  `id` int(11) NOT NULL,
  `eng_name` varchar(50) NOT NULL,
  `rus_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `masters`
--

INSERT INTO `masters` (`id`, `eng_name`, `rus_name`) VALUES
(1, 'Master 1', 'Мастер 1'),
(2, 'Master 2', 'Мастер 2');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `eng_name` varchar(50) NOT NULL,
  `rus_name` varchar(50) NOT NULL,
  `eng_description` varchar(200) NOT NULL,
  `rus_description` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `service_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `eng_name`, `rus_name`, `eng_description`, `rus_description`, `price`, `service_type_id`) VALUES
(1, 'Haircut', 'Стрижка', 'A basic haircut service', 'Базовая услуга стрижки', 25.00, 1),
(2, 'Hair lightening', 'Осветление волос', 'Lightening the hair color', 'Осветление цвета волос', 60.00, 1),
(3, 'Laying', 'Укладка', 'Hair laying/styling', 'Укладка/стайлинг волос', 15.00, 1),
(4, 'Coloring', 'Окрашивание', 'Hair coloring service', 'Услуга окрашивания волос', 70.00, 1),
(5, 'Classic manicure', 'Классический маникюр', 'Traditional manicure with nail care', 'Традиционный маникюр с уходом за ногтями', 20.00, 2),
(6, 'Gel polish', 'Гель-лак', 'Long-lasting gel nail polish application', 'Долговечное нанесение гель-лака на ногти', 30.00, 2),
(7, 'Nail extensions', 'Наращивание ногтей', 'Nail extensions using artificial tips or gel', 'Наращивание ногтей с использованием искусственных типсов или геля', 50.00, 2),
(8, 'Eyebrow shaping', 'Коррекция бровей', 'Shaping of eyebrows for a defined look', 'Оформление бровей для придания выразительности взгляду', 15.00, 3),
(9, 'Eyelash extensions', 'Наращивание ресниц', 'Application of eyelash extensions for a fuller look', 'Применение наращивания ресниц для более пышного вида', 50.00, 3),
(10, 'Brow tinting', 'Окрашивание бровей', 'Tinting eyebrows for a darker shade', 'Окрашивание бровей в более темный оттенок', 20.00, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `eng_type` varchar(100) NOT NULL,
  `rus_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `service_type`
--

INSERT INTO `service_type` (`id`, `eng_type`, `rus_type`) VALUES
(1, 'Hairdressing services', 'Парикмахерские услуги'),
(2, 'Manicure', 'Маникюр'),
(3, 'Eyebrows and eyelashes', 'Брови и ресницы');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `PASS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `PASS`) VALUES
(1, 'Admin name', 'admin@example.com', '0987654321', '$2y$10$qXZcIY707nGI0OJlly7cZO9wS.aehdfQPCgz64tdp/la.9yGOISzG', 'admin', '123456'),
(2, 'test user', 'user@example.com', '123456789', '$2y$10$89OWEsy0bcSNbd9rjDJCcuWJDLAHuCDxGLXxg3P4oEC/kQFEVxj42', 'customer', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `master_id` (`master_id`);

--
-- Индексы таблицы `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_type_id` (`service_type_id`);

--
-- Индексы таблицы `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`master_id`) REFERENCES `masters` (`id`);

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`service_type_id`) REFERENCES `service_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
