<?php
	session_start();
	$myFile = "textfile/reminder.txt";
	$myFileLink = fopen($myFile, 'r');
	$myFileContents = fread($myFileLink, filesize($myFile));
	fclose($myFileLink);

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["newcontent"]) ){//trying to write to the file
		$fileContent=$_POST["newcontent"];		
		$myFileLink2 = fopen($myFile, 'w+') or die("Can't open file.");		
		fwrite($myFileLink2, $fileContent);
		fclose($myFileLink2);
	}
	
	
	
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["logout"]) ){//trying to write to the file
	unset($_SESSION['user_name']);
    session_destroy();
	//echo $_SESSION['user_name'];
    header('location:index.php');
	//exit();
  }
?>

<html>
	<head>
		<link rel="stylesheet" href="css/mainPage.css">
		<link rel="stylesheet" href="css/jquery-ui.min.css">
	<script src= "js/jquery-3.4.1.min.js"></script> 
    <script src= "js/jspdf.min.js"> </script>
    <script src= "js/generatePDF.js"> </script>
     <script src= "js/jquery-ui.min.js"> </script>
<script>
  $( function() {
    $( "#accordion" ).accordion();
  } );

  function updatefile(){
  	 var testarea = document.getElementById("reminder").value;
  	$.post( "home.php", {'newcontent':testarea},function(data){ document.getElementById('dirty').innerHTML=""; });	
  }
  function edited(){
  		 document.getElementById('dirty').innerHTML = "You have made Changes to your notes, dont forget to SAVE.";
  }


  </script>
	</head>
	<body>
		<?php include "header.php"; ?>		
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page">Home</li>
		  </ol>
		</nav>
		<hr>
		<div class="row">
		<div class="col-sm-3">
			<div id="accordion">
			  <h3> COMMON LINKS</h3>
			  <div  >
			  	<p class="alert alert-success">
			    <a href="https://email.gov.in" target="_blank">NIC EMAIL</a>
			    </p>		
				
				 <p class="alert alert-info">
			  			  <a href="http://parichay.nic.in" target="_blank">PARICHAY (DIGITAL) NIC</a>
			   	 </p>
				  <p class="alert alert-info">
			  			  <a href="https://nicng.attendance.gov.in/" target="_blank">Aadhaar Enabled Bio-metric Attendance System(AE-BAS)</a>
			   	 </p>

			  </div>
			 

			  <h3>Succulent</h3>
			  <div>
			    <p>
			    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img src="succulent/1.jpg" class="d-block w-100" >
					    </div>
					    <div class="carousel-item">
					      <img src="succulent/2.jpg" class="d-block w-100" >
					    </div>
					    <div class="carousel-item">
					      <img src="succulent/3.jpg" class="d-block w-100" >
					    </div>
					    <div class="carousel-item">
					      <img src="succulent/4.jpg" class="d-block w-100" >
					    </div>
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</p>
				</div>
			</div>
		</div>
		<div class="col-sm-9">
			<div style="padding-right: 16px;">
				<span class="text-white bg-secondary"><b>&nbsp NOTES/REMINDERS &nbsp</b></span> <input type="button" style="float:right;" value="Save Notes"  onclick="updatefile()"> <hr>
				<span id="dirty" ></span>
			<textarea class="form-control rounded-0" id="reminder" name="remainderinput" rows="10" onchange="edited()"><?php
				echo trim($myFileContents);
				?>
			</textarea>			
			</div>
			
		</div>
	</div>
	</body>
</html>