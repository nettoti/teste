-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Maio-2015 às 07:35
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchaser_name` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `item_price` decimal(7,2) NOT NULL,
  `purchase_count` int(11) NOT NULL,
  `merchant_address` varchar(255) NOT NULL,
  `merchant_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `purchaser_name`, `item_description`, `item_price`, `purchase_count`, `merchant_address`, `merchant_name`) VALUES
(82, 'purchaser name', 'item description', '0.00', 0, 'merchant address', 'merchant name'),
(83, 'Marty McFly', 'R$20 Sneakers for R$5', '5.00', 1, '123 Fake St', 'Sneaker Store Emporium'),
(84, 'Snake Plissken', 'R$20 Sneakers for R$5', '5.00', 4, '123 Fake St', 'Sneaker Store Emporium'),
(85, 'purchaser name', 'item description', '0.00', 0, 'merchant address', 'merchant name'),
(86, 'Marty McFly', 'R$20 Sneakers for R$5', '5.00', 1, '123 Fake St', 'Sneaker Store Emporium'),
(87, 'Snake Plissken', 'R$20 Sneakers for R$5', '5.00', 4, '123 Fake St', 'Sneaker Store Emporium'),
(88, 'purchaser name', 'item description', '0.00', 0, 'merchant address', 'merchant name'),
(89, 'Marty McFly', 'R$20 Sneakers for R$5', '5.00', 1, '123 Fake St', 'Sneaker Store Emporium'),
(90, 'Snake Plissken', 'R$20 Sneakers for R$5', '5.00', 4, '123 Fake St', 'Sneaker Store Emporium'),
(91, 'purchaser name', 'item description', '0.00', 0, 'merchant address', 'merchant name'),
(92, 'JoÃ£o Silva', 'R$10 off R$20 of food', '10.00', 2, '987 Fake St', 'Bob''s Pizza');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
