<?php
	include "model/connection.inc.php";
	include "controller/curdlogin.inc.php";
	include "view/viewlogin.inc.php";

	$view_bills= new viewLogin;
	//session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"]) ){//trying to write to the file
		$username=trim($_POST["username"]);
		$password=trim($_POST["password"]);	

		$data=$view_bills->validateUser($username,$password);
		
		if($data !=null) //checking if the user exist or not
		{
			session_start();
			foreach ($data as $dataum){
				$_SESSION['user_id']= $dataum['user_id'];
				$_SESSION['user_name']= $dataum['user_name'];
				$_SESSION['user_type']=  $dataum['user_type'];				
				header('location:home.php');				 
			}//end foreach

		}//end if	
			
	}
?>
<html>
	<head>
		
		<link rel="stylesheet" href="css/loginPage.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" id="bootstrap-css">		

	</head>
	<body>

		<!-- ************************ Testing **************-->
		
	    
		<div class="wrapper fadeInDown">
			  <div id="formContent">
			    <!-- Tabs Titles -->
			    <h4>Administration Branch</h4>
			    <!-- Icon -->
			    <div class="fadeIn first">
			      <img src="images/nic_logo.png" id="icon" alt="User Icon" width="150px" height="100px" />
			    </div>

			    <!-- Login Form -->
			    <form action="index.php" method="post">
			      <input type="text"  class="fadeIn second"  name="username" placeholder="User Name">
			      <input type="password"  class="fadeIn third"  name="password" placeholder="password">
			      <input type="submit" class="fadeIn fourth" name="submit" value="Log In">
			    </form>

			    <!-- Remind Passowrd -->
			    <div id="formFooter">

			      <span class="underlineHover" >Kindly contact the Administrator for New Account</span>
			    </div>
			  </div>
		</div>

	</body>

</html>