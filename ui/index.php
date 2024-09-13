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
?>
<html>
    <head>
        <title>LXNetDirector</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base( "vendor/twbs/bootstrap/dist/css/bootstrap.min.css" ) ?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo base( "vendor/twbs/bootstrap/dist/js/bootstrap.min.js" ) ?>" type="text/javascript"></script>
    </head>
    <body>
        <?php require 'inc/menu.php'; ?>
        <div class="content-fluid">
            <?php
            if( empty( $_GET['url'] ) ) {
                $location = "dashboard";
            } else {
                $location = filter_var( $_GET['url'] , FILTER_UNSAFE_RAW );
            }
            echo "Going to require " . $location . ".php";
            ?>
        </div>
    </body>
</html>