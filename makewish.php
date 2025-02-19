<?php 
require "functions.php";

if ( isset($_POST["submit"]) ) {
    if ( makewish($_POST) > 0 ) {
        echo "
            <script>
                alert('You\'ve made a Wish!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to make a wish');
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
    <title><?= $year; ?> - Make a Wish</title>
    <link rel="icon" href="images/wish.ico" type="image/x-icon">
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
                <div class="tambah-img">
                    <img src="images/tambah.jpg">
                    <input type="file" name="pict" id="pict" title="Upload Profile Picture">
                </div>
                <div class="tambah-name">
                    <input type="text" name="nama" id="nama" placeholder="Your Name" autocomplete="off" required>
                </div>
                <div class="tambah-comment">
                    <textarea name="wish" id="wish" placeholder="Your Wish..." required></textarea>
                </div>
                <div class="tambah-button">
                    <button type="submit" name="submit">Make a Wish</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>