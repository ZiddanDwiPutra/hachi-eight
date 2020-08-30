<?php 
    class DBData{
        public static $FIELD_TYPE_AUTO_ID = "int AUTO_INCREMENT";
        public static $FIELD_TYPE_ID = "varchar(20)";
        public static $FIELD_TYPE_NAME = "varchar(150)";
        public static $FIELD_TYPE_TEXT = "text(500)";
        public static $FIELD_TYPE_BIG_TEXT = "text(1000)";
        public static $FIELD_TYPE_RICH_TEXT = "text";
        public static $FIELD_TYPE_EMAIL = "varchar(100)";
        public static $FIELD_TYPE_DATE = "date";
        public static $FIELD_TYPE_INTEGER = "int";
        public static $FIELD_TYPE_DOUBLE = "double";
        public static $FIELD_TYPE_FLOAT = "float";
        public static $FIELD_TYPE_BOOLEAN = "boolean";

        function createrFields($cols, $arr, $quotation){
            $inc = 0;
            foreach ($cols as $key => $val) {
                array_push($arr, $quotation.$val.$quotation);
                if($key+1<count($cols)){
                    array_push($arr, ",");
                }
                $inc++;
            }
            array_push($arr, ") ");
            return $arr;
        }
        
        function createrValues($cols, $arrValue, $quotation){
            $inc = 0;
            $arr = array("(");
            foreach ($cols as $key => $val) {
                array_push($arr, $quotation.$arrValue[$val].$quotation);
                if($inc+1<count($cols)){
                    array_push($arr, ",");
                }
                $inc++;
            }
            array_push($arr, ") ");
            return $arr;

        }


        function saveToDB($dataObj, $savedObj){
            function item($key){
                if(substr($key, 0, 1) != '_')return true;
            }
            $savedObj = array_filter($savedObj, 'item', ARRAY_FILTER_USE_KEY);
            if(count($dataObj->cols) != count($savedObj)){
                http_response_code(400);
                echo createStandarStatus("400", false, "wrong in save", null);
                exit(0);
            };
            $connection = MyDb::connect();
            
            // var_dump($dataObj->cols);
            $arrA = $this->createrFields($dataObj->cols, array("("), '`');
            $prepareA = "INSERT INTO $dataObj->dbName " . stringMaker(" ", $arrA);
            
            $arrB = $this->createrValues($dataObj->cols, $savedObj, '\'');
            $prepareB = "VALUES ". stringMaker(" ", $arrB);
            $sql = $prepareA.$prepareB.";";
            $result = mysqli_query($connection , $sql);
            if($result){
                $msg="Data Has Been Saved";
                if(strpos($_SERVER["HTTP_HOST"], 'localhost') !== false)$msg = $sql;
                echo createStandarStatus("200", true, $msg, null);
            }else {
                $msg = mysqli_error($connection);
                echo createStandarStatus("400", false, $msg, null);
            }
        }
    }
?>