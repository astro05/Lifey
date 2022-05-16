<?php
ob_start();
require_once("Include/Session.php");
require_once("Include/Functions.php");
require_once("Include/DB.php");
Confirm_login();
if($_SESSION["role_play"] != 1)
         Redirect_To("user_profile.php");

    global $ConnectingDB;
	$id="";
	$firstname="";
	$lastname="";
	$email="";
	$role="";
	$status="";


	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$sql="SELECT profileImage FROM user_registration WHERE userID=?";
		$stmt2=$ConnectingDB->prepare($sql);
		$stmt2->bind_param("i",$id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['profileImage'];
		unlink($imagepath);

		$query="DELETE FROM user_registration WHERE userID=?";
		$stmt=$ConnectingDB->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:user_record.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}

	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM user_registration WHERE userID=?";
		$stmt=$ConnectingDB->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['userID'];
		$firstname=$row['firstName'];
		$lastname=$row['lastName'];
        $email=$row['email'];
		$role=$row['role_play'];
		$status=$row['active'];


	}
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
        $email=$_POST['email'];
		$role=$_POST['role'];
		$status=$_POST['status'];


		$query="UPDATE user_registration SET firstName=?,lastName=?,email=?,role_play=?,active=? WHERE userID=?";
		$stmt=$ConnectingDB->prepare($query);
		$stmt->bind_param("sssisi",$firstname,$lastname,$email,$role,$status,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:user_record.php');
	}

?>
