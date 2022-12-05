-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.6.11-MariaDB-0ubuntu0.22.04.1 - Ubuntu 22.04
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour record
CREATE DATABASE IF NOT EXISTS `record` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `record`;

-- Listage de la structure de table record. artist
CREATE TABLE IF NOT EXISTS `artist` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(255) DEFAULT NULL,
  `artist_url` varchar(255) DEFAULT NULL,
  `artist_picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table record.artist : ~27 rows (environ)
REPLACE INTO `artist` (`artist_id`, `artist_name`, `artist_url`, `artist_picture`) VALUES
	(1, 'Neil Young', 'https://neilyoung.warnerrecords.com/', 'neil_young_8471.jpeg'),
	(2, 'YES', 'https://www.yesworld.com/', 'yes_5341.jpeg'),
	(3, 'The Rolling Stones', 'https://rollingstones.com/', 'the_rolling_stones_1973.jpeg'),
	(4, 'Queens of the Stone Age', 'https://www.qotsa.com/', 'queen_of_the_stone_age_3268.jpeg'),
	(5, 'Serge Gainsbourg', 'https://www.universalmusic.fr/artistes/20000103696', 'serge_gainsbourg_8104.jpeg'),
	(6, 'AC/DC', 'https://www.acdc.com/', 'ac-dc_6666.jpeg'),
	(7, 'Marillion', 'https://www.marillion.com/', 'marillion_8320.jpeg'),
	(8, 'Bob Dylan', 'https://www.bobdylan.com/', 'bob_dylan_6791.jpeg'),
	(9, 'The Fleshtones', NULL, 'the_fleshtones_9857.jpeg'),
	(10, 'The Clash', 'https://www.theclash.com/', 'the_clash_2917.jpeg'),
	(11, 'Kendrick Lamar', 'https://oklama.com/', 'kendrick_lamar_1484.jpeg'),
	(12, 'Vald', 'https://www.vald.store/', 'vald_7290.jpeg'),
	(13, 'Daft Punk', 'https://daftpunk.com/', 'daft_punk_4927.jpeg'),
	(14, 'The Weeknd', 'https://www.theweeknd.com/', 'the_weeknd_6969.jpeg'),
	(15, 'Coldplay', 'https://www.coldplay.com/', 'coldplay_2523.jpeg'),
	(16, 'Denzel Curry', 'https://www.denzelcurry.com/', 'denzel_curry_1780.jpeg'),
	(17, 'Dua Lipa', 'https://www.dualipa.com/home/?ref=https://www.google.com/', 'dua_lipa_8283.jpeg'),
	(18, 'EMINƎM', 'https://www.eminem.com/', 'eminƎm_1680.jpeg'),
	(19, 'Linkin Park', 'https://www.linkinpark.com/?frontpage=true', 'linkin_park_9903.jpeg'),
	(20, 'Twenty One Pilots', 'https://www.twentyonepilots.com/', 'twenty_one_pilots_4132.jpeg'),
	(21, 'Queen', 'https://www.queenonline.com/', 'queen_3630.jpeg'),
	(22, 'Ice Cube', 'https://icecube.com/', 'ice_cube_3721.jpeg'),
	(23, 'Taylor Swift', 'https://www.taylorswift.com/', 'taylor_swift_9707.jpeg'),
	(24, 'Rihanna', 'http://www.rihannanow.com/', 'rihanna_3825.jpeg'),
	(25, 'Depeche Mode', 'https://www.depechemode.com/', 'depeche_mode_3240.jpeg'),
	(26, 'Orelsan', 'https://orelsan.show/', 'orelsan_4482.jpeg'),
	(27, 'Katy Perry', 'https://www.katyperry.com/', 'katy_perry_9375.jpeg'),
	(28, 'Angèle', 'https://angelevl.be/', 'angèle_2594.jpeg');

-- Listage de la structure de table record. disc
CREATE TABLE IF NOT EXISTS `disc` (
  `disc_id` int(11) NOT NULL AUTO_INCREMENT,
  `disc_title` varchar(255) DEFAULT NULL,
  `disc_year` int(11) DEFAULT NULL,
  `disc_picture` varchar(255) DEFAULT NULL,
  `disc_label` varchar(255) DEFAULT NULL,
  `disc_genre` varchar(255) DEFAULT NULL,
  `disc_price` decimal(6,2) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`disc_id`),
  KEY `artist_id` (`artist_id`),
  CONSTRAINT `disc_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table record.disc : ~28 rows (environ)
