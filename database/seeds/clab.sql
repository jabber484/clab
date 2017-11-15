-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: 2017 年 11 月 15 日 07:41
-- 伺服器版本: 5.5.57-0ubuntu0.14.04.1
-- PHP 版本: 5.6.31-4+ubuntu14.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `clab`
--

-- --------------------------------------------------------

--
-- 資料表結構 `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `catalogs_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- 資料表的匯出資料 `catalogs`
--

INSERT INTO `catalogs` (`id`, `type`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'RX-78-2 Gundam', 'Prototype Mobile Suit', NULL, NULL),
(2, 3, 'RX-78GP02A Physalis', 'Prototype Nuclear Assault Mobile Suit', NULL, NULL),
(3, 3, 'RX-78GP01 Zephyranthes', 'Prototype General-Purpose Mobile Suit', NULL, NULL),
(4, 3, 'RX-0 Unicorn', 'Prototype Full Psycoframe Mobile Suit', NULL, NULL),
(5, 2, '60mm Vulcan Gun', 'Anti-Light Armor Weapon', NULL, NULL),
(6, 1, 'Beam Saber', 'High-energy Minovsky particles blade', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `catalog_types`
--

CREATE TABLE IF NOT EXISTS `catalog_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `catalog_types_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- 資料表的匯出資料 `catalog_types`
--

INSERT INTO `catalog_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Drills', NULL, NULL),
(2, 'Sharps', NULL, NULL),
(3, 'Machine', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_types_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- 資料表的匯出資料 `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Art and Culture', NULL, NULL),
(2, 'Design Thinking', NULL, NULL),
(3, 'Entrepreneurship and Management', NULL, NULL),
(4, 'Science and Technology', NULL, NULL),
(5, 'Sociopolitical Issues', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=43 ;

--
-- 資料表的匯出資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_09_04_085918_create_sessions_table', 1),
(2, '2017_09_06_090435_catalog', 2),
(3, '2017_09_20_023516_project', 3),
(4, '2017_11_14_034343_event_type', 4),
(16, '2017_09_04_085918_create_sessions_table', 1),
(17, '2017_09_06_090435_catalog', 1),
(18, '2017_09_20_023516_project', 1),
(19, '2017_11_14_034343_event_type', 1),
(38, '2017_09_04_085918_create_sessions_table', 1),
(39, '2017_09_06_090435_catalog', 1),
(40, '2017_09_20_023516_project', 1),
(41, '2017_11_14_034343_event_type', 1),
(42, '2017_11_15_071742_catalog_type', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isIdea` tinyint(1) NOT NULL,
  `fromDate` date DEFAULT NULL,
  `toDate` date DEFAULT NULL,
  `alias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- 資料表的匯出資料 `projects`
--

INSERT INTO `projects` (`id`, `type`, `name`, `short_des`, `description`, `picture`, `isIdea`, `fromDate`, `toDate`, `alias`, `contact`, `created_at`, `updated_at`) VALUES
(1, 4, 'PP Plastic Product Reusing', '<p>So I checked here that PP plastic can be reused without safety hazards.<br><a href="http://learn.eartheasy.com/2012/05/plastics-by-the-numbers/">http://learn.eartheasy.com/2012/05/plastics-by-the-numbers/</a></p>\r\n				<p>Can we set up a PP plastic collection corner and work with how we can reuse the PP plastic?&nbsp;</p>', '<p>So I checked here that PP plastic can be reused without safety hazards.<br><a href="http://learn.eartheasy.com/2012/05/plastics-by-the-numbers/">http://learn.eartheasy.com/2012/05/plastics-by-the-numbers/</a></p>\r\n				<p>Can we set up a PP plastic collection corner and work with how we can reuse the PP plastic?&nbsp;</p>', 'https://clab.wys.cuhk.edu.hk/sites/default/files/styles/node_width-copy/public/idea/898/img_2957.jpg', 1, NULL, NULL, '', '', NULL, NULL),
(2, 1, 'Thinking of starting an online meetup platform for students at CUHK', '<p>I want to create an online platform for CUHK students to meet others who have the same niche hobbies and interests as them. Interested parties please contact me by email.</p>', '<p>I want to create an online platform for CUHK students to meet others who have the same niche hobbies and interests as them. Interested parties please contact me by email.</p>', 'https://clab.wys.cuhk.edu.hk/sites/default/files/styles/node_width-copy/public/idea/909/img_20170329_190750.jpg', 1, NULL, NULL, '', '', NULL, NULL),
(3, 5, '電影欣賞會: Trainspotting', '<p>故事圍繞於數名英國年輕人身上，不喜歡就業、整天無所事事，把妞、鬧事和吸毒成了他們每天的生活；儘管曾試圖擺脫毒品，但仍受不了誘惑地在打上一針，但隨著歲月逝去，他們也因此對自己的選擇付出代價。(Wikipedia)</p>', '<p>故事圍繞於數名英國年輕人身上，不喜歡就業、整天無所事事，把妞、鬧事和吸毒成了他們每天的生活；儘管曾試圖擺脫毒品，但仍受不了誘惑地在打上一針，但隨著歲月逝去，他們也因此對自己的選擇付出代價。(Wikipedia)</p>', 'https://clab.wys.cuhk.edu.hk/sites/default/files/styles/node_width-copy/public/action/901/trainspotting.jpg', 0, '2016-10-10', NULL, '', '', NULL, NULL),
(4, 3, '創意實驗室- 公司考察: VS Media', '<p>Creativity Laboratory (c!ab) is organizing a company visit with the School of Journalism and Communication to VS Media, one of the leading companies in the new digital industry. It aims to serve as a company to develop “We Media” business by providing professional support to empower content creators to produce high-quality videos and help them become social media influencer. VS Media now stands at over 500 creator partners in Greater China, with over 45 million subscribers online.</p>', '<p><span style="color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:14px">Creativity Laboratory (c!ab) is organizing a company visit with the School of Journalism and Communication to VS Media, one of the leading companies in the new digital industry. It aims to serve as a company to develop “We Media” business by providing professional support to empower content creators to produce high-qual</span><span style="color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:14px">ity videos and help them become social media influencer. VS Media now stands at over 500 creator partners in Greater China, with over 45 million subscribers online.</span></p>\r\n<p>If you are interested in learning more about the new trend of digital media, or considering joining this industry, don’t miss this chance, act NOW!</p>\r\n<p>創意實驗室將會聯同新聞與傳播學院舉辦公司考察，前往VS Media參觀。VS Media是一間於新媒體行業擁有領導地位的公司，致力建立「自媒體」業務，為一眾創作者提供專業硬體設備及網絡支援，拍攝優質影片，讓他們在社交平台發揮影響力。目前 VS Media 在大中華地區擁有 500 多位創作伙伴，訂閱用戶人數超過 4千5百萬。<br>\r\n如果你對新媒體的最新發展有興趣，或正考慮投身這行業，萬勿錯過本活動，請即報名！</p>\r\n<p>VS Media&nbsp;<br>\r\nWebsite:&nbsp;<a href="http://l.facebook.com/l.php?u=http%3A%2F%2Fwww.vs-media.com%2F&amp;h=GAQGRmPP3&amp;enc=AZMbt9EQBgyu21YwFi3Vk6yd9r_siMXaJIEHc1A5IMbbofjmEFgDAjCkR_4eFetEeedDvjqihhGkuUvilyuK3Q2wSYCt_kHMwg5tbLzFAxjB-7sTrLWxVtMEJV5b-brhjIPmllVdCs3_C2NoAEtPuxTE&amp;s=1" rel="nofollow nofollow" style="color: rgb(54, 88, 153); cursor: pointer; text-decoration: none;" target="_blank">http://www.vs-media.com/</a>&nbsp;<br>\r\nAddress: Unit A &amp; C, 7/F., First Group Centre, 14 Wang Tai Road, Kowloon Bay, Kowloon</p>\r\n<p>日期 Date: 14/4/2016 (星期四 Thursday)<br>\r\n活動時間 Time: 2:00pm – 4:00pm<br>\r\n集合地點及時間&nbsp;<br>\r\nAssembly point and time:<br>\r\n1:00pm @ 伍宜孫書院大堂 College Gallery, Wu Yee Sun College<br>\r\n1:15pm @ 大學港鐵站 A 出口University MTR Station Exit A<br>\r\n2:00pm @ VS Media&nbsp;<br>\r\n*往返均設專車Shuttle bus will be arranged for round trip</p>\r\n<p>領隊 Leader：<br>\r\n新聞與傳播學院黃嘉輝教授 Professor Mike K.F. Wong</p>\r\n<p>費用全免 Free of charge<br>\r\n報名Enrollment (名額有限，先到先得 First-come First-served)：<a href="https://goo.gl/HN1V3z" rel="nofollow nofollow" style="color: rgb(54, 88, 153); cursor: pointer; text-decoration: none;" target="_blank">https://goo.gl/HN1V3z</a><br>\r\n截止報名 Deadline: 11/4/2016<br>\r\n查詢 Enquiry: Johnny (3943 3989/ <a href="mailto:johnnywong@cuhk.edu.hk">johnnywong@cuhk.edu.hk</a> ) /Kan (3943 9767 / <a href="mailto:kanpoon@cuhk.edu.hk">kanpoon@cuhk.edu.hk</a>)</p>', 'https://clab.wys.cuhk.edu.hk/sites/default/files/styles/node_width-copy/public/12931148_1127554933955912_1260883915245341097_n.jpg', 0, '2016-04-14', NULL, '', '', NULL, NULL),
(5, 4, '4', '<p>sdfsdfsdf</p>', '<p>sdfsdfsdf</p>', NULL, 0, '2016-01-01', '2016-01-01', 'sdfsdf', 'sdfsdf', '2017-11-14 06:33:33', '2017-11-14 06:33:33'),
(6, 4, '4', '<p>fdgfdggggggggggggggggg</p>', '<p>fdgfdggggggggggggggggg</p>', NULL, 0, '2016-01-01', '2016-01-01', 'ddfgdfg', 'fgdfgdfgdfg', '2017-11-14 07:11:33', '2017-11-14 07:11:33'),
(7, 1, '1', '<p>sdf</p>', '<p>sdf</p>', NULL, 0, '2016-01-01', '2016-01-01', 'ss', 'ss', '2017-11-14 07:14:55', '2017-11-14 07:14:55'),
(8, 1, '1', '<p>d</p>', '<p>d</p>', NULL, 0, '2016-01-01', '2016-01-01', 's', 'sss', '2017-11-14 07:15:19', '2017-11-14 07:15:19'),
(9, 5, '5', '<p>ss</p>', '<p>ss</p>', NULL, 0, '2016-01-01', '2016-01-01', '1', '1', '2017-11-14 07:21:11', '2017-11-14 07:21:11'),
(10, 4, '4', '<p>ss</p>', '<p>11234</p>', NULL, 0, '2016-01-01', '2016-01-01', '2', '2', '2017-11-14 07:21:55', '2017-11-14 07:21:55');

-- --------------------------------------------------------

--
-- 資料表結構 `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
