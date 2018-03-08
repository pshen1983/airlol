DROP TABLE IF EXISTS airlol.cms_item;
CREATE TABLE airlol.cms_item
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

    language VARCHAR(3),
    type TINYINT,
    content TEXT,
    code VARCHAR(65) NOT NULL,
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;