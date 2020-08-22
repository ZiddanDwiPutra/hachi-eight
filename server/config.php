<?php
	class MyDb{	
		// $name = "id7061276_ziddandwiputra21";
		// $password = "strife123456789";
		// $dbname = "id7061276_account";
		
		public static function connect(){
			$domain = "localhost";
// 			$name = "root";
// 			$password = "";
// 			$dbname = "hachi_eight";
			$name = "id7061276_ziddandwiputra21";
    		$password = "strife123456789";
    		$dbname = "id7061276_account";

			$connection = mysqli_connect($domain , $name , $password , $dbname);
			if(!$connection){
				die("tidak tersmbung ke db krna : ". mysqli_error($connection));
			}
			return $connection;	
		}
	}
?>