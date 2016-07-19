DROP TABLE IF EXISTS airlol.user;
CREATE TABLE airlol.user
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

    email VARCHAR(61) NOT NULL,
    password VARCHAR(41) NOT NULL,
    name VARCHAR(21) NOT NULL,
    profile_img VARCHAR(64),
    birth_day DATE,
    tel VARCHAR(15),
    wechat VARCHAR(32),
    preferred_language VARCHAR(5),
    preferred_currency VARCHAR(3),
    preferred_timezone TINYINT,
    preferred_method TINYINT,
    living_city VARCHAR(255),
    self_description TEXT,
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;