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