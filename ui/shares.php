<div class="row border-bottom">
    <div class="col">
        <h1>Shares</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <?php
        if( isset( $_POST['submit'] ) ) {
            
            echo "<div class='alert alert-success'>Settings saved!</div>";
        }
        ?>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Share name</th>
                    <th>Writable</th>
                    <th>Guests</th>
                    <th>Path</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getShares = $db->query( "SELECT * FROM shares" );
                while( $share->fetch( PDO::FETCH_ASSOC ) ) {
                    echo "<tr>";
                    echo "<td>" . $share['share_name'] . "</td>";
                    echo "<td>" . $share['writable'] . "</td>";
                    echo "<td>" . $share['guests'] . "</td>";
                    echo "<td><em>/usr/local/lx_network/shares/" . $share['path'] . "</em></td>";
                    echo "</tr>";
                } 
                ?>
            </tbody>
        </table>
    </div>
</div>