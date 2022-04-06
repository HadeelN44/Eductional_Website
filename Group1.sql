-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 04, 2021 at 01:50 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Group1`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(4) NOT NULL,
  `question_id` int(4) NOT NULL,
  `options` varchar(200) NOT NULL,
  `correct` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `options`, `correct`) VALUES
(1, 1, '2 years', 0),
(2, 1, 'year', 0),
(3, 1, '10 years', 0),
(4, 1, '4 years', 1),
(5, 2, 'Poseidon', 0),
(6, 2, 'Athena', 0),
(7, 2, 'Zeus ', 1),
(8, 2, 'Apollo', 0),
(9, 3, 'Men only', 0),
(10, 3, 'Men and female ', 0),
(11, 3, 'Free men only ', 1),
(12, 3, 'Soldiers ', 0),
(13, 4, 'Golden medal ', 0),
(14, 4, 'A cash prize ', 0),
(15, 4, 'There was no prize', 0),
(16, 4, 'Olive wreath crown', 1),
(17, 5, 'Running', 0),
(18, 5, 'Jumping', 0),
(19, 5, 'Chariot racing', 1),
(20, 5, 'Boxing', 0),
(21, 6, 'Hera ', 1),
(22, 6, 'Zeus ', 0),
(23, 6, 'Aphrodite', 0),
(24, 6, 'Hermes', 0),
(25, 7, 'Every 10 year ', 0),
(26, 7, 'Every 2 years', 0),
(27, 7, 'Every 4 years ', 1),
(28, 7, 'Every year', 0),
(29, 8, 'Golden medal ', 0),
(30, 8, 'Portion of a cow', 0),
(31, 8, 'A crown of olive leaves', 0),
(32, 8, 'A crown of olive leaves and a portion of a cow', 1),
(33, 9, '244 BC', 0),
(34, 9, '339 BC', 0),
(35, 9, '393 BC', 1),
(36, 9, 'Never stopped', 0),
(37, 10, 'Erik Satie', 0),
(38, 10, 'Antoine de Saint-Exupery', 0),
(39, 10, 'Pierre de Coubertin', 1),
(40, 10, 'René Descartes', 0),
(41, 11, 'Athens', 1),
(42, 11, 'Riyadh', 0),
(43, 11, 'Thiva', 0),
(44, 11, 'Rome', 0),
(45, 12, 'Emperor Theodosius I', 1),
(46, 12, 'Emperor Zeno', 0),
(47, 12, 'Emperor Marcus Aurelius', 0),
(48, 12, 'Julius Caesar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(4) NOT NULL,
  `lesson_title` varchar(100) NOT NULL,
  `content` varchar(3500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_title`, `content`) VALUES
(1, 'Introduction to Olympic Games history', 'The Olympic Games are a prominent international event gathering athletes from all over the world to compete in various sports. They are usually held every four years, alternating every two years between summer games and winter games. The modern Olympic games is inspired from the Ancient Olympic Games which were a religious ritual held at Olympia a place of worship of Zeus since the Olympics was held in honor of Zeus the king of gods.\r\n\r\n<br><br>The first Olympic Games are traditionally dated to 776 BC. Running, jumping, and throwing competitions, as well as boxing, wrestling, pankration, and chariot racing, were all part of the five days games event. All free Greek males were permitted to participate in the games All athletes competed naked and in pankration there were only two rules no biting and no eye poking there was also no weight limit and to surrender players had to rise their index fingers on occasions they died before they could do this. Olive wreath crown was the prize for the winner the branch was always cut from the same wild olive-tree, the Kallistephanos, which was located near Zeus\' temple.'),
(2, 'Women in the Olympics ', 'In the Ancient Olympic Games, free men were the only people allowed to participate in the games. Women could not compete or even attend. But there was a loophole; whoever owns the winning chariot was declared Olympic champion, not the riders, and anybody could buy a chariot. Kyniska, daughter of King Archidamos of Sparta, took advantage of this loophole and participated in the horse chariot race in the 96th and 97th Olympiads and won both races. She received her Olive wreath and was the first woman to win the Olympics. Since women couldn’t participate in the main event, a smaller event called Heraean Games believed to have taken place after the main Olympics games it was held in honor of Hera the goddess of the hearth and home and Zeus’s wife. The event was held in the same stadium and took place every four years. The only games allowed were foot races winners were awarded a crown of olive leaves and a portion of a cow which was sacrificed to Hera. In 1900 women were finally allowed to participate in the modern Olympic Games after four years of its re-establishment.'),
(3, 'The revival of the Olympic Games ', 'The games lasted from 776 BC to 393 BC. The event united the Greek city-states in the competition messengers were dispatched to announce a truce among all Greek city-states; it halted all wars and promoted safe travel to Olympia [1]. However, once Greece became part of the Roman Empire, the Olympic Games got banned by Emperor Theodosius I in order to promote Christianity. He declared the games to be paganism and ordered their prohibition. In 1896 the games were revived by French educator and historian Pierre de Coubertin. The first official modern Olympic game took place in Athens; the participants were 280 males from only 12 countries, and the crowd was estimated to be 60,000 attendees. The Olympic Games today welcomes athletes from all around the world; competitors of all ages and gender can participate. The Olympics are where the world gathers to compete, be inspired, and be united, with over 200 countries competing in over 400 events during the summer and Winter Games.');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(4) NOT NULL,
  `lesson_id` int(4) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `lesson_id`, `question`) VALUES
