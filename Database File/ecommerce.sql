-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 12:01 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin1', 'admin1@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `cancle_details`
--

CREATE TABLE `cancle_details` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `qty` int(100) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pid`, `name`, `qty`, `u_id`) VALUES
(545, 96, 'Locket Pendant', 2, 32);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Rings'),
(2, 'Bangles'),
(3, 'Necklace'),
(4, 'Pendent');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `mobile`, `email`, `message`) VALUES
('hema', 2147483647, 'aartiavantika01@gmail.com', 'qwewerwetfe'),
('qwertyuiop', 123456789, 'aartiavantika01@gmail.com', 'asdfghjkl'),
('qwertyuiop', 123456789, 'aartiavantika01@gmail.com', 'asdfghjkl'),
('qwertyuiop', 1234567890, 'sahiba.psstechno@gmail.ocm', 'zxcvbnm'),
('hema', 2147483647, 'sahiba.psstechno@gmail.ocm', 'qwertyuiop');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `total_price` bigint(100) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `placed_on` datetime NOT NULL DEFAULT current_timestamp(),
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `order_status`, `placed_on`, `firstname`, `lastname`, `email`, `phone`, `address`, `address2`, `code`, `city`, `state`, `country`) VALUES
(401, 32, 123455, 'Order Placed', '2024-03-06 16:02:43', '', '', 'admin@gmail.com', 1234567899, '', '', 0, '', '', 'India'),
(402, 32, 12333, 'Order Placed', '2024-03-06 16:08:38', 'Aarti', 'Kumari', 'kashyapaarti007@gmail.com', 9263476187, 'Municipla chowk', 'uphar sewa sadan', 841301, 'saran', 'bihar', 'Afghanistan'),
(403, 32, 13494, 'cancelled', '2024-03-07 13:00:54', 'Aaru', 'Kashyap', 'qwerty@gmail.com', 9263476187, 'Hosiyarpur', 'Gali no 11', 201301, 'Noida', 'UP', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `product_price`) VALUES
(206, 393, 59, 1, 15000),
(207, 394, 39, 2, 96000),
(208, 395, 99, 1, 12344),
(209, 396, 44, 1, 4000),
(210, 396, 99, 1, 12344),
(211, 397, 100, 4, 493820),
(212, 398, 99, 3, 37032),
(213, 398, 77, 2, 46912),
(214, 399, 99, 1, 12344),
(215, 399, 38, 2, 70000),
(216, 400, 40, 1, 97000),
(217, 401, 100, 1, 123455),
(218, 402, 96, 1, 12333),
(219, 403, 97, 1, 1150),
(220, 403, 99, 1, 12344),
(221, 404, 62, 3, 16500),
(222, 405, 99, 1, 12344),
(223, 405, 38, 1, 35000),
(224, 406, 65, 1, 4500),
(225, 407, 98, 1, 123455);

-- --------------------------------------------------------

--
-- Table structure for table `order_tracking`
--

CREATE TABLE `order_tracking` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reasons` varchar(255) NOT NULL,
  `placed_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tracking`
--

