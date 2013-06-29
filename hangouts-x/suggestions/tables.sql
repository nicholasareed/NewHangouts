--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `suggestion` varchar(255) NOT NULL default '',
  `votes_up` int(6) unsigned NOT NULL default '0',
  `votes_down` int(6) unsigned NOT NULL default '0',
  `rating` int(6) NOT NULL default '0',
  `dt` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `rating` (`rating`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions_votes`
--

CREATE TABLE `suggestions_votes` (
  `suggestion_id` int(10) unsigned NOT NULL default '0',
  `ip` int(10) unsigned NOT NULL default '0',
  `day` date NOT NULL default '0000-00-00',
  `vote` tinyint(1) NOT NULL default '0',
  `dt` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`suggestion_id`,`ip`,`day`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;