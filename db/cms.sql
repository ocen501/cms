-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 11:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'Javascript'),
(3, 'Java'),
(4, 'PHP'),
(5, 'Test'),
(6, 'TEST 3'),
(7, 'TEST 3'),
(11, 'HTML5');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(11, 12, 'Esther Ibrahim', 'esther@gmail.com', 'Great content.', 'unapproved', '2022-09-11'),
(13, 12, '', '', '', 'unapproved', '2022-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(12, 1, 'The programming process', 'Moses Andrew', '2022-09-24', 'director-3.jpg', 'Programming is the hottest skill in town anyone can think of learning.																				', 'programming, coding, php', 5, 'published', 1),
(14, 1, 'Programming', 'Godwin Inyene', '2022-09-24', 'booking-3.jpg', 'Programming is the realest stuff.				', 'healing, healed, love', 4, 'published', 0),
(18, 1, 'Testing', 'Moses Andrew', '2022-09-29', 'img.jpg', 'This is just another post.', 'java, closure, tutorial', 0, 'Published', 0),
(19, 1, 'The programming process', 'Moses Andrew', '2022-09-29', 'director-3.jpg', 'Programming is the hottest skill in town anyone can think of learning.																				', 'programming, coding, php', 0, 'published', 0),
(20, 1, 'Testing', 'Moses Andrew', '2022-09-29', 'img.jpg', 'This is just another post.', 'java, closure, tutorial', 0, 'Published', 0),
(21, 1, 'Programming', 'Godwin Inyene', '2022-09-29', 'booking-3.jpg', 'Programming is the realest stuff.				', 'healing, healed, love', 0, 'published', 1),
(23, 1, 'Programming', 'Godwin Inyene', '2022-10-05', 'booking-3.jpg', 'Programming is the realest stuff.				', 'healing, healed, love', 0, 'published', 0),
(24, 1, 'Testing', 'Moses Andrew', '2022-10-05', 'img.jpg', 'This is just another post.', 'java, closure, tutorial', 0, 'Published', 0),
(25, 1, 'The programming process', 'Moses Andrew', '2022-10-05', 'director-3.jpg', 'Programming is the hottest skill in town anyone can think of learning.																				', 'programming, coding, php', 0, 'published', 0),
(26, 1, 'Testing', 'Moses Andrew', '2022-10-05', 'img.jpg', 'This is just another post.', 'java, closure, tutorial', 0, 'Published', 0),
(27, 1, 'Programming', 'Godwin Inyene', '2022-10-05', 'booking-3.jpg', 'Programming is the realest stuff.				', 'healing, healed, love', 0, 'published', 1),
(28, 1, 'The programming process', 'Moses Andrew', '2022-10-05', 'director-3.jpg', 'Programming is the hottest skill in town anyone can think of learning.																				', 'programming, coding, php', 0, 'published', 0),
(29, 1, 'The programming process', 'Moses Andrew', '2022-10-06', 'director-3.jpg', 'Programming is the hottest skill in town anyone can think of learning.																				', 'programming, coding, php', 0, 'published', 0),
(30, 1, 'Programming', 'Godwin Inyene', '2022-10-06', 'booking-3.jpg', 'Programming is the realest stuff.				', 'healing, healed, love', 0, 'published', 0),
(31, 1, 'Testing', 'Moses Andrew', '2022-10-06', 'img.jpg', 'This is just another post.', 'java, closure, tutorial', 0, 'Published', 0),
(32, 1, 'The programming process', 'Moses Andrew', '2022-10-06', 'director-3.jpg', 'Programming is the hottest skill in town anyone can think of learning.																				', 'programming, coding, php', 0, 'published', 1),
(33, 1, 'Testing', 'Moses Andrew', '2022-10-06', 'img.jpg', 'This is just another post.', 'java, closure, tutorial', 0, 'Published', 0),
(34, 1, 'Programming', 'Godwin Inyene', '2022-10-06', 'booking-3.jpg', 'Programming is the realest stuff.				', 'healing, healed, love', 0, 'published', 0),
(35, 1, 'Programming', 'Godwin Inyene', '2022-10-06', 'booking-3.jpg', 'Programming is the realest stuff.				', 'healing, healed, love', 0, 'published', 0),
(36, 1, 'Testing', 'Moses Andrew', '2022-10-06', 'img.jpg', 'This is just another post.', 'java, closure, tutorial', 0, 'Published', 0),
(37, 1, 'The programming process', 'Moses Andrew', '2022-10-06', 'director-3.jpg', 'Programming is the hottest skill in town anyone can think of learning.																				', 'programming, coding, php', 0, 'published', 0),
(38, 1, 'Testing', 'Moses Andrew', '2022-10-06', 'img.jpg', 'This is just another post.', 'java, closure, tutorial', 0, 'Published', 0),
(39, 1, 'Programming', 'Godwin Inyene', '2022-10-06', 'booking-3.jpg', 'Programming is the realest stuff.				', 'healing, healed, love', 0, 'published', 0),
(40, 1, 'The programming process', 'Moses Andrew', '2022-10-06', 'director-3.jpg', 'Programming is the hottest skill in town anyone can think of learning.																				', 'programming, coding, php', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(14, 'GeeHigh07', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', '', '', 'godwinhigh2@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, '8jpua6tnndrsgjd7g6cels8s3k', '1665071787'),
(2, 'h13d9s824h1vufle34bfhudlcm', '1670780128');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
