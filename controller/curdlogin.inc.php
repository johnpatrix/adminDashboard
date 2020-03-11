<?php

class crudLogin extends connection_db{

	protected function getUserData($username,$password)
		{


			//$stmt = $this->connectDB()->prepare("select user_id,user_name,user_password,user_type from user_credentials where user_name= ? AND user_password= ?");
			try{
					$stmt = $this->connectDB()->prepare('select * from user_credentials where user_name = :username AND user_password = :password');

					$stmt->bindParam(':username', $username,PDO::PARAM_STR);
					$stmt->bindParam(':password', $password,PDO::PARAM_STR);
					//$stmt->bindParam(':username', $username,PDO::PARAM_STR);
					//$stmt->bindParam(':password', $password,PDO::PARAM_STR);
					$stmt->execute();
					$result=$stmt->fetchAll();					
					return $result;


			}catch(PDOException $e)
			{
				echo $e;
			}

			
			
		}//end getUserData
		




}//end class



?>