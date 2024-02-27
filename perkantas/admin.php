<?php
include "admin/api/connect.php";
if (isset($_SESSION['login']))
{
    header("Location: admin/index.php");
    exit;
}
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
        /* display: flex; */
    }

    .form-container {
        width: 100vw;
        height: 100vh;
        align-items: center;
        justify-content:center;
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

    .input-container input, .form button {
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
</style>
<body style="background-color: #FFCC70;">
    <div class="form-container">
        <form class="form">
            <p class="form-title">Admin Login</p>
            <div class="p1" id="p1" style="margin-top: 30px;">
                <div class="input-container">
                    <input type="text" name="adminEmail" id="adminEmail" placeholder="Email Admin" required>
                </div>
                <div class="input-container">
                    <input type="password" name="adminPass" id="adminPass" placeholder="Password" required><i class="fa-solid fa-eye" style="margin-left: -30px;"></i><i class="fa-solid fa-eye-slash" style="margin-left: -30px;"></i>
                </div>
                <center>
                    <input type="submit" name="login" id="login" class="submit" value="Log In" style="margin-top: 20px;">
                </center>
                <p class="signup-link" style="color: #29351d; margin-top: 20px;" id="signIn">
                    <a href="forgot_password_admin.php" style="color: #29351d;">Forgot Password ?</a>
                </p>
            </div>
        </form>
    </div>
</body>
<script>
    $( document ).ready(function() {
        $('.fa-eye-slash').hide();
    });

    $('.fa-eye').on('click', function(e) {
        e.preventDefault;
        $('#adminPass').attr('type', 'text');
        $('.fa-eye-slash').show();
        $('.fa-eye').hide();
    });

    $('.fa-eye-slash').on('click', function(e) {
        e.preventDefault;
        $('#adminPass').attr('type', 'password');
        $('.fa-eye').show();
        $('.fa-eye-slash').hide();
    });

    $('#login').on('click', function(e) {
        e.preventDefault(e);
        var adminEmail = $("#adminEmail").val();
        var adminPass = $("#adminPass").val();
        $.ajax({
            type: 'POST',
            data: {adminEmail: adminEmail, adminPass: adminPass},
            url: 'admin/api/login_admin.php',
            success: function(res) {
                console.log(res);
                data = JSON.parse(res);
                // console.log(data)
                if (data['error'] == 0) {
                    Swal.fire({
                        title:'Login berhasil.', 
                        icon:'success', 
                        text:data['sm'], 
                        allowOutsideClick: false,
                        confirmButtonText:'OK', 
                        willClose:() => {
                            window.location.href = 'admin/index.php';
                        }
                    });
                } else if (data['error'] == 1) {
                    Swal.fire({
                        title:'Login gagal.', 
                        icon:'error', 
                        text:data['em'],
                        confirmButtonText:'Close',
                        willClose:() => {
                            
                        }
                    });
                } else {
                    Swal.fire({
                        title:'Error',
                        text:'Silahkan coba lagi!',
                        icon:'error',
                        confirmButtonText:'Close',
                        willClose:() => {
                            
                        }
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title:'Error',
                    text:'Silahkan coba lagi!',
                    icon:'error',
                    confirmButtonText:'Close',
                    willClose:() => {
                            
                    }
                });
            }
        });
    });
</script>
</html>