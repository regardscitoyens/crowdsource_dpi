SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE TABLE IF NOT EXISTS `documents` (
`id` int(10) unsigned NOT NULL,
  `img` varchar(100) NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `parlementaire` varchar(100) NOT NULL,
  `parlementaire_avatarurl` varchar(100),
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `ips` text NOT NULL,
  `tries` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL,
  `ip` varchar(16) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `auth` varchar(50) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `users` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `auth` (`auth`);
ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `tasks` ADD PRIMARY KEY (`id`), ADD KEY `nickname` (`nickname`), ADD FULLTEXT KEY `data` (`data`);
ALTER TABLE `tasks` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `documents` ADD PRIMARY KEY (`id`), ADD FULLTEXT KEY `parlementaire` (`parlementaire`,`ips`);
ALTER TABLE `documents` MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `documents` ADD UNIQUE(`img`);
ALTER TABLE `documents` ADD UNIQUE( `type`, `parlementaire`);
