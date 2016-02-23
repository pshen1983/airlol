DROP TABLE IF EXISTS airlol.good;
CREATE TABLE airlol.good
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

    user_id INT(10) UNSIGNED NOT NULL,
    departure_code VARCHAR(16) NOT NULL,
    arrival_code VARCHAR(16) NOT NULL,
    end_date DATE NOT NULL,
    good_type TINYINT NOT NULL,
    good_unit TINYINT NOT NULL,
    description VARCHAR(1024) NOT NULL,
    price SMALLINT UNSIGNED,
    price_adjust VARCHAR(2),
    active VARCHAR(2),
    contact_type TINYINT NOT NULL,
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;