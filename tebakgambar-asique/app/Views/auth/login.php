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
    <link rel="stylesheet" href="<?= base_url("asique.css"); ?>">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="#home.html"><img src="<?= base_url("image3.png"); ?>"></a>  
        </div>
        <ul>
            <li><a href="<?= base_url('auth/register'); ?>">SIGN IN</a></li>
        </ul>
    </nav>
    <div class="container">
        <!-- Bagian Kiri -->
        <div class="welcome-section">
            <h1>
                <span class="yellow">WELCOME TO</span><br>
                <span class="red">TEBAK GAMBAR ASIQUE!</span>
            </h1>
        </div>

        <!-- Bagian Kanan -->
        <div class="signup-section">
            <h2>LOG IN</h2>

            <!-- Form login -->
            <form class="signup-form" method="post" action="<?= base_url("auth/loginUser");?>">
                <input type="email" name="user_email" placeholder="Email" value="<?= set_value('user_email') ?>">
                <span><?= isset($validation) ? display_form_errors($validation, 'email') : '' ?></span>
                <input type="password" name="user_password" placeholder="Password" value="<?= set_value('user_password') ?>">
                <span><?= isset($validation) ? display_form_errors($validation, 'password') : '' ?></span>
                <button type="submit">LOG IN</button>
                <p class="login-link">
                    Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar dulu</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>