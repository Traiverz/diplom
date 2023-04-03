-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 03 2023 г., 15:04
-- Версия сервера: 5.6.51
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `JI`
--

-- --------------------------------------------------------

--
-- Структура таблицы `arhiv`
--

CREATE TABLE `arhiv` (
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `data_add` date NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `arhiv`
--

INSERT INTO `arhiv` (`id_order`, `id_customer`, `data_add`, `status`) VALUES
(1, 1, '2023-02-01', 'Завершён'),
(2, 3, '2023-01-04', 'В работе');

-- --------------------------------------------------------

--
-- Структура таблицы `auction`
--

CREATE TABLE `auction` (
  `id_auction` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `rates` int(11) NOT NULL,
  `kol_vo_look` int(11) NOT NULL,
  `kol_vo_rates` int(11) NOT NULL,
  `data_add` date NOT NULL,
  `data_start` date NOT NULL,
  `data_end` date NOT NULL,
  `result` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status` int(11) NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `auction`
--

INSERT INTO `auction` (`id_auction`, `id_order`, `id_customer`, `rates`, `kol_vo_look`, `kol_vo_rates`, `data_add`, `data_start`, `data_end`, `result`, `id_status`, `type`) VALUES
(1, 1, 1, 5, 20, 5, '2023-02-01', '2023-02-04', '2023-02-28', '-', 1, '-'),
(2, 2, 2, 5, 2, 2, '2023-02-01', '2023-02-04', '2023-02-28', '-', 2, '-');

-- --------------------------------------------------------

--
-- Структура таблицы `customer_person`
--

CREATE TABLE `customer_person` (
  `id_customer` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `kol_vo_grade` int(11) NOT NULL,
  `kol_vo_order` int(11) NOT NULL,
  `decription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_medali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `customer_person`
--

INSERT INTO `customer_person` (`id_customer`, `grade`, `id_order`, `kol_vo_grade`, `kol_vo_order`, `decription`, `id_medali`) VALUES
(1, 100, 1, 2, 3, 'Ищу хороших работников ', 1),
(2, 1, 2, 5, 4, 'Ищу тех кто выполнит заказ быстро', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `executor_person`
--

CREATE TABLE `executor_person` (
  `id_executor` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `services` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kol_vo_grade` int(11) NOT NULL,
  `kol_vo_jobs` int(11) NOT NULL,
  `success_jobs` int(11) NOT NULL,
  `during_jobs` int(11) NOT NULL,
  `repeat_jobs` int(11) NOT NULL,
  `id_technology` int(11) NOT NULL,
  `decription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_medali` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `executor_person`
--

INSERT INTO `executor_person` (`id_executor`, `grade`, `services`, `kol_vo_grade`, `kol_vo_jobs`, `success_jobs`, `during_jobs`, `repeat_jobs`, `id_technology`, `decription`, `id_status`, `id_medali`, `id_order`) VALUES
(1, 40, 'Java, PHP', 2, 30, 10, 5, 4, 1, 'Делаю сайты', 1, 1, 1),
(2, 1, 'Python', 5, 70, 1, 60, 0, 2, 'Разрабатываю мобильные приложения', 2, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `medali`
--

CREATE TABLE `medali` (
  `id_medali` int(11) NOT NULL,
  `name_medali` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `decription` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `medali`
--

INSERT INTO `medali` (`id_medali`, `name_medali`, `score`, `decription`) VALUES
(1, 'Бронзовая медаль', 10, 'За 10 выполненных заказов подряд'),
(2, 'Серебряная медаль', 20, 'За 20 выполненных заказов подряд'),
(3, 'Золотая медаль', 50, 'За 50 выполненных заказов подряд');

-- --------------------------------------------------------

--
-- Структура таблицы `path`
--

CREATE TABLE `path` (
  `Id_path` int(11) NOT NULL,
  `name_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_technology` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `path`
--

INSERT INTO `path` (`Id_path`, `name_path`, `id_technology`) VALUES
(1, 'Веб', 1),
(2, 'Мобильные приложения', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE `person` (
  `id_person` int(11) NOT NULL,
  `name_person` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_person` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_person` text COLLATE utf8mb4_unicode_ci,
  `user_role` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_description` text COLLATE utf8mb4_unicode_ci,
  `online` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_executor` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `data_reg` date NOT NULL,
  `kol_vo_violat` int(11) NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` blob NOT NULL,
  `company` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `git` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `person`
--

INSERT INTO `person` (`id_person`, `name_person`, `mail_person`, `password_person`, `user_role`, `person_description`, `online`, `id_executor`, `id_customer`, `balance`, `data_reg`, `kol_vo_violat`, `city`, `contact_1`, `contact_2`, `photo`, `company`, `git`) VALUES
(1, 'Ivan', 'Ivanov@mail.ru', '1234567890', 'ispolnitel', NULL, 'offline', 1, 1, 5000, '2023-01-18', 2, 'Moscow', '88005553535', 'Ivanov@mail.ru', '', 'Arida', 'netu'),
(2, 'Petya', 'Petrov@gmail.com', '098089', 'zakazchik', NULL, 'offline', 2, 2, 0, '2022-08-01', 7, 'Petropavlovsk', '87775553535', 'Petrov@gmail.com', '', 'Integro', 'Petrov.git'),
(3, 'Алекс228', 'alex2786W@mail.ru', '12121212', 'ispolnitel', NULL, 'offline', 0, 0, 0, '0000-00-00', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `rates`
--

CREATE TABLE `rates` (
  `id_auction` int(11) NOT NULL,
  `id_executor` int(11) NOT NULL,
  `prace` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `medali` int(11) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_rates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `rates`
--

INSERT INTO `rates` (`id_auction`, `id_executor`, `prace`, `grade`, `medali`, `comments`, `data_rates`) VALUES
(1, 1, 50000, 100, 1, 'АААААА', '2022-12-01'),
(2, 2, 333333, 11, 2, 'ББББББББ', '2022-10-12'),
(3, 3, 8000, 30, 1, 'ВВВВВВВВ', '2022-11-09');

-- --------------------------------------------------------

--
-- Структура таблицы `status_auction`
--

CREATE TABLE `status_auction` (
  `id_status` int(11) NOT NULL,
  `name_status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status_auction`
--

INSERT INTO `status_auction` (`id_status`, `name_status`) VALUES
(1, 'Объявлен'),
(2, 'Проводится'),
(3, 'Завершён');

-- --------------------------------------------------------

--
-- Структура таблицы `status_executor_person`
--

CREATE TABLE `status_executor_person` (
  `id_status` int(11) NOT NULL,
  `name_status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status_executor_person`
--

INSERT INTO `status_executor_person` (`id_status`, `name_status`) VALUES
(1, 'В активном поиске (заказа)'),
(2, 'Занят'),
(3, 'Заказы не интересуют'),
(4, 'Заморожен');

-- --------------------------------------------------------

--
-- Структура таблицы `status_order`
--

CREATE TABLE `status_order` (
  `id_status` int(11) NOT NULL,
  `name_status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status_order`
--

INSERT INTO `status_order` (`id_status`, `name_status`) VALUES
(1, 'Заявлено'),
(2, 'В работе'),
(3, 'Выполнено ');

-- --------------------------------------------------------

--
-- Структура таблицы `technology`
--

CREATE TABLE `technology` (
  `id_technology` int(11) NOT NULL,
  `name_technology` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_path` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `technology`
--

INSERT INTO `technology` (`id_technology`, `name_technology`, `id_path`) VALUES
(1, 'PHP', 1),
(2, 'Java', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `zadanie`
--

CREATE TABLE `zadanie` (
  `id_order` int(11) NOT NULL,
  `name_order` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_executor` int(11) NOT NULL,
  `decription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_add` date NOT NULL,
  `data_start` date NOT NULL,
  `data_end` date NOT NULL,
  `data_fact` date NOT NULL,
  `deadline` date NOT NULL,
  `srok` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `technology` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `id_auction` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `zadanie`
--

INSERT INTO `zadanie` (`id_order`, `name_order`, `id_customer`, `id_executor`, `decription`, `data_add`, `data_start`, `data_end`, `data_fact`, `deadline`, `srok`, `technology`, `price`, `id_auction`, `id_status`) VALUES
(1, 'Мобильная игра \"Змейка\"', 2, 1, 'Создать игру \"Змейка\" для телефонов ', '2023-02-01', '2023-02-04', '2023-02-28', '2023-02-28', '2023-03-01', '-', '-', 4000, 1, 2),
(2, 'Сайт \"Онлифриланс\"', 1, 1, 'Создать сайт', '2023-02-01', '2023-02-04', '2023-02-28', '2023-03-01', '2023-03-01', 'Месяц', 'JavaScript,PHP,HTML,CSS', 80000, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `arhiv`
--
ALTER TABLE `arhiv`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`id_auction`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `customer_person`
--
ALTER TABLE `customer_person`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_medali` (`id_medali`),
  ADD KEY `id_order` (`id_order`);

--
-- Индексы таблицы `executor_person`
--
ALTER TABLE `executor_person`
  ADD PRIMARY KEY (`id_executor`),
  ADD KEY `id_technology` (`id_technology`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `executor_person_ibfk_3` (`id_medali`);

--
-- Индексы таблицы `medali`
--
ALTER TABLE `medali`
  ADD PRIMARY KEY (`id_medali`);

--
-- Индексы таблицы `path`
--
ALTER TABLE `path`
  ADD PRIMARY KEY (`Id_path`);

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`),
  ADD KEY `id_executor` (`id_executor`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Индексы таблицы `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id_auction`);

--
-- Индексы таблицы `status_auction`
--
ALTER TABLE `status_auction`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `status_executor_person`
--
ALTER TABLE `status_executor_person`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`id_technology`),
  ADD KEY `id_path` (`id_path`);

--
-- Индексы таблицы `zadanie`
--
ALTER TABLE `zadanie`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `zadanie_ibfk_3` (`id_status`),
  ADD KEY `zadanie_ibfk_4` (`id_executor`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `arhiv`
--
ALTER TABLE `arhiv`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `auction`
--
ALTER TABLE `auction`
  MODIFY `id_auction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `customer_person`
--
ALTER TABLE `customer_person`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `executor_person`
--
ALTER TABLE `executor_person`
  MODIFY `id_executor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `medali`
--
ALTER TABLE `medali`
  MODIFY `id_medali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `path`
--
ALTER TABLE `path`
  MODIFY `Id_path` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `rates`
--
ALTER TABLE `rates`
  MODIFY `id_auction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `status_auction`
--
ALTER TABLE `status_auction`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `status_executor_person`
--
ALTER TABLE `status_executor_person`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `technology`
--
ALTER TABLE `technology`
  MODIFY `id_technology` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `zadanie`
--
ALTER TABLE `zadanie`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `arhiv`
--
ALTER TABLE `arhiv`
  ADD CONSTRAINT `arhiv_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `zadanie` (`id_order`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `zadanie` (`id_order`) ON UPDATE CASCADE,
  ADD CONSTRAINT `auction_ibfk_2` FOREIGN KEY (`id_auction`) REFERENCES `rates` (`id_auction`) ON UPDATE CASCADE,
  ADD CONSTRAINT `auction_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status_auction` (`id_status`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_person`
--
ALTER TABLE `customer_person`
  ADD CONSTRAINT `Persona_id_customer` FOREIGN KEY (`id_customer`) REFERENCES `person` (`id_customer`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_person_ibfk_1` FOREIGN KEY (`id_medali`) REFERENCES `medali` (`id_medali`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `executor_person`
--
ALTER TABLE `executor_person`
  ADD CONSTRAINT `executor_person_ibfk_1` FOREIGN KEY (`id_technology`) REFERENCES `technology` (`id_technology`) ON UPDATE CASCADE,
  ADD CONSTRAINT `executor_person_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `status_executor_person` (`id_status`) ON UPDATE CASCADE,
  ADD CONSTRAINT `executor_person_ibfk_3` FOREIGN KEY (`id_medali`) REFERENCES `medali` (`id_medali`) ON UPDATE CASCADE,
  ADD CONSTRAINT `executor_person_ibfk_4` FOREIGN KEY (`id_executor`) REFERENCES `person` (`id_executor`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `technology`
--
ALTER TABLE `technology`
  ADD CONSTRAINT `technology_ibfk_1` FOREIGN KEY (`id_path`) REFERENCES `path` (`Id_path`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `zadanie`
--
ALTER TABLE `zadanie`
  ADD CONSTRAINT `customer_person_id_order` FOREIGN KEY (`id_order`) REFERENCES `customer_person` (`id_order`) ON UPDATE CASCADE,
  ADD CONSTRAINT `zadanie_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status_order` (`id_status`) ON UPDATE CASCADE,
  ADD CONSTRAINT `zadanie_ibfk_4` FOREIGN KEY (`id_executor`) REFERENCES `person` (`id_executor`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
