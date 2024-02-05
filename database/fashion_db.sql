-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 11:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_list`
--

CREATE TABLE `book_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending,1=confirm, 2=cancelled\r\n',
  `schedule` date DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_list`
--

INSERT INTO `book_list` (`id`, `user_id`, `package_id`, `status`, `schedule`, `date_created`) VALUES
(2, 4, 8, 3, '2021-06-21', '2021-06-19 08:37:59'),
(3, 5, 8, 3, '2021-06-18', '2021-06-19 11:51:50'),
(4, 6, 1, 2, '2023-11-05', '2023-11-05 00:34:55'),
(5, 8, 1, 3, '2023-11-16', '2023-11-05 00:56:29'),
(6, 1, 1, 3, '2023-11-16', '2023-11-05 01:19:29'),
(8, 6, 1, 0, '0000-00-00', '2023-11-06 06:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(30) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `subject`, `message`, `status`, `date_created`) VALUES
(6, 'asdasd', 'asdasd@asdasd.com', 'asdasd', 'asdasd', 1, '2021-06-19 10:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(30) NOT NULL,
  `title` text DEFAULT NULL,
  `tour_location` text DEFAULT NULL,
  `cost` double NOT NULL,
  `description` text DEFAULT NULL,
  `upload_path` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 =active ,2 = Inactive',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `tour_location`, `cost`, `description`, `upload_path`, `status`, `date_created`) VALUES
(8, 'Sample 103', 'Sample Location', 3000, '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut ac magna sodales, bibendum ante ut, accumsan ante. Integer non consectetur augue. Donec eget neque varius, venenatis elit id, dapibus tellus. Nam libero nulla, blandit sit amet ligula eu, malesuada lobortis diam. Maecenas ut tellus eget leo tincidunt pulvinar. Aenean rutrum, risus a aliquam euismod, nunc nisl tempus tortor, vel pellentesque eros ex nec purus. In condimentum nulla non ipsum interdum efficitur. Mauris eget sapien nec justo dignissim pretium quis sit amet ex. Aenean fermentum, metus eget dignissim condimentum, dui metus placerat diam, vitae interdum eros ante eget nisl. Fusce at orci gravida, varius mi ac, fermentum justo.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/package_8', 1, '2021-06-18 13:34:08'),
(9, 'd', 'd', 222, '&lt;p&gt;dd&lt;/p&gt;', 'uploads/package_9', 1, '2023-11-05 01:21:15'),
(10, 'Barong', 'bARONG', 2250, '&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel molestie ante. Morbi volutpat vestibulum nibh, vitae tempor metus sodales ac. Praesent et ornare lorem. Nullam id sem sed dolor feugiat finibus eu imperdiet erat. Suspendisse sed est eu enim lacinia efficitur eu eget sem. Curabitur feugiat, ipsum vel eleifend tincidunt, lacus metus tristique sem, non vehicula purus ipsum eget magna. Phasellus feugiat molestie nibh, sit amet elementum nulla volutpat sit amet. Integer a consequat metus, eget consectetur urna. Phasellus sagittis tincidunt egestas.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;Curabitur non elit blandit, vestibulum sem in, maximus lectus. Nam laoreet nulla nec est pulvinar sagittis. Maecenas sit amet vestibulum ligula. Donec sit amet scelerisque risus, id aliquet lectus. Cras id sagittis lorem. Vestibulum aliquam feugiat semper. Nulla egestas est vitae est fringilla, non pretium urna malesuada. Nulla ultricies ipsum vel metus volutpat dictum a a mauris. Ut eu justo id ante efficitur semper. Suspendisse potenti. In luctus, libero non dignissim sollicitudin, quam magna rhoncus urna, eu tempor dolor dolor sit amet lacus. Mauris sed libero ut nisl ornare congue facilisis vitae velit. Praesent suscipit sem bibendum fermentum cursus. Morbi in justo imperdiet, tristique ante at, sagittis ante. Ut nec mauris vitae nisl sodales facilisis. Etiam pharetra nisi congue, interdum neque vel, porta magna.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut ac magna sodales, bibendum ante ut, accumsan ante. Integer non consectetur augue. Donec eget neque varius, venenatis elit id, dapibus tellus. Nam libero nulla, blandit sit amet ligula eu, malesuada lobortis diam. Maecenas ut tellus eget leo tincidunt pulvinar. Aenean rutrum, risus a aliquam euismod, nunc nisl tempus tortor, vel pellentesque eros ex nec purus. In condimentum nulla non ipsum interdum efficitur. Mauris eget sapien nec justo dignissim pretium quis sit amet ex. Aenean fermentum, metus eget dignissim condimentum, dui metus placerat diam, vitae interdum eros ante eget nisl. Fusce at orci gravida, varius mi ac, fermentum justo.&lt;/p&gt;', 'uploads/package_10', 1, '2023-11-06 06:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `rate_review`
--

CREATE TABLE `rate_review` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `rate` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate_review`
--

INSERT INTO `rate_review` (`id`, `user_id`, `package_id`, `rate`, `review`, `date_created`) VALUES
(3, 5, 8, 5, '<p>Sample</p>', '2021-06-19 11:53:16'),
(4, 5, 8, 3, '&lt;p&gt;Sample feedback only&lt;/p&gt;', '2021-06-19 13:49:26'),
(5, 8, 1, 4, '&lt;p&gt;ds&lt;/p&gt;', '2023-11-05 00:58:17'),
(6, 1, 1, 5, '&lt;p&gt;d&lt;/p&gt;', '2023-11-05 01:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'ZIR AA Fashion House'),
(6, 'short_name', 'ZIR AA Fashion House'),
(11, 'logo', 'uploads/1699219800_1695910980_1695582180_Ellipse 1.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1699220400_1695908100_Frame 1.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1620201300_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-18 16:47:05'),
(4, 'John', 'Smith', 'jsmith', '1254737c076cf867dc53d60a0364f38e', NULL, NULL, 0, '2021-06-19 08:36:09', '2021-06-19 10:53:12'),
(5, 'Claire', 'Blake', 'cblake', '4744ddea876b11dcb1d169fadf494418', NULL, NULL, 0, '2021-06-19 10:01:51', '2021-06-19 12:03:23'),
(6, 'test', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', NULL, NULL, 0, '2023-11-05 00:34:35', NULL),
(7, 'test', 'test', 'testt', '098f6bcd4621d373cade4e832627b4f6', NULL, NULL, 0, '2023-11-05 00:51:57', NULL),
(8, 'test', 'test', 'teste', '698dc19d489c4e4db73e28a713eab07b', NULL, NULL, 0, '2023-11-05 00:55:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_list`
--
ALTER TABLE `book_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_review`
--
ALTER TABLE `rate_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_list`
--
ALTER TABLE `book_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rate_review`
--
ALTER TABLE `rate_review`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
