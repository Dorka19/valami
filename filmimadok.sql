-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Nov 22. 18:46
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `filmimadok`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `dijak`
--

CREATE TABLE `dijak` (
  `dijID` int(11) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `dijak`
--

INSERT INTO `dijak` (`dijID`, `nev`) VALUES
(7, 'A dráma kategóriába tartozó legjobb férfi színésznek járó Golden Globe-díj'),
(8, 'A dráma kategóriába tartozó legjobb női színésznőnek járó Golden Globe-díj'),
(18, 'A legjobb eredeti filmbetétdalért járó Golden Globe-díj'),
(17, 'A legjobb eredeti filmzenének járó Golden Globe-díj'),
(3, 'A legjobb férfi főszereplőnek járó Oscar-díj '),
(11, 'A legjobb férfi mellékszereplőnek járó Golden Globe-díj'),
(6, 'A legjobb férfi mellékszereplőnek járó Oscar-díj'),
(16, 'A legjobb filmdrámának járó Golden Globe-díj'),
(1, 'A legjobb filmért járó Oscar-díj'),
(2, 'A legjobb női főszereplőnek járó Oscar-díj '),
(19, 'A legjobb női főszereplőnekjáró Golden Globe-díj'),
(12, 'A legjobb női mellékszereplőnek járó Golden Globe-díj'),
(4, 'A legjobb női mellékszereplőnek járó Oscar-díj'),
(10, 'A legjobb rendezőnek járó Golden Globe-díj'),
(5, 'A legjobb rendezőnek járó Oscar-díj'),
(20, 'A legjobb vígjátéknak járó Golden Globe-díj'),
(15, 'Az Oscar gálán életműdíjat kapott'),
(9, 'Dráma kategóriában a legjobb filmért járó Golden Globe-díj'),
(13, 'Golden Globe-díj'),
(14, 'Oscar-díj');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ertekeles_felhasznalofilm`
--

CREATE TABLE `ertekeles_felhasznalofilm` (
  `kapcsID` int(11) NOT NULL,
  `felhasznaloHIV` int(11) NOT NULL,
  `filmHIV` int(11) NOT NULL,
  `ertekel` enum('1','2','3','4','5') COLLATE utf8_hungarian_ci NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `ertekeles_felhasznalofilm`
--

INSERT INTO `ertekeles_felhasznalofilm` (`kapcsID`, `felhasznaloHIV`, `filmHIV`, `ertekel`) VALUES
(1, 1, 1, '5'),
(2, 2, 1, '4'),
(3, 2, 2, '5'),
(4, 4, 2, '5'),
(5, 5, 3, '5');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ertekeles_felhasznalorendezo`
--

CREATE TABLE `ertekeles_felhasznalorendezo` (
  `kapcsID` int(11) NOT NULL,
  `felhasznaloHIV` int(11) DEFAULT NULL,
  `rendezoHIV` int(11) DEFAULT NULL,
  `ertekel` enum('1','2','3','4','5') COLLATE utf8_hungarian_ci NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `ertekeles_felhasznalorendezo`
--

INSERT INTO `ertekeles_felhasznalorendezo` (`kapcsID`, `felhasznaloHIV`, `rendezoHIV`, `ertekel`) VALUES
(1, 1, 1, '5'),
(2, 3, 2, '5'),
(3, 2, 1, '5'),
(4, 4, 1, '5'),
(5, 5, 3, '5');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ertekeles_felhasznaloszinesz`
--

CREATE TABLE `ertekeles_felhasznaloszinesz` (
  `kapcsID` int(11) NOT NULL,
  `felhasznaloHIV` int(11) DEFAULT NULL,
  `szineszHIV` int(11) DEFAULT NULL,
  `ertekel` enum('1','2','3','4','5') COLLATE utf8_hungarian_ci NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `ertekeles_felhasznaloszinesz`
--

INSERT INTO `ertekeles_felhasznaloszinesz` (`kapcsID`, `felhasznaloHIV`, `szineszHIV`, `ertekel`) VALUES
(1, 1, 1, '5'),
(2, 3, 2, '5'),
(3, 3, 8, '5'),
(4, 3, 1, '5'),
(5, 1, 17, '5'),
(6, 1, 14, '5'),
(7, 1, 15, '5'),
(8, 1, 8, '5'),
(9, 1, 9, '5'),
(10, 4, 12, '5'),
(11, 4, 1, '5'),
(12, 5, 18, '5');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felfuggesztes`
--

CREATE TABLE `felfuggesztes` (
  `felfuggesztesID` int(11) NOT NULL,
  `oka` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `ideje` timestamp NOT NULL DEFAULT current_timestamp(),
  `felfuggesztveKAPCS` int(11) NOT NULL,
  `eddig` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felfuggesztes`
--

INSERT INTO `felfuggesztes` (`felfuggesztesID`, `oka`, `ideje`, `felfuggesztveKAPCS`, `eddig`) VALUES
(1, 'Sértő kommentek írása', '2022-10-19 08:41:36', 1, '2022-10-29 08:41:36');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `felhasznaloID` int(11) NOT NULL,
  `felhasznalo_nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `neme` enum('férfi','nő') COLLATE utf8_hungarian_ci DEFAULT NULL,
  `regisztralas_ideje` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_cim` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `szuletesi_datum` date DEFAULT NULL,
  `jelszo` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `felhasznalo_leirasa` varchar(800) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `orszagaKAPCS` int(11) DEFAULT NULL,
  `profilkepKAPCS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`felhasznaloID`, `felhasznalo_nev`, `neme`, `regisztralas_ideje`, `email_cim`, `admin`, `szuletesi_datum`, `jelszo`, `felhasznalo_leirasa`, `orszagaKAPCS`, `profilkepKAPCS`) VALUES
(1, 'Balint123', 'férfi', '2022-10-10 12:09:42', 'balint123@gmail.com', 0, '2000-01-01', 'Asd123', 'Marvel fanatikus', 20, 1),
(2, 'Tamas1122', 'férfi', '2022-10-19 08:39:05', 'tamas1122@gmail.com', 0, '2003-12-22', 'Asd12345', 'A filmek megszállottja', 1, 2),
(3, 'Dorika99', 'nő', '2022-10-19 08:40:17', 'dorika99@gmail.com', 0, '2002-08-21', 'Asd54321', 'Marvel imádó!', NULL, 3),
(4, 'Tomika77', 'férfi', '2022-10-19 08:41:05', 'tomika@gmail.com', 1, '2001-01-21', 'ASDqwe123', 'Admin', NULL, 2),
(5, 'Nick10', 'férfi', '2022-10-19 10:57:13', 'nick@gmail.com', 0, '1989-10-11', 'QWEdsa321', 'Vigjáték imádó!', NULL, 4),
(6, 'Senki', NULL, '2022-10-24 20:57:13', 'senki@senki.ru', 0, NULL, 'Senkike33', NULL, NULL, NULL),
(8, 'valaki', '', '2022-11-18 13:46:46', 'valaki@valami.hu', 0, '0000-00-00', 'izé', NULL, NULL, NULL),
(36, 'Alma', 'nő', '2022-11-18 15:57:02', 'alma@alma.hu', 0, '0000-00-00', '25a3c1732bded946b3da489b1f26df56b524cbf7', NULL, 18, 3),
(37, 'Piros42', 'nő', '2022-11-18 18:43:37', 'piros@gmail.com', 0, '2022-11-16', '5a20edb559f015580312a9dbd537a6cb4d07fd6a', NULL, 15, 2),
(38, 'AlmaBaba', 'nő', '2022-11-22 12:46:51', 'alma.baba@gmail.com', 0, '2022-11-11', 'c6686a142dec96fecbaecf292d66e373104de030', 'Valami', 17, 4),
(39, 'Mikka', 'nő', '2022-11-22 17:25:38', 'mikka@makka.hu', 0, '2022-11-30', '032e02558236f8b1ceaf6756943cb72eb6d16901', NULL, NULL, NULL),
(40, 'Izé', 'nő', '2022-11-22 17:28:29', 'mikka@makka.hu', 0, '2022-11-30', 'f8ef7508eaa149b39513c254c7282c88e59c251e', NULL, NULL, NULL),
(41, 'Édi', 'nő', '2022-11-22 17:29:30', 'edi@edi.hu', 0, '2022-11-30', '5254631fa4084dbdc64dd0781cf141a182b24653', NULL, NULL, NULL),
(42, 'Korte', 'nő', '2022-11-22 17:30:17', 'korte@korte.com', 0, '2022-11-30', 'f7d4ab3d336e2a85e4f2e134fc162709a8b5de37', NULL, NULL, NULL),
(43, 'Mandarin', 'nő', '2022-11-22 17:40:21', 'mandarin@mandarin.hu', 0, '2022-11-30', 'a612471053af8c1c30b1a76257f6d3c343318ffd', 'Hobbim a filmnézés.', 1, 4),
(44, 'Szilva', 'nő', '2022-11-22 17:43:21', 'szilva@szilva.hu', 0, '2022-11-23', '9b95cdfb159d1e21ca76aacf795d3ffd99d046bc', 'Hobbim a filmnézés.', 1, 5),
(45, 'Leves', 'nő', '2022-11-22 17:45:30', 'leves@leves.com', 0, '2022-11-24', '6e49fbc6a5b61b942ce5cde08efe8e51e15fd1b4', 'Hobbim a filmnézés.', 1, 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `filmek`
--

CREATE TABLE `filmek` (
  `filmID` int(11) NOT NULL,
  `cim` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `kiadasa` date NOT NULL,
  `leiras` varchar(1000) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `filmek`
--

INSERT INTO `filmek` (`filmID`, `cim`, `kiadasa`, `leiras`) VALUES
(1, 'A Vasember', '2008-04-30', 'A Vasember (eredeti cím: Iron Man) 2008-ban bemutatott szuperhősfilm a Marvel Comics Vasember-képregényei alapján, amit Jon Favreau rendezett. A főbb szerepekben Robert Downey Jr., mint a címszereplő Vasember, Gwyneth Paltrow, Terrence Howard és Jeff Bridges látható. A Marvel-moziuniverzum első filmje. Tony Stark, a milliárdos fegyvergyárost terroristák ejtik foglyul Afganisztánban. Rakéta összeszerelésére kényszerítik, azonban Stark a rendelkezésre álló eszközökből páncélzatot épít magának a szökéshez. A fogságban szembesül a saját cége gyártmányai okozta pusztítással. Amerikába visszatérve továbbfejleszti művét, s a technológiára támaszkodó szuperhős, Vasember válik belőle, aki az ellen kezd harcolni, aminek azelőtt maga is vezető képviselője volt.'),
(2, 'Avatar', '2009-12-17', 'Az Avatar 2009-ben bemutatott, 3D-s amerikai sci-fi film James Cameron rendezésében. A film 237 millió dolláros költségvetéssel készült.  Egy lebénult tengerészgyalogost a Pandora holdra küldenek egy különleges „öltözetben”, ahol a kapott parancsok és az egyre inkább otthonának érzett világ védelme között őrlődik.'),
(3, 'Másnaposok', '2009-06-05', 'A Másnaposok 2009-ben bemutatott amerikai filmvígjáték, melyet Todd Phillips rendezett.Egy Las Vegas-i legénybúcsú után a főszereplők nem emlékeznek a városban töltött éjszakájukra és másnap reggel ennek minden következményével szembe kell nézniük.'),
(4, 'Hosszú film', '2000-02-02', 'Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás!'),
(5, 'Hosszú1 film', '2000-02-02', 'Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás!'),
(6, 'Hosszú2 film', '2000-02-02', 'Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás!'),
(7, 'Hosszú3 film', '2000-02-02', 'Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás!'),
(8, 'Hosszú4 film', '2000-02-02', 'Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás!'),
(9, 'Hosszú5 film', '2000-02-02', 'Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás!'),
(10, 'Hosszú6 film', '2000-02-02', 'Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás!'),
(11, 'Hosszú7 film', '2000-02-02', 'Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás!'),
(12, 'Hosszú8 film', '2000-02-02', 'Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás!'),
(13, 'Hosszú9 film', '2000-02-02', 'Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás! Hosszú leírás!');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hozzaszolasok`
--

CREATE TABLE `hozzaszolasok` (
  `hozzaszolasID` int(11) NOT NULL,
  `hozzaszolas` varchar(600) COLLATE utf8_hungarian_ci NOT NULL,
  `hozzaszolas_ideje` timestamp NOT NULL DEFAULT current_timestamp(),
  `hozzaszolfilmKAPCS` int(11) DEFAULT NULL,
  `hozzaszolszineszKAPCS` int(11) DEFAULT NULL,
  `hozzaszolrendezoKAPCS` int(11) DEFAULT NULL,
  `ValaszhozzaszolasraKAPCS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `hozzaszolasok`
--

INSERT INTO `hozzaszolasok` (`hozzaszolasID`, `hozzaszolas`, `hozzaszolas_ideje`, `hozzaszolfilmKAPCS`, `hozzaszolszineszKAPCS`, `hozzaszolrendezoKAPCS`, `ValaszhozzaszolasraKAPCS`) VALUES
(1, 'A kedvenc filmem!', '2022-10-10 12:08:23', 1, NULL, NULL, NULL),
(2, 'Imádom ezt a filmet!', '2022-10-19 08:36:24', 2, NULL, NULL, NULL),
(3, 'A legjobb rendező műve!', '2022-10-19 08:36:48', 2, NULL, NULL, 2),
(4, 'Imádom a Másnaposokat!', '2022-10-19 10:55:09', 3, NULL, NULL, NULL),
(5, 'Bradley Cooper a kedvenc színészem', '2022-10-19 10:55:22', NULL, 18, NULL, NULL),
(6, 'A kedvenc rendezőm!', '2022-10-12 12:08:23', NULL, NULL, 1, NULL),
(7, 'A kedvenc rendezőm!', '2022-10-12 12:08:23', NULL, NULL, 1, 6);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kapta_dijfilmek`
--

CREATE TABLE `kapta_dijfilmek` (
  `kapcsID` int(11) NOT NULL,
  `dijHIV` int(11) NOT NULL,
  `filmHIV` int(11) NOT NULL,
  `miert_kapta` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `mikor_kapta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kapta_dijfilmek`
--

INSERT INTO `kapta_dijfilmek` (`kapcsID`, `dijHIV`, `filmHIV`, `miert_kapta`, `mikor_kapta`) VALUES
(1, 16, 2, 'A legjobb filmdrámáért', '2010-01-17'),
(2, 17, 2, 'A legjobb zenékért', '2010-01-17'),
(3, 18, 2, 'Legjobb eredeti betétdalért', '2010-01-17'),
(4, 20, 3, 'A legjobb vígjátékért járó Golden Globe-díj nyertese', '2010-01-17');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kapta_dijrendezo`
--

CREATE TABLE `kapta_dijrendezo` (
  `kapcsID` int(11) NOT NULL,
  `dijHIV` int(11) NOT NULL,
  `rendezoHIV` int(11) NOT NULL,
  `miert_kapta` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `mikor_kapta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kapta_dijrendezo`
--

INSERT INTO `kapta_dijrendezo` (`kapcsID`, `dijHIV`, `rendezoHIV`, `miert_kapta`, `mikor_kapta`) VALUES
(1, 13, 2, 'Titanic című film rendezéséért', '1998-01-18'),
(2, 14, 2, 'Titanic című film rendezéséért', '1998-01-18'),
(3, 13, 2, 'Az Avatar című film rendezéséért', '2010-01-17'),
(4, 14, 2, 'Az Avatar című film rendezéséért', '2010-01-17');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kapta_dijszinesz`
--

CREATE TABLE `kapta_dijszinesz` (
  `kapcsID` int(11) NOT NULL,
  `dijHIV` int(11) NOT NULL,
  `szineszHIV` int(11) NOT NULL,
  `miert_kapta` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `mikor_kapta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kapta_dijszinesz`
--

INSERT INTO `kapta_dijszinesz` (`kapcsID`, `dijHIV`, `szineszHIV`, `miert_kapta`, `mikor_kapta`) VALUES
(1, 13, 1, 'Legjobb filmes csapat', '1994-01-22'),
(2, 11, 1, 'Ally McBeal című Amerikai televíziós sorozatban nyújtott alakításáért', '2001-01-21'),
(3, 13, 1, 'Sherlock Holmes című filmben lévő alakításáért', '2010-01-17'),
(4, 2, 4, 'Szerelmes Shakespeare című filmben lévő alakításáért', '1999-03-21'),
(5, 8, 4, 'A Szerelmes Shakespeare című filmben lévő alakításáért', '1999-01-24'),
(6, 15, 8, 'Kulturális ikon, akinek lendületes munkája világszerte visszhangra talált.', '2022-03-27'),
(7, 19, 11, 'Gorillák a ködben című filmben lévő alakításáért', '1988-01-23'),
(8, 12, 11, 'A Dolgózó lány című filmben lévő alakításáért', '1988-01-23'),
(9, 15, 16, 'Elismerve erejét és mesterségét, amelyet feledhetetlen filmábrázolásaiért ', '2019-02-25');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoriak`
--

CREATE TABLE `kategoriak` (
  `kategoriaID` int(11) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoriak`
--

INSERT INTO `kategoriak` (`kategoriaID`, `nev`) VALUES
(1, 'akció'),
(6, 'dokumentum'),
(8, 'dráma'),
(4, 'horror'),
(3, 'kaland'),
(5, 'romantikus'),
(2, 'sci-fi'),
(7, 'természet'),
(9, 'vígjáték');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kedvenc_felhasznalofilm`
--

CREATE TABLE `kedvenc_felhasznalofilm` (
  `kapcsID` int(11) NOT NULL,
  `felhasznaloHIV` int(11) NOT NULL,
  `filmHIV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kedvenc_felhasznalofilm`
--

INSERT INTO `kedvenc_felhasznalofilm` (`kapcsID`, `felhasznaloHIV`, `filmHIV`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 2, 2),
(4, 4, 1),
(5, 5, 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kedvenc_felhasznaloszinesz`
--

CREATE TABLE `kedvenc_felhasznaloszinesz` (
  `kapcsID` int(11) NOT NULL,
  `felhasznaloHIV` int(11) DEFAULT NULL,
  `szineszHIV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kedvenc_felhasznaloszinesz`
--

INSERT INTO `kedvenc_felhasznaloszinesz` (`kapcsID`, `felhasznaloHIV`, `szineszHIV`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 4, 4),
(4, 5, 18);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepek`
--

CREATE TABLE `kepek` (
  `kepID` int(11) NOT NULL,
  `linkje` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `kepeiKAPCS` int(11) DEFAULT NULL,
  `profilkepeKAPCS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kepek`
--

INSERT INTO `kepek` (`kepID`, `linkje`, `kepeiKAPCS`, `profilkepeKAPCS`) VALUES
(1, 'kep/RobertDowneyJr.jpg', NULL, NULL),
(2, 'kep/TerrenceHoward.jpg', NULL, NULL),
(3, 'kep/JeffreyBridges.jpg', NULL, NULL),
(4, 'kep/GwynethPaltrow.jpg', NULL, NULL),
(5, 'kep/PaulBettany.jpg', NULL, NULL),
(6, 'kep/RobertClarkGregg.jpg', NULL, NULL),
(7, 'kep/JonathanFavreau.jpg', NULL, NULL),
(8, 'kep/SamuelLJackson.jpg', NULL, NULL),
(9, 'kep/Vasember.jpg', 1, NULL),
(10, 'kep/Avatar.jpg', 2, NULL),
(11, 'kep/SamWorthington.jpg', NULL, NULL),
(12, 'kep/ZoeSaldana.jpg', NULL, NULL),
(13, 'kep/SigourneyWeaver.jpg', NULL, NULL),
(14, 'kep/StephenLang.jpg', NULL, NULL),
(15, 'kep/MichelleRodriguez.jpg', NULL, NULL),
(16, 'kep/GiovanniRibisi.jpg', NULL, NULL),
(17, 'kep/CarolChristineHilariaPounder.jpg', NULL, NULL),
(18, 'kep/WesStudi.jpg', NULL, NULL),
(19, 'kep/JoelDavidMoore.jpg', NULL, NULL),
(20, 'kep/JamesCameron.jpg', NULL, NULL),
(21, 'kep/JakeSully.jpg', 2, NULL),
(22, 'kep/Neytiri.jpg', 2, NULL),
(23, 'kep/DrGraceAugustine.jpg', 2, NULL),
(24, 'kep/Quaritchezredes.jpg', 2, NULL),
(25, 'kep/TrudyChacon.jpg', 2, NULL),
(26, 'kep/ParkerSelfridge.jpg', 2, NULL),
(27, 'kep/Moat.jpg', 2, NULL),
(28, 'kep/Eytukan.jpg', 2, NULL),
(29, 'kep/DrNormSpellman.jpg', 2, NULL),
(30, 'kep/TonyStark.jpg', NULL, NULL),
(31, 'kep/JamesRhodeyRhodes.jpg', NULL, NULL),
(32, 'kep/VirginiaPepperPotts.jpg', NULL, NULL),
(33, 'kep/HappyHogan.jpg', NULL, NULL),
(34, 'kep/NickFury.jpg', NULL, NULL),
(35, 'kep/Jarvis.jpg', NULL, NULL),
(36, 'kep/ObadiahStane.jpg', NULL, NULL),
(37, 'kep/PhilCoulson.jpg', NULL, NULL),
(38, 'kep/Masnaposok.jpg', 3, NULL),
(39, 'kep/BradleyCooper.jpg', NULL, NULL),
(40, 'kep/EdHelms.jpg', NULL, NULL),
(41, 'kep/ZachGalifianakis.jpg', NULL, NULL),
(42, 'kep/JustinBartha.jpg', NULL, NULL),
(43, 'kep/KenJeong.jpg', NULL, NULL),
(44, 'kep/ToddPhillips.jpg', NULL, NULL),
(45, 'kep/PhilWenneck.jpg', NULL, NULL),
(46, 'kep/StuPrice.jpg', NULL, NULL),
(47, 'kep/AlanGarner.jpg', NULL, NULL),
(48, 'kep/DougBillings.jpg', NULL, NULL),
(49, 'kep/LeslieChow.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepenrendezo_keprendezo`
--

CREATE TABLE `kepenrendezo_keprendezo` (
  `kapcsID` int(11) NOT NULL,
  `kepHIV` int(11) NOT NULL,
  `rendezoHIV` int(11) NOT NULL,
  `profilkepe` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepenszinesz_kepszinesz`
--

CREATE TABLE `kepenszinesz_kepszinesz` (
  `kapcsID` int(11) NOT NULL,
  `kepHIV` int(11) NOT NULL,
  `szineszHIV` int(11) NOT NULL,
  `profilkepe` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megnezendo_felhasznalofilm`
--

CREATE TABLE `megnezendo_felhasznalofilm` (
  `kapcsID` int(11) NOT NULL,
  `felhasznaloHIV` int(11) DEFAULT NULL,
  `filmHIV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `megnezendo_felhasznalofilm`
--

INSERT INTO `megnezendo_felhasznalofilm` (`kapcsID`, `felhasznaloHIV`, `filmHIV`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 4, 1),
(4, 4, 2),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megtalalhatobenne_filmzene`
--

CREATE TABLE `megtalalhatobenne_filmzene` (
  `kapcsID` int(11) NOT NULL,
  `filmHIV` int(11) NOT NULL,
  `zeneHIV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `megtalalhatobenne_filmzene`
--

INSERT INTO `megtalalhatobenne_filmzene` (`kapcsID`, `filmHIV`, `zeneHIV`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 7),
(9, 2, 8),
(10, 2, 9),
(11, 2, 10),
(12, 2, 11),
(13, 2, 12),
(14, 2, 13),
(15, 2, 14),
(16, 2, 15),
(17, 3, 16),
(18, 3, 17),
(19, 3, 18),
(20, 3, 19),
(21, 3, 20),
(22, 3, 21),
(23, 3, 22),
(24, 3, 23),
(25, 3, 24),
(26, 3, 25),
(27, 3, 26),
(28, 3, 27),
(29, 3, 28),
(30, 3, 29),
(31, 3, 30),
(32, 3, 31),
(33, 3, 32),
(34, 3, 33),
(35, 3, 34),
(36, 3, 34),
(37, 3, 35),
(38, 3, 36);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `nemzetisegek`
--

CREATE TABLE `nemzetisegek` (
  `nemzetisegID` int(11) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `alfa2eskodos` varchar(10) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `nemzetisegek`
--

INSERT INTO `nemzetisegek` (`nemzetisegID`, `nev`, `alfa2eskodos`) VALUES
(1, 'Andorrai', 'ad'),
(2, 'Egyesült Arab Emírségeki', 'ae'),
(3, 'Afganisztáni', 'af'),
(4, 'Antigua és Barbudai', 'ag'),
(5, 'Anguillai', 'ai'),
(6, 'Albániai', 'al'),
(7, 'Örményországi', 'am'),
(8, 'Angolai', 'ao'),
(9, 'Antarktiszi', 'aq'),
(10, 'Argentínai', 'ar'),
(11, 'Amerikai Szamoai', 'as'),
(12, 'Ausztriai', 'at'),
(13, 'Ausztráliai', 'au'),
(14, 'Arubai', 'aw'),
(15, 'Ålandi', 'ax'),
(16, 'Azerbajdzsáni', 'az'),
(17, 'Bosznia-Hercegovinai', 'ba'),
(18, 'Barbadosi', 'bb'),
(19, 'Bangladesi', 'bd'),
(20, 'Belgiumi', 'be'),
(21, 'Burkina Fasoi', 'bf'),
(22, 'Bulgáriai', 'bg'),
(23, 'Bahreini', 'bh'),
(24, 'Burundi', 'bi'),
(25, 'Benini', 'bj'),
(26, 'Saint-Barthélemyi', 'bl'),
(27, 'Bermudai', 'bm'),
(28, 'Brunei', 'bn'),
(29, 'Bolíviai', 'bo'),
(30, 'Karibi Hollandiai', 'bq'),
(31, 'Brazíliai', 'br'),
(32, 'Bahama-szigeteki', 'bs'),
(33, 'Bhutáni', 'bt'),
(34, 'NorvégiaBouvet-szigeti', 'bv'),
(35, 'Botswanai', 'bw'),
(36, 'Fehéroroszországi', 'by'),
(37, 'Belizei', 'bz'),
(38, 'Kanadai', 'ca'),
(39, 'Kókusz (Keeling)-szigeteki', 'cc'),
(40, 'Kongói Demokratikus Köztársasági', 'cd'),
(41, 'Közép-Afrikai', 'cf'),
(42, 'Kongói Köztársasági', 'cg'),
(43, 'Svájci', 'ch'),
(44, 'Elefántcsontparti', 'ci'),
(45, 'Cook-szigeteki', 'ck'),
(46, 'Chilei', 'cl'),
(47, 'Kameruni', 'cm'),
(48, 'Kínai', 'cn'),
(49, 'Kolumbiai', 'co'),
(50, 'Costa Ricai', 'cr'),
(51, 'Kubai', 'cu'),
(52, 'Zöld-foki Köztársasági', 'cv'),
(53, 'Curaçaoi', 'cw'),
(54, 'Karácsony-szigeti', 'cx'),
(55, 'Ciprusi', 'cy'),
(56, 'Csehországi', 'cz'),
(57, 'Németországi', 'de'),
(58, 'Dzsibuti', 'dj'),
(59, 'Dániai', 'dk'),
(60, 'Dominikai Közösségi', 'dm'),
(61, 'Dominikai Köztársasági', 'do'),
(62, 'Algériai', 'dz'),
(63, 'Ecuadori', 'ec'),
(64, 'Észtországi', 'ee'),
(65, 'Egyiptomi', 'eg'),
(66, 'Nyugat-Szaharai', 'eh'),
(67, 'Eritreai', 'er'),
(68, 'Flag of Spain.svgSpanyolországi', 'es'),
(69, 'Etiópiai', 'et'),
(70, 'Finnországi', 'fi'),
(71, 'Fidzsi', 'fj'),
(72, 'Falkland-szigeteki', 'fk'),
(73, 'Mikronéziai', 'fm'),
(74, 'Feröeri', 'fo'),
(75, 'Franciaországi', 'fr'),
(76, 'Gaboni', 'ga'),
(77, 'Egyesült Királysági', 'gb'),
(78, 'Grenadai', 'gd'),
(79, 'Grúziai', 'ge'),
(80, 'Francia GuyanaFrancia Guyanai', 'gf'),
(81, 'Guernsey Bailiffségi', 'gg'),
(82, 'Ghánai', 'gh'),
(83, 'Gibraltári', 'gi'),
(84, 'Grönlandi', 'gl'),
(85, 'Gambiai', 'gm'),
(86, 'Guineai', 'gn'),
(87, 'GuadeloupeGuadeloupei', 'gp'),
(88, 'Egyenlítői-Guineai', 'gq'),
(89, 'Görögországi', 'gr'),
(90, 'Déli-Georgia és Déli-Sandwich-szigeteki', 'gs'),
(91, 'Guatemalai', 'gt'),
(92, 'Guami', 'gu'),
(93, 'Bissau-Guineai', 'gw'),
(94, 'Guyanai', 'gy'),
(95, 'Hongkongi', 'hk'),
(96, 'Heard-sziget és McDonald-szigeteki', 'hm'),
(97, 'Hondurasi', 'hn'),
(98, 'Horvátországi', 'hr'),
(99, 'Haiti', 'ht'),
(100, 'Magyarországi', 'hu'),
(101, 'Indonéziai', 'id'),
(102, 'Írországi', 'ie'),
(103, 'Izraeli', 'il'),
(104, 'Man-szigeti', 'im'),
(105, 'Indiai', 'in'),
(106, 'Brit Indiai-óceáni Területi', 'io'),
(107, 'Iraki', 'iq'),
(108, 'Iráni', 'ir'),
(109, 'Izlandi', 'is'),
(110, 'Olaszországi', 'it'),
(111, 'Jersey Bailiffségi', 'je'),
(112, 'Jamaicai', 'jm'),
(113, 'Jordániai', 'jo'),
(114, 'Japáni', 'jp'),
(115, 'Kenyai', 'ke'),
(116, 'Kirgizisztáni', 'kg'),
(117, 'Kambodzsai', 'kh'),
(118, 'Kiribati', 'ki'),
(119, 'Comore-szigeteki', 'km'),
(120, 'Saint Kitts és Nevisi', 'kn'),
(121, 'Észak-Koreai', 'kp'),
(122, 'Dél-Koreai', 'kr'),
(123, 'Kuvaiti', 'kw'),
(124, 'Kajmán-szigeteki', 'ky'),
(125, 'Kazahsztáni', 'kz'),
(126, 'Laoszi', 'la'),
(127, 'Libanoni', 'lb'),
(128, 'Saint Luciai', 'lc'),
(129, 'Liechtensteini', 'li'),
(130, 'Srí Lankai', 'lk'),
(131, 'Libériai', 'lr'),
(132, 'Lesothoi', 'ls'),
(133, 'Litvániai', 'lt'),
(134, 'Luxemburgi', 'lu'),
(135, 'Lettországi', 'lv'),
(136, 'Líbiai', 'ly'),
(137, 'Marokkói', 'ma'),
(138, 'Monacoi', 'mc'),
(139, 'Moldovai', 'md'),
(140, 'Montenegrói', 'me'),
(141, 'Saint-Martini', 'mf'),
(142, 'Madagaszkári', 'mg'),
(143, 'Marshall-szigeteki', 'mh'),
(144, 'Észak-Macedóniai', 'mk'),
(145, 'Mali', 'ml'),
(146, 'Mianmari', 'mm'),
(147, 'Mongóliai', 'mn'),
(148, 'Makaói', 'mo'),
(149, 'Északi-Mariana-szigeteki', 'mp'),
(150, 'MartiniqueMartiniquei', 'mq'),
(151, 'Mauritániai', 'mr'),
(152, 'Montserrati', 'ms'),
(153, 'Máltai', 'mt'),
(154, 'Mauritiusi', 'mu'),
(155, 'Maldív-szigeteki', 'mv'),
(156, 'Malawi', 'mw'),
(157, 'Mexikói', 'mx'),
(158, 'Malajziai', 'my'),
(159, 'Mozambiki', 'mz'),
(160, 'Namíbiai', 'na'),
(161, 'Új-Kaledóniai', 'nc'),
(162, 'Nigeri', 'ne'),
(163, 'Norfolk-szigeti', 'nf'),
(164, 'Nigériai', 'ng'),
(165, 'Nicaraguai', 'ni'),
(166, 'Hollandiai', 'nl'),
(167, 'Norvégiai', 'no'),
(168, 'Nepáli', 'np'),
(169, 'Naurui', 'nr'),
(170, 'Niuei', 'nu'),
(171, 'Új-Zélandi', 'nz'),
(172, 'Ománi', 'om'),
(173, 'Panamai', 'pa'),
(174, 'Perui', 'pe'),
(175, 'Francia Polinéziai', 'pf'),
(176, 'Pápua Új-Guineai', 'pg'),
(177, 'Fülöp-szigeteki', 'ph'),
(178, 'Pakisztáni', 'pk'),
(179, 'Lengyelországi', 'pl'),
(180, 'Saint-Pierre és MiquelonSaint-Pierre és Miqueloni', 'pm'),
(181, 'Pitcairn-szigeteki', 'pn'),
(182, 'Puerto Ricoi', 'pr'),
(183, 'Palesztinai', 'ps'),
(184, 'Portugáliai', 'pt'),
(185, 'Palaui', 'pw'),
(186, 'Paraguayi', 'py'),
(187, 'Katari', 'qa'),
(188, 'Réunioni', 're'),
(189, 'Romániai', 'ro'),
(190, 'Szerbiai', 'rs'),
(191, 'Oroszországi', 'ru'),
(192, 'Ruandai', 'rw'),
(193, 'Szaúd-Arábiai', 'sa'),
(194, 'Salamon-szigeteki', 'sb'),
(195, 'Seychelle-szigeteki', 'sc'),
(196, 'Szudáni', 'sd'),
(197, 'Svédországi', 'se'),
(198, 'Szingapúri', 'sg'),
(199, 'Szent Ilonai', 'sh'),
(200, 'Szlovéniai', 'si'),
(201, 'NorvégiaSpitzbergákésJan Mayen-szigeti', 'sj'),
(202, 'Szlovákiai', 'sk'),
(203, 'Sierra Leonei', 'sl'),
(204, 'San Marinoi', 'sm'),
(205, 'Szenegáli', 'sn'),
(206, 'Szomáliai', 'so'),
(207, 'Surinamei', 'sr'),
(208, 'Dél-Szudáni', 'ss'),
(209, 'São Tomé és Príncipei', 'st'),
(210, 'Salvadori', 'sv'),
(211, 'Sint Maarteni', 'sx'),
(212, 'Szíriai', 'sy'),
(213, 'Szváziföldi', 'sz'),
(214, 'Turks- és Caicos-szigeteki', 'tc'),
(215, 'Csádi', 'td'),
(216, 'Francia déli és antarktiszi területeki', 'tf'),
(217, 'Togoi', 'tg'),
(218, 'Thaiföldi', 'th'),
(219, 'Tádzsikisztáni', 'tj'),
(220, 'Tokelau-szigeteki', 'tk'),
(221, 'Kelet-Timori', 'tl'),
(222, 'Türkmenisztáni', 'tm'),
(223, 'Tunéziai', 'tn'),
(224, 'Tongai', 'to'),
(225, 'Törökországi', 'tr'),
(226, 'Trinidad és Tobagoi', 'tt'),
(227, 'Tuvalui', 'tv'),
(228, 'Tajvani', 'tw'),
(229, 'Tanzániai', 'tz'),
(230, 'Ukrajnai', 'ua'),
(231, 'Ugandai', 'ug'),
(232, 'USAAmerikai Csendes-óceáni szigeteki', 'um'),
(233, 'Amerikai Egyesült Államoki', 'us'),
(234, 'Uruguayi', 'uy'),
(235, 'Üzbegisztáni', 'uz'),
(236, 'Vatikáni', 'va'),
(237, 'Saint Vincent és a Grenadine-szigeteki', 'vc'),
(238, 'Venezuelai', 've'),
(239, 'Brit Virgin-szigeteki', 'vg'),
(240, 'Amerikai Virgin-szigeteki', 'vi'),
(241, 'Vietnámi', 'vn'),
(242, 'Vanuatui', 'vu'),
(243, 'Wallis és FutunaWallis és Futunai', 'wf'),
(244, 'Szamoai', 'ws'),
(245, 'Koszovói', 'xk'),
(246, 'Jemeni', 'ye'),
(247, 'MayotteMayottei', 'yt'),
(248, 'Dél-afrikai Köztársasági', 'za'),
(249, 'Zambiai', 'zm'),
(250, 'Zimbabwei', 'zw'),
(251, 'Angol', 'gb-eng'),
(252, 'Észak-Írországi', 'gb-nir'),
(253, 'Skót', 'gb-sct'),
(254, 'Walesi', 'gb-wls');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `nemzetisege_nemzetisegrendezo`
--

CREATE TABLE `nemzetisege_nemzetisegrendezo` (
  `kapcsID` int(11) NOT NULL,
  `nemzetisegHIV` int(11) NOT NULL,
  `rendezoHIV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `nemzetisege_nemzetisegszinesz`
--

CREATE TABLE `nemzetisege_nemzetisegszinesz` (
  `kapcsID` int(11) NOT NULL,
  `nemzetisegHIV` int(11) NOT NULL,
  `szineszHIV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profilkepek`
--

CREATE TABLE `profilkepek` (
  `profilkepID` int(11) NOT NULL,
  `linkje` varchar(200) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `profilkepek`
--

INSERT INTO `profilkepek` (`profilkepID`, `linkje`) VALUES
(1, 'kep/profilkep1.jpg'),
(2, 'kep/profilkep2.jpg'),
(3, 'kep/profilkep3.jpg'),
(4, 'kep/profilkep4.jpg'),
(5, 'kep/profilkep5.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendezok`
--

CREATE TABLE `rendezok` (
  `rendezoID` int(11) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `szuletesi_datum` date NOT NULL,
  `szuletesi_hely` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `szuletesi_orszag` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `rendezok`
--

INSERT INTO `rendezok` (`rendezoID`, `nev`, `szuletesi_datum`, `szuletesi_hely`, `szuletesi_orszag`) VALUES
(1, 'Jonathan Favreau', '1966-10-19', 'New York', 'Amerikai Egyesült Államok'),
(2, 'James Cameron', '1954-08-16', 'Kapuskasing', 'Kanada'),
(3, 'Todd Phillips', '1970-12-20', 'Brooklyn', 'Amerikai Egyesült Államok');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szerepbelikep_kepszerepel`
--

CREATE TABLE `szerepbelikep_kepszerepel` (
  `kapcsID` int(11) NOT NULL,
  `kepHIV` int(11) NOT NULL,
  `szerepelHIV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szerepek`
--

CREATE TABLE `szerepek` (
  `szerepID` int(11) NOT NULL,
  `szerep` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `foszerepben` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szerepek`
--

INSERT INTO `szerepek` (`szerepID`, `szerep`, `foszerepben`) VALUES
(1, 'Tony Stark', 1),
(2, 'James „Rhodey” Rhodes', 0),
(3, 'Virginia „Pepper” Potts', 0),
(4, 'Happy Hogan', 0),
(5, 'Nick Fury', 0),
(6, 'JARVIS', 0),
(7, 'Obadiah Stane', 0),
(8, 'Phil Coulson', 0),
(9, 'Jake Sully', 1),
(10, 'Neytiri', 0),
(11, 'Dr. Grace Augustine', 0),
(12, 'Quaritch ezredes', 0),
(13, 'Trudy Chacon', 0),
(14, 'Parker Selfridge', 0),
(15, 'Mo’at', 0),
(16, 'Eytukan', 0),
(17, 'Dr. Norm Spellman', 0),
(18, 'Phil Wenneck', 1),
(19, 'Stu Price', 1),
(20, 'Alan Garner', 1),
(21, 'Doug Billings', 1),
(22, 'Leslie Chow', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szerepel`
--

CREATE TABLE `szerepel` (
  `szerepelID` int(11) NOT NULL,
  `szerepbenKapcs` int(11) NOT NULL,
  `filmbenszerepelKapcs` int(11) NOT NULL,
  `jatsszaKapcs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szerepel`
--

INSERT INTO `szerepel` (`szerepelID`, `szerepbenKapcs`, `filmbenszerepelKapcs`, `jatsszaKapcs`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 7, 1, 3),
(4, 3, 1, 4),
(5, 6, 1, 5),
(6, 8, 1, 6),
(7, 4, 1, 7),
(8, 5, 1, 8),
(9, 9, 2, 9),
(10, 10, 2, 10),
(11, 11, 2, 11),
(12, 12, 2, 12),
(13, 13, 2, 13),
(14, 14, 2, 14),
(15, 15, 2, 15),
(16, 16, 2, 16),
(17, 17, 2, 17),
(18, 18, 3, 18),
(19, 19, 3, 19),
(20, 20, 3, 20),
(21, 21, 3, 21),
(22, 22, 3, 22);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szineszek`
--

CREATE TABLE `szineszek` (
  `szineszID` int(11) NOT NULL,
  `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `szuletesi_datum` date NOT NULL,
  `szuletesi_hely` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `szuletesi_orszag` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szineszek`
--

INSERT INTO `szineszek` (`szineszID`, `nev`, `szuletesi_datum`, `szuletesi_hely`, `szuletesi_orszag`) VALUES
(1, 'Robert Downey Jr.', '1965-04-04', 'Manhattan', 'Amerikai Egyesült Államok'),
(2, 'Terrence Dashon Howard', '1969-03-11', 'Chicago', 'Amerikai Egyesült Államok'),
(3, 'Jeffrey Leon Bridges', '1949-12-04', 'Los Angeles', 'Amerikai Egyesült Államok'),
(4, 'Gwyneth Kate Paltrow', '1972-09-27', 'Los Angeles', 'Amerikai Egyesült Államok'),
(5, 'Paul Bettany', '1971-05-27', 'Shepherds\'s Bush', 'England'),
(6, 'Robert Clark Gregg', '1962-04-02', 'Boston', 'Amerikai Egyesült Államok'),
(7, 'Jonathan Favreau', '1966-10-19', 'New York', 'Amerikai Egyesült Államok'),
(8, 'Samuel L. Jackson', '1948-12-21', 'Washington D. C.', 'Amerikai Egyesült Államok'),
(9, 'Sam Worthington', '1976-08-02', 'Godalming', 'England'),
(10, 'Zoë Saldana', '0000-00-00', 'Passaic', 'Amerikai Egyesült Államok'),
(11, 'Sigourney Weaver', '1949-10-08', 'New York', 'Amerikai Egyesült Államok'),
(12, 'Stephen Lang', '1952-07-11', 'New York', 'Amerikai Egyesült Államok'),
(13, 'Michelle Rodriguez', '1978-07-12', 'San Antonio', 'Amerikai Egyesült Államok'),
(14, 'Giovanni Ribisi', '1974-12-17', 'Los Angeles', 'Amerikai Egyesült Államok'),
(15, 'Carol Christine Hilaria Pounder', '1952-12-25', 'Georgetown', 'Guyana'),
(16, 'Wes Studi', '1947-12-17', 'Tahlequah', 'Amerikai Egyesült Államok'),
(17, 'Joel David Moore', '1977-09-25', 'Portland', 'Amerikai Egyesült Államok'),
(18, 'Bradley Cooper', '1975-01-05', 'Philadelphia', 'Amerikai Egyesült Államok'),
(19, 'Ed Helms', '1974-01-24', 'Atlanta', 'Amerikai Egyesült Államok'),
(20, 'Zach Galifianakis', '1969-10-01', 'Wilkesboro', 'Amerikai Egyesült Államok'),
(21, 'Justin Bartha', '1978-07-21', 'Fort Lauderdale', 'Amerikai Egyesült Államok'),
(22, 'Ken Jeong', '1969-07-13', 'Detroit', 'Amerikai Egyesült Államok');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tartozik_filmkategoria`
--

CREATE TABLE `tartozik_filmkategoria` (
  `kapcsID` int(11) NOT NULL,
  `filmHIV` int(11) NOT NULL,
  `kategoriaHIV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `tartozik_filmkategoria`
--

INSERT INTO `tartozik_filmkategoria` (`kapcsID`, `filmHIV`, `kategoriaHIV`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 2),
(4, 2, 2),
(5, 2, 3),
(6, 2, 1),
(7, 3, 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tetszikeles_felhasznalohozzaszolas`
--

CREATE TABLE `tetszikeles_felhasznalohozzaszolas` (
  `kapcsID` int(11) NOT NULL,
  `felhasznaloHIV` int(11) NOT NULL,
  `hozzaszolasHIV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `tetszikeles_felhasznalohozzaszolas`
--

INSERT INTO `tetszikeles_felhasznalohozzaszolas` (`kapcsID`, `felhasznaloHIV`, `hozzaszolasHIV`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 2, 2),
(4, 4, 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `zenek`
--

CREATE TABLE `zenek` (
  `zeneID` int(11) NOT NULL,
  `cim` varchar(200) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `zenek`
--

INSERT INTO `zenek` (`zeneID`, `cim`) VALUES
(6, '\"You Don\'t Dream In Cryo...\"'),
(10, 'Becoming One of \"The People\" Becoming One With Neytiri'),
(19, 'Can\'t Tell Me Nothing'),
(35, 'Candy Shop'),
(11, 'Climbing Up \"Iknimaya – The Path To Heaven\"'),
(1, 'Driving with the Top Down'),
(34, 'Fame'),
(23, 'Fever'),
(28, 'Grandma\'s Hands'),
(31, 'Iko Iko'),
(27, 'In the Air Tonight'),
(2, 'Iron Man (2008 version)'),
(16, 'It\'s Now or Never'),
(7, 'Jake Enters His Avatar World'),
(12, 'Jake\'s First Flight'),
(30, 'Joker & The Thief'),
(21, 'Live Your Life'),
(5, 'Mark I'),
(3, 'Merchant of Death'),
(8, 'Pure Spirits of the Forest'),
(14, 'Quaritch'),
(29, 'Rhythm and Booze'),
(32, 'Ride the Sky II'),
(36, 'Right Round'),
(13, 'Scorched Earth'),
(26, 'Stu\'s Song'),
(18, 'Take It Off'),
(9, 'The Bioluminiscence of the Night'),
(15, 'The Destruction of \"Hometree\"'),
(17, 'Thirteen'),
(33, 'Three Best Friends'),
(4, 'Trinkets to Kill a Prince'),
(25, 'Wedding Bells (Are Breaking Up That Old Gang of Mine)'),
(24, 'What Do You Say?'),
(20, 'Who Let the Dogs Out'),
(22, 'Yeah!');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `dijak`
--
ALTER TABLE `dijak`
  ADD PRIMARY KEY (`dijID`),
  ADD UNIQUE KEY `nev` (`nev`);

--
-- A tábla indexei `ertekeles_felhasznalofilm`
--
ALTER TABLE `ertekeles_felhasznalofilm`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `felhasznaloHIV` (`felhasznaloHIV`),
  ADD KEY `filmHIV` (`filmHIV`);

--
-- A tábla indexei `ertekeles_felhasznalorendezo`
--
ALTER TABLE `ertekeles_felhasznalorendezo`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `felhasznaloHIV` (`felhasznaloHIV`),
  ADD KEY `rendezoHIV` (`rendezoHIV`);

--
-- A tábla indexei `ertekeles_felhasznaloszinesz`
--
ALTER TABLE `ertekeles_felhasznaloszinesz`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `felhasznaloHIV` (`felhasznaloHIV`),
  ADD KEY `szineszHIV` (`szineszHIV`);

--
-- A tábla indexei `felfuggesztes`
--
ALTER TABLE `felfuggesztes`
  ADD PRIMARY KEY (`felfuggesztesID`),
  ADD KEY `felfuggesztveKAPCS` (`felfuggesztveKAPCS`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`felhasznaloID`),
  ADD UNIQUE KEY `felhasznalo_nev` (`felhasznalo_nev`),
  ADD KEY `orszagaKAPCS` (`orszagaKAPCS`),
  ADD KEY `profilkepKAPCS` (`profilkepKAPCS`);

--
-- A tábla indexei `filmek`
--
ALTER TABLE `filmek`
  ADD PRIMARY KEY (`filmID`);

--
-- A tábla indexei `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  ADD PRIMARY KEY (`hozzaszolasID`),
  ADD KEY `hozzaszolfilmKAPCS` (`hozzaszolfilmKAPCS`),
  ADD KEY `hozzaszolszineszKAPCS` (`hozzaszolszineszKAPCS`),
  ADD KEY `hozzaszolrendezoKAPCS` (`hozzaszolrendezoKAPCS`),
  ADD KEY `ValaszhozzaszolasraKAPCS` (`ValaszhozzaszolasraKAPCS`);

--
-- A tábla indexei `kapta_dijfilmek`
--
ALTER TABLE `kapta_dijfilmek`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `dijHIV` (`dijHIV`),
  ADD KEY `filmHIV` (`filmHIV`);

--
-- A tábla indexei `kapta_dijrendezo`
--
ALTER TABLE `kapta_dijrendezo`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `dijHIV` (`dijHIV`),
  ADD KEY `rendezoHIV` (`rendezoHIV`);

--
-- A tábla indexei `kapta_dijszinesz`
--
ALTER TABLE `kapta_dijszinesz`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `dijHIV` (`dijHIV`),
  ADD KEY `szineszHIV` (`szineszHIV`);

--
-- A tábla indexei `kategoriak`
--
ALTER TABLE `kategoriak`
  ADD PRIMARY KEY (`kategoriaID`),
  ADD UNIQUE KEY `nev` (`nev`);

--
-- A tábla indexei `kedvenc_felhasznalofilm`
--
ALTER TABLE `kedvenc_felhasznalofilm`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `felhasznaloHIV` (`felhasznaloHIV`),
  ADD KEY `filmHIV` (`filmHIV`);

--
-- A tábla indexei `kedvenc_felhasznaloszinesz`
--
ALTER TABLE `kedvenc_felhasznaloszinesz`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `felhasznaloHIV` (`felhasznaloHIV`),
  ADD KEY `szineszHIV` (`szineszHIV`);

--
-- A tábla indexei `kepek`
--
ALTER TABLE `kepek`
  ADD PRIMARY KEY (`kepID`),
  ADD UNIQUE KEY `linkje` (`linkje`),
  ADD UNIQUE KEY `profilkepeKAPCS` (`profilkepeKAPCS`),
  ADD KEY `kepeiKAPCS` (`kepeiKAPCS`);

--
-- A tábla indexei `kepenrendezo_keprendezo`
--
ALTER TABLE `kepenrendezo_keprendezo`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `kepHIV` (`kepHIV`),
  ADD KEY `rendezoHIV` (`rendezoHIV`);

--
-- A tábla indexei `kepenszinesz_kepszinesz`
--
ALTER TABLE `kepenszinesz_kepszinesz`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `kepHIV` (`kepHIV`),
  ADD KEY `szineszHIV` (`szineszHIV`);

--
-- A tábla indexei `megnezendo_felhasznalofilm`
--
ALTER TABLE `megnezendo_felhasznalofilm`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `felhasznaloHIV` (`felhasznaloHIV`),
  ADD KEY `filmHIV` (`filmHIV`);

--
-- A tábla indexei `megtalalhatobenne_filmzene`
--
ALTER TABLE `megtalalhatobenne_filmzene`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `filmHIV` (`filmHIV`),
  ADD KEY `zeneHIV` (`zeneHIV`);

--
-- A tábla indexei `nemzetisegek`
--
ALTER TABLE `nemzetisegek`
  ADD PRIMARY KEY (`nemzetisegID`),
  ADD UNIQUE KEY `alfa2eskodos` (`alfa2eskodos`);

--
-- A tábla indexei `nemzetisege_nemzetisegrendezo`
--
ALTER TABLE `nemzetisege_nemzetisegrendezo`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `nemzetisegHIV` (`nemzetisegHIV`),
  ADD KEY `rendezoHIV` (`rendezoHIV`);

--
-- A tábla indexei `nemzetisege_nemzetisegszinesz`
--
ALTER TABLE `nemzetisege_nemzetisegszinesz`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `nemzetisegHIV` (`nemzetisegHIV`),
  ADD KEY `szineszHIV` (`szineszHIV`);

--
-- A tábla indexei `profilkepek`
--
ALTER TABLE `profilkepek`
  ADD PRIMARY KEY (`profilkepID`),
  ADD UNIQUE KEY `linkje` (`linkje`);

--
-- A tábla indexei `rendezok`
--
ALTER TABLE `rendezok`
  ADD PRIMARY KEY (`rendezoID`);

--
-- A tábla indexei `szerepbelikep_kepszerepel`
--
ALTER TABLE `szerepbelikep_kepszerepel`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `kepHIV` (`kepHIV`),
  ADD KEY `szerepelHIV` (`szerepelHIV`);

--
-- A tábla indexei `szerepek`
--
ALTER TABLE `szerepek`
  ADD PRIMARY KEY (`szerepID`);

--
-- A tábla indexei `szerepel`
--
ALTER TABLE `szerepel`
  ADD PRIMARY KEY (`szerepelID`),
  ADD KEY `szerepbenKapcs` (`szerepbenKapcs`),
  ADD KEY `filmbenszerepelKapcs` (`filmbenszerepelKapcs`),
  ADD KEY `jatsszaKapcs` (`jatsszaKapcs`);

--
-- A tábla indexei `szineszek`
--
ALTER TABLE `szineszek`
  ADD PRIMARY KEY (`szineszID`);

--
-- A tábla indexei `tartozik_filmkategoria`
--
ALTER TABLE `tartozik_filmkategoria`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `filmHIV` (`filmHIV`),
  ADD KEY `kategoriaHIV` (`kategoriaHIV`);

--
-- A tábla indexei `tetszikeles_felhasznalohozzaszolas`
--
ALTER TABLE `tetszikeles_felhasznalohozzaszolas`
  ADD PRIMARY KEY (`kapcsID`),
  ADD KEY `felhasznaloHIV` (`felhasznaloHIV`),
  ADD KEY `hozzaszolasHIV` (`hozzaszolasHIV`);

--
-- A tábla indexei `zenek`
--
ALTER TABLE `zenek`
  ADD PRIMARY KEY (`zeneID`),
  ADD UNIQUE KEY `cim` (`cim`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `dijak`
--
ALTER TABLE `dijak`
  MODIFY `dijID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `ertekeles_felhasznalofilm`
--
ALTER TABLE `ertekeles_felhasznalofilm`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `ertekeles_felhasznalorendezo`
--
ALTER TABLE `ertekeles_felhasznalorendezo`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `ertekeles_felhasznaloszinesz`
--
ALTER TABLE `ertekeles_felhasznaloszinesz`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `felfuggesztes`
--
ALTER TABLE `felfuggesztes`
  MODIFY `felfuggesztesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `felhasznaloID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT a táblához `filmek`
--
ALTER TABLE `filmek`
  MODIFY `filmID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  MODIFY `hozzaszolasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `kapta_dijfilmek`
--
ALTER TABLE `kapta_dijfilmek`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `kapta_dijrendezo`
--
ALTER TABLE `kapta_dijrendezo`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `kapta_dijszinesz`
--
ALTER TABLE `kapta_dijszinesz`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `kategoriak`
--
ALTER TABLE `kategoriak`
  MODIFY `kategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `kedvenc_felhasznalofilm`
--
ALTER TABLE `kedvenc_felhasznalofilm`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `kedvenc_felhasznaloszinesz`
--
ALTER TABLE `kedvenc_felhasznaloszinesz`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `kepek`
--
ALTER TABLE `kepek`
  MODIFY `kepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT a táblához `kepenrendezo_keprendezo`
--
ALTER TABLE `kepenrendezo_keprendezo`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `kepenszinesz_kepszinesz`
--
ALTER TABLE `kepenszinesz_kepszinesz`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `megnezendo_felhasznalofilm`
--
ALTER TABLE `megnezendo_felhasznalofilm`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `megtalalhatobenne_filmzene`
--
ALTER TABLE `megtalalhatobenne_filmzene`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT a táblához `nemzetisegek`
--
ALTER TABLE `nemzetisegek`
  MODIFY `nemzetisegID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT a táblához `nemzetisege_nemzetisegrendezo`
--
ALTER TABLE `nemzetisege_nemzetisegrendezo`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `nemzetisege_nemzetisegszinesz`
--
ALTER TABLE `nemzetisege_nemzetisegszinesz`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `profilkepek`
--
ALTER TABLE `profilkepek`
  MODIFY `profilkepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `rendezok`
--
ALTER TABLE `rendezok`
  MODIFY `rendezoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `szerepbelikep_kepszerepel`
--
ALTER TABLE `szerepbelikep_kepszerepel`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `szerepek`
--
ALTER TABLE `szerepek`
  MODIFY `szerepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `szerepel`
--
ALTER TABLE `szerepel`
  MODIFY `szerepelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `szineszek`
--
ALTER TABLE `szineszek`
  MODIFY `szineszID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `tartozik_filmkategoria`
--
ALTER TABLE `tartozik_filmkategoria`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `tetszikeles_felhasznalohozzaszolas`
--
ALTER TABLE `tetszikeles_felhasznalohozzaszolas`
  MODIFY `kapcsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `zenek`
--
ALTER TABLE `zenek`
  MODIFY `zeneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `ertekeles_felhasznalofilm`
--
ALTER TABLE `ertekeles_felhasznalofilm`
  ADD CONSTRAINT `ertekeles_felhasznalofilm_ibfk_1` FOREIGN KEY (`felhasznaloHIV`) REFERENCES `felhasznalok` (`felhasznaloID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ertekeles_felhasznalofilm_ibfk_2` FOREIGN KEY (`filmHIV`) REFERENCES `filmek` (`filmID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `ertekeles_felhasznalorendezo`
--
ALTER TABLE `ertekeles_felhasznalorendezo`
  ADD CONSTRAINT `ertekeles_felhasznalorendezo_ibfk_1` FOREIGN KEY (`felhasznaloHIV`) REFERENCES `felhasznalok` (`felhasznaloID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ertekeles_felhasznalorendezo_ibfk_2` FOREIGN KEY (`rendezoHIV`) REFERENCES `rendezok` (`rendezoID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `ertekeles_felhasznaloszinesz`
--
ALTER TABLE `ertekeles_felhasznaloszinesz`
  ADD CONSTRAINT `ertekeles_felhasznaloszinesz_ibfk_1` FOREIGN KEY (`felhasznaloHIV`) REFERENCES `felhasznalok` (`felhasznaloID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ertekeles_felhasznaloszinesz_ibfk_2` FOREIGN KEY (`szineszHIV`) REFERENCES `szineszek` (`szineszID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `felfuggesztes`
--
ALTER TABLE `felfuggesztes`
  ADD CONSTRAINT `felfuggesztes_ibfk_1` FOREIGN KEY (`felfuggesztveKAPCS`) REFERENCES `felhasznalok` (`felhasznaloID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD CONSTRAINT `felhasznalok_ibfk_1` FOREIGN KEY (`orszagaKAPCS`) REFERENCES `nemzetisegek` (`nemzetisegID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `felhasznalok_ibfk_2` FOREIGN KEY (`profilkepKAPCS`) REFERENCES `profilkepek` (`profilkepID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  ADD CONSTRAINT `hozzaszolasok_ibfk_1` FOREIGN KEY (`hozzaszolfilmKAPCS`) REFERENCES `filmek` (`filmID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `hozzaszolasok_ibfk_2` FOREIGN KEY (`hozzaszolszineszKAPCS`) REFERENCES `szineszek` (`szineszID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `hozzaszolasok_ibfk_3` FOREIGN KEY (`hozzaszolrendezoKAPCS`) REFERENCES `rendezok` (`rendezoID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `hozzaszolasok_ibfk_4` FOREIGN KEY (`ValaszhozzaszolasraKAPCS`) REFERENCES `hozzaszolasok` (`hozzaszolasID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `kapta_dijfilmek`
--
ALTER TABLE `kapta_dijfilmek`
  ADD CONSTRAINT `kapta_dijfilmek_ibfk_1` FOREIGN KEY (`dijHIV`) REFERENCES `dijak` (`dijID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kapta_dijfilmek_ibfk_2` FOREIGN KEY (`filmHIV`) REFERENCES `filmek` (`filmID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `kapta_dijrendezo`
--
ALTER TABLE `kapta_dijrendezo`
  ADD CONSTRAINT `kapta_dijrendezo_ibfk_1` FOREIGN KEY (`dijHIV`) REFERENCES `dijak` (`dijID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kapta_dijrendezo_ibfk_2` FOREIGN KEY (`rendezoHIV`) REFERENCES `rendezok` (`rendezoID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `kapta_dijszinesz`
--
ALTER TABLE `kapta_dijszinesz`
  ADD CONSTRAINT `kapta_dijszinesz_ibfk_1` FOREIGN KEY (`dijHIV`) REFERENCES `dijak` (`dijID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kapta_dijszinesz_ibfk_2` FOREIGN KEY (`szineszHIV`) REFERENCES `szineszek` (`szineszID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `kedvenc_felhasznalofilm`
--
ALTER TABLE `kedvenc_felhasznalofilm`
  ADD CONSTRAINT `kedvenc_felhasznalofilm_ibfk_1` FOREIGN KEY (`felhasznaloHIV`) REFERENCES `felhasznalok` (`felhasznaloID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kedvenc_felhasznalofilm_ibfk_2` FOREIGN KEY (`filmHIV`) REFERENCES `filmek` (`filmID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `kedvenc_felhasznaloszinesz`
--
ALTER TABLE `kedvenc_felhasznaloszinesz`
  ADD CONSTRAINT `kedvenc_felhasznaloszinesz_ibfk_1` FOREIGN KEY (`felhasznaloHIV`) REFERENCES `felhasznalok` (`felhasznaloID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kedvenc_felhasznaloszinesz_ibfk_2` FOREIGN KEY (`szineszHIV`) REFERENCES `szineszek` (`szineszID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `kepek`
--
ALTER TABLE `kepek`
  ADD CONSTRAINT `kepek_ibfk_1` FOREIGN KEY (`kepeiKAPCS`) REFERENCES `filmek` (`filmID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kepek_ibfk_2` FOREIGN KEY (`profilkepeKAPCS`) REFERENCES `filmek` (`filmID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `kepenrendezo_keprendezo`
--
ALTER TABLE `kepenrendezo_keprendezo`
  ADD CONSTRAINT `kepenrendezo_keprendezo_ibfk_1` FOREIGN KEY (`kepHIV`) REFERENCES `kepek` (`kepID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kepenrendezo_keprendezo_ibfk_2` FOREIGN KEY (`rendezoHIV`) REFERENCES `rendezok` (`rendezoID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `kepenszinesz_kepszinesz`
--
ALTER TABLE `kepenszinesz_kepszinesz`
  ADD CONSTRAINT `kepenszinesz_kepszinesz_ibfk_1` FOREIGN KEY (`kepHIV`) REFERENCES `kepek` (`kepID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kepenszinesz_kepszinesz_ibfk_2` FOREIGN KEY (`szineszHIV`) REFERENCES `szineszek` (`szineszID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `megnezendo_felhasznalofilm`
--
ALTER TABLE `megnezendo_felhasznalofilm`
  ADD CONSTRAINT `megnezendo_felhasznalofilm_ibfk_1` FOREIGN KEY (`felhasznaloHIV`) REFERENCES `felhasznalok` (`felhasznaloID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `megnezendo_felhasznalofilm_ibfk_2` FOREIGN KEY (`filmHIV`) REFERENCES `filmek` (`filmID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `megtalalhatobenne_filmzene`
--
ALTER TABLE `megtalalhatobenne_filmzene`
  ADD CONSTRAINT `megtalalhatobenne_filmzene_ibfk_1` FOREIGN KEY (`filmHIV`) REFERENCES `filmek` (`filmID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `megtalalhatobenne_filmzene_ibfk_2` FOREIGN KEY (`zeneHIV`) REFERENCES `zenek` (`zeneID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `nemzetisege_nemzetisegrendezo`
--
ALTER TABLE `nemzetisege_nemzetisegrendezo`
  ADD CONSTRAINT `nemzetisege_nemzetisegrendezo_ibfk_1` FOREIGN KEY (`nemzetisegHIV`) REFERENCES `nemzetisegek` (`nemzetisegID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nemzetisege_nemzetisegrendezo_ibfk_2` FOREIGN KEY (`rendezoHIV`) REFERENCES `rendezok` (`rendezoID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `nemzetisege_nemzetisegszinesz`
--
ALTER TABLE `nemzetisege_nemzetisegszinesz`
  ADD CONSTRAINT `nemzetisege_nemzetisegszinesz_ibfk_1` FOREIGN KEY (`nemzetisegHIV`) REFERENCES `nemzetisegek` (`nemzetisegID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nemzetisege_nemzetisegszinesz_ibfk_2` FOREIGN KEY (`szineszHIV`) REFERENCES `szineszek` (`szineszID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `szerepbelikep_kepszerepel`
--
ALTER TABLE `szerepbelikep_kepszerepel`
  ADD CONSTRAINT `szerepbelikep_kepszerepel_ibfk_1` FOREIGN KEY (`kepHIV`) REFERENCES `kepek` (`kepID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `szerepbelikep_kepszerepel_ibfk_2` FOREIGN KEY (`szerepelHIV`) REFERENCES `szerepel` (`szerepelID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `szerepel`
--
ALTER TABLE `szerepel`
  ADD CONSTRAINT `szerepel_ibfk_1` FOREIGN KEY (`szerepbenKapcs`) REFERENCES `szerepek` (`szerepID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `szerepel_ibfk_2` FOREIGN KEY (`filmbenszerepelKapcs`) REFERENCES `filmek` (`filmID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `szerepel_ibfk_3` FOREIGN KEY (`jatsszaKapcs`) REFERENCES `szineszek` (`szineszID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `tartozik_filmkategoria`
--
ALTER TABLE `tartozik_filmkategoria`
  ADD CONSTRAINT `tartozik_filmkategoria_ibfk_1` FOREIGN KEY (`filmHIV`) REFERENCES `filmek` (`filmID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tartozik_filmkategoria_ibfk_2` FOREIGN KEY (`kategoriaHIV`) REFERENCES `kategoriak` (`kategoriaID`) ON UPDATE CASCADE;

--
-- Megkötések a táblához `tetszikeles_felhasznalohozzaszolas`
--
ALTER TABLE `tetszikeles_felhasznalohozzaszolas`
  ADD CONSTRAINT `tetszikeles_felhasznalohozzaszolas_ibfk_1` FOREIGN KEY (`felhasznaloHIV`) REFERENCES `felhasznalok` (`felhasznaloID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tetszikeles_felhasznalohozzaszolas_ibfk_2` FOREIGN KEY (`hozzaszolasHIV`) REFERENCES `hozzaszolasok` (`hozzaszolasID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
