DROP TABLE IF EXISTS airlol.trip;
CREATE TABLE airlol.trip
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

    user_id INT(10) UNSIGNED NOT NULL,
    departure_code VARCHAR(16) NOT NULL,
    arrival_code VARCHAR(16) NOT NULL,
    trip_date DATE NOT NULL,
    space_type TINYINT NOT NULL,
    weight TINYINT,
    price SMALLINT UNSIGNED,
    currency VARCHAR(4),
    active VARCHAR(2) NOT NULL,
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;