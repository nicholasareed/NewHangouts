CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `first_name` varchar(32) NOT NULL DEFAULT '',
  `last_name` varchar(32) DEFAULT NULL,
  `email` varchar(1024) NOT NULL DEFAULT '',
  `email_code` varchar(32) DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `type` int(11) DEFAULT '2',
  `timestamp` varchar(40) DEFAULT NULL,
  `theme` mediumtext,
  `allow_email` int(11) DEFAULT '1',
  `profile` varchar(70) DEFAULT 'images/profile/default.jpeg',
  `badges` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;