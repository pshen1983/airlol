#!/bin/sh
mysql -ucairyme -pcairymepass cairyme < ../schema/user.sql;
mysql -ucairyme -pcairymepass cairyme < ../schema/cookie_token.sql;
mysql -ucairyme -pcairymepass cairyme < ../schema/trip.sql;
mysql -ucairyme -pcairymepass cairyme < ../schema/good.sql;
mysql -ucairyme -pcairymepass cairyme < ../schema/rating.sql;
mysql -ucairyme -pcairymepass cairyme < ../schema/cms_item.sql;
mysql -ucairyme -pcairymepass cairyme < ../schema/cms_relation.sql;
mysql -ucairyme -pcairymepass cairyme < ../schema/map_trip_good.sql;
mysql -ucairyme -pcairymepass cairyme < ../schema/map_user_message.sql;
mysql -ucairyme -pcairymepass cairyme < ../schema/message.sql;
mysql -ucairyme -pcairymepass cairyme < ../schema/index.sql;
mysql -ucairyme -pcairymepass cairyme < ../data/airport.sql;
mysql -ucairyme -pcairymepass cairyme < ../data/labels.sql;
