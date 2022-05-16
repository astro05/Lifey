<?php require_once("Include/DB.php"); ?>
<?php
function Redirect_To($NewLocation){
	header("Location:".$NewLocation);
	exit;
}
function Password_Encryption($Password) {
  	$BlowFish_Hash_Format = "$2y$10$";
	  $Salt_Length = 22;
	  $Salt = Generate_Salt($Salt_Length);
	  $Formating_Blowfish_With_Salt = $BlowFish_Hash_Format . $Salt;
	  $Hash = crypt($Password, $Formating_Blowfish_With_Salt);
		return $Hash;
	}

function Generate_Salt($length) {

	  $Unique_Random_String = md5(uniqid(mt_rand(), true));

	  $Base64_String = base64_encode($Unique_Random_String);


	  $Modified_Base64_String = str_replace('+', '.', $Base64_String);

	  $Salt = substr($Modified_Base64_String, 0, $length);

		return $Salt;
	}

function Password_Check($Password, $Existing_Hash) {

	  $Hash = crypt($Password, $Existing_Hash);
	  if ($Hash === $Existing_Hash) {
	    return true;
	  } else {
	    return false;
	  }
	}

function CheckEmailEkistsOrNot($Email){
	global $ConnectingDB;
	$Query="SELECT * FROM user_registration WHERE email='$Email'";
	$Execute=mysqli_query($ConnectingDB,$Query);
	if(mysqli_num_rows($Execute)>0){
		return true;
	}else {
		return false;
	}
}

function Login_Attempt($Email,$Password){
    global $ConnectingDB;
	$Query="SELECT * FROM user_registration WHERE email='$Email'";
	$Execute=mysqli_query($ConnectingDB,$Query);
	if($admin=mysqli_fetch_assoc($Execute)){
		if(Password_Check($Password,$admin["password"])){
			return $admin;
		}
		}else{
		return null;	}
	}
function ConfirmingAccountActiveStatus($Email){
	global $ConnectingDB;

		$query="SELECT * FROM user_registration WHERE email=?";
		$stmt=$ConnectingDB->prepare($query);
		$stmt->bind_param("s",$Email);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$active=$row['active'];

    if($active == 'On'){
		return true;
	}else {
		return false;
	}

}

function login(){
	if(isset($_SESSION["User_Id"])||isset($_COOKIE["SettingEmail"])){
		return true;
	}
}
function Confirm_login(){
	if(!login()){
	$_SESSION["message"]="You have to Login";
	Redirect_To("Login.php");
	}

}

// profile image
function upload_profile($path, $file){
    $targetDir = $path;
    $default = "user_default.png";

    // get the filename
    $filename = basename($file['name']);
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    If(!empty($filename)){

        $allowType = array('jpg','JPG', 'png','PNG', 'jpeg','JPEG', 'gif', 'svg');
        if(in_array($fileType, $allowType)){

            if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
                return $targetFilePath;
            }
        }
    }

  
    return $path . $default;
}



?>
