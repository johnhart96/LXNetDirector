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
                sdfsdf
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card">
            <div class="card-header"><strong>Supplier info:</strong></div>
            <div class="card-body">
                sdfsdf
            </div>
        </div>
    </div>
</div>