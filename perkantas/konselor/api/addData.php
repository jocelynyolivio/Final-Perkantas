<?php
include 'connect.php';

if (!$_SESSION['login-konselor'])
{
    echo "
        <script>
            alert('Please sign in first ');
        </script>
    ";

    header("Location: ../../konselor.php");
    exit;
} else {
    $data = $_SESSION['login-konselor'];
    $result = mysqli_query($con, "SELECT * FROM `konselor_info` WHERE `nama_konselor` =  '$data'");
    $row = mysqli_fetch_assoc($result);
    // $c = $row['admin_status'];

    if ($row['konselor_status'] == "NOT ACTIVE") {
        echo "
            <script>
                alert('Please sign in first ');
            </script>
        ";

        header("Location: logout_konselor.php");
        exit;
    }
}

$data = $_SESSION['login-konselor'];
$result = mysqli_query($con, "SELECT * FROM `konselor_info` WHERE `nama_konselor` =  '$data'");
$row = mysqli_fetch_assoc($result);

$check_konselor = $row['konselor_email'];
$list_file = array($_FILES['surat']);
$list_file_upload = [];
$list_file_path = [];

for ($i = 0; $i < sizeof($list_file); $i++) {
    if (isset($list_file[$i])) {
        $img_name = $list_file[$i]['name'];
        $img_size = $list_file[$i]['size'];
        $error = $list_file[$i]['error'];

        if ($error === 0) {
            if ($img_size > 5000000) {
                $em = "File size is to big! Please upload a file with a size below 5MB";
                $error = array('error' => 1, 'em'=> $em, 'type' => 'size');
                echo json_encode($error);

                exit();
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $img_file_name = pathinfo($img_name, PATHINFO_FILENAME);
                $allowed_exs = array("pdf");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    # rename
                    $new_img_name = strtolower($data).'_surat_'.$img_file_name.'.'.$img_ex_lc;

                    # path
                    $path = "../image-data/surat/";
                    $img_upload_path = $path.$new_img_name;

                    array_push($list_file_path, $img_upload_path);
                    array_push($list_file_upload, $new_img_name);
                } else {
                    $em = "File type does not match. Please upload files with type: pdf.";
                    $error = array('error' => 1, 'em'=> $em, 'type' => 'extensions');
                    echo json_encode($error);
                
                    exit();
                }
            }
        } else {
            $em = "An unknown error occured, please try again later";
            $error = array('error' => 1, 'em'=> $em, 'type' => 'unknown');
            echo json_encode($error);

            exit();
        }
    }
}

if (sizeof($list_file_upload) == 1) {
    if ($row['konselor_surat'] != null) {
        if (file_exists($row['konselor_surat'])) {
            // Attempt to delete the file
            if (unlink($row['konselor_surat'])) {
                // echo 'File deleted successfully.';
            } else {
                // echo 'Unable to delete the file.';
            }
        } else {
            // echo 'File does not exist.';
        }
    }

    for ($i = 0; $i < sizeof($list_file); $i++) {
        $tmp_name = $list_file[$i]['tmp_name'];
        move_uploaded_file($tmp_name, $list_file_path[$i]);
    }

    $sql = "UPDATE `konselor_info` SET `konselor_surat`='$list_file_path[0]', `konselor_ttl`='{$_POST['ttl']}', `konselor_status`='ACTIVE' WHERE konselor_email = '$check_konselor'";
    mysqli_query($con, $sql);

    $sm = "Data diri berhasil diupdate!";

    # response array
    $res = array('error' => 0, 'sm'=> $sm);

    echo json_encode($res);
}
?>