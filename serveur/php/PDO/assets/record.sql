DROP DATABASE IF EXISTS record;

CREATE DATABASE record;

USE record;

CREATE TABLE artist (
	artist_id		INT PRIMARY KEY AUTO_INCREMENT,
	artist_name		VARCHAR(255),
	artist_url		VARCHAR(255),
	artist_picture	VARCHAR(255)
);

INSERT INTO artist (artist_id, artist_name, artist_url, artist_picture) VALUES
(1, 'Neil Young',"https://neilyoung.warnerrecords.com/","neil_young_8471.jpeg"),
(2, 'YES', 'https://www.yesworld.com/', 'yes_5341.jpeg'),
(3, 'The Rolling Stones', 'https://rollingstones.com/', 'the_rolling_stones_1973.jpeg'),
(4, 'Queens of the Stone Age', 'https://www.qotsa.com/', 'queen_of_the_stone_age_3268.jpeg'),
(5, 'Serge Gainsbourg', 'https://www.universalmusic.fr/artistes/20000103696', 'serge_gainsbourg_7619.jpeg'),
(6, 'AC/DC', 'https://www.acdc.com/', 'ac-dc_6666.jpeg'),
(7, 'Marillion', 'https://www.marillion.com/', 'marillion_8320.jpeg'),
(8, 'Bob Dylan', 'https://www.bobdylan.com/', 'bob_dylan_6791.jpeg'),
(9, 'The Fleshtones', null,'the_fleshtones_9857.jpeg'),
(10, 'The Clash', 'https://www.theclash.com/', 'the_clash_2917.jpeg'),
(11, 'Kendrick Lamar', 'https://oklama.com/', 'kendrick_lamar_1484.jpeg');
(12, 'Vald', null, 'vald_7290.jpeg');


CREATE TABLE disc (
	disc_id			INT PRIMARY KEY AUTO_INCREMENT,
	disc_title		VARCHAR(255),
	disc_year		INT,
	disc_picture	VARCHAR(255),
	disc_label		VARCHAR(255),
	disc_genre		VARCHAR(255),
	disc_price		DECIMAL(6,2),
	artist_id		INT NULL,
	FOREIGN KEY (artist_id) REFERENCES artist(artist_id)
);


INSERT INTO disc (disc_id, disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES
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
	(17, 'Mr. Morale & the Big Steppers', 2022, 'mr._morale_&_the_big_steppers_3709.jpeg', 'PGLang, Top Dawg, Aftermath et Interscope', 'Hip-hop alternatif, rap conscient, jazz rap', 44.99, 11);
	(18, 'Xeu', 2022, 'xeu_3380.jpeg', 'Universal Music Division Capitol Music France', 'Rap', 26.99, 12);
