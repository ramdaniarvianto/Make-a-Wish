<?php 
require "functions.php";

$id = $_GET["id"];

if ( archivewish($id) > 0 ) {
    echo "
        <script>
            alert('Your wish is now archived!');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Oops! Failed to archive the wish');
        </script>
    ";
}
?>