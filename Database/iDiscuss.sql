-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 08:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_desc` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `date`) VALUES
(1, 'Python', 'Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation. Its language constructs as well as its object-oriented approach aim to help programmers.', '2021-10-20 06:50:50'),
(2, 'Javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled and multi-paradigm. It has dynamic typing, prototype-based object-orientation and first-class functions.', '2021-10-20 06:52:20'),
(3, 'C#', 'C# is a general-purpose, multi-paradigm programming language. C# encompasses static typing, strong typing, lexically scoped, imperative, declarative, functional, generic, object-oriented, and component-oriented programming disciplines.', '2021-10-28 12:27:08'),
(5, 'java', 'Java is an object-oriented programming language that produces software for multiple platforms. When a programmer writes a Java application, the compiled code (known as bytecode) runs on most operating systems (OS), including Windows, Linux and Mac OS.', '2021-10-28 12:28:55'),
(7, 'HTML', 'The HyperText Markup Language, or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.', '2021-10-29 19:40:59'),
(8, 'CSS', 'Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.', '2021-10-29 19:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_desc` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_desc`, `thread_id`, `comment_date`) VALUES
(1, 'here is a comment', 28, '2021-11-25 13:39:07'),
(3, 'here is a second comment', 28, '2021-11-25 14:31:35'),
(14, 'after array', 3, '2021-11-25 20:59:05'),
(15, 'after array', 3, '2021-11-25 20:59:08'),
(16, 'here is a third comment', 28, '2021-11-26 20:25:57'),
(17, 'here is a fourth comment', 28, '2021-11-27 20:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(20) NOT NULL,
  `thread_title` varchar(50) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(20) NOT NULL,
  `thread_user_id` int(20) NOT NULL,
  `time_stamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `time_stamp`) VALUES
(3, 'html error', 'something is wrong with my html', 7, 0, '2021-11-22 14:16:21'),
(8, 'big error', 'erorr found in c#', 3, 0, '2021-11-23 19:55:36'),
(21, 'do you know', 'dont know', 3, 0, '2021-11-23 20:28:31'),
(26, 'HELLO', 'HELLOW', 5, 0, '2021-11-23 20:32:52'),
(27, 'hello', 'guys\r\n', 5, 0, '2021-11-23 21:07:13'),
(28, 'i have an css error', 'not usable while in phpmyadmin', 8, 0, '2021-11-24 11:20:07'),
(29, '2', 'a2', 8, 0, '2021-11-24 11:23:05'),
(30, '2', 'a2', 8, 0, '2021-11-24 11:23:27'),
(31, '2', 'a2', 8, 0, '2021-11-24 11:24:00'),
(32, '2', 'a2', 8, 0, '2021-11-24 11:24:22'),
(33, '2', 'a2', 8, 0, '2021-11-24 11:24:28'),
(34, 'new question', 'new ans', 8, 0, '2021-11-24 18:50:05'),
(35, ' javascript error', 'found javascript error', 2, 0, '2021-11-25 18:52:29'),
(36, 'another que', 'another ans', 8, 0, '2021-11-25 19:48:28'),
(37, 'python error ', 'pyadio install error', 1, 0, '2021-11-26 12:04:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
