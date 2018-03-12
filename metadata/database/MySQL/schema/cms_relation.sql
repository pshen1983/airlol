DROP TABLE IF EXISTS cairyme.cms_relation;
CREATE TABLE cairyme.cms_relation
(
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,

    type VARCHAR(9) NOT NULL,
    parent_code VARCHAR(65) NOT NULL,
    child_code VARCHAR(65) NOT NULL,
    create_time DATETIME NOT NULL,

    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;