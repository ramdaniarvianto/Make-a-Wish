<?php 

function archive($id, $img)
{
    global $dbconn;

    $filePath = "upload/" . $img;
    if(file_exists($filePath)) {
        unlink($filePath);
    }

    $query = "DELETE FROM wisher WHERE id = $id";
    mysqli_query($dbconn, $query);

    return mysqli_affected_rows($dbconn);
}

if(isset($_POST["archive"])) {
    $id = $_GET["wish"];
    $img = $_GET["img"];

    if(archive($id, $img) > 0) {
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