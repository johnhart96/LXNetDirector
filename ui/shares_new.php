<div class="row border-bottom">
    <div class="col">
        <h1>Define a new shared drive</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="btn-group">
            <a href="/shares" class="btn btn-primary">Shares List</a>
        </div>
        <?php
        if( isset( $_POST['submit'] ) ) {
            $share_name = filter_var( $_POST['share_name'] , FILTER_UNSAFE_RAW );
            $guests = filter_var( $_POST['guests'] , FILTER_UNSAFE_RAW );
            $writable = filter_var( $_POST['writable'] , FILTER_UNSAFE_RAW );
            $path = filter_var( $_POST['path'] , FILTER_UNSAFE_RAW );

            $checkIfExists = $db->prepare( "SELECT * FROM shares WHERE share_name =:shareName" );
            $checkIfExists->execute( [ ':shareName' => $share_name ] );
            $count = 0;
            while( $row = $checkIfExists->fetch( PDO::FETCH_ASSOC ) ) {
                $count ++;
            }
            if( $count == 0 ) {
                // Add
                $insert = $db->prepare("
                    INSERT INTO shares
                        (`share_name`,`writable`,`guests`,`path`)
                        VALUES(:share_name,:writable,:guests,:path)
                ");
                $insert->execute(
                    [
                        ':share_name' => $share_name,
                        ':writable' => $writable,
                        ':guests' => $guests,
                        ':path' => $path
                    ]
                );
                echo "<div class='alert alert-success'>Share created!</div>";
            } else {
                echo "<div class='alert alert-danger'><strong>Error: </strong>A share with this name already exists!</div>";
            }
        }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="share_name">Share name:</label>
                <input required name="share_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="writable">Should the share be writable?</label>
                <select name="writable" class="form-control">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="guests">Should guests be able to access this?</label>
                <select name="guests" class="form-control">
                    <option value="yes">Yes</option>
                    <option selected value="no">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="path">Path:</label>
                <input required name="path" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>