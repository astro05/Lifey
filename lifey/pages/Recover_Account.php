<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php

if(isset($_POST["Submit"])){

$Email=mysqli_real_escape_string($ConnectingDB,$_POST["Email"]);

if(empty($Email)){
	$_SESSION["message"]="Email Required";
	Redirect_To("Recover_Account.php");
}elseif(!CheckEmailEkistsOrNot($Email)){
		$_SESSION["message"]="Email not Found";
	Redirect_To("User_Registration.php");
}
else if(!empty($Email)){
	global $ConnectingDB;
	$Query="SELECT * FROM user_registration WHERE email='$Email'";
	$Execute=mysqli_query($ConnectingDB,$Query);
	if($admin=mysqli_fetch_array($Execute)){
		$admin["lastName"];
		$admin["token"];
 $subject="Reset Password";
 $body='Hi ' .$admin["lastName"]. 'Here is the link to Reset you Password'.'
 http://localhost/lifey/pages/Reset_Password.php?token='.$admin["token"];

 $toEmail= $Email;


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

if(!$mail->send()){
   $_SESSION["message"]="Something Went Wrong in mail. http://localhost/lifey/pages/Reset_Password.php?token=".$admin["token"];
	Redirect_To("User_Registration.php");

    echo 'Mailer Error: ' . $mail->ErrorInfo;


} else{
      $_SESSION["SuccessMessage"]= "Check Email for Resetting Password";
		Redirect_To("Login.php");
}


//..........................


 }
}else{
		$_SESSION["message"]="Something Went Wrong in server!";
	    Redirect_To("User_Registration.php");
	}


}


?>
<?php ?>


<?php
// header.php
include ('header.php');
?>
<div>
<?php echo Message(); ?>
<?php echo SuccessMessage(); ?></div>
<div id="centerpage">

    <!-- Recover Account -->
<section id="login-form">
    <div class="row m-0">
        <div class="col-lg-4 offset-lg-2">
            <div class="text-center pb-5">
                <h1 class="login-title text-dark">Forgot Password!!</h1>
                <p class="p-1 m-0 font-ubuntu text-black-50">Register and enjoy additional features</p>
                <span class="font-ubuntu text-black-50">Create a new <a href="User_Registration.php">account</a></span>
            </div>
            <div class="upload-profile-image d-flex justify-content-center pb-5">
                <div class="text-center">
                    <img src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : '../images/user_default.png' ; ?>" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <form action="Recover_Account.php" method="post" enctype="multipart/form-data" id="log-form">
                        <fieldset>


                        <div class="form-row my-4">
                            <div class="col">
                                <input type="email" value="" required name="Email" id="email" class="form-control" placeholder="Email*">
                            </div>
                        </div>

                        <div class="submit-btn text-center my-5">
                            <button type="Submit" name="Submit" value="Submit" class="btn btn-warning rounded-pill text-dark px-5">Submit</button>
                        </div>

                       </fieldset>
                    </form>
                </div>
        </div>
    </div>
</section>
<!-- Recover account -->


	</div>

	<?php
    // footer.php
    include ('footer.php');
?>
