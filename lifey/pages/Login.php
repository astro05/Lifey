<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>

<?php

if(login())
       { Redirect_To("user_profile.php");
       }else{



if(isset($_POST["Submit"])){
$Email=mysqli_real_escape_string($ConnectingDB,$_POST["Email"]);
$Password=mysqli_real_escape_string($ConnectingDB,$_POST["Password"]);
if(empty($Email)||empty($Password)){
	$_SESSION["message"]="All Fields must be filled out";
	Redirect_To("Login.php");
}else{
	if(ConfirmingAccountActiveStatus($Email)){
	$Found_Account=Login_Attempt($Email,$Password);
	if($Found_Account){
		$_SESSION["User_Id"]=$Found_Account['userID'];
		$_SESSION["User_firstName"]=$Found_Account['firstName'];
		$_SESSION["User_lastName"]=$Found_Account['lastName'];
       $_SESSION["User_Email"]=$Found_Account['email'];
    $_SESSION["User_profile_image"]=$Found_Account['profileImage'];
   $_SESSION["role_play"]=$Found_Account['role_play'];
    //$_SESSION['dashboard_page']="";

     if($_SESSION["role_play"] == 3)
         Redirect_To("user_deactive.php");

		if(isset($_POST["Remember"])){
			$ExpireTime=time()+86400;
			setcookie("SettingEmail",$Email,$ExpireTime);
			setcookie("SettingName",$LastName,$ExpireTime);
		}

		Redirect_To("user_profile.php");
	}else{
		$_SESSION["message"]="Invalid Email / Password";
	Redirect_To("Login.php");
	}
	}else{
	$_SESSION["message"]="Account Confirmation Required";
	Redirect_To("Login.php");
	}
}
}


}?>

<?php ?>




<?php
// header.php
include ('header.php');
?>

<div class="alert alert-info alert-dismissible text-center ">
    <?php echo Message(); ?>
    <?php echo SuccessMessage(); ?>
 </div>

<div id="centerpage">

    <!-- login area -->
<section id="login-form">
    <div class="row m-0">
        <div class="col-lg-4 offset-lg-2">
            <div class="text-center pb-5">
                <h1 class="login-title text-dark">Login</h1>
                <p class="p-1 m-0 font-ubuntu text-black-50">Login and enjoy additional features</p>
                <span class="font-ubuntu text-black-50">Create a new <a href="User_Registration.php">account</a></span>
            </div>
            <div class="upload-profile-image d-flex justify-content-center pb-5">
                <div class="text-center">
                    <img src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : '../images/user_default.png' ; ?>" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <form action="Login.php" method="post" enctype="multipart/form-data" id="log-form">
                        <fieldset>


                        <div class="form-row my-4">
                            <div class="col">
                                <input type="email" value="" required name="Email" id="email" class="form-control" placeholder="Email*">
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" required name="Password" id="password" class="form-control" placeholder="password*">
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="Remember" class="form-check-input">
                            <label for="Remember" class="form-check-label font-ubuntu text-black-50">Remember me &nbsp;&nbsp; <a href="Recover_Account.php"><span class="FieldInfo">Forgot Password</span></a></label>
                        </div>


                        <div class="submit-btn text-center my-5">
                            <button type="Submit" name="Submit" value="Login" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
                        </div>

                       </fieldset>
                    </form>
                </div>
        </div>
    </div>
</section>
<!-- #login area -->


	</div>

	<?php
    // footer.php
    include ('footer.php');
?>
