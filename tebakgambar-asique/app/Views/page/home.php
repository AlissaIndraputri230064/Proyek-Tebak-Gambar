<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("asique.css") ?>">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="#home"><img src="<?= base_url("image3.png") ?>"></a>  
        </div>
        <ul>
            <li><a href="<?= base_url('page/home'); ?>">HOME</a></li>
            <li><a href="<?= base_url('page/record'); ?>">RECORDS</a></li>
            <li><a href="<?= base_url('page/profile'); ?>">PROFILE</a></li>
        </ul>
    </nav>
    <section class="home">
        <p>
            WELCOME <?= esc($user_name) ?>!
        </p>
        <div class="container-gambar">
            <img src="<?= base_url('image1.png') ?>" alt="Deskripsi gambar" class="gambar">
            <a href="<?= base_url('game/bermain_level'); ?>" class="cta-button">MULAI BERMAIN!</a>
        </div>

    </section>
</body>
</html>