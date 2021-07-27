-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 27 2021 г., 14:16
-- Версия сервера: 10.3.30-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `app.beclick.co.il745b7d`
--

-- --------------------------------------------------------

--
-- Структура таблицы `amountworkers`
--

CREATE TABLE IF NOT EXISTS `amountworkers` (
  `id` bigint(20) unsigned NOT NULL,
  `ind` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `amountworkers`
--

INSERT INTO `amountworkers` (`id`, `ind`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'אחד', NULL, '2021-03-20 10:41:26'),
(2, 2, '2-9', NULL, '2021-03-20 10:41:26'),
(3, 3, '10-20', NULL, '2021-03-20 10:41:26'),
(4, 4, '20+', NULL, '2021-03-20 10:41:26');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL,
  `ind` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `ind`, `title`, `sub`, `icon`, `created_at`, `updated_at`) VALUES
(1, NULL, 'אדריכלות ועיצוב', 0, NULL, NULL, '2021-02-22 19:44:38'),
(2, NULL, 'מהנדסים ויועצים', 0, NULL, NULL, '2021-02-18 10:57:13'),
(3, NULL, 'אדריכלים', 1, NULL, NULL, '2021-02-18 10:58:08'),
(4, NULL, 'אדריכלי נוף', 1, NULL, NULL, '2021-02-18 10:58:23'),
(5, 1, 'מהנדסי בניין', 2, NULL, NULL, '2021-03-09 18:02:16'),
(6, 10, 'יועצי תכנון ופרוגרמה', 2, NULL, NULL, '2021-03-09 18:02:16'),
(8, NULL, 'שרותים תומחים', 0, NULL, '2021-02-10 11:20:06', '2021-02-18 10:57:30'),
(10, NULL, 'מבצעי הדמיות מחשב', 8, NULL, '2021-02-10 11:22:49', '2021-02-18 11:08:19'),
(11, NULL, 'בניה ניהול וביצוע', 0, NULL, '2021-02-10 11:23:34', '2021-02-18 10:57:45'),
(12, NULL, 'פיקוח בניה | ניהול פרוייקטים', 11, NULL, '2021-02-10 11:23:49', '2021-02-18 11:10:19'),
(13, NULL, 'אחר', 0, NULL, '2021-02-17 18:20:34', '2021-02-18 10:57:55'),
(14, NULL, 'מעצבי פנים', 1, NULL, '2021-02-18 10:58:45', '2021-02-18 10:58:45'),
(15, NULL, 'מתכנני ערים', 1, NULL, '2021-02-18 10:59:04', '2021-02-18 10:59:04'),
(16, NULL, 'תכנון ירוק / אקולוגי', 1, NULL, '2021-02-18 10:59:16', '2021-02-18 10:59:16'),
(17, NULL, 'שימור מבנים', 1, NULL, '2021-02-18 10:59:30', '2021-02-18 10:59:30'),
(18, NULL, 'מעצבים תעשיתיים', 1, NULL, '2021-02-18 10:59:42', '2021-02-18 10:59:42'),
(19, NULL, 'מעצבים גרפיים', 1, NULL, '2021-02-18 10:59:54', '2021-02-18 10:59:54'),
(20, NULL, 'הנדסאים', 1, NULL, '2021-02-18 11:00:06', '2021-02-18 11:00:06'),
(21, NULL, 'יועצי פנג שואי', 1, NULL, '2021-02-18 11:00:19', '2021-02-18 11:00:19'),
(22, NULL, 'יועצי ומעצבי תאורה', 1, NULL, '2021-02-18 11:02:51', '2021-02-18 11:02:51'),
(23, NULL, 'יועצי צבע', 1, NULL, '2021-02-18 11:03:00', '2021-02-18 11:03:00'),
(24, NULL, 'הום סטיילינג', 1, NULL, '2021-02-18 11:03:10', '2021-02-18 11:03:10'),
(25, 17, 'תכנון מבני תעשיה', 2, NULL, '2021-02-18 11:04:22', '2021-03-09 18:02:16'),
(26, 16, 'תכנון מכני', 2, NULL, '2021-02-18 11:04:30', '2021-03-09 18:02:16'),
(27, 15, 'יועצי כבישים ותנועה', 2, NULL, '2021-02-18 11:04:42', '2021-03-09 18:02:16'),
(28, 14, 'יועצי חשמל', 2, NULL, '2021-02-18 11:04:58', '2021-03-09 18:02:16'),
(29, 13, 'יועצי אינסטלציה - תברואה', 2, NULL, '2021-02-18 11:05:08', '2021-03-09 18:02:16'),
(30, 12, 'יועצי מיזוג אוויר', 2, NULL, '2021-02-18 11:05:20', '2021-03-09 18:02:16'),
(31, 11, 'יועצי מעליות', 2, NULL, '2021-02-18 11:05:30', '2021-03-09 18:02:16'),
(32, 9, 'יועצי בטיחות', 2, NULL, '2021-02-18 11:05:38', '2021-03-09 18:02:16'),
(33, 2, 'יועצי איכות הסביבה וקרקע', 2, NULL, '2021-02-18 11:05:46', '2021-03-09 18:02:16'),
(34, 8, 'יועצי אקוסטיקה', 2, NULL, '2021-02-18 11:05:56', '2021-03-09 18:02:16'),
(35, 7, 'יועצי תקשורת - מחשבים', 2, NULL, '2021-02-18 11:06:04', '2021-03-09 18:02:16'),
(36, 6, 'יועצי איטום - בידוד', 2, NULL, '2021-02-18 11:06:17', '2021-03-09 18:02:16'),
(37, 5, 'יועצי נגישות', 2, NULL, '2021-02-18 11:06:26', '2021-03-09 18:02:16'),
(38, 4, 'יועצי אודיו וידאו', 2, NULL, '2021-02-18 11:06:37', '2021-03-09 18:02:16'),
(39, 3, 'יועצי אלומיניום', 2, NULL, '2021-02-18 11:06:49', '2021-03-09 18:02:16'),
(40, 18, 'ספרינקלרים', 2, NULL, '2021-02-18 11:07:00', '2021-03-09 18:02:16'),
(41, NULL, 'בוני מודלים', 8, NULL, '2021-02-18 11:08:28', '2021-02-18 11:08:28'),
(42, NULL, 'שרטטים', 8, NULL, '2021-02-18 11:08:38', '2021-02-18 11:08:38'),
(43, NULL, 'חשבי כמויות', 8, NULL, '2021-02-18 11:08:48', '2021-02-18 11:08:48'),
(44, NULL, 'צלמי אדריכלות | צלמים', 8, NULL, '2021-02-18 11:08:57', '2021-02-18 11:08:57'),
(45, NULL, 'אומנות - ציור ופיסול', 8, NULL, '2021-02-18 11:09:07', '2021-02-18 11:09:07'),
(46, NULL, 'צבעים וצביעה אמנותית', 8, NULL, '2021-02-18 11:09:19', '2021-02-18 11:09:19'),
(47, NULL, 'בניית אתרי אינטרנט', 8, NULL, '2021-02-18 11:09:30', '2021-02-18 11:09:30'),
(48, NULL, 'מכוני העתקות ודפוס', 8, NULL, '2021-02-18 11:09:41', '2021-02-18 11:09:41'),
(49, NULL, 'יעוץ לעסקים / קואצ''ינג', 8, NULL, '2021-02-18 11:09:50', '2021-02-18 11:09:50'),
(50, NULL, 'שרותי נקיון מקצועי', 8, NULL, '2021-02-18 11:09:58', '2021-02-18 11:09:58'),
(51, NULL, 'ביקורת מבנים', 11, NULL, '2021-02-18 11:10:29', '2021-02-18 11:10:29'),
(52, NULL, 'מודדים', 11, NULL, '2021-02-18 11:10:37', '2021-02-18 11:10:37'),
(53, NULL, 'שמאים', 11, NULL, '2021-02-18 11:10:45', '2021-02-18 11:10:45'),
(54, NULL, 'קבלנים וחברות בניה', 11, NULL, '2021-02-18 11:10:54', '2021-02-18 11:10:54'),
(55, NULL, 'קבלני שיפוצים', 11, NULL, '2021-02-18 11:11:05', '2021-02-18 11:11:05'),
(56, NULL, 'קבלני גבס', 11, NULL, '2021-02-18 11:11:14', '2021-02-18 11:11:14'),
(57, NULL, 'קבלני אינסטלציה | ביוב', 11, NULL, '2021-02-18 11:11:23', '2021-02-18 11:11:23'),
(58, NULL, 'קבלני חשמל', 11, NULL, '2021-02-18 11:11:31', '2021-02-18 11:11:31'),
(59, NULL, 'תמ"א 38', 11, NULL, '2021-02-18 11:11:39', '2021-02-18 11:11:39'),
(60, NULL, 'עיצוב והקמת גינות', 11, NULL, '2021-02-18 11:11:48', '2021-02-18 11:11:48'),
(61, NULL, 'נגרים | נגריות', 11, NULL, '2021-02-18 11:11:57', '2021-02-18 11:11:57'),
(62, NULL, 'רישוי עסקים', 11, NULL, '2021-02-18 11:12:05', '2021-02-18 11:12:05'),
(63, NULL, 'מסגרות', 11, NULL, '2021-02-18 11:12:13', '2021-02-18 11:12:13'),
(65, NULL, 'קבלני שלד', 11, NULL, '2021-06-23 08:21:45', '2021-06-23 08:21:45'),
(66, NULL, 'קבלני אלומיניום', 11, NULL, '2021-06-24 06:22:40', '2021-06-24 06:22:40'),
(67, NULL, 'קבלני טיח', 11, NULL, '2021-06-24 06:27:42', '2021-06-24 06:27:42'),
(68, NULL, 'קבלני איטום', 11, NULL, '2021-06-24 06:28:50', '2021-06-24 06:28:50'),
(69, NULL, 'קבלן מפתח', 11, NULL, '2021-06-24 06:30:34', '2021-06-24 06:30:34');

