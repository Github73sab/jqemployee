-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2012 at 08:33 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created` int(11) NOT NULL COMMENT 'unix timestamp',
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`employee_id`),
  UNIQUE KEY `full_name` (`full_name`),
  KEY `full_name_2` (`full_name`),
  KEY `full_name_3` (`full_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`uid`, `employee_id`, `full_name`, `email`, `address`, `postcode`, `phone`, `created`, `status`) VALUES
(1, 'sandie', 'Sandhi Firmadani', 'mr.sandie@gmail.com', 'Jl.Kampung Bali 32 No.32, Tanah Abang, Jakarta.', '10250', '089635770545', 1340064000, 1),
(2, 'sulam', 'Sulam Sulaeman', 'sulam@domain.com', 'Jl.Rangkas Mawar No.093, Cileungsi, Bogor.', '14450', '02192591900', 1340150400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created`, `updated`, `type`, `title`, `body`) VALUES
(1, '2012-06-15 09:40:49', '2012-06-14 17:00:00', 'blog', 'Menuju Indonesia Lebih Baik', '<p>Donec vitae volutpat mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas eleifend rutrum. Proin et semper tortor. Curabitur ullamcorper tincidunt blandit. Suspendisse potenti. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur fermentum condimentum varius.</p>\r\n\r\n<p>Pellentesque a diam sodales augue tempor mollis ac in justo. Aliquam a diam ac urna placerat tempus. Donec eget nunc quis turpis imperdiet euismod. Nunc id metus nec lacus aliquam consequat non quis nisl. Donec et purus massa, sed vestibulum risus. Curabitur non elit vel velit congue auctor vel vel tortor. Aenean ornare ipsum a felis pharetra commodo. Nam eu pellentesque est. Nullam facilisis ullamcorper elit, eu accumsan justo dictum non. Donec non tortor nunc. Aliquam dictum velit posuere diam vulputate vel pulvinar felis fringilla. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n\r\n<p>Ut aliquet nisi sem. Vestibulum ut metus vel dui malesuada porta. Duis nibh urna, varius eu fermentum ac, luctus in turpis. Aliquam sit amet massa et odio aliquam eleifend congue vitae lorem. Nunc nec ullamcorper nulla. Sed at cursus nulla. In vestibulum tellus vitae augue euismod eu sagittis nibh ultricies. Nam vel ante sit amet ligula aliquet ultrices. Donec imperdiet quam ac velit congue faucibus ornare velit vestibulum. Mauris at mauris ac metus tincidunt euismod ac quis enim. Nulla ac dui non mi blandit pulvinar sed ac purus. Mauris id lorem arcu. </p>'),
(2, '2012-06-15 09:40:49', '0000-00-00 00:00:00', 'article', 'Menjelang Malam Pergantian Tahun 2012', '<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur non mi et est consequat placerat. Curabitur ut urna a orci interdum tincidunt sit amet a metus. Vivamus ut augue lorem, ac lobortis dolor. Vivamus felis dui, lobortis ut consectetur at, ornare eu sapien. Morbi tempus turpis eu justo varius at ullamcorper ipsum sodales. Phasellus nisl eros, gravida a interdum ac, laoreet dignissim turpis.</p>\r\n\r\n<p>Duis viverra posuere massa vel dapibus. Fusce porttitor iaculis nibh ut rutrum. Donec libero sem, porttitor sit amet imperdiet et, dignissim ac elit. Cras dictum semper pharetra. Phasellus sit amet dolor neque, eget vulputate quam. Quisque porta commodo lectus, ut blandit urna dapibus vel. Suspendisse quam turpis, ornare vel iaculis id, ultrices eget tellus. Proin eu purus urna. Praesent id dictum ligula. Praesent odio lectus, rhoncus quis hendrerit et, lobortis id dolor. Praesent at justo velit. Fusce quis varius sapien. Donec sed velit non ipsum imperdiet ornare vitae sed odio. </p>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
