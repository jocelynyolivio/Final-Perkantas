<?php
include "connect.php";
$checkdata = $_SESSION['login-konselor'];
$sqlchck = "SELECT * FROM konselor_info WHERE nama_konselor = '$checkdata'";
$stmt1 = $con->prepare($sqlchck);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();
$newdata = $row1['konselor_email'];

$sql = "SELECT * FROM jadwal_konseling WHERE konselor_email = '$newdata' AND (is_show = 1 OR is_show = 2)";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$i = 1;
while ($row = $result->fetch_assoc()) :
?>
    <?php if ($row['is_show'] == 2) : ?>
        <tr style="background-color: greenyellow !important;">
            <td style="background-color: greenyellow !important;"><?= $i ?></td>
        <?php elseif ($row['is_show'] == 1) : ?>
        <tr>
            <td><?= $i ?></td>
        <?php endif ?>

        <?php
        $namaclient = '';
        $checkclient = $row['user_email'];

        // Check in user_dewasa_info
        $sqlclient1 = "SELECT nama FROM user_dewasa_info WHERE user_email = '$checkclient'";
        $stmt2 = $con->prepare($sqlclient1);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($result2->num_rows > 0) {
            // User found in user_dewasa_info
            $row2 = $result2->fetch_assoc();
            $namaclient = $row2['nama'];
        } else {
            // Check in user_anak_info
            $sqlclient2 = "SELECT nama FROM user_anak_info WHERE user_email = '$checkclient'";
            $stmt3 = $con->prepare($sqlclient2);
            $stmt3->execute();
            $result3 = $stmt3->get_result();

            if ($result3->num_rows > 0) {
                // User found in user_anak_info
                $row3 = $result3->fetch_assoc();
                $namaclient = $row3['nama'];
            } else {
                // User not found in both tables
                // You may want to handle this case accordingly
                $namaclient = 'User not found';
            }
        }
        ?>
        <td><?= $namaclient ?></td>
        <td><?= $row['tanggal_konseling'] ?></td>
        <td><?= $row['mulai_konseling'] ?></td>
        <td><?= $row['akhir_konseling'] ?></td>
        <?php if ($row['tipe_service'] == 1) : ?>
            <td>Konseling</td>
        <?php else : ?>
            <td>Psikotest</td>
        <?php endif ?>
        <td><?= $row['metode'] ?></td>
        <!-- <td class="trash-icon"><i class="fa-solid fa-trash" style="color: #ff0000;" onclick="removeSelected('<?= $row['jadwal_konseling_id'] ?>')"></i></td> -->
        <div class="modal fade" id="modal<?= $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bolder" id="staticBackdropLabel">Detail Client</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Keluhan</h5>
                        <p style="margin-bottom: 10px;"><?= $row['keluhan'] ?></p>
                        <h5>Catatan</h5>
                        <?php if ($row['catetan_konseling'] == null) : ?>
                            <div class="input-container">
                                <textarea type="textarea" name="catetan" id="catetan" placeholder="Catatan Konselor" required style="height: 200px; width: 100%; border: 1px solid black;"></textarea>
                            </div>
                        <?php else : ?>
                            <p><?= $row['catetan_konseling'] ?></p>
                        <?php endif ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" id="resetBtn" class="btn btn-secondary">CLOSE</button>
                        <?php if ($row['catetan_konseling'] == null) : ?>
                            <button type="button" name="simpanCatetan" id="simpanCatetan" class="btn" onclick="simpanCatetan('<?= $row['jadwal_konseling_id'] ?>')">SIMPAN</button>
                        <?php else : ?>
                            <button type="button" name="simpanCatetan" id="simpanCatetan" class="btn" disabled>SIMPAN</button>
                        <?php endif ?>

                    </div>
                </div>
            </div>

            <td><button class="btn submit2" data-bs-toggle="modal" data-bs-target="#modal<?= $i ?>">Show Detail</button></td>
        </tr>
        <?php $i++ ?>
    <?php endwhile; ?>