CREATE TABLE `neothemesconfig` (
  `nsn` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL DEFAULT '', 
  `modulesid` varchar(255) NOT NULL,
  `mnsnid` varchar(255) NOT NULL, 
  `fnsnid` varchar(255) NOT NULL, 
  `menuid` varchar(255) NOT NULL,
  `line` varchar(255) NOT NULL DEFAULT '', 
  `fburl` varchar(255) NOT NULL DEFAULT '', 
  `fbfansurl` varchar(255) NOT NULL DEFAULT '',  
  `contactus` varchar(255) NOT NULL DEFAULT '',  
  `contactmatters` varchar(255) NOT NULL default '', /*聯絡事項*/    
  PRIMARY KEY (`nsn`)
) ENGINE=MyISAM;



INSERT INTO `neothemesconfig` (`nsn`,`field`,`modulesid`,`mnsnid`,`fnsnid`,`menuid`) VALUES
(1,'02;0;1;0;b;b;b;0;0;7;1;0;0;1;1;1;1;01;;;1;1;1;1;1;1;1;1;0','system','0','0','0');  


CREATE TABLE `neothemeskeyword` (
  `nsn` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `keywordid` varchar(255) NOT NULL DEFAULT '',
  `keywordcenter` text NOT NULL,
  `wdescription`  text NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`nsn`)
) ENGINE=MyISAM;




CREATE TABLE `neothemesmarquee` (
  `nsn` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nnumber` int(255) NOT NULL, 
  `content` text NOT NULL,
  `url` text NOT NULL,
  `target` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL,
  `enable` enum('1','0') NOT NULL default '1', /*是否啟用*/    
  PRIMARY KEY (`nsn`)
) ENGINE=MyISAM;



CREATE TABLE `neothemesflash` (
  `nsn` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nnumber` int(255) NOT NULL,
  `content` text NOT NULL,
  `url` text NOT NULL,
  `target` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL,
  `imgid` varchar(255) NOT NULL, 
  `themesid` varchar(255) NOT NULL, 
  PRIMARY KEY (`nsn`)
) ENGINE=MyISAM;



CREATE TABLE `neothemesmenu` (
  `nsn` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nnumber` int(255)  NOT NULL, 
  `master_slave` varchar(255) NOT NULL, 
  `manugroup`  int(255)  NOT NULL, 
  `content` text NOT NULL,
  `url` text NOT NULL,
  `target` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL,
  `snid` int(255)  NOT NULL,   
  PRIMARY KEY (`nsn`)
) ENGINE=MyISAM;


CREATE TABLE `neorightmenu` (
  `nsn` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `target` varchar(255) NOT NULL,
  `snid` int(255)  NOT NULL,   
  PRIMARY KEY (`nsn`)
) ENGINE=MyISAM;


CREATE TABLE `neoblockmenusort` (
  `sortid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `sorttitle` varchar(255) NOT NULL,
  `sortimg` varchar(255) NOT NULL,
  `sorting` int(255)  NOT NULL,   
  `radiogstyle` enum('text','img') NOT NULL default 'text',  
  `imgstyle` enum('random','sorting') NOT NULL default 'sorting',  
  PRIMARY KEY (`sortid`)
) ENGINE=MyISAM;


CREATE TABLE `neoblockmenubutton` (
  `bid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `sortid` int(255)  NOT NULL,   
  `buttontitle` varchar(255) NOT NULL,
  `buttonurl` varchar(255) NOT NULL,
  `target` enum('0','1') NOT NULL default '0',  
  `sortyn` enum('y','n') NOT NULL default 'n',
  `modulesid` varchar(255) NOT NULL,  
  `variableid` varchar(255) NOT NULL,    
  `orderid` int(255)  NOT NULL,   
  `buttonimg` varchar(255) NOT NULL,    
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM;



CREATE TABLE `neocontactusform` (
  `cfid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `tel_user` varchar(255) NOT NULL,
  `citytel_user` varchar(255) NOT NULL,  
  `radiog` enum('male','female') NOT NULL default 'male',  
  `texe_user` text NOT NULL,
  `cfidtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `readtrue` int(5)  NOT NULL,   
  `contactmatters` varchar(255) NOT NULL default '', /*聯絡事項內容*/
  `replytext` longtext NOT NULL, /*回覆說明*/    
  `replytime` datetime NOT NULL default '0000-00-00 00:00:00', /*回覆時間*/    
   PRIMARY KEY (`cfid`)
) ENGINE=MyISAM;