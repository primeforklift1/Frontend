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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>

    <link href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap4.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap4.js"></script>


    <title>Prime Forklift</title>
    <script>
        var Size = Quill.import('formats/size');
        Size.whitelist = ['10px', '12px', '16px', '18px', '24px', '32px'];
        Quill.register(Size, true);

        const baseUrl = '<?php echo base_url(); ?>';
        const apiURL = "<?php echo getenv('NODE_API_URL'); ?>";

        function setlanguages(lang) {
            sessionStorage.setItem("language", lang);
        }
    </script>

    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .ql-toolbar {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .sidebar {
            width: 250px;
            background-color: rgb(255, 255, 255);
            padding-top: 70px;
            color: #7A7A7A;
            flex-shrink: 0;
            border:1px solid #ccc;
        }

        .sidebar a {
            color: #7A7A7A;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #E5E5E5;
            text-decoration: none;
            color: #807DE7;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            padding-top: 70px;
        }

        .submenu a {
            padding-left: 40px;
            font-size: 0.95rem;
        }
    </style>

    <style>
        .ql-size-10px {
            font-size: 10px;
        }

        .ql-size-12px {
            font-size: 12px;
        }

        .ql-size-16px {
            font-size: 16px;
        }

        .ql-size-18px {
            font-size: 18px;
        }

        .ql-size-24px {
            font-size: 24px;
        }

        .ql-size-32px {
            font-size: 32px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparan">
        <a class="navbar-brand" href="#"><img src="<?= base_url() ?>img/bg-menu.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-3">
                    <a class="nav-link text-white" href="#">
                        <div style="width: 50px;height:50px;border-radius:50%;background-color:#171717;display: flex; align-items: center; justify-content: center;"">DN</div>
                        </a>
                </li>
            </ul>
        </div>
    </nav>