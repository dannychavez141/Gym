-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2019 a las 17:47:26
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
  `date1` date NOT NULL,
  `bodyfat` varchar(25) NOT NULL,
  `water` varchar(30) NOT NULL,
  `muscle` varchar(30) NOT NULL,
  `calorie` varchar(30) NOT NULL,
  `bone` varchar(30) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- AUTO_INCREMENT de la tabla `healthstatus`
--
ALTER TABLE `healthstatus`
MODIFY `hs_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mem_types`
--
ALTER TABLE `mem_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `subsciption`
--
ALTER TABLE `subsciption`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `time_table`
--
ALTER TABLE `time_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user_data`
--
ALTER TABLE `user_data`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
