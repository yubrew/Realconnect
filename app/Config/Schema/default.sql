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

CREATE TABLE instant_payment_notifications (
  id char(36) NOT NULL,
  notify_version varchar(64) default NULL COMMENT 'IPN Version Number',
  verify_sign varchar(127) default NULL COMMENT 'Encrypted string used to verify the authenticityof the tansaction',
  test_ipn int(11) default NULL,
  address_city varchar(40) default NULL COMMENT 'City of customers address',
  address_country varchar(64) default NULL COMMENT 'Country of customers address',
  address_country_code varchar(2) default NULL COMMENT 'Two character ISO 3166 country code',
  address_name varchar(128) default NULL COMMENT 'Name used with address (included when customer provides a Gift address)',
  address_state varchar(40) default NULL COMMENT 'State of customer address',
  address_status varchar(20) default NULL COMMENT 'confirmed/unconfirmed',
  address_street varchar(200) default NULL COMMENT 'Customer''s street address',
  address_zip varchar(20) default NULL COMMENT 'Zip code of customer''s address',
  first_name varchar(64) default NULL COMMENT 'Customer''s first name',
  last_name varchar(64) default NULL COMMENT 'Customer''s last name',
  payer_business_name varchar(127) default NULL COMMENT 'Customer''s company name, if customer represents a business',
  payer_email varchar(127) default NULL COMMENT 'Customer''s primary email address. Use this email to provide any credits',
  payer_id varchar(13) default NULL COMMENT 'Unique customer ID.',
  payer_status varchar(20) default NULL COMMENT 'verified/unverified',
  contact_phone varchar(20) default NULL COMMENT 'Customer''s telephone number.',
  residence_country varchar(2) default NULL COMMENT 'Two-Character ISO 3166 country code',
  business varchar(127) default NULL COMMENT 'Email address or account ID of the payment recipient (that is, the merchant). Equivalent to the values of receiver_email (If payment is sent to primary account) and business set in the Website Payment HTML.',
  item_name varchar(127) default NULL COMMENT 'Item name as passed by you, the merchant. Or, if not passed by you, as entered by your customer. If this is a shopping cart transaction, Paypal will append the number of the item (e.g., item_name_1,item_name_2, and so forth).',
  item_number varchar(127) default NULL COMMENT 'Pass-through variable for you to track purchases. It will get passed back to you at the completion of the payment. If omitted, no variable will be passed back to you.',
  quantity varchar(127) default NULL COMMENT 'Quantity as entered by your customer or as passed by you, the merchant. If this is a shopping cart transaction, PayPal appends the number of the item (e.g., quantity1,quantity2).',
  receiver_email varchar(127) default NULL COMMENT 'Primary email address of the payment recipient (that is, the merchant). If the payment is sent to a non-primary email address on your PayPal account, the receiver_email is still your primary email.',
  receiver_id varchar(13) default NULL COMMENT 'Unique account ID of the payment recipient (i.e., the merchant). This is the same as the recipients referral ID.',
  custom varchar(255) default NULL COMMENT 'Custom value as passed by you, the merchant. These are pass-through variables that are never presented to your customer.',
  invoice varchar(127) default NULL COMMENT 'Pass through variable you can use to identify your invoice number for this purchase. If omitted, no variable is passed back.',
  memo varchar(255) default NULL COMMENT 'Memo as entered by your customer in PayPal Website Payments note field.',
  option_name1 varchar(64) default NULL COMMENT 'Option name 1 as requested by you',
  option_name2 varchar(64) default NULL COMMENT 'Option 2 name as requested by you',
  option_selection1 varchar(200) default NULL COMMENT 'Option 1 choice as entered by your customer',
  option_selection2 varchar(200) default NULL COMMENT 'Option 2 choice as entered by your customer',
  tax decimal(10,2) default NULL COMMENT 'Amount of tax charged on payment',
  auth_id varchar(19) default NULL COMMENT 'Authorization identification number',
  auth_exp varchar(28) default NULL COMMENT 'Authorization expiration date and time, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  auth_amount int(11) default NULL COMMENT 'Authorization amount',
  auth_status varchar(20) default NULL COMMENT 'Status of authorization',
  num_cart_items int(11) default NULL COMMENT 'If this is a PayPal shopping cart transaction, number of items in the cart',
  parent_txn_id varchar(19) default NULL COMMENT 'In the case of a refund, reversal, or cancelled reversal, this variable contains the txn_id of the original transaction, while txn_id contains a new ID for the new transaction.',
  payment_date varchar(28) default NULL COMMENT 'Time/date stamp generated by PayPal, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  payment_status varchar(20) default NULL COMMENT 'Payment status of the payment',
  payment_type varchar(10) default NULL COMMENT 'echeck/instant',
  pending_reason varchar(20) default NULL COMMENT 'This variable is only set if payment_status=pending',
  reason_code varchar(20) default NULL COMMENT 'This variable is only set if payment_status=reversed',
  remaining_settle int(11) default NULL COMMENT 'Remaining amount that can be captured with Authorization and Capture',
  shipping_method varchar(64) default NULL COMMENT 'The name of a shipping method from the shipping calculations section of the merchants account profile. The buyer selected the named shipping method for this transaction',
  shipping decimal(10,2) default NULL COMMENT 'Shipping charges associated with this transaction. Format unsigned, no currency symbol, two decimal places',
  transaction_entity varchar(20) default NULL COMMENT 'Authorization and capture transaction entity',
  txn_id varchar(19) default '' COMMENT 'A unique transaction ID generated by PayPal',
  txn_type varchar(20) default NULL COMMENT 'cart/express_checkout/send-money/virtual-terminal/web-accept',
  exchange_rate decimal(10,2) default NULL COMMENT 'Exchange rate used if a currency conversion occured',
  mc_currency varchar(3) default NULL COMMENT 'Three character country code. For payment IPN notifications, this is the currency of the payment, for non-payment subscription IPN notifications, this is the currency of the subscription.',
  mc_fee decimal(10,2) default NULL COMMENT 'Transaction fee associated with the payment, mc_gross minus mc_fee equals the amount deposited into the receiver_email account. Equivalent to payment_fee for USD payments. If this amount is negative, it signifies a refund or reversal, and either ofthose p',
  mc_gross decimal(10,2) default NULL COMMENT 'Full amount of the customer''s payment',
  mc_handling decimal(10,2) default NULL COMMENT 'Total handling charge associated with the transaction',
  mc_shipping decimal(10,2) default NULL COMMENT 'Total shipping amount associated with the transaction',
  payment_fee decimal(10,2) default NULL COMMENT 'USD transaction fee associated with the payment',
  payment_gross decimal(10,2) default NULL COMMENT 'Full USD amount of the customers payment transaction, before payment_fee is subtracted',
  settle_amount decimal(10,2) default NULL COMMENT 'Amount that is deposited into the account''s primary balance after a currency conversion',
  settle_currency varchar(3) default NULL COMMENT 'Currency of settle amount. Three digit currency code',
  auction_buyer_id varchar(64) default NULL COMMENT 'The customer''s auction ID.',
  auction_closing_date varchar(28) default NULL COMMENT 'The auction''s close date. In the format: HH:MM:SS DD Mmm YY, YYYY PSD',
  auction_multi_item int(11) default NULL COMMENT 'The number of items purchased in multi-item auction payments',
  for_auction varchar(10) default NULL COMMENT 'This is an auction payment - payments made using Pay for eBay Items or Smart Logos - as well as send money/money request payments with the type eBay items or Auction Goods(non-eBay)',
  subscr_date varchar(28) default NULL COMMENT 'Start date or cancellation date depending on whether txn_type is subcr_signup or subscr_cancel',
  subscr_effective varchar(28) default NULL COMMENT 'Date when a subscription modification becomes effective',
  period1 varchar(10) default NULL COMMENT '(Optional) Trial subscription interval in days, weeks, months, years (example a 4 day interval is 4 D',
  period2 varchar(10) default NULL COMMENT '(Optional) Trial period',
  period3 varchar(10) default NULL COMMENT 'Regular subscription interval in days, weeks, months, years',
  amount1 decimal(10,2) default NULL COMMENT 'Amount of payment for Trial period 1 for USD',
  amount2 decimal(10,2) default NULL COMMENT 'Amount of payment for Trial period 2 for USD',
  amount3 decimal(10,2) default NULL COMMENT 'Amount of payment for regular subscription  period 1 for USD',
  mc_amount1 decimal(10,2) default NULL COMMENT 'Amount of payment for trial period 1 regardless of currency',
  mc_amount2 decimal(10,2) default NULL COMMENT 'Amount of payment for trial period 2 regardless of currency',
  mc_amount3 decimal(10,2) default NULL COMMENT 'Amount of payment for regular subscription period regardless of currency',
  recurring varchar(1) default NULL COMMENT 'Indicates whether rate recurs (1 is yes, blank is no)',
  reattempt varchar(1) default NULL COMMENT 'Indicates whether reattempts should occur on payment failure (1 is yes, blank is no)',
  retry_at varchar(28) default NULL COMMENT 'Date PayPal will retry a failed subscription payment',
  recur_times int(11) default NULL COMMENT 'The number of payment installations that will occur at the regular rate',
  username varchar(64) default NULL COMMENT '(Optional) Username generated by PayPal and given to subscriber to access the subscription',
  password varchar(24) default NULL COMMENT '(Optional) Password generated by PayPal and given to subscriber to access the subscription (Encrypted)',
  subscr_id varchar(19) default NULL COMMENT 'ID generated by PayPal for the subscriber',
  case_id varchar(28) default NULL COMMENT 'Case identification number',
  case_type varchar(28) default NULL COMMENT 'complaint/chargeback',
  case_creation_date varchar(28) default NULL COMMENT 'Date/Time the case was registered',
  created datetime default NULL,
  modified datetime default NULL,
  PRIMARY KEY  (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_items`
--

CREATE TABLE `paypal_items` (
  `id` varchar(36) NOT NULL,
  `instant_payment_notification_id` varchar(36) NOT NULL,
  `item_name` varchar(127) default NULL,
  `item_number` varchar(127) default NULL,
  `quantity` varchar(127) default NULL,
  `mc_gross` float(10,2) default NULL,
  `mc_shipping` float(10,2) default NULL,
  `mc_handling` float(10,2) default NULL,
  `tax` float(10,2) default NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
