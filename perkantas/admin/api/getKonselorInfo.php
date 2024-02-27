<?php 
    include "connect.php";
    // $data = strtolower($_POST["data"]);
    // $sql = "SELECT * FROM konselor_info WHERE LOWER(nama_konselor) LIKE '%$data%'";
    $sql = "SELECT * FROM konselor_info";
    $stmt = $con -> prepare($sql);
    $stmt -> execute();
    $result = $stmt -> get_result();
    $i = 1;
    while ($row = $result -> fetch_assoc()):
?>
    <tr>
        <td><?= $i?></td>
        <td class="nama text-break" style="padding-left: 30px;"><?= $row['nama_konselor'] ?></td>
        <td class="aktv" style="padding-left: -40px;"><?= $row['konselor_email'] ?></td>
        <td>
        <?php if ($row['konselor_status'] == "ACTIVE"): ?>
            <select class="form-select form-select-<?= $i ?>" id="<?= $row['konselor_email'] ?>" aria-label="Floating label select example" style="background-color: green;  color: white; 
font-weight: bold;" onchange="changeSelected('<?= $i ?>', '<?= $row['konselor_email'] ?>')">
                <option selected hidden value="<?= $row['konselor_status'] ?>"><?= $row['konselor_status'] ?></option>
                <option value="PENDING" style="background-color: #FFCC70; color: #ff6d0d; 
font-weight: bold;">PENDING</option>
                <option value="NOT ACTIVE" style="background-color: #FFCC70; color: red; 
font-weight: bold;">NOT ACTIVE</option>
        <?php elseif ($row['konselor_status'] == "PENDING"): ?>
            <select class="form-select form-select-<?= $i ?>" id="<?= $row['konselor_email'] ?>" aria-label="Floating label select example" style="background-color: #ff6d0d;  color: white; 
font-weight: bold;" onchange="changeSelected('<?= $i ?>', '<?= $row['konselor_email'] ?>')">
                <option selected hidden value="<?= $row['konselor_status'] ?>"><?= $row['konselor_status'] ?></option>
                <option value="ACTIVE" style="background-color: #FFCC70; color: green; 
font-weight: bold;">ACTIVE</option>
                <option value="NOT ACTIVE" style="background-color: #FFCC70; color: red; 
font-weight: bold;">NOT ACTIVE</option>
        <?php else: ?>
            <select class="form-select form-select-<?= $i ?>" id="<?= $row['konselor_email'] ?>" aria-label="Floating label select example" style="background-color: red;  color: white; 
font-weight: bold;" onchange="changeSelected('<?= $i ?>', '<?= $row['konselor_email'] ?>')">
                <option selected hidden value="<?= $row['konselor_status'] ?>"><?= $row['konselor_status'] ?></option>
                <option value="ACTIVE" style="background-color: #FFCC70; color: green; 
font-weight: bold;">ACTIVE</option>
                <option value="PENDING" style="background-color: #FFCC70; color: #ff6d0d; 
font-weight: bold;">PENDING</option>
        <?php endif ?>
        </td>
        <td class="trash-icon"><i class="fa-solid fa-trash" style="color: #ff0000;" onclick="removeSelected('<?= $row['konselor_email'] ?>')"></i></td>
    </tr>
    <?php $i++ ?>
<?php endwhile; ?>