-- --------------------------------------------------------

--
-- Структура таблицы `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `id` bigint(20) unsigned NOT NULL,
  `profile_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `complaints`
--

INSERT INTO `complaints` (`id`, `profile_id`, `company_id`, `text`, `read`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Жалоба', 0, '2021-03-11 08:54:04', '2021-03-11 08:54:04');

-- --------------------------------------------------------

--
-- Структура таблицы `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
  `id` bigint(20) unsigned NOT NULL,
  `ind` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `experiences`
--

INSERT INTO `experiences` (`id`, `ind`, `title`, `created_at`, `updated_at`) VALUES
(1, NULL, '0-1', NULL, NULL),
(2, NULL, '1-3', NULL, NULL),
(3, NULL, '3-10', NULL, NULL),
(4, NULL, '10+', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` bigint(20) unsigned NOT NULL,
  `profile_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favorites`
--

INSERT INTO `favorites` (`id`, `profile_id`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2021-03-11 08:53:55', '2021-03-11 08:53:55'),
(2, 4, 2, '2021-03-12 09:00:24', '2021-03-12 09:00:24');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(20) unsigned NOT NULL,
  `profile_id` int(11) NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `profile_id`, `file_name`, `path`, `created_at`, `updated_at`) VALUES
(4, 1, 'Без имени-1.png', 'gallery/CFdgGmXOk0iLIm7shKJwGtUwmEB1AyA4aQVGJsPA.png', '2021-02-17 04:46:16', '2021-02-17 04:46:16'),
(5, 1, 'Без имени-1.png', 'gallery/3d1VqyXPpZkZ2nSFm9TtJUQJU0p8dJ0HenT9tLQr.png', '2021-02-17 04:46:16', '2021-02-17 04:46:16'),
(6, 1, 'Без имени-1.png', 'gallery/RrRU010czZdKw8cndHjgteHgQWFLzgcmCoH7SJf8.png', '2021-02-17 04:46:16', '2021-02-17 04:46:16'),
(7, 2, '2904134.png', 'gallery/vxTDSg5LT2rxRGgy3CXdmwiRqOMMoNc7Q6cmvNSB.png', '2021-02-17 06:11:59', '2021-02-17 06:11:59'),
(15, 2, '422545_632_canny_pic.jpg', 'gallery/ASjGcSjsofbiI2yQwDFf98gdz15SkEu4sA85xYUX.png', '2021-02-17 13:39:44', '2021-02-17 13:39:44'),
(17, 4, 'Скриншот 08-03-2021 230109.jpg', 'gallery/ohfgYQSDDCQZWDJ3xtfBPXedeAgDApUplPlCbXeI.jpeg', '2021-03-11 08:38:50', '2021-03-11 08:38:50'),
(18, 4, 'Скриншот 08-03-2021 230109.jpg', 'gallery/AAZPwHOTY9XuqCVy8WWknsWEk2BpWA8DiFlTLj2y.jpeg', '2021-03-11 08:38:50', '2021-03-11 08:38:50'),
(19, 4, 'Скриншот 08-03-2021 230109.jpg', 'gallery/eWLKT7Is6U8DXUn4dooOcxjPXCihaKX2BmYSS8L2.jpeg', '2021-03-11 08:38:50', '2021-03-11 08:38:50');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) unsigned NOT NULL,
  `profile_id` int(11) NOT NULL,
  `e_mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `profile_id`, `e_mail`, `subject`, `message`, `mail`, `created_at`, `updated_at`) VALUES
(1, 1, 'maron.alexey@gmail.com', 'Вам приглашение', 'Вас приглавсили в beclik', 0, '2021-02-17 05:02:30', '2021-02-17 05:02:30'),
(2, 4, 'artppr@ya.ru', 'Вам приглашение', 'Вас приглавсили в beclik', 0, '2021-03-11 10:39:16', '2021-03-11 10:39:16'),
(3, 5, 'maron.alexey@gmail.com', 'Вам приглашение', 'Вас приглавсили в beclik', 0, '2021-07-25 18:33:11', '2021-07-25 18:33:11'),
(4, 5, 'maron.alexey@gmail.com', 'Вам приглашение', 'Вас приглавсили в beclik', 0, '2021-07-26 08:35:24', '2021-07-26 08:35:24');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_28_235710_create_profiles_table', 2),
(5, '2021_01_29_114337_create_reviews_table', 2),
(6, '2021_01_29_114540_create_images_table', 2),
(7, '2021_02_01_105149_create_categories_table', 3),
(8, '2021_02_01_121944_create_regions_table', 4),
(9, '2021_02_02_211736_create_experiences_table', 5),
(10, '2021_02_02_212353_create_amountworkers_table', 6),
(11, '2021_02_02_214015_create_others_table', 7),
(12, '2021_02_10_162708_create_specializations_table', 8),
(13, '2021_02_11_223728_create_favorites_table', 9),
(14, '2021_02_11_224058_create_complaints_table', 9),
(15, '2021_02_11_234649_create_needcategories_table', 10),
(16, '2021_02_13_151804_create_projects_table', 11),
(17, '2021_02_14_151444_create_messages_table', 12),
(18, '2021_02_14_171759_create_requesteds_table', 13),
(19, '2021_02_15_160600_create_responses_table', 14),
(20, '2021_02_16_222235_create_views_table', 15),
(21, '2021_07_18_154143_add_provider_to_users', 16),
(22, '2021_07_18_154401_add_provider_id_to_users', 16),
(23, '2021_07_25_204014_create_social_accounts_table', 16);

-- --------------------------------------------------------

--
-- Структура таблицы `needs`
--

CREATE TABLE IF NOT EXISTS `needs` (
  `id` bigint(20) unsigned NOT NULL,
  `profile_id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `needs`
