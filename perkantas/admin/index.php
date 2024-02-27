<?php
include "api/connect.php";

if (!$_SESSION['login'])
{
    echo "
        <script>
            alert('Please sign in first ');
        </script>
    ";

    header("Location: ../admin.php");
    exit;
} else {
    $data = $_SESSION['login'];
    $result = mysqli_query($con, "SELECT * FROM `admin_info` WHERE `nama_admin` =  '$data'");
    $row = mysqli_fetch_assoc($result);
    // $c = $row['admin_status'];

    if ($row['admin_status'] != "ACTIVE") {
        echo "
            <script>
                alert('Please sign in first ');
            </script>
        ";

        header("Location: api/logout_admin.php");
        exit;
    }
}
?>

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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
    .welcome {
        width: 100vw;
        height: 100vh;
        justify-content: center;
        align-items: center;
        display: flex;
        
    }

    @media screen and (min-width: 899.9px) {
        .welcome h1 {
            scale: 1.2;
        }
    }

</style>
<body>
    <?php include "navbar_admin.php"; ?>
    <center>
        <div class="welcome">
            <h1>Selamat Datang,<br><?=$_SESSION['login']?></h1>
        </div>
    </center>
</body>
<script>
    $('.navbar-collapse').on('shown.bs.collapse', function () {
        $('center').css('filter', 'blur(0.2rem)')
        $('body').css('overflow-y', 'hidden')
        $('center').css('pointer-events', 'none')
    });
    $('.navbar-collapse').on('hidden.bs.collapse', function () {
        $('center').css('filter', '')
        $('body').css('overflow-y', 'visible')
        $('center').css('pointer-events', '')
    });

    $(document).ready(function(){
        function checkStatus() {
            // alert("jalan")
            var adminNama = "<?= $_SESSION['login'] ?>";
            $.ajax({
            type: 'POST',
            data: {adminNama: adminNama},
            url: 'api/checkStatus.php',
            success: function(res) {
                // console.log(res);
                if (res != "ACTIVE") {
                    window.location.href = 'api/logout_admin.php';
                }
            }
        });
        }
        setInterval(function(){
            checkStatus();
        }, 1000);
    });
</script>
</html>