-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2021 at 01:26 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `Aid` int(10) NOT NULL,
  `Afname` varchar(50) NOT NULL,
  `Alname` varchar(50) NOT NULL,
  `Aemail` varchar(50) NOT NULL,
  `Amobile` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`Aid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Aid`, `Afname`, `Alname`, `Aemail`, `Amobile`, `address`, `password`, `status`) VALUES
(101, 'Atish', 'Kelkar', 'test@gmail.com', '9999988888', 'Melbourne', '1234', 'Approved'),
(102, 'Aditi', 'Dafda', 'daditi024@gmail.com', '0452252434', 'Melbourne', '1212', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `phone` int(10) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

DROP TABLE IF EXISTS `ebook`;
CREATE TABLE IF NOT EXISTS `ebook` (
  `Eid` varchar(50) NOT NULL,
  `Aid` varchar(50) NOT NULL,
  `Ebname` varchar(50) NOT NULL,
  `Ebookcontent` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `filepath` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`Eid`, `Aid`, `Ebname`, `Ebookcontent`, `status`, `filepath`) VALUES
('107', '101', 'chapter3.pdf', '<p>The Secret</p>\r\n<p>jdsbfeiwhfiojdwlmska,ejbfrejknkm.,djfh4oilkem,sx</p>', 'finish', 'chapter3.pdf'),
('108', '101', 'chapter4.pdf', '<h2>rjhewby</h2>\r\n<p>mzcmc&nbsp;</p>', 'pending', 'chapter4.pdf'),
('109', '102', 'b1.pdf', '<h2>The sky</h2>\r\n<ul>\r\n<li>Aenean ut magna lobortis nunc feugiat sagittis.</li>\r\n</ul>', 'pending', 'b1.pdf'),
('105', '101', 'chapter1.pdf', '<h1 style=\"text-align: center;\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>British Columbia in Global Context</strong></h1>\r\n<h1 style=\"text-align: center;\"><strong>Introduction</strong></h1>\r\n<p>In sitting down to think about what a regional geography of British Columbia (BC) might look like, the ideas in the room were as diverse as the people there. However, we all agreed on one thing: a traditional textbook format was not something that would fit the scope of the project that we had been set. Regional geography is often considered to be an inwardly focusing geographical perspective with analysis pertaining to local networks and drawing on isolated contextual examples. So what did regional geographies of BC mean to us as a diverse group of geographers?</p>\r\n<p>The discussion generated two themes: the first, illustrated by the Regions of British Columbia map (see Figure 1), comes from an understanding that BC is an incredibly diverse place. There are vastly different physical features of landscape, from temperate rainforests to deserts to beautiful boreal forests in the north. The second theme is the importance of natural resources. BC&rsquo;s rich natural resources such as forestry, fishing, metals, minerals and natural gas not only provide for a vibrant local economy, but make the province a key part of Canada&rsquo;s economy in relation to the global marketplace. If you put &ldquo;British Columbia Canada&rdquo; into a Google search, you&rsquo;ll be offered a snapshot of some of the issues relevant here in BC, but whose effects are felt across the globe. The main scope of the book is, therefore, to apply the fundamental geographical approach of understanding our globally changing world by looking at the local processes. These local processes and events are intrinsically linked to the same processes and events elsewhere. For example:</p>\r\n<ul>\r\n<li>Mining and its effects are a global issue and we can see how these unfold in BC.</li>\r\n<li>The recent apologies to First Nations peoples on the residential school issue are similar to events that have occurred in the US, Ireland and Australia.</li>\r\n<li>Processes of urbanization, a phenomenon that people all over the globe are experiencing, can be seen in Vancouver with our discussion of the city&rsquo;s development and its rating as the second-most expensive city in the world to purchase a home.</li>\r\n</ul>\r\n<p>Geography students, indeed all first-year students, need to know and be able to critically assess their own contexts and environments in order to properly engage with our continually globalizing world</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>The People of BC </strong></p>\r\n<p>The story of British Columbia is also one of continuous settlement, from the ancestors of the Aboriginal peoples of BC who crossed the Bering Strait 10,000 to 12,000 years ago to the first settlements along the Pacific coast 5,000 years ago, with inward and southern migration throughout the province. European contact and settlement came relatively late in the &ldquo;age of exploration&rdquo; and is a familiar story of people in search of resources. BC is home to an incredibly diverse population including 203 distinct First Nations and M&eacute;tis groups. Other Canadians can trace their roots to Europe, Asia, Africa and Middle Eastern descent, and an increasing number of recent immigrants are arriving from places such as India, China and Iran. In 2013, BC welcomed 36,161 international immigrants (Government of British Columbia, 2013). All the stories of settlement connect the land of what is now British Columbia to places elsewhere</p>', 'pending', 'chapter1.pdf'),
('106', '101', 'chapter2.pdf', '<p style=\"text-align: center;\"><strong>rich dad poor dad</strong></p>\r\n<p>knjcjdcjhdjehb fdjdnm mn cnxzxjwdmns xz</p>', 'finish', 'chapter2.pdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
