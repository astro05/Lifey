<?php
if($_SESSION["role_play"] != 1)
         Redirect_To("user_profile.php");

$dashboard_page="";        


if(isset($_GET['dashpage'])){
		$dashboard_page = $_GET['dashpage'];
     $_SESSION['dashboard_page']= $dashboard_page;
	
	}
else if(isset($_GET['dashpage'])){
		$dashboard_page = $_GET['dashpage'];
       $_SESSION['dashboard_page']= $dashboard_page;

	}



?>