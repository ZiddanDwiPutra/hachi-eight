<?php 
    class Feeds{
        public static $id = "feeds";
        public $resources = array(
            array("paramName"=>"save")
        );
        
        function save(array $savedObj){
            $connection = MyDb::connect();
            $name = $savedObj["name"];
            $email = $savedObj["email"];
            $message = $savedObj["message"];
            $date = $savedObj["date"];

            $sql = "INSERT INTO he_people_feed (`id`, `name`, `email`, `message`, `date`)
            VALUES (NULL, '$name', '$email', '$message', '$date')";

            $result = mysqli_query($connection , $sql);
            if($result){
                echo "{'status': 'success'}";
            }else {
                echo "error saat query karena : " . mysqli_error($connection) . "<br>";
            }
        }
    }
    addPathPost(Feeds::$id, new Feeds());
?>