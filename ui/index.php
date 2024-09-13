<?php
/*
* Project: LXNetDirector
* Author: johnhart96
* Version 1
* Licence: Apache 2.0
* Repo: https://github.com/johnhart96/LXNetDirector
*/
require_once 'inc/functions.php';
$db = config_init();
watchdog( "User `" . user() . "` requested " . $_SERVER['REQUEST_URI'] , "access" );
?>
<html>
    <head>
        <title>LXNetDirector</title>
        <link href="<?php echo base( "vendor/twbs/bootstrap/dist/css/bootstrap.min.css" ) ?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo base( "vendor/twbs/bootstrap/dist/js/bootstrap.min.js" ) ?>" type="text/javascript"></script>
    </head>
    <body>
        <?php require 'inc/menu.php'; ?>
        <div class="content">
            <?php
            if( empty( $_GET['url'] ) ) {
                $location = "dashboard";
            } else {
                $location = filter_var( $_GET['url'] , FILTER_UNSAFE_RAW );
            }
            require $location . ".php";
            ?>
        </div>
    </body>
</html>