-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 06:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `title`, `description`, `completed`, `user_id`) VALUES
(13, 'Plan Quarterly Strategy Meeting', 'Schedule and coordinate the upcoming quarterly strategy meeting with all department heads. Ensure the agenda includes performance reviews, upcoming initiatives, budget allocations, and cross-team collaboration opportunities. Prepare a presentation summari', 0, 1),
(14, 'Conduct User Experience Audit', 'Review the current user flow of the web application with a focus on onboarding, navigation, and mobile responsiveness. Document friction points observed during testing and gather user feedback through surveys and interviews. The final audit report should ', 0, 1),
(15, 'Organize Product Launch Campaign', 'Work with the marketing team to outline a product launch campaign for the new feature rollout. This includes creating email sequences, social media content, blog posts, and paid ad creatives. Align launch dates with development timelines and ensure all as', 1, 1),
(16, 'Update Internal Documentation Portal', 'Audit the internal knowledge base to identify outdated articles and missing documentation. Collaborate with relevant team members to gather up-to-date information and rewrite content for clarity and completeness. Also, implement a tagging system and navig', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
