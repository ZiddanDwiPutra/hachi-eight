<?php  
    class Zee{
        public static function array_findFirst($array, $id, $prop){
            foreach($array as $key => $val){
                if($val[$prop] == $id){
                    return $val;
                }
            }
            return null;
        }
    }

    function writeHTML($text){
        // print($text);
        echo $text;
    }
    function writeThat($param){
        foreach ($param as $key => $val) {
            if(is_array($val)){
                writeThat($val);
            }else{
                writeHTML("$key : ".$val.";<br>");
            }
        }
    }
    function includeAll($folderName){
        foreach(glob($folderName."/*.php") as $fileName){
            include $fileName;
        }
    }

    $GLOBALS['pathPost'] = array();

    function addPathPost($id, $object){
        array_push($GLOBALS['pathPost'], array(("obj")=> $object, "id" => $id));
    }

    function findPostPath($id, $paramName){
        $obj = Zee::array_findFirst($GLOBALS['pathPost'], $id, "id");
        if($obj != null){
            // $obj["func"]($_POST);
            $classObj = $obj['obj'];
            $obj = Zee::array_findFirst($obj['obj']->resources, $paramName, "paramName");
            if($obj != null){
                $classObj->$paramName($_POST);
            }
        }
    }
    
?>