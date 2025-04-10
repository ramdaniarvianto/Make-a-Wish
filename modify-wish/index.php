<?php 
require_once "../app/init.php";
$id = $_GET["w"];
$wish = query("SELECT * FROM wisher WHERE id = $id")[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $wYear ?> - Modify Wish</title>
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
                <img src="<?= BASEURL; ?>/upload/<?= $wish["img"]; ?>" alt="Make a Wish">
                <input type="file" name="img" id="img" title="Upload Profile Picture">
            </div>

            <div class="form">
                <input type="text" name="nama" id="nama" class="nama" value="<?= $wish["nama"]; ?>" placeholder="Modify Name" autocomplete="off">
                <input type="hidden" name="id" id="id" value="<?= $wish["id"]; ?>">
                <input type="hidden" name="oldImg" id="oldImg" value="<?= $wish["img"]; ?>">
            </div>

            <div class="form"><textarea name="wish" id="wish" placeholder="Modify Wish..." autocomplete="off"><?= $wish["wish"] ?></textarea></div>

            <div class="form"><button type="submit" name="modify">Modify Wish</button></div>
        </form>
    </main>

    <?php require_once "../templates/footer.php" ?>
</body>
</html>