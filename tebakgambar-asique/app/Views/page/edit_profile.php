<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("asique.css") ?>">
</head>
<body>
<nav>
        <div class="logo">
            <a href="<?= base_url("page/home")?>"><img src="<?= base_url("image3.png") ?>"></a>  
        </div>
        <ul>
            <li><a href="<?= base_url("page/home")?>">HOME</a></li>
            <li><a href="<?= base_url("page/record")?>">RECORDS</a></li>
            <li><a href="<?= base_url("page/profile")?>">PROFILE</a></li>
        </ul>
    </nav>

    <div class="records">
        <span class="white">YOUR</span> <span class="purple">PROFILE</span>
    </div>
    <form class="profile-form" action="<?= base_url('page/editProfile') ?>" method="post">
    <div class="form-group">
        <label for="name">NAME</label>
        <span>:</span>
        <input type="text" name="user_name" placeholder="Enter your name" value="<?= $user['user_name'] ?? '' ?>">
        <span><?= isset($validation) ? display_form_errors($validation, 'user_name') : '' ?></span>
    </div>
    <div class="form-group">
        <label for="email">EMAIL</label>
        <span>:</span>
        <input type="email" name="user_email" placeholder="Enter your email" value="<?= ($user['email']) ?? '' ?>">
        <span><?= isset($validation) ? display_form_errors($validation, 'user_email') : '' ?></span>
    </div>
    <div class="form-group">
        <label for="password">PASSWORD</label>
        <span>:</span>
        <input type="password" name="user_password" placeholder="Enter your password">
        <span><?= isset($validation) ? display_form_errors($validation, 'user_password') : '' ?></span>
    </div>
    <button type="submit" class="save-button">Save changes</button>
</form>

</body>
</html>