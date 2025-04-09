<?php 

function modify($data)
{
    global $dbconn;

    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $wish = htmlspecialchars($data["wish"]);
    $oldImg = htmlspecialchars($data["oldImg"]);

    if($_FILES["img"]["error"] === 4) {
        $img = $oldImg;
    } else {
        $img = upload();
    }

    $query = "UPDATE wisher SET
        nama = '$nama',
        wish = '$wish',
        img = '$img'
        WHERE id = $id
    ";
    mysqli_query($dbconn, $query);

    return mysqli_affected_rows($dbconn);
}

if(isset($_POST["modify"])) {
    if(modify($_POST) > 0) {
        echo "
            <script>
                alert('Your wish has been modified!');
                document.location.href = '".BASEURL."';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Oops! Failed to modify the wish');
            </script>
        ";
    }
}