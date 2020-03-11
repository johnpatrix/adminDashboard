<?php

	class viewLogin extends crudLogin
	{
		public  function validateUser($username,$password)
		{
			$data=$this->getUserData($username,$password);
			return $data;

		}//end of validatedUser
	}//end of class viewLogin
?>