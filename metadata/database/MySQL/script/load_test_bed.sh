#!/bin/sh
mysql -ucairyme -pcairymepass cairyme < ../tests/tb_$1.sql;
