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
    <link rel="stylesheet" href="<?= base_url('asique.css') ?>">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="<?= base_url("admin/home_admin")?>"><img src="<?= base_url('image3.png') ?>"></a>  
        </div>
    </nav>

    <div class="form-container">
        <h1>Tambah Gambar</h1>

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

        <form action="<?= base_url('admin/store') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="form-grup">
                <label for="admin_id">Image ID:</label>
                <input type="text" id="image_id" name="image_id" value="<?= set_value('image_id') ?>">
                <span><?= isset($validation) ? display_form_errors($validation, 'text') : '' ?></span>
            </div>
            <div class="form-grup">
                <label for="image">Gambar:</label>
                <input type="file" id="image_img" name="image_img" value="<?= set_value('image_img') ?>">
                <span><?= isset($validation) ? display_form_errors($validation, 'file') : '' ?></span>
            </div>
            <button type="submit" class="btn">Upload</button>
        </form>
    </div>
</body>
</html>