(1, 1, 'The Olympic Games occur every:'),
(2, 1, 'The Olympic Games were held in the honor of:'),
(3, 1, 'Who were permitted to participate in the games:'),
(4, 1, 'What was the winner’s prize:'),
(5, 2, 'The ancient Olympic Games allowed women to win in:'),
(6, 2, 'Heraean Games held in the honor of:'),
(7, 2, 'Heraean Games took place:'),
(8, 2, 'What was the winner’s prize in the Heraean Games:'),
(9, 3, 'The games lasted from 776 BC to:'),
(10, 3, 'Who revived the Olympic Games:'),
(11, 3, 'The first modern Olympic took place in:'),
(12, 3, 'Who banned the ancient Olympics ');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(4) NOT NULL,
  `score` int(4) NOT NULL,
  `taken` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `user_id`, `lesson_id`, `score`, `taken`) VALUES
(61, 33, 1, 1, 1),
(62, 33, 2, 1, 1),
(63, 33, 3, 2, 1),
(64, 34, 1, 0, 1),
(65, 34, 2, 2, 1),
(66, 34, 3, 0, 1),
(67, 35, 1, 2, 1),
(68, 35, 2, 2, 1),
(69, 35, 3, 2, 1),
(70, 36, 1, 3, 1),
(71, 36, 2, -1, 1),
(72, 36, 3, -1, 0),
(73, 37, 1, 2, 1),
(74, 37, 2, 2, 1),
(75, 37, 3, 1, 1),
(76, 38, 1, 3, 1),
(77, 38, 2, 1, 1),
(78, 38, 3, 0, 1),
(82, 40, 1, 2, 1),
(83, 40, 2, 0, 1),
(84, 40, 3, 2, 1),
(85, 41, 1, -1, 1),
(86, 41, 2, -1, 0),
(87, 41, 3, -1, 0),
(88, 42, 1, 0, 1),
(89, 42, 2, 2, 1),
(90, 42, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `last_activity`) VALUES
(33, 'hadeelalnahdi@hotmail.com', '$2y$10$yF5HWxfwTckN9rPK.wl7Ku3fqDtFlYMZB9C9RwIH58Tk5aXAv2vp.', 'hadeel', '2021-12-03 22:02:19'),
(34, 'lama@gmail.com', '$2y$10$4fCr0gBqSlY33lnjdEnlXOZoZehkJiLcyBdSuBNX1STuBDu.WBANq', 'lama', '2021-12-03 01:16:39'),
(35, 'rana@hotmail.com', '$2y$10$JUzFJBFX3L9IUXj825jlBOWAi7yY6UD5.XOjyepeTlH5mBTn4YI0e', 'rana', '2021-12-03 01:29:01'),
(36, 'raghad@gmail.com', '$2y$10$VrSAjcY4nitjsiJhNU6Pae8yzj1Czrz37sGg1XHBnM3UlbFUlo5je', 'raghad', '2021-12-03 01:33:33'),
(37, 'lolo@gmail.com', '$2y$10$ftiQj4V7cIXAvEVJyn5R1uPs40HjMKgyCa.LHnKWTaN6YlCsP9xq2', 'lolo', '2021-12-03 01:39:10'),
(38, 'lana@gmail.com', '$2y$10$ds2bzTW1fHlw3CTObuq7aeajbeyxufq2iEVtQsMA4B1vWlYkq3CHu', 'lana', '2021-12-03 02:05:33'),
(40, 'hadeelalnahdi@gmail.com', '$2y$10$fOCB4EwVzzrjr9UutexiHuTDNM.NMAoiWnAYFjkcUEm0upQWF30Wi', 'Hadeel', '2021-12-03 23:00:04'),
(41, 'malak@gmail.com', '$2y$10$LMIqOVsujAPC1S8JjstR7u/.kHO0rIHXhvSSg7yKHwmu5zYxQ3Tv2', 'malak', '2021-12-03 23:17:03'),
(42, 'lamia@gmail.com', '$2y$10$J2jjRqC6zWkXc4pHc8MaWuHEJPGWStpSMPX.8Z7dz3zFTl87XYGA.', 'lamia', '2021-12-04 01:46:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_lesson_id_` (`lesson_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
