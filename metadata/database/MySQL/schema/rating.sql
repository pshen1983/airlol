DROP TABLE IF EXISTS cairyme.rating;
CREATE TABLE cairyme.rating
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

    trip_good_map_id INT(10) UNSIGNED NOT NULL,
    user_id INT(10) UNSIGNED NOT NULL,
    rater_id INT(10) UNSIGNED NOT NULL,
    type TINYINT NOT NULL,
    rating TINYINT NOT NULL,
    comment VARCHAR(1024),
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;