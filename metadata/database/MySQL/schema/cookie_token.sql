DROP TABLE IF EXISTS airlol.cookie_token;
CREATE TABLE airlol.cookie_token
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    type TINYINT NOT NULL,
    value VARCHAR(65) NOT NULL,
    user_id INT(10) UNSIGNED,
    data VARCHAR(32),
    expires DATETIME,
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;