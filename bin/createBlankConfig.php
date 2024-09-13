<?php
define( "CONFIG_PATH" , "/usr/local/lx_network/shares/config/LXNetDirector.db" );
$create = new SQLite3( CONFIG_PATH , SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE );
?>