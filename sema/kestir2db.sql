-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 08 Eki 2020, 17:29:29
-- Sunucu sürümü: 5.5.60-log
-- PHP Sürümü: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kestir2db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `islemler`
--

CREATE TABLE `islemler` (
  `id` int(11) NOT NULL,
  `isim` varchar(45) DEFAULT NULL,
  `sure` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `islemler`
--

INSERT INTO `islemler` (`id`, `isim`, `sure`, `status`) VALUES
(2, 'SaÃ§ Boyamaa', 2, 0),
(3, 'SaÃ§ Kesimi', 1, 0),
(4, 'KaÅŸ BÄ±yÄ±k', 1, 0),
(5, 'Makyaj', 1, 0),
(6, 'FÃ¶n', 2, 0),
(15, 'AÄŸda', 2, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `operations` varchar(45) DEFAULT NULL,
  `taskdate` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `iptal` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `tasks`
--

INSERT INTO `tasks` (`id`, `user`, `operations`, `taskdate`, `status`, `iptal`) VALUES
(1, 3, '3', '2005-10-20 20:00:00', 0, 0),
(2, 3, '3', '2020-01-01 10:00:00', 0, 1),
(3, 3, '3,4', '2020-01-01 10:00:00', 0, 0),
(4, 3, '3,4', '2020-01-01 10:00:00', 0, 0),
(5, 3, '3,4', '2020-01-01 10:00:00', 1, 0),
(6, 3, '3,4', '2020-01-01 10:00:00', 1, 0),
(7, 3, '3,4', '2020-01-01 10:00:00', 1, 0),
(8, 3, '3,4', '2020-01-01 10:00:00', 1, 0),
(9, 3, '3,4', '2020-01-01 10:00:00', 1, 0),
(10, 3, '4,5', '2020-01-01 10:00:00', 1, 0),
(11, 3, '2', '2020-01-01 10:00:00', 1, 0),
(12, 3, '4', '2020-01-01 10:00:00', 1, 0),
(13, 3, '3', '2020-01-09 10:00:00', 1, 0),
(14, 3, '2', '2020-01-06 10:00:00', 1, 0),
(15, 3, '3,4,5', '2020-01-15 10:00:00', 1, 0),
(16, 2, '3,4', '2020-10-16 10:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(100) DEFAULT NULL,
  `telefon` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sifre` varchar(255) DEFAULT NULL,
  `isadmin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `adsoyad`, `telefon`, `email`, `sifre`, `isadmin`) VALUES
(1, 'GÃ¼lin Karadeniz', '5558610317', 'gulinkaradeniz@gmail.com', 'admin1', 1),
(2, 'ggg', '2322323', 'gulinkaradeniz@gmail.com', 'qq', 0),
(7, 'aaaa', '1234', 'aaaa', 'aaaa', 0),
(8, 'aaa', 'aaa', 'aaa', 'aaa', 0),
(9, 'ggg', '5415413921', 'gulinkaradeniz@gmail.com', 'qqqqq', 0),
(10, 'ggg', '999', 'gulinkaradeniz@gmail.com', 'ss', 0),
(12, 'ggg', '111', 'AA', 'aa', 0),
(13, 'ggg', '1', '1', '1', 0),
(15, 'p', 'p', 'p', 'p', 0),
(19, 'Åžeyma Su', '54321', 'ÅŸ', 'ÅŸ', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `islemler`
--
ALTER TABLE `islemler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `islemler`
--
ALTER TABLE `islemler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
