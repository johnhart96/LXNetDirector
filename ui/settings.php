<div class="row border-bottom">
    <div class="col">
        <h1>Settings</h1>
    </div>
</div>
<div class="row">&nbsp;</div>

<div class="row">
    <div class="col">
        <form method="post">
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
        </form>
    </div>
</div>