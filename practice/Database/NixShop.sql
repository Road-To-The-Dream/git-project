-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 29 2019 г., 22:39
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `NixShop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `uniqName` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `uniqName`, `status`, `create_at`, `update_at`) VALUES
(1, 'Все нотбуки', '', 0, '2019-01-26', NULL),
(2, 'Универсальные', '', 0, '2019-01-26', NULL),
(3, 'Для бизнеса', '', 0, '2019-01-26', NULL),
(4, 'Тонкие и лёгкие', '', 0, '2019-01-26', NULL),
(5, 'Ноутбуки с SSD', '', 0, '2019-01-26', NULL),
(6, 'Ноутбуки Windows', '', 0, '2019-01-26', NULL),
(7, 'Для несложных задач', '', 0, '2019-01-26', NULL),
(8, 'Геймерские ноутбуки', '', 0, '2019-01-26', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `characteristic_child`
--

CREATE TABLE `characteristic_child` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `characteristic_parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `characteristic_child`
--

INSERT INTO `characteristic_child` (`id`, `name`, `create_at`, `update_at`, `characteristic_parent_id`) VALUES
(1, 'Тип', NULL, NULL, 1),
(2, 'Тип.конфиг.', NULL, NULL, 1),
(3, 'Макс. объем оперативной памяти', NULL, NULL, 1),
(4, 'Диагональ', NULL, NULL, 2),
(5, 'Разрешение', NULL, NULL, 2),
(6, 'Тип экрана', NULL, NULL, 2),
(7, 'Гигабитный Ethernet', NULL, NULL, 3),
(8, 'Интерфейсы', NULL, NULL, 3),
(9, 'Скорость вращения диска', NULL, NULL, 4),
(10, 'Время автономной работы', NULL, NULL, 5),
(11, 'Кол-во ячеек аккумулятора', NULL, NULL, 5),
(12, 'Емкость аккумулятора', NULL, NULL, 5),
(13, 'Вес', NULL, NULL, 6),
(14, 'Габариты', NULL, NULL, 6),
(15, 'Сканер отпечатков пальцев', NULL, NULL, 6),
(16, 'Подсветка клавиатуры', NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `characteristic_parent`
--

CREATE TABLE `characteristic_parent` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `characteristic_parent`
--

INSERT INTO `characteristic_parent` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'Система', NULL, NULL),
(2, 'Экран', NULL, NULL),
(3, 'Подключение и интерфейсы', NULL, NULL),
(4, 'Хранение данных', NULL, NULL),
(5, 'Питание', NULL, NULL),
(6, 'Корпус', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `characteristic_value`
--

CREATE TABLE `characteristic_value` (
  `id` int(11) NOT NULL,
  `value` varchar(45) NOT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `characteristic_child_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `patronymic` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `last_name`, `first_name`, `patronymic`, `email`, `phone`, `password`, `role`, `create_at`, `update_at`) VALUES
(1, 'Сушко', 'Сергей', 'Сергеевич', 'fhlbc2012@gmail.com', '+380 (96) 69-98-368', '$2y$10$fCO2XafidboREdj96T1iUOYxn56iAAhUpmhYrLsJzDhnoBms0u7MO', 'admin', '2019-01-15', NULL),
(2, 'Богданов', 'Дмитрий', 'Константинович', 'serg_173@gmail.com', '+380 (88) 89-55-871', '$2y$10$JtoNflhCq7uKfobpdhKsFe3cUOENt0vhe2pVhghHYYjvSqWwMhiIW', 'user', '2019-01-16', NULL),
(3, 'Белков', 'Вадим', 'Петрович', 's-sushko@gmail.com', '+380 (54) 77-52-111', '$2y$10$5fj51/cCOZFr4VgqLkEHPOOx8LLB9FNq2FSrMrcL9vD1qGL1KlQVO', 'user', '2019-01-16', NULL),
(8, 'wdqw`', 'qedw`', 'wfewd', 'fhlbc20123@gmail.com', '+380 (65) 65-65-656', '$2y$10$HpICjUcaLmi8tTQU8gJjZ.60GTZaNX78/0UiwpureoPdrFDXyLd8e', 'user', '2019-01-24', NULL),
(9, 'Сушко', 'Сергей', 'Сергеевич', 'starsettime@xn--b1a9av.com', '+380 (16) 51-65-635', '$2y$10$PNpowbX2233a9kzMJB7wXeoviioABQfVtJEES.62aLrSNsXzzAcEu', 'user', '2019-01-27', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_added` datetime NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `content`, `date_added`, `create_at`, `update_at`, `client_id`, `product_id`) VALUES
(17, 'Наверное хороший ноутбук!', '2019-01-26 13:41:11', '2019-01-26', NULL, 1, 8),
(18, 'Comment', '2019-01-27 11:11:48', '2019-01-27', NULL, 1, 7),
(19, 'Комментарий', '2019-01-28 20:16:25', '2019-01-28', NULL, 1, 2),
(21, 'укпукп', '2019-01-29 10:51:41', '2019-01-29', NULL, 1, 6),
(22, 'оотудкауц', '2019-01-29 10:52:16', '2019-01-29', NULL, 1, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img` varchar(100) DEFAULT 'NOTPhoto.png',
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `img`, `create_at`, `update_at`) VALUES
(1, 'Lenovo ThinkPad Edge E470 (20H1006YRT) (1).jpg', '2019-01-19', NULL),
(2, 'Lenovo ThinkPad Edge E470 (20H1006YRT) (2).jpg', '2019-01-19', NULL),
(3, 'Lenovo ThinkPad Edge E470 (20H1006YRT) (3).jpg', '2019-01-19', NULL),
(4, 'Lenovo ThinkPad Edge E470 (20H1006YRT) (4).jpg', '2019-01-19', NULL),
(5, 'Lenovo ThinkPad Edge E470 (20H1006YRT) (5).jpg', '2019-01-19', NULL),
(6, 'Lenovo ThinkPad Edge E470 (20H1006YRT) (6).jpg', '2019-01-19', NULL),
(7, 'Lenovo ThinkPad Edge E470 (20H1006YRT) (7).jpg', '2019-01-19', NULL),
(8, 'Apple MacBook Pro 15 Space Gray (MR942) 2018 (1).jpg', '2019-01-19', NULL),
(9, 'Apple MacBook Pro 15 Space Gray (MR942) 2018 (2).jpg', '2019-01-19', NULL),
(10, 'Apple MacBook Pro 15 Space Gray (MR942) 2018 (3).jpg', '2019-01-19', NULL),
(11, 'Apple MacBook Pro 15 Space Gray (MR942) 2018 (4).jpg', '2019-01-19', NULL),
(12, 'Dell Latitude 5591 (N005L559115EMEA P) (1).jpg', '2019-01-19', NULL),
(13, 'Dell Latitude 5591 (N005L559115EMEA P) (2).jpg', '2019-01-19', NULL),
(14, 'Dell Latitude 5591 (N005L559115EMEA P) (3).jpg', '2019-01-19', NULL),
(15, 'HP EliteBook 830 G5 (3ZG02ES) (1).jpg', '2019-01-19', NULL),
(16, 'HP EliteBook 830 G5 (3ZG02ES) (2).jpg', '2019-01-19', NULL),
(17, 'HP EliteBook 830 G5 (3ZG02ES) (3).jpg', '2019-01-19', NULL),
(18, 'HP EliteBook 830 G5 (3ZG02ES) (4).jpg', '2019-01-19', NULL),
(19, 'Apple A1466 MacBook Air 13 (MQD32) (1).jpg', '2019-01-23', NULL),
(20, 'Apple A1466 MacBook Air 13 (MQD32) (2).jpg', '2019-01-23', NULL),
(21, 'Apple A1466 MacBook Air 13 (MQD32) (3).jpg', '2019-01-23', NULL),
(22, 'Apple A1466 MacBook Air 13 (MQD32) (4).jpg', '2019-01-23', NULL),
(23, 'Apple A1466 MacBook Air 13 (MQD32) (5).jpg', '2019-01-23', NULL),
(24, 'Lenovo IdeaPad 330S-15IKB (81GC0070RA) (1).jpg', '2019-01-23', NULL),
(25, 'Lenovo IdeaPad 330S-15IKB (81GC0070RA) (2).jpg', '2019-01-23', NULL),
(26, 'Lenovo IdeaPad 330S-15IKB (81GC0070RA) (3).jpg', '2019-01-23', NULL),
(27, 'Lenovo IdeaPad 330S-15IKB (81GC0070RA) (4).jpg', '2019-01-23', NULL),
(28, 'Lenovo IdeaPad 330S-15IKB (81GC0070RA) (5).jpg', '2019-01-23', NULL),
(29, 'Lenovo IdeaPad 330S-15IKB (81GC0070RA) (6).jpg', '2019-01-23', NULL),
(30, 'Lenovo IdeaPad 330S-15IKB (81GC0070RA) (7).jpg', '2019-01-23', NULL),
(31, 'Lenovo IdeaPad 330S-15IKB (81GC0070RA) (8).jpg', '2019-01-23', NULL),
(32, 'Lenovo IdeaPad 330S-15IKB (81GC0070RA) (9).jpg', '2019-01-23', NULL),
(33, 'HP ProBook 450 G5 (4QW18ES) (1).jpg', '2019-01-26', NULL),
(34, 'HP ProBook 450 G5 (4QW18ES) (2).jpg', '2019-01-26', NULL),
(35, 'HP ProBook 450 G5 (4QW18ES) (3).jpg', '2019-01-26', NULL),
(36, 'HP ProBook 450 G5 (4QW18ES) (4).jpg', '2019-01-26', NULL),
(37, 'HP ProBook 450 G5 (4QW18ES) (5).jpg', '2019-01-26', NULL),
(38, 'MSI GT75-8RF Titan (GT758RF-239UA) (1).jpg', '2019-01-26', NULL),
(39, 'MSI GT75-8RF Titan (GT758RF-239UA) (2).jpg', '2019-01-26', NULL),
(40, 'MSI GT75-8RF Titan (GT758RF-239UA) (3).jpg', '2019-01-26', NULL),
(41, 'MSI GT75-8RF Titan (GT758RF-239UA) (4).jpg', '2019-01-26', NULL),
(42, 'MSI GT75-8RF Titan (GT758RF-239UA) (5).jpg', '2019-01-26', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `images_in_product`
--

CREATE TABLE `images_in_product` (
  `id` int(11) NOT NULL,
  `images_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images_in_product`
--

INSERT INTO `images_in_product` (`id`, `images_id`, `product_id`, `create_at`, `update_at`) VALUES
(1, 1, 1, '2019-01-26', NULL),
(2, 2, 1, '2019-01-26', NULL),
(3, 3, 1, '2019-01-26', NULL),
(4, 4, 1, '2019-01-26', NULL),
(5, 5, 1, '2019-01-26', NULL),
(6, 6, 1, '2019-01-26', NULL),
(7, 7, 1, '2019-01-26', NULL),
(8, 8, 2, '2019-01-26', NULL),
(9, 9, 2, '2019-01-26', NULL),
(10, 10, 2, '2019-01-26', NULL),
(11, 11, 2, '2019-01-26', NULL),
(12, 12, 3, '2019-01-26', NULL),
(13, 13, 3, '2019-01-26', NULL),
(14, 14, 3, '2019-01-26', NULL),
(15, 15, 4, '2019-01-26', NULL),
(16, 16, 4, '2019-01-26', NULL),
(17, 17, 4, '2019-01-26', NULL),
(18, 18, 4, '2019-01-26', NULL),
(19, 19, 5, '2019-01-26', NULL),
(20, 20, 5, '2019-01-26', NULL),
(21, 21, 5, '2019-01-26', NULL),
(22, 22, 5, '2019-01-26', NULL),
(23, 23, 5, '2019-01-26', NULL),
(24, 24, 6, '2019-01-26', NULL),
(25, 25, 6, '2019-01-26', NULL),
(26, 26, 6, '2019-01-26', NULL),
(27, 27, 6, '2019-01-26', NULL),
(28, 28, 6, '2019-01-26', NULL),
(29, 29, 6, '2019-01-26', NULL),
(30, 30, 6, '2019-01-26', NULL),
(31, 31, 6, '2019-01-26', NULL),
(32, 32, 6, '2019-01-26', NULL),
(33, 33, 7, '2019-01-26', NULL),
(34, 34, 7, '2019-01-26', NULL),
(35, 35, 7, '2019-01-26', NULL),
(36, 36, 7, '2019-01-26', NULL),
(37, 37, 7, '2019-01-26', NULL),
(38, 38, 8, '2019-01-26', NULL),
(39, 39, 8, '2019-01-26', NULL),
(40, 40, 8, '2019-01-26', NULL),
(41, 41, 8, '2019-01-26', NULL),
(42, 42, 8, '2019-01-26', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `status` enum('cart','done') NOT NULL DEFAULT 'cart',
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '1',
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `status`, `price`, `amount`, `create_at`, `update_at`, `client_id`) VALUES
(54, 'done', 22999, 8, '2019-01-29', '2019-01-29', 1),
(55, 'done', 43044, 1, '2019-01-29', NULL, 1),
(56, 'done', 35999, 3, '2019-01-29', NULL, 1),
(57, 'cart', 22999, 7, '2019-01-29', '2019-01-29', 1),
(58, 'cart', 71559, 1, '2019-01-29', NULL, 1),
(59, 'cart', 171799, 1, '2019-01-29', NULL, 1),
(60, 'cart', 22999, 1, '2019-01-29', NULL, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `unit` varchar(3) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `unit`, `amount`, `create_at`, `update_at`, `vendor_id`, `category_id`) VALUES
(1, 'Lenovo ThinkPad Edge E470 (20H1006YRT)', 'Производительный и надежный ноутбук ThinkPad E470 — это сочетание безопасности, стильного профессионального дизайна и широких мультимедийных возможностей.\r\n\r\nПродолжительное время автономной работы\r\nНоутбук ThinkPad E470 способен работать автономно до 9 часов, позволяя вам оставаться на связи, даже если аккумулятор ноутбука невозможно зарядить.\r\n\r\nУникальная клавиатура\r\nЛегендарная полноразмерная клавиатура ThinkPad с защитой от пролитой жидкости и манипулятором TrackPoint широко известна благодаря своей эргономичности, функциональности и удобству.\r\n\r\nБыстрый SSD накопитель\r\nЗа быструю работу ноутбука отвечает скоростной SSD накопитель, который обеспечивает моментальный доступ к данным.\r\n\r\nДинамики с поддержкой технологии Dolby Audio Premium\r\nОцените высочайшее качество пространственного звука при прослушивании презентации и просмотре фильма. Эта технология позволяет улучшить чистоту звука для приложений VoIP, максимально увеличить громкость без потери качества и наслаждаться кристально четким звуком при просмотре фильмов.\r\n\r\nВеликолепное качество видеоконференций\r\nВы можете общаться с коллегами по всему миру или выходить на связь с родственниками и друзьями в любом удобном месте, поскольку ноутбук ThinkPad E470 обладает широкими возможностями и оснащен качественными микрофонами.', 20499, 'грн', 0, '2019-01-26', NULL, 1, 6),
(2, 'Apple MacBook Pro 15\" Space Gray (MR942) 2018', 'Мощнее. Умнее. Проще быть про.\r\nНовые процессоры 8-го поколения c четырьмя и шестью ядрами.\r\nДо 16 ГБ памяти для работы сразу в нескольких мощных приложениях.\r\nВпечатляющий дисплей Retina с технологией True Tone.\r\nПанель Touch Bar для более продуктивной работы.\r\nПроизводительность. Ещё больше в ваших силах.\r\nMacBook Pro задаёт совершенно новые стандарты мощности и портативности ноутбуков. Процессоры высокой производительности, память большего объёма, передовая графика, сверхбыстрые накопители и другие впечатляющие способности MacBook Pro помогут вам воплощать в жизнь любые творческие проекты — ещё быстрее, чем раньше.', 71559, 'грн', 0, '2019-01-26', '2019-01-28', 3, 3),
(3, 'Dell Latitude 5591 (N005L559115EMEA P)', 'Компактный ноутбук Dell Latitude 5591 с диагональю экрана 15.6\", обладающий невероятной производительностью и масштабируемостью. Оснащен передовыми функциями защиты и поддерживает универсальные возможности стыковки.\r\n\r\nПовышение производительности работы\r\nПроцессор Intel Core обеспечивает все необходимые возможности для удобства вашей работы в офисе или дома.\r\n\r\nБольше памяти\r\nСпециалисты, которые привыкли работать в режиме многозадачности, оценят достоинства поддержки двух модулей памяти SoDIMM DDR4. С ними можно одновременно держать открытыми несколько приложений и переключаться между ними без задержки.\r\n\r\nЯркое изображение\r\nДисплей с диагональю 15.6 дюйма высокой четкости, имеющий матовое покрытие.\r\n\r\nБесперебойное питание в дороге\r\nРаботайте в любых условиях благодаря аккумулятору, заряда которого хватает на весь день.\r\n\r\nМножество портов\r\nНоутбук оснащен всеми необходимыми портами, включая USB 3.1 и USB Type-C, RJ-45, HDMI и VGA, что позволяет работать с современными устройствами.\r\n\r\nЛучшая защита в своем классе\r\nТолько корпорация Dell одновременно предоставляет комплексные возможности шифрования, расширенную аутентификацию и самые современные средства защиты от вредоносных программ.\r\n\r\nИсключительная надежность и дизайн\r\nПрочный, долговечный корпус этого ноутбука достойно выдержал многочисленные испытания на соответствие военным стандартам MIL-STD 810G, поэтому вы можете быть уверены: ваша система готова к работе в реальных условиях.', 43044, 'грн', 18, '2019-01-26', '2019-01-28', 4, 5),
(4, 'HP EliteBook 830 G5 (3ZG02ES)', 'Расширение возможностей бизнеса и выполнение работы на самом высоком уровне с помощью ультратонкого, профессионального ноутбука. Функции корпоративного класса, комплексные средства безопасности и возможность совместной работы позволяют справляться даже с самыми сложными задачами с оптимизированной эффективностью.\r\n\r\nИдеальное решение для мобильной работы, которое обеспечивает максимальную надежность, высокую производительность и мощные средства работы с графикой в управляемых ИТ-средах по сравнению с другими устройствами своего класса.\r\n\r\nВысокая производительность, высокая портативность\r\nУвеличение скорости обработки ресурсоемких бизнес-приложений и больших объемов информации. Сочетание высокой производительности и большой емкости аккумулятора благодаря процессору Intel Core и SSD-накопителю. Увеличение производительности с помощью памяти DDR4.\r\n\r\nТонкий дизайн и отсутствие потребности в адаптерах\r\nБлагодаря ультратонкому дизайну и нестандартным решениям ноутбук открывает новые грани портативности. HP EliteBook 830 при толщине всего 17.7 мм оснащен несколькими разъемами, такими как Thunderbolt, USB 3.1, HDMI, RJ-45, а также возможностью подключения док-станции.\r\n\r\nЧистый звук и четкое изображение\r\nС помощью технологии HP Audio Boost, ПО подавления шума, а также аудиосистемы Bang & Olufsen и веб-камеры ваши совещания через Интернет не будут ничем отличаться от бесед за круглым столом.\r\n\r\nИзбавьтесь от лишнего шума\r\nПО HP Noise Cancellation подавляет окружающий шум, в том числе звуки клавиатуры.', 35999, 'грн', 11, '2019-01-26', '2019-01-28', 5, 2),
(5, 'Apple A1466 MacBook Air 13\" (MQD32)', 'MacBook Air — на целый день свершений\r\nMacBook Air работает без подзарядки до 12 часов — это означает, что весь день вы свободны от проводов и розеток. Когда захочется отдохнуть, вы сможете смотреть фильмы в iTunes до 12 часов подряд. Кроме того, MacBook Air способен находиться в режиме ожидания до 30 дней. Вы можете сделать перерыв на несколько недель и вернуться к работе там же, где остановились.\r\n\r\nТонкий. Легкий. Мощный. И готов ко всему\r\nПроцессоры Intel Core i5 пятого поколения и графические процессоры Intel HD Graphics 6000 позволят вам решать любые задачи с невероятной скоростью: от редактирования фотографий до поиска в интернете. Все эти возможности помещаются в тонком корпусе unibody, толщина которого всего 1.7 см, а вес — 1.35 кг.\r\n\r\nПоддержка Wi‑Fi 802.11ac — легкие соединения\r\nMacBook Air мгновенно подключается к базовым станциям стандарта 802.11ac, таким как AirPort Extreme или AirPort Time Capsule. Скорость беспроводного соединения при этом в три раза выше, чем у Wi‑Fi предыдущего поколения. Помимо этого, стандарт 802.11ac предусматривает расширенную зону покрытия — вы почувствуете себя свободнее и мобильнее.\r\n\r\nДела идут отлично с SSD‑накопителем\r\nSSD-накопители MacBook Air работают до 17 раз быстрее, чем обычные жесткие диски ноутбуков с частотой 5400 об/мин. Любые задачи выполняются быстро и плавно. А благодаря сочетанию SSD‑накопителей и процессоров Intel Core 5‑го поколения MacBook Air выходит из режима сна еще быстрее, чем прежде.\r\n\r\nmacOS\r\nmacOS — это операционная система, которая стоит за всем, что вы делаете на своём Mac. В macOS Sierra вы сможете общаться с Siri, работать с фотографиями по‑новому и совершенно свободно переключаться между устройствами.', 24389, 'грн', 80, '2019-01-26', '2019-01-28', 3, 4),
(6, 'Lenovo IdeaPad 330S-15IKB (81GC0070RA)', 'Тонкий и легкий\r\n15.6-дюймовый IdeaPad 330S — это стильный, элегантный и удивительно компактный ноутбук. Он идеально подходит как для удаленной работы, так и для просмотра фильмов в дороге и не станет обузой благодаря малому весу.\r\n\r\nСочетание простоты и роскоши\r\nСкошенные углы и лаконичный дизайн. Металлическое покрытие премиум-класса. Узкая рамка.\r\n\r\nПотрясающее качество изображения формата Full HD\r\nНаслаждайтесь восхитительной графикой при потоковой передаче видео или просмотре фото в сети на 15.6-дюймовом IPS-дисплее стандарта Full HD (1920 x 1080).\r\n\r\nНасыщенное звучание благодаря технологии Dolby Audio\r\nIdeaPad 330S станет вашим персональным центром развлечений благодаря кристально чистому и многогранному звуку Dolby Audio. Даже на максимальной громкости динамики передадут тончайшие нюансы звука.\r\n\r\nВысокоскоростное подключение\r\nWi-Fi 802.11 ac и технология Bluetooth 4.1 обеспечивают практически мгновенный доступ в Интернет и подключение к другим устройствам. Скорость соединения стандарта Wi-Fi 802.11 ac в три раза выше по сравнению со стандартом 802.11 b/g/n.', 22999, 'грн', 261, '2019-01-26', '2019-01-29', 1, 4),
(7, 'HP ProBook 450 G5 (4QW18ES)', 'Высокопроизводительный ноутбук HP ProBook 450 G5 обладает рабочими характеристиками и параметрами безопасности, необходимыми для современных пользователей. Этот ноутбук со стильным и прочным корпусом обеспечивает пользователям гибкие возможности для эффективной работы в офисе и за его пределами.\r\n\r\nИдеальное решение для специалистов в компаниях малого и среднего бизнеса, которым необходим приемлемый по цене ноутбук, сочетающий в себе инновационные технологии, эффективные средства защиты и передовые функции работы с мультимедиа.\r\n\r\nРассчитан на мобильность\r\nМощный ноутбук HP ProBook 450 G5 в астероидно-серебристом дизайне и с экраном диагональю 15.6\" станет вашим идеальным спутником, куда бы вы ни отправились.\r\n\r\nВысокая производительность\r\nС легкостью выполняйте любые проекты благодаря процессору Intel.\r\n\r\nПолное погружение\r\nОцените широкие возможности и удобство использования HP ProBook 450 G5, длительное время автономной работы.\r\n\r\nИзбавьтесь от лишнего шума\r\nПО HP Noise Cancellation избавит от окружающего шума, в том числе от звуков клавиатуры.\r\n\r\nРаскройте потенциал аудиосистемы\r\nТехнология HP Audio Boost выведет и без того качественное звучание на новый уровень.', 13399, 'грн', 0, '2019-01-26', NULL, 5, 7),
(8, 'MSI GT75-8RF Titan (GT758RF-239UA)', 'Геймерский дизайн в стиле научной фантастики\r\nGT75 выглядит как компьютер будущего из фантастических романов. Стреловидная форма корпуса подчеркивает агрессивный характер этого игрового устройства, а приподнятая область под запястьями обеспечивает комфортное положение рук во время долгих игровых сессий. Серия GT75 – продуманная эргономика и высокая производительность, которые придутся по вкусу каждому любителю компьютерных игр.', 171799, 'грн', 1, '2019-01-26', '2019-01-29', 7, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `product_in_orders`
--

CREATE TABLE `product_in_orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_in_orders`
--

INSERT INTO `product_in_orders` (`id`, `product_id`, `order_id`, `create_at`, `update_at`) VALUES
(53, 6, 54, '2019-01-29', NULL),
(54, 3, 55, '2019-01-29', NULL),
(55, 4, 56, '2019-01-29', NULL),
(56, 6, 57, '2019-01-29', NULL),
(57, 2, 58, '2019-01-29', NULL),
(58, 8, 59, '2019-01-29', NULL),
(59, 6, 60, '2019-01-29', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'Lenovo', NULL, NULL),
(2, 'Asus', NULL, NULL),
(3, 'Apple', NULL, NULL),
(4, 'Dell', NULL, NULL),
(5, 'HP', NULL, NULL),
(6, 'Xiaomi', NULL, NULL),
(7, 'MSI', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `characteristic_child`
--
ALTER TABLE `characteristic_child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_characteristic_child_characteristic_parent1_idx` (`characteristic_parent_id`);

--
-- Индексы таблицы `characteristic_parent`
--
ALTER TABLE `characteristic_parent`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `characteristic_value`
--
ALTER TABLE `characteristic_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_characteristic_value_characteristic_child1_idx` (`characteristic_child_id`),
  ADD KEY `fk_characteristic_value_product1_idx` (`product_id`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_client1_idx` (`client_id`),
  ADD KEY `fk_comments_product1_idx` (`product_id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images_in_product`
--
ALTER TABLE `images_in_product`
  ADD PRIMARY KEY (`id`,`images_id`,`product_id`),
  ADD KEY `fk_images_has_product_product1_idx` (`product_id`),
  ADD KEY `fk_images_has_product_images1_idx` (`images_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_client1_idx` (`client_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_vendor_idx` (`vendor_id`),
  ADD KEY `fk_product_categories1_idx` (`category_id`);

--
-- Индексы таблицы `product_in_orders`
--
ALTER TABLE `product_in_orders`
  ADD PRIMARY KEY (`id`,`product_id`,`order_id`),
  ADD KEY `fk_product_has_order_order1_idx` (`order_id`),
  ADD KEY `fk_product_has_order_product1_idx` (`product_id`);

--
-- Индексы таблицы `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `characteristic_child`
--
ALTER TABLE `characteristic_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `characteristic_parent`
--
ALTER TABLE `characteristic_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `characteristic_value`
--
ALTER TABLE `characteristic_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `images_in_product`
--
ALTER TABLE `images_in_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `product_in_orders`
--
ALTER TABLE `product_in_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `characteristic_child`
--
ALTER TABLE `characteristic_child`
  ADD CONSTRAINT `fk_characteristic_child_characteristic_parent1` FOREIGN KEY (`characteristic_parent_id`) REFERENCES `characteristic_parent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `characteristic_value`
--
ALTER TABLE `characteristic_value`
  ADD CONSTRAINT `fk_characteristic_value_characteristic_child1` FOREIGN KEY (`characteristic_child_id`) REFERENCES `characteristic_child` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_characteristic_value_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_client1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `images_in_product`
--
ALTER TABLE `images_in_product`
  ADD CONSTRAINT `fk_images_has_product_images1` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_images_has_product_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_client1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_vendor` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_in_orders`
--
ALTER TABLE `product_in_orders`
  ADD CONSTRAINT `fk_product_has_order_order1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_has_order_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
