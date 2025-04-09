<?php 

function archive($id)
{
    global $dbconn;

    $query = "DELETE FROM wisher WHERE id = $id";
    mysqli_query($dbconn, $query);

    return mysqli_affected_rows($dbconn);
}

if(isset($_POST["archive"])) {
    $id = $_GET["wish"];

    if(archive($id) > 0) {
        echo "
            <script>
                alert('Your wish is now archived!');
                document.location.href = '".BASEURL."';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Oops! Failed to archive the wish');
            </script>
        ";
    }
}