-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2013 at 03:52 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cakephp-lsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL DEFAULT 'normal',
  `section_id` int(11) DEFAULT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `title_fra` varchar(255) DEFAULT NULL,
  `body_eng` text,
  `body_fra` text,
  `media` text,
  `caption_eng` text,
  `caption_fra` text,
  `order` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `section_id` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `active`, `type`, `section_id`, `title_eng`, `title_fra`, `body_eng`, `body_fra`, `media`, `caption_eng`, `caption_fra`, `order`, `created`, `modified`) VALUES
(12, 1, 'normal', 1, 'Content 1', 'Contenu 1', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus orci eros, vulputate id nisl ac, vestibulum vestibulum lorem. Morbi interdum, elit non laoreet blandit, dui neque faucibus ipsum, quis luctus leo orci ac purus. Maecenas elementum vulputate mauris, in tristique magna placerat id. Aliquam imperdiet tempor elementum. Aliquam sagittis purus sed risus rhoncus rhoncus eu eget risus. Ut purus magna, lacinia a nibh sed, auctor sollicitudin purus. Cras convallis volutpat sapien eu adipiscing. Proin eget sagittis mauris, non luctus tellus. Cras at dapibus velit.</p>\r\n\r\n<p style="text-align:justify">Pellentesque convallis sapien velit, eu euismod erat facilisis lacinia. Vestibulum vehicula molestie mauris, at facilisis sapien facilisis vel. Phasellus ac sapien magna. Quisque ultrices sem vel enim ullamcorper convallis. Sed tempus turpis nec orci fringilla tempor. Aliquam erat volutpat. Sed ut massa hendrerit, pulvinar tellus ut, varius dolor.</p>\r\n\r\n<p style="text-align:justify">Suspendisse accumsan dapibus semper. Donec dolor quam, ultricies eu purus id, cursus gravida nulla. Pellentesque varius accumsan neque, id tempus leo adipiscing in. Vestibulum et magna est. Vestibulum a turpis sollicitudin, tincidunt urna a, blandit sem. Fusce posuere tortor vitae augue auctor, ultrices semper felis ultricies. Integer in rutrum quam. Etiam dolor enim, aliquet eu magna vel, euismod ullamcorper lorem. Pellentesque sollicitudin libero et libero malesuada adipiscing.</p>\r\n', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus orci eros, vulputate id nisl ac, vestibulum vestibulum lorem. Morbi interdum, elit non laoreet blandit, dui neque faucibus ipsum, quis luctus leo orci ac purus. Maecenas elementum vulputate mauris, in tristique magna placerat id. Aliquam imperdiet tempor elementum. Aliquam sagittis purus sed risus rhoncus rhoncus eu eget risus. Ut purus magna, lacinia a nibh sed, auctor sollicitudin purus. Cras convallis volutpat sapien eu adipiscing. Proin eget sagittis mauris, non luctus tellus. Cras at dapibus velit.</p>\r\n\r\n<p style="text-align:justify">Pellentesque convallis sapien velit, eu euismod erat facilisis lacinia. Vestibulum vehicula molestie mauris, at facilisis sapien facilisis vel. Phasellus ac sapien magna. Quisque ultrices sem vel enim ullamcorper convallis. Sed tempus turpis nec orci fringilla tempor. Aliquam erat volutpat. Sed ut massa hendrerit, pulvinar tellus ut, varius dolor.</p>\r\n\r\n<p style="text-align:justify">Suspendisse accumsan dapibus semper. Donec dolor quam, ultricies eu purus id, cursus gravida nulla. Pellentesque varius accumsan neque, id tempus leo adipiscing in. Vestibulum et magna est. Vestibulum a turpis sollicitudin, tincidunt urna a, blandit sem. Fusce posuere tortor vitae augue auctor, ultrices semper felis ultricies. Integer in rutrum quam. Etiam dolor enim, aliquet eu magna vel, euismod ullamcorper lorem. Pellentesque sollicitudin libero et libero malesuada adipiscing.</p>\r\n', '', '', '', NULL, '2013-08-30 14:38:42', '2013-08-30 14:38:54'),
(13, 1, 'photos', 1, 'Photos Content', 'Contenu Photos', '', '', '/kcfinder/upload/images/first_slide.png\r\n/kcfinder/upload/images/second_slide.png\r\n', 'caption 1\r\ncaption 2', 'légende 1\r\nlégende 2', NULL, '2013-08-30 14:49:09', '2013-08-30 15:22:30'),
(14, 1, 'video', 1, 'Video', 'Vidéo', '', '', '<iframe width="640" height="360" src="//www.youtube.com/embed/Vhf5cuXiLTA" frameborder="0" allowfullscreen></iframe>', '', '', NULL, '2013-08-30 15:24:44', '2013-08-30 15:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `in_menu` tinyint(1) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title_eng` varchar(255) NOT NULL,
  `title_fra` varchar(255) NOT NULL,
  `menu_title_eng` varchar(255) DEFAULT NULL,
  `menu_title_fra` varchar(255) DEFAULT NULL,
  `subtitle_eng` text,
  `subtitle_fra` text,
  `body_eng` text,
  `body_fra` text,
  `image_header` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `active`, `in_menu`, `parent_id`, `slug`, `title_eng`, `title_fra`, `menu_title_eng`, `menu_title_fra`, `subtitle_eng`, `subtitle_fra`, `body_eng`, `body_fra`, `image_header`, `order`, `created`, `modified`) VALUES
