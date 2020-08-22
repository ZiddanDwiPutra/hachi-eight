<?php 

// $data = $_GET['q'];


// $QC = array();
// $QC += [ "nama" => $_GET['q0'] ];
// $QC += [ "umur" => $_GET['q1'] ];

    include 'config.php';
    $select = "select * ";
    $from = "from nasabah ";
	$sql = $select.$from.';';

    $fieldName = array('ID', "Nama", "Telp", "Pekerjaan", "Umur", "Penghasilan", "Jenis_Kelamin", "Kepemilikan_Asuransi", "Status_Perkawinan");
	$result = mysqli_query($connection , $sql);
    if($result){
        $myObj  = new \stdClass();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $myObj->data[$i] = $row;
            $i++;
        }
        $myObj->fieldName = $fieldName;
        $myJSON = json_encode($myObj);
        echo $myJSON;
    }else {
        echo "error saat query karena : " . mysqli_error($connection) . "<br>";
    }

?>