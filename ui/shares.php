<div class="row border-bottom">
    <div class="col">
        <h1>Shares</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="btn-group">
            <a class="btn btn-success"  href="/shares_new">New Share</a>
        </div>
        <?php
        if( isset( $_POST['submit'] ) ) {
            
            echo "<div class='alert alert-success'>Settings saved!</div>";
        }
        ?>
    </div>
</div>

<div class="row">&nbsp;</div>

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
                while( $share = $getShares->fetch( PDO::FETCH_ASSOC ) ) {
                    echo "<tr>";
                    echo "<td><a href='/shares_edit/" . $share['id'] . "'>" . $share['share_name'] . "</a></td>";
                    echo "<td>" . $share['writable'] . "</td>";
                    echo "<td>" . $share['guests'] . "</td>";
                    echo "<td><em>/usr/local/lx_network/shares/" . $share['path'] . "</em></td>";
                    echo "
                        <script>
                        $.ajax({
                            url: 'inc/delete_share.php', type: 'get',
                            data: { 'id': " . $share['id'] . "},
                            success: function(response) {
                                console.log('Deleted');
                            }
                        });
                        </script>
                    ";
                    echo "</tr>";
                } 
                ?>
            </tbody>
        </table>
    </div>
</div>