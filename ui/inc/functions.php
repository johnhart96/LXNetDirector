<?php
define( "CONFIG_PATH" , "../usr/LXNetDirector.db" );
// Create db if do not exist
if( ! file_exists( "../usr" ) ) {
    mkdir( "../usr" );
}
if( ! file_exists( CONFIG_PATH ) ) {
    $create = new SQLite3( CONFIG_PATH );
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
}

function base( $l = NULL ) {
    return "http://" . $_SERVER['SERVER_NAME'] . "/" . $l;
}

function menu_item( $link , $text ) {
    $location = filter_var( $_GET['url'] , FILTER_UNSAFE_RAW );
    if( $link == $location ) {
        $active = "active";
    } else {
        $active = "";
    }
    echo '<li class="nav-item"><a class="nav-link ' . $active . '" aria-current="page" href="/' . $link . '">' . $text . '</a></li>';
}
function config_init() {
    try {
        $db = new PDO( "sqlite:" . CONFIG_PATH );
    } catch( PDOException $e ) {
        die( $e->getMessage() );
    }
    return $db;
}
function watchdog( $entry , $mode = "info" , $device = "LXNetDirector" ) {
    $db = config_init();
    $watchdog = $db->prepare( "INSERT INTO logs (device,mode,entryLog) VALUES(:device,:mode,:entryLog)" );
    $watchdog->execute( [ ':device' => $device , ':mode' => $mode , ':entryLog' => $entry ] );
}
function user() {
    return $_SERVER['PHP_AUTH_USER'];
}
function read_setting( $setting ) {
    $db = config_init();
    $get = $db->prepare( "SELECT * FROM settings WHERE setting =:setting LIMIT 1" );
    $get->execute( [ ':setting' => $setting ] );
    while( $row = $get->fetch( PDO::FETCH_ASSOC ) ) {
        return $row['setting_value'];
    }
}
function write_setting( $setting , $value ) {
    $db = config_init();
    // Check if setting exists
    $check = $db->prepare( "SELECT * FROM settings WHERE setting =:setting LIMIT 1" );
    $check->execute( [ ':setting' => $setting ] );
    $entries = 0;
    while( $row = $check->fetch( PDO::FETCH_ASSOC ) ) {
        $entries++;
    }
    if( $entries == 0 ) {
        // No entries, insert
        $write = $db->prepare( "INSERT INTO settings (setting,setting_value) VALUES(:setting,:setting_value)" );
        watchdog( "Adding setting `" . $setting . "` with the value `" . $value . "`" );
    } else {
        // Entries found, update
        $write = $db->prepare( "UPDATE settings SET setting_value =:setting_value WHERE setting =:setting" );
        watchdog( "Updating setting `" . $setting . "` with the value `" . $value . "`" );
    }
    $write->execute( [ ':setting' => $setting , ':setting_value' => $value ] );
}

?>