REPLACE INTO `disc` (`disc_id`, `disc_title`, `disc_year`, `disc_picture`, `disc_label`, `disc_genre`, `disc_price`, `artist_id`) VALUES
	(1, 'Fugazi', 1984, 'Fugazi.jpeg', 'EMI', 'Prog', 14.99, 7),
	(2, 'Songs for the Deaf', 2002, 'Songs for the Deaf.jpeg', 'Interscope Records', 'Rock/Stoner', 12.99, 4),
	(3, 'Harvest Moon', 1992, 'Harvest Moon.jpeg', 'Reprise Records', 'Rock', 4.20, 1),
	(4, 'Initials BB', 1968, 'Initials BB.jpeg', 'Philips', ' Chanson, Pop Rock', 12.99, 5),
	(5, 'After the Gold Rush', 1970, 'After the Gold Rush.jpeg', 'Reprise Records', 'Country Rock', 20.00, 1),
	(6, 'Broken Arrow', 1996, 'Broken Arrow.jpeg', 'Reprise Records', ' Country Rock, Classic Rock', 15.00, 1),
	(7, 'Highway To Hell', 1979, 'Highway To Hell.jpeg', 'Atlantic', 'Hard Rock', 15.00, 6),
	(8, 'Damn', 2017, 'damn_1953.jpeg', 'Top Dawg, Aftermath et Interscope', 'Rap', 29.99, 11),
	(9, 'Drama', 1980, 'Drama.jpeg', 'Atlantic', 'Prog', 15.00, 2),
	(10, 'Year of the Horse', 1997, 'Year of the Horse.jpeg', 'Reprise Records', 'Country Rock, Classic Rock', 7.50, 1),
	(11, 'Ragged Glory', 1990, 'Ragged Glory.jpeg', 'Reprise Records', 'Country Rock, Grunge', 11.00, 1),
	(12, 'Rust Never Sleeps', 1979, 'Rust Never Sleeps.jpeg', 'Reprise Records', 'Classic Rock, Arena Rock', 15.00, 1),
	(13, 'Exile on main street', 1972, 'Exile on main street.jpeg', 'Rolling Stones Records', 'Blues Rock, Classic Rock', 33.00, 3),
	(14, 'London Calling', 1971, 'London Calling.jpeg', 'CBS', 'Punk, New Wave', 33.00, 10),
	(15, 'Beggars Banquet', 1968, 'Beggars Banquet.jpeg', 'Rolling Stones Records', 'Blues Rock, Classic Rock', 33.00, 3),
	(16, 'Laboratory of sound', 1995, 'Laboratory of sound.jpeg', 'Rebel Rec.', 'Rock', 33.00, 9),
	(17, 'Mr. Morale & the Big Steppers', 2022, 'mr._morale_&_the_big_steppers_3709.jpeg', 'PGLang, Top Dawg, Aftermath et Interscope', 'Hip-hop alternatif, rap conscient, jazz rap', 44.99, 11),
	(18, 'Xeu', 2018, 'xeu_8792.jpeg', 'Universal Music Division Capitol Music France', 'Rap', 26.99, 12),
	(21, 'Homework Remixes Édition Limitée', 2022, 'homework_remixes_Édition_limitée_3854.jpeg', 'Virgin Records', 'House music, Disco, Techno, French touch, Acid house, Chicago house', 21.99, 13),
	(22, 'Ce monde est cruel', 2019, 'ce_monde_est_cruel_2197.jpeg', 'Universal Music Division Capitol Music France', 'Hip-hop/Rap, French Rap', 26.99, 12),
	(24, 'V', 2022, 'v_6166.jpeg', 'Aechelon Records', 'Rap français', 26.99, 12),
	(25, 'Agartha', 2017, 'agartha_7918.jpeg', 'Mezoued Records', 'French Urban Pop/R&B, Maghreb Rap, French Rap', 26.99, 12),
	(26, 'NQNT 2', 2015, 'nqnt_2_1736.jpeg', 'Universal Music Division Capitol Music France', 'Hip-hop/Rap, Maghreb Rap, French Rap', 26.99, 12),
	(27, 'To Pimp a Butterfly', 2015, 'to_pimp_a_butterfly_1384.jpeg', 'Top Dawg, Aftermath, Interscope', 'Hip-hop, Funk, Rap West Coast', 26.99, 11),
	(28, 'Untitled Unmastered', 2016, 'untitled_unmastered_7665.jpeg', 'Aftermath', 'Hip-hop, Funk, Trap, Jazz rap, Progressive rap', 21.99, 11),
	(29, 'Good Kid, M.A.A.D City', 2012, 'good_kid,_m.a.a.d_city_9806.jpeg', 'Top Dawg Entertainment', 'Hip-hop, Rap West Coast, Gangsta rap', 27.99, 11),
	(30, 'Section.80', 2011, 'section.80_3403.jpeg', 'Top Dawg Entertainment', 'Hip-hop, Hip-hop conscient, Rap politique', 49.99, 11),
	(31, 'Random Access Memories', 2013, 'random_access_memories_2788.jpeg', 'Daft Life Limited, Columbia Records', 'Électro, Disco, Pop, Funk, Electro, French touch, Soft rock', 29.99, 13);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
