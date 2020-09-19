<?php
	class MyDb{	
		// $name = "id7061276_ziddandwiputra21";
		// $password = "strife123456789";
		// $dbname = "id7061276_account";
		
		public static function connect(){
			
// 			$domain = "localhost:3308";
// 			$name = "root";
// 			$password = "";
// 			$dbname = "hachi_eight";

			$name = "hachieig_live";
    		$domain = "localhost";
    		$password = "Strife21@";
    		$dbname = "hachieig_hachi_eight";

			$connection = mysqli_connect($domain , $name , $password , $dbname);
			if(!$connection){
				die("tidak tersmbung ke db krna : ". mysqli_error($connection));
			}
			return $connection;	
		}
	}
?>