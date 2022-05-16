<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>

<?php
if(isset($_POST["Submit"])){
$FirstName=mysqli_real_escape_string($ConnectingDB,$_POST["FirstName"]);
$LastName=mysqli_real_escape_string($ConnectingDB,$_POST["LastName"]);
$Email=mysqli_real_escape_string($ConnectingDB,$_POST["Email"]);
$Password=mysqli_real_escape_string($ConnectingDB,$_POST["Password"]);
$ConfirmPassword=mysqli_real_escape_string($ConnectingDB,$_POST["ConfirmPassword"]);
$Token=bin2hex(openssl_random_pseudo_bytes(40));
$files = $_FILES['profileUpload'];
$profileImage = upload_profile('../assets/profile/', $files);


if(empty($FirstName)&&empty($LastName)&&empty($Email)&&empty($Password)&&empty($ConfirmPassword)){
	$_SESSION["message"]="All Fields must be filled out.";
	Redirect_To("User_Registration.php");
}elseif($Password!==$ConfirmPassword){
	$_SESSION["message"]="Both Password Values must be Same";
	Redirect_To("User_Registration.php");

}elseif(strlen($Password)<1){
	$_SESSION["message"]="Password Should Include at least 1 values";
	Redirect_To("User_Registration.php");

}elseif(CheckEmailEkistsOrNot($Email)){
		$_SESSION["message"]="Email is Already in Use";
	Redirect_To("User_Registration.php");
}
else{
	global $ConnectingDB;
    $Hashed_Password=Password_Encryption($Password);
// make a query
	$Query="INSERT INTO user_registration(userID,firstName,lastName,email,password,token,active,profileImage,registerDate,role_play )
	VALUES(NULL,'$FirstName','$LastName','$Email','$Hashed_Password','$Token','OFF','$profileImage',NOW(),0)";
	$Execute=mysqli_query($ConnectingDB,$Query);

if($Execute){

$toEmail = $Email;
$subject = "Confirm Account";
$body = '<h4>Hi, </h4><h2>'.$FirstName.' '.$LastName.'</h2>
  <h4>Here is the link to Active your account</h4>
  <p>http://localhost/lifey/pages/Activate.php?token='.$Token.'</p>

';
// Email Headers
$headers = "MIME-Version: 1.0" ."\r\n";
$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

// Additional Headers
$headers .= "From: " . "\r\n";

// direct mail by hosting server ......................



//if(mail($toEmail, $subject, $body, $headers)){
//                $_SESSION["SuccessMessage"]="Check Email for Activation";
//		Redirect_To("Login.php");
//                    }
//
//    else {
//                $_SESSION["message"]="Something Went Wrong in mail. http://localhost/LIFEY/pages/Activate.php?token=".$Token;
//	Redirect_To("User_Registration.php");
//                    }
//}



//................................................

// phpmailer ..........................



require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('', 'Lifey');
$mail->addAddress($toEmail);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('', 'Lifey');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $body;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
   $_SESSION["message"]="Something Went Wrong in mail. http://localhost/lifey/pages/Activate.php?token=".$Token;
	Redirect_To("User_Registration.php");

    echo 'Mailer Error: ' . $mail->ErrorInfo;


} else {
    $_SESSION["SuccessMessage"]="Check Email for Activation";
		Redirect_To("Login.php");
}






//..........................


}
   else{
		$_SESSION["message"]="Something Went Wrong in database";
	Redirect_To("User_Registration.php");
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


 <!-- registration area -->
    <section id="register">
        <div class="row m-0">
            <div class="col-lg-4 offset-lg-2">
                <div class="text-center pb-5">
                    <h1 class="login-title text-dark">Register</h1>
                    <p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy additional features</p>
                    <span class="font-ubuntu text-black-50">I already have <a href="Login.php">Login</a></span>
                </div>
                <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">
                        <div class="d-flex justify-content-center">
                            <img class="camera-icon" src="../images/camera-solid.svg" alt="camera">
                        </div>
                        <img src="../images/user_default.png" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                        <small class="form-text text-black-50">Choose Image</small>
                        <input type="file" form="reg-form" class="form-control-file" name="profileUpload" id="upload-profile">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <form action="User_Registration.php" method="post" enctype="multipart/form-data" id="reg-form">
                        <fieldset>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" value="" name="FirstName" id="firstName" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col">
                                <input type="text" value="" name="LastName" id="LastName" class="form-control" placeholder="Last Name">
                            </div>
                        </div>

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

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" required name="ConfirmPassword" id="confirm_pwd" class="form-control" placeholder="Confirm Password*">
                                <small id="confirm_error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="agreement" class="form-check-input" required>
                            <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="#">term, conditions, and policy </a>(*) </label>
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
    <!-- #registration area -->


</div>

	<?php
    // footer.php
    include ('footer.php');
?>
