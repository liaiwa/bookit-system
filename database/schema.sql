-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2026 at 06:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookit_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `admin_level` enum('super','regular') COLLATE utf8mb4_unicode_ci DEFAULT 'regular',
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int NOT NULL,
  `booking_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int NOT NULL,
  `lecturer_id` int NOT NULL,
  `slot_id` int DEFAULT NULL,
  `appointment_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('pending','approved','rejected','cancelled','completed','no_show') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `purpose` enum('academic','personal','career','research','other') COLLATE utf8mb4_unicode_ci DEFAULT 'academic',
  `description` text COLLATE utf8mb4_unicode_ci,
  `student_notes` text COLLATE utf8mb4_unicode_ci,
  `lecturer_notes` text COLLATE utf8mb4_unicode_ci,
  `meeting_mode` enum('in_person','online','phone') COLLATE utf8mb4_unicode_ci DEFAULT 'in_person',
  `meeting_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booked_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reminder_sent` tinyint(1) DEFAULT '0',
  `rating` int DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci
) ;

-- --------------------------------------------------------

--
-- Table structure for table `availability_slots`
--

CREATE TABLE `availability_slots` (
  `id` int NOT NULL,
  `lecturer_id` int NOT NULL,
  `slot_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day_of_week` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_bookings` int DEFAULT '1',
  `booked_count` int DEFAULT '0',
  `is_available` tinyint(1) DEFAULT '1',
  `is_recurring` tinyint(1) DEFAULT '0',
  `recurrence_pattern` enum('daily','weekly','monthly') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blocked_slots`
--

CREATE TABLE `blocked_slots` (
  `id` int NOT NULL,
  `blocked_by` enum('admin','lecturer','system') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lecturer_id` int DEFAULT NULL,
  `block_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `reason` enum('holiday','maintenance','emergency','personal','other') COLLATE utf8mb4_unicode_ci DEFAULT 'other',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int NOT NULL,
  `faculty_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dean_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty_code`, `faculty_name`, `dean_name`, `contact_email`, `contact_phone`, `description`, `created_at`) VALUES
(1, 'FIS', 'Faculty of Information Science', NULL, NULL, NULL, NULL, '2026-01-07 17:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `lecturer_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` int DEFAULT NULL,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Lecturer',
  `expertise` text COLLATE utf8mb4_unicode_ci,
  `office_location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_hours` text COLLATE utf8mb4_unicode_ci,
  `max_students_per_day` int DEFAULT '5',
  `consultation_duration` int DEFAULT '30',
  `is_available_for_booking` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `user_id`, `lecturer_id`, `faculty_id`, `position`, `expertise`, `office_location`, `office_hours`, `max_students_per_day`, `consultation_duration`, `is_available_for_booking`) VALUES
(1, NULL, 'DR MUHAMMAD ASYRAF B', 1, 'Senior Lecturer', 'Web Development, Content Management', NULL, NULL, 5, 30, 1),
(2, NULL, 'SIR KHAIRUL MIZAN BI', 1, 'Lecturer', 'Information System Project Management', NULL, NULL, 5, 30, 1),
(3, NULL, 'PROF MADYA DR NORIZA', 1, 'Associate Professor', 'User Experience Design', NULL, NULL, 5, 30, 1),
(4, NULL, 'MADAM SITI NURSHAFEZ', 1, 'Lecturer', 'Professional English', NULL, NULL, 5, 30, 1),
(5, NULL, 'G. SHARINA BT SHAHAR', 1, 'Lecturer', 'Professional English', NULL, NULL, 5, 30, 1),
(6, NULL, 'ABDURRAHMAN BIN JALIL', 1, 'Lecturer', 'Advanced Database Management', NULL, NULL, 5, 30, 1),
(7, NULL, 'NORSANIAH BT MD NOH', 1, 'Lecturer', 'Corporate Communication', NULL, NULL, 5, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecturers_subjects`
--

CREATE TABLE `lecturers_subjects` (
  `id` int NOT NULL,
  `lecturer_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturers_subjects`
--

INSERT INTO `lecturers_subjects` (`id`, `lecturer_id`, `subject_id`, `created_at`) VALUES
(1, 7, 7, '2026-01-08 01:51:23'),
(2, 1, 1, '2026-01-08 01:55:14'),
(3, 2, 2, '2026-01-08 01:55:15'),
(4, 3, 3, '2026-01-08 01:55:15'),
(5, 4, 4, '2026-01-08 01:55:15'),
(6, 5, 4, '2026-01-08 01:55:15'),
(7, 6, 6, '2026-01-08 01:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('booking_created','booking_approved','booking_rejected','booking_reminder','booking_cancelled','slot_blocked','slot_available','system_alert','message') COLLATE utf8mb4_unicode_ci DEFAULT 'system_alert',
  `related_id` int DEFAULT NULL,
  `related_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `is_important` tinyint(1) DEFAULT '0',
  `action_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheduled_for` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_preferences`
--

CREATE TABLE `notification_preferences` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `email_notifications` tinyint(1) DEFAULT '1',
  `push_notifications` tinyint(1) DEFAULT '1',
  `sms_notifications` tinyint(1) DEFAULT '0',
  `booking_reminders` tinyint(1) DEFAULT '1',
  `booking_updates` tinyint(1) DEFAULT '1',
  `system_announcements` tinyint(1) DEFAULT '1',
  `reminder_before_hours` int DEFAULT '24',
  `quiet_hours_start` time DEFAULT '22:00:00',
  `quiet_hours_end` time DEFAULT '08:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int NOT NULL,
  `programme_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` int DEFAULT NULL,
  `duration_years` int DEFAULT '3',
  `total_credits` int DEFAULT '120',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `programme_code`, `programme_name`, `faculty_id`, `duration_years`, `total_credits`, `description`, `created_at`) VALUES
(1, 'CDIM260', 'Bachelor of Information Science (Honours) Library Management', 1, 3, 120, NULL, '2026-01-07 17:04:41'),
(2, 'CDIM261', 'Bachelor of Information Science (Honours) Records Management', 1, 3, 120, NULL, '2026-01-07 17:04:41'),
(3, 'CDIM262', 'Bachelor of Information Science (Honours) Information Systems Management', 1, 3, 120, NULL, '2026-01-07 17:04:41'),
(4, 'CDIM263', 'Bachelor of Information Science (Honours) Information Content Management', 1, 3, 120, NULL, '2026-01-07 17:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `student_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme_id` int DEFAULT NULL,
  `year_of_study` int DEFAULT '1',
  `semester` int DEFAULT '1',
  `cgpa` decimal(3,2) DEFAULT '0.00',
  `enrollment_date` date DEFAULT NULL,
  `graduation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `student_id`, `programme_id`, `year_of_study`, `semester`, `cgpa`, `enrollment_date`, `graduation_date`) VALUES
(1, 1, '2023123456', NULL, 2, 3, '3.45', '2023-09-01', NULL),
(2, 2, '2023987654', NULL, 1, 1, '3.80', '2024-03-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `subject_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `subject_name`, `programme_id`, `created_at`) VALUES
(1, 'IMS566', 'ADVANCED WEB DESIGN DEVELOPMENT AND CONTENT MANAGEMENT', 3, '2026-01-07 17:37:21'),
(2, 'IMS565', 'INFORMATION SYSTEM PROJECT MANAGEMENT', 3, '2026-01-07 17:37:21'),
(3, 'IMS564', 'USER EXPERIENCE DESIGN', 3, '2026-01-07 17:37:21'),
(4, 'LCC501', 'ENGLISH FOR PROFESSIONAL CORRESPONDENCE', 3, '2026-01-07 17:37:21'),
(5, 'TJC501', 'INTRODUCTORY JAPANESE (LEVEL III)', 3, '2026-01-07 17:37:21'),
(6, 'IMS560', 'ADVANCED DATABASE MANAGEMENT', 3, '2026-01-07 17:37:21'),
(7, 'ICM573', 'CORPORATE COMMUNICATION FOR INFORMATION PROFESSIONAL', 3, '2026-01-07 17:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('student','lecturer','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password_hash`, `role`, `is_active`, `created_at`) VALUES
(1, 'student1@uitm.edu.my', 'dummyhash', 'student', 1, '2025-12-17 17:18:47'),
(2, 'student2@uitm.edu.my', 'dummyhash', 'student', 1, '2025-12-17 17:18:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_code` (`booking_code`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `lecturer_id` (`lecturer_id`),
  ADD KEY `slot_id` (`slot_id`);

--
-- Indexes for table `availability_slots`
--
ALTER TABLE `availability_slots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_lecturer_slot` (`lecturer_id`,`slot_date`,`start_time`);

--
-- Indexes for table `blocked_slots`
--
ALTER TABLE `blocked_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculty_code` (`faculty_code`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lecturer_id` (`lecturer_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `lecturers_subjects`
--
ALTER TABLE `lecturers_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_lecturer_subject` (`lecturer_id`,`subject_id`),
  ADD KEY `idx_lecturer` (`lecturer_id`),
  ADD KEY `idx_subject` (`subject_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification_preferences`
--
ALTER TABLE `notification_preferences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programme_code` (`programme_code`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `programme_id` (`programme_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subjects_programmes` (`programme_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `availability_slots`
--
ALTER TABLE `availability_slots`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blocked_slots`
--
ALTER TABLE `blocked_slots`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lecturers_subjects`
--
ALTER TABLE `lecturers_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_preferences`
--
ALTER TABLE `notification_preferences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`slot_id`) REFERENCES `availability_slots` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `availability_slots`
--
ALTER TABLE `availability_slots`
  ADD CONSTRAINT `availability_slots_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blocked_slots`
--
ALTER TABLE `blocked_slots`
  ADD CONSTRAINT `blocked_slots_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lecturers_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_preferences`
--
ALTER TABLE `notification_preferences`
  ADD CONSTRAINT `notification_preferences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `programmes`
--
ALTER TABLE `programmes`
  ADD CONSTRAINT `programmes_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `fk_subjects_programmes` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;