-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 02:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3'),
('admin1', 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointmentID` int(10) NOT NULL,
  `patientname` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `symptoms` varchar(100) NOT NULL,
  `patientID` int(10) NOT NULL,
  `doctorID` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentID`, `patientname`, `date`, `time`, `symptoms`, `patientID`, `doctorID`, `status`) VALUES
(10, 'Ramya L', '2022-04-07', '10:30:00.000000', 'Food Poisoning ', 22, 7, 'completed'),
(15, 'Reese M', '2022-04-23', '10:00:00.000000', 'Nausea ', 36, 7, 'completed'),
(34, 'Jessica Jones', '2022-04-22', '11:20:00.000000', 'cold', 39, 6, 'completed'),
(35, 'Ramya L', '2022-04-22', '10:30:00.000000', 'cold', 22, 6, 'completed'),
(41, 'Divya JB', '2022-06-02', '12:15:00.000000', 'Fever and Head Ache', 44, 9, 'active'),
(42, 'Reese M', '2022-05-27', '12:40:00.000000', 'Fever', 36, 6, 'active'),
(43, 'David W', '2022-05-27', '13:30:00.000000', 'Sore Throat', 47, 6, 'active'),
(44, 'Ramya L', '2022-06-08', '13:00:00.000000', 'pain', 22, 8, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctorID` int(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(25) NOT NULL,
  `ph_number` varchar(10) NOT NULL,
  `license_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctorID`, `password`, `name`, `ph_number`, `license_number`) VALUES
(6, 'ce9689abdeab50b5bee3b56c7aadee27', 'Jayaprakasha MR', '9876543201', 567890),
(7, 'adbb209dc791bbb0c47233dee1ba0f11', 'Prakruthi S', '9878654378', 2020788),
(8, 'c6c6ce72f4dff102e38d74f7143a2ea8', 'Eleanor Pane', '7898456789', 59087),
(9, 'b4cc344d25a2efe540adbf2678e2304c', 'James Knight', '7565456732', 67898),
(10, '669dd504e594a2698c4b1e6b9c8064ae', 'Puneeta K', '9877678943', 56787);

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `doctorID` int(10) NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hours`
--

INSERT INTO `hours` (`doctorID`, `start_time`, `end_time`, `date`) VALUES
(7, '10:00:00.000000', '13:00:00.000000', '2022-05-30'),
(7, '10:00:00.000000', '13:00:00.000000', '2022-06-06'),
(8, '10:00:00.000000', '14:00:00.000000', '2022-06-01'),
(8, '10:00:00.000000', '14:00:00.000000', '2022-06-08'),
(9, '10:15:00.000000', '13:15:00.000000', '2022-06-02'),
(9, '10:15:00.000000', '13:15:00.000000', '2022-06-09'),
(10, '09:21:10.000000', '15:21:10.000000', '2022-05-03'),
(6, '10:00:00.000000', '17:00:00.000000', '2022-05-27'),
(6, '12:00:00.000000', '17:00:00.000000', '2022-05-26'),
(6, '09:00:00.000000', '12:00:00.000000', '2022-06-03'),
(7, '09:00:00.000000', '12:00:00.000000', '2022-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicineID` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cost` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicineID`, `name`, `quantity`, `cost`) VALUES
(1, 'Paracetamol', 200, 5),
(3, 'Cetrizine', 100, 5),
(4, 'Amoxicillin', 200, 5),
(5, 'Azithromycin', 100, 5),
(6, 'Buscopan', 200, 2),
(7, 'Cefalexin', 100, 5),
(8, 'Ciprofloxacin', 200, 5),
(9, 'Co-amoxiclav', 100, 10),
(10, 'Cyanocobalamin', 200, 10),
(11, 'Diazepam', 100, 5),
(12, 'Domperidone', 100, 5),
(13, 'Erythromycin', 100, 5),
(14, 'Fentanyl', 200, 5),
(15, 'Flucloxacillin', 200, 10),
(16, 'Folic acid', 200, 5),
(17, 'Glimepiride', 200, 10),
(18, 'Hydrocortisone', 200, 5),
(19, 'Ibuprofen', 200, 5),
(20, 'Lactulose', 200, 5),
(21, 'Lidocaine ', 200, 5),
(22, 'Lorazepam', 200, 5),
(23, 'Metformin', 200, 5),
(24, 'Nifedipine', 200, 10),
(25, 'Omeprazole', 100, 10),
(26, 'Pantoprazole', 100, 5),
(27, 'Ranitidine', 100, 5),
(28, 'Salbutamol inhaler', 50, 10),
(29, 'Sodium valproate', 50, 10),
(30, 'Thiamine', 100, 10),
(31, 'Valsartan', 100, 10);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `nurseID` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `license_number` int(10) NOT NULL,
  `ph_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`nurseID`, `name`, `password`, `license_number`, `ph_number`) VALUES
(6, 'Ester Samuel', 'fa258e7e7a0d43c4266a01029dc2bdfa', 76890, '7897685460'),
(7, 'Jose Martinez', '662eaa47199461d01a623884080934ab', 67854, '8765678810');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patientID` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `dob` date NOT NULL,
  `age` int(5) NOT NULL,
  `ph_number` varchar(10) NOT NULL,
  `nhs_number` int(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `history` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patientID`, `name`, `password`, `dob`, `age`, `ph_number`, `nhs_number`, `address`, `gender`, `history`) VALUES
(22, 'Ramya L', '69f8ccc05b12ef0f8c94d2d0087124bd', '1996-09-07', 25, '8956435678', 4563678, '31 Buckminster Rd, Leicester LE3 9AT', 'Female', 'Asthma'),
(24, 'Miranda Harlow', '1ee1877c6655ecc71dfead311c771bd0', '1995-12-12', 27, '7884410972', 8459361, '55 Welford road, LE2 6BH', 'Female', 'None'),
(36, 'Reese M', 'ce8fbf161182f814df5f778862afbedd', '2020-07-16', 3, '9886086433', 1234567, '1 Connaught St, Leicester LE2 1FJ', 'Male', 'None'),
(37, 'S Shubhakar', 'da192c39ca413ae72bd67d1a47009d2a', '2001-12-18', 20, '9453125018', 2496121, '104 Regent Rd, Leicester LE1 7LT', 'Male', 'Anxiety and depression'),
(38, 'Varun Singla', '149e200961ea52955bd55cb49a127935', '1991-03-28', 31, '9572952761', 7285921, '9 Bartholomew St, Leicester LE2 1BH', 'Male', 'Schizophrenia'),
(39, 'Jessica Jones', 'aae039d6aa239cfc121357a825210fa3', '1975-06-07', 47, '7569088080', 9876508, '101 queens rd, LE2 3FL', 'Female', 'Diabetic'),
(42, 'Varsha JP', 'ff2f87e3b76f13788e41d6feae7c5dbb', '1997-04-11', 25, '8147895471', 7876785, 'Opal Court, Block C, LE1 7HA', 'Female', 'KS'),
(43, 'America Chaves', '118d11972ac892c91830e386aed1eb44', '1994-07-18', 27, '9878965430', 7896543, '50 Hamilton St, Leicester LE2 1FP', 'Female', 'Pollen Allergy '),
(44, 'Divya JB', '2cdd7064b290132617248dbfd85f740e', '1987-07-14', 34, '8767865460', 4356785, '33 Putney Road, LE2 7TG', 'Female', 'None'),
(47, 'David W', '172522ec1028ab781d9dfd17eaca4427', '2000-12-18', 21, '9897654345', 7867854, 'Opal Court, Block A, LE1 7HA', 'Male', 'None'),
(49, 'neon', 'a63728c09cda459c3caaa158f4adff49', '1996-12-12', 25, '9876543210', 8765678, 'home', 'Female', 'none'),
(50, 'pak', '8d569333abbc9e26646dc6a398891324', '2022-05-28', 26, '9887609876', 9876546, 'nasck', 'Female', 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `prescriptionID` int(11) NOT NULL,
  `appointmentID` int(10) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `medicineID` int(10) NOT NULL,
  `dose` int(5) NOT NULL,
  `patientID` int(10) NOT NULL,
  `doctorID` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`prescriptionID`, `appointmentID`, `diagnosis`, `medicineID`, `dose`, `patientID`, `doctorID`, `status`) VALUES
(5, 15, 'Motion Sickness', 3, 5, 36, 7, 'inactive'),
(6, 34, 'Sinusitis', 1, 5, 6, 39, 'inactive'),
(7, 35, 'Cold', 1, 5, 22, 6, 'active'),
(10, 10, 'Nausea', 1, 5, 22, 7, 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `appt_doc_id` (`doctorID`),
  ADD KEY `appt_patient_id` (`patientID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctorID`);

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
  ADD KEY `hours_doc_id` (`doctorID`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`medicineID`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`nurseID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`prescriptionID`),
  ADD KEY `pres_doc_id` (`doctorID`),
  ADD KEY `pres_patient_id` (`patientID`),
  ADD KEY `med_id` (`medicineID`),
  ADD KEY `pres_appt_id` (`appointmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointmentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctorID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `medicineID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `nurseID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patientID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `prescriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appt_doc_id` FOREIGN KEY (`doctorID`) REFERENCES `doctors` (`doctorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appt_patient_id` FOREIGN KEY (`patientID`) REFERENCES `patients` (`patientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hours`
--
ALTER TABLE `hours`
  ADD CONSTRAINT `hours_doc_id` FOREIGN KEY (`doctorID`) REFERENCES `doctors` (`doctorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `pres_appt_id` FOREIGN KEY (`appointmentID`) REFERENCES `appointments` (`appointmentID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
