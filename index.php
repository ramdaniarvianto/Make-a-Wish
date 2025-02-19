<?php 
require "functions.php";

$wishes = query("SELECT * FROM wish");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Wish <?= $year; ?></title>
    <link rel="icon" href="images/wish.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bricolage+Grotesque|DynaPuff|Dela+Gothic+One|Unbounded|Montserrat+Subrayada|Climate+Crisis|Rubik+Beastly|Oi|Rubik+Spray+Paint">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/98721b54aa.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "nav.php"; ?>

    <main>
        <!-- POST -->
        <div class="post">
            <div class="post-title">
                <p>Make a Wish <span><?= $year; ?></span></p>
            </div>
            <div class="post-wish">
                <div class="post-img">
                    <img src="images/ramdani.jpg">
                </div>
                <div class="post-text">
                    <h4 title="Ramdani Arvianto"><i>@</i>Ramdani Arvianto <svg xmlns="http://www.w3.org/2000/svg" height="17px" viewBox="0 -960 960 960" width="17px" fill="#000000"><path d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm-42 142 226-226-56-58-170 170-86-84-56 56 142 142Z"/></svg></h4>
                    <p><span>#Make a wish!</span> <?= greeting(); ?>, apa harapan yang ingin lu wujudkan di tahun <?= $year; ?>?</p>
                </div>
            </div>
            <div class="post-info">
                <div class="post-info-comment">
                    <?php $wishcount = count($wishes); ?>
                    <p><?= $wishcount; ?> Wishes</p>
                </div>
                <div class="post-info-socmed">
                    <a href="https://www.tiktok.com/@ramdaniarvianto" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://www.linkedin.com/in/ramdaniarvianto/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/ramdanlarvianto/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://youtube.com/@ramdaniarvianto?si=4gxTHmSt90PBY52g" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://github.com/ramdaniarvianto" target="_blank"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>
        </div>

        <!-- FORM COMMENTS -->
        <div class="form-comments">
            <div class="fc-image">
                <img src="images/nopict.jpg">
            </div>
            <div class="fc-text">
                <h4>&nbsp;</h4>
                <p>&nbsp;</p>
                <a href="makewish.php" class="tambah">Make a Wish</a>
            </div>
        </div>

        <!-- COMMENTS -->
        <div class="comments-container">
            <div class="comments-wrap">
                <?php foreach ( $wishes as $wish ) : ?>
                <div class="comment">
                    <div class="comment-wish">
                        <div class="comment-img">
                            <img src="images/<?= $wish["pict"]; ?>">
                        </div>
                        <div class="comment-text">
                            <h4 title="<?= $wish["nama"]; ?>"><i>@</i><?= $wish["nama"]; ?> <svg xmlns="http://www.w3.org/2000/svg" height="17px" viewBox="0 -960 960 960" width="17px" fill="#000000"><path d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm-42 142 226-226-56-58-170 170-86-84-56 56 142 142Z"/></svg></h4>
                            <p><?= $wish["wish"] ?></p>
                        </div>
                    </div>
                    <div class="comment-action">
                        <a href="modifywish.php?id=<?= $wish["id"]; ?>" class="modify"><i class="fa-regular fa-pen-to-square"></i> Modify Wish</a>
                        <a href="archivewish.php?id=<?= $wish["id"]; ?>" class="archive" onclick="return confirm('Are you sure you want to archive this wish?')"><i class="fa-regular fa-trash-can"></i> Archive Wish</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <footer>
        <p><?= $year; ?></p>
    </footer>
</body>
</html>