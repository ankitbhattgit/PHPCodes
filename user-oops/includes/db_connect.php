<?php

class Db_connect{

	public function connect(){
        
		include 'db_config.php';
		$con=mysql_connect(DB_HOST,DB_USER,DB_PASS);
		mysql_select_db(DB_NAME);
		return $con;
	}

	public function close(){
		mysql_close();
	}
}