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
    <link rel="stylesheet" href="<?= base_url() ?>css/style-menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">


    <title>Prime Forklift</title>
    <script>
        const baseUrl = '<?php echo base_url(); ?>';
        const apiURL = "<?php echo getenv('NODE_API_URL'); ?>";

        function setlanguages(lang){
        sessionStorage.setItem("language", lang);
    }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparan">
        <a class="navbar-brand" href="#"><img src="<?= base_url() ?>img/bg-menu.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul id="menuListWhite" class="navbar-nav ml-auto">
                
            </ul>
        </div>
    </nav>