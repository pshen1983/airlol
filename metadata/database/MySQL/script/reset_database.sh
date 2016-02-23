#!/bin/sh
mysql -uroot -pLangara2 airlol < ../schema/user.sql;
mysql -uroot -pLangara2 airlol < ../schema/cookie_token.sql;
mysql -uroot -pLangara2 airlol < ../schema/trip.sql;
mysql -uroot -pLangara2 airlol < ../schema/good.sql;
mysql -uroot -pLangara2 airlol < ../schema/rating.sql;
mysql -uroot -pLangara2 airlol < ../schema/cms_item.sql;
mysql -uroot -pLangara2 airlol < ../schema/cms_relation.sql;
mysql -uroot -pLangara2 airlol < ../schema/message.sql;
mysql -uroot -pLangara2 airlol < ../schema/index.sql;
mysql -uroot -pLangara2 airlol < ../schema/airport.sql;
