<?php
define( "CONFIG_PATH" , "/usr/local/lx_network/shares/config/LXNetDirector.db" );
$create = new SQLite3( CONFIG_PATH , SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE );
$create->query("
    PRAGMA foreign_keys = off;
    BEGIN TRANSACTION;

    -- Table: logs
    CREATE TABLE IF NOT EXISTS logs (id INTEGER PRIMARY KEY AUTOINCREMENT, stamp DATETIME CURRENT_TIMESTAMP, device TEXT NOT NULL, mode TEXT NOT NULL, entryLog TEXT NOT NULL);

    -- Table: settings
    CREATE TABLE IF NOT EXISTS settings (id INTEGER PRIMARY KEY AUTOINCREMENT, setting TEXT NOT NULL, setting_value TEXT NOT NULL);

    -- Table: shares
    CREATE TABLE IF NOT EXISTS shares (id INTEGER PRIMARY KEY AUTOINCREMENT, share_name TEXT NOT NULL, writable TEXT DEFAULT 'yes', guests TEXT DEFAULT 'yes', path TEXT NOT NULL);

    COMMIT TRANSACTION;
    PRAGMA foreign_keys = on;

");