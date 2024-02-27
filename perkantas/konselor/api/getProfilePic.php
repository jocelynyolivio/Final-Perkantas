<?php 
    include "connect.php";
    $checkdata = $_SESSION['login-konselor'];
    $sql = "SELECT * FROM konselor_info WHERE nama_konselor = '$checkdata'";
    $stmt = $con -> prepare($sql);
    $stmt -> execute();
    $result = $stmt -> get_result();
    $row = $result -> fetch_assoc()
    
?>
<?php if ($row['konselor_profil'] == null) : ?>
    <img class="profilepic__image" src="../assets/default.png" width="80px" height="80px" alt="Profibild" />
<?php else : ?>
    <img class="profilepic__image" src="<?= $row['konselor_profil'] ?>" width="80px" height="80px" alt="Profibild" />
<?php endif ?>
<div class="profilepic__content">
    <span class="profilepic__icon"><i class="fas fa-pencil"></i></span>
    <!-- <span class="profilepic__text">Edit Profile</span> -->
</div>