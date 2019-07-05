-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2019 a las 03:13:24
-- Versión del servidor: 5.5.40
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbgym`
--
CREATE DATABASE IF NOT EXISTS `dbgym` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbgym`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_user`
--

DROP TABLE IF EXISTS `auth_user`;
CREATE TABLE IF NOT EXISTS `auth_user` (
`id` int(11) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `pass_key` varchar(30) NOT NULL,
  `security` varchar(50) NOT NULL,
  `level` int(2) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_user`
--

INSERT INTO `auth_user` (`id`, `login_id`, `pass_key`, `security`, `level`, `sex`, `name`) VALUES
(1, 'admin', 'admin', 'admin', 5, 'male', 'Mr.Admin'),
(2, 'cajero', 'cajero', 'cajero', 4, 'male', 'cashier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `healthstatus`
--

DROP TABLE IF EXISTS `healthstatus`;
CREATE TABLE IF NOT EXISTS `healthstatus` (
  `hs_id` int(20) NOT NULL,
  `id` int(7) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date1` datetime NOT NULL,
  `bodyfat` varchar(25) NOT NULL,
  `water` varchar(30) NOT NULL,
  `muscle` varchar(30) NOT NULL,
  `calorie` varchar(30) NOT NULL,
  `bone` varchar(30) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `healthstatus`
--

INSERT INTO `healthstatus` (`hs_id`, `id`, `name`, `date1`, `bodyfat`, `water`, `muscle`, `calorie`, `bone`, `remarks`) VALUES
(0, 15, '15', '2016-02-14 00:00:00', 'Body Fatwr', 'Waterwr', 'Musclewr', 'Caloriewr', 'Bonewr', 'Remarkswr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mem_types`
--

DROP TABLE IF EXISTS `mem_types`;
CREATE TABLE IF NOT EXISTS `mem_types` (
`id` int(11) NOT NULL,
  `mem_type_id` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `days` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mem_types`
--

INSERT INTO `mem_types` (`id`, `mem_type_id`, `name`, `days`, `rate`, `details`) VALUES
(2, 'XKCLTDSJ', 'Mensual', 30, 250, 'Pago de membresia al mes'),
(4, 'CEJHUNAD', 'Semanal', 7, 50, 'Pago de prueba de 1 semana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subsciption`
--

DROP TABLE IF EXISTS `subsciption`;
CREATE TABLE IF NOT EXISTS `subsciption` (
`id` int(7) NOT NULL,
  `mem_id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sub_type` varchar(100) NOT NULL,
  `paid_date` date NOT NULL,
  `expiry` date NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `invoice` varchar(30) NOT NULL,
  `sub_type_name` text NOT NULL,
  `bal` int(11) NOT NULL,
  `exp_time` bigint(20) NOT NULL,
  `renewal` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subsciption`
--

INSERT INTO `subsciption` (`id`, `mem_id`, `name`, `sub_type`, `paid_date`, `expiry`, `total`, `paid`, `invoice`, `sub_type_name`, `bal`, `exp_time`, `renewal`) VALUES
(15, 1454208171, 'new', 'NUYVCFEJ', '2016-01-31', '2016-02-01', 100, 0, '54208204x8m', 'Per Session', 100, 1454281200, 'yes'),
(16, 1454763163, 'we', 'XKCLTDSJ', '2016-02-06', '2016-03-07', 1000, 0, '54763190hrs', 'Monthly', 1000, 1457305200, 'yes'),
(17, 1562193720, 'Danny Manuel Chavez Herrera', 'CEJHUNAD', '2019-07-04', '2019-08-03', 300, 200, '62193854n27', 'test', 100, 1564783200, 'yes'),
(18, 1562286829, 'da', 'CEJHUNAD', '2019-07-05', '2019-07-12', 50, 100, '62286848rkg', 'Prueba', -50, 1562882400, 'yes'),
(19, 1562286929, 'da', 'CEJHUNAD', '2019-07-05', '2019-07-12', 0, 0, '62286931278', 'Prueba', 0, 1562882400, 'yes'),
(20, 1562287065, 'da', 'CEJHUNAD', '2019-07-05', '2019-07-12', 50, 12, '622870719zt', 'Prueba', 38, 1562882400, 'yes'),
(21, 1562287272, 'da', 'XKCLTDSJ', '2019-07-05', '2019-08-04', 250, 123, '62287274kh4', 'Mensual', 127, 1564869600, 'no'),
(22, 1562287396, 'da', 'CEJHUNAD', '2019-07-05', '2019-07-12', 50, 12, '62287401osx', 'Prueba', 38, 1562882400, 'yes'),
(23, 1562287571, 'da', 'XKCLTDSJ', '2019-07-05', '2019-08-04', 250, 500, '62287581cit', 'Mensual', -250, 1564869600, 'yes'),
(24, 1562287272, 'da', 'CEJHUNAD', '2019-07-05', '2019-07-12', 50, 50, '62288356d4r', 'Prueba', 0, 1562882400, 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `time_table`
--

DROP TABLE IF EXISTS `time_table`;
CREATE TABLE IF NOT EXISTS `time_table` (
`id` int(11) NOT NULL,
  `mem_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_data`
--

DROP TABLE IF EXISTS `user_data`;
CREATE TABLE IF NOT EXISTS `user_data` (
`id` int(7) NOT NULL,
  `wait` varchar(10) NOT NULL,
  `newid` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `pic_add` text NOT NULL,
  `height` float NOT NULL,
  `weight` int(11) NOT NULL,
  `contactperson` text NOT NULL,
  `joining` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `proof` text NOT NULL,
  `other_proof` text NOT NULL,
  `nproof` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_data`
--

INSERT INTO `user_data` (`id`, `wait`, `newid`, `name`, `address`, `birthdate`, `email`, `pic_add`, `height`, `weight`, `contactperson`, `joining`, `sex`, `proof`, `other_proof`, `nproof`) VALUES
(14, 'no', 1454208171, 'a', 'new', '2016-01-05', 'new@gmail.com', '../images/1454208171.png', 6, 130, 'new', '2016-01-31', 'Male', 'GSIS Card', ' ', NULL),
(15, 'no', 1454763163, 'b', 'we', '2016-02-04', 'we@gmail.com', '../images/1454763163.png', 0, 0, 'we', '2016-02-06', 'Male', 'GSIS Card', ' ', NULL),
(17, 'no', 1562193720, 'Danny Manuel Chavez Herrera', 'Jr.Alfonzo Ugarte Mz:N Lt:4, peru', '1996-06-13', 'dannychavez141@gmail.com', '../images/1562193720.jpg', 173, 100, '991268866', '2019-07-04', 'Male', 'GSIS Card', ' ', NULL),
(25, 'no', 1562287272, 'da', 'sda', '2019-07-10', 'danny', '../images/1562287272.jpg', 12, 213, '8882', '2019-07-05', 'Masculino', 'DNI', ' ', '710'),
(26, 'no', 1562287396, 'da', 'sda', '2019-07-10', 'danny', '../images/1562287396.jpg', 12, 213, '8882', '2019-07-05', 'Masculino', 'DNI', ' ', '710'),
(27, 'no', 1562287571, 'da', 'sda', '2019-07-10', 'danny', '../images/1562287571.jpg', 12, 213, '8882', '2019-07-05', 'Masculino', 'DNI', ' ', '710');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_user`
--
ALTER TABLE `auth_user`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `healthstatus`
--
ALTER TABLE `healthstatus`
 ADD PRIMARY KEY (`hs_id`);

--
-- Indices de la tabla `mem_types`
--
ALTER TABLE `mem_types`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subsciption`
--
ALTER TABLE `subsciption`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `time_table`
--
ALTER TABLE `time_table`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_data`
--
ALTER TABLE `user_data`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auth_user`
--
ALTER TABLE `auth_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mem_types`
--
ALTER TABLE `mem_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `subsciption`
--
ALTER TABLE `subsciption`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `time_table`
--
ALTER TABLE `time_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user_data`
--
ALTER TABLE `user_data`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
