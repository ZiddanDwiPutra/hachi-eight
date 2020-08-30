<?php 
    class Feeds extends DBData{
        public static $id = "feeds";
        public $resources = array(
            array("paramName"=>"save")
        );
        
        public $pk = array("id");
        public $cols = array(
            "id", "name", "email", "message", "date"
        );
        public $colsType = array();
        function __construct(){
            $field = array(
                DBData::$FIELD_TYPE_AUTO_ID, 
                DBData::$FIELD_TYPE_NAME, 
                DBData::$FIELD_TYPE_EMAIL, 
                DBData::$FIELD_TYPE_TEXT,
                DBData::$FIELD_TYPE_DATE
            );
            $this->colsType = $field;
        }

        public $dbName = 'he_people_feed';
        function save(array $savedObj){
            $savedObj['date'] = date_millis_to_std_format((int)$savedObj['date']);
            $this->saveToDB(new Feeds(), $savedObj);
        }
        
        // function save(array $savedObj){

            // $connection = MyDb::connect();
            // $name = $savedObj["name"];
            // $email = $savedObj["email"];
            // $message = $savedObj["message"];
            // $date = $savedObj["date"];
            
            // $date = date_millis_to_std_format((int)$date);

            // $sql = "INSERT INTO $this->dbName (`id`, `name`, `email`, `message`, `date`)
            // VALUES (NULL, '$name', '$email', '$message', '$date')";

            // $result = mysqli_query($connection , $sql);
            // if($result){
            //     echo "{'status': 'success'}";
            // }else {
            //     echo "error saat query karena : " . mysqli_error($connection) . "<br>";
            // }
        // }
    }
    addPathPost(Feeds::$id, new Feeds());
?>