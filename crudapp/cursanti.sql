-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Feb 08. 11:27
-- Kiszolgáló verziója: 10.1.29-MariaDB
-- PHP verzió: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `final`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cursanti`
--

CREATE TABLE `cursanti` (
  `id` int(11) NOT NULL,
  `nume` char(250) NOT NULL,
  `prenume` char(250) NOT NULL,
  `adresa` char(250) NOT NULL,
  `telefon` char(15) NOT NULL,
  `curs` char(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- A tábla adatainak kiíratása `cursanti`
--

INSERT INTO `cursanti` (`id`, `nume`, `prenume`, `adresa`, `telefon`, `curs`, `created_at`) VALUES
(7, 'Tepes', 'Vlad', 'Brasov', '1111111111', 'Linux', '2020-02-08 10:23:37'),
(8, 'Balboa', 'Rocky', 'Philadelphia', '2222222222', 'PHP', '2020-02-08 10:24:51'),
(9, 'Snow', 'John', 'Winterfell', '3333333333', 'SQL', '2020-02-08 10:25:17');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cursanti`
--
ALTER TABLE `cursanti`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cursanti`
--
ALTER TABLE `cursanti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
