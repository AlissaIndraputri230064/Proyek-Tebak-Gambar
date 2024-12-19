<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEBAK GAMBAR ASIQUE!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('asique.css') ?>">
</head>
<body>
    <nav>
        <div class="logo">
            <a href=""><img src="<?= base_url('image3.png')  ?>"></a>  
        </div>
        <ul>
            <li><a href="<?= base_url('auth/login'); ?>">LOG IN</a></li>
        </ul>
    </nav>
    <main>

        <section class="intro">
            <img src="warna.png">
            <p>Tebak tebakan berbasis gambar yang
            <br>sangat menyenangkan dan mengasah
            <br>kreativitas dalam berpikir!</p>
            <a href="<?= base_url('auth/login'); ?>" class="cta-button">COBA SEKARANG!</a>
        </section>
        <section>
            <img src="#">
        </section>
    </main>
    
</body>
</html>