INSERT INTO `order_tracking` (`id`, `order_id`, `status`, `reasons`, `placed_on`) VALUES
(86, 393, 'Dispatched', '', '2024-02-23 15:53:32'),
(87, 395, 'In Progress', '', '2024-02-28 12:58:34'),
(88, 395, 'Order Placed', '', '2024-02-28 16:42:33'),
(89, 395, 'Dispatched', '', '2024-02-28 16:43:05'),
(90, 396, 'In Progress', '', '2024-02-28 16:43:14'),
(91, 397, 'cancelled', '', '2024-02-29 16:39:26'),
(92, 398, 'Delivered', '', '2024-02-29 16:40:03'),
(93, 99, 'Dispatched', '', '2024-02-29 17:14:34'),
(94, 400, 'cancelled', 'qwertyuio', '2024-03-05 16:58:54'),
(95, 403, 'cancelled', 'dont like it', '2024-03-07 13:03:07'),
(96, 404, 'cancelled', 'nhi pasnd aaya', '2024-03-08 12:27:31'),
(97, 404, 'Dispatched', '', '2024-03-08 12:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` int(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `fname`, `lname`, `amount`, `payment_status`, `payment_id`, `added_on`) VALUES
(222, 393, 'Aarti', 'Kumari', 15000, 'complete', 'pay_NeEKVAAiJoBnMW', '2024-02-23 07:57:49'),
(223, 394, 'Arfan', 'Khan', 96000, 'complete', 'pay_NeF9US8rub7XEc', '2024-02-23 08:46:05'),
(224, 395, '', '', 12344, 'complete', 'pay_NfsTb11KHGZWhV', '2024-02-27 11:53:09'),
(225, 396, 'aarti', 'edfh', 16344, 'complete', 'pay_NgFjPZ21jA3wjO', '2024-02-28 10:38:08'),
(226, 397, '', '', 493820, 'complete', 'pay_NgHS9I32fgh9hQ', '2024-02-28 12:19:08'),
(227, 398, '', '', 83944, 'complete', 'pay_NgHTOxTka6F6mF', '2024-02-28 12:20:19'),
(228, 399, 'qwertyuiop', '', 82344, 'complete', 'pay_Ngg3WFlL0CCGtU', '2024-02-29 12:23:09'),
(229, 400, '', '', 97000, 'complete', 'pay_NggMgZ83mr4Vj0', '2024-02-29 12:41:17'),
(230, 401, '', '', 123455, 'complete', 'pay_Nj2OxCCawjzI5o', '2024-03-06 11:32:43'),
(231, 402, 'Aarti', 'Kumari', 12333, 'complete', 'pay_Nj2VCPdx6xKePG', '2024-03-06 11:38:38'),
(232, 403, 'Aaru', 'Kashyap', 13494, 'complete', 'pay_NjNq1dKkbhjDFV', '2024-03-07 08:30:54'),
(233, 404, '', '', 16500, 'complete', 'pay_NjlkaVrmDwlSnc', '2024-03-08 07:54:27'),
(234, 405, '', '', 47344, 'complete', 'pay_NlkHdyedDndbxH', '2024-03-13 07:46:18'),
(235, 406, '', '', 4500, 'complete', 'pay_No6euUStKbgmOf', '2024-03-19 06:57:36'),
(236, 407, '', '', 123455, 'complete', 'pay_No7aPfuDNyewho', '2024-03-19 07:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `collection` varchar(255) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `details` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `net_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `collection`, `cat_id`, `details`, `image`, `category`, `price`, `net_price`) VALUES
(38, 'Metal Bangle', 'Featured', 2, 'These are usually made of metals like gold, silver, brass, or stainless steel. They can be simple or intricately designed with patterns and embellishments.', 'uploads/28.jpg', 'Bangles', 40000, 35000),
(39, 'Bridal Bangles', 'Featured', 2, 'Ornamental wrist jewelry, diverse in materials and designs, worn for adornment or cultural significance, complementing attire and reflecting personal style.\r\n', 'uploads/58.jpg', 'Bangles', 50000, 48000),
(40, 'Avni Gold Necklace Set', 'Featured', 3, 'Jewelry worn around the neck, featuring diverse designs and materials. Symbolizes elegance, love, tradition, and personal style, accentuating beauty and individuality.', 'uploads/61.jpg', 'Necklace', 100000, 97000),
(42, 'Rosary Necklace', 'Featured', 3, 'A necklace with a string of beads used in Catholic prayer, featuring a crucifix or cross pendant.', 'uploads/11.jpg', 'Necklace', 60000, 50000),
(43, 'Pendent Set', 'Featured', 4, 'Pendant, jewelry hanging from necklace, diverse styles, materials, worn for fashion, sentiment, occasions, personal expressions, cherished adornments, timeless elegance.', 'uploads/43.jpg', 'Pendent', 20000, 10000),
(44, 'Couples Ring', 'Featured', 1, 'Rings are a symbol of commitment, love, and style in many cultures around the world.', 'uploads/78.jpg', 'Rings', 4500, 4000),
(45, 'Pendent ', 'Featured', 4, 'Hanging adornment worn on a necklace. Made of various materials and designs, symbolizing elegance, sentiment, culture, faith, or personal significance.', 'uploads/51.jpg', 'Pendent', 40000, 30000),
(52, 'Stone Rings', 'Featured', 1, ' Circular bands often adorned with gemstones or symbols. Symbolizing love, commitment, or fashion, they embellish fingers with personal style and significance.\r\n', 'uploads/38.jpg', 'Rings', 2000, 1500),
(53, 'Ring', 'Featured', 1, 'Circular adornments for fingers, symbolizing commitment, fashion, or achievement. Crafted in diverse styles, rings complement personal expression and commemorate special moments with enduring beauty.', 'uploads/35.jpg', 'Rings', 3000, 2500),
(54, 'Jodha Rings', 'Featured', 1, 'Circular adornments worn on fingers for symbolic, decorative, or ceremonial purposes. They signify commitments, bonds, or simply enhance personal style.', 'uploads/41.jpg', 'Rings', 15000, 13000),
(55, 'Rings', 'Featured', 1, 'Circular bands often adorned with gemstones or symbols. They symbolize love, commitment, and adornment, cherished as meaningful jewelry pieces.\r\n\r\n\r\n\r\n\r\n\r\n', 'uploads/48.jpg', 'Rings', 3000, 2500),
(56, 'Silicone Rings', 'Featured', 1, 'Silicone rings are smooth, light, and come in any colour, shape, or texture you could want or imagine. ', 'uploads/49.jpg', 'Rings', 8000, 7500),
(57, 'Diamond Ring', 'Featured', 1, 'Circular bands worn on fingers for adornment, symbolism, or commitment. They vary in design, materials, and significance, symbolizing love, unity, or style', 'uploads/50.jpg', 'Rings', 110000, 100000),
(58, 'Wedding Ring', 'Featured', 1, 'Circular bands worn on fingers, symbolizing love, commitment, or fashion. They come in various metals and gemstones, representing personal style and significance.', 'uploads/79.jpg', 'Rings', 15000, 14000),
(59, 'Couple Rings', 'Featured', 1, 'Circular adornments worn on fingers, symbolizing love, commitment, or style. They come in diverse designs, metals, and gemstones, reflecting personal taste.', 'uploads/80.jpg', 'Rings', 16000, 15500),
(60, 'Couples Ring', 'Featured', 1, 'Circular bands worn on fingers for adornment or symbolization. They can signify love, commitment, or simply serve as fashionable accessories.', 'uploads/85.jpg', 'Rings', 20000, 19000),
(62, 'Stone Rings', 'New Arrival', 1, 'Circular bands worn on fingers, symbolizing commitment, love, or fashion. They come in diverse styles, metals, and gemstones, reflecting personal taste.', 'uploads/38.jpg', 'Rings', 6000, 5500),
(63, 'Wedding Necklace Set', 'On Sale', 3, 'Jewelry worn around the neck, symbolizing elegance and adornment. Crafted in diverse styles and materials, they accentuate fashion and personal expression.', 'uploads/60.jpg', 'Necklace', 100000, 90000),
(65, 'Traditional Rings', 'New Arrival', 1, 'Circular bands worn on fingers for adornment or symbolic purposes. They signify commitment, love, fashion, or cultural significance in diverse contexts.', 'uploads/71.webp', 'Rings', 5000, 4500),
(66, 'Designer Bangles', 'Featured', 2, 'Designer bangles are crafted by renowned jewelry designers and often feature unique designs, precious stones, or intricate detailing.', 'uploads/66.jpg', 'Bangles', 60000, 50000),
(67, 'Bella diamond bangle', 'Featured', 2, 'A designer diamond bangle is unusually broad but in the latest fashion trend. ', 'uploads/72.webp', 'Bangles', 23456, 12345),
(69, 'Diamond Bangles', 'Featured', 2, 'A designer diamond bangle is unusually broad but in the latest fashion trend.', 'uploads/1.webp', 'Bangles', 234567, 23456),
(71, 'Bangles', 'Featured', 2, 'Fashion accessories worn around wrists, often made of metal, glass, or plastic, adding elegance and charm to outfits.', 'uploads/2.webp', 'Bangles', 2345678, 234567),
(73, '22 Carat Gold Bangle', 'New Arrival', 2, 'Fashion accessories worn around wrists. Available in various materials, colors, and designs, complementing attire and adding elegance to the wearer\'s ensemble.', 'uploads/4.webp', 'Bangles', 2345678, 234567),
(74, ' Gold Bangles', 'New Arrival', 2, 'Light Weight Gold Bangles. These beautiful gold bangles are made with pure gold and are generally twisted to make detailed patterns on the surface.', 'uploads/5.webp', 'Bangles', 23456789, 2345678),
(75, 'Bangles', 'New Arrival', 2, 'A traditional accessory adorning wrists, crafted in various materials, colors, and designs, adding elegance and cultural significance to attire.', 'uploads/72.webp', 'Bangles', 12345678, 2345678),
(76, 'Silver', 'On Sale', 2, 'This artistic German silver bangle set gives us major fashion goals! The design is very unlike what you find in your local stores', 'uploads/67.jpg', 'Bangles', 234567, 8765432),
(77, 'Bracelet Bangles', 'On Sale', 2, 'These are bangles that resemble bracelets but are rigid and do not have a clasp. They can be made from various materials like metal, wood, or plastic.', 'uploads/6.webp', 'Bangles', 234567, 23456),
(78, 'Bangles', 'New Arrival', 2, 'Stylish accessories adorning wrists, available in various materials and designs, complementing outfits with elegance and cultural significance.', 'uploads/7.webp', 'Bangles', 234567, 23456),
(79, 'Necklace ', 'New Arrival', 3, 'Ornamental chain worn around the neck, often adorned with pendants or gemstones. Enhances attire, symbolizes elegance, love, or cultural significance.', 'uploads/12.jpg', 'Necklace', 23456789, 2345678),
(80, 'Bolo Tie Necklace', 'New Arrival', 3, 'A type of neckwear consisting of a braided leather cord with decorative metal tips, often featuring a slide or clasp in the center.', 'uploads/13.jpg', 'Necklace', 1234567, 123456),
(81, 'Layered Necklace', 'New Arrival', 3, 'Adornments for the neck, crafted in diverse materials. Worn for adornment, cultural significance, ceremonies, expressing elegance, style, and personal sentiments.', 'uploads/14.jpg', 'Necklace', 23456, 23455),
(82, 'Chain Necklace', 'New Arrival', 3, 'A simple necklace consisting of linked metal chains of various designs and thicknesses.', 'uploads/15.jpg', 'Necklace', 123456, 123455),
(83, 'Pendant Necklace', 'New Arrival', 3, 'Ornamental chain worn around the neck, crafted in diverse materials. It enhances attire, symbolizes adornment, culture, status, and personal expression.', 'uploads/43.jpg', 'Necklace', 12345, 12344),
(84, 'Locket Necklace', 'New Arrival', 3, 'A necklace containing a small hinged compartment, traditionally used to hold a keepsake or photograph.', 'uploads/44.jpg', 'Necklace', 123456, 123455),
(85, 'Tennis Necklace', 'New Arrival', 3, 'A thin, elegant necklace featuring a continuous line of diamonds or gemstones.', 'uploads/45.jpg', 'Necklace', 123456, 123455),
(86, 'Collar Necklace', 'New Arrival', 3, 'Decorative jewelry worn around the neck. Comes in diverse styles, materials. Symbolizes adornment, beauty, affection, and cultural significance, enhancing personal style and elegance.', 'uploads/62.jpg', 'Necklace', 12345678, 12345677),
(88, 'Jadau Necklace', 'New Arrival', 3, 'Ornamental chain worn around the neck. Symbolizing beauty, culture, and adornment. Crafted in diverse materials, it complements attire and personal style.', 'uploads/81.jpg', 'Necklace', 123456789, 123456788),
(89, 'Pendent ', 'New Arrival', 4, 'Hanging ornament worn on a necklace. Crafted in diverse materials and styles, pendants serve as symbolic adornments, reflecting individual taste, sentiment, and cultural significance.', 'uploads/29.jpg', 'Pendent', 23456, 23455),
(90, 'Initial Pendants', 'On Sale', 4, 'These pendants feature a single letter or a set of initials, often personalized to represent the wearer\'s name or the name of a loved one.', 'uploads/30.jpg', 'Pendent', 123456, 123455),
(91, 'Heart Pendant', 'On Sale', 4, 'A pendant shaped like a heart, symbolizing love, affection, and romance. Heart pendants are often given as gifts on special occasions such as anniversaries and Valentine\'s Day.', 'uploads/31.jpg', 'Pendent', 1234567, 1234566),
(92, 'Cameo Pendants', 'On Sale', 4, 'Cameo pendants feature a carved relief image, typically of a person\'s profile, set against a contrasting background. ', 'uploads/32.jpg', 'Pendent', 123456, 123455),
(93, 'Pearl Pendants', 'On Sale', 4, 'Pendants featuring pearls, either as a single pearl or multiple pearls, are timeless and elegant pieces of jewelry.', 'uploads/33.jpg', 'Pendent', 12345, 12344),
(94, 'Gemstone Pendant', 'On Sale', 4, 'A pendant featuring a single gemstone or multiple gemstones set in various metals such as gold, silver, or platinum. Gemstones can range from diamonds and rubies to emeralds, sapphires, and more.', 'uploads/34.jpg', 'Pendent', 1234567, 1234566),
(95, 'Art Deco Pendants', 'On Sale', 4, 'Inspired by the Art Deco movement of the early 20th century, these pendants often feature geometric shapes, bold colors, and intricate designs.', 'uploads/37.jpg', 'Pendent', 123456, 123454),
(96, 'Locket Pendant', 'Featured', 4, 'A pendant designed with a hinged compartment that opens to reveal a small space for holding a keepsake, such as a photograph or lock of hair.', 'uploads/51.jpg', 'Pendent', 12345, 12333),
(97, 'Charm Pendants', 'New Arrival', 4, 'Charm pendants feature small decorative elements or symbols that hold personal significance to the wearer. They can be collected and added to over time.', 'uploads/75.webp', 'Pendent', 1200, 1150),
(98, 'Nature-Inspired Pendants', 'On Sale', 4, 'Pendants shaped like leaves, flowers, trees, or other elements of nature, reflecting the beauty of the natural world.', 'uploads/8.webp', 'Pendent', 123456, 123455),
(99, 'Birthstone Ring', 'Featured', 1, ' Circular adornments worn on fingers symbolizing commitment, love, or fashion. They vary in design and material, often carrying personal or cultural significance.', 'uploads/9.webp', 'Rings', 12345, 12344),
(100, 'Halo rings', 'New Arrival', 1, 'Circular bands worn on fingers for adornment or symbolic purposes. They signify commitment, love, status, or simply serve as decorative jewelry.', 'uploads/10.webp', 'Rings', 123456, 123455);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `comments` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `item_id`, `user_id`, `user_name`, `rating_number`, `comments`, `date`) VALUES
(20, 0, 0, 'hema', 3, 'asdfghjkl', '2024-03-27 15:30:21'),
(21, 0, 0, 'wertyui', 3, 'zxcvbnm', '2024-03-27 15:30:36'),
(22, 0, 0, 'henmmmmma', 2, 'hemmmma 121`3`23`13', '2024-03-27 15:46:00'),
(23, 0, 0, 'Aarti', 4, 'Good', '2024-03-28 11:51:03'),
(25, 0, 0, 'Mani', 2, 'asdfghjkl', '2024-03-28 16:36:54'),
(26, 0, 0, 'Hani', 3, 'asdfghjkl', '2024-03-28 16:45:55'),
(27, 0, 0, 'Harsh', 3, 'qwertyuiop', '2024-03-28 16:46:03'),
(28, 0, 0, 'Ram', 3, 'asdfghjkl', '2024-03-28 16:46:10'),
(29, 0, 0, 'bn', 4, 'bnmb', '2024-03-28 17:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `u_id` int(11) NOT NULL,
  `profile_image` varchar(55) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`u_id`, `profile_image`, `name`, `email`, `password`, `is_verified`) VALUES
(32, '42.jpg', 'Mandhu', 'madhuri@gmail.com', '$2y$10$QLGZ82zEULmgdGWQpA9P7.LG4TOYda3Swc1YcoFkxm11ky5Ggbqv6', 1),
(60, 'WIN_20230807_12_40_49_Pro.jpg', 'Aarti', 'avantika0196@gmail.com', '$2y$10$VzeoXOIcdXcACorxz9tENujHE00PFI7vXKj2QWzlGNRt4V24KflFO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `single_order`
--

CREATE TABLE `single_order` (
  `id` int(11) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `single_order`
--

INSERT INTO `single_order` (`id`, `pid`, `name`, `qty`, `u_id`) VALUES
(66, 69, 'Diamond Bangles', 1, 32),
(67, 96, 'Locket Pendant', 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`id`, `email`) VALUES
(10, 'avantika0196@gmail.com'),
(11, 'avantika0196@gmail.com'),
(12, 'kashyapaarti007@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `placed_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `qty`, `placed_on`) VALUES
(89, 60, 69, 1, '2024-03-19 13:11:37'),
(90, 60, 99, 1, '2024-03-19 13:11:41'),
(91, 32, 38, 1, '2024-03-19 13:13:08'),
(93, 32, 96, 1, '2024-03-19 13:14:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cancle_details`
--
ALTER TABLE `cancle_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tracking`
--
ALTER TABLE `order_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `single_order`
--
ALTER TABLE `single_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cancle_details`
--
ALTER TABLE `cancle_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=546;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `order_tracking`
--
ALTER TABLE `order_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `single_order`
--
ALTER TABLE `single_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
