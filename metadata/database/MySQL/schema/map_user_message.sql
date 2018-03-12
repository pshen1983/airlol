DROP TABLE IF EXISTS cairyme.map_user_message;
CREATE TABLE cairyme.map_user_message
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

    user_id INT(10) UNSIGNED NOT NULL,
    map_id INT(10) UNSIGNED NOT NULL,
    last_read DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;