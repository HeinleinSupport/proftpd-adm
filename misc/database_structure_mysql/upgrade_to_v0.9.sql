USE proftpd_admin;

CREATE TABLE `ftpquotalimits` (
  `name` varchar(30) NOT NULL default '',
  `quota_type` enum('user','group','class','all') NOT NULL default 'user',
  `per_session` enum('false','true') NOT NULL default 'false',
  `limit_type` enum('soft','hard') NOT NULL default 'hard',
  `bytes_in_avail` float NOT NULL default '0',
  `bytes_out_avail` float NOT NULL default '0',
  `bytes_xfer_avail` float NOT NULL default '0',
  `files_in_avail` int(10) unsigned NOT NULL default '0',
  `files_out_avail` int(10) unsigned NOT NULL default '0',
  `files_xfer_avail` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`name`)
) TYPE=MyISAM;

CREATE TABLE `ftpquotatallies` (
  `name` varchar(30) NOT NULL default '',
  `quota_type` enum('user','group','class','all') NOT NULL default 'user',
  `bytes_in_used` float NOT NULL default '0',
  `bytes_out_used` float NOT NULL default '0',
  `bytes_xfer_used` float NOT NULL default '0',
  `files_in_used` int(10) unsigned NOT NULL default '0',
  `files_out_used` int(10) unsigned NOT NULL default '0',
  `files_xfer_used` int(10) unsigned NOT NULL default '0'
) TYPE=MyISAM;