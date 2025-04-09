<?php 

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "wish";

$dbconn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

function query($query)
{
    global $dbconn;

    $dbresult = mysqli_query($dbconn, $query);
    $dbrows = [];
    while($dbrow = mysqli_fetch_assoc($dbresult)) {
        $dbrows[] = $dbrow;
    }

    return $dbrows;
}

$wishes = query("SELECT * FROM wisher");
$wishesCount = count(query("SELECT * FROM wisher"));