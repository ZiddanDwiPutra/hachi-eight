<?php 
    include "zee.php";
    include "DBData.php";
    includeAll('service');
    class DBSetup{
        public static function run(){
            echo "<h2 align='center'>HACHI EIGHT DB SETUP</h2>";
            foreach($GLOBALS["myDatas"] as $key => $value){
                // var_dump($value['obj']->colsType);
                // var_dump($value['obj']->cols);
                $colsType = $value['obj']->colsType;
                $cols = $value['obj']->cols;
                $pk = $value['obj']->pk;
                
                $dbName = '`'.$value['obj']->dbName.'`';
                $arrData = array("CREATE TABLE IF NOT EXISTS $dbName (");
                $inc = 0;
                foreach($cols as $colKey => $colValue){
                    // $comma = "";
                    $comma = ",";
                    // if($inc+1<count($cols)){
                    // }
                    array_push($arrData, "`".$colValue.'`'." ".$colsType[$inc].$comma);
                    $inc++;
                }
                foreach($pk as $colKey => $colValue){
                    $comma = "";
                    if($inc+1<count($cols)){
                        $comma = ",";
                    }
                    array_push($arrData, "PRIMARY KEY (`".$colValue.'`)'.$comma);
                    $inc++;
                }

                echo stringMaker("<br>", $arrData).");<br><br>";
                // var_dump($dbName, $arrData);
            }
        }
    }
    DBSetup::run();
?>