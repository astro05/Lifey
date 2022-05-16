<?php
ob_start();
require_once("Include/Session.php");
require_once("Include/Functions.php");
require_once("Include/DB.php");
Confirm_login();
if($_SESSION["role_play"] !=1)
         Redirect_To("user_profile.php");

    global $ConnectingDB;
	$id="";
	$name="";
	$email="";
	$contactno="";
	$country="";
	$subject="";
    $message="";
    $reply="";




	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$query="DELETE FROM contact_form WHERE contactID=?";
		$stmt=$ConnectingDB->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:contact_inbox.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}

	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM contact_form WHERE contactID=?";
		$stmt=$ConnectingDB->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['contactID'];
		$name=$row['name'];
		$email=$row['email'];
        $contactno=$row['contactno'];
		$country=$row['country'];
		$subject=$row['subject'];
        $message=$row['message'];
		$reply=$row['reply'];

	}
	if(isset($_POST['update'])){
		$id=$_POST['contactID'];
		$name=$_POST['name'];
		$email=$_POST['email'];
        $contactno=$_POST['contactno'];
		$country=$_POST['country'];
		$subject=$_POST['subject'];
        $message=$_POST['message'];
		$reply=$_POST['reply'];
        $status=1;


        $Query="UPDATE contact_form SET reply='$reply',status='$status',replyDate= NOW() WHERE contactID='$id'";
        $Execute=mysqli_query($ConnectingDB,$Query);


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
$mail->addAddress($email);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('', 'Lifey');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $reply;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
        header('location:contact_inbox.php');
        $_SESSION['response']="Something Went Wrong in Mail.";
		$_SESSION['res_type']="danger";
//    Redirect_To("contact_inbox.php");
} else {
   header('location:contact_inbox.php');
		$_SESSION['response']="Mail Successfully Sent!";
        $_SESSION['res_type']="primary";

}






//..........................

	}


?>
