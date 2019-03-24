--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS /*TWIST_DATABASE_TABLE_PREFIX*/`products`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` text(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` text(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` text(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `attributes` text(50) COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) NOT NULL,
  `availability` text(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` text(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` text(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` text(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_cost` int(10) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;