(1, 1, 1, NULL, 'home', 'Home', 'Accueil', '', '', 'Subtitle', 'Sous-Titre', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus orci eros, vulputate id nisl ac, vestibulum vestibulum lorem. Morbi interdum, elit non laoreet blandit, dui neque faucibus ipsum, quis luctus leo orci ac purus. Maecenas elementum vulputate mauris, in tristique magna placerat id. Aliquam imperdiet tempor elementum. Aliquam sagittis purus sed risus rhoncus rhoncus eu eget risus. Ut purus magna, lacinia a nibh sed, auctor sollicitudin purus. Cras convallis volutpat sapien eu adipiscing. Proin eget sagittis mauris, non luctus tellus. Cras at dapibus velit.</p>\r\n\r\n<p style="text-align:justify">Pellentesque convallis sapien velit, eu euismod erat facilisis lacinia. Vestibulum vehicula molestie mauris, at facilisis sapien facilisis vel. Phasellus ac sapien magna. Quisque ultrices sem vel enim ullamcorper convallis. Sed tempus turpis nec orci fringilla tempor. Aliquam erat volutpat. Sed ut massa hendrerit, pulvinar tellus ut, varius dolor.</p>\r\n\r\n<p style="text-align:justify">Suspendisse accumsan dapibus semper. Donec dolor quam, ultricies eu purus id, cursus gravida nulla. Pellentesque varius accumsan neque, id tempus leo adipiscing in. Vestibulum et magna est. Vestibulum a turpis sollicitudin, tincidunt urna a, blandit sem. Fusce posuere tortor vitae augue auctor, ultrices semper felis ultricies. Integer in rutrum quam. Etiam dolor enim, aliquet eu magna vel, euismod ullamcorper lorem. Pellentesque sollicitudin libero et libero malesuada adipiscing.</p>\r\n', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus orci eros, vulputate id nisl ac, vestibulum vestibulum lorem. Morbi interdum, elit non laoreet blandit, dui neque faucibus ipsum, quis luctus leo orci ac purus. Maecenas elementum vulputate mauris, in tristique magna placerat id. Aliquam imperdiet tempor elementum. Aliquam sagittis purus sed risus rhoncus rhoncus eu eget risus. Ut purus magna, lacinia a nibh sed, auctor sollicitudin purus. Cras convallis volutpat sapien eu adipiscing. Proin eget sagittis mauris, non luctus tellus. Cras at dapibus velit.</p>\r\n\r\n<p style="text-align:justify">Pellentesque convallis sapien velit, eu euismod erat facilisis lacinia. Vestibulum vehicula molestie mauris, at facilisis sapien facilisis vel. Phasellus ac sapien magna. Quisque ultrices sem vel enim ullamcorper convallis. Sed tempus turpis nec orci fringilla tempor. Aliquam erat volutpat. Sed ut massa hendrerit, pulvinar tellus ut, varius dolor.</p>\r\n\r\n<p style="text-align:justify">Suspendisse accumsan dapibus semper. Donec dolor quam, ultricies eu purus id, cursus gravida nulla. Pellentesque varius accumsan neque, id tempus leo adipiscing in. Vestibulum et magna est. Vestibulum a turpis sollicitudin, tincidunt urna a, blandit sem. Fusce posuere tortor vitae augue auctor, ultrices semper felis ultricies. Integer in rutrum quam. Etiam dolor enim, aliquet eu magna vel, euismod ullamcorper lorem. Pellentesque sollicitudin libero et libero malesuada adipiscing.</p>\r\n', '', NULL, '2013-08-30 14:09:43', '2013-08-30 14:36:05'),
(2, 1, 0, NULL, 'contact', 'Contact', 'Contact', '', '', '', '', 'Contact', 'Contact', '', NULL, '2013-08-30 14:13:34', '2013-08-30 14:36:13'),
(3, 1, 1, NULL, 'second_page', 'Second Page', 'Deuxième Page', '', '', 'Subtitle', 'Sous-Titre', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus orci eros, vulputate id nisl ac, vestibulum vestibulum lorem. Morbi interdum, elit non laoreet blandit, dui neque faucibus ipsum, quis luctus leo orci ac purus. Maecenas elementum vulputate mauris, in tristique magna placerat id. Aliquam imperdiet tempor elementum. Aliquam sagittis purus sed risus rhoncus rhoncus eu eget risus. Ut purus magna, lacinia a nibh sed, auctor sollicitudin purus. Cras convallis volutpat sapien eu adipiscing. Proin eget sagittis mauris, non luctus tellus. Cras at dapibus velit.</p>\r\n\r\n<p style="text-align:justify">Pellentesque convallis sapien velit, eu euismod erat facilisis lacinia. Vestibulum vehicula molestie mauris, at facilisis sapien facilisis vel. Phasellus ac sapien magna. Quisque ultrices sem vel enim ullamcorper convallis. Sed tempus turpis nec orci fringilla tempor. Aliquam erat volutpat. Sed ut massa hendrerit, pulvinar tellus ut, varius dolor.</p>\r\n\r\n<p style="text-align:justify">Suspendisse accumsan dapibus semper. Donec dolor quam, ultricies eu purus id, cursus gravida nulla. Pellentesque varius accumsan neque, id tempus leo adipiscing in. Vestibulum et magna est. Vestibulum a turpis sollicitudin, tincidunt urna a, blandit sem. Fusce posuere tortor vitae augue auctor, ultrices semper felis ultricies. Integer in rutrum quam. Etiam dolor enim, aliquet eu magna vel, euismod ullamcorper lorem. Pellentesque sollicitudin libero et libero malesuada adipiscing.</p>\r\n', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus orci eros, vulputate id nisl ac, vestibulum vestibulum lorem. Morbi interdum, elit non laoreet blandit, dui neque faucibus ipsum, quis luctus leo orci ac purus. Maecenas elementum vulputate mauris, in tristique magna placerat id. Aliquam imperdiet tempor elementum. Aliquam sagittis purus sed risus rhoncus rhoncus eu eget risus. Ut purus magna, lacinia a nibh sed, auctor sollicitudin purus. Cras convallis volutpat sapien eu adipiscing. Proin eget sagittis mauris, non luctus tellus. Cras at dapibus velit.</p>\r\n\r\n<p style="text-align:justify">Pellentesque convallis sapien velit, eu euismod erat facilisis lacinia. Vestibulum vehicula molestie mauris, at facilisis sapien facilisis vel. Phasellus ac sapien magna. Quisque ultrices sem vel enim ullamcorper convallis. Sed tempus turpis nec orci fringilla tempor. Aliquam erat volutpat. Sed ut massa hendrerit, pulvinar tellus ut, varius dolor.</p>\r\n\r\n<p style="text-align:justify">Suspendisse accumsan dapibus semper. Donec dolor quam, ultricies eu purus id, cursus gravida nulla. Pellentesque varius accumsan neque, id tempus leo adipiscing in. Vestibulum et magna est. Vestibulum a turpis sollicitudin, tincidunt urna a, blandit sem. Fusce posuere tortor vitae augue auctor, ultrices semper felis ultricies. Integer in rutrum quam. Etiam dolor enim, aliquet eu magna vel, euismod ullamcorper lorem. Pellentesque sollicitudin libero et libero malesuada adipiscing.</p>\r\n', '', NULL, '2013-08-30 14:16:02', '2013-08-30 15:37:52'),
(4, 1, 1, 1, 'children_page', 'Children Page', 'Page Enfant', '', '', 'Subtitle', 'Sous-Titre', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus orci eros, vulputate id nisl ac, vestibulum vestibulum lorem. Morbi interdum, elit non laoreet blandit, dui neque faucibus ipsum, quis luctus leo orci ac purus. Maecenas elementum vulputate mauris, in tristique magna placerat id. Aliquam imperdiet tempor elementum. Aliquam sagittis purus sed risus rhoncus rhoncus eu eget risus. Ut purus magna, lacinia a nibh sed, auctor sollicitudin purus. Cras convallis volutpat sapien eu adipiscing. Proin eget sagittis mauris, non luctus tellus. Cras at dapibus velit.</p>\r\n\r\n<p style="text-align:justify">Pellentesque convallis sapien velit, eu euismod erat facilisis lacinia. Vestibulum vehicula molestie mauris, at facilisis sapien facilisis vel. Phasellus ac sapien magna. Quisque ultrices sem vel enim ullamcorper convallis. Sed tempus turpis nec orci fringilla tempor. Aliquam erat volutpat. Sed ut massa hendrerit, pulvinar tellus ut, varius dolor.</p>\r\n\r\n<p style="text-align:justify">Suspendisse accumsan dapibus semper. Donec dolor quam, ultricies eu purus id, cursus gravida nulla. Pellentesque varius accumsan neque, id tempus leo adipiscing in. Vestibulum et magna est. Vestibulum a turpis sollicitudin, tincidunt urna a, blandit sem. Fusce posuere tortor vitae augue auctor, ultrices semper felis ultricies. Integer in rutrum quam. Etiam dolor enim, aliquet eu magna vel, euismod ullamcorper lorem. Pellentesque sollicitudin libero et libero malesuada adipiscing.</p>\r\n', '<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus orci eros, vulputate id nisl ac, vestibulum vestibulum lorem. Morbi interdum, elit non laoreet blandit, dui neque faucibus ipsum, quis luctus leo orci ac purus. Maecenas elementum vulputate mauris, in tristique magna placerat id. Aliquam imperdiet tempor elementum. Aliquam sagittis purus sed risus rhoncus rhoncus eu eget risus. Ut purus magna, lacinia a nibh sed, auctor sollicitudin purus. Cras convallis volutpat sapien eu adipiscing. Proin eget sagittis mauris, non luctus tellus. Cras at dapibus velit.</p>\r\n\r\n<p style="text-align:justify">Pellentesque convallis sapien velit, eu euismod erat facilisis lacinia. Vestibulum vehicula molestie mauris, at facilisis sapien facilisis vel. Phasellus ac sapien magna. Quisque ultrices sem vel enim ullamcorper convallis. Sed tempus turpis nec orci fringilla tempor. Aliquam erat volutpat. Sed ut massa hendrerit, pulvinar tellus ut, varius dolor.</p>\r\n\r\n<p style="text-align:justify">Suspendisse accumsan dapibus semper. Donec dolor quam, ultricies eu purus id, cursus gravida nulla. Pellentesque varius accumsan neque, id tempus leo adipiscing in. Vestibulum et magna est. Vestibulum a turpis sollicitudin, tincidunt urna a, blandit sem. Fusce posuere tortor vitae augue auctor, ultrices semper felis ultricies. Integer in rutrum quam. Etiam dolor enim, aliquet eu magna vel, euismod ullamcorper lorem. Pellentesque sollicitudin libero et libero malesuada adipiscing.</p>\r\n', '', NULL, '2013-08-30 14:16:22', '2013-08-30 15:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
