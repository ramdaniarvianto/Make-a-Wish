<?php 
$year = date("Y");

function greeting() { 
    date_default_timezone_set("Asia/Jakarta");
    $time = date("H");

    if ( $time >= 4 && $time < 12 ) {
        $day = "Pagi";
    } elseif ( $time >= 12 && $time < 16 ) {
        $day = "Siang";
    } elseif ( $time >= 16 && $time < 19 ) {
        $day = "Sore";
    } else {
        $day = "Malam";
    }

    return "$day";
}

$dbconn = mysqli_connect("localhost", "root", "", "vanilla");

function query($query) {
    global $dbconn;

    $dbresult = mysqli_query($dbconn, $query);
    $dbrows = [];
    while ( $dbrow = mysqli_fetch_assoc($dbresult) ) {
        $dbrows[] = $dbrow;
    }

    return $dbrows;
}

function makewish($data) {
    global $dbconn;

    $name = htmlspecialchars($data["nama"]);
    $wish = htmlspecialchars($data["wish"]);
    $pict = upload();

    if ( !$pict ) {
        return false;
    }

    $query = "INSERT INTO wish VALUES
        ('', '$name', '$wish', '$pict')
    ";
    mysqli_query($dbconn, $query);

    return mysqli_affected_rows($dbconn);
}

function modifywish($data) {
    global $dbconn;

    $id = htmlspecialchars($data["id"]);
    $name = htmlspecialchars($data["nama"]);
    $wish = htmlspecialchars($data["wish"]);
    $oldPict = htmlspecialchars($data["oldPict"]);

    if ( $_FILES["pict"]["error"] === 4 ) {
        $pict = $oldPict;
    } else {
        $pict = upload();
    }

    $query = "UPDATE wish SET
        nama = '$name',
        wish = '$wish',
        pict = '$pict'
        WHERE id = $id
    ";
    mysqli_query($dbconn, $query);

    return mysqli_affected_rows($dbconn);
}

function upload() {
    $nameFile = $_FILES["pict"]["name"];
    $error = $_FILES["pict"]["error"];
    $tmpName = $_FILES["pict"]["tmp_name"];

    if ( $error === 4 ) {
        echo "
            <script>
                alert('You haven\'t uploaded a profile picture yet!');
            </script>
        ";
        return false;
    }

    $ekstensiGambarValid = ["jpg", "jpeg", "png", "ico"];
    $ekstensiGambar = explode(".", $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "
            <script>
                alert('The file you uploaded isn't an image!');
            </script>
        ";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= ".";
    $newFileName .= $ekstensiGambar;

    move_uploaded_file($tmpName, "images/" . $newFileName);

    return $newFileName;
}

function archivewish($id) {
    global $dbconn;

    $query = "DELETE FROM wish WHERE id = $id";
    mysqli_query($dbconn, $query);

    return mysqli_affected_rows($dbconn);
}
?>