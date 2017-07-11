-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2017 at 07:55 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `replex`
--

-- --------------------------------------------------------

--
-- Table structure for table `popular_movie`
--

CREATE TABLE `popular_movie` (
  `id` int(11) NOT NULL,
  `vote_count` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `video` int(11) NOT NULL,
  `vote_average` double NOT NULL,
  `title` varchar(255) NOT NULL,
  `popularity` double NOT NULL,
  `poster_path` varchar(255) NOT NULL,
  `original_language` varchar(4) NOT NULL,
  `original_title` varchar(255) NOT NULL,
  `genre_ids` varchar(255) NOT NULL,
  `backdrop_path` varchar(255) NOT NULL,
  `adult` tinyint(1) NOT NULL,
  `overview` text NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `popular_movie`
--
ALTER TABLE `popular_movie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `popular_movie`
--
ALTER TABLE `popular_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
