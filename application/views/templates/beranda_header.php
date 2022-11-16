<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('templates/meta.php'); ?>
        <?php $this->load->view('templates/css.php'); ?>
        <link rel="icon" type="image/png" href="<?= base_url('assets/img/header/01.png'); ?>">
        <title><?= $judul; ?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url(); ?>">
                    <img src="<?= base_url('assets/img/header/02.png'); ?>" alt="Kredit Tok">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link awal" href="<?= base_url($link); ?>"><?= $judulNav; ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>