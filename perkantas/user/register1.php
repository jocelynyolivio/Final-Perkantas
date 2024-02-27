<?php

define("USER_ACCESS", true);

require_once 'connect.php';
require_once 'database/users.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Griya Pulih Asih</title>

    <!-- ICON -->
    <link href="assets/logo.png" rel="icon" />

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/acc3ee9eed.js" crossorigin="anonymous"></script>

    <!-- SWEET ALERT 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
    * {
        transition: .2s ease-in-out;
    }

    body {
        background-color: #76869d;
        width: 100vw;
        height: 100vh;
        max-width: 100vw;
        max-height: 100vh;
        /* display: flex; */
        overflow: hidden;
    }

    .form-container {
        width: 100vw;
        height: 100vh;
        align-items: center;
        justify-content: center;
        display: flex;
    }

    .form {
        background-color: rgba(255, 255, 255, 0.3);
        display: block;
        padding: 30px;
        max-width: 500px;
        border-radius: 0.5rem;
    }

    .form-title {
        font-size: 40px;
        line-height: 1.75rem;
        font-weight: 400;
        text-align: center;
        color: #29351d;
    }

    .input-container {
        position: relative;
    }

    .input-container input,
    .form button {
        outline: none;
        border: 0px solid #e5e7eb;
        margin: 8px 0;
        font-size: 15px;
    }

    .input-container input {
        padding: 1rem;
        padding-right: 3rem;
        font-size: 15px;
        line-height: 1.25rem;
        width: 300px;
        border-radius: 0.5rem;
    }

    .submit {
        display: block;
        padding-top: 0.6rem;
        padding-bottom: 0.6rem;
        background-color: #FF9B50;
        color: rgb(89, 59, 29);
        font-size: 0.875rem;
        line-height: 1.25rem;
        font-weight: 500;
        width: 100%;
        border-radius: 0.5rem;
        border-color: transparent;
        text-transform: uppercase;
    }

    .submit:enabled:hover {
        background-color: rgba(130, 92, 55, 1);
        color: white;
    }

    .signup-link {
        color: #6B7280;
        font-size: 18px;
        line-height: 1.25rem;
        margin-top: 10px;
        margin-bottom: -6px;
        text-align: center;
    }

    .signup-link a {
        text-decoration: underline;
        cursor: pointer;
    }

    @media screen and (min-width: 900px) {
        .form {
            scale: 1.2;
        }
    }

    .fa-eye:hover {
        color: #FF9B50;
        cursor: pointer;
    }

    .fa-eye-slash:hover {
        color: #FF9B50;
        cursor: pointer;
    }

    .dont {
        margin-top: 2vh;
        text-align: center
    }

    .form-title {
        margin-bottom: 5vh;
    }

    .btn:hover {
        background-color: rgba(130, 92, 55, 1) !important;
    }

    .fa-arrow-left {
        font-size: 3rem;
        cursor: pointer;
    }
</style>

<body style="background-color: #FFCC70;">
    <div>

    </div>
    <div class="form-container">
        <form class="form" action="" method="POST">
            <h1 class="form-title m-2">Sign Up As</h1>
            <div class="p1" id="p1" style="margin-top: 30px;">
                <div class="d-grid gap-2 col-8 mx-auto">
                    <a class="btn btn-FF9B50 p-2 m-2" style="background-color: #FF9B50;" href="registerdewasa.php">Dewasa</a>
                    <a class="btn btn-FF9B50 p-2 m-2" style="background-color: #FF9B50;" href="registeranak2.php">Anak-anak</a>
                    <p class="dont">Already Have Account? <a href="login.php" style="color: black;">login</a>
                    </p>
                </div>
            </div>
        </form>

    </div>
</body>
<script>
    $(document).ready(function() {
        $('.fa-eye-slash').hide();
    });

    $('.fa-eye').on('click', function(e) {
        e.preventDefault;
        $('#password').attr('type', 'text');
        $('.fa-eye-slash').show();
        $('.fa-eye').hide();
    });

    $('.fa-eye-slash').on('click', function(e) {
        e.preventDefault;
        $('#password').attr('type', 'password');
        $('.fa-eye').show();
        $('.fa-eye-slash').hide();
    });
</script>

</html>