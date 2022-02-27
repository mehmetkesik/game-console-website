-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Şub 2022, 12:23:51
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `gameconsole`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='comments for games';

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `game_id`, `comment`, `time`) VALUES
(9, 15, 1, 'Some features have been improved, but defense has become very difficult )', '2022-02-27 14:16:54'),
(10, 30, 1, 'I can still play at professional level. They did my cat well and I like to play)', '2022-02-27 14:21:15'),
(11, 15, 3, 'Even though it\'s been years since it came out, it\'s still a game that I love playing)', '2022-02-27 14:23:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `console`
--

CREATE TABLE `console` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `manufacturer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ram` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sound` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connectivity` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller_input` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dimensions` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mass` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `features` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `console`
--

INSERT INTO `console` (`id`, `name`, `release_date`, `manufacturer`, `cpu`, `gpu`, `ram`, `disc`, `display`, `sound`, `media`, `connectivity`, `controller_input`, `dimensions`, `mass`, `price`, `website`, `features`, `time`) VALUES
(1, 'PlayStation 5', '2020-11-12 00:00:00', 'Sony, Foxconn', 'Custom 8-core AMD Zen 2 Variable frequency up to 3.5 GHz', 'Custom AMD RDNA 2, 36 CUs Variable frequency up to 2.23 GHz 10.3 TFLOPS peak', '16 GB/256-bit GDDR6 SDRAM 512 MB DDR4 RAM (for background tasks)', 'Custom 825 GB PCIe 4.0 NVMe SSD', 'Video output formats HDMI: 720p, 1080i, 1080p, 4K UHD, 8K UHD', 'Custom Tempest Engine 3D Audio Dolby Atmos & DTS:X (Blu-ray video & UHD Blu-ray video) 7.1 surround ', 'Ultra HD Blu-ray, Blu-ray, DVD, Digital distribution', 'Wi-Fi IEEE 802.11ax, Bluetooth 5.1, Gigabit Ethernet, 2× USB 3.2 Gen 2×1, 1× USB 2.0, 1× USB-C with ', 'DualSense, DualShock 4, PlayStation Move', 'Base: 390 mm × 260 mm × 104 mm (15.4 in × 10.2 in × 4.1 in), Digital: 390 mm × 260 mm × 92 mm (15.4 ', 'Base: 4.5 kilograms (9.9 lb), Digital: 3.9 kilograms (8.6 lb)', '499', 'playstation.com/ps5', 'Features that the admin wants to add.', '2022-02-13 00:17:33');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favorite_games`
--

CREATE TABLE `favorite_games` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='favorite games for users';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `games`
--

CREATE TABLE `games` (
  `id` int(10) UNSIGNED NOT NULL,
  `console_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `release_date` datetime NOT NULL,
  `admin_score` int(11) DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpu_requirement` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpu_requirement` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ram_requirement` int(11) DEFAULT NULL,
  `disc_requirement` int(11) DEFAULT NULL,
  `features` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='games for console';

--
-- Tablo döküm verisi `games`
--

INSERT INTO `games` (`id`, `console_id`, `name`, `price`, `release_date`, `admin_score`, `picture`, `video`, `cpu_requirement`, `gpu_requirement`, `ram_requirement`, `disc_requirement`, `features`, `time`) VALUES
(1, 1, 'FIFA 2022', '34', '2021-09-26 00:00:00', 4, 'fifa2022.png', 'https://www.youtube.com/embed/cxXvYJyBlc4', 'Intel Core i3-6100 @ 3.7GHz or AMD Athlon X4 880K @4GHz', 'NVIDIA GTX 660 2GB or AMD Radeon HD 7850 2GB', 8, 50, 'Powered by Football™, EA SPORTS™ FIFA 22 brings the game even closer to the real thing with fundamental gameplay\n    advances and a new season of innovation across every mode.', '2022-02-17 21:55:49'),
(3, 1, 'Grand Theft Auto V', '5', '2013-09-17 00:00:00', 4, 'gta5.jpg', 'https://www.youtube.com/embed/QkkoHAzjnUs', 'Intel Core 2 Quad CPU Q6600 @ 2.40GHz (4 CPUs) / AMD Phenom 9850 Quad-Core Processor (4 CPUs) @ 2.5G', 'NVIDIA 9800 GT 1GB / AMD HD 4870 1GB (DX 10, 10.1, 11)', 4, 72, 'Grand Theft Auto, officially abbreviated GTA, is a video game franchise created by game programmer David Jones and\n    Mike Dailly, brothers Dan and Sam Houser, and game designer Zachary Clarke.', '2022-02-25 13:36:57'),
(4, 1, 'Far Cry 5', '15', '2018-03-25 00:00:00', 3, 'farcry5.jpeg', 'https://www.youtube.com/embed/wVbwQ_I5QA0', 'Intel Core i5-2400 @ 3.1 GHz or AMD FX-6300 @ 3.5 GHz or equivalent', 'NVIDIA GeForce GTX 670 or AMD R9 270 (2GB VRAM with Shader Model 5.0 or better)', 8, 40, 'Far Cry comes to America in the latest installment of the award-winning franchise.\n    <br/><br/>\n    Welcome to Hope County, Montana, land of the free and the brave but also home to a fanatical doomsday cult known as\n    Eden’s Gate. Stand up to cult leader Joseph Seed, and his siblings, the Heralds, to spark the fires of resistance\n    and liberate the besieged community.', '2022-02-25 23:33:00'),
(5, 1, 'Gran Turismo 7', '38', '2022-03-04 00:00:00', 4, 'granturismo7.jpeg', 'https://www.youtube.com/embed/1tBUsXIkG1A', 'Intel Core i3-560 3.3GHz / AMD Phenom II X4 805', 'AMD Radeon RX 580 8GB or NVIDIA GeForce GTX 1060', 8, 40, 'Gran Turismo 7 combines the best of a Real Driving Simulator. <br/> Whether you\'re a tournament racer, collector, modder, designer or photographer; Find your line with amazing game\n    modes like GT Scenario, Arcade and Driving School that fans love.', '2022-02-26 16:02:15'),
(6, 1, 'Spider-Man: Miles Morales', '25', '2020-11-12 00:00:00', 3, 'miles-morales.jpg', 'https://www.youtube.com/embed/rYJ6bg0NCII', 'Intel® Core ™ i3 3250 3.5 GHz or Intel Pentium G4560 3.5 GHz / AMD FX-4350 4.2 GHz', 'NVIDIA® GeForce® GTX 660 2GB or GTX 1050 2GB / AMD Radeon HD 7850 2GB', 6, 105, 'Be perfect. Be yourself.\n    <br/><br/>\n    The rise of our hero, Miles Morales, who gained extraordinary and explosive powers on his way to becoming\n    Spider-Man experience.', '2022-02-26 16:24:01'),
(7, 1, 'NBA 2K22', '23', '2021-09-09 00:00:00', 2, 'nba2k22.jpeg', 'https://www.youtube.com/embed/OcUzwnA569M', 'Intel® Core™ i3-2100 @ 3.10 GHz/ AMD FX-4100 @ 3.60 GHz', 'NVIDIA® GeForce® GT 450 1GB/ ATI® Radeon™ HD 7770 1 GB', 4, 110, 'NBA 2K22 puts the entire basketball universe in your hands. PLAY NOW in real NBA and WNBA environments against\n    authentic teams and players. Build your own dream team in MyTEAM with today’s stars and yesterday’s legends.', '2022-02-26 16:35:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `scores`
--

CREATE TABLE `scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='scores for games';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` datetime DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `birth_date`, `admin`, `status`, `time`) VALUES
(15, 'emily clark', 'ec0', 'ec0@gmail.com', 'b297a65c5481ad69d3955b47644a75d77aae9550072cecb76cba7ae8dfeea2ce990430cb58377a6d6cbb73b9a5ed70ab364954890dece51741a21d2f0f932ff9', '1986-10-26 00:00:00', 0, 1, '2022-02-17 19:18:51'),
(30, 'erling haaland', 'eh0', 'eh@gmail.com', '3c56aafa21488c24fe9ecb68ba8478778184c131fd422444c4a6b8f305260b4af28be8f29dd23ffa7ed6aa9dc9b8d2691ce3d8d3ad9cab0e77f42f4bf945a966', '2000-07-21 00:00:00', 0, 1, '2022-02-22 15:10:20');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `favorite_games`
--
ALTER TABLE `favorite_games`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `console`
--
ALTER TABLE `console`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `favorite_games`
--
ALTER TABLE `favorite_games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
