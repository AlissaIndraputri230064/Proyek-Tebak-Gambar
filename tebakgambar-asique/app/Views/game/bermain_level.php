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
            <a href="<?= base_url("page/home")?>"><img src="<?= base_url("image3.png")?>" alt="Logo"></a>
        </div>
        <ul>
            <li><a href="<?= base_url("page/home")?>">HOME</a></li>
            <li><a href="<?= base_url("page/records")?>">RECORDS</a></li>
            <li><a href="<?= base_url("page/profile")?>">PROFILE</a></li>
        </ul>
    </nav>

    <div class="levels">
    <h1>LEVELS</h1>
    <div class="level-grid">
        <?php foreach ($levels as $level): ?>
            <?php if ($level['accessible']): ?>
                <div class="level-box accessible">
                    <a href="<?= base_url('game/play/' . $level['level']) ?>">LEVEL <?= $level['level'] ?></a>
                </div>
            <?php else: ?>
                <div class="level-box locked">
                    LEVEL <?= $level['level'] ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
