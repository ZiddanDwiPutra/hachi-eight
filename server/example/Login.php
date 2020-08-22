<?php

$Email = $_POST['Email'];
$Pass = $_POST['Password'];
// $Pass = base64_encode(base64_encode($_POST['Password']));

include 'config.php';
$select = "select * ";
$from = "from karyawan ";
$where = "where Email = '$Email' and Pass = '$Pass' ";
$sql = $select.$from.$where.';';

$fieldName = Array( 0=>"ID", 1=>"Nama", 2=>"Email",3=> "Pass");

$result = mysqli_query($connection , $sql);
if($result){
    $myObj  = new \stdClass();
    $i = 0;
    $row = mysqli_fetch_array($result);
    $myObj->data = $row;
    $myObj->data[3] = '****************';
    $myObj->data['Pass'] = '***************';
    while ($row = mysqli_fetch_array($result)) {
        $i++;
    }
    $myObj->q = $sql;
    $myObj->fieldName = $fieldName;
    $myJSON = json_encode($myObj);
    echo $myJSON;
}else {
    echo "error saat query karena : " . mysqli_error($connection) . "<br>";
}


?>