<?php 
    include "connect.php";
    $sql = "SELECT * FROM user_log
            ORDER BY time DESC";
    $stmt = $con -> prepare($sql);
    $stmt -> execute();
    $result = $stmt -> get_result();
    while ($row = $result -> fetch_assoc()):
?>
    <tr>
        <?php
        // $dateTime = new DateTime($row['time']);

        // // Add 7 hours to the DateTime object
        // $dateTime->modify('+5 hours');

        // // Format the updated DateTime object as a string
        // $updatedTimestamp = $dateTime->format('Y-m-d H:i:s');
        ?>
        <!-- <td><?= $updatedTimestamp?></td> -->
        <td><?= $row['time']?></td>
        <td class="nama text-break" style="padding-left: 30px;"><?= $row['user_name'] ?></td>
        <td class="aktv" style="padding-left: 40px;"><?= $row['activity'] ?></td>
    </tr>
<?php endwhile; ?>