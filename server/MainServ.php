<?php 
    include "config.php";
    include "zee.php";
    include "DBData.php";
    include "DBSetup.php";
    includeAll('service');

    $postMode = count($_GET) == 0;
    if($postMode){
        $path = $_POST['_path'];
        $paramName = $_POST['_paramName'];
        findPostPath($path, $paramName);
    }else{
        $sumQ = $_GET["q"];
        $param = array();
        for ($i=0; $i < $sumQ; $i++) { 
            # code...
            array_push($param, $_GET["q".$i]);
        }
        
        // $arr = array(array("a" => 2), "3");
        // writeThat($param);
    }
?>