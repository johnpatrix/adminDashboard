<?php 

  
  if(!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
     header('location:index.php');
  };
?>
<div>
		<link rel="stylesheet" href="css/bootstrap.min.css">		
		<script src= "js/bootstrap.min.js"></script> 

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php"><img src="images/nic_logo.png" width="150px" height="50px" /> ADMIN Branch (Nagaland)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    	<li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Fuel Bill
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="newbill.php">New Fuel Bill</a>
          <a class="dropdown-item" href="edithomepage.php">Edit Fuel Bill</a>
          <a class="dropdown-item" href="deleteFuelBill.php">Delete Fuel Bill</a>
        </div>
      </li>

      
      <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Office Expenditure Statement
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="expenditure/newbill.php">New Office Expense Bill</a>
          <a class="dropdown-item" href="expenditure/edithomepage.php">Edit Office Expense Bill</a>
          <a class="dropdown-item" href="expenditure/deleteFuelBill.php">Delete Office Expense Bill</a>
           <div class="dropdown-divider"></div>             
             
          <a class="dropdown-item" href="expenditure/newBillType.php">New Bill Type</a>
          <a class="dropdown-item" href="expenditure/deleteBillType.php">Delete Bill Type Bill</a>
        </div>
      </li>
      </ul>
    <form class="form-inline my-2 my-lg-0">
	<!--
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	-->
    </form>
&nbsp&nbsp&nbsp
     <form class="form-inline my-2 my-lg-0" action="home.php" method="post">      
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="logout">Logout</button>
    </form>

  </div>
</nav>
</div>