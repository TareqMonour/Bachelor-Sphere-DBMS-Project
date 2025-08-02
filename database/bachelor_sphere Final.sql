-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 11:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bachelor_sphere`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_meals`
--

CREATE TABLE `assigned_meals` (
  `id` int(11) NOT NULL,
  `mess_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assigned_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigned_meals`
--

INSERT INTO `assigned_meals` (`id`, `mess_id`, `meal_id`, `user_id`, `assigned_date`) VALUES
(14, 1, 1, 4, '2024-10-02'),
(15, 1, 3, 4, '2024-10-02'),
(16, 1, 1, 5, '2024-10-01'),
(17, 1, 2, 5, '2024-10-01'),
(18, 1, 3, 5, '2024-10-01'),
(19, 1, 1, 1, '2024-10-01'),
(20, 1, 1, 5, '2024-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `bazar_list`
--

CREATE TABLE `bazar_list` (
  `id` int(11) NOT NULL,
  `mess_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `purchase_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bazar_list`
--

INSERT INTO `bazar_list` (`id`, `mess_id`, `item_name`, `purchase_date`, `price`, `cost`) VALUES
(3, 1, 'Meat', '2024-10-01', 250.00, NULL),
(4, 1, 'Fish', '2024-10-01', 300.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Duplex'),
(2, 'Single-Family Home'),
(3, 'Multi-Family Home'),
(4, '2-story house');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(30) NOT NULL,
  `house_no` varchar(50) NOT NULL,
  `category_id` int(30) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `house_no`, `category_id`, `description`, `price`) VALUES
(1, '623', 4, 'Sample', 2500),
(2, '624', 1, 'Gorgeous', 3000),
(3, '625', 4, 'For Bachelor', 2000),
(4, '626', 3, 'Join Family', 4000),
(5, '627', 4, 'Boys Mess', 3500),
(6, '628', 5, 'For the Old House Lover', 1500),
(7, '630', 1, 'For big Family', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `lost_and_found`
--

CREATE TABLE `lost_and_found` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('lost','found') DEFAULT 'lost',
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lost_and_found`
--

INSERT INTO `lost_and_found` (`id`, `item_name`, `description`, `status`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Phone', 'Redmi Note 11 Found, Black Colour.', 'found', 'UIU', '2024-09-17 05:31:33', '2024-09-17 05:31:33'),
(3, 'Umbrella', 'My Umbrella was lost in the traveling time at 100 feet road. If anyone is found please contact 01521782400.', 'lost', '100 Feet', '2024-09-17 05:34:21', '2024-09-17 05:34:21'),
(4, 'Charger', 'iPhone charger is found.', 'found', 'UIU Library', '2024-09-17 05:47:05', '2024-09-17 05:47:05'),
(8, 'Phone', 'iPhone', 'lost', 'At Home', '2024-09-30 08:50:10', '2024-09-30 08:50:10'),
(9, 'Chata', 'in Road', 'lost', 'UIU', '2024-09-30 08:51:34', '2024-09-30 08:51:34'),
(12, 'Chata', 'Black Colour', 'lost', 'UIU', '2024-09-30 16:15:35', '2024-09-30 16:15:35'),
(14, 'Phone', 'afva', 'lost', 'ab ', '2024-10-01 05:27:37', '2024-10-01 05:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `mess_id` int(11) NOT NULL,
  `meal_name` varchar(255) NOT NULL,
  `meal_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `mess_id`, `meal_name`, `meal_date`) VALUES
(1, 1, 'Lunch', '0000-00-00'),
(2, 1, 'Dinner ', '0000-00-00'),
(3, 1, 'Breakfast', '2024-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `mess_management`
--

CREATE TABLE `mess_management` (
  `id` int(11) NOT NULL,
  `mess_name` varchar(100) NOT NULL,
  `manager_name` varchar(100) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `capacity` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mess_management`
--

INSERT INTO `mess_management` (`id`, `mess_name`, `manager_name`, `status`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'G-5', 'Tareq Monour', 'active', 100, '2024-09-30 16:17:15', '2024-09-30 19:11:35'),
(2, 'Shipu Villa', 'Lotifur Nishat', 'active', 50, '2024-09-30 19:50:48', '2024-09-30 19:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `mess_users`
--

CREATE TABLE `mess_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mess_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mess_users`
--

INSERT INTO `mess_users` (`id`, `user_id`, `mess_id`, `created_at`) VALUES
(1, 4, 1, '2024-10-01 17:47:42'),
(2, 5, 1, '2024-10-01 17:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `not_admin`
--

CREATE TABLE `not_admin` (
  `id` int(30) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `not_admin`
--

INSERT INTO `not_admin` (`id`, `first_name`, `last_name`, `name`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(3, 'Lotifur ', 'Nishat', 'Lotifur _Nishat', NULL, '86119e55ee53cc8e91c65180d552d5b1', 'lnishat@gmail.com', 'customer', '2024-09-15 19:05:50'),
(4, 'Mahathir ', 'Shuvo', 'Mahathir _Shuvo', NULL, 'ad69bc5f0d6a632545657de79e669966', 'mariorozario@gmail.com', 'customer', '2024-09-16 20:05:04'),
(6, 'Labib', 'Anjum', 'Labib_Anjum', NULL, '8661fbcf61452e268c495962b42dd499', 'lamjum@gmail.com', 'customer', '2024-09-17 05:22:31'),
(8, 'Tareq', 'Monour', 'Tareq_Monour', 'tareq', '0d20b93812a60f072cbcf2ac64b271a6', 'tareqmonour00@gmail.com', 'customer', '2024-09-30 12:14:46'),
(9, 'Mirza', 'Kader', 'Mirza_Kader', 'mirza', '89da365c3e674f19d46583d7663e686f', 'mirzakader@gmail.com', 'customer', '2024-10-07 04:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `tenant_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `tenant_id`, `amount`, `invoice`, `date_created`) VALUES
(1, 2, 2500, '123456', '2020-10-26 11:29:35'),
(3, 3, 3000, 'Card', '2024-09-08 17:37:26'),
(4, 3, 3000, 'Card', '2024-09-09 16:45:47'),
(5, 3, 3000, 'Card', '2024-09-16 01:24:04'),
(6, 2, 2500, 'Card', '2024-09-17 04:05:04'),
(7, 4, 6000, 'Card', '2024-09-17 04:11:01'),
(8, 3, 2000, 'Card', '2024-09-17 05:39:15'),
(9, 5, 5000, 'Card', '2024-09-30 22:16:30'),
(10, 4, 10000, 'Card', '2024-10-01 11:22:24'),
(11, 6, 5600, '', '2024-10-01 11:34:23'),
(12, 6, 20000, 'Card', '2024-10-06 03:02:32'),
(13, 2, 15000, 'Card', '2024-10-06 03:38:34'),
(14, 5, 15000, 'Card', '2024-10-06 03:39:28'),
(15, 2, 15000, 'Card', '2024-10-06 03:40:54'),
(16, 6, 15000, 'Card', '2024-10-06 03:41:56'),
(17, 4, 25000, 'Card', '2024-10-07 10:49:02'),
(18, 5, 5000, 'Card', '2024-10-08 11:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `rickshaw_fares`
--

CREATE TABLE `rickshaw_fares` (
  `id` int(11) NOT NULL,
  `license_number` varchar(50) NOT NULL,
  `route` varchar(255) NOT NULL,
  `total_fare` decimal(10,2) NOT NULL,
  `number_of_passengers` int(11) NOT NULL DEFAULT 1,
  `fare_per_passenger` decimal(10,2) GENERATED ALWAYS AS (`total_fare` / `number_of_passengers`) STORED,
  `status` enum('available','not available') DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rickshaw_fares`
--

INSERT INTO `rickshaw_fares` (`id`, `license_number`, `route`, `total_fare`, `number_of_passengers`, `status`, `created_at`, `updated_at`) VALUES
(1, '103', '100 Feet', 40.00, 2, 'available', '2024-09-17 05:26:59', '2024-09-17 05:26:59'),
(2, '105', 'Basundhara R/A', 60.00, 2, 'available', '2024-09-17 05:27:53', '2024-09-17 05:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Bachelor Sphere', 'mmonour221519@bscse.uiu.ac.bd', '01521782400', '1725880020_My Project Logo.png', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `house_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active, 0= inactive',
  `date_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `house_id`, `status`, `date_in`) VALUES
(2, 'John', 'C', 'Smith', 'jsmith@sample.com', '+18456-5455-55', 1, 1, '2020-07-02'),
(3, 'Monour', '', 'Tareq', 'tareqmonour00@gmail.com', '01764968722', 2, 1, '2024-07-09'),
(4, 'Lotifur', '', 'Nishat', 'shaunberguk@gmail.com', '01764965799', 3, 1, '2024-09-09'),
(5, 'Shuvo', '', 'Mahathir', 'shaunberguk@gmail.com', '01764969729', 5, 1, '2024-12-09'),
(6, 'Ali', '', 'Parvez', 'shaunberguk@gmail.com', '01764965710', 4, 1, '2024-12-09'),
(7, 'Kader', '', 'Abdul', 'shaunberguk@gmail.com', '01764968721', 6, 1, '2024-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `tuition`
--

CREATE TABLE `tuition` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `tutor_name` varchar(100) NOT NULL,
  `status` enum('available','not available') DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tuition`
--

INSERT INTO `tuition` (`id`, `subject`, `tutor_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mathematics', 'Tareq Monour', 'available', '2024-09-17 05:24:18', '2024-09-17 05:24:18'),
(2, 'Physics', 'Abul Kalam', 'available', '2024-09-17 05:25:36', '2024-09-17 05:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=Staff',
  `email` varchar(100) NOT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`, `email`, `role`, `created_at`) VALUES
(1, 'Tareq Monour', 'admin', '0192023a7bbd73250516f069df18b500', 1, '', 'customer', '2024-09-08 16:09:44'),
(4, 'Lotifur Nishat', 'nishat', 'nishat', 2, 'lnishat@gmail.com', 'admin', '2024-09-30 17:42:01'),
(5, 'Jiku Ahmed', 'jiku', 'jiku', 2, 'jiku@gmail.com', 'customer', '2024-09-30 17:42:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_meals`
--
ALTER TABLE `assigned_meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mess_id` (`mess_id`),
  ADD KEY `meal_id` (`meal_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bazar_list`
--
ALTER TABLE `bazar_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_and_found`
--
ALTER TABLE `lost_and_found`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `mess_management`
--
ALTER TABLE `mess_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mess_users`
--
ALTER TABLE `mess_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `not_admin`
--
ALTER TABLE `not_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rickshaw_fares`
--
ALTER TABLE `rickshaw_fares`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `license_number` (`license_number`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuition`
--
ALTER TABLE `tuition`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `assigned_meals`
--
ALTER TABLE `assigned_meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bazar_list`
--
ALTER TABLE `bazar_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lost_and_found`
--
ALTER TABLE `lost_and_found`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mess_management`
--
ALTER TABLE `mess_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mess_users`
--
ALTER TABLE `mess_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `not_admin`
--
ALTER TABLE `not_admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rickshaw_fares`
--
ALTER TABLE `rickshaw_fares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tuition`
--
ALTER TABLE `tuition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_meals`
--
ALTER TABLE `assigned_meals`
  ADD CONSTRAINT `assigned_meals_ibfk_1` FOREIGN KEY (`mess_id`) REFERENCES `mess_management` (`id`),
  ADD CONSTRAINT `assigned_meals_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`),
  ADD CONSTRAINT `assigned_meals_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bazar_list`
--
ALTER TABLE `bazar_list`
  ADD CONSTRAINT `bazar_list_ibfk_1` FOREIGN KEY (`mess_id`) REFERENCES `mess_management` (`id`);

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`mess_id`) REFERENCES `mess_management` (`id`);

--
-- Constraints for table `mess_users`
--
ALTER TABLE `mess_users`
  ADD CONSTRAINT `mess_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mess_users_ibfk_2` FOREIGN KEY (`mess_id`) REFERENCES `mess_management` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
