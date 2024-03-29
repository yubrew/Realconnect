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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `writer_assignment_id`, `create_date`, `youtube_link`) VALUES
(1, 6, 1, '2012-03-10 04:44:31', 'youtube'),
(2, 11, 6, '2012-03-11 17:29:35', 'lorem ipsum lorem ipsum ');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `article_paragraphs`
--

INSERT INTO `article_paragraphs` (`id`, `article_id`, `title`, `content`, `order`) VALUES
(1, 1, 'Morbi ac lectus tellus, nec gravida quam', 'Morbi ac lectus tellus, nec gravida quam. Ut felis justo, luctus vitae faucibus vitae, rhoncus nec erat. Nam et ante lobortis sem luctus mattis. Pellentesque dignissim, justo nec auctor mattis, neque erat lobortis nulla, eget consectetur leo purus vel magna. Donec lacinia magna quis dolor luctus vel egestas risus malesuada. Proin volutpat, orci ornare pretium mollis, nunc lorem faucibus libero, vitae vestibulum mauris metus vitae ante. In aliquam, dui euismod commodo ultrices, eros purus mollis eros, ac venenatis ipsum massa id ante. Curabitur rutrum nulla a dolor commodo posuere. Nulla facilisi. Vestibulum id elit a lacus semper semper at ac leo. Ut mollis auctor gravida. In ornare vestibulum ipsum sit amet dictum. Quisque et nulla ipsum.', 0),
(2, 1, 'Morbi ac lectus tellus, nec gravida quam', 'Morbi ac lectus tellus, nec gravida quam. Ut felis justo, luctus vitae faucibus vitae, rhoncus nec erat. Nam et ante lobortis sem luctus mattis. Pellentesque dignissim, justo nec auctor mattis, neque erat lobortis nulla, eget consectetur leo purus vel magna. Donec lacinia magna quis dolor luctus vel egestas risus malesuada. Proin volutpat, orci ornare pretium mollis, nunc lorem faucibus libero, vitae vestibulum mauris metus vitae ante. In aliquam, dui euismod commodo ultrices, eros purus mollis eros, ac venenatis ipsum massa id ante. Curabitur rutrum nulla a dolor commodo posuere. Nulla facilisi. Vestibulum id elit a lacus semper semper at ac leo. Ut mollis auctor gravida. In ornare vestibulum ipsum sit amet dictum. Quisque et nulla ipsum.', 1),
(3, 1, 'Morbi ac lectus tellus, nec gravida quam', 'Morbi ac lectus tellus, nec gravida quam. Ut felis justo, luctus vitae faucibus vitae, rhoncus nec erat. Nam et ante lobortis sem luctus mattis. Pellentesque dignissim, justo nec auctor mattis, neque erat lobortis nulla, eget consectetur leo purus vel magna. Donec lacinia magna quis dolor luctus vel egestas risus malesuada. Proin volutpat, orci ornare pretium mollis, nunc lorem faucibus libero, vitae vestibulum mauris metus vitae ante. In aliquam, dui euismod commodo ultrices, eros purus mollis eros, ac venenatis ipsum massa id ante. Curabitur rutrum nulla a dolor commodo posuere. Nulla facilisi. Vestibulum id elit a lacus semper semper at ac leo. Ut mollis auctor gravida. In ornare vestibulum ipsum sit amet dictum. Quisque et nulla ipsum.', 2),
(4, 1, 'Morbi ac lectus tellus, nec gravida quam', 'Morbi ac lectus tellus, nec gravida quam. Ut felis justo, luctus vitae faucibus vitae, rhoncus nec erat. Nam et ante lobortis sem luctus mattis. Pellentesque dignissim, justo nec auctor mattis, neque erat lobortis nulla, eget consectetur leo purus vel magna. Donec lacinia magna quis dolor luctus vel egestas risus malesuada. Proin volutpat, orci ornare pretium mollis, nunc lorem faucibus libero, vitae vestibulum mauris metus vitae ante. In aliquam, dui euismod commodo ultrices, eros purus mollis eros, ac venenatis ipsum massa id ante. Curabitur rutrum nulla a dolor commodo posuere. Nulla facilisi. Vestibulum id elit a lacus semper semper at ac leo. Ut mollis auctor gravida. In ornare vestibulum ipsum sit amet dictum. Quisque et nulla ipsum.Morbi ac lectus tellus, nec gravida quam. Ut felis justo, luctus vitae faucibus vitae, rhoncus nec erat. Nam et ante lobortis sem luctus mattis. Pellentesque dignissim, justo nec auctor mattis, neque erat lobortis nulla, eget consectetur leo purus vel magna. Donec lacinia magna quis dolor luctus vel egestas risus malesuada. Proin volutpat, orci ornare pretium mollis, nunc lorem faucibus libero, vitae vestibulum mauris metus vitae ante. In aliquam, dui euismod commodo ultrices, eros purus mollis eros, ac venenatis ipsum massa id ante. Curabitur rutrum nulla a dolor commodo posuere. Nulla facilisi. Vestibulum id elit a lacus semper semper at ac leo. Ut mollis auctor gravida. In ornare vestibulum ipsum sit amet dictum. Quisque et nulla ipsum.', 3),
(5, 2, 'lorem ipsum lorem ipsum lorem ipsum ', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 0),
(6, 2, 'lorem ipsum lorem ipsum lorem ipsum ', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsum lorem ipsum  ', 1),
(7, 2, 'lorem ipsum lorem ipsum lorem ipsum ', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 2),
(8, 2, 'lorem ipsum lorem ipsum lorem ipsum ', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 3);

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
(1, 'Template 1 -4 paragraphs, 500 words', 4, '1.docx', 500, 5);

-- --------------------------------------------------------

--
-- Table structure for table `instant_payment_notifications`
--

CREATE TABLE IF NOT EXISTS `instant_payment_notifications` (
  `id` char(36) CHARACTER SET latin1 NOT NULL,
  `notify_version` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'IPN Version Number',
  `verify_sign` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Encrypted string used to verify the authenticityof the tansaction',
  `test_ipn` int(11) DEFAULT NULL,
  `address_city` varchar(40) CHARACTER SET latin1 DEFAULT NULL COMMENT 'City of customers address',
  `address_country` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Country of customers address',
  `address_country_code` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Two character ISO 3166 country code',
  `address_name` varchar(128) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Name used with address (included when customer provides a Gift address)',
  `address_state` varchar(40) CHARACTER SET latin1 DEFAULT NULL COMMENT 'State of customer address',
  `address_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'confirmed/unconfirmed',
  `address_street` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s street address',
  `address_zip` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Zip code of customer''s address',
  `first_name` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s first name',
  `last_name` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s last name',
  `payer_business_name` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s company name, if customer represents a business',
  `payer_email` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s primary email address. Use this email to provide any credits',
  `payer_id` varchar(13) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Unique customer ID.',
  `payer_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'verified/unverified',
  `contact_phone` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Customer''s telephone number.',
  `residence_country` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Two-Character ISO 3166 country code',
  `business` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Email address or account ID of the payment recipient (that is, the merchant). Equivalent to the values of receiver_email (If payment is sent to primary account) and business set in the Website Payment HTML.',
  `item_name` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Item name as passed by you, the merchant. Or, if not passed by you, as entered by your customer. If this is a shopping cart transaction, Paypal will append the number of the item (e.g., item_name_1,item_name_2, and so forth).',
  `item_number` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Pass-through variable for you to track purchases. It will get passed back to you at the completion of the payment. If omitted, no variable will be passed back to you.',
  `quantity` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Quantity as entered by your customer or as passed by you, the merchant. If this is a shopping cart transaction, PayPal appends the number of the item (e.g., quantity1,quantity2).',
  `receiver_email` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Primary email address of the payment recipient (that is, the merchant). If the payment is sent to a non-primary email address on your PayPal account, the receiver_email is still your primary email.',
  `receiver_id` varchar(13) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Unique account ID of the payment recipient (i.e., the merchant). This is the same as the recipients referral ID.',
  `custom` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Custom value as passed by you, the merchant. These are pass-through variables that are never presented to your customer.',
  `invoice` varchar(127) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Pass through variable you can use to identify your invoice number for this purchase. If omitted, no variable is passed back.',
  `memo` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Memo as entered by your customer in PayPal Website Payments note field.',
  `option_name1` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option name 1 as requested by you',
  `option_name2` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 2 name as requested by you',
  `option_selection1` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 1 choice as entered by your customer',
  `option_selection2` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Option 2 choice as entered by your customer',
  `tax` decimal(10,2) DEFAULT NULL COMMENT 'Amount of tax charged on payment',
  `auth_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization identification number',
  `auth_exp` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization expiration date and time, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `auth_amount` int(11) DEFAULT NULL COMMENT 'Authorization amount',
  `auth_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Status of authorization',
  `num_cart_items` int(11) DEFAULT NULL COMMENT 'If this is a PayPal shopping cart transaction, number of items in the cart',
  `parent_txn_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'In the case of a refund, reversal, or cancelled reversal, this variable contains the txn_id of the original transaction, while txn_id contains a new ID for the new transaction.',
  `payment_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Time/date stamp generated by PayPal, in the following format: HH:MM:SS DD Mmm YY, YYYY PST',
  `payment_status` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Payment status of the payment',
  `payment_type` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'echeck/instant',
  `pending_reason` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This variable is only set if payment_status=pending',
  `reason_code` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This variable is only set if payment_status=reversed',
  `remaining_settle` int(11) DEFAULT NULL COMMENT 'Remaining amount that can be captured with Authorization and Capture',
  `shipping_method` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The name of a shipping method from the shipping calculations section of the merchants account profile. The buyer selected the named shipping method for this transaction',
  `shipping` decimal(10,2) DEFAULT NULL COMMENT 'Shipping charges associated with this transaction. Format unsigned, no currency symbol, two decimal places',
  `transaction_entity` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Authorization and capture transaction entity',
  `txn_id` varchar(19) CHARACTER SET latin1 DEFAULT '' COMMENT 'A unique transaction ID generated by PayPal',
  `txn_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'cart/express_checkout/send-money/virtual-terminal/web-accept',
  `exchange_rate` decimal(10,2) DEFAULT NULL COMMENT 'Exchange rate used if a currency conversion occured',
  `mc_currency` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Three character country code. For payment IPN notifications, this is the currency of the payment, for non-payment subscription IPN notifications, this is the currency of the subscription.',
  `mc_fee` decimal(10,2) DEFAULT NULL COMMENT 'Transaction fee associated with the payment, mc_gross minus mc_fee equals the amount deposited into the receiver_email account. Equivalent to payment_fee for USD payments. If this amount is negative, it signifies a refund or reversal, and either ofthose p',
  `mc_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full amount of the customer''s payment',
  `mc_handling` decimal(10,2) DEFAULT NULL COMMENT 'Total handling charge associated with the transaction',
  `mc_shipping` decimal(10,2) DEFAULT NULL COMMENT 'Total shipping amount associated with the transaction',
  `payment_fee` decimal(10,2) DEFAULT NULL COMMENT 'USD transaction fee associated with the payment',
  `payment_gross` decimal(10,2) DEFAULT NULL COMMENT 'Full USD amount of the customers payment transaction, before payment_fee is subtracted',
  `settle_amount` decimal(10,2) DEFAULT NULL COMMENT 'Amount that is deposited into the account''s primary balance after a currency conversion',
  `settle_currency` varchar(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Currency of settle amount. Three digit currency code',
  `auction_buyer_id` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The customer''s auction ID.',
  `auction_closing_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'The auction''s close date. In the format: HH:MM:SS DD Mmm YY, YYYY PSD',
  `auction_multi_item` int(11) DEFAULT NULL COMMENT 'The number of items purchased in multi-item auction payments',
  `for_auction` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'This is an auction payment - payments made using Pay for eBay Items or Smart Logos - as well as send money/money request payments with the type eBay items or Auction Goods(non-eBay)',
  `subscr_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Start date or cancellation date depending on whether txn_type is subcr_signup or subscr_cancel',
  `subscr_effective` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date when a subscription modification becomes effective',
  `period1` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Trial subscription interval in days, weeks, months, years (example a 4 day interval is 4 D',
  `period2` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Trial period',
  `period3` varchar(10) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Regular subscription interval in days, weeks, months, years',
  `amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 1 for USD',
  `amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for Trial period 2 for USD',
  `amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription  period 1 for USD',
  `mc_amount1` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 1 regardless of currency',
  `mc_amount2` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for trial period 2 regardless of currency',
  `mc_amount3` decimal(10,2) DEFAULT NULL COMMENT 'Amount of payment for regular subscription period regardless of currency',
  `recurring` varchar(1) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Indicates whether rate recurs (1 is yes, blank is no)',
  `reattempt` varchar(1) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Indicates whether reattempts should occur on payment failure (1 is yes, blank is no)',
  `retry_at` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date PayPal will retry a failed subscription payment',
  `recur_times` int(11) DEFAULT NULL COMMENT 'The number of payment installations that will occur at the regular rate',
  `username` varchar(64) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Username generated by PayPal and given to subscriber to access the subscription',
  `password` varchar(24) CHARACTER SET latin1 DEFAULT NULL COMMENT '(Optional) Password generated by PayPal and given to subscriber to access the subscription (Encrypted)',
  `subscr_id` varchar(19) CHARACTER SET latin1 DEFAULT NULL COMMENT 'ID generated by PayPal for the subscriber',
  `case_id` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Case identification number',
  `case_type` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'complaint/chargeback',
  `case_creation_date` varchar(28) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Date/Time the case was registered',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `instant_payment_notifications`
--

INSERT INTO `instant_payment_notifications` (`id`, `notify_version`, `verify_sign`, `test_ipn`, `address_city`, `address_country`, `address_country_code`, `address_name`, `address_state`, `address_status`, `address_street`, `address_zip`, `first_name`, `last_name`, `payer_business_name`, `payer_email`, `payer_id`, `payer_status`, `contact_phone`, `residence_country`, `business`, `item_name`, `item_number`, `quantity`, `receiver_email`, `receiver_id`, `custom`, `invoice`, `memo`, `option_name1`, `option_name2`, `option_selection1`, `option_selection2`, `tax`, `auth_id`, `auth_exp`, `auth_amount`, `auth_status`, `num_cart_items`, `parent_txn_id`, `payment_date`, `payment_status`, `payment_type`, `pending_reason`, `reason_code`, `remaining_settle`, `shipping_method`, `shipping`, `transaction_entity`, `txn_id`, `txn_type`, `exchange_rate`, `mc_currency`, `mc_fee`, `mc_gross`, `mc_handling`, `mc_shipping`, `payment_fee`, `payment_gross`, `settle_amount`, `settle_currency`, `auction_buyer_id`, `auction_closing_date`, `auction_multi_item`, `for_auction`, `subscr_date`, `subscr_effective`, `period1`, `period2`, `period3`, `amount1`, `amount2`, `amount3`, `mc_amount1`, `mc_amount2`, `mc_amount3`, `recurring`, `reattempt`, `retry_at`, `recur_times`, `username`, `password`, `subscr_id`, `case_id`, `case_type`, `case_creation_date`, `created`, `modified`) VALUES
('4f561f63-573c-4b1a-b1f6-56afd13b92f2', '3.4', 'AZEkDCPyT-9OQ.9V8khMg74eUg60AeBaWktSz-iVDTAf1z3-j9ylTzM4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'buyerfirstname', 'buyerlastname', 'Business', 'b.test_1331023546_per@gmail.com', 'ECKCJWMTSD8PN', 'unverified', NULL, 'US', 's1_1331026488_biz@gmail.com', 'Order #8 : 21 Articles', 'Order-8', '1', 's1_1331026488_biz@gmail.com', '5ZAFK7S57VPQJ', '', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '06:29:51 Mar 06, 2012 PST', 'Completed', 'instant', NULL, NULL, NULL, NULL, 0.00, NULL, '0D453268L7474712R', 'web_accept', NULL, 'USD', 3.95, 126.00, NULL, NULL, 3.95, 126.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-06 09:29:55', '2012-03-06 09:29:55'),
('4f562028-87dc-4f6e-b40a-57b6d13b92f2', '3.4', 'AFcWxV21C7fd0v3bYYYRCpSSRl31ANXpbaj7qPkH4B05KJNFwePdEwjZ', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'buyerfirstname', 'buyerlastname', 'Business', 'b.test_1331023546_per@gmail.com', 'ECKCJWMTSD8PN', 'unverified', NULL, 'US', 's1_1331026488_biz@gmail.com', 'Order #8 : 21 Articles', 'Order-8', '1', 's1_1331026488_biz@gmail.com', '5ZAFK7S57VPQJ', '', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '06:33:07 Mar 06, 2012 PST', 'Completed', 'instant', NULL, NULL, NULL, NULL, 0.00, NULL, '4LF56522U9654131B', 'web_accept', NULL, 'USD', 3.95, 126.00, NULL, NULL, 3.95, 126.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-06 09:33:12', '2012-03-06 09:33:12'),
('4f56218e-a224-46e0-b9f0-5939d13b92f2', '3.4', 'AFcWxV21C7fd0v3bYYYRCpSSRl31APmfOFz3d8T.HPJ14HKhNjv2zM1a', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'buyerfirstname', 'buyerlastname', 'Business', 'b.test_1331023546_per@gmail.com', 'ECKCJWMTSD8PN', 'unverified', NULL, 'US', 's1_1331026488_biz@gmail.com', 'Order #8 : 21 Articles', 'Order-8', '1', 's1_1331026488_biz@gmail.com', '5ZAFK7S57VPQJ', '', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '06:39:03 Mar 06, 2012 PST', 'Completed', 'instant', NULL, NULL, NULL, NULL, 0.00, NULL, '04X33030V6857704J', 'web_accept', NULL, 'USD', 3.95, 126.00, NULL, NULL, 3.95, 126.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-06 09:39:10', '2012-03-06 09:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `writer_order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `writer_order_id` (`writer_order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `keyword`, `created_date`, `writer_order_id`) VALUES
(1, 'unique keywords', '0000-00-00 00:00:00', 1),
(2, 'keyword1', '0000-00-00 00:00:00', 1),
(3, 'keyword2', '0000-00-00 00:00:00', 1),
(4, 'kw1', '0000-00-00 00:00:00', 2),
(5, 'kw2', '0000-00-00 00:00:00', 2),
(6, 'kw3', '0000-00-00 00:00:00', 2),
(7, 'kw4', '0000-00-00 00:00:00', 2),
(8, 'kw5', '0000-00-00 00:00:00', 2),
(9, 'key1', '0000-00-00 00:00:00', 3),
(10, 'key2', '0000-00-00 00:00:00', 3),
(11, 'key3', '0000-00-00 00:00:00', 3),
(12, 'key4', '0000-00-00 00:00:00', 3),
(13, 'key5', '0000-00-00 00:00:00', 3),
(14, '3 - keyword 1', '0000-00-00 00:00:00', 4),
(15, '3 - keyword 2', '0000-00-00 00:00:00', 4),
(16, '3 - keyword 3', '0000-00-00 00:00:00', 4),
(17, 'keyword3', '0000-00-00 00:00:00', 5),
(18, 'keyword5', '0000-00-00 00:00:00', 6),
(19, 'hollywood movies online', '0000-00-00 00:00:00', 7),
(20, 'Keyboard', '0000-00-00 00:00:00', 8),
(21, 'Mice', '0000-00-00 00:00:00', 8),
(22, 'Tasks', '0000-00-00 00:00:00', 8),
(23, 'kw1', '0000-00-00 00:00:00', 9),
(24, 'kw2', '0000-00-00 00:00:00', 9),
(25, 'kw3', '0000-00-00 00:00:00', 9);

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
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `order_delivery_option_id` int(11) NOT NULL,
  `status` enum('pending','in_progress','completed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` enum('pending','completed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `rating` tinyint(4) NOT NULL DEFAULT '0',
  `instant_payment_notification_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `article_template_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`order_delivery_option_id`),
  KEY `status` (`status`),
  KEY `payment_status` (`payment_status`),
  KEY `instant_payment_notification_id` (`instant_payment_notification_id`),
  KEY `article_template_id` (`article_template_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `create_date`, `completed_date`, `articles_count`, `details`, `order_delivery_option_id`, `status`, `payment_status`, `rating`, `instant_payment_notification_id`, `article_template_id`) VALUES
(1, 2, '2012-03-10 04:22:35', NULL, 10, 'details', 1, 'in_progress', 'completed', 0, NULL, 1),
(2, 2, '2012-03-10 10:00:52', NULL, 5, 'a', 1, 'pending', 'pending', 0, NULL, 1),
(3, 2, '2012-03-10 10:06:45', NULL, 5, 'blah', 1, 'pending', 'pending', 0, NULL, 1),
(4, 2, '2012-03-11 17:26:54', NULL, 5, 'Client want''s 5 articles in the IT niche', 2, 'pending', 'pending', 0, NULL, 1),
(5, 2, '2012-03-14 18:46:17', NULL, 5, 'no', 1, 'pending', 'pending', 0, NULL, 1),
(6, 2, '2012-03-15 11:44:00', NULL, 55, '3 details', 1, 'pending', 'completed', 0, NULL, 1),
(7, 2, '2012-03-15 12:39:18', NULL, 15, 'details', 1, 'pending', 'completed', 0, NULL, 1),
(8, 2, '2012-03-15 13:02:36', NULL, 20, 'order details #3', 1, 'pending', 'completed', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery_options`
--

CREATE TABLE IF NOT EXISTS `order_delivery_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `min_articles` tinyint(3) unsigned NOT NULL,
  `max_articles` tinyint(3) unsigned NOT NULL,
  `delivery_hours` tinyint(3) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price_per_article` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order_delivery_options`
--

INSERT INTO `order_delivery_options` (`id`, `min_articles`, `max_articles`, `delivery_hours`, `description`, `price_per_article`) VALUES
(1, 5, 20, 30, '6$ for one 500 words article, 30h', 6.00),
(2, 5, 100, 80, '5$ for one 500 words article, 80h', 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_items`
--

CREATE TABLE IF NOT EXISTS `paypal_items` (
  `id` varchar(36) CHARACTER SET latin1 NOT NULL,
  `instant_payment_notification_id` varchar(36) CHARACTER SET latin1 NOT NULL,
  `item_name` varchar(127) CHARACTER SET latin1 DEFAULT NULL,
  `item_number` varchar(127) CHARACTER SET latin1 DEFAULT NULL,
  `quantity` varchar(127) CHARACTER SET latin1 DEFAULT NULL,
  `mc_gross` float(10,2) DEFAULT NULL,
  `mc_shipping` float(10,2) DEFAULT NULL,
  `mc_handling` float(10,2) DEFAULT NULL,
  `tax` float(10,2) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(48) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('admin','writer','client','manager') COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','disabled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `registered_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`password`,`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `username`, `status`, `registered_date`) VALUES
(1, 'admin@realconnect.mobi', '7a363d7654a1ebbb7550687e4ffa84437cd8f958', 'admin', 'admin', 'active', '2012-02-28 20:37:36'),
(3, 'manager@aloise.name', 'de320c1593effa44371badc34d832445359f891d', 'manager', 'manager', 'active', '2012-02-25 18:18:25'),
(2, 'client@aloise.name', 'de320c1593effa44371badc34d832445359f891d', 'client', 'client', 'active', '2012-02-19 17:58:41'),
(6, 'writer@aloise.name', 'de320c1593effa44371badc34d832445359f891d', 'writer', 'aloise_writer', 'active', '2012-02-19 13:23:50'),
(7, 'writer2@aloise.name', 'de320c1593effa44371badc34d832445359f891d', 'writer', 'writer2', 'active', '2012-02-28 22:27:59'),
(8, 'aloise@aloise.name', 'faafa6664cb8e25b10d7a98af3af24c38e51ff50', 'client', 'aloise', 'active', '2012-03-06 07:46:33'),
(9, 'srdjan.vunic@liandri.biz', '18d6391313a3605c8c48b5c5e502eb5932fa645a', 'admin', 'SrÄ‘an', 'active', '2012-03-11 17:20:20'),
(10, 'syzygy1601@gmail.com', '18d6391313a3605c8c48b5c5e502eb5932fa645a', 'writer', 'SrdjanM', 'active', '2012-03-11 17:21:21'),
(11, 'syzygy18@gmail.com', '18d6391313a3605c8c48b5c5e502eb5932fa645a', 'writer', 'SrdjanW', 'active', '2012-03-11 17:21:52');

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
(1, 6, '', '2012-03-11 17:30:39', 'submited');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `writer_assignments`
--

INSERT INTO `writer_assignments` (`id`, `writer_user_id`, `manager_user_id`, `writer_order_id`, `create_date`, `completed_date`, `status`) VALUES
(1, 6, 3, 1, '2012-03-10 04:29:28', NULL, 'completed'),
(4, 7, 3, 5, '2012-03-10 14:09:17', NULL, 'pending'),
(3, 7, 3, 4, '2012-03-10 13:56:09', NULL, 'pending'),
(5, 7, 3, 6, '2012-03-10 14:20:42', NULL, 'pending'),
(6, 11, 3, 4, '2012-03-11 17:27:31', NULL, 'in_review'),
(7, 6, 3, 5, '2012-03-14 18:47:01', NULL, 'pending');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `writer_orders`
--

INSERT INTO `writer_orders` (`id`, `order_id`, `create_date`, `user_id`, `description`, `article_template_id`) VALUES
(1, 1, '2012-03-10 04:29:28', 3, 'order details', 1),
(2, 2, '2012-03-10 10:00:52', 3, 'a', 1),
(3, 3, '2012-03-10 10:06:45', 3, 'blah', 1),
(4, 1, '2012-03-10 13:56:09', 3, 'one more assignment', 1),
(5, 1, '2012-03-10 14:09:17', 3, 'manager description about keyword3', 1),
(6, 1, '2012-03-10 14:20:42', 3, 'one more assignment on order #1 to writer2 with keyword5', 1),
(7, 4, '2012-03-11 17:26:54', 3, 'N/a', 1),
(8, 5, '2012-03-14 18:46:17', 3, 'no', 1),
(9, 6, '2012-03-15 11:44:00', 3, 'order description', 1);
