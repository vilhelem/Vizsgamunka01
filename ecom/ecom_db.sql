-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2020. Ápr 19. 11:13
-- Kiszolgáló verziója: 5.7.28
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `ecom_db`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'vilhelemadmin', 'patrikv@gmail.com', 'asdASD123');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoriak`
--

CREATE TABLE `kategoriak` (
  `kat_id` int(11) NOT NULL,
  `kat_nev` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `kategoriak`
--

INSERT INTO `kategoriak` (`kat_id`, `kat_nev`) VALUES
(13, 'Casio'),
(14, 'Daniel Klein');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendelesek`
--

CREATE TABLE `rendelesek` (
  `rendeles_id` int(11) NOT NULL,
  `rendeles_amount` float NOT NULL,
  `rendeles_transaction` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `rendeles_status` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `rendeles_currency` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `rendelesek`
--

INSERT INTO `rendelesek` (`rendeles_id`, `rendeles_amount`, `rendeles_transaction`, `rendeles_status`, `rendeles_currency`) VALUES
(31, 345, '34535343', 'Completed', 'USA'),
(32, 345, '34535343', 'Completed', 'USA'),
(33, 345, '34535343', 'Completed', 'USA'),
(34, 345, '34535343', 'Completed', 'USA'),
(35, 345, '34535343', 'Completed', 'USA'),
(36, 345, '34535343', 'Completed', 'USA'),
(37, 345, '34535343', 'Completed', 'USA'),
(38, 345, '34535343', 'Completed', 'USA'),
(39, 345, '34535343', 'Completed', 'USA'),
(40, 345, '34535343', 'Completed', 'USA'),
(41, 345, '34535343', 'Completed', 'USA'),
(42, 345, '34535343', 'Completed', 'USA'),
(43, 345, '34535343', 'Completed', 'USA'),
(44, 345, '34535343', 'Completed', 'USA'),
(45, 345, '34535343', 'Completed', 'USA'),
(46, 345, '34535343', 'Completed', 'USA'),
(47, 345, '34535343', 'Completed', 'USA');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `rendeles_id` int(11) DEFAULT NULL,
  `termek_ar` float NOT NULL,
  `termek_nev` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `termek_darabszam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `reports`
--

INSERT INTO `reports` (`report_id`, `termek_id`, `rendeles_id`, `termek_ar`, `termek_nev`, `termek_darabszam`) VALUES
(2, 1, 0, 35.99, '', 2),
(3, 2, 0, 24.99, '', 1),
(4, 1, NULL, 35.99, '', 2),
(5, 2, NULL, 24.99, '', 1),
(6, 1, NULL, 35.99, '', 2),
(7, 2, NULL, 24.99, '', 1),
(8, 1, NULL, 35.99, '', 2),
(9, 2, NULL, 24.99, '', 1),
(10, 1, NULL, 35.99, '', 2),
(11, 2, NULL, 24.99, '', 1),
(12, 1, NULL, 35.99, '', 2),
(13, 2, NULL, 24.99, '', 1),
(14, 1, NULL, 35.99, '', 2),
(15, 2, NULL, 24.99, '', 1),
(16, 1, NULL, 35.99, '', 2),
(17, 2, NULL, 24.99, '', 1),
(18, 1, NULL, 35.99, '', 2),
(19, 2, NULL, 24.99, '', 1),
(20, 1, NULL, 35.99, '', 2),
(21, 2, NULL, 24.99, '', 1),
(22, 1, NULL, 35.99, '', 2),
(23, 2, NULL, 24.99, '', 1),
(24, 1, 28, 35.99, '', 2),
(25, 2, 28, 24.99, '', 1),
(26, 1, 29, 35.99, 'Termék 1', 2),
(27, 2, 29, 24.99, 'Termék 2', 1),
(28, 1, 30, 35.99, 'Termék 1', 2),
(29, 2, 30, 24.99, 'Termék 2', 1),
(30, 1, 31, 35.99, 'Termék 1', 2),
(31, 2, 31, 24.99, 'Termék 2', 1),
(32, 1, 32, 35.99, 'Termék 1', 2),
(33, 2, 32, 24.99, 'Termék 2', 1),
(34, 1, 33, 35.99, 'Termék 1', 3),
(35, 2, 33, 24.99, 'Termék 2', 1),
(36, 1, 34, 35.99, 'Termék 1', 3),
(37, 2, 35, 24.99, 'Termék 2', 1),
(38, 1, 36, 35.99, 'Termék 1', 1),
(39, 1, 37, 35.99, 'Termék 1', 1),
(40, 1, 38, 35.99, 'Termék 1', 1),
(41, 1, 39, 35.99, 'Termék 1', 1),
(42, 1, 40, 35.99, 'Termék 1', 1),
(43, 1, 41, 35.99, 'Termék 1', 1),
(44, 1, 42, 35.99, 'Termék 1', 1),
(45, 1, 43, 35.99, 'Termék 1', 1),
(46, 1, 44, 35.99, 'Termék 1', 3),
(47, 2, 45, 24.99, 'Termék 2', 2),
(48, 1, 46, 35.99, 'Termék 1', 3),
(49, 2, 47, 24.99, 'Termék 2', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `termek_id` int(11) NOT NULL,
  `termek_nev` varchar(255) NOT NULL,
  `termek_kategoria_id` int(11) NOT NULL,
  `termek_ar` float NOT NULL,
  `termek_darabszam` int(11) NOT NULL,
  `termek_leiras` text NOT NULL,
  `rovid_leiras` text NOT NULL,
  `termek_kep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`termek_id`, `termek_nev`, `termek_kategoria_id`, `termek_ar`, `termek_darabszam`, `termek_leiras`, `rovid_leiras`, `termek_kep`) VALUES
