CREATE DATABASE proftpd_admin;
USE proftpd_admin;

CREATE TABLE usertable (
  userid text,
  passwd text,
  homedir text,
  shell text,
  uid int(11) NOT NULL auto_increment,
  gid int(11) default NULL,
  count int(11) NOT NULL default '0',
  lastlogin datetime NOT NULL default '0000-00-00 00:00:00',
  lastlogout datetime NOT NULL default '0000-00-00 00:00:00',
  expiration datetime NOT NULL default '0000-00-00 00:00:00',
  disabled tinyint(4) default '0',
  det_name tinytext,
  det_mail tinytext,
  det_adress tinytext,
  det_notes tinytext,
  PRIMARY KEY  (uid)
) TYPE=MyISAM;

CREATE TABLE grouptable (
  groupname text,
  gid int(11) NOT NULL auto_increment,
  members text,
  description tinytext,
  PRIMARY KEY  (gid),
  UNIQUE KEY gid_2 (gid),
  KEY gid (gid)
) TYPE=MyISAM;

CREATE TABLE xfer_stat (
  userid text,
  file text,
  size bigint(20) default '0',
  address_full text,
  address_ip text,
  command text,
  timespent text,
  time text,
  cmd text,
  dunno text
) TYPE=MyISAM;

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

INSERT INTO usertable (uid) VALUES (9999);
DELETE FROM usertable WHERE uid=9999;
INSERT INTO grouptable (gid) VALUES (9999);
DELETE FROM grouptable WHERE gid=9999;
INSERT INTO grouptable (groupname, description) VALUES ("admins", "Administrators");
INSERT INTO grouptable (groupname, description) VALUES ("users", "Ordinary users");

GRANT ALL ON usertable TO proftpd@localhost IDENTIFIED BY '<database_password>';
GRANT ALL ON grouptable TO proftpd@localhost IDENTIFIED BY '<database_password>';
GRANT ALL ON xfer_stat TO proftpd@localhost IDENTIFIED BY '<database_password>';
