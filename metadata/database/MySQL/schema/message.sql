DROP TABLE IF EXISTS airlol.message;
CREATE TABLE airlol.message
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

    trip_id INT(10) UNSIGNED NOT NULL,
    good_id INT(10) UNSIGNED NOT NULL,
    sender INT(10) UNSIGNED NOT NULL,
    receiver INT(10) UNSIGNED NOT NULL,
    comment TEXT,
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;