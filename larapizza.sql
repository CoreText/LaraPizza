-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 17 2020 г., 02:14
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `larapizza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ingredients`
--

INSERT INTO `ingredients` (`id`, `user_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'tomato', '2.5', '2020-09-16 17:24:24', '2020-09-16 20:04:33'),
(2, 2, 'test', '0.2', '2020-09-16 17:26:29', '2020-09-16 17:26:29'),
(3, 1, 'sliced mushrooms', '0.5', '2020-09-16 20:06:05', '2020-09-16 20:07:29'),
(4, 1, 'feta cheese', '1.0', '2020-09-16 20:06:44', '2020-09-16 20:07:34'),
(5, 1, 'sliced onion', '0.5', '2020-09-16 20:08:34', '2020-09-16 20:08:34'),
(6, 2, 'sausages', '1', '2020-09-16 20:09:40', '2020-09-16 20:09:40');

-- --------------------------------------------------------

--
-- Структура таблицы `ingredient_user`
--

CREATE TABLE `ingredient_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_14_204058_create_profiles_table', 1),
(6, '2020_09_16_062127_create_ingredients_table', 1),
(7, '2020_09_16_151908_create_ingredient_user_table', 1),
(8, '2020_09_14_213153_create_pizzas_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pizzas`
--

CREATE TABLE `pizzas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingredients` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pizzas`
--

INSERT INTO `pizzas` (`id`, `user_id`, `name`, `price`, `total_price`, `ingredients`, `created_at`, `updated_at`) VALUES
(1, 2, 'Custom Pizza', '1', '3.5', '[{\"id\":1,\"user_id\":1,\"name\":\"tomato\",\"price\":\"2.5\",\"created_at\":\"2020-09-16 20:24:24\",\"updated_at\":\"2020-09-16 23:04:33\"}]', '2020-09-16 17:57:28', '2020-09-16 20:09:55'),
(2, 1, 'Pizza al Pesto', '1.4', '6.1', '[{\"id\":1,\"user_id\":1,\"name\":\"tomato\",\"price\":\"2.5\",\"created_at\":\"2020-09-16 20:24:24\",\"updated_at\":\"2020-09-16 23:04:33\"},{\"id\":2,\"user_id\":2,\"name\":\"test\",\"price\":\"0.2\",\"created_at\":\"2020-09-16 20:26:29\",\"updated_at\":\"2020-09-16 20:26:29\"},{\"id\":4,\"user_id\":1,\"name\":\"feta cheese\",\"price\":\"1.0\",\"created_at\":\"2020-09-16 23:06:44\",\"updated_at\":\"2020-09-16 23:07:34\"},{\"id\":6,\"user_id\":2,\"name\":\"sausages\",\"price\":\"1\",\"created_at\":\"2020-09-16 23:09:40\",\"updated_at\":\"2020-09-16 23:09:40\"}]', '2020-09-16 18:12:08', '2020-09-16 20:13:35'),
(4, 2, 'MacDac Pizza', '0', '5.5', '[{\"id\":1,\"user_id\":1,\"name\":\"tomato\",\"price\":\"2.5\",\"created_at\":\"2020-09-16 20:24:24\",\"updated_at\":\"2020-09-16 23:04:33\"},{\"id\":3,\"user_id\":1,\"name\":\"sliced mushrooms\",\"price\":\"0.5\",\"created_at\":\"2020-09-16 23:06:05\",\"updated_at\":\"2020-09-16 23:07:29\"},{\"id\":4,\"user_id\":1,\"name\":\"feta cheese\",\"price\":\"1.0\",\"created_at\":\"2020-09-16 23:06:44\",\"updated_at\":\"2020-09-16 23:07:34\"},{\"id\":5,\"user_id\":1,\"name\":\"sliced onion\",\"price\":\"0.5\",\"created_at\":\"2020-09-16 23:08:34\",\"updated_at\":\"2020-09-16 23:08:34\"},{\"id\":6,\"user_id\":2,\"name\":\"sausages\",\"price\":\"1\",\"created_at\":\"2020-09-16 23:09:40\",\"updated_at\":\"2020-09-16 23:09:40\"}]', '2020-09-16 20:11:13', '2020-09-16 20:11:13'),
(5, 1, 'MacDac Pizza', '0', '5.5', '[{\"id\":1,\"user_id\":1,\"name\":\"tomato\",\"price\":\"2.5\",\"created_at\":\"2020-09-16 20:24:24\",\"updated_at\":\"2020-09-16 23:04:33\"},{\"id\":3,\"user_id\":1,\"name\":\"sliced mushrooms\",\"price\":\"0.5\",\"created_at\":\"2020-09-16 23:06:05\",\"updated_at\":\"2020-09-16 23:07:29\"},{\"id\":4,\"user_id\":1,\"name\":\"feta cheese\",\"price\":\"1.0\",\"created_at\":\"2020-09-16 23:06:44\",\"updated_at\":\"2020-09-16 23:07:34\"},{\"id\":5,\"user_id\":1,\"name\":\"sliced onion\",\"price\":\"0.5\",\"created_at\":\"2020-09-16 23:08:34\",\"updated_at\":\"2020-09-16 23:08:34\"},{\"id\":6,\"user_id\":2,\"name\":\"sausages\",\"price\":\"1\",\"created_at\":\"2020-09-16 23:09:40\",\"updated_at\":\"2020-09-16 23:09:40\"}]', '2020-09-16 20:12:05', '2020-09-16 20:12:05');

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-09-16 17:24:08', '2020-09-16 17:24:08'),
(2, 2, '2020-09-16 17:25:56', '2020-09-16 17:25:56');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.com', NULL, '$2y$10$/HY4deESZG6RPdMmAIq.sOLkZDTYn3m1Nxxj3Wp1eg8C0e.dg67NK', NULL, '2020-09-16 17:24:08', '2020-09-16 17:24:08'),
(2, 'wat', 'wat@wat.com', NULL, '$2y$10$KJ8Ysr7qXVwlQzj2phikauhZQtuHF7NuRvR3MyYNkDDdi5.m3L6qS', NULL, '2020-09-16 17:25:56', '2020-09-16 17:25:56');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ingredients_name_unique` (`name`),
  ADD KEY `ingredients_user_id_index` (`user_id`);

--
-- Индексы таблицы `ingredient_user`
--
ALTER TABLE `ingredient_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient_user_ingredient_id_foreign` (`ingredient_id`),
  ADD KEY `ingredient_user_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizzas_user_id_index` (`user_id`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_index` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `ingredient_user`
--
ALTER TABLE `ingredient_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ingredient_user`
--
ALTER TABLE `ingredient_user`
  ADD CONSTRAINT `ingredient_user_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `ingredient_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
