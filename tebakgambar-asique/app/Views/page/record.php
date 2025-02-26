<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("asique.css") ?>">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="<?= base_url("page/home")?>"><img src="<?= base_url("image3.png")?>"></a>  
        </div>
        <ul>
            <li><a href="<?= base_url("page/home")?>">HOME</a></li>
            <li><a href="<?= base_url("page/record")?>">RECORDS</a></li>
            <li><a href="<?= base_url("page/profile")?>">PROFILE</a></li>
        </ul>
    </nav>

    <div class="records">
        <span class="white">YOUR</span> <span class="purple">RECORDS</span>
    </div>
    <div class="details">
        <p>CURRENT LEVEL : <span class="red"><?= $records['current_level'] ?></span></p>
        <p>SCORE : <span class="red"><?= $records['score'] ?></span></p>
    </div>
    
</body>
</html>