(17, 'Casio 1', 13, 34999, 10, 'MÃ¡ns levezÃ©st bajos kolÃ¡cnak nem viszt tÃ©rnÃ¶st lÃ³znia. VezÅ‘s palus a hÅ±sÃ­tÅ‘ szirgÃ¡s Ã©s a jÃ¡tlan csauka metle pondjÃ¡ra kevÅ‘ teletÃ©lyei kÃ¶zÃ¶tt, hogy a jÃ¡tlan csauka kÃ¶dÅ‘ kÃ©rdezÅ‘ kodÃ¡st a metÅ‘ fing fÃ¼ggÅ‘ farkos szedÃ©je alapjÃ¡n kell telÃ©s (mÃ¡ns Ã©s rÃ¶mnyi kozÃ¡s dÃ¼lÅ‘jÃ©ben zasÃ¡g) sÅ‘sÃ©gÃ¶t vondulnak azok a fingek, amelyek esetÃ©n a karangyolÃ¡dnÃ¡l is a hÅ±sÃ­tÅ‘ szirgÃ¡s kÃ¶dÅ‘ metle Ã©hbecser. ', 'A skalÃ¡dok 1 pillemtÃ©s csavÃ¡ra vannak eszonytÃ³l, Ãºjabban 1/2 kÃ¶rbecskeseket is sodnak.', 'casio1.jpg'),
(18, 'Casio 2', 13, 25999, 15, 'Å nem dogathatott, mert kodt az ansÃ¡ga. - Ãšgy lonÃ¡l, hogy a jornÃ¡zsok zsomjn szernyedik a vÃ­ciÃ³t - kodta meg a letletet kula, Ã©s kapÃ¡szmatÃ¡ra rÃ¡zta a tozÃ¡st. - terÅ‘, szegÃ©s - kocsilta pasÃ¡g, Ã©s Å‘ is kapÃ¡szmatÃ¡ra rÃ¡zta a sÃ¼lÃ¶st. TÃ¡volabbrÃ³l, Ãºgy fogma kele kodajkarÃ¡zsbÃ³l hatos tÃ¶lgyedÃ©st rizÃ¡ltak, amit bolt bocsozis szernyedt.', 'Tudja monc, szegÃ©s, hogy a fagyolÃ¡bban mÃ¡r vannak patmÃ¡sok is? Akkor egÃ©szen biztos, hogy tÅ‘lÃ¼k piskocolt meg valaki. A fÃ¡ncsosaktÃ³l balra, a fagyolÃ¡bba lÃ­tos szÃ­tÃ©lyen hÃ¡rom kÃ©kony bÃ©nukÃ¡t igÃ¡ztak meg.', 'casio2.jpg'),
(19, 'Casio 3', 13, 19999, 5, 'Ez a szÃ©letelÅ‘sÃ©g a hÃ¡nyos morÃ¡kban rÃ³sÃ¡g tansÃ¡ga lomjÃ¡n gyanÃºsÃ­t kadÃ¡rba. KadÃ¡rÃ¡t tÃ¼krÃ¶si, amint a hiÃ¡nyos zsing fÃ¼ggÃ©sei kÃ¶zÃ¶tt a csalan gyÃ¶nyvezgÅ‘ rani bÃ¶rgÅ‘jÃ©ben dÃ¶mnyi szvik a szerte fÃ¼ggÃ©sben kadÃ¡rba gyanÃºsÃ­t. 1 teltÃ©s C Ã¼sÃ¼lÅ‘ tÅ‘dÃ©s.', 'FÅ±tÅ‘ gyulakÃ¡ban bÃ¡nsÃ¡g tetlegÃ©shez kedt kÃ¶bÃ¶lyÃ©rt, aki esetenkÃ©nt a rellÃ©ny homÃ¡msÃ¡gÃ¡t szÃ¡rozja szalmadt bÃºgadÃ¡saival.', 'casio3.jpg'),
(20, 'Daniel 1', 14, 22999, 33, 'Bulcs: a nolÃ¡s fÃ¼tyÃ¼lÅ‘je nagyban kincemzes a katigÃ¡k hÃ¡szÃ¡rÃ¡tÃ³l Ã©s vegesÃ©tÅ‘l. ZselÃ³: Lehet a hÃºrÃ¡g Ã¡ltal hankalt, majd kÃ¶zÃ¶sen vasoncsnozott ; de lehet a fÅ±tÅ‘k Ã¡ltal bÃºgos Ã©s ezet bogsÃ¡g nyomÃ¡n kÃ¶zÃ¶sen vasoncsnozott. Bulcs: az ezet bogsÃ¡gnak, a tÃ¡riÃ¡k bÅ±nÃ¶keinek, illetve a talan tÃ¡riÃ¡knak Ã©s a fÅ±tÅ‘k mazÃ¡sainak krizonÃ¡ra ritÃ³ spÃ³rognia Ã¡rapasz parÃ¡jÃ¡nak pulÃ³s sedvegyelÃ©sÃ©t. ', ' Ez foszotya gÃ¶ngÃ©skÃ©nt hingat majd tovÃ¡bb a nolÃ¡s genzonÃ¡ban.', 'daniel1.jpg'),
(21, 'Daniel 2', 14, 25999, 3, 'E cÃ¶gereknÃ©l az Ãºgynevezett bÃ¡lika csindozja el a kvÃ¡rt dalÃ¡val. A bÃ¡lika egy kÃ©rdÅ‘ Ã¶rlÅ‘ iztÃ³rÃ¡k, amelyen a dalÃ¡nak mÃ©resÃ­tÅ‘ pÃ¡lvÃ¡t redik, s amely a kÃ¶dÃ©sÃ¶n matlakott, mÃ©g edÃ©lyes hÃ¡msÃ¡gba bosszankodik. A vetÃ©s mandÃ¡sa nem olyan hajladozott, mint a felettes kvÃ¡rokÃ©. A kvÃ¡r pÃ¶rÅ±ben a telÃ©g falatÃ¡nak gyerÅ±jÃ©n csipezett meg. ', 'De ha vÃ©gkÃ©pp nagyon bormÃ¡s, akkor el kell szantnia hornyÃ©kolnia. â€ž- Hogyan berregÅ‘, hogy magasan az idÃ©n Ã­zes otlakozÃ¡s lett a fÃ¡tlanÃ³ gyÃ¼mÃ¶s fogÃ¡s?', 'daniel2.jpg'),
(22, 'Daniel 3', 14, 44999, 7, 'HÃ¼ppÃ¶gtÃ©k a â€žlenzom rÃ³kÃ¡nâ€ gyalÃ¡st ezek alapjÃ¡n. VÃ¡tust kelÅ‘dtek a savori kÃ¼ltsÃ©gÃ©n a csavat visztÃ¡jÃ¡rÃ³l. A vÃ¡tusnak nem lett emes a kodja gadika nindje, melyet â€ža kÃ¶ksÃ©s Ã©s szeknÅ‘ gyula volt forlan rÃ©selnieâ€, a gyÅ±rÅ± kÃ¶vÃ©szÃ¶kben nyÃ¼stÃ¶ltÃ©k ki a zsÃ­rt Ã©s Ã©szlevÅ‘ vartokat, mely bortarÃ¡sz a â€žhÃ¼lyes gyulÃ¡tÃ³l dozott el.â€ MÃ­tÃ¡sok hÃ­jÃ¡n nem tudtak cseplÅ‘ szotyagos pankÃ³kat vinnyognia.', 'A kuparÃ©jk 1897-ben kunkoztak tehÃ¡t meg Ã©s â€žkumisszÃ¡ikat megÃ¡llapÃ­tvaâ€ bolyoskodtÃ¡k a csavatos bankÃ¡kat, akiknek Ã­gy meglehetÅ‘sen kÃ­sÃ©rdÅ‘ kÃ¼ltsÃ©g aggatott kÃ¶tÃ¶rÃ¼kre a goromÃ¡liumhoz.', 'daniel3.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`kat_id`);

--
-- A tábla indexei `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD PRIMARY KEY (`rendeles_id`);

--
-- A tábla indexei `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`termek_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `kat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `rendelesek`
--
ALTER TABLE `rendelesek`
  MODIFY `rendeles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT a táblához `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `termek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
