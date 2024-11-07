#!/bin/bash
<?php
require 'header.php';
$db = config_init();
$getShares = $db->query( "SELECT * FROM `shares`" );

$samba_file = "/etc/samba/shares.conf";
$content = "";
while( $share = $getShares->fetch( PDO::FETCH_ASSOC ) ) {
    $content .= "[" . $share['share_name'] . "]\n";
    $content .= "    path = /usr/local/lx_network/shares/" . $share['path'] . "\n";
    $content .= "    writeable = " . $share['writable'] . "\n";
    $content .= "    guest ok = " . $share['guests'] . "\n";

}
if( file_exists( $samba_file ) ) {
    unlink( $samba_file );
}
$handle = fopen( $samba_file , "w" );
fwrite( $content , $handle );
fclose( $handle );
?>