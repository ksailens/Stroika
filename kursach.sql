-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 19 2019 г., 20:38
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
  `Kolvo` int(5) DEFAULT NULL,
  `Login` varchar(100) NOT NULL,
  `Datas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Sost` varchar(5) NOT NULL DEFAULT '0',
  `Tel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Buy`
--

INSERT INTO `Buy` (`id`, `Auto`, `Kolvo`, `Login`, `Datas`, `Sost`, `Tel`) VALUES
(28, '35', 5, 'ksailens', '2019-05-19 13:52:58', '0', '+79787450000'),
(29, '35', 4, 'ksailens', '2019-05-19 14:02:58', '0', '+79787450000'),
(30, '47', 5, 'ksailens', '2019-05-19 14:19:34', '0', '+79787450000'),
(31, '35', 1, 'Moder', '2019-05-19 17:32:40', '0', '+79780225274');

-- --------------------------------------------------------

--
-- Структура таблицы `Catalog`
--

CREATE TABLE `Catalog` (
  `id` int(11) NOT NULL,
  `Nazv` varchar(200) NOT NULL,
  `Nalich` varchar(5) NOT NULL,
  `Country` varchar(70) NOT NULL,
  `Colour` varchar(200) NOT NULL,
  `Material` varchar(70) NOT NULL,
  `Texts` varchar(5000) NOT NULL,
  `Type` int(11) NOT NULL,
  `Coin` float(20,2) NOT NULL,
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
(35, 'Валик фасадный', 'есть', '', 'Другой', 'Пластик, дерево, волокно', 'Хороший валик для хорошего человека.', 1, 115.00, '2019-05-05 08:33:21', 'Admin', '/photo/Material/5392_middle.jpg', '', '', 1),
(36, 'Ножовка по дереву', 'нет', '', 'Другой', 'Металл, пластик', 'Ножовка по дереву, пластиковая ручка. Размер:500мм*6,5мм', 1, 260.00, '2019-03-10 17:39:10', 'Admin', '/photo/Material/5450_big.jpg', '', '', 2),
(37, 'Сверло по металлу', 'есть', '', 'Металл', 'Металл', 'Сверло по металлу 5.5мм Тип: HSS Покрытие: титановое ', 1, 15.00, '2019-05-05 08:33:32', 'Admin', '/photo/Material/5340_middle.jpg', '', '', 3),
(38, 'Лопата совковая', 'есть', '', 'Черный', 'Металл', 'Лопата Тип: совковая РМЗ', 1, 160.00, '2019-05-05 08:33:52', 'Admin', '/photo/Material/5270_middle.jpg', '', '', 4),
(39, 'Шпатель', 'есть', '', 'Другой', 'Сталь', 'Шпатель 350мм. нерж. сталь, пластмассовая ручка \"Fit\"', 1, 225.00, '2019-05-05 08:34:06', 'Admin', '/photo/Material/5256_big.png', '', '', 5),
(40, 'Цемент 25кг', 'нет', '', 'Другой', 'Цемент', 'Цемент \"Новороссийск\" М-500 Д-20 (25кг)', 2, 175.00, '2019-03-10 17:39:23', 'Admin', '/photo/Material/4965_middle.png', '', '', 1),
(47, 'Пыль \"Инкерманская\"', 'есть', '', 'Пыльный', 'Пыль', 'Мало пыли? Купи еще', 2, 100.00, '2019-05-05 08:34:14', 'Admin', '/photo/Material/4134_big.jpg', '', '', 2),
(48, 'Газобетон', 'есть', '', 'Серый', 'Газобетон', 'Газобетон D-500 200х300х600 \"Массивъ\"', 2, 500.00, '2019-05-05 08:34:20', 'Admin', '/photo/Material/4964_big.jpg', '', '', 3),
(49, 'Пенопласт-25', 'нет', '', 'Белый', 'Пенопласт', 'Только он согреет тебя зимней ночью', 2, 44.00, '2019-03-10 17:39:31', 'Admin', '/photo/Material/4146_big.png', '', '', 4),
(50, 'Гибкая черепица Docke', 'есть', '', 'Коричневый', 'Глина', 'черепица Docke SBS Кёльн (3м.кв.)', 2, 1380.00, '2019-03-10 17:39:34', 'Admin', '/photo/Material/4847_big.jpg', '', '', 5),
(51, 'Клей для гипсокартона', 'есть', '', 'Белый', 'Гипс с полимерами', 'Knauf Perlfix (30кг) - это лучше \"Момента\"', 3, 410.00, '2019-03-10 17:39:37', 'Admin', '/photo/Material/4306_big.jpg', '', '', 1),
(52, 'Краска потолочная', 'есть', 'Германия', 'На выбор', 'Полимеры, наполнители, вода', 'Сделай радугу на потолке', 3, 190.00, '2019-03-10 18:00:33', 'Admin', '/photo/Material/5298_big.png', '', '', 2),
(53, 'Клей-пена', 'нет', '', 'Белый', 'Полиуретан', 'Kudo Pur Adhesive д/теплоизол.14+ 1000ml (Под пистолет)', 3, 345.00, '2019-03-10 17:39:43', 'Admin', '/photo/Material/5059_big.jpg', '', '', 3),
(54, 'Ванна', 'есть', '', 'Белый', 'Чугун', 'Ванны от ведущих производителей', 3, 70000.00, '2019-03-10 17:39:46', 'Admin', '/photo/Material/4795_big.jpg', '', '', 4),
(55, 'Ламинат', 'есть', 'Россия', 'Коричневый', 'Дуб', 'VINTAGE 832 LINEN WOOD 32 класс (2,005м.кв)', 3, 1250.00, '2019-03-10 17:39:49', 'Admin', '/photo/Material/4767_big.jpg', '', '', 5),
(56, 'Саморез', 'нет', '', 'Черный', 'Углеродистая сталь', 'Предназначен для крепления гипсокартонных КНАУФ-листов', 4, 550.00, '2019-03-10 17:39:52', 'Admin', '/photo/Material/5723_big.jpg', '', '', 1),
(57, 'Гвозди шиферные', 'есть', '', 'Серебристый', 'Сталь', 'Если потекла крыша - 5х120 (1кг)', 4, 95.00, '2019-03-10 17:39:55', 'Admin', '/photo/Material/4433_big.jpg', '', '', 2),
(58, 'Шпилька резьбовая', 'нет', '', 'Серебристый', 'Сталь', 'для стягивания отдельных частей конструкции', 4, 150.00, '2019-03-10 17:40:00', 'Admin', '/photo/Material/4448_big.jpg', '', '', 3),
(59, 'Гайка', 'есть', '', 'Металлик', 'Сталь', 'DIN 934 М10 (250шт)', 4, 300.00, '2019-03-10 17:40:03', 'Admin', '/photo/Material/4467_big.jpg', '', '', 4),
(60, 'Шайба', 'нет', '', 'Серебристый', 'Сталь', 'Нет, она не для хоккея', 4, 150.00, '2019-03-10 17:40:05', 'Admin', '/photo/Material/4477_big.jpg', '', '', 5),
(61, 'Рейка', 'есть', '', 'Нежно коричневый', 'Сосна', 'Рейка 25х50х3000мм', 5, 63.00, '2019-03-10 17:40:08', 'Admin', '/photo/Material/4242_big.jpg', '', '', 1),
(62, 'ДВП', 'есть', '', 'Бежевый', 'Опилки и стружка', 'ДВП 1220х2440х2,5мм', 5, 230.00, '2019-03-10 17:40:11', 'Admin', '/photo/Material/4281_big.jpg', '', '', 2),
(63, 'OSB-3', 'есть', '', 'Древесный', 'Древесная щепа', 'OSB-3 9х1250х2500мм (Белоруссия)', 5, 645.00, '2019-03-10 17:40:14', 'Admin', '/photo/Material/4706_big.jpg', '', '', 3),
(64, 'Фанера опалубочная', 'есть', '', 'Древесный', 'Тополь', 'Летит над Парижем', 5, 2650.00, '2019-03-10 17:40:16', 'Moder', '/photo/Material/4273_big.jpg', '', '', 4),
(65, 'Бензогенератор', 'нет', '', 'Красный', '-', 'Бензиновый генератор PATRIOT SRGE 3800', 6, 26800.00, '2019-03-10 17:40:22', 'Admin', '/photo/Material/4859_big.jpg', '', '', 1),
(66, 'Сетка просечно-вытяжная', 'есть', '', 'Серый', 'Сталь', 'Сетка просечно-вытяжная 17х40х0,5мм Х/К (10м.кв)', 6, 260.00, '2019-03-11 16:46:23', 'Admin', '/photo/Material/5415_big.jpg', '', '', 1);

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
(10, 'Admin', 'Admin', 'Admin@gmail.com', '+79780225274'),
(32, 'ksailens', '12345', 'quartz_90@mail.ru', '+79787450000'),
(33, 'ыаыаыав', 'ыаыаыа', 'quartz_90@mail.ru', '+79787456898'),
(34, 'фвфыуйц312', 'йуцвыфв', 'quartz_90@mail.ru', '+79787456898');

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
(16, 'Распродажа цемента', '<p>Строим новый дом вместе</p>', '2019-05-05 09:15:25', 'Moder', '/photo/news/2.jpg'),
(17, 'Новая новость', '<p>Только сегодня, успейте купить ничего за бесплатно!</p>', '2019-03-24 09:26:56', 'Admin', '/photo/news/');

-- --------------------------------------------------------

--
-- Структура таблицы `SubType`
--

CREATE TABLE `SubType` (
  `id_SubType` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `id_Type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `SubType`
--

INSERT INTO `SubType` (`id_SubType`, `Name`, `id_Type`) VALUES
(1, 'Кисти и валики', 1),
(1, 'Цемент и добавки', 2),
(1, 'Клей', 3),
(1, 'Саморезы', 4),
(1, 'Брус и доска', 5),
(2, 'Ножовки и пилы', 1),
(2, 'Песок и щебень', 2),
(2, 'Краски и лаки', 3),
(2, 'Гвозди', 4),
(2, 'ДСП и ДВП', 5),
(3, 'Буры и свёрла', 1),
(3, 'Газобетон', 2),
(3, 'Герметики и пена', 3),
(3, 'Шпильки', 4),
(3, 'ОСБ', 5),
(4, 'Лопаты', 1),
(4, 'Утеплители', 2),
(4, 'Плитка и сантехника', 3),
(4, 'Гайки', 4),
(4, 'Фанера', 5),
(5, 'Шпателя', 1),
(5, 'Кровля', 2),
(5, 'Ламинат', 3),
(5, 'Шайбы', 4);

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

-- --------------------------------------------------------

--
-- Структура таблицы `Type`
--

CREATE TABLE `Type` (
  `id_type` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Type`
--

INSERT INTO `Type` (`id_type`, `Name`) VALUES
(1, 'Инструменты'),
(2, 'Строительные материалы'),
(3, 'Отделочные материалы'),
(4, 'Крепежи'),
(5, 'Пиломатериалы'),
(6, 'Другое');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `Type` (`Type`),
  ADD KEY `Subtype` (`Subtype`);

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
-- Индексы таблицы `SubType`
--
ALTER TABLE `SubType`
  ADD PRIMARY KEY (`id_SubType`,`id_Type`),
  ADD KEY `FK_Type_Sub` (`id_Type`);

--
-- Индексы таблицы `Test_Drive`
--
ALTER TABLE `Test_Drive`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Type`
--
ALTER TABLE `Type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Buy`
--
ALTER TABLE `Buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `Catalog`
--
ALTER TABLE `Catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `Login`
--
ALTER TABLE `Login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `Test_Drive`
--
ALTER TABLE `Test_Drive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `Type`
--
ALTER TABLE `Type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Catalog`
--
ALTER TABLE `Catalog`
  ADD CONSTRAINT `catalog_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `Type` (`id_type`),
  ADD CONSTRAINT `catalog_ibfk_2` FOREIGN KEY (`Subtype`) REFERENCES `SubType` (`id_SubType`);

--
-- Ограничения внешнего ключа таблицы `SubType`
--
ALTER TABLE `SubType`
  ADD CONSTRAINT `FK_Type_Sub` FOREIGN KEY (`id_Type`) REFERENCES `Type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
