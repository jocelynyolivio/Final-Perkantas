<?php

require_once 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivitas</title>

    <!-- ICON -->
    <link href="assets/logo.png" rel="icon" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            padding: 0;
            margin: 0;
            background-color: #FFFADD;
        }

        .card-body{
            background-color: lightgoldenrodyellow;
        }

        .card-footer.text-muted{
            background-color: #FF9B50;
            position: absolute;
            top: 0;
            right: 0;
            height: 5vh;
            text-align: center;
        }
        .activity{
            text-align: center;
        }


    </style>
</head>
<body>
<?php include "navbar.php" ?>
    <div class="pengantar p-5 col-12">
    <h3 class="activity"><b>KEGIATAN KAMI</b></h3>

        <!-- <div class="" style="padding: 5px;">
            <h2 class="blockquote text-center">Our Activity</h2>
            <p class="blockquote text-center">XXX</p>
        </div> -->
       
        <h3>NOVEMBER 2023</h3>
        <div class="card text-center" style="margin-top: 30px;">
            <div class="card-body">
                <h5 class="card-title">Parenting Gathering</h5>
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
                    of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="card-footer text-muted">
                <p>13 November 2023</p>
            </div>
        </div>

        <div class="card text-center" style="margin-top: 30px;">
            <div class="card-body">
                <h5 class="card-title">Manpro coaching</h5>
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
                    of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="card-footer text-muted">
                29 November 2023
            </div>
        </div>

            <h3>DESEMBER 2023</h3>
        <div class="card text-center" style="margin-top: 30px;">
            <div class="card-body">
                <h5 class="card-title">Parenting Gathering</h5>
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
                    of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="card-footer text-muted">
                14 Desember 2022
            </div>
        </div>

        <div class="card text-center" style="margin-top: 30px;">
            <div class="card-body">
                <h5 class="card-title">Manpro coaching</h5>
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
                    of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="card-footer text-muted">
                21 Desember 2022
            </div>
        </div>
            
    </div>