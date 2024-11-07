<?php
define( "CONFIG_PATH" , "../usr/config.php" );

if( ! file_exists( CONFIG_PATH ) ) {
    die( "Error: No config file was found!" );
} else {
    require_once CONFIG_PATH;
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
        $db = new PDO( "mysql:host=" . MYSQL_HOST . ";port=" . MYSQL_PORT . ";dbname=" . MYSQL_DB , MYSQL_USER , MYSQL_PASSWORD );
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
    if( empty( $_SERVER['PHP_AUTH_USER'] ) ) {
        return "Unknown user";
    } else {
        return $_SERVER['PHP_AUTH_USER'];
    }
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