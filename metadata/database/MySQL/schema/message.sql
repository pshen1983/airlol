DROP TABLE IF EXISTS cairyme.message;
CREATE TABLE cairyme.message
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

	trip_good_map_id INT(10) UNSIGNED NOT NULL,
    sender_id INT(10) UNSIGNED NOT NULL,
    receiver_id INT(10) UNSIGNED NOT NULL,
    type TINYINT NOT NULL,
    comment TEXT,
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;