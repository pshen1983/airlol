#!/bin/sh
mysql -u root -pLangara2 -e "CREATE DATABASE cairyme"
mysql -u root -pLangara2 -e "GRANT ALL ON cairyme.* TO 'cairyme'@'%' IDENTIFIED BY 'cairymepass'"
mysql -u root -pLangara2 -e "FLUSH PRIVILEGES"
