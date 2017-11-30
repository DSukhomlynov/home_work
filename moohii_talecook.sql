-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 30 2017 г., 21:03
-- Версия сервера: 10.1.25-MariaDB
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `moohii_talecook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(5, 'Subscriptions/Subscription2/8c1a2f.png', 2, 1, 'Subscription', '79406adec1-1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1509613889),
('m140622_111540_create_image_table', 1509613899),
('m140622_111545_add_name_to_image_table', 1509613899);

-- --------------------------------------------------------

--
-- Структура таблицы `tk_category`
--

CREATE TABLE `tk_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) DEFAULT '0',
  `content` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tk_category`
--

INSERT INTO `tk_category` (`id`, `name`, `parent`, `alias`, `active`, `delete`, `content`, `image`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(1, 'Пряники и сладости', 0, 'prjaniki-i-sladosti', 1, 0, '', '', '', '', ''),
(2, 'Капкейки', 1, 'kapkejki', 1, 1, '', '', '', '', ''),
(3, 'Пряники', 1, 'pryaniki', 1, 1, '', '', '', '', ''),
(4, 'Торты', 1, 'tort', 1, 1, '', '', '', '', ''),
(5, 'Зефир', 1, 'zefir', 1, 1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tk_components_kit`
--

CREATE TABLE `tk_components_kit` (
  `id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` tinyint(1) DEFAULT NULL,
  `count_set` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_cooments`
--

CREATE TABLE `tk_cooments` (
  `id` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_answer` int(11) DEFAULT NULL,
  `class_key` varchar(45) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `rating_comment` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_event_calendar`
--

CREATE TABLE `tk_event_calendar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` int(20) NOT NULL,
  `time` varchar(255) NOT NULL,
  `type` varchar(45) NOT NULL,
  `price` decimal(12,2) DEFAULT '0.00',
  `old_price` decimal(12,2) DEFAULT '0.00',
  `location` varchar(500) NOT NULL,
  `content` mediumtext,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_member_groups`
--

CREATE TABLE `tk_member_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `discount` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_order`
--

CREATE TABLE `tk_order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `createdon` varchar(45) DEFAULT NULL,
  `updatedon` varchar(45) DEFAULT NULL,
  `num` varchar(45) DEFAULT NULL,
  `cost` varchar(45) DEFAULT NULL,
  `cart_cost` varchar(45) DEFAULT NULL,
  `delivery_cost` decimal(12,2) DEFAULT '0.00',
  `status` int(11) DEFAULT '0',
  `delivery` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `addresses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_order_addresses`
--

CREATE TABLE `tk_order_addresses` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `createdon` int(20) DEFAULT NULL,
  `updatedon` int(20) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `building` varchar(45) DEFAULT NULL,
  `room` varchar(45) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_order_bonus`
--

CREATE TABLE `tk_order_bonus` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `order_sum` decimal(12,2) DEFAULT '0.00',
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_payment_cards`
--

CREATE TABLE `tk_payment_cards` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `number` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_post`
--

CREATE TABLE `tk_post` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `published` int(4) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  `content` mediumtext,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tk_post`
--

INSERT INTO `tk_post` (`id`, `name`, `published`, `active`, `delete`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `alias`) VALUES
(1, '5 мифов о донорстве крови', 10102017, 1, 1, 'Зачастую мы знаем о донорстве так мало, что даже, осознавая нужность этой процедуры для многих людей, не можем избавиться от сомнений. Где-то глубоко внутри себя, на подсознательном уровне, мы воспринимаем процесс донорства крови как нечто опасное – и вот обычная сдача крови уже обрастает рядом любопытных мифов и заблуждений.  Миф первый: сдавать кровь опасно для здоровья  Однозначно опровергнуть этот миф нельзя. Решая для себя, сдавать кровь или нет, нужно взвесить несколько «за» и «против» – конкретные обстоятельства решают всё.  Каждый потенциальный донор проходит обследование, и если обнаружится, что процедура может нанести вред вашему здоровью, то вам и не дадут этого сделать.', '', '', '', 'cvcvcvcv'),
(6, 'Как больше никогда ничего не забывать?', 12102017, 1, 1, 'Знаете ли вы, что такое «интервальное повторение»? Об этом методе запоминания информации пишет Мэтан Гриффел в блоге Medium, объясняя, в чем разница между краткосрочной и долгосрочной памятью и как можно легко и надолго запоминать важные факты, стихи, цитаты и иностранные слова.\r\n\r\nИнтервальное повторение — это определенная техника заучивания информации, которая основывается на так называемом эффекте интервала. Суть эффекта интервала в том, что запоминать и учить что-то гораздо легче, если ты повторяешь то, что хочешь запомнить, в течение продолжительного периода времени, а не в течение короткого периода.\r\n\r\nДавайте попытаемся представить себе, как вообще работает память. Интуитивно мы все понимаем разницу между кратковременной и долговременной памятью. Если действительно постараться, то в течение нескольких минут запросто можно запомнить номер кредитной карточки, имя незнакомца и даже несколько фактов для какой-нибудь викторины. Правда, спустя 24 часа вы, вероятнее всего, все это забудете. Это и есть кратковременная память.', NULL, NULL, NULL, '2'),
(7, 'Осенняя сонливость', 12112017, 1, 1, 'Почему в дождик нам так отчаянно хочется спать? А почему некоторые мечтают, чтобы осадки поскорее закончились, а другие обожают, когда с неба что-нибудь падает, хотя это и не манна небесная?Почему в дождик нам так отчаянно хочется спать? А почему некоторые мечтают, чтобы осадки поскорее закончились, а другие обожают, когда с неба что-нибудь падает, хотя это и не манна небесная?\r\n\r\nХмурое утро… Хмурые люди в транспорте, сонные лица вокруг, коллеги, еле-еле сдерживающие зевок… На приеме пациенты с «раскалывающейся» головой. «А что вы хотите — погода такая!».\r\n\r\nДействительно — что вы хотите? Чтобы барометр нашей жизни всегда показывал «ясно»? Но вот снова ноет сердце, тяжесть в затылке, пульсирующая боль в висках, ломит в суставах… Днем мучает сонливость, а ночью вы не знаете, как справиться с бессонницей. В итоге — вялость и раздражительность такие, что окружающим лучше не попадаться вам на глаза.\r\n', NULL, NULL, NULL, '3');

-- --------------------------------------------------------

--
-- Структура таблицы `tk_product`
--

CREATE TABLE `tk_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `delete` tinyint(1) DEFAULT '0',
  `price` decimal(12,2) DEFAULT '0.00',
  `old_price` decimal(12,2) DEFAULT '0.00',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `taste` varchar(500) DEFAULT NULL COMMENT 'название вкусов через запетую',
  `complect` varchar(255) DEFAULT NULL COMMENT 'скорее всего нужно хранить через разделитель значения',
  `content` mediumtext,
  `ingredients` mediumtext,
  `shipping_returns` mediumtext,
  `advice` mediumtext,
  `hit` tinyint(1) DEFAULT '0',
  `sale` tinyint(1) DEFAULT '0',
  `only_components_kit` tinyint(1) DEFAULT '0',
  `is_packing` tinyint(1) DEFAULT '0',
  `update` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tk_product`
--

INSERT INTO `tk_product` (`id`, `name`, `parent`, `alias`, `active`, `delete`, `price`, `old_price`, `meta_title`, `meta_description`, `meta_keywords`, `taste`, `complect`, `content`, `ingredients`, `shipping_returns`, `advice`, `hit`, `sale`, `only_components_kit`, `is_packing`, `update`) VALUES
(1, 'Test', 2, 'test', 0, 0, NULL, NULL, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tk_recently_viewed`
--

CREATE TABLE `tk_recently_viewed` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `date` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_refferal_bonus`
--

CREATE TABLE `tk_refferal_bonus` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `refferal_bonus` decimal(12,2) NOT NULL DEFAULT '0.00',
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_settings`
--

CREATE TABLE `tk_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(500) NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `is_json` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tk_settings`
--

INSERT INTO `tk_settings` (`id`, `name`, `value`, `active`, `is_json`) VALUES
(1, 'site_url', 'http://talecookies.ru/', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tk_simple_page`
--

CREATE TABLE `tk_simple_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `content` mediumtext,
  `custom_template` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `delete` tinyint(1) DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tk_simple_page`
--

INSERT INTO `tk_simple_page` (`id`, `name`, `alias`, `content`, `custom_template`, `active`, `delete`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(1, 'О нас', 'o-nas', '', 'about', 1, 0, '', '', ''),
(2, 'Оплата и доставка', 'oplata-i-dostavka', '', 'payment', 1, 0, '', '', ''),
(3, 'Контакты', 'kontakt', '', 'contacts', 1, 0, '', '', ''),
(4, 'Блог', 'blog', '', '', 1, 0, '', '', ''),
(5, 'Наша студия', 'nasha-studiya', '', '', 1, 0, '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tk_subscription`
--

CREATE TABLE `tk_subscription` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(12,2) DEFAULT '0.00',
  `old_price` decimal(12,2) DEFAULT '0.00',
  `information` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tk_subscription`
--

INSERT INTO `tk_subscription` (`id`, `name`, `active`, `price`, `old_price`, `information`) VALUES
(2, 'Gold', 1, '4500.00', '500000.00', '<p>wedwdwdw</p>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `tk_subscription_event`
--

CREATE TABLE `tk_subscription_event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_subscription_event_link`
--

CREATE TABLE `tk_subscription_event_link` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_subscription` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_transaction_log`
--

CREATE TABLE `tk_transaction_log` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type_transaction` int(11) NOT NULL,
  `value` decimal(12,2) NOT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  `date` int(20) DEFAULT NULL,
  `id_transaction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_user`
--

CREATE TABLE `tk_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `refferal_code` varchar(50) DEFAULT NULL,
  `authKey` varchar(255) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `group` varchar(25) DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tk_user`
--

INSERT INTO `tk_user` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `refferal_code`, `authKey`, `accessToken`, `group`) VALUES
(2, 'Dmitry', 'Sukhomlynov', '+38 (095) 590 30 36', 'dm.sukhomlynov@gmail.com', '658b3cdf0f51a2611ea384e8306f706b', '5A02B5CC66F6E', '???[w?g???N4lg?%Y?5?7??@?\n???', 'mpOpgP8eFWR6M66Eu3XlPlpKu97CpRLD', 'admin'),
(3, 'Дмитрий', 'Сухомлинов', '+380955903036', 'DimonDachnoe@yandex.ru', '658b3cdf0f51a2611ea384e8306f706b', NULL, NULL, NULL, 'client');

-- --------------------------------------------------------

--
-- Структура таблицы `tk_user_addresses`
--

CREATE TABLE `tk_user_addresses` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_user_balance`
--

CREATE TABLE `tk_user_balance` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_amount_order` decimal(12,2) DEFAULT '0.00',
  `available_amount_order` decimal(12,2) DEFAULT '0.00',
  `total_amount_refferal` decimal(12,2) DEFAULT '0.00',
  `available_amount_refferal` decimal(12,2) DEFAULT '0.00',
  `available_amount` decimal(12,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_user_calendar_event`
--

CREATE TABLE `tk_user_calendar_event` (
  `id` int(11) NOT NULL,
  `id_user` varchar(45) DEFAULT NULL,
  `id_event` varchar(45) DEFAULT NULL,
  `date_reg` varchar(45) DEFAULT NULL,
  `active` varchar(45) DEFAULT NULL,
  `tk_user_calendar_eventcol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_user_group_discount`
--

CREATE TABLE `tk_user_group_discount` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_user_subscription`
--

CREATE TABLE `tk_user_subscription` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_subscription` int(11) NOT NULL,
  `date` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tk_wishlist`
--

CREATE TABLE `tk_wishlist` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `date` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, '123', '$2y$13$25EhWipTsRoKzj1xoDkkkuz70To3DIjBKr8bTNFUoNSjycuVXQ0Di', 'user'),
(2, '1234', '$2y$13$yX/vAamD/42M90DSVsrEm.oCwZ9VlIi6AMsvDGrE0nYxefvDdoFOK', 'user'),
(3, '12345', '$2y$13$HTFiBmzDbiduFaF4ZVPqU.GIEhdy/XioI3FArmMA7CvJfjuQLCYMm', 'user'),
(4, '123456', '202cb962ac59075b964b07152d234b70', 'user'),
(5, 'DimonDachnoe', '658b3cdf0f51a2611ea384e8306f706b', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `tk_category`
--
ALTER TABLE `tk_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Индексы таблицы `tk_components_kit`
--
ALTER TABLE `tk_components_kit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `set_id_idx` (`set_id`);

--
-- Индексы таблицы `tk_cooments`
--
ALTER TABLE `tk_cooments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ansver_idx` (`id_answer`),
  ADD KEY `user_idx` (`id_user`);

--
-- Индексы таблицы `tk_event_calendar`
--
ALTER TABLE `tk_event_calendar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `alias_UNIQUE` (`alias`);

--
-- Индексы таблицы `tk_member_groups`
--
ALTER TABLE `tk_member_groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tk_order`
--
ALTER TABLE `tk_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_info_idx` (`addresses`),
  ADD KEY `user_info_idx` (`id_user`);

--
-- Индексы таблицы `tk_order_addresses`
--
ALTER TABLE `tk_order_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tk_order_bonus`
--
ALTER TABLE `tk_order_bonus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid_UNIQUE` (`uuid`),
  ADD KEY `bonus_order_idx` (`id_user`);

--
-- Индексы таблицы `tk_payment_cards`
--
ALTER TABLE `tk_payment_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_cards_list_idx` (`id_user`);

--
-- Индексы таблицы `tk_post`
--
ALTER TABLE `tk_post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `alias_UNIQUE` (`alias`);

--
-- Индексы таблицы `tk_product`
--
ALTER TABLE `tk_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `alias_UNIQUE` (`alias`),
  ADD KEY `id_idx` (`parent`);

--
-- Индексы таблицы `tk_recently_viewed`
--
ALTER TABLE `tk_recently_viewed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_idx` (`id_user`),
  ADD KEY `product_idx` (`id_product`);

--
-- Индексы таблицы `tk_refferal_bonus`
--
ALTER TABLE `tk_refferal_bonus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid_UNIQUE` (`uuid`),
  ADD KEY `refferal_bonus_idx` (`id_user`);

--
-- Индексы таблицы `tk_settings`
--
ALTER TABLE `tk_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Индексы таблицы `tk_simple_page`
--
ALTER TABLE `tk_simple_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `alias_UNIQUE` (`alias`);

--
-- Индексы таблицы `tk_subscription`
--
ALTER TABLE `tk_subscription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Индексы таблицы `tk_subscription_event`
--
ALTER TABLE `tk_subscription_event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Индексы таблицы `tk_subscription_event_link`
--
ALTER TABLE `tk_subscription_event_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_idx` (`id_subscription`),
  ADD KEY `event_idx` (`id_event`);

--
-- Индексы таблицы `tk_transaction_log`
--
ALTER TABLE `tk_transaction_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_transaction_UNIQUE` (`id_transaction`);

--
-- Индексы таблицы `tk_user`
--
ALTER TABLE `tk_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `refferal_code_UNIQUE` (`refferal_code`);

--
-- Индексы таблицы `tk_user_addresses`
--
ALTER TABLE `tk_user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_idx` (`id_user`);

--
-- Индексы таблицы `tk_user_balance`
--
ALTER TABLE `tk_user_balance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user_UNIQUE` (`id_user`);

--
-- Индексы таблицы `tk_user_calendar_event`
--
ALTER TABLE `tk_user_calendar_event`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tk_user_group_discount`
--
ALTER TABLE `tk_user_group_discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_status_idx` (`status`),
  ADD KEY `user_group_idx` (`id_user`);

--
-- Индексы таблицы `tk_user_subscription`
--
ALTER TABLE `tk_user_subscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_idx` (`id_user`),
  ADD KEY `subscription_idx` (`id_subscription`);

--
-- Индексы таблицы `tk_wishlist`
--
ALTER TABLE `tk_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_idx` (`id_user`),
  ADD KEY `product_list_idx` (`id_product`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `tk_category`
--
ALTER TABLE `tk_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `tk_components_kit`
--
ALTER TABLE `tk_components_kit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_cooments`
--
ALTER TABLE `tk_cooments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_event_calendar`
--
ALTER TABLE `tk_event_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_member_groups`
--
ALTER TABLE `tk_member_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_order`
--
ALTER TABLE `tk_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_order_addresses`
--
ALTER TABLE `tk_order_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_order_bonus`
--
ALTER TABLE `tk_order_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_payment_cards`
--
ALTER TABLE `tk_payment_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_post`
--
ALTER TABLE `tk_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `tk_product`
--
ALTER TABLE `tk_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `tk_recently_viewed`
--
ALTER TABLE `tk_recently_viewed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_refferal_bonus`
--
ALTER TABLE `tk_refferal_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_settings`
--
ALTER TABLE `tk_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `tk_simple_page`
--
ALTER TABLE `tk_simple_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `tk_subscription`
--
ALTER TABLE `tk_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `tk_subscription_event`
--
ALTER TABLE `tk_subscription_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_subscription_event_link`
--
ALTER TABLE `tk_subscription_event_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_transaction_log`
--
ALTER TABLE `tk_transaction_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_user`
--
ALTER TABLE `tk_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `tk_user_balance`
--
ALTER TABLE `tk_user_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_user_group_discount`
--
ALTER TABLE `tk_user_group_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_user_subscription`
--
ALTER TABLE `tk_user_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tk_wishlist`
--
ALTER TABLE `tk_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tk_cooments`
--
ALTER TABLE `tk_cooments`
  ADD CONSTRAINT `id_ansver` FOREIGN KEY (`id_answer`) REFERENCES `tk_cooments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `tk_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_answer` FOREIGN KEY (`id_answer`) REFERENCES `tk_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tk_order_bonus`
--
ALTER TABLE `tk_order_bonus`
  ADD CONSTRAINT `bonus_order` FOREIGN KEY (`id_user`) REFERENCES `tk_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `log_bonus` FOREIGN KEY (`uuid`) REFERENCES `tk_transaction_log` (`id_transaction`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tk_payment_cards`
--
ALTER TABLE `tk_payment_cards`
  ADD CONSTRAINT `payment_cards_list` FOREIGN KEY (`id_user`) REFERENCES `tk_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tk_recently_viewed`
--
ALTER TABLE `tk_recently_viewed`
  ADD CONSTRAINT `product` FOREIGN KEY (`id_product`) REFERENCES `tk_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`id_user`) REFERENCES `tk_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tk_refferal_bonus`
--
ALTER TABLE `tk_refferal_bonus`
  ADD CONSTRAINT `log_refferal` FOREIGN KEY (`uuid`) REFERENCES `tk_transaction_log` (`id_transaction`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `refferal_bonus` FOREIGN KEY (`id_user`) REFERENCES `tk_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tk_subscription_event_link`
--
ALTER TABLE `tk_subscription_event_link`
  ADD CONSTRAINT `event` FOREIGN KEY (`id_event`) REFERENCES `tk_subscription_event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `subscription` FOREIGN KEY (`id_subscription`) REFERENCES `tk_subscription` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tk_user_addresses`
--
ALTER TABLE `tk_user_addresses`
  ADD CONSTRAINT `addresses_list` FOREIGN KEY (`id_user`) REFERENCES `tk_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tk_user_balance`
--
ALTER TABLE `tk_user_balance`
  ADD CONSTRAINT `user_balance` FOREIGN KEY (`id_user`) REFERENCES `tk_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tk_user_group_discount`
--
ALTER TABLE `tk_user_group_discount`
  ADD CONSTRAINT `info_status` FOREIGN KEY (`status`) REFERENCES `tk_member_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_group` FOREIGN KEY (`id_user`) REFERENCES `tk_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tk_user_subscription`
--
ALTER TABLE `tk_user_subscription`
  ADD CONSTRAINT `subscription_info` FOREIGN KEY (`id_subscription`) REFERENCES `tk_subscription` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_info` FOREIGN KEY (`id_user`) REFERENCES `tk_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tk_wishlist`
--
ALTER TABLE `tk_wishlist`
  ADD CONSTRAINT `product_list` FOREIGN KEY (`id_product`) REFERENCES `tk_product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `wishlist` FOREIGN KEY (`id_user`) REFERENCES `tk_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
