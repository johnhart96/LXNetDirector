<?php
define( "CONFIG_PATH" , "../usr/config.php" );

if( ! file_exists( CONFIG_PATH ) ) {
    die( "Error: No config file was found!" );
} else {
    require_once CONFIG_PATH;
}
function config_init() {
    try {
        $db = new PDO( "mysql:host=" . MYSQL_HOST . ";port=" . MYSQL_PORT . ";dbname=" . MYSQL_DB , MYSQL_USER , MYSQL_PASSWORD );
    } catch( PDOException $e ) {
        die( $e->getMessage() );
    }
    return $db;
}
?>