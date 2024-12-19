<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASIQUE! Levels</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('asique.css') ?>">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="<?= base_url("page/home")?>"><img src="<?= base_url("biru.png")?>" alt="Logo"></a>
        </div>
        <ul>
            <li><a href="<?= base_url("admin/home_admin")?>">HOME</a></li>
            <li><a href="<?= base_url("page/records")?>">RECORDS</a></li>
            <li><a href="<?= base_url("page/profile")?>">PROFILE</a></li>
        </ul>
    </nav>

    <div class="form-container">
        <h1>Tambah Soal</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <div style="color:red;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('game/store') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-grup">
                <label for="quiz_id">Quiz ID:</label>
                <input type="text" id="quiz_id" name="quiz_id" value="<?= set_value('quiz_id') ?>">
                <span><?= isset($validation) ? display_form_errors($validation, 'text') : '' ?></span>
            </div>
            <div class="form-grup">
                <label for="image_id">Image ID:</label>
                <input type="text" id="image_id" name="image_id" value="<?= set_value('image_id') ?>">
                <span><?= isset($validation) ? display_form_errors($validation, 'text') : '' ?></span>
            </div>
            <div class="form-grup">
                <label for="correct_answer">Jawaban benar:</label>
                <input type="text" id="correct_answer" name="correct_answer" value="<?= set_value('correct_answer') ?>">
                <span><?= isset($validation) ? display_form_errors($validation, 'text') : '' ?></span>
            </div>
            <div class="form-grup">
                <label for="level">Level:</label>
                <input type="number" id="level" name="level" value="<?= set_value('level') ?>">
                <span><?= isset($validation) ? display_form_errors($validation, 'number') : '' ?></span>
            </div>
            <button type="submit" class="btn">Tambah Soal</button>
        </div>
</body>
</html>
