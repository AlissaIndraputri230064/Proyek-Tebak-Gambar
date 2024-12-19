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
    <link rel="stylesheet" href="<?= base_url("asique.css") ?>">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="<?= base_url("page/home")?>"><img src="<?= base_url("image3.png"); ?>"></a>  
        </div>
        <ul>
            <li><a href="=<?= base_url('auth/login'); ?>">LOG IN</a></li>
        </ul>
    </nav>
    <div class="container">
        <!-- Bagian Kiri -->
        <div class="welcome-section">
            <h1>
                <span class="yellow">WELCOME TO</span><br>
                <span class="red">TEBAK GAMBAR ASIQUE!</span>
            </h1>
            <p class="description">PLAYER BARU DAFTAR DULU..</p>
        </div>

        <!-- Bagian Kanan -->
        <div class="signup-section">
            <h2>SIGN UP</h2>

            <!-- Pesan error atau sukses -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="error-message">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="success-message">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form class="signup-form" method="post" action="<?= base_url("auth/registerUser");?>">
                <input type="email" name="user_email" placeholder="e-mail" value="<?= set_value('user_email') ?>">
                <span><?= isset($validation) ? display_form_errors($validation, 'email') : '' ?></span>
                <input type="username" name="user_name" placeholder="username" value="<?= set_value('user_name') ?>">
                <span><?= isset($validation) ? display_form_errors($validation, 'username') : '' ?></span>
                <input type="password" name="user_password" placeholder="password" value="<?= set_value('user_password') ?>">
                <span><?= isset($validation) ? display_form_errors($validation, 'password') : '' ?></span>
                <input type="password" name="confirm_password" placeholder="confirm password" value="<?= set_value('confirm_password') ?>">
                <button type="submit">SIGN UP</button>
                <p class="login-link">
                    Sudah punya akun? <a href="<?= base_url('auth/login'); ?>">Masuk aja langsung</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>