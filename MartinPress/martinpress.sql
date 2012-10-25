-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 04 okt 2012 kl 13:18
-- Serverversion: 5.5.24-log
-- PHP-version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `martinpress`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `mpcategory`
--

CREATE TABLE IF NOT EXISTS `mpcategory` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(50) NOT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `mpcategory`
--

INSERT INTO `mpcategory` (`catID`, `catname`) VALUES
(1, 'PHP'),
(2, 'CSS');

-- --------------------------------------------------------

--
-- Tabellstruktur `mpposts`
--

CREATE TABLE IF NOT EXISTS `mpposts` (
  `articleID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `posted` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `catID` int(11) NOT NULL,
  PRIMARY KEY (`articleID`),
  KEY `catID` (`catID`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumpning av Data i tabell `mpposts`
--

INSERT INTO `mpposts` (`articleID`, `title`, `content`, `posted`, `username`, `catID`) VALUES
(1, 'First post!', 'Hey this is my first post!', '2012-10-03', 'Martin', 1),
(2, 'Second post!', 'Hey this is my second post!', '2012-10-03', 'Martin', 1),
(3, 'Third post!', 'Hey this is my third post!', '2012-10-03', 'Janne', 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `mpusers`
--

CREATE TABLE IF NOT EXISTS `mpusers` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumpning av Data i tabell `mpusers`
--

INSERT INTO `mpusers` (`userID`, `username`, `password`, `email`) VALUES
(1, 'Martin', 'abc', 'mune2000@msn.com'),
(2, 'Janne', 'abc', 'abc@msn.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
