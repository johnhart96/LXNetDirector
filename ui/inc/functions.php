<?php
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
        $db = new PDO( "sqlite:/usr/local/lx_network/shares/configs/LXNetDirector.db" );
    } catch( PDOException $e ) {
        die( $e->getMessage() );
    }
    return $db;
}
function watchdog( $entry , $device = "LXNetDirector" , $mode = "info" ) {
    $db = config_init();
    $db->prepare( "INSERT INTO logs (device,mode,entryLog) VALUES(:device,:mode,:entryLog)" );
    $db->execute( [ ':device' => $device , ':mode' => $mode , ':entryLog' => $entry ] );
    $db->close();
}
?>