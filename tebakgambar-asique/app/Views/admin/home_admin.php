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
            <a href="#home"><img src="<?= base_url("biru.png") ?>"></a>  
        </div>
        <ul>
            <li><a href="#home">HOME</a></li>
            <li><a href="#records">RECORDS</a></li>
            <li><a href="#profile">PROFILE</a></li>
            <li><a href="<?= base_url('auth/logout') ?>">LOGOUT</a></li>
        </ul>
    </nav>
    <section class="home">
        <p>
            WELCOME ADMIN!
        </p>
        <div class="container-gambar">
            <img src="<?= base_url('image1.png') ?>" alt="Deskripsi gambar" class="gambar">
            <a href="<?= base_url('admin/tambah_soal'); ?>" class="cta-button">TAMBAH SOAL!</a>
            <a href="<?= base_url('admin/tambah_gambar'); ?>" class="cta-button">TAMBAH GAMBAR!</a>
        </div>
    </section>
</body>
</html>