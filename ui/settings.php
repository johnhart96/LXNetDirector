<div class="row border-bottom">
    <div class="col">
        <h1>Settings</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <?php
        if( isset( $_POST['submit'] ) ) {
            unset( $_POST['submit'] );
            foreach( $_POST as $key => $value ) {
                $value = filter_var( $value , FILTER_UNSAFE_RAW );
                write_setting( $key , $value );
            }
            echo "<div class='alert alert-success'>Settings saved!</div>";
        }
        ?>
    </div>
</div>

<div class="row">
    <div class="col">
        <form method="post">
            <table width="100%">
                <tr>
                    <td>&nbsp;</td>
                    <td width="1"><button type="submit" name="submit" class="btn btn-success">Save</button></td>
                </tr>
            </table>
            <h2>Site info:</h2>

            <div class="form-group">
                <label for="site_name">Site name:</label>
                <input name="site_name" value="<?php echo read_setting( "site_name" ); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="site_address">Address:</label>
                <input name="site_address" value="<?php echo read_setting( "site_address" ); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="site_telephone">Telephone:</label>
                <input name="site_telephone" value="<?php echo read_setting( "site_telephone" ); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="site_email">Email:</label>
                <input name="site_email" value="<?php echo read_setting( "site_email" ); ?>" class="form-control">
            </div>

            <h2>Installer info:</h2>
            <div class="form-group">
                <label for="installer_name">Installer name:</label>
                <input name="installer_name" value="<?php echo read_setting( "installer_name" ); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="installer_project">Project no:</label>
                <input name="installer_project" value="<?php echo read_setting( "installer_project" ); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="installer_telephone">Telephone:</label>
                <input name="installer_telephone" value="<?php echo read_setting( "installer_telephone" ); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="installer_email">Email:</label>
                <input name="installer_email" value="<?php echo read_setting( "installer_email" ); ?>" class="form-control">
            </div>

        </form>
    </div>
</div>