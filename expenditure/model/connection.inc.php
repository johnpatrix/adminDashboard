<?php

class connection_db{

	protected $db_name = 'NIC_administration';
	protected $db_user = 'root';
	protected $db_pass = 'toor';
	protected $db_host = 'http://10.181.30.76:3306';
	protected $connect_db;
/**
author: MetalMark
Date:30/07/2019
this function will connect to the database
 * 
 */
protected function connectDB(){
		try{
			$connect_db = new mysqli( "localhost", "root", "","NIC_administration" );


			if($connect_db ->connect_error){
				echo "connection failed";
				return null;	
			}
			else return $connect_db;		

		}catch(PDOException $e)
		{
			echo 'connection failed';
		}	
		
	}

}


?>