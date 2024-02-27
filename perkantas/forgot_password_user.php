<?php
// session_start();
include "php/connect.php";

// if(isset($_SESSION['login']) ){
//     header("Location: ./participant/coming_soon.php");
//     exit;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Griya Pulih Asih - Reset Password</title>
    <link href="assets/logo.png" rel="icon" />

    <!-- Library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
    /* @font-face {
        font-family: alice_in_wonderland_3;
        src: url(assets/font/Alice_in_Wonderland_3.ttf)
    } */

    * {
        transition: .2s ease-in-out;
    }

    body {
        background-color: #FFCC70;
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
        /* box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); */
    }

    .form-title {
        font-size: 40px;
        line-height: 1.75rem;
        font-weight: 600;
        text-align: center;
        /* color: #29351d; */
        /* color: #000; */
        /* font-family: alice_in_wonderland_3; */
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
        /* box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); */
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
        /* font-family: alice_in_wonderland_3; */
    }

    .signup-link a {
        text-decoration: underline;
        cursor: pointer;
    }

    .load-6 .letter {
        animation-name: loadingF;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-direction: linear;

        font-size: 80px;
        line-height: 1.75rem;
        font-weight: 600;
        text-align: center;
        color: #29351d;
        /* color: #000; */
        /* font-family: alice_in_wonderland_3; */
    }

    .l-1 {
        animation-delay: 0.48s;
    }

    .l-2 {
        animation-delay: 0.6s;
    }

    .l-3 {
        animation-delay: 0.72s;
    }

    .l-4 {
        animation-delay: 0.84s;
    }

    .l-5 {
        animation-delay: 0.96s;
    }

    .l-6 {
        animation-delay: 1.08s;
    }

    .l-7 {
        animation-delay: 1.2s;
    }

    .l-8 {
        animation-delay: 1.32s;
    }

    .l-9 {
        animation-delay: 1.44s;
    }

    .l-10 {
        animation-delay: 1.56s;
    }

    .l-11 {
        animation-delay: 1.68s;
    }

    .l-12 {
        animation-delay: 1.80s;
    }

    @keyframes loadingF {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .letter-holder {
        justify-content: center;
        align-items: center;
    }



    @media screen and (min-width: 900px) {
        .form {
            scale: 1.2;
        }
    }

    @media screen and (max-width: 900px) {
        .load-6 {
            scale: 0.6;
        }
    }
</style>

<body>
    <div class="load-6">
        <div class="letter-holder" id="req" style="display: flex; font-size: 70px">
            <div class="l-1 letter">R</div>
            <div class="l-2 letter">e</div>
            <div class="l-3 letter">q</div>
            <div class="l-4 letter">u</div>
            <div class="l-5 letter">e</div>
            <div class="l-6 letter">s</div>
            <div class="l-7 letter">t</div>
            <div class="l-8 letter">i</div>
            <div class="l-9 letter">n</div>
            <div class="l-10 letter">g</div>
            <div class="l-11 letter">.</div>
            <div class="l-12 letter">.</div>
        </div>
    </div>
    <div class="reset-container" id="rstForm" style="transition: 1s ease-in-out;">


        <form class="form">
            <p class="form-title">Forgot Password</p>
            <!-- p1 -->
            <div class="p1" id="p1">
                <div class="input-container">
                    <input type="text" name="teamNameRst" id="teamNameRst" placeholder="Email" required onkeyup="checkTeam()">
                </div>
                <center>
                    <input type="submit" name="submitRst" id="submitRst" class="submit" value="Submit" disabled>
                </center>
                <p class="signup-link" style="color: #29351d;" id="signIn">
                    Already have an account? <a href="user/" style="color: #29351d;">Sign In</a>
                </p>
            </div>

            <!-- p2 -->
            <div class="p2" id="p2">
                <div class="input-container">
                    <input type="text" name="otpIn" id="otpIn" placeholder="OTP Code" required onkeyup="checkOTP()">
                </div>
                <center style="display:flex; flex-direction: row;">
                    <input type="submit" name="back" id="back" class="submit" style="width: 50%; margin-left:20px;margin-right:20px;" value="back">
                    <input type="submit" name="confirmOTP" id="confirmOTP" class="submit" style="width: 50%; margin-left:20px; margin-right:20px;" value="confirm" disabled>
                </center>
            </div>

            <!-- p3 -->
            <div class="p3" id="p3">
                <div class="input-container">
                    <input type="password" name="newPass" id="newPass" placeholder="New Password" required onkeyup="checkPass()">
                </div>
                <div class="input-container">
                    <input type="password" name="confirmPass" id="confirmPass" placeholder="New Password Confirmation" required onkeyup="checkConfirm()">
                </div>
                <center>
                    <input type="submit" name="resetPass" id="resetPass" class="submit" value="reset" disabled>
                </center>
            </div>

            <p class="signup-link" style="color: #29351d; display: none;" id="getOTP">
                Not receive an email? <a style="color: #29351d;text-decoration: underline;">Send OTP</a>
            </p>
        </form>
    </div>
    <script>
        var newPass = false;
        var confirmPass = false;
        var teamNameRst = $("#teamNameRst").val();

        function checkPass() {
            if ($('#newPass').val().length >= 8) {
                newPass = true;
                $('#resetPass').attr('disabled', false);
            }
            if ($('#newPass').val().length < 8) {
                newPass = false;
                $('#resetPass').attr('disabled', true);
            }

            if ($('#newPass').val() == $('#confirmPass').val()) {
                confirmPass = true;
                $('#confirmPass').css("color", "#29351d");
                $('#resetPass').attr('disabled', false);
            } else {
                confirmPass = false;
                $('#confirmPass').css("color", "red");
                $('#resetPass').attr('disabled', true);
            }
        }

        function checkConfirm() {
            if ($('#newPass').val() == $('#confirmPass').val()) {
                confirmPass = true;
                $('#confirmPass').css("color", "#29351d");
                $('#resetPass').attr('disabled', false);
            } else {
                confirmPass = false;
                $('#confirmPass').css("color", "red");
                $('#resetPass').attr('disabled', true);
            }
        }

        function checkTeam() {
            if ($('#teamNameRst').val().length > 0) {
                $('#submitRst').attr('disabled', false);
                teamNameRst = $("#teamNameRst").val();
            }
            if ($('#teamNameRst').val().length < 1) {
                $('#submitRst').attr('disabled', true);
            }
        };

        function checkOTP() {
            if ($('#otpIn').val().length == 6) {
                $('#otpIn').css("color", "black");
                $('#confirmOTP').attr('disabled', false);
            } else {
                $('#otpIn').css("color", "red");
                $('#confirmOTP').attr('disabled', true);
            }
        }

        $('#back').on('click', function(e) {
            e.preventDefault(e);
            $('#p2').hide();
            $('#p1').show();
        });


        $(document).ready(function() {
            // $('#rstForm').hide();
            $('#req').hide();
            $('#p2').hide();
            $('#p3').hide();
        });

        $('#submitRst').on('click', function(e) {
            e.preventDefault(e);
            // team
            // var teamNameRst = $("#teamNameRst").val();
            $('#rstForm').hide();
            $('#req').show();
            $.ajax({
                type: 'POST',
                data: {
                    teamNameRst: teamNameRst
                },
                url: 'php/request_otp_user.php',
                success: function(res) {
                    console.log(res);
                    data = JSON.parse(res);
                    // console.log(data)
                    if (data['error'] == 0) {
                        // $('#rstForm').hide();
                        $('#req').hide();
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: data['sm'],
                            allowOutsideClick: false,
                            confirmButtonText: 'OK',
                            willClose: () => {
                                $('#p1').hide();
                                $('#p2').show();
                                // $('#req').hide();
                                $('#rstForm').css("opacity", "0");
                                $('#rstForm').show();
                                $('#rstForm').css("opacity", "1");
                            }
                        });
                    } else if (data['error'] == 1) {
                        // $('#rstForm').hide();
                        $('#req').hide();
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: data['em'],
                            confirmButtonText: 'Close',
                            willClose: () => {
                                $('#rstForm').css("opacity", "0");
                                $('#rstForm').show();
                                $('#rstForm').css("opacity", "1");
                            }
                        });
                    } else {
                        // $('#rstForm').hide();
                        $('#req').hide();
                        Swal.fire({
                            title: 'Error',
                            text: 'Please try again!!',
                            icon: 'error',
                            confirmButtonText: 'Close',
                            willClose: () => {
                                $('#rstForm').css("opacity", "0");
                                $('#rstForm').show();
                                $('#rstForm').css("opacity", "1");
                            }
                        });
                    }
                },
                error: function() {
                    $('#rstForm').hide();
                    Swal.fire({
                        title: 'Error',
                        text: 'Please try again!!',
                        icon: 'error',
                        confirmButtonText: 'Close',
                        willClose: () => {
                            $('#rstForm').css("opacity", "0");
                            $('#rstForm').show();
                            $('#rstForm').css("opacity", "1");
                        }
                    });
                }
            });
        });

        $('#confirmOTP').on('click', function(e) {
            e.preventDefault(e);

            var otpIn = $("#otpIn").val();

            $.ajax({
                type: 'POST',
                data: {
                    teamNameRst: teamNameRst,
                    otpIn: otpIn
                },
                url: 'php/check_otp_user.php',
                success: function(res) {
                    console.log(res);
                    data = JSON.parse(res);
                    // console.log(data)
                    if (data['error'] == 0) {
                        $('#rstForm').hide();
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: data['sm'],
                            allowOutsideClick: false,
                            confirmButtonText: 'OK',
                            willClose: () => {
                                $('#p2').hide();
                                $('#p3').show();
                                $('#rstForm').css("opacity", "0");
                                $('#rstForm').show();
                                $('#rstForm').css("opacity", "1");
                            }
                        });
                    } else if (data['error'] == 1) {
                        $('#rstForm').hide();
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: data['em'],
                            confirmButtonText: 'Close',
                            willClose: () => {
                                $('#rstForm').css("opacity", "0");
                                $('#rstForm').show();
                                $('#rstForm').css("opacity", "1");
                            }
                        });
                    } else {
                        $('#rstForm').hide();
                        Swal.fire({
                            title: 'Error',
                            text: 'Please try again!!',
                            icon: 'error',
                            confirmButtonText: 'Close',
                            willClose: () => {
                                $('#rstForm').css("opacity", "0");
                                $('#rstForm').show();
                                $('#rstForm').css("opacity", "1");
                            }
                        });
                    }
                },
                error: function() {
                    $('#rstForm').hide();
                    Swal.fire({
                        title: 'Error',
                        text: 'Please try again!!',
                        icon: 'error',
                        confirmButtonText: 'Close',
                        willClose: () => {
                            $('#rstForm').css("opacity", "0");
                            $('#rstForm').show();
                            $('#rstForm').css("opacity", "1");
                        }
                    });
                }
            });
        });

        $('#resetPass').on('click', function(e) {
            e.preventDefault(e);
            // team
            var newPass = $("#newPass").val();

            $.ajax({
                type: 'POST',
                data: {
                    teamNameRst: teamNameRst,
                    newPass: newPass
                },
                url: 'php/change_password_user.php',
                success: function(res) {
                    console.log(res);
                    data = JSON.parse(res);
                    // console.log(data)
                    if (data['error'] == 0) {
                        $('#rstForm').hide();
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: data['sm'],
                            allowOutsideClick: false,
                            confirmButtonText: 'OK',
                            willClose: () => {
                                window.location = 'user/';
                            }
                        });
                    } else if (data['error'] == 1) {
                        $('#rstForm').hide();
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: data['em'],
                            confirmButtonText: 'Close',
                            willClose: () => {
                                $('#rstForm').css("opacity", "0");
                                $('#rstForm').show();
                                $('#rstForm').css("opacity", "1");
                            }
                        });
                    } else {
                        $('#rstForm').hide();
                        Swal.fire({
                            title: 'Error',
                            text: 'Please try again!!',
                            icon: 'error',
                            confirmButtonText: 'Close',
                            willClose: () => {
                                $('#rstForm').css("opacity", "0");
                                $('#rstForm').show();
                                $('#rstForm').css("opacity", "1");
                            }
                        });
                    }
                },
                error: function() {
                    $('#rstForm').hide();
                    Swal.fire({
                        title: 'Error',
                        text: 'Please try again!!',
                        icon: 'error',
                        confirmButtonText: 'Close',
                        willClose: () => {
                            $('#rstForm').css("opacity", "0");
                            $('#rstForm').show();
                            $('#rstForm').css("opacity", "1");
                        }
                    });
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>