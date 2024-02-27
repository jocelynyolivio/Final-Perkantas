<?php 
    include "connect.php";
    // $data = strtolower($_POST["data"]);
    // $sql = "SELECT * FROM admin_info WHERE LOWER(nama_admin) LIKE '%$data%' ORDER BY counter ASC";
    $sql = "SELECT * FROM admin_info ORDER BY counter ASC";
    $stmt = $con -> prepare($sql);
    $stmt -> execute();
    $result = $stmt -> get_result();
?>
<?php
    $i = 1;
    while ($row = $result -> fetch_assoc()):
?>
    <tr>
        <td><?= $i?></td>
        <td><?= $row['nama_admin'] ?></td>
        <td><?= $row['admin_email'] ?></td>
        <?php if ($_SESSION['login'] == "Admin Utama"): ?>
            <?php if ($row['nama_admin'] == "Admin Utama"): ?>
                <td></td>
            <?php else: ?>
                <td>
                <?php if ($row['admin_status'] == "ACTIVE"): ?>
                    <select class="form-select form-select-<?= $i ?>" id="<?= $row['admin_email'] ?>" aria-label="Floating label select example" style="background-color: green;  color: white; font-weight: bold;" onchange="changeSelected('<?= $i ?>', '<?= $row['admin_email'] ?>')">
                        <option selected hidden value="<?= $row['admin_status'] ?>"><?= $row['admin_status'] ?></option>
                        <option value="NOT ACTIVE" style="background-color: #FFCC70; color: red; font-weight: bold;">NOT ACTIVE</option>
                <?php else: ?>
                    <select class="form-select form-select-<?= $i ?>" id="<?= $row['admin_email'] ?>" aria-label="Floating label select example" style="background-color: red;  color: white; font-weight: bold;" onchange="changeSelected('<?= $i ?>', '<?= $row['admin_email'] ?>')">
                        <option selected hidden value="<?= $row['admin_status'] ?>"><?= $row['admin_status'] ?></option>
                        <option value="ACTIVE" style="background-color: #FFCC70; color: green; font-weight: bold;">ACTIVE</option>
                <?php endif ?>
                </td>
            <?php endif ?>
            <?php if ($row['nama_admin'] == "Admin Utama"): ?>
                <td></td>
            <?php else: ?>
                <td class="trash-icon"><i class="fa-solid fa-trash" style="color: #ff0000;" onclick="removeSelected('<?= $row['admin_email'] ?>')"></i></td>
            <?php endif ?> 
        <?php else: ?>
            <?php if ($row['admin_status'] == "ACTIVE"): ?>
                <td><?= $row['admin_status'] ?></td>
            <?php else: ?>
                <td><?= $row['admin_status'] ?></td>
            <?php endif ?>
        <?php endif ?>
        
    </tr>
    <?php $i++ ?>
<?php endwhile; ?>