DROP TABLE IF EXISTS airlol.user;
CREATE TABLE airlol.user
(
	id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

	email VARCHAR(61) NOT NULL,
	tel VARCHAR(15),
	password VARCHAR(41) NOT NULL,
	name VARCHAR(21) NOT NULL,
	create_time DATETIME NOT NULL,

	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;