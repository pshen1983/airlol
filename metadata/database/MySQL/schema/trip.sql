DROP TABLE IF EXISTS airlol.trip;
CREATE TABLE airlol.trip
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

    user_id INT(10) UNSIGNED NOT NULL,
    departure_code VARCHAR(16) NOT NULL,
    arrival_code VARCHAR(16) NOT NULL,
    trip_date DATE NOT NULL,
    trip_price SMALLINT UNSIGNED,
    space_type TINYINT NOT NULL,
    space_num TINYINT NOT NULL,
    space_unit TINYINT NOT NULL,
    contact_type TINYINT NOT NULL,
    price SMALLINT UNSIGNED,
    price_adjust VARCHAR(2),
    active VARCHAR(2),
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;