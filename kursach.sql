-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 11 2019 г., 22:52
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kursach`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Buy`
--

CREATE TABLE `Buy` (
  `id` int(11) NOT NULL,
  `Auto` varchar(100) NOT NULL,
  `Login` varchar(100) NOT NULL,
  `Datas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Sost` varchar(5) NOT NULL DEFAULT '0',
  `Tel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Buy`
--

INSERT INTO `Buy` (`id`, `Auto`, `Login`, `Datas`, `Sost`, `Tel`) VALUES
(10, '16', 'Admin', '2018-01-23 00:08:53', '0', '+79787564532'),
(11, '16', 'Admin', '2018-01-23 00:10:34', '0', '+79787564532'),
(12, '16', 'User1', '2018-01-23 01:01:58', '0', '123-345');

-- --------------------------------------------------------

--
-- Структура таблицы `Catalog`
--

CREATE TABLE `Catalog` (
  `id` int(11) NOT NULL,
  `Nazv` varchar(200) NOT NULL,
  `Nalich` varchar(200) NOT NULL,
  `Country` varchar(70) NOT NULL,
  `Colour` varchar(200) NOT NULL,
  `Material` varchar(70) NOT NULL,
  `Texts` varchar(5000) NOT NULL,
  `Type` int(11) NOT NULL,
  `Coin` varchar(200) NOT NULL,
  `Datas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Users` varchar(100) NOT NULL,
  `Photo1` varchar(1000) NOT NULL,
  `Photo2` varchar(1000) NOT NULL,
  `Photo3` varchar(1000) NOT NULL,
  `Subtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Catalog`
--

INSERT INTO `Catalog` (`id`, `Nazv`, `Nalich`, `Country`, `Colour`, `Material`, `Texts`, `Type`, `Coin`, `Datas`, `Users`, `Photo1`, `Photo2`, `Photo3`, `Subtype`) VALUES
(35, 'Валик фасадный', 'да', '', 'Другой', 'Пластик, дерево, волокно', 'Хороший валик для хорошего человека.', 1, '115', '2019-03-10 17:39:06', 'Admin', '/photo/Material/5392_middle.jpg', '', '', 1),
(36, 'Ножовка по дереву', 'нет', '', 'Другой', 'Металл, пластик', 'Ножовка по дереву, пластиковая ручка. Размер:500мм*6,5мм', 1, '260', '2019-03-10 17:39:10', 'Admin', '/photo/Material/5450_big.jpg', '', '', 2),
(37, 'Сверло по металлу', 'да', '', 'Металл', 'Металл', 'Сверло по металлу 5.5мм Тип: HSS Покрытие: титановое ', 1, '15', '2019-03-10 17:39:14', 'Admin', '/photo/Material/5340_middle.jpg', '', '', 3),
(38, 'Лопата совковая', 'да', '', 'Черный', 'Металл', 'Лопата Тип: совковая РМЗ', 1, '160', '2019-03-10 17:39:17', 'Admin', '/photo/Material/5270_middle.jpg', '', '', 4),
(39, 'Шпатель', 'да', '', 'Другой', 'Сталь', 'Шпатель 350мм. нерж. сталь, пластмассовая ручка \"Fit\"', 1, '225', '2019-03-10 17:39:20', 'Admin', '/photo/Material/5256_big.png', '', '', 5),
(40, 'Цемент 25кг', 'нет', '', 'Другой', 'Цемент', 'Цемент \"Новороссийск\" М-500 Д-20 (25кг)', 2, '175', '2019-03-10 17:39:23', 'Admin', '/photo/Material/4965_middle.png', '', '', 1),
(47, 'Пыль \"Инкерманская\"', 'да', '', 'Пыльный', 'Пыль', 'Мало пыли? Купи еще', 2, '100', '2019-03-10 17:39:25', 'Admin', '/photo/Material/4134_big.jpg', '', '', 2),
(48, 'Газобетон', 'да', '', 'Серый', 'Газобетон', 'Газобетон D-500 200х300х600 \"Массивъ\"', 2, '500', '2019-03-10 17:39:28', 'Admin', '/photo/Material/4964_big.jpg', '', '', 3),
(49, 'Пенопласт-25', 'нет', '', 'Белый', 'Пенопласт', 'Только он согреет тебя зимней ночью', 2, '44', '2019-03-10 17:39:31', 'Admin', '/photo/Material/4146_big.png', '', '', 4),
(50, 'Гибкая черепица Docke', 'есть', '', 'Коричневый', 'Глина', 'черепица Docke SBS Кёльн (3м.кв.)', 2, '1380', '2019-03-10 17:39:34', 'Admin', '/photo/Material/4847_big.jpg', '', '', 5),
(51, 'Клей для гипсокартона', 'есть', '', 'Белый', 'Гипс с полимерами', 'Knauf Perlfix (30кг) - это лучше \"Момента\"', 3, '410', '2019-03-10 17:39:37', 'Admin', '/photo/Material/4306_big.jpg', '', '', 1),
(52, 'Краска потолочная', 'есть', 'Германия', 'На выбор', 'Полимеры, наполнители, вода', 'Сделай радугу на потолке', 3, '190', '2019-03-10 18:00:33', 'Admin', '/photo/Material/5298_big.png', '', '', 2),
(53, 'Клей-пена', 'нет', '', 'Белый', 'Полиуретан', 'Kudo Pur Adhesive д/теплоизол.14+ 1000ml (Под пистолет)', 3, '345', '2019-03-10 17:39:43', 'Admin', '/photo/Material/5059_big.jpg', '', '', 3),
(54, 'Ванна', 'есть', '', 'Белый', 'Чугун', 'Ванны от ведущих производителей', 3, '70000', '2019-03-10 17:39:46', 'Admin', '/photo/Material/4795_big.jpg', '', '', 4),
(55, 'Ламинат', 'есть', 'Россия', 'Коричневый', 'Дуб', 'VINTAGE 832 LINEN WOOD 32 класс (2,005м.кв)', 3, '1250', '2019-03-10 17:39:49', 'Admin', '/photo/Material/4767_big.jpg', '', '', 5),
(56, 'Саморез', 'нет', '', 'Черный', 'Углеродистая сталь', 'Предназначен для крепления гипсокартонных КНАУФ-листов', 4, '550', '2019-03-10 17:39:52', 'Admin', '/photo/Material/5723_big.jpg', '', '', 1),
(57, 'Гвозди шиферные', 'есть', '', 'Серебристый', 'Сталь', 'Если потекла крыша - 5х120 (1кг)', 4, '95', '2019-03-10 17:39:55', 'Admin', '/photo/Material/4433_big.jpg', '', '', 2),
(58, 'Шпилька резьбовая', 'нет', '', 'Серебристый', 'Сталь', 'для стягивания отдельных частей конструкции', 4, '150', '2019-03-10 17:40:00', 'Admin', '/photo/Material/4448_big.jpg', '', '', 3),
(59, 'Гайка', 'есть', '', 'Металлик', 'Сталь', 'DIN 934 М10 (250шт)', 4, '300', '2019-03-10 17:40:03', 'Admin', '/photo/Material/4467_big.jpg', '', '', 4),
(60, 'Шайба', 'нет', '', 'Серебристый', 'Сталь', 'Нет, она не для хоккея', 4, '150', '2019-03-10 17:40:05', 'Admin', '/photo/Material/4477_big.jpg', '', '', 5),
(61, 'Рейка', 'есть', '', 'Нежно коричневый', 'Сосна', 'Рейка 25х50х3000мм', 5, '63', '2019-03-10 17:40:08', 'Admin', '/photo/Material/4242_big.jpg', '', '', 1),
(62, 'ДВП', 'есть', '', 'Бежевый', 'Опилки и стружка', 'ДВП 1220х2440х2,5мм', 5, '230', '2019-03-10 17:40:11', 'Admin', '/photo/Material/4281_big.jpg', '', '', 2),
(63, 'OSB-3', 'есть', '', 'Древесный', 'Древесная щепа', 'OSB-3 9х1250х2500мм (Белоруссия)', 5, '645', '2019-03-10 17:40:14', 'Admin', '/photo/Material/4706_big.jpg', '', '', 3),
(64, 'Фанера опалубочная', 'есть', '', 'Древесный', 'Тополь', 'Летит над Парижем', 5, '2650', '2019-03-10 17:40:16', 'Moder', '/photo/Material/4273_big.jpg', '', '', 4),
(65, 'Бензогенератор', 'нет', '', 'Красный', '-', 'Бензиновый генератор PATRIOT SRGE 3800', 6, '26800', '2019-03-10 17:40:22', 'Admin', '/photo/Material/4859_big.jpg', '', '', 1),
(66, 'Сетка просечно-вытяжная', 'есть', '', 'Серый', 'Сталь', 'Сетка просечно-вытяжная 17х40х0,5мм Х/К (10м.кв)', 6, '260', '2019-03-11 16:46:23', 'Admin', '/photo/Material/5415_big.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Login`
--

CREATE TABLE `Login` (
  `id` int(11) NOT NULL,
  `Names` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  `Emails` varchar(100) NOT NULL,
  `Tels` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Login`
--

INSERT INTO `Login` (`id`, `Names`, `Pass`, `Emails`, `Tels`) VALUES
(6, 'Moder', 'Moder', 'Moder@gmail.com', '+79780225274'),
(10, 'Admin', 'Admin', 'Admin@gmail.com', '+79780225274');

-- --------------------------------------------------------

--
-- Структура таблицы `News`
--

CREATE TABLE `News` (
  `id` int(11) NOT NULL,
  `Nazv` varchar(1000) NOT NULL,
  `Texts` varchar(5000) NOT NULL,
  `Datas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Users` varchar(1000) NOT NULL,
  `Photos` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `News`
--

INSERT INTO `News` (`id`, `Nazv`, `Texts`, `Datas`, `Users`, `Photos`) VALUES
(12, 'test1', 'tesr1', '2019-03-10 15:40:46', 'Admin', '/photo/news/3.jpg'),
(14, 'тест ', 'Test2', '2019-03-10 15:41:10', 'Moder', '/photo/news/1.jpg'),
(16, 'Test4тесттесттетс', 'test4', '2019-03-10 15:41:19', 'Moder', '/photo/news/2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `Test_Drive`
--

CREATE TABLE `Test_Drive` (
  `id` int(11) NOT NULL,
  `Avto` varchar(100) NOT NULL,
  `Login` varchar(100) NOT NULL,
  `Sost` varchar(100) NOT NULL,
  `Tel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Test_Drive`
--

INSERT INTO `Test_Drive` (`id`, `Avto`, `Login`, `Sost`, `Tel`) VALUES
(13, '14', 'User1', '1', '123-345'),
(14, '16', 'User1', '0', '123-345'),
(15, '16', 'Admin', '0', '+79780225274'),
(16, '16', 'Admin', '0', '+79780225274');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Buy`
--
ALTER TABLE `Buy`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Catalog`
--
ALTER TABLE `Catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Test_Drive`
--
ALTER TABLE `Test_Drive`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Buy`
--
ALTER TABLE `Buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `Catalog`
--
ALTER TABLE `Catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `Login`
--
ALTER TABLE `Login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `Test_Drive`
--
ALTER TABLE `Test_Drive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
