DROP TABLE IF EXISTS airlol.trip;
CREATE TABLE airlol.trip
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

    user_id INT(10) UNSIGNED NOT NULL,
    departure_id INT(10) UNSIGNED NOT NULL,
    arrival_id INT(10) UNSIGNED NOT NULL,
    trip_date DATE NOT NULL,
    space_type TINYINT NOT NULL,
    space_num TINYINT NOT NULL,
    space_unit TINYINT NOT NULL,
    contact_type TINYINT NOT NULL,
    price SMALLINT UNSIGNED,
    price_adjust VARCHAR(2),
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;