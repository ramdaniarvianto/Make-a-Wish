<?php 
require_once "../app/init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $wYear ?> - Make a Wish</title>
    <link rel="icon" href="<?= BASEURL; ?>/img/wish.ico">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/wish.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/98721b54aa.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once "../templates/header.php" ?>

    <main>
        <div class="back"><a href="<?= BASEURL; ?>">Back</a></div>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form">
                <img src="<?= BASEURL; ?>/img/wish.jpg" alt="Make a Wish">
                <input type="file" name="img" id="img" title="Upload Profile Picture">
            </div>

            <div class="form"><input type="text" name="nama" id="nama" class="nama" placeholder="Your Name" autocomplete="off"></div>

            <div class="form"><textarea name="wish" id="wish" placeholder="Your Wish..." autocomplete="off"></textarea></div>

            <div class="form"><button type="submit" name="make">Make a Wish</button></div>
        </form>
    </main>

    <?php require_once "../templates/footer.php" ?>
</body>
</html>