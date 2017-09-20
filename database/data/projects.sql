-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2017 at 08:42 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.6.31-4+ubuntu14.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clab`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('Art and Culture','Design Thinking','Entrepreneurship and Management','Science and Technology','Sociopolitical Issues') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isIdea` tinyint(1) NOT NULL,
  `fromDate` date DEFAULT NULL,
  `toDate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_id_unique` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `type`, `name`, `short_des`, `description`, `picture`, `isIdea`, `fromDate`, `toDate`) VALUES
(1, 'Science and Technology', 'PP Plastic Product Reusing', '<p>So I checked here that PP plastic can be reused without safety hazards.<br><a href="http://learn.eartheasy.com/2012/05/plastics-by-the-numbers/">http://learn.eartheasy.com/2012/05/plastics-by-the-numbers/</a></p>\r\n				<p>Can we set up a PP plastic collection corner and work with how we can reuse the PP plastic?&nbsp;</p>', '<p>So I checked here that PP plastic can be reused without safety hazards.<br><a href="http://learn.eartheasy.com/2012/05/plastics-by-the-numbers/">http://learn.eartheasy.com/2012/05/plastics-by-the-numbers/</a></p>\r\n				<p>Can we set up a PP plastic collection corner and work with how we can reuse the PP plastic?&nbsp;</p>', 'https://clab.wys.cuhk.edu.hk/sites/default/files/styles/node_width-copy/public/idea/898/img_2957.jpg', 1, NULL, NULL),
(2, 'Art and Culture', 'Thinking of starting an online meetup platform for students at CUHK', '<p>I want to create an online platform for CUHK students to meet others who have the same niche hobbies and interests as them. Interested parties please contact me by email.</p>', '<p>I want to create an online platform for CUHK students to meet others who have the same niche hobbies and interests as them. Interested parties please contact me by email.</p>', 'https://clab.wys.cuhk.edu.hk/sites/default/files/styles/node_width-copy/public/idea/909/img_20170329_190750.jpg', 1, NULL, NULL),
(3, 'Sociopolitical Issues', '電影欣賞會: Trainspotting', '<p>故事圍繞於數名英國年輕人身上，不喜歡就業、整天無所事事，把妞、鬧事和吸毒成了他們每天的生活；儘管曾試圖擺脫毒品，但仍受不了誘惑地在打上一針，但隨著歲月逝去，他們也因此對自己的選擇付出代價。(Wikipedia)</p>', '<p>故事圍繞於數名英國年輕人身上，不喜歡就業、整天無所事事，把妞、鬧事和吸毒成了他們每天的生活；儘管曾試圖擺脫毒品，但仍受不了誘惑地在打上一針，但隨著歲月逝去，他們也因此對自己的選擇付出代價。(Wikipedia)</p>', 'https://clab.wys.cuhk.edu.hk/sites/default/files/styles/node_width-copy/public/action/901/trainspotting.jpg', 0, '2016-10-10', NULL),
(4, 'Entrepreneurship and Management', 'c!ab – Company Visit to VS Media\r\n創意實驗室- 公司考察: VS Media', '<p>Creativity Laboratory (c!ab) is organizing a company visit with the School of Journalism and Communication to VS Media, one of the leading companies in the new digital industry. It aims to serve as a company to develop “We Media” business by providing professional support to empower content creators to produce high-quality videos and help them become social media influencer. VS Media now stands at over 500 creator partners in Greater China, with over 45 million subscribers online.</p>', '<p><span style="color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:14px">Creativity Laboratory (c!ab) is organizing a company visit with the School of Journalism and Communication to VS Media, one of the leading companies in the new digital industry. It aims to serve as a company to develop “We Media” business by providing professional support to empower content creators to produce high-qual</span><span style="color:rgb(29, 33, 41); font-family:helvetica,arial,sans-serif; font-size:14px">ity videos and help them become social media influencer. VS Media now stands at over 500 creator partners in Greater China, with over 45 million subscribers online.</span></p>\r\n<p>If you are interested in learning more about the new trend of digital media, or considering joining this industry, don’t miss this chance, act NOW!</p>\r\n<p>創意實驗室將會聯同新聞與傳播學院舉辦公司考察，前往VS Media參觀。VS Media是一間於新媒體行業擁有領導地位的公司，致力建立「自媒體」業務，為一眾創作者提供專業硬體設備及網絡支援，拍攝優質影片，讓他們在社交平台發揮影響力。目前 VS Media 在大中華地區擁有 500 多位創作伙伴，訂閱用戶人數超過 4千5百萬。<br>\r\n如果你對新媒體的最新發展有興趣，或正考慮投身這行業，萬勿錯過本活動，請即報名！</p>\r\n<p>VS Media&nbsp;<br>\r\nWebsite:&nbsp;<a href="http://l.facebook.com/l.php?u=http%3A%2F%2Fwww.vs-media.com%2F&amp;h=GAQGRmPP3&amp;enc=AZMbt9EQBgyu21YwFi3Vk6yd9r_siMXaJIEHc1A5IMbbofjmEFgDAjCkR_4eFetEeedDvjqihhGkuUvilyuK3Q2wSYCt_kHMwg5tbLzFAxjB-7sTrLWxVtMEJV5b-brhjIPmllVdCs3_C2NoAEtPuxTE&amp;s=1" rel="nofollow nofollow" style="color: rgb(54, 88, 153); cursor: pointer; text-decoration: none;" target="_blank">http://www.vs-media.com/</a>&nbsp;<br>\r\nAddress: Unit A &amp; C, 7/F., First Group Centre, 14 Wang Tai Road, Kowloon Bay, Kowloon</p>\r\n<p>日期 Date: 14/4/2016 (星期四 Thursday)<br>\r\n活動時間 Time: 2:00pm – 4:00pm<br>\r\n集合地點及時間&nbsp;<br>\r\nAssembly point and time:<br>\r\n1:00pm @ 伍宜孫書院大堂 College Gallery, Wu Yee Sun College<br>\r\n1:15pm @ 大學港鐵站 A 出口University MTR Station Exit A<br>\r\n2:00pm @ VS Media&nbsp;<br>\r\n*往返均設專車Shuttle bus will be arranged for round trip</p>\r\n<p>領隊 Leader：<br>\r\n新聞與傳播學院黃嘉輝教授 Professor Mike K.F. Wong</p>\r\n<p>費用全免 Free of charge<br>\r\n報名Enrollment (名額有限，先到先得 First-come First-served)：<a href="https://goo.gl/HN1V3z" rel="nofollow nofollow" style="color: rgb(54, 88, 153); cursor: pointer; text-decoration: none;" target="_blank">https://goo.gl/HN1V3z</a><br>\r\n截止報名 Deadline: 11/4/2016<br>\r\n查詢 Enquiry: Johnny (3943 3989/ <a href="mailto:johnnywong@cuhk.edu.hk">johnnywong@cuhk.edu.hk</a> ) /Kan (3943 9767 / <a href="mailto:kanpoon@cuhk.edu.hk">kanpoon@cuhk.edu.hk</a>)</p>', 'https://clab.wys.cuhk.edu.hk/sites/default/files/styles/node_width-copy/public/12931148_1127554933955912_1260883915245341097_n.jpg', 0, '2016-04-14', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
