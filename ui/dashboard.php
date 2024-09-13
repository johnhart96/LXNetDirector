<div class="row border-bottom">
    <div class="col">
        <h1>Welcome, <?php echo ucFirst( user() ); ?></h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <p>
            <?php
            $memo = read_setting( "dashboard_memo" );
            if( ! empty( $memo ) ) {
                echo "<div class='alert alert-info'>" . $memo . "</div>";
            }
            ?>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-sm">
        <div class="card">
            <div class="card-header"><strong>Site info:</strong></div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th width="25%">Site name:</th>
                            <td><?php echo read_setting( "site_name" ); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Address:</th>
                            <td><?php echo read_setting( "site_address" ); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Telephone number:</th>
                            <td><?php echo read_setting( "site_telephone" ); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Email:</th>
                            <td><?php echo read_setting( "site_email" ); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card">
            <div class="card-header"><strong>Installer info:</strong></div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th width="25%">Installer name:</th>
                            <td><?php echo read_setting( "installer_name" ); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Project no:</th>
                            <td><?php echo read_setting( "installer_project" ); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Contact telephone:</th>
                            <td><?php echo read_setting( "installer_telephone" ); ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Contact email:</th>
                            <td><?php echo read_setting( "installer_email" ); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header"><strong>Latest logs:</strong></div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date/time</th>
                            <th>Device</th>
                            <th>Level</th>
                            <th>Entry</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getLogs = $db->query( "SELECT * FROM logs ORDER BY id DESC LIMIT 50" );
                        while( $row = $getLogs->fetch( PDO::FETCH_ASSOC ) ) {
                            echo "<tr>";
                            echo "<td>" . date( "Y-m-d H:i:s" , strtotime( $row['stamp'] ) ) . "</td>";
                            echo "<td>" . $row['device'] . "</td>";
                            echo "<td>" . $row['mode'] . "</td>";
                            echo "<td>" . $row['entry'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>