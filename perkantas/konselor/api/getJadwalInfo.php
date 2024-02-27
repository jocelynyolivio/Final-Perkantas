<?php
include "connect.php";
$checkdata = $_SESSION['login-konselor'];
$sqlchck = "SELECT * FROM konselor_info WHERE nama_konselor = '$checkdata'";
$stmt1 = $con->prepare($sqlchck);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();
$newdata = $row1['konselor_email'];

$sql = "SELECT * FROM jadwal_konseling WHERE konselor_email = '$newdata' AND is_show = 0";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$i = 1;
while ($row = $result->fetch_assoc()) :
?>
    <tr>
        <td><?= $i ?></td>

        <td><?= $row['tanggal_konseling'] ?></td>
        <td><?= $row['mulai_konseling'] ?></td>
        <td><?= $row['akhir_konseling'] ?></td>
        <?php if ($row['tipe_service'] == 1) : ?>
            <td>Konseling</td>
        <?php elseif ($row['tipe_service'] == 2) : ?>
            <td>Psikotest</td>
        <?php endif ?>
        <td class="trash-icon"><i class="fa-solid fa-trash" style="color: #ff0000;" onclick="removeSelected('<?= $row['jadwal_konseling_id'] ?>')"></i></td>
    </tr>
    <?php $i++ ?>
<?php endwhile; ?>