--

INSERT INTO `needs` (`id`, `profile_id`, `name`, `title`, `text`, `read`, `created_at`, `updated_at`) VALUES
(1, 1, 'Сертификат', 'Право на убиство', 'оптом', 0, '2021-02-16 16:41:51', '2021-02-16 16:41:51'),
(2, 1, 'Категория', 'להוסיף טכנאי', 'נא תוסיפו קטגוריה טכנאי מ''''א', 0, '2021-03-09 15:35:39', '2021-03-09 15:35:39'),
(3, 2, 'Категория', 'Новая категория', 'Нужна такая вот категория', 0, '2021-03-16 08:23:23', '2021-03-16 08:23:23'),
(4, 2, 'Категория', 'апрапрапрапрапр', 'арапапаппопа', 0, '2021-03-16 08:23:57', '2021-03-16 08:23:57');

-- --------------------------------------------------------

--
-- Структура таблицы `others`
--

CREATE TABLE IF NOT EXISTS `others` (
  `id` bigint(20) unsigned NOT NULL,
  `ind` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `others`
--

INSERT INTO `others` (`id`, `ind`, `title`, `sub`, `created_at`, `updated_at`) VALUES
(1, 1, 'תעודות', 0, NULL, '2021-03-20 13:33:00'),
(2, 2, 'חבר באיגוד', 0, NULL, '2021-03-20 13:35:57'),
(3, 3, 'שונות', 0, NULL, '2021-03-20 13:34:28'),
(4, 4, 'תוכנות', 0, NULL, '2021-03-20 13:33:20'),
(5, 1, 'קבלן רשום', 1, NULL, '2021-03-20 13:34:49'),
(6, 2, 'רשום בפנקס מהנדסים ואדריכלים', 1, NULL, '2021-03-20 13:35:10'),
(8, 1, 'NFPA IL', 2, NULL, '2021-03-20 13:36:14'),
(10, 1, 'יעוץ חינם', 3, NULL, '2021-03-20 13:34:14'),
(12, 1, 'אוטוקאד', 4, NULL, '2021-03-20 13:33:30'),
(13, 2, 'רווית', 4, NULL, '2021-03-20 13:33:36'),
(15, NULL, 'בינרית', 4, '2021-03-20 13:33:46', '2021-03-20 13:33:46'),
(16, NULL, 'דקל', 4, '2021-03-20 13:33:57', '2021-03-20 13:33:57');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('artppr@ya.ru', '$2y$10$L36zjVwrtWDdTG2NCTxFW.9pZ2gJscoZfZHTZEL5Wavs4Qaf6D58e', '2021-03-12 08:54:11'),
('irris-perm@mail.ru', '$2y$10$HMExtqvAscnScOj80YhzyurPTcKPqWko0E.46XFoKM9ewieI3Gjdm', '2021-03-19 21:15:05'),
('icetekshoret@gmail.com', '$2y$10$1DdurUiKIGVlxknVDIku0ei0BsTcXNTJdUtyjUKuBgitVFcr8JhyO', '2021-07-26 12:54:17');

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` bigint(20) unsigned NOT NULL,
  `advert` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `subscription` datetime DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` int(11) NOT NULL DEFAULT 0,
  `phone_whatsapp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `specialization_id` int(11) DEFAULT NULL,
  `specialization_list` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone_d` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viber` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amountworkers` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_week` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_sat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_alw` int(11) NOT NULL DEFAULT 0,
  `shabat` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `num_proj` int(11) NOT NULL DEFAULT 0,
  `resp_time` int(11) NOT NULL DEFAULT 1,
  `resp_num` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `advert`, `user_id`, `subscription`, `name`, `address`, `confirmed`, `phone_whatsapp`, `email`, `category_id`, `subcategory_id`, `specialization_id`, `specialization_list`, `image`, `pdf`, `contact_person`, `contact_phone`, `contact_phone_d`, `telegram`, `viber`, `description`, `regions`, `site`, `experience`, `amountworkers`, `others`, `mode_week`, `mode_sat`, `mode_alw`, `shabat`, `views`, `num_proj`, `resp_time`, `resp_num`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, 'מרון אלכסי', 'HaHagana 1/6', 1, '0547469313', 'office@maron-eng.com', 2, 6, 3, 'תמ''''א 38', 'image/iEAtcFdnT3V49Lx27VJTE6Q1NwStI7Pc2wXVXpeh.jpeg', 'pdf/Z8QNBvoo9UF604kXZZq7WvD2GodIpXn7exw5PZIi.pdf', 'אלכסי', NULL, NULL, '0547469313', '0547469313', 'תכנון מערכות ספרינקלרים', '|Весь Израиль', 'https://sprinkler-email-marketing.webflow.io/more-info', '3-10', '2-9', '|<>Сертификаты|Сертификат 1|Сертификат 2|<>Ассоциации|Nasa|<>Доп услуги|Бесплатный выезд', '17:00|08:00', '06:00|06:00', 1, 1, 8, 3, 1, 1, '2021-02-03 07:47:17', '2021-07-26 13:11:48'),
