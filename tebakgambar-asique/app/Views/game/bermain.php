<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASIQUE! Level <?= $levelNumber ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("asique.css")?>">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="<?= base_url("page/home")?>"><img src="<?= base_url("image3.png")?>" alt="Logo"></a>
        </div>
    </nav>

    <p class="level">LEVEL <?= $levelNumber ?></p>

    <div class="kotak">
        <?php if (!empty($quiz['image_base64'])): ?>
            <img id="gambar-soal" src="<?= $quiz['image_base64'] ?>" alt="Soal">
        <?php else: ?>
            <p>Gambar soal tidak tersedia.</p>
        <?php endif; ?>
    </div>

    <div class="jawab">
        <p class="jaw">JAWABAN:</p>
        <form method="post" action="<?= base_url('game/check/' . $levelNumber); ?>">
        <input class="textbox" type="text" name="answer" id="jawab" placeholder="Masukkan jawaban kamu" value="<?= set_value('answer') ?>">
            <button class="tombol" type="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>
