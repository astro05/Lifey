
<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
global $ConnectingDB;
if(isset($_GET['token'])){
    $TokenFromURL=$_GET['token'];
$Query="UPDATE user_registration SET active='On' WHERE token='$TokenFromURL'";
$Execute=mysqli_query($ConnectingDB,$Query);
if($Execute){
    $_SESSION["SuccessMessage"]="Account Activated Successfully";
		Redirect_To("Login.php");
}else{
		$_SESSION["message"]="Something Went Wrong Try Again!";
	        Redirect_To("User_Registration.php");
}



}
