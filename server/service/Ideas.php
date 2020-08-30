<?php 
    // TODO TEST 
    // include "../zee.php";
    // include "../DBData.php";
    class Ideas extends DBData{
        public static $id = "ideas";
        public $resources = array(
            array("paramName"=>"sendIdeas")
        );
        public $pk = array("id");
        public $cols = array(
            "id", "name", "email", "messageEncode", "date", 'privacy', 'userId'
        );
        public $colsType = array();
        function __construct(){
            $field = array(
                DBData::$FIELD_TYPE_AUTO_ID, 
                DBData::$FIELD_TYPE_NAME, 
                DBData::$FIELD_TYPE_EMAIL, 
                DBData::$FIELD_TYPE_RICH_TEXT,
                DBData::$FIELD_TYPE_DATE,
                DBData::$FIELD_TYPE_BOOLEAN,
                DBData::$FIELD_TYPE_ID
            );
            $this->colsType = $field;
        }

        public $dbName = 'he_people_ideas';
        
        function sendIdeas(array $savedObj){
            $savedObj['date'] = date_millis_to_std_format((int)$savedObj['date']);
            $this->saveToDB(new Ideas(), $savedObj);
        }
    }
    // $ide = new Ideas();
    // $ide->sendIdeas(array(
    //     "id"=>null,
    //     "email"=>'tset',
    //     "messageEncode"=>'messageEncodeTset',
    //     "date"=>989080909898,
    //     "name"=>'test',
    // ));
    addPathPost(Ideas::$id, new Ideas());
?>