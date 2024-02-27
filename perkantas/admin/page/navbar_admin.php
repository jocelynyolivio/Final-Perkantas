<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Site - Griya Pulih Asih</title>

    <!-- ICON -->
    <link href="../assets/logo.png" rel="icon" />

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/acc3ee9eed.js" crossorigin="anonymous"></script>

    <!-- SWEET ALERT 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
</head>
<style>
    html{
        scroll-behavior: smooth;
    }

    a {
        text-decoration: none;
    }

    body {
        background-color: black;
    }

    body::-webkit-scrollbar {
        width: 5px;
        background-color: #FFCC70;
    }

    body::-webkit-scrollbar-thumb {
        background-color: #FF9B50;
        border-radius: 10px;
        outline: 3px solid #16160e;
        box-shadow: 6px 6px 0px #16160e;
    }

    .navbar-custom {
        padding: 3px 12px;
        position: relative;
        height: 80px;
    }

    .navbar-custom .navbar-brand img {
        /* width: 70px;
            position: absolute;
            top: 4px; */
        transition: .5s linear;
    }

    .navbar-brand img:hover {
        box-shadow: 0px 0px 272px -10px rgba(255, 255, 255, 0.23);
        -webkit-box-shadow: 0px 0px 272px -10px rgba(255, 255, 255, 0.23);
        -moz-box-shadow: 0px 0px 272px -10px rgba(255, 255, 255, 0.23);
        transition: .5s linear;
    }

    .navbar-custom .navbar-toggler {
        border: 1px solid #fff;
    }

    .navbar-custom .navbar-toggler span {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgb(255, 255, 255)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }

    .border-bottom-s {
        height: 20px;
    }

    .header-border {
        box-shadow: -1px 8px 15px -2px rgba(0, 0, 0, .5);
        /* border-bottom: 2px solid #fdc006; */
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
    }

    .navbar-custom .navbar-nav .nav-item {
        margin: 0 6px;
    }

    .navbar-custom .navbar-nav .nav-item .nav-link {
        text-align: center;
        color: #fff;
        padding: 12px;
        border-radius: 10px;
        position: relative;
        top: 0;
    }

    .navbar-custom .navbar-nav .nav-item .border-white {
        position: relative;
        border-radius: 10px;
    }

    .nav-item {
        transition: .5s linear;
    }

    .nav-item:hover {
        box-shadow: 0px 0px 272px -10px rgba(255, 255, 255, 0.23);
        -webkit-box-shadow: 0px 0px 272px -10px rgba(255, 255, 255, 0.23);
        -moz-box-shadow: 0px 0px 272px -10px rgba(255, 255, 255, 0.23);
        transition: .5s linear;
    }


    .dropdown-menu {
        background: rgba(35, 49, 69, 1);
        box-shadow: 0px 0px 272px -10px rgba(255, 255, 255, 0.23);
        -webkit-box-shadow: 0px 0px 272px -10px rgba(255, 255, 255, 0.23);
        -moz-box-shadow: 0px 0px 272px -10px rgba(255, 255, 255, 0.23);

        /* opacity: 0; */
        /* transition: .2 linear; */
        animation: showdropdown .5s linear;

    }

    a.dropdown-item {
        color: white;
        /* transition: .2 linear; */
    }

    @keyframes showdropdown {
        from {
        opacity: 0;
        }

        to {
        opacity: 1;
        }
    }

    @media screen and (min-width: 991.9px) {
        .dropdown-menu#event {
        margin-left: -25px;
        margin-top: 10px;
        }

        .dropdown-menu#regist {
        margin-left: -50px;
        margin-top: 10px;
        }
    }

    @media screen and (max-width: 1150px) {
        .navbar-custom .navbar-nav .nav-item .nav-link {
        padding: 7px;
        }
    }

    @media screen and (max-width: 991.9px) {
        .navbar-custom {
        padding: 0 6px
        }

        .navbar-brand {
            margin-top: 10px !important;
        }

        .navbar-custom .navbar-brand img.logo {
        position: relative;
        top: 0;
        left: -7px
        }

        .navbar-custom .navbar-collapse {
        margin-top: 50px;
        background: rgba(35, 49, 79, .5);
        border-radius: 8px;
        box-shadow: 0 0 5px #555;
        }

        .navbar-custom .navbar-toggler:focus {
        outline: none !important;
        box-shadow: none !important;
        }

        .navbar-custom .navbar-nav .nav-item .nav-link {
        border-radius: 12px;
        padding: 12px;
        text-align: left;
        }
    }
</style>
<body style="background-color: #FFCC70;">
    <!-- NAVBAR -->
    <div class="header-border" style="z-index: 1000; background-color: #FF9B50;">
        <nav class="navbar navbar-expand-lg navbar-custom bg-dark bg-opacity-50"
        style="background: #23314F; backdrop-filter: blur(0.2rem); z-index: 1000;">
            <div div class="container-fluid">
                <div class="navbar-brand" style="margin-bottom: 20px; margin-top: 20px">
                    <a href="" target="_blank">
                        <img src="../assets/logo.png" width="50px" height="50px" alt="">
                    </a>
                    <a href="" style="color: white; text-decoration: none; margin-left: 10px;">
                        GRIYA PULIH ASIH
                    </a>
                </div>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation" style="margin-top: -10px;">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" style="margin-top: 0px;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <ul class="navbar-nav mb-2 mb-lg-0" style="margin-top: -5px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">BERANDA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="konselor_page.php" role="page">KONSELOR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_page.php" role="page">ADMIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logs_page.php" role="page">LOGS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../api/logout_admin.php" role="page">LOGOUT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>
</html>