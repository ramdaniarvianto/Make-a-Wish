<?php 

function make($data)
{
    global $dbconn;

    $nama = htmlspecialchars($data["nama"]);
    $wish = htmlspecialchars($data["wish"]);
    $img = upload();

    if(!$img) {
        return false;
    }

    $query = "INSERT INTO wisher VALUES
        ('', '$nama', '$wish', '$img', CURRENT_TIMESTAMP());
    ";
    mysqli_query($dbconn, $query);

    return mysqli_affected_rows($dbconn);
}

function upload()
{
    $nameFile = $_FILES["img"]["name"];
    $error = $_FILES["img"]["error"];
    $tmpName = $_FILES["img"]["tmp_name"];

    if($error === 4) {
        echo "
            <script>
                alert('You haven\'t uploaded a profile picture yet!');
            </script>
        ";
        return false;
    }

    $extPicValid = ["jpeg", "jpg", "png", "ico"];
    $extPic = explode(".", $nameFile);
    $extPic = strtolower(end($extPic));
    if(!in_array($extPic, $extPicValid)) {
        echo "
            <script>
                alert('The file you uploaded isn't an image!');
            </script>
        ";
        return false;
    }

    $newNameFile = uniqid() . "." . $extPic;

    move_uploaded_file($tmpName, "../upload/{$newNameFile}");

    return $newNameFile;
}

if(isset($_POST["make"])) {
    if(make($_POST) > 0) {
        echo "
            <script>
                alert('You\'ve made a Wish!');
                document.location.href = '".BASEURL."';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to make a wish!');
            </script>
        ";
    }
}