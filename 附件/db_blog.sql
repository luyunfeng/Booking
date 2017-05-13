CREATE TABLE `booking_admin` (
  `user` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8


CREATE TABLE `booking_film` (
  `filmid` int(11) NOT NULL AUTO_INCREMENT,
  `filmname` varchar(32) NOT NULL,
  `zhuyan` varchar(32) DEFAULT NULL,
  `info` text,
  PRIMARY KEY (`filmid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8

CREATE TABLE `booking_playtime` (
  `playid` int(11) NOT NULL AUTO_INCREMENT,
  `filmid` int(11) NOT NULL,
  `time` varchar(30) DEFAULT NULL,
  `price` decimal(5,1) DEFAULT NULL,
  PRIMARY KEY (`playid`),
  KEY `filmid` (`filmid`),
  CONSTRAINT `booking_playtime_ibfk_1` FOREIGN KEY (`filmid`) REFERENCES `booking_film` (`filmid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8

CREATE TABLE `booking_ticket` (
  `ticketid` bigint(20) NOT NULL AUTO_INCREMENT,
  `playid` int(11) NOT NULL,
  `userid` int(30) DEFAULT NULL,
  `seat` char(16) DEFAULT NULL,
  `selltime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ticketid`),
  KEY `playid` (`playid`),
  KEY `userid` (`userid`),
  CONSTRAINT `booking_ticket_ibfk_1` FOREIGN KEY (`playid`) REFERENCES `booking_playtime` (`playid`) ON DELETE CASCADE,
  CONSTRAINT `booking_ticket_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `booking_user` (`userid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=420 DEFAULT CHARSET=utf8

CREATE TABLE `booking_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8