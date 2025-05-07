<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="<?= base_url() ?>img/fav.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">


    <title>Prime Forklift</title>
    <script>
        const baseUrl = '<?php echo base_url(); ?>';
        const apiURL = "<?php echo getenv('NODE_API_URL'); ?>";

        function setlanguages(lang){
        console.log("saat ini dalam bahasa "+lang);
        sessionStorage.setItem("language", lang);
    }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparan">
        <a class="navbar-brand" href="#"><img src="<?= base_url()?>img/wht-1.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-3 active">
                    <a class="nav-link text-white" href="<?= base_url()?>" style="font-color:white;">Beranda <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link text-white" href="<?= base_url()?>tentang-kami">Tentang Kami <span class="sr-only"></span></a>
                </li>
                <li class="nav-item mx-3 dropdown">
                    <a class="nav-link dropdown-toggle text-white" href=" #" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Produk
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url()?>produk">Semua Produk</a>
                        <a class="dropdown-item" href="<?= base_url()?>forklift">Unit Forklift</a>
                        <a class="dropdown-item" href="<?= base_url()?>sparepart">Sparepart</a>
                        <a class="dropdown-item" href="<?= base_url()?>ban">Ban Forklift</a>
                        <a class="dropdown-item" href="<?= base_url()?>battery">Battery</a>
                        <a class="dropdown-item" href="<?= base_url()?>attachement">Attachment</a>
                    </div>
                </li>
                <li class="nav-item mx-3 dropdown">
                    <a class="nav-link dropdown-toggle text-white" href=" #" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Layanan
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url() ?>layanan">Semua Layanan</a>
                        <a class="dropdown-item" href="<?= base_url()?>rental">Rental Forklift</a>
                        <a class="dropdown-item" href="<?= base_url()?>service">Service</a>
                    </div>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link text-white" href="<?= base_url()?>blog">Blog <span class="sr-only"></span></a>
                </li>
                <li class="nav-item mx-3">
                    <button type="button" class="btn btn-primary rounded-pill">Hubungi Kami</button>
                </li>
                <li class="nav-item mx-3 dropdown">
                    <a id="langName" class="nav-link dropdown-toggle text-white" href=" #" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Bahasa
                    </a>
                    <div id="optionLang" class="dropdown-menu" style="background-color: rgba(255, 255, 255, 0);border:none;"></div>
                </li>
            </ul>
        </div>
    </nav>