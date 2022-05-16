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
	$text="";
	$newtext="";
    $imageid="";
    $image="";
    $imagesrc="";
    $imagecategory="";
    $oldimage="";
    $newimage="";

	



	if(isset($_GET['edit'])){
		$id=$_GET['edit'];
        
		$query="SELECT * FROM home_text WHERE textID=?";
		$stmt=$ConnectingDB->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['textID'];
		$text=$row['text'];

	}


	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$newtext=$_POST['newtext'];
		
		$query="UPDATE home_text SET text=? WHERE textID=?";
		$stmt=$ConnectingDB->prepare($query);
		$stmt->bind_param("si",$newtext,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:dashboard.php');
	}


if(isset($_GET['imageedit'])){
		$imageid=$_GET['imageedit'];

		$query="SELECT * FROM home_image WHERE imageID=?";
		$stmt=$ConnectingDB->prepare($query);
		$stmt->bind_param("i",$imageid);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$imageid=$row['imageID'];
        $imagesrc=$image=$row['image_src'];
		$imagecategory=$row['image_category'];
        
		
	}
	if(isset($_POST['imageupdate'])){
		$imageid=$_POST['imageid'];
		$imagecategory=$_POST['imagecategory'];
		$oldimage=$_POST['oldimage'];

		if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
			$newimage="../assets/home_image/".$imagecategory."_".$_FILES['image']['name'];
			unlink($oldimage);
			move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}
		$query="UPDATE home_image SET image_category=?,image_src=? WHERE imageID=?";
		$stmt=$ConnectingDB->prepare($query);
		$stmt->bind_param("ssi",$imagecategory,$newimage,$imageid);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:dashboard.php?#home_image');
	}




?>

