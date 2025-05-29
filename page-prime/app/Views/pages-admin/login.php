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

        function setlanguages(lang) {
            console.log("saat ini dalam bahasa " + lang);
            sessionStorage.setItem("language", lang);
        }
    </script>

    <style>
        body,
        html {
            height: 100%;
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="height:100vh;">
        <div class="login-container">
            <h4 class="text-center mb-4">Sign In</h4>
            <!-- <form> -->
                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <input type="checkbox" aria-label="Checkbox for following text input">
                    <span>Remember Me</span>
                </div>

                <button type="submit" class="btn btn-primary btn-block" id="login">Sign In</button>
            <!-- </form> -->
        </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
<script src="<?= base_url() ?>js/interactif.js"></script>
<script src="<?= base_url() ?>js/auth.js"></script>