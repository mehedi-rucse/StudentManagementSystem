-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 01:11 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `about_me_id` int(20) NOT NULL,
  `roll_id` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `name_father` varchar(40) NOT NULL,
  `name_mother` varchar(40) NOT NULL,
  `number` varchar(20) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `session` int(20) NOT NULL,
  `department_code` varchar(20) NOT NULL,
  `hall_code` varchar(10) NOT NULL,
  `gender` enum('Male','Female','Other''s') NOT NULL,
  `emergency_number` varchar(20) DEFAULT NULL,
  `emergency_number_holder` varchar(20) DEFAULT NULL,
  `photo` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`about_me_id`, `roll_id`, `name`, `name_father`, `name_mother`, `number`, `blood_group`, `session`, `department_code`, `hall_code`, `gender`, `emergency_number`, `emergency_number_holder`, `photo`, `date_of_birth`) VALUES
(1, 1, 'Amena Akter', 'Amirul Islam', 'Halima Begum', '01984426189', 'B+', 2017, '79', '21', 'Female', '01984426189', 'Father', '12021-03-25-03-48.png', '1999-07-27'),
(2, 2, 'Humayun Ahmad Rajib', 'Md Aktaruzzaman', 'Mrs Saleha Khatun', '01796742200', 'AB+', 2018, '76', '02', 'Male', '01521243062', 'Father', '22021-03-25-03-19.png', '1999-03-15'),
(3, 3, 'Abdur Rahim Sheikh', 'Abdul Kadir Sheikh', 'Kamola Parvin', '01778112915', 'A+', 2018, '76', '05', 'Male', '01732125054', 'Mother', '32021-03-25-03-39.png', '1998-10-31'),
(4, 4, 'Md.Rasel Mia', 'Md.Insan Sayal', 'Parvin Begum', '01945832410', 'B+', 2018, '76', '07', 'Male', '01645549020', 'Father', '42021-03-25-03-58.png', '1998-01-01'),
(6, 6, 'MD. Mehedi Hasan', 'MD. Rokanuzzaman', 'Sabina Yasmim', '01795003798', 'A+', 2018, '76', '09', 'Male', '01728960868', 'Father', '62021-03-25-03-26.jpg', '1998-11-15'),
(7, 7, 'Jannatul Ferdosh Juthy', 'MD. Tipu Sultan', 'Sheuly Khatun', '01994873991', 'A+', 2018, '77', '21', 'Female', '01774449283', 'Brother', '72021-03-25-03-42.png', '1999-06-10'),
(8, 9, 'Nusrat Jahan Konok', 'MD. Kabir Hossain', 'Nasrin Nahar', '01938472391', 'AB+', 2018, '79', '21', 'Female', '01739836612', 'Father', '92021-03-25-03-03.png', '2000-02-17'),
(9, 35, 'Farhin Mashiat Mayabee', 'Masud Anwar Mamun', 'Monoara Khatun', '01737017208', 'B+', 2017, '76', '21', 'Female', '01737017820', 'Father', '352021-03-25-03-25.jpg', '1999-08-31'),
(10, 10, 'Rubayet Hasan Arman', 'Masuk', 'Khatun', '01933456789', 'B+', 2017, '76', '02', 'Male', '01712345678', 'Father', '102021-03-27-03-49.png', '2000-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `course_information`
--

CREATE TABLE `course_information` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `credits` enum('1','2','3') NOT NULL,
  `course_title` text NOT NULL,
  `marks` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_information`
--

INSERT INTO `course_information` (`course_id`, `course_code`, `credits`, `course_title`, `marks`) VALUES
(1, 'ENG1111', '2', 'Technical and communicative English', '50.00'),
(2, 'MATH1111', '3', 'Algebra Trigonometry and Vector', '75.00'),
(3, 'APEE1131', '3', 'Electrical Circuit and Electronics', '75.00'),
(4, 'CHEM1111', '3', 'Physical and Inorganic Chemistry', '75.00'),
(5, 'APEE1132', '1', 'Electrical Circuit and Electronics Lab', '25.00');

-- --------------------------------------------------------

--
-- Table structure for table `course_wise_result`
--

CREATE TABLE `course_wise_result` (
  `course_result_id` int(20) NOT NULL,
  `result_id` int(20) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `cgpa` double NOT NULL DEFAULT '0',
  `tried` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_wise_result`
--

INSERT INTO `course_wise_result` (`course_result_id`, `result_id`, `course_id`, `cgpa`, `tried`) VALUES
(1, 1, 1, 4, 0),
(2, 1, 2, 3.75, 0),
(3, 1, 3, 3.25, 1),
(4, 1, 4, 3, 0),
(5, 1, 5, 3.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department_info`
--

CREATE TABLE `department_info` (
  `department_info_id` int(11) NOT NULL,
  `department_code` varchar(20) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_building` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_info`
--

INSERT INTO `department_info` (`department_info_id`, `department_code`, `department_name`, `department_building`) VALUES
(2, '76', 'CSE', '4th Science Building'),
(3, '35', 'Marketing', 'Rabindra Bhaban'),
(4, '77', 'ICE', '4th Science Building'),
(5, '79', 'EEE', '4th Science Building');

-- --------------------------------------------------------

--
-- Table structure for table `hall_info`
--

CREATE TABLE `hall_info` (
  `hall_information_id` int(20) NOT NULL,
  `hall_code` varchar(10) NOT NULL,
  `hall_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall_info`
--

INSERT INTO `hall_info` (`hall_information_id`, `hall_code`, `hall_name`) VALUES
(1, '01', 'Sher-e Bangla Fazlul Haque Hall'),
(2, '02', 'Shah Mukhdum Hall'),
(3, '03', 'Nawab Abdul Latif Hall'),
(4, '04', 'Syed Amer Ali Hall'),
(5, '05', 'Shaheed Shamsuzzoha Hall'),
(6, '06', 'Shaheed Habibur Rahman Hall'),
(7, '07', 'Matihar Hall'),
(8, '08', 'Madar Bux Hall'),
(9, '09', 'Shaheed Suhrawardy Hall'),
(10, '10', 'Shaheed Ziaur Rahman Hall'),
(11, '11', 'Bangabandhu Sheikh Mujibur Rahman Hall'),
(12, '20', 'Monnujan Hall'),
(13, '21', 'Rokeya Hall'),
(14, '22', 'Tapshi Rabeya Hall'),
(15, '23', 'Begum Khaleda Zia hall'),
(16, '24', 'Rahmatunnisa Hall'),
(17, '25', 'Bangamata Fazilatunnesa Hall');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(20) NOT NULL,
  `roll_id` int(40) NOT NULL,
  `student_notice_id` int(20) NOT NULL,
  `status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `roll_id`, `student_notice_id`, `status`) VALUES
(1, 1, 2, 'Paid'),
(8, 6, 2, 'Paid'),
(14, 2, 2, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(20) NOT NULL,
  `roll_id` int(20) NOT NULL,
  `year` enum('1st','2nd','3rd','4th') NOT NULL,
  `semester` enum('1st','2nd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `roll_id`, `year`, `semester`) VALUES
(1, 6, '1st', '1st'),
(2, 6, '1st', '2nd'),
(3, 6, '2nd', '1st'),
(4, 6, '2nd', '2nd'),
(5, 6, '3rd', '1st'),
(6, 6, '3rd', '2nd'),
(7, 6, '4th', '1st'),
(8, 6, '4th', '2nd');

-- --------------------------------------------------------

--
-- Table structure for table `student_notice`
--

CREATE TABLE `student_notice` (
  `student_notice_id` int(20) NOT NULL,
  `department_code` varchar(20) NOT NULL,
  `notice_year` enum('1st','2nd','3rd','4th') NOT NULL,
  `notice_semester` enum('1st','2nd') NOT NULL,
  `type_of_notice` enum('Exam','Payment','Result','Vacation','Other''s') NOT NULL,
  `title` varchar(500) NOT NULL,
  `details` longtext NOT NULL,
  `due_date` date NOT NULL COMMENT 'Date or final date the notice will get executed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_notice`
--

INSERT INTO `student_notice` (`student_notice_id`, `department_code`, `notice_year`, `notice_semester`, `type_of_notice`, `title`, `details`, `due_date`) VALUES
(1, '76', '2nd', '2nd', 'Result', 'result', 'Dear Student,\r\nYour result has been published. \r\nWe are sorry that we could not publish earlier due to corona pandemic.\r\nCongratulation\'s to all of your great effort\'s.', '2021-02-10'),
(2, '76', '3rd', '1st', 'Payment', 'Admission Payment', 'Dear Students, Your 3rd year admission has been started.You have to pay 2000tk for the admission', '2021-03-16'),
(3, '79', '2nd', '2nd', 'Exam', 'Yearly Exam', 'AUTO PASS!\r\nNo exam for this pandemic', '2021-03-16'),
(4, '76', '1st', '2nd', 'Result', 'Exam result', 'Happy to say,for pandemic, all are A+', '2021-03-16'),
(7, '76', '2nd', '1st', 'Payment', 'Form Fill-up', 'Dear Students,You have to pay 3000tk for the form fill up of your even semester exam', '2021-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `datetime`) VALUES
(21, 'admin', 'admin@xyz.com', 'demoadmin', 'af7ce7db63daf2e05159ee4f3d0e240615bacd47', 'demoadmin18-03-21-03-2021Capture (2).jpg', 'active', '2021-03-25 08:55:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`about_me_id`),
  ADD UNIQUE KEY `roll_id` (`roll_id`),
  ADD KEY `department_code` (`department_code`),
  ADD KEY `hall_code` (`hall_code`);

--
-- Indexes for table `course_information`
--
ALTER TABLE `course_information`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_wise_result`
--
ALTER TABLE `course_wise_result`
  ADD PRIMARY KEY (`course_result_id`),
  ADD KEY `result_id` (`result_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `department_info`
--
ALTER TABLE `department_info`
  ADD PRIMARY KEY (`department_info_id`),
  ADD UNIQUE KEY `department_code` (`department_code`);

--
-- Indexes for table `hall_info`
--
ALTER TABLE `hall_info`
  ADD PRIMARY KEY (`hall_information_id`),
  ADD UNIQUE KEY `hall_code` (`hall_code`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `roll_id` (`roll_id`),
  ADD KEY `student_notice_id` (`student_notice_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `roll_id` (`roll_id`);

--
-- Indexes for table `student_notice`
--
ALTER TABLE `student_notice`
  ADD PRIMARY KEY (`student_notice_id`),
  ADD KEY `department_code` (`department_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `about_me_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `course_information`
--
ALTER TABLE `course_information`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_wise_result`
--
ALTER TABLE `course_wise_result`
  MODIFY `course_result_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department_info`
--
ALTER TABLE `department_info`
  MODIFY `department_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hall_info`
--
ALTER TABLE `hall_info`
  MODIFY `hall_information_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_notice`
--
ALTER TABLE `student_notice`
  MODIFY `student_notice_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_me`
--
ALTER TABLE `about_me`
  ADD CONSTRAINT `about_me_ibfk_1` FOREIGN KEY (`department_code`) REFERENCES `department_info` (`department_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `about_me_ibfk_2` FOREIGN KEY (`hall_code`) REFERENCES `hall_info` (`hall_code`) ON UPDATE CASCADE;

--
-- Constraints for table `course_wise_result`
--
ALTER TABLE `course_wise_result`
  ADD CONSTRAINT `course_wise_result_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_information` (`course_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `course_wise_result_ibfk_2` FOREIGN KEY (`result_id`) REFERENCES `result` (`result_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`roll_id`) REFERENCES `about_me` (`roll_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`student_notice_id`) REFERENCES `student_notice` (`student_notice_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`roll_id`) REFERENCES `about_me` (`roll_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_notice`
--
ALTER TABLE `student_notice`
  ADD CONSTRAINT `student_notice_ibfk_1` FOREIGN KEY (`department_code`) REFERENCES `department_info` (`department_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
