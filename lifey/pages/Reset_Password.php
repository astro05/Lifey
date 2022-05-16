<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php

error_reporting(E_ERROR | E_PARSE);
$session_email = $_SESSION["User_Email"];
//$reset_token['token'] = '';
global $ConnectingDB;
	$Query="SELECT * FROM user_registration WHERE email='$session_email'";
	$Execute=mysqli_query($ConnectingDB,$Query);
	if($reset_token=mysqli_fetch_array($Execute)){
		$reset_token["token"];}
$TokenFromURL = $reset_token["token"];
if(isset($_GET['token']) ){
    $TokenFromURL=$_GET['token'];
if(isset($_POST["Submit"])){

$Password=mysqli_real_escape_string($ConnectingDB,$_POST["Password"]);
$ConfirmPassword=mysqli_real_escape_string($ConnectingDB,$_POST["ConfirmPassword"]);

if(empty($Password)||empty($ConfirmPassword)){
	$_SESSION["message"]="All Fields must be filled out";
}elseif($Password!==$ConfirmPassword){
	$_SESSION["message"]="Both Password Values must be Same";

}elseif(strlen($Password)<1){
	$_SESSION["message"]="Password Should Include at least 1 values";

}
else{
	global $ConnectingDB;
	$Hashed_Password=Password_Encryption($Password);
	$Query="UPDATE user_registration SET password='$Hashed_Password' WHERE token='$TokenFromURL' or token='$session_email'";
$Execute=mysqli_query($ConnectingDB,$Query);
if($Execute){
	    $_SESSION["SuccessMessage"]="Password Changed Successfully";
		Redirect_To("Login.php");
}else{
		$_SESSION["message"]="Something Went Wrong in server";
	        Redirect_To("Login.php");
}

}

}
}
?>
<?php ?>

<?php
    // header.php
    include ('header.php');
?>


<div>
<?php echo Message();?>
<?php echo SuccessMessage(); ?></div>
<div id="centerpage">


 <!-- reset password area -->
    <section id="register">
        <div class="row m-0">
            <div class="col-lg-4 offset-lg-2">
                <div class="text-center pb-5">
                    <h1 class="login-title text-dark">Reset Your Password</h1>
                    <p class="p-1 m-0 font-ubuntu text-black-50">Create New Password</p>
                    <span class="font-ubuntu text-black-50">If You Remember-<a href="Login.php">Login</a></span>
                </div>
                <div class="upload-profile-image d-flex justify-content-center pb-5">
                <div class="text-center">
                    <img src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : '../images/user_default.png' ; ?>" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                </div>
            </div>
                <div class="d-flex justify-content-center">
                    <form action="Reset_Password.php?token=<?php echo $TokenFromURL; ?>" method="post" enctype="multipart/form-data" id="reg-form">
                        <fieldset>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" required name="Password" id="password" class="form-control" placeholder="password*">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" required name="ConfirmPassword" id="confirm_pwd" class="form-control" placeholder="Confirm Password*">
                                <small id="confirm_error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="submit-btn text-center my-5">
                            <button type="Submit" name="Submit" value="Register" class="btn btn-warning rounded-pill text-dark px-5">Continue</button>
                        </div>

                       </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- reset password area -->


</div>

	<?php
    // footer.php
    include ('footer.php');
?>
