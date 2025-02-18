<?php 
require "functions.php";

$id = $_GET["id"];

$wish = query("SELECT * FROM wish WHERE id = $id")[0];

if ( isset($_POST["submit"]) ) {
    if ( modifywish($_POST) > 0 ) {
        echo "
            <script>
                alert('Your wish has been modified!');
                document.location.href = 'index.php';
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $year; ?> - Modify Wish</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bricolage+Grotesque|DynaPuff|Dela+Gothic+One|Unbounded|Montserrat+Subrayada|Climate+Crisis|Rubik+Beastly|Oi|Rubik+Spray+Paint">
    <link rel="stylesheet" href="makewish.css">
    <script src="https://kit.fontawesome.com/98721b54aa.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav>&nbsp;</nav>
    
    <main>
        <a href="index.php" class="tambah-kembali">Back</a>
        <!-- TAMBAH FORM -->
        <div class="tambah-form">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $wish["id"] ?>">
                <input type="hidden" name="oldPict" id="oldPict" value="<?= $wish["pict"] ?>">
                <div class="tambah-img">
                    <img src="images/<?= $wish["pict"] ?>">
                    <input type="file" name="pict" id="pict" title="Modify Profile Picture">
                </div>
                <div class="tambah-name">
                    <input type="text" name="nama" id="nama" value="<?= $wish["nama"] ?>" placeholder="Modify Name" autocomplete="off">
                </div>
                <div class="tambah-comment">
                    <textarea name="wish" id="wish" placeholder="Modify Wish..."><?= $wish["wish"] ?></textarea>
                </div>
                <div class="tambah-button">
                    <button type="submit" name="submit">Modify Wish</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>