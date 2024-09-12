<?php
function base() {
    return $_SERVER['SERVER_NAME'];
}
die( base() );
?>