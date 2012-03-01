--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `writer_assignment_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `youtube_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`writer_assignment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `writer_assignment_id`, `create_date`, `youtube_link`) VALUES
(1, 0, 1, '2012-03-07 00:00:00', 'as dfasd fadsf asdf asdfasdfas dfa sd');

-- --------------------------------------------------------

--
-- Table structure for table `article_paragraphs`
--

CREATE TABLE IF NOT EXISTS `article_paragraphs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `article_paragraphs`
--

INSERT INTO `article_paragraphs` (`id`, `article_id`, `title`, `content`, `order`) VALUES
(1, 1, 'as dfasd fadsf asdf asdfasdfas dfa sd', 'as dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sd', 0),
(2, 1, 'as dfasd fadsf asdf asdfasdfas dfa sd', 'as dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sd', 1),
(3, 1, 'as dfasd fadsf asdf asdfasdfas dfa sd', 'as dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sd', 2),
(4, 1, 'as dfasd fadsf asdf asdfasdfas dfa sd', 'as dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sdas dfasd fadsf asdf asdfasdfas dfa sd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `article_templates`
--

CREATE TABLE IF NOT EXISTS `article_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `paragraphs_count` tinyint(3) unsigned NOT NULL,
  `template_file` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `words_count` smallint(10) unsigned NOT NULL,
  `paragraph_title_words_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `article_templates`
--

INSERT INTO `article_templates` (`id`, `name`, `paragraphs_count`, `template_file`, `words_count`, `paragraph_title_words_count`) VALUES
(1, 'Template 1 - 4 paragraphs, 500 words', 4, '1.docx', 500, 4);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `writer_order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `writer_order_id` (`writer_order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `keyword`, `created_date`, `writer_order_id`) VALUES
(1, 'keyword1', '0000-00-00 00:00:00', 1),
(2, 'keyword2', '0000-00-00 00:00:00', 1),
(3, 'keyword3', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `completed_date` datetime DEFAULT NULL,
  `articles_count` tinyint(3) unsigned NOT NULL,
  `details` text NOT NULL,
  `order_delivery_option_id` int(11) NOT NULL,
  `status` enum('pending','in_progress','completed') NOT NULL DEFAULT 'pending',
  `rating` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`order_delivery_option_id`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `create_date`, `completed_date`, `articles_count`, `details`, `order_delivery_option_id`, `status`, `rating`) VALUES
(1, 2, '2012-03-01 10:57:24', NULL, 5, 'details', 1, 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery_options`
--

CREATE TABLE IF NOT EXISTS `order_delivery_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `min_articles` tinyint(3) unsigned NOT NULL,
  `max_articles` tinyint(3) unsigned NOT NULL,
  `delivery_hours` tinyint(3) unsigned NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price_per_article` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order_delivery_options`
--

INSERT INTO `order_delivery_options` (`id`, `min_articles`, `max_articles`, `delivery_hours`, `description`, `price_per_article`) VALUES
(1, 5, 20, 30, '6$ for one 500 words article', 6.00),
(2, 5, 100, 80, '5$ for one 500 words article', 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `password` varchar(48) NOT NULL,
  `type` enum('admin','writer','client','manager') NOT NULL,
  `username` varchar(60) NOT NULL,
  `status` enum('active','disabled') NOT NULL DEFAULT 'active',
  `registered_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`,`password`,`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `username`, `status`, `registered_date`) VALUES
(6, 'writer@aloise.name', '709ddbabfdf42f7f6dc8d018db5b81c2bacde863', 'writer', 'aloise2', 'active', '2012-02-19 13:23:50'),
(2, 'client@aloise.name', 'de320c1593effa44371badc34d832445359f891d', 'client', 'client', 'active', '2012-02-19 17:58:41'),
(3, 'manager@aloise.name', 'de320c1593effa44371badc34d832445359f891d', 'manager', 'manager', 'active', '2012-02-25 18:18:25'),
(1, 'admin@realconnect.mobi', '7a363d7654a1ebbb7550687e4ffa84437cd8f958', 'admin', 'admin', 'active', '2012-02-28 20:37:36'),
(7, 'writer2@aloise.name', 'de320c1593effa44371badc34d832445359f891d', 'writer', 'writer2', 'active', '2012-02-28 22:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `writer_article_submits`
--

CREATE TABLE IF NOT EXISTS `writer_article_submits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_assignment_id` int(11) NOT NULL,
  `manager_notes` text COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `status` enum('submited','declined','accepted','rewrite') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'submited',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `writer_article_submits`
--

INSERT INTO `writer_article_submits` (`id`, `writer_assignment_id`, `manager_notes`, `create_date`, `status`) VALUES
(1, 1, 'notes', '2012-03-01 11:10:27', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `writer_assignments`
--

CREATE TABLE IF NOT EXISTS `writer_assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_user_id` int(11) NOT NULL,
  `manager_user_id` int(11) NOT NULL,
  `writer_order_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `completed_date` datetime DEFAULT NULL,
  `status` enum('pending','in_progress','in_review','completed','rejected') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `writer_user_id` (`writer_user_id`,`manager_user_id`,`writer_order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `writer_assignments`
--

INSERT INTO `writer_assignments` (`id`, `writer_user_id`, `manager_user_id`, `writer_order_id`, `create_date`, `completed_date`, `status`) VALUES
(1, 6, 3, 1, '2012-03-01 10:57:56', '2012-03-01 11:13:06', 'completed'),
(2, 7, 3, 1, '2012-03-01 11:43:39', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `writer_orders`
--

CREATE TABLE IF NOT EXISTS `writer_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'manager',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `article_template_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`,`user_id`),
  KEY `article_template_id` (`article_template_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `writer_orders`
--

INSERT INTO `writer_orders` (`id`, `order_id`, `create_date`, `user_id`, `description`, `article_template_id`) VALUES
(1, 1, '2012-03-01 10:57:24', 3, 'description', 1);

