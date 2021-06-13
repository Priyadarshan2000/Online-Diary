
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



--
-- Database: `vote`
--

-- --------------------------------------------------------



CREATE TABLE IF NOT EXISTS `articles` (
  `email` varchar(50) NOT NULL,
  `id` text NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `article` text NOT NULL,
  `title` varchar(500) NOT NULL,
  `star` tinyint(1) NOT NULL DEFAULT '0',
  `share` tinyint(1) NOT NULL DEFAULT '0',
  `nick` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--





CREATE TABLE IF NOT EXISTS `log` (
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(25) NOT NULL,
  `ip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`email`, `date`, `time`, `ip`) VALUES
('rbc@gmail.com', '2021-07-06', '08:31:48pm', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `age`, `gender`, `email`, `password`) VALUES
('Sunny', 19, 'M', 'rbc@gmail.com', '25f9e794323b453885f5181f1b624d0b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
