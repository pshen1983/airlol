DROP TABLE IF EXISTS airlol.map_trip_good;
CREATE TABLE airlol.map_trip_good
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

    trip_id INT(10) UNSIGNED NOT NULL,
    good_id INT(10) UNSIGNED NOT NULL,
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;