(2, 1, 1, NULL, 'Производитель кода', 'sdgdsg', 1, NULL, NULL, 1, 4, NULL, NULL, 'image/4CGMEptmMTzQjM6iYcohojFaqNq8dRZ8z7scQAeR.jpeg', 'pdf/bLQCKuGIHbXB7MWNWJijkJq9jkKv2q75aRUAPfrY.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0-1', 'only me', '|<>Сертификаты|Сертификат 1|Сертификат 2|Сертификат 3|<>Ассоциации|Nasa|Белый дом|<>Доп услуги|Бесплатная консультация|<>Программы|Автокад', '06:00|06:00', NULL, 1, 0, 3, 0, 46576, 3, '2021-02-16 17:59:04', '2021-03-19 20:10:56'),
(3, 0, 4, NULL, 'Компания', 'ул. Ленина дом 1', 1, '8906888888888', 'scgscdcfd@mail.ru', 1, 3, 1, 'чиню, лужу, пояю', 'image/6CfzJp13LJfNpOVAWJVGc8WUxSp3MlcVS4fcltRT.png', 'pdf/B3GmGMIGmR2OXPbiYhJeKS6kAT0N1jAM39dUNX8Z.pdf', 'konst', '553355886', '221', 'tg.me', '6565758585', 'New company', '|Московский|Ленинский|Ташкентский', 'www.company.me', '1-3', '2-9', '|<>Сертификаты|Сертификат 1|Сертификат 2|<>Ассоциации|Nasa|<>Доп услуги|Бесплатный выезд', '19:00|09:00', '16:00|11:00', 0, 1, 1, 2, 205, 3, '2021-02-22 08:48:54', '2021-03-11 08:52:08'),
(4, 0, 3, NULL, 'Webhyper', 'Tukhachevskogo 26/9', 1, '89964170182', 'artppr@ya.ru', 1, NULL, 1, 'Веб-разработка, веб-дизайн', 'image/nYLEzPJFbd4oc3fuA0oL0zTlZK49aSRZAfCZJICR.jpeg', 'pdf/xh65BVvr8Rlv7ZcUkJbeKWLP7aPLlQUOv4Vg93fc.pdf', 'Гончаров Алексей', '+79964170182', NULL, '@webhyper', NULL, NULL, '|Московский|Мурманский|Хабаровский', 'https://microsoft.com', '1-3', '2-9', '|<>Сертификаты|Сертификат 2|<>Доп услуги|Бесплатная консультация|Бесплатный выезд', NULL, '19:00|08:00', 0, 1, 0, 2, 1, 1, '2021-03-11 08:38:50', '2021-03-18 06:53:37'),
(5, 0, 5, NULL, 'בוקין מהנדסים', NULL, 1, NULL, 'icetekshoret@gmail.com', 2, 29, 1, NULL, 'image/qrFfnev4jjCqpK4EDeEIJuhFxfIykuPCaNUZB2GO.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '| ירושלים| קרית גת והסביבה|זיכרון - בנימינה| כרמיאל והסביבה', NULL, '3-10', '2-9', '|<>תעודות|רשום בפנקס מהנדסים ואדריכלים|<>שונות|יעוץ חינם|<>תוכנות|בינרית|דקל|אוטוקאד|רווית', '08:00|17:00', '09:00|13:00', 0, 1, 4, 3, 204, 2, '2021-03-11 10:35:27', '2021-07-26 18:25:54'),
(6, 0, 15, NULL, 'dgdfgdfgd', 'dfgdfgdfg', 1, NULL, 'vladij01@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 236, 2, '2021-07-25 18:17:02', '2021-07-26 12:52:10'),
(7, 0, 17, NULL, 'מרון אלכסי', 'ההגנה 1', 1, '0547469313', 'office@beclick.co.il', 1, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0-1', NULL, '|<>תעודות|קבלן רשום|רשום בפנקס מהנדסים ואדריכלים|<>חבר באיגוד|NFPA IL|<>שונות|יעוץ חינם|<>תוכנות|בינרית|דקל|אוטוקאד|רווית', NULL, NULL, 0, 0, 0, 1, 1, 1, '2021-07-26 18:28:04', '2021-07-26 18:28:37');

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) unsigned NOT NULL,
  `profile_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `questions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `docs_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_hide` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `profile_id`, `title`, `text`, `type_id`, `questions`, `regions`, `docs_url`, `contact_hide`, `views`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '555 Новы проект', 'Строительство моста', 1, '<p><strong>Общая площадь объекта</strong></p> 500 m2<p><strong>Вопрос единичный выбор</strong></p> Вариант 2<p><strong>Вопрос множественный выбор</strong></p> Вариант 1 Вариант 2 Вариант 3', '|Московский|Ленинский', '000 джамбомал-ссылка', 1, 2, 0, '2021-02-16 19:00:55', '2021-02-22 16:06:40'),
(2, 1, 'תכנון מבנה תעשיה', 'נדרש לתכנן מבנה תעשייה קלה בשטח 2000 מ''''ר', 2, '<p><strong>Общая площадь объекта</strong></p> 500 m2<p><strong>Вопрос единичный выбор</strong></p> Вариант 2<p><strong>Вопрос множественный выбор</strong></p> Вариант 1 Вариант 2 Вариант 3', '|Мурманский', 'https://www.jumbomail.me/j/qWDt6IV9TkuRvpD', 0, 5, 1, '2021-02-17 05:01:48', '2021-03-18 07:57:18'),
(3, 1, 'תמ''''א 38', 'תכנון מבנה תמ''''א 38', 1, '<p><strong>Общая площадь объекта</strong></p> 100050000м2<p><strong>Вопрос единичный выбор</strong></p> Вариант 2<p><strong>Вопрос множественный выбор</strong></p> Вариант 1 Вариант 2 Вариант 3', '|Московский|Ленинский', '''קכגדכגד', 0, 5, 0, '2021-02-18 10:44:59', '2021-03-18 07:58:05'),
(10, 5, 'цукеуцыыы', 'ывпукпукпкп', 6, '<p><strong>שטח מ''''ר</strong></p> авп<p><strong>יעוד המבנה</strong></p> вапва', '| מעלה אדומים והסביבה| הרי יהודה - מבשרת והסביבה| בית שמש והסביבה| ירושלים', 'павпавпвапв', 0, 0, 0, '2021-07-25 18:32:47', '2021-07-25 18:32:47'),
(11, 5, 'רעגר', 'געיגכעגכ', 6, '<p><strong>שטח מ''''ר</strong></p> גכעגכ<p><strong>יעוד המבנה</strong></p> כגעגכ', '| הוד השרון והסביבה| כפר סבא רעננה| רמת השרון - הרצליה| נתניה והסביבה| יישובי עמק חפר| חדרה| פרדס חנה - כרכור|קיסריה', 'קריגע', 0, 1, 0, '2021-07-26 08:56:16', '2021-07-26 12:51:32'),
(12, 1, 'gjghjghhgj', 'jghjhfd', 1, '<p><strong>שטח מ''''ר</strong></p> м2fgj<p><strong>שונות</strong></p> בריכה מרתף<p><strong>מספר קומות</strong></p> שתי קומות', '| הוד השרון והסביבה| כפר סבא רעננה| רמת השרון - הרצליה| נתניה והסביבה| יישובי עמק חפר| חדרה| פרדס חנה - כרכור|קיסריה', 'gfjf', 0, 0, 0, '2021-07-26 13:14:18', '2021-07-26 13:14:18'),
(13, 5, 'test', 'vvvv', 6, '<p><strong>שטח מ''''ר</strong></p> <p><strong>יעוד המבנה</strong></p> ', '| ראש פינה והסביבה| נצרת -שפרעם והסביבה| כרמיאל והסביבה| הכנרת והסביבה| גליל עליון| עכו -נהריה והסביבה| קריות והסביבה|חיפה וחוף הכרמל והסביבה|גליל תחתון|הגולן', NULL, 0, 0, 0, '2021-07-26 18:25:54', '2021-07-26 18:25:54'),
(14, 7, 'bvbvcbvc', 'dfbfbcvbcv', 2, '<p><strong>שטח מ''''ר</strong></p> ', '| מעלה אדומים והסביבה| הרי יהודה - מבשרת והסביבה| בית שמש והסביבה| ירושלים', NULL, 0, 0, 0, '2021-07-26 18:28:37', '2021-07-26 18:28:37');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) unsigned NOT NULL,
  `ind` int(11) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `type_question` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variants` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `ind`, `type_id`, `type_question`, `title`, `variants`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'שטח מ''''ר', 'м2', NULL, '2021-06-09 14:13:45'),
(3, 3, 1, 3, 'שונות', 'בריכה|מרתף', NULL, '2021-06-09 14:13:45'),
(4, 1, 1, 2, 'מספר קומות', 'קומת קרקע בלבד|שתי קומות', '2021-02-28 20:08:34', '2021-03-20 13:29:28'),
(5, NULL, 2, 1, 'שטח מ''''ר', NULL, '2021-06-09 14:14:25', '2021-06-09 14:14:25'),
(6, NULL, 5, 1, 'שטח מ''''ר', NULL, '2021-06-09 14:14:59', '2021-06-09 14:14:59'),
(7, NULL, 5, 1, 'יעוד תעשיה', NULL, '2021-06-09 14:15:12', '2021-06-09 14:15:12'),
(8, NULL, 3, 1, 'שטח מ''''ר', NULL, '2021-06-09 14:15:28', '2021-06-09 14:15:28'),
(9, NULL, 3, 1, 'מס'' יחידות', NULL, '2021-06-09 14:15:53', '2021-06-09 14:15:53'),
(10, NULL, 4, 1, 'שטח מ''''ר', NULL, '2021-06-09 14:16:10', '2021-06-09 14:16:10'),
(11, NULL, 6, 1, 'שטח מ''''ר', NULL, '2021-06-09 14:16:49', '2021-06-09 14:16:49'),
(12, NULL, 6, 1, 'יעוד המבנה', NULL, '2021-06-09 14:17:13', '2021-06-09 14:17:13');

-- --------------------------------------------------------

--
-- Структура таблицы `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` bigint(20) unsigned NOT NULL,
  `ind` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `regions`
--

INSERT INTO `regions` (`id`, `ind`, `title`, `sub`, `created_at`, `updated_at`) VALUES
(1, 1, 'צפון', 0, NULL, '2021-03-23 17:43:40'),
(5, 1, 'גליל תחתון', 1, NULL, '2021-03-23 17:44:57'),
(6, NULL, 'Мурманский', 2, NULL, NULL),
(7, NULL, 'Хабаровский', 2, NULL, NULL),
(8, NULL, 'Ташкентский', 3, NULL, NULL),
(9, NULL, 'Грузинский', 3, NULL, NULL),
(10, 2, 'הגולן', 1, '2021-03-23 17:44:27', '2021-03-23 17:44:49'),
(11, NULL, ' ראש פינה והסביבה', 1, '2021-03-23 17:45:06', '2021-03-23 17:45:06'),
(12, NULL, ' נצרת -שפרעם והסביבה', 1, '2021-03-23 17:45:11', '2021-03-23 17:45:11'),
(13, NULL, ' כרמיאל והסביבה', 1, '2021-03-23 17:45:15', '2021-03-23 17:45:15'),
(14, NULL, ' הכנרת והסביבה', 1, '2021-03-23 17:45:21', '2021-03-23 17:45:21'),
(15, NULL, ' גליל עליון', 1, '2021-03-23 17:45:25', '2021-03-23 17:45:25'),
(16, NULL, ' עכו -נהריה והסביבה', 1, '2021-03-23 17:45:29', '2021-03-23 17:45:29'),
(17, NULL, ' קריות והסביבה', 1, '2021-03-23 17:45:34', '2021-03-23 17:45:34'),
(18, NULL, 'חיפה וחוף הכרמל והסביבה', 1, '2021-03-23 17:45:39', '2021-03-23 17:45:39'),
(19, NULL, 'זיכרון ועמקים', 0, '2021-03-23 17:45:52', '2021-03-23 17:45:52'),
(20, NULL, ' רמות מנשה והסביבה', 19, '2021-03-23 17:46:02', '2021-03-23 17:46:02'),
(21, NULL, ' עמק בית שאן', 19, '2021-03-23 17:46:05', '2021-03-23 17:46:05'),
(22, NULL, ' עפולה והעמקים', 19, '2021-03-23 17:46:09', '2021-03-23 17:46:09'),
(23, NULL, 'זיכרון - בנימינה', 19, '2021-03-23 17:46:13', '2021-03-23 17:46:13'),
(24, NULL, 'שרון צפוני ודרומי', 0, '2021-03-23 17:46:21', '2021-03-23 17:46:21'),
(25, NULL, ' הוד השרון והסביבה', 24, '2021-03-23 17:46:26', '2021-03-23 17:46:26'),
(26, NULL, ' כפר סבא רעננה', 24, '2021-03-23 17:46:30', '2021-03-23 17:46:30'),
(27, NULL, ' רמת השרון - הרצליה', 24, '2021-03-23 17:46:34', '2021-03-23 17:46:34'),
(28, NULL, ' נתניה והסביבה', 24, '2021-03-23 17:46:37', '2021-03-23 17:46:37'),
(29, NULL, ' יישובי עמק חפר', 24, '2021-03-23 17:46:41', '2021-03-23 17:46:41'),
(30, NULL, ' חדרה', 24, '2021-03-23 17:46:45', '2021-03-23 17:46:45'),
(31, NULL, ' פרדס חנה - כרכור', 24, '2021-03-23 17:46:50', '2021-03-23 17:46:50'),
(32, NULL, 'קיסריה', 24, '2021-03-23 17:46:53', '2021-03-23 17:46:53'),
(33, NULL, 'מרכז', 0, '2021-03-23 17:46:58', '2021-03-23 17:46:58'),
(34, NULL, ' מודיעין והסביבה', 33, '2021-03-23 17:47:10', '2021-03-23 17:47:10'),
(35, NULL, ' שוהם והסביבה', 33, '2021-03-23 17:47:14', '2021-03-23 17:47:14'),
(36, NULL, ' עמק איילון', 33, '2021-03-23 17:47:18', '2021-03-23 17:47:18'),
(37, NULL, ' בני ברק - גבעת שמואל', 33, '2021-03-23 17:47:22', '2021-03-23 17:47:22'),
(38, NULL, ' רמלה - לוד', 33, '2021-03-23 17:47:26', '2021-03-23 17:47:26'),
(39, NULL, ' בקעת אונו', 33, '2021-03-23 17:47:30', '2021-03-23 17:47:30'),
(40, NULL, ' ראש העין והסביבה', 33, '2021-03-23 17:47:34', '2021-03-23 17:47:34'),
(41, NULL, ' פתח תקווה והסביבה', 33, '2021-03-23 17:47:37', '2021-03-23 17:47:37'),
(42, NULL, ' רמת גן - גבעתיים', 33, '2021-03-23 17:47:41', '2021-03-23 17:47:41'),
(43, NULL, ' חולון - בת ים', 33, '2021-03-23 17:47:45', '2021-03-23 17:47:45'),
(44, NULL, ' ראשון לציון והסביבה', 33, '2021-03-23 17:47:48', '2021-03-23 17:47:48'),
(45, NULL, 'תל אביב', 33, '2021-03-23 17:47:52', '2021-03-23 17:47:52'),
(46, NULL, 'אזור ירושלים', 0, '2021-03-23 17:48:06', '2021-03-23 17:48:06'),
(47, NULL, ' מעלה אדומים והסביבה', 46, '2021-03-23 17:48:13', '2021-03-23 17:48:13'),
(49, NULL, ' הרי יהודה - מבשרת והסביבה', 46, '2021-03-23 17:48:18', '2021-03-23 17:48:18'),
(50, NULL, ' בית שמש והסביבה', 46, '2021-03-23 17:48:26', '2021-03-23 17:48:26'),
(51, NULL, ' ירושלים', 46, '2021-03-23 17:48:31', '2021-03-23 17:48:31'),
(52, NULL, 'השומרון והבקעה', 0, '2021-03-23 17:48:35', '2021-03-23 17:48:35'),
(53, NULL, ' אריאל ויישובי יהודה', 52, '2021-03-23 17:48:43', '2021-03-23 17:48:43'),
(54, NULL, ' בקעת הירדן וצפון ים המלח', 52, '2021-03-23 17:48:47', '2021-03-23 17:48:47'),
(55, NULL, ' גוש עציון', 52, '2021-03-23 17:48:52', '2021-03-23 17:48:52'),
(56, NULL, ' יישובי שומרון', 52, '2021-03-23 17:48:57', '2021-03-23 17:48:57'),
(57, NULL, ' יישובי דרום ההר', 52, '2021-03-23 17:49:02', '2021-03-23 17:49:02'),
(58, NULL, 'שפלה', 0, '2021-03-23 17:49:07', '2021-03-23 17:49:07'),
(59, NULL, ' קרית גת והסביבה', 58, '2021-03-23 17:49:14', '2021-03-23 17:49:14'),
(60, NULL, ' גדרה-יבנה והסביבה', 58, '2021-03-23 17:49:20', '2021-03-23 17:49:20'),
(61, NULL, ' אשדוד - אשקלון והסביבה', 58, '2021-03-23 17:49:23', '2021-03-23 17:49:23'),
(62, NULL, 'נס ציונה - רחובות', 58, '2021-03-23 17:49:27', '2021-03-23 17:49:27'),
(63, NULL, 'דרום', 0, '2021-03-23 17:49:35', '2021-03-23 17:49:35'),
(64, NULL, ' דרום ים המלח', 63, '2021-03-23 17:49:40', '2021-03-23 17:49:40'),
(65, NULL, ' הנגב המערבי', 63, '2021-03-23 17:49:44', '2021-03-23 17:49:44'),
(66, NULL, ' יישובי הנגב', 63, '2021-03-23 17:49:47', '2021-03-23 17:49:47'),
(67, NULL, ' אילת והערבה', 63, '2021-03-23 17:49:51', '2021-03-23 17:49:51'),
(68, NULL, 'באר שבע והסביבה', 63, '2021-03-23 17:49:55', '2021-03-23 17:49:55');

-- --------------------------------------------------------

--
-- Структура таблицы `requesteds`
--

CREATE TABLE IF NOT EXISTS `requesteds` (
  `id` bigint(20) unsigned NOT NULL,
  `profile_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `read` int(25) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `requesteds`
--

INSERT INTO `requesteds` (`id`, `profile_id`, `project_id`, `company_id`, `status`, `read`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 1, 0, '2021-02-17 05:03:08', '2021-03-18 07:57:56'),
(2, 2, 1, 1, 1, 1, '2021-02-17 15:50:30', '2021-02-22 16:06:40'),
(3, 1, 3, 2, 0, 0, '2021-02-18 10:46:37', '2021-02-21 20:44:48'),
(22, 2, 1, 1, 0, 1, '2021-02-21 20:37:11', '2021-02-22 16:06:40'),
(23, 2, 4, 1, 0, 1, '2021-02-21 20:37:11', '2021-02-22 15:25:17'),
(24, 3, 5, 2, 0, 0, '2021-02-22 09:04:44', '2021-02-22 11:22:09'),
(25, 3, 5, 1, 0, 0, '2021-02-22 12:41:11', '2021-02-22 12:41:11'),
(26, 2, 1, 3, 0, 0, '2021-02-22 15:47:42', '2021-02-22 16:23:49'),
(27, 2, 4, 3, 0, 0, '2021-02-22 15:47:42', '2021-02-22 15:53:19'),
(28, 4, 8, 3, 0, 1, '2021-03-11 08:52:35', '2021-03-13 08:05:01'),
(29, 4, 8, 1, 0, 1, '2021-03-12 08:57:21', '2021-03-13 08:05:01'),
(30, 4, 8, 2, 0, 0, '2021-03-12 08:57:21', '2021-03-18 08:02:17'),
(31, 4, 8, 5, 1, 0, '2021-03-12 08:57:21', '2021-06-23 06:17:12'),
(32, 2, 4, 4, 0, 0, '2021-03-18 07:46:02', '2021-03-18 07:46:02'),
(33, 2, 4, 5, 1, 0, '2021-03-18 07:46:02', '2021-06-23 06:17:18'),
(34, 5, 10, 1, 0, 0, '2021-07-26 03:00:36', '2021-07-26 03:00:36'),
(35, 5, 11, 1, 0, 0, '2021-07-26 08:56:46', '2021-07-26 08:56:46'),
(36, 5, 11, 2, 0, 0, '2021-07-26 08:57:24', '2021-07-26 08:57:24'),
(37, 5, 11, 3, 0, 0, '2021-07-26 08:57:24', '2021-07-26 08:57:24'),
(38, 5, 11, 4, 0, 0, '2021-07-26 08:57:24', '2021-07-26 08:57:24'),
(39, 5, 11, 6, 0, 0, '2021-07-26 08:57:24', '2021-07-26 08:57:24'),
(40, 1, 3, 5, 0, 0, '2021-07-26 13:10:21', '2021-07-26 13:10:21'),
(41, 1, 12, 5, 0, 0, '2021-07-26 13:14:50', '2021-07-26 13:14:50'),
(42, 5, 13, 1, 0, 0, '2021-07-26 18:26:04', '2021-07-26 18:26:04'),
(43, 7, 14, 5, 0, 0, '2021-07-26 18:28:49', '2021-07-26 18:28:49');

-- --------------------------------------------------------

--
-- Структура таблицы `responses`
--

CREATE TABLE IF NOT EXISTS `responses` (
  `id` bigint(20) unsigned NOT NULL,
  `profile_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `responses`
--

INSERT INTO `responses` (`id`, `profile_id`, `project_id`, `company_id`, `text`, `pdf`, `price`, `status`, `read`, `created_at`, `updated_at`) VALUES
(3, 2, 5, 3, '<p>sdfbvdvdv dfbdf bfd db&nbsp;</p>', 'pdf/HHbLLgsY7Mb76qHZuJsxcNF0MfdY1bi75hwYNfTB.pdf', 5000, 1, 1, '2021-02-22 10:33:15', '2021-02-22 16:03:39'),
(4, 2, 5, 3, '<p>ну что там с моим предлоением??</p>', NULL, 4500, 2, 1, '2021-02-22 12:47:52', '2021-02-22 16:02:21'),
(7, 3, 4, 2, '<p>ви патививаи</p>', NULL, 7000, 1, 0, '2021-02-22 17:28:11', '2021-02-26 10:38:51'),
(8, 3, 1, 2, '<p>df fgb gdb</p>', NULL, 3000, 2, 0, '2021-02-22 17:31:54', '2021-02-26 13:48:53'),
(9, 3, 4, 2, '<p>totdm fgn fnfgnfgn</p>', NULL, 600, 2, 0, '2021-02-22 17:35:36', '2021-02-26 10:38:32'),
(10, 5, 8, 4, '<p>Я спец по строительству аэропортов</p>', 'pdf/WX3zeqVlU7aqlWuL1KE8YNLAfFxfQMoxlKn21Xuq.pdf', 5000, 2, 0, '2021-03-12 12:20:41', '2021-03-18 07:02:40'),
(11, 5, 8, 4, '<p>Добрый день, еще одно сообщение</p>', NULL, NULL, 0, 0, '2021-03-13 08:11:10', '2021-03-18 07:09:43'),
(12, 5, 8, 4, '<p style="text-align: center;">&nbsp;</p>\n<p style="text-align: center;">ТЕСТ ПО <strong>ЦЕНТРУ</strong></p>', NULL, NULL, 0, 0, '2021-03-13 08:26:10', '2021-03-13 08:26:10'),
(13, 2, 3, 1, '<p>dfg dfg dfbdfbdf bfdb</p>', NULL, NULL, 0, 0, '2021-03-16 19:56:08', '2021-03-16 19:56:08'),
(14, 2, 3, 1, '<p>cfdgdfgdgdgdfg fddgdgh fgh</p>', NULL, NULL, 0, 0, '2021-03-16 19:56:26', '2021-03-16 19:56:26'),
(15, 2, 3, 1, '<p>asdfsdgdgfdg dfh dfhdfh</p>', NULL, NULL, 0, 0, '2021-03-16 19:59:59', '2021-03-16 19:59:59'),
(16, 2, 8, 4, '<p>hjlhjl hkhk&nbsp; hjk hjkhkhlhl</p>', NULL, NULL, 0, 0, '2021-03-18 08:02:38', '2021-03-18 08:02:38'),
(17, 6, 11, 5, '<p>афываывфафывафывафвыа</p>', NULL, 123, 0, 0, '2021-07-26 12:52:10', '2021-07-26 12:52:10');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) unsigned NOT NULL,
  `profile_id` int(11) NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `profile_id`, `file_name`, `path`, `created_at`, `updated_at`) VALUES
(3, 1, 'ד.ש. הנדסת בטיחות.pdf', 'review/VlD7gIgAoUAVZ06DjHDpMUS10l5bONgcwRJI51pk.pdf', '2021-02-17 04:35:37', '2021-02-17 04:35:37'),
(5, 1, 'לימור קנדיל.pdf', 'review/gcbSfe0EE58vPiPh9hSgXlFj7RLk0ZjFtOLk7fvx.pdf', '2021-02-17 04:35:37', '2021-02-17 04:35:37'),
(7, 1, 'פארגון קבוצת ברנע.pdf', 'review/W06QcpZNVOZIHKxcdag5lRFFIU08SbJ7QR5N8D6W.pdf', '2021-02-17 04:46:16', '2021-02-17 04:46:16'),
(8, 1, 'נוסינוב המלצה.pdf', 'review/vXp4ySqe2aZvKXQjAu2SQ6bsjXiM8AljGXRauITo.pdf', '2021-02-17 04:46:16', '2021-02-17 04:46:16'),
(9, 1, 'לביא נטיף מהנדסים יועצים בע''''מ.pdf', 'review/xmtqXVXBhemF8VKfeoczbGMpOo9Kl4gdiGrHuAis.pdf', '2021-02-17 04:46:16', '2021-02-17 04:46:16'),
(10, 4, 'Микродозы_Мухомора_б_Маша_Какая_то.pdf', 'review/UJR5Cic6xY004gn85lgw4Op9gU4Zn9UXBlGmhHHK.pdf', '2021-03-11 08:38:50', '2021-03-11 08:38:50');

-- --------------------------------------------------------

--
-- Структура таблицы `social_accounts`
--

CREATE TABLE IF NOT EXISTS `social_accounts` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `social_accounts`
--

INSERT INTO `social_accounts` (`id`, `user_id`, `provider_id`, `provider`, `token`, `created_at`, `updated_at`) VALUES
(5, 15, '111721347022684196431', 'google', 'ya29.a0ARrdaM8z87xsxKhXpL79nYSkEjaXLh6sBYEw7wgzLmjUMIuZLwJuLDdStlEPo4G8NgCznwRg2hr4xYpAbaSIYSlwQ30loeQFfZ_3j4JfOuoiLw6ITwrqlTyZxxjvY9C3jW7h1AQskKZQaytkq8gjyFi-knLiQQ', '2021-07-25 18:13:09', '2021-07-25 18:13:09'),
(6, 5, '114357073206585098578', 'google', 'ya29.a0ARrdaM9H0rbgM1KQ-6sbadY5a8akl_n2DuGNG79p8jt65936RZ27gjm7KdhPCQhUC2ov7ZTF83o2RM2u8O_pWvLicdeHNgfy7b-rDX0yOUovMC8s3ohJAmwWej4GoFggF3t7MQm53lsD4QV-PZb1Lj4z0t41Fw', '2021-07-26 08:36:16', '2021-07-26 08:36:16'),
(7, 16, '104287697034943778293', 'google', 'ya29.a0ARrdaM8_IHmhJRf6GYsMuX_cGS0a71FVKTPbYjYQV2hXSkhnn2DI-Vh2bxmmZi6UKpfagGRbxxLs5w768niW2mrRu-HjMc15I4-OExc_8RMR_6hzzfL752tzMyKmT-l-PEvppKcGCHdJIDmGRgXqC2d7LTsB', '2021-07-26 08:40:50', '2021-07-26 08:40:50'),
(8, 17, '112924059734205750013', 'google', 'ya29.a0ARrdaM8j-h6u0bnXGNOzknD6WVgLlufnH7_hQBxuy8ETjfPSJc_8H6yJnq86s_I9P8LWXLTBL8jOjSPvAvwrLc9PYhCqRd5-PFiSZyTZAw-ah-usOYNPU46dUcHL82wJdbWaX0-iyk2mF6n6JVYjbPVAa6RdJA', '2021-07-26 18:27:00', '2021-07-26 18:27:00');

-- --------------------------------------------------------

--
-- Структура таблицы `specializations`
--

CREATE TABLE IF NOT EXISTS `specializations` (
  `id` bigint(20) unsigned NOT NULL,
  `ind` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specializations`
--

INSERT INTO `specializations` (`id`, `ind`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'תמ''''א 38', '2021-02-10 11:52:28', '2021-03-20 13:36:40'),
(3, 2, 'מסחר', '2021-02-10 11:58:03', '2021-03-20 13:36:53'),
(4, NULL, 'בניה פרטית', '2021-03-20 13:37:08', '2021-03-20 13:37:08'),
(5, NULL, 'בניה ירוקה', '2021-03-20 13:37:15', '2021-03-20 13:37:15');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` bigint(20) unsigned NOT NULL,
  `ind` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `ind`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'בית קרקע', NULL, '2021-03-20 13:24:45'),
(2, 2, 'מסחר', NULL, '2021-03-20 13:24:53'),
(3, 4, 'בניה רוויה', NULL, '2021-03-20 13:25:09'),
(4, 5, 'תמ''''א 38', NULL, '2021-03-20 13:25:17'),
(5, 3, 'תעשיה', '2021-03-13 08:31:08', '2021-03-20 13:25:00'),
(6, NULL, 'אחר', '2021-06-09 14:16:40', '2021-06-09 14:16:40');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'riko', 'irris-perm@mail.ru', '2021-02-16 17:06:52', '$2y$10$4nSsMZXXA43L0N8WgUC4punVVivWFFjZsA.9pqj7WcZb6XjlpaGQW', 'vlNLxX81CtvWBi259lOuJF0odLNiszBaQQlJtptzR5tLGDbmxpOx01iStVh8', '2021-01-29 07:02:16', '2021-03-16 10:14:10'),
(2, 'Alexey Maron', 'maron.alexey@gmail.com', '2021-02-16 16:54:27', '$2y$10$5uunTt2jiz0meoS75SFgXuJq6NVkla1SStfZicRTnwAyPcobuIRpW', 'Tzf90RCDC35tcDVpkK4DXmT6b4eG1EUYDLYtNyCRQu2eUGWdoqpDnkBCnsE2', '2021-02-16 16:54:12', '2021-07-26 13:10:05'),
(3, 'tester', 'artppr@ya.ru', '2021-02-16 17:47:33', '$2y$10$EHNnbUCnSWcLEBmwIMLLW.orGubzXZ9en2ZlLODvMwN5JEECb0kk6', '0Ru5nUle9ZeJlI3rb4eAkjZdCdgU0M0mDVStAQU1w53meriupCtSKdCv224D', '2021-02-16 17:46:26', '2021-02-24 07:56:45'),
(4, 'riko2', '89068885586@mail.ru', '2021-03-16 11:07:02', '$2y$10$KQevXdf70TLnw5dpzclW1OR39JlC0YOpY7MtocpoerILs5QMn0pMK', NULL, '2021-01-29 07:02:16', '2021-03-16 11:07:02'),
(5, 'Alexey Maron', 'icetekshoret@gmail.com', '2021-03-09 15:58:45', '$2y$10$MsSvNLOXHbWALVxx7GT6iOUdG2jjNzZyH89uFD0buO/14g1WdCjQu', 'LG11UIEf8vgGHSCgcIEbKel37cg5roDRu7m0k6FB5kP8uKksdav0M4omVrIr', '2021-03-09 15:36:54', '2021-07-26 08:39:53'),
(6, 'Davidbioge', 'yuriymuravyov1985899zfp0+davidPaums@mail.ru', NULL, '$2y$10$vXYxv0FogPUQ8vVi.L15Te7IRGrv6geW9TQEPTKJ.VBonlRvuuHJS', NULL, '2021-03-22 13:43:28', '2021-03-22 13:43:28'),
(7, 'Combet', 'mr.combetohct@gmail.com', NULL, '$2y$10$aeLGKBLeWXoJJCM2BQ0YxOVP3iYL9O0qgkxQ.8dQiYSOCOU6aF7a6', NULL, '2021-05-15 18:45:12', '2021-05-15 18:45:12'),
(8, 'Michaelsmets', 'ashleylundberg@myself.com', NULL, '$2y$10$67Y9eiAe0eL7yPsIo9//n.KoTsiYSMXB0nH0hVm42rW5762YD5y4m', NULL, '2021-05-17 07:48:51', '2021-05-17 07:48:51'),
(9, 'steelpuppy', 'steelpuppy@gmail.com', NULL, '$2y$10$HaWW4h6cMRmvdmAPGt9pmO02vzRkJg6GiD7gRDuHme8YwvNr6e9Le', NULL, '2021-07-17 18:33:33', '2021-07-17 18:33:33'),
(15, 'Vlad Vladij', 'vladij01@gmail.com', '2021-07-22 07:17:23', '$2y$10$TpHbvZOArxtnAzhkm/XlOu.cXLpLHiJ33ySHUhpQ4biiEdFz4rSNy', 'TOLq3mmH65yKryI8MAZmDx5DHeBDktlTEcWeB1hedkUbbZj4LlysS8W4Y8xU', '2021-07-25 18:13:09', '2021-07-26 12:56:16'),
(16, 'Alexey Maron', 'krapivaabyss@gmail.com', '2021-07-22 07:17:23', '$2y$10$AQNmM76srUHiaWr5RrQgNu.yQk50.TjdfDbbps6uZVlCl9VCljKkS', 'miSWor4ziFGgdXvMHHn93sQZ8BLi0pw62Ed6hIkNmSPqdrGbcL6DLATuxUJd', '2021-07-26 08:40:50', '2021-07-26 08:40:50'),
(17, 'Alexey Maron', 'office@beclick.co.il', '2021-07-22 07:17:23', '$2y$10$eO5HFGyJ.UlaZvEVFAOcYeRjLgfqLBwvjiECqAut.6B.2iM5Fb1Am', 'RJnGX0urB3AsQ3C3kJLLBLYuMoLOGS6jQ0Vcx8MqaAgnU91xDIATmFBcwpYq', '2021-07-26 18:27:00', '2021-07-26 18:27:00');

-- --------------------------------------------------------

--
-- Структура таблицы `views`
--

CREATE TABLE IF NOT EXISTS `views` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `views`
--

INSERT INTO `views` (`id`, `user_id`, `company_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2021-02-17 05:23:14', '2021-02-17 05:23:14'),
(2, 1, NULL, 2, '2021-02-17 05:23:59', '2021-02-17 05:23:59'),
(3, 2, NULL, 1, '2021-02-18 10:42:13', '2021-02-18 10:42:13'),
(4, 1, NULL, 2, '2021-02-18 11:28:19', '2021-02-18 11:28:19'),
(5, 1, 1, NULL, '2021-02-21 14:12:41', '2021-02-21 14:12:41'),
(6, 1, NULL, 3, '2021-02-21 17:15:19', '2021-02-21 17:15:19'),
(7, 1, NULL, 5, '2021-02-22 09:11:18', '2021-02-22 09:11:18'),
(8, 1, NULL, 2, '2021-02-22 15:31:49', '2021-02-22 15:31:49'),
(9, 1, 1, NULL, '2021-02-22 15:32:01', '2021-02-22 15:32:01'),
(10, 4, NULL, 4, '2021-02-22 15:53:03', '2021-02-22 15:53:03'),
(11, 4, NULL, 1, '2021-02-22 16:03:52', '2021-02-22 16:03:52'),
(12, 4, 2, NULL, '2021-02-22 16:29:58', '2021-02-22 16:29:58'),
(13, 4, 1, NULL, '2021-02-22 17:22:13', '2021-02-22 17:22:13'),
(14, 1, NULL, 3, '2021-02-26 10:20:10', '2021-02-26 10:20:10'),
(15, 1, 1, NULL, '2021-02-26 10:22:55', '2021-02-26 10:22:55'),
(16, 3, 2, NULL, '2021-03-11 08:43:29', '2021-03-11 08:43:29'),
(17, 3, 3, NULL, '2021-03-11 08:52:08', '2021-03-11 08:52:08'),
(18, 3, 1, NULL, '2021-03-11 08:53:50', '2021-03-11 08:53:50'),
(19, 3, 5, NULL, '2021-03-11 10:36:07', '2021-03-11 10:36:07'),
(20, 3, 2, NULL, '2021-03-12 09:00:21', '2021-03-12 09:00:21'),
(21, 5, NULL, 8, '2021-03-12 12:19:31', '2021-03-12 12:19:31'),
(22, 3, 5, NULL, '2021-03-13 08:01:59', '2021-03-13 08:01:59'),
(23, 1, NULL, 3, '2021-03-14 16:21:53', '2021-03-14 16:21:53'),
(24, 1, NULL, 2, '2021-03-14 16:22:20', '2021-03-14 16:22:20'),
(25, 1, 5, NULL, '2021-03-16 09:18:06', '2021-03-16 09:18:06'),
(26, 1, NULL, 3, '2021-03-16 09:50:01', '2021-03-16 09:50:01'),
(27, 3, 5, NULL, '2021-03-18 07:09:17', '2021-03-18 07:09:17'),
(28, 1, NULL, 2, '2021-03-18 07:57:18', '2021-03-18 07:57:18'),
(29, 1, NULL, 3, '2021-03-18 07:58:05', '2021-03-18 07:58:05'),
(30, 1, NULL, 5, '2021-03-18 07:58:17', '2021-03-18 07:58:17'),
(31, 1, NULL, 8, '2021-03-18 08:02:17', '2021-03-18 08:02:17'),
(32, 1, NULL, 5, '2021-03-19 20:11:06', '2021-03-19 20:11:06'),
(33, 1, NULL, 8, '2021-03-19 20:12:50', '2021-03-19 20:12:50'),
(34, 5, 1, NULL, '2021-06-24 13:47:12', '2021-06-24 13:47:12'),
(35, 5, 1, NULL, '2021-07-26 03:00:26', '2021-07-26 03:00:26'),
(36, 15, NULL, 11, '2021-07-26 12:51:32', '2021-07-26 12:51:32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `amountworkers`
--
ALTER TABLE `amountworkers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `requesteds`
--
ALTER TABLE `requesteds`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `amountworkers`
--
ALTER TABLE `amountworkers`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT для таблицы `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `needs`
--
ALTER TABLE `needs`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `others`
--
ALTER TABLE `others`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT для таблицы `requesteds`
--
ALTER TABLE `requesteds`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT для таблицы `responses`
--
ALTER TABLE `responses`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
