<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/DB.php"); ?>

<?php
// Message Vars
	$msg = '';
	$msgClass = '';


if(filter_has_var(INPUT_POST,'submit')){

    $name = mysqli_real_escape_string($ConnectingDB,$_POST['name']);
    $email = mysqli_real_escape_string($ConnectingDB,$_POST['email']);
    $contact_no = mysqli_real_escape_string($ConnectingDB,$_POST['contact_no']);
    $country = mysqli_real_escape_string($ConnectingDB,$_POST['country']);
    $subject = mysqli_real_escape_string($ConnectingDB,$_POST['subject']);
    $message = mysqli_real_escape_string($ConnectingDB,$_POST['message']);



	global $ConnectingDB;

	$Query="INSERT INTO contact_form(name,email,contactno,country,subject,message,messageDate)
	VALUES('$name','$email','$contact_no','$country','$subject','$message',NOW())";
	$Execute=mysqli_query($ConnectingDB,$Query);

    if($Execute){
        $msg = 'Your message has been sent';
		$msgClass = 'alert-success';
    }else{
        $msg = 'Your message was not sent';
        $msgClass = 'alert-danger';

    }


}


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS (css/bootstrap) -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/custom/aos.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>


    <script src="../js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


    <script src="../js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <!--  ......................... -->

    <!-- Custom CSS (css\custom) -->

    <link rel="stylesheet" type="text/css" href="../css/custom/aos.css">
    <link rel="stylesheet" type="text/css" href="../css/custom/navbar_footer.css">
    <link rel="stylesheet" type="text/css" href="../css/custom/contact_page.css">
    <link rel="stylesheet" type="text/css" href="../css/custom/user_toggle.css">

    <!--  ......................... -->

    <title>Lifey</title>
    <link rel="shortcut icon" type="image/png" href="../images/lifey_favicon.png">

    <!-- <meta http-equiv="refresh" content="2; url=loading.html" -->

</head>



<body>
	<?php
			// user_toggle.php
			include ('user_toggle.php');
	?>
    <header>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="home.php">
                    <img src="../images/lifey_favicon.png" style="width:50px;height:50px;">Lifey</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-right text-light"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="home.php">HOME
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">SERVICE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact_page.php">CONTACT</a>
                        </li>
<!--

-->
                        <li class="nav-item">
                            <a class="nav-link" href="FAQ.php">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about_us.php">ABOUT</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="mt-5">Contact Us</h1>
                    <div class="sticky_nav">
                        <p>We are always here to help. If your have requirements/queries about our services; fill up the contact form
                            below and we'll do our best to reply within 24 hours Alternatively simply pickup the phone and give us a
                            call.</p>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
    </section>

    <section class="form-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                     <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Full name *" value="<?php echo isset($POST['name']) ? $name : '';?>" required>

                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Email Address *" value="<?php echo isset($_POST['email']) ? $email : '';?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="number" name="contact_no" class="form-control" placeholder="Contact Number " value="<?php echo isset($POST['contact_no']) ? $contact_no : '';?>">

                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="country" id=" " value="<?php echo isset($POST['country']) ? $country : '';?>">
                                    <option selected>Country</option>
                                    <option>Bangladesh</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>USA</option>
                                    <option>Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" placeholder="Subject " value="<?php echo isset($POST['subject']) ? $subject : '';?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <textarea class="form-control" name="message" rows="3" placeholder="Type your message...." value="<?php echo isset($POST['message']) ? message : '';?>" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 text-center">
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Message</button>
                            </div>
                        </div>
                        <?php if($msg != ''): ?>
                    <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
                    <?php endif; ?>

                    </form>

                </div>
                <div class="col-md-6 address">
                    <h5>Call Us / WhatsApp</h5>
                    <p><a href="tel:+880150000000"><i class="fas fa-phone"></i> +(880) 150000000 </a><br>
                    </p>
                    <h5>Email / Website</h5>
                    <p>
                        <a href="mailto:joyultimates@gmail.com"><i class="fas fa-envelope"></i> joyultimates@gmail.com</a><br>
                        <a href="https://joy-jahincreation.com/"><i class="fas fa-globe"></i></i> www.joyjahincreation.com </a>

                    </p>
                    <h5>Working hours</h5>
                    <p>
                        Mon - Fri : 9am - 6pm(BD)
                    </p>
                    <h5>Address</h5>
                    <p>
                        modhubag,moghbazar dhaka-1217
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid">
          
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d271.4142682237154!2d90.41142931494443!3d23.758055100731617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b880bbc20fad%3A0x8f3132355a955e14!2s383%2F1%20Old%20Elephant%20Road%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1588655118531!5m2!1sen!2sbd" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

        </div>


    </section>




    <footer class="footer">
        <div class="container-fluid p-0">
            <div class="row text-left">
                <div class="col-md-5 col-sm-5">
                    <h4 class="text-light">About us</h4>
                    <p class="text-muted"> Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary).</p>
                    <p class="pt-6 text-muted">Copyright ©2019 All rights reserved | This template is made with by
                        <span>Joy-Jahin production</span>
                    </p>
                </div>
                <div class="col-md-5 col-sm-12">
                    <h4 class="text-light">Message</h4>
                    <p class="text-muted">Stay connected</p>
                    <form class="form-inline">
                        <div class="col pl-0">
                            <div class="input-group pr-5">
                                <input type="text" class="form-control bg-dark text-white" id="inlineFormInputGroupUsername2" placeholder="Email">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-sm-12">
                    <h4 class="text-light">Follow Us</h4>
                    <p class="text-muted">At any service</p>
                    <div class="column text-light">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>







    <!-- ............................................................................................ -->







    <!-- ................CUSTOM SCRIPT................... -->

    <!-- home page effect -->
    <script>
        //  sticky navigation

        let navbar = $(".navbar");

        $(window).scroll(function() {

            let oTop = $(".footer").offset().top - window.innerHeight;
            if ($(window).scrollTop() > oTop) {
                navbar.addClass("sticky");
            } else {
                navbar.removeClass("sticky");
            }
        });


        let nCount = selector => {
            $(selector).each(function() {
                $(this)
                    .animate({
                        Counter: $(this).text()
                    }, {

                        duration: 4000,

                        easing: "swing",

                        step: function(value) {
                            $(this).text(Math.ceil(value));
                        }
                    });
            });
        };

        let a = 0;
        $(window).scroll(function() {
              let oTop = $(" ").offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() >= oTop) {
                a++;
                nCount(" ");
            }
        });

    </script>


    <!--AOS animate -->
    <script>
        AOS.init();

    </script>


</body>

</html>
