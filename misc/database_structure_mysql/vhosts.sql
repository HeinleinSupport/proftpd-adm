USE proftpd_admin;

CREATE TABLE `vhtable` (
  `servername` varchar(255) NOT NULL default '',
  `docroot` varchar(255) NOT NULL default '',
  `user_id` int(10) NOT NULL default '0',
  PRIMARY KEY  (`servername`)
) TYPE=MyISAM;
        