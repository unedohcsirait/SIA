#!/bin/bash

PHP_BIN=$(which php 2>/dev/null || find /nix/store -name "php" -maxdepth 5 -type f 2>/dev/null | grep "bin/php$" | head -1)
MYSQLD_BIN=$(which mysqld 2>/dev/null || find /nix/store -name "mysqld" -maxdepth 5 -type f 2>/dev/null | head -1)
MYSQL_BIN=$(which mysql 2>/dev/null || find /nix/store -name "mysql" -maxdepth 5 -type f 2>/dev/null | grep "bin/mysql$" | head -1)
MYSQLADMIN_BIN=$(dirname $MYSQLD_BIN)/mysqladmin

DATADIR="/home/runner/mysql_data"
SOCKET="/tmp/mysql.sock"
PIDFILE="/tmp/mysql.pid"

echo "==> Using PHP: $PHP_BIN"
echo "==> Using mysqld: $MYSQLD_BIN"

if [ ! -d "$DATADIR" ]; then
    echo "==> Initializing MySQL data directory..."
    $MYSQLD_BIN --initialize-insecure --datadir="$DATADIR" --user=runner 2>&1
fi

echo "==> Starting MySQL..."
$MYSQLD_BIN \
    --datadir="$DATADIR" \
    --socket="$SOCKET" \
    --pid-file="$PIDFILE" \
    --bind-address=127.0.0.1 \
    --port=3306 \
    --user=runner \
    --skip-networking=OFF \
    --log-error=/tmp/mysql_error.log \
    --default-authentication-plugin=mysql_native_password \
    --daemonize

echo "==> Waiting for MySQL to be ready..."
for i in $(seq 1 30); do
    if $MYSQLADMIN_BIN --socket="$SOCKET" ping --silent 2>/dev/null; then
        echo "==> MySQL is ready."
        break
    fi
    sleep 1
done

echo "==> Setting up database..."
$MYSQL_BIN --socket="$SOCKET" -u root -e "CREATE DATABASE IF NOT EXISTS db_smpn2 CHARACTER SET utf8 COLLATE utf8_general_ci;" 2>/dev/null

DB_TABLES=$($MYSQL_BIN --socket="$SOCKET" -u root db_smpn2 -e "SHOW TABLES;" 2>/dev/null | wc -l)
if [ "$DB_TABLES" -le 1 ]; then
    echo "==> Importing database schema..."
    $MYSQL_BIN --socket="$SOCKET" -u root db_smpn2 < /home/runner/workspace/db_smpn2.sql 2>/dev/null
    echo "==> Importing new tables (nilai & absensi)..."
    $MYSQL_BIN --socket="$SOCKET" -u root db_smpn2 < /home/runner/workspace/db_tambahan.sql 2>/dev/null
fi

echo "==> Starting PHP built-in server on port 5000..."
exec $PHP_BIN -S 0.0.0.0:5000 -t /home/runner/workspace /home/runner/workspace/router.php
