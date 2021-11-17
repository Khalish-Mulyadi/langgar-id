<?php
include 'koneksi.php';

if ( isset($_POST["submit"]) ) {

    $nama =mysqli_real_escape_string($conn,$_POST['nama']);
    $profesi =mysqli_real_escape_string($conn,$_POST['profesi']);
    $pesan =mysqli_real_escape_string($conn,$_POST['pesan']);
    date_default_timezone_set("Asia/Jakarta");
    $date = date('Y-m-d H:i:s');

    $query = "INSERT INTO review  VALUES 
                ('','$nama','$profesi', '$pesan', '$date')";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        header("location:berhasil.php");
    }
    else {
        echo ("Failed!");
        echo ("<br>");
        echo (mysqli_error($conn));
    }
}
?>