#!/bin/sh
mysql -u root -pLangara2 -e "CREATE DATABASE airlol"
mysql -u root -pLangara2 -e "GRANT ALL ON airlol.* TO 'airlol'@'%' IDENTIFIED BY 'airlolpass'"
mysql -u root -pLangara2 -e "FLUSH PRIVILEGES"
