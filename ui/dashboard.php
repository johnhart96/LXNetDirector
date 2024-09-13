<div class="row border-bottom">
    <div class="col">
        <h1>Welcome, <?php echo ucFirst( user() ); ?></h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Health</h2>
        <?php
        $memory = shell_exec( "free -h" );
        $memory = str_replace( "total used free shared buff/cache available " , "" , $memory );
        echo $memory;
        ?>
    </div>
</div>