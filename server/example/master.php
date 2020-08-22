<?php 

$nama = $_POST['nama'];
$usia = $_POST['usia'];
$telp = $_POST['telp'];
$status = $_POST['status'];
$kelamin = $_POST['kelamin'];
$asuransi = $_POST['asuransi'];
$pekerjaan = $_POST['pekerjaan'];
$penghasilan = $_POST['penghasilan'];

    include 'config.php';
    $sql = "INSERT INTO nasabah (`ID`, `Nama`, `Telp`, `Umur`, `Pekerjaan`, `Penghasilan`, `Status_Perkawinan`, `Jenis_Kelamin`, `Kepemilikan_Asuransi`)
    VALUES (NULL, '$nama', '$telp', '$usia', '$pekerjaan', '$penghasilan', '$status', '$kelamin', '$asuransi')";

    $result = mysqli_query($connection , $sql);
    if($result){
        echo "{'status': 'success'}";
    }else {
        echo "error saat query karena : " . mysqli_error($connection) . "<br>";
    }

?>