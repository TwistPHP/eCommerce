--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS /*TWIST_DATABASE_TABLE_PREFIX*/`products` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tag` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `image` int(11) NOT NULL,
  `price` int(10) NOT NULL,
  `attributes` tinytext COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) NOT NULL,
  `availability` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `depth` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_cost` int(10) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `twist_product_cat`
--

CREATE TABLE IF NOT EXISTS /*TWIST_DATABASE_TABLE_PREFIX*/`product_cat` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `twist_product_cat_link`
--

CREATE TABLE IF NOT EXISTS /*TWIST_DATABASE_TABLE_PREFIX*/`product_cat_link` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`,`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `twist_product_tag`
--

CREATE TABLE IF NOT EXISTS /*TWIST_DATABASE_TABLE_PREFIX*/`product_tag` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;
