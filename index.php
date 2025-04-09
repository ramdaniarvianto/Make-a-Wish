<?php 
require_once "app/init.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Wish <?= $wYear ?></title>
    <link rel="icon" href="<?= BASEURL; ?>/img/wish.ico">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/98721b54aa.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once "templates/header.php" ?>

    <main>
        <!-- POST -->
        <div class="wish post">
            <div class="post-head">
                <p>Make a Wish <span><?= $wYear ?></span></p>
            </div>
            <div class="post-body">
                <div class="pb-img">
                    <img src="<?= BASEURL; ?>/img/ramdani.jpg" alt="Ramdani Arvianto">
                </div>
                <div class="pb-text">
                    <div class="pb-name">
                        <p><b>@</b>Ramdani Arvianto</p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="17px" viewBox="0 -960 960 960" width="17px" fill="#0075FF"><path d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm-42 142 226-226-56-58-170 170-86-84-56 56 142 142Z"/></svg>
                    </div>
                    <div class="pb-wish">
                        <p><span>#Make a Wish!</span> <?= wDay() ?>, apa harapan yang ingin lu wujudkan di tahun <?= $wYear ?>?</p>
                    </div>
                </div>
            </div>
            <div class="post-foot">
                <div class="pf-wishCount">
                    <p><?= $wishesCount ?> Wishes</p>
                </div>
                <div class="pf-links">
                    <a href="https://github.com/ramdaniarvianto" target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/ramdaniarvianto/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="https://youtube.com/@ramdaniarvianto?si=4gxTHmSt90PBY52g" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://www.instagram.com/ramdanlarvianto/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@ramdaniarvianto" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>


        <!-- FORM -->
        <div class="wish form">
            <div class="form-body">
                <div class="fb-img">
                    <img src="<?= BASEURL; ?>/img/nopict.jpg" alt="Nopict">
                </div>
                <div class="fb-text">
                    <div class="fb-name"></div>
                    <div class="fb-wish"></div>
                    <div class="fb-make"><a href="<?= BASEURL; ?>/make-a-wish">Make a Wish</a></div>
                </div>
            </div>
        </div>


        <!-- WISH -->
        <?php foreach ($wishes as $wish) : ?>
        <div class="wish wish">
            <div class="wish-body">
                <div class="wb-img">
                    <img src="<?= BASEURL ?>/img/<?= $wish["img"] ?>" alt="<?= $wish["nama"] ?>">
                </div>
                <div class="wb-text">
                    <div class="wb-name">
                        <p><b>@</b><?= $wish["nama"] ?></p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="17px" viewBox="0 -960 960 960" width="17px" fill="#0075FF"><path d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm-42 142 226-226-56-58-170 170-86-84-56 56 142 142Z"/></svg>
                    </div>
                    <div class="wb-wish">
                        <p><?= $wish["wish"] ?></p>
                    </div>
                </div>
            </div>
            <div class="wish-foot">
                <div class="wf-timestamp">
                    <p><?= date("d M Y ✨ H:i:s", strtotime($wish["timestamp"])) ?></p>
                </div>
                <div class="wf-action">
                    <a href="<?= BASEURL; ?>/modify-wish?w=<?= $wish["id"]; ?>" class="modify"><i class="fa-regular fa-pen-to-square"></i> Modify Wish</a>
                    <form action="?wish=<?= $wish["id"]; ?>" method="POST"><button type="submit" name="archive" class="archive" onclick="return confirm('Are you sure you want to archive this wish?')"><i class="fa-regular fa-trash-can"></i> Archive Wish</button></form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </main>

    <?php require_once "templates/footer.php" ?>
</body>
</html>