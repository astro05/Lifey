<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>

<?php
          global $ConnectingDB;
          $query = 'SELECT * FROM home_text';
          $stmt = $ConnectingDB->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
          $x=1;
          while ($row = $result->fetch_assoc()) {
              $text[$x] = $row['text'];
              $x++;
          }


          $query = 'SELECT * FROM home_image';
          $stmt = $ConnectingDB->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
          $y=1;
          while ($row = $result->fetch_assoc()) {
              $image[$y] = $row['image_src'];
              $y++;
          }


?>





<?php ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
     <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS (css/bootstrap) -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">


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

    <script src="https://cdn.3up.dk/bootstrap@4.1.3/dist/css/bootstrap.min.css"></script>
      <script src="https://cdn.3up.dk/mdi@2.2.43/css/materialdesignicons.min.css"></script>


    <!--  ......................... -->

      <!-- Custom CSS (css\custom) -->

    <link rel="stylesheet" type="text/css" href="../css/custom/home.css">
    <link rel="stylesheet" type="text/css" href="../css/custom/aos.css">
     <link rel="stylesheet" type="text/css" href="../css/custom/navbar_footer.css">
      <link rel="stylesheet" type="text/css" href="../css/custom/user_toggle.css">

      <!--  ......................... -->

    <title>Lifey</title>
      <link rel="shortcut icon" type="image/png" href="<?php echo $image[1] ? $image[1] : "../images/lifey_favicon.png"; ?>">

<!-- <meta http-equiv="refresh" content="2; url=loading.html" -->

       </head>



 <body>
   <!-- user_toggle.php -->
<?php
			// user_toggle.php
			include ('user_toggle.php');
	?>

  <!-- user_toggle.php -->
   <header>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg">
         <a class="navbar-brand" href="home.php">
         <img src="<?php echo $image[2] ? $image[2] : "../images/lifey_favicon.png"; ?> "style="width:50px;height:50px;">Lifey</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
          aria-label="Toggle navigation">
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
    <div class="container text-center">
      <div class="row">
        <div class="col-md-7 col-sm-12  text-white">
          <h6><?php echo $text[1] ? $text[1] : 'Lifey: Lifey is life'; ?> </h6>
          <h1><?php echo $text[2] ? $text[2] : 'SECURE LIFE'; ?></h1>
          <p><?php echo $text[3] ? $text[3] : "Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."; ?>

          </p>
          <button class="btn btn-light px-5 py-2 primary-btn" onclick="window.location.href='User_Registration.php';">
           <?php echo $text[4] ? $text[4] : 'SIGN IN'; ?>
          </button>
        </div>
        <div class="col-md-5 col-sm-12  h-25">
          <img src="<?php echo $image[3] ? $image[3] : "../images/unnamed.png"; ?> " alt="" />
        </div>
      </div>
    </div>
  </header>

  <main>
    <section class="section-1">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-6 col-12" data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">
            <div class="pray">
              <img src="<?php echo $image[4] ? $image[4] : "../images/132848.jpg"; ?> " alt="Pray" class="" />
            </div>
          </div>
          <div class="col-md-6 col-12" data-aos="fade-left"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">
            <div class="panel text-left">
              <h1><?php echo $text[5] ? $text[5] : "Lifey"; ?></h1>
              <p class="pt-4">
                <?php echo $text[6] ? $text[6] : "Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."; ?>
              </p>
              <p data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back"
     data-aos-delay="600"
     data-aos-offset="0">
               <?php echo $text[7] ? $text[7] : "Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-2 container-fluid p-0" style="overflow-y: hidden">
      <div class="cover">
        <div class="overlay"></div>
        <div class="content text-center" data-aos="zoom-out">
          <h1><?php echo $text[8] ? $text[8] : "Our registered Clint"; ?></h1>
          <p>
           <?php echo $text[9] ? $text[9] : "it means to be full of life"; ?>
          </p>
        </div>
      </div>
      <div class="container-fluid text-center">
        <div class="numbers d-flex flex-md-row flex-wrap justify-content-center">
          <div class="rect">
            <h1>1971</h1>
            <p>Doctor</p>
          </div>
          <div class="rect">
            <h1>20020</h1>
            <p>Patient</p>
          </div>
          <div class="rect">
            <h1>1221</h1>
            <p>Diagnostic Center</p>
          </div>
          <div class="rect">
            <h1>1945</h1>
            <p>Hospital</p>
          </div>
        </div>
      </div>


      <div class="purchase text-center">
        <h1>Service fee </h1>
        <p>
          it means to be full of life
        </p>
        <div class="cards">
          <div class="d-flex flex-row justify-content-center flex-wrap">
            <div class="card" data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
              <div class="card-body">
                <div class="title">
                  <h5 class="card-title">bio info</h5>
                </div>
                <p class="card-text">
                  it means to be full of life
                </p>
                <div class="pricing">
                  <h1>$0.0</h1>
                  <a href="#" class="btn btn-dark px-5 py-2 primary-btn mb-5">take service</a>
                </div>
              </div>
            </div>
            <div class="card" data-aos="flip-up"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
              <div class="card-body">
                <div class="title">
                  <h5 class="card-title">Medi info</h5>
                </div>
                <p class="card-text">
                  it means to be full of life
                </p>
                <div class="pricing">
                  <h1>$0.0</h1>
                  <a href="#" class="btn btn-dark px-5 py-2 primary-btn mb-5">take service</a>
                </div>
              </div>
            </div>
            <div class="card" data-aos="flip-right"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
              <div class="card-body">
                <div class="title">
                  <h5 class="card-title">Analysis</h5>
                </div>
                <p class="card-text">
                  it means to be full of life
                </p>
                <div class="pricing">
                  <h1>$0.0</h1>
                  <a href="#" class="btn btn-dark px-5 py-2 primary-btn mb-5">take service</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-3 container-fluid p-0 text-center">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h1><?php echo $text[10] ? $text[10] : "Download Our App"; ?></h1>
          <p>
            <?php echo $text[11] ? $text[11] : "Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."; ?>
          </p>
        </div>
      </div>
      <div class="platform row">
        <div class="col-md-4 col-sm-12 text-center" data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
          <div class="desktop shadow-lg">
            <div class="d-flex flex-row justify-content-center">
              <i class="fas fa-desktop fa-3x py-2 pr-3"></i>
              <div class="text text-left">
                <h3 class="pt-1 m-0">Desktop</h3>
                <p class="p-0 m-0">On website</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 text-center" data-aos="flip-up"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
          <div class="desktop shadow-lg">
            <div class="d-flex flex-row justify-content-center">
              <i class="fas fa-mobile-alt fa-3x py-2 pr-3"></i>
              <div class="text text-left">
                <h3 class="pt-1 m-0">On Mobile</h3>
                <p class="p-0 m-0">On Play Store</p>
              </div>
            </div>
          </div>
        </div>
          <div class="col-md-4 col-sm-12 text-center" data-aos="flip-right"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
          <div class="desktop shadow-lg">
            <div class="d-flex flex-row justify-content-center">
              <i class="fas fa-mobile-alt fa-3x py-2 pr-3"></i>
              <div class="text text-left">
                <h3 class="pt-1 m-0">On Iphone</h3>
                <p class="p-0 m-0">On App Store</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 4 -->
    <section class="section-4">
      <div class="container text-center">
        <h1 class="text-dark"><?php echo $text[12] ? $text[12] : "What our Clint Say about us"; ?></h1>
        <p class="text-secondary"><?php echo $text[13] ? $text[13] : "Lifey has several possible meanings"; ?></p>
      </div>
      <div class="team row ">
        <div class="col-md-4 col-12 text-center">
            <div class="card mr-2 d-inline-block shadow-lg">
                <div class="card-img-top">
                  <img src="<?php echo $image[5] ? $image[5] : "../images/500854a.jpg"; ?> " class="img-fluid border-radius p-4" alt="">
                </div>
                <div class="card-body">
                  <h3 class="card-title"><?php echo $text[14] ? $text[14] : "Dr.Strange"; ?></h3>
                  <p class="card-text">
                    <?php echo $text[15] ? $text[15] : "Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."; ?>
                  </p>
                  <a href="#" class="text-secondary text-decoration-none"><?php echo $text[16] ? $text[16] : "MBBS FCPS"; ?></a>
                  <p class="text-black-50"><?php echo $text[17] ? $text[17] : "DHAKA MEDICAL"; ?> </p>
                </div>
              </div>
        </div>
        <div class="col-md-4 col-12">
            <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner text-center">
                  <div class="carousel-item active">
                    <div class="card mr-2 d-inline-block shadow">
                      <div class="card-img-top">
                        <img src="<?php echo $image[6] ? $image[6] : "../images/15743310.jpg"; ?> " class="img-fluid rounded-circle w-50 p-4" alt="">
                      </div>
                      <div class="card-body">
                        <h3 class="card-title"><?php echo $text[18] ? $text[18] : "ABUL MAL"; ?></h3>
                        <p class="card-text">
                          <?php echo $text[19] ? $text[19] : "Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."; ?>
                        </p>
                        <a href="#" class="text-secondary text-decoration-none"><?php echo $text[20] ? $text[20] : "Cancer"; ?></a>
                        <p class="text-black-50"><?php echo $text[21] ? $text[21] : "Noakhali"; ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card  d-inline-block mr-2 shadow">
                      <div class="card-img-top">
                        <img src="<?php echo $image[7] ? $image[7] : "../images/15743303.jpg"; ?> " class="img-fluid rounded-circle w-50 p-4" alt="">
                      </div>
                      <div class="card-body">
                        <h3 class="card-title"><?php echo $text[22] ? $text[22] : "Sokina"; ?></h3>
                        <p class="card-text">
                         <?php echo $text[23] ? $text[23] : "Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."; ?>
                        </p>
                        <a href="#" class="text-secondary text-decoration-none"><?php echo $text[24] ? $text[24] : "Tummy sickness"; ?></a>
                        <p class="text-black-50"><?php echo $text[25] ? $text[25] : "Cumilla"; ?></p>
                      </div>
                    </div>
                  </div>
              </div>
        </div>
        </div>
        <div class="col-md-4 col-12 text-center">
            <div class="card mr-2 d-inline-block shadow-lg">
                <div class="card-img-top">
                  <img src="<?php echo $image[8] ? $image[8] : "../images/1655257.jpg"; ?> " class="img-fluid border-radius p-4" alt="">
                </div>
                <div class="card-body">
                  <h3 class="card-title"><?php echo $text[26] ? $text[26] : "Business man"; ?></h3>
                  <p class="card-text">
                    <?php echo $text[27] ? $text[27] : "Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary) As a noun: a video selfie of one's life."; ?>
                  </p>
                  <a href="#" class="text-secondary text-decoration-none"><?php echo $text[28] ? $text[28] : "Business Man"; ?></a>
                  <p class="text-black-50"><?php echo $text[29] ? $text[29] : "Under Cover Agent"; ?></p>
                </div>
              </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
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



let navbar = $(".navbar");

$(window).scroll(function () {
  // get the complete hight of window
  let oTop = $(".section-2").offset().top - window.innerHeight;
  if ($(window).scrollTop() > oTop) {
    navbar.addClass("sticky");
  } else {
    navbar.removeClass("sticky");
  }
});


   let nCount = selector => {
  $(selector).each(function () {
    $(this)
      .animate({
        Counter: $(this).text()
      }, {

        duration: 4000,

        easing: "swing",

        step: function (value) {
          $(this).text(Math.ceil(value));
        }
      });
  });
};

let a = 0;
$(window).scroll(function () {
  let oTop = $(".numbers").offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() >= oTop) {
    a++;
    nCount(".rect > h1");
  }
});





 </script>




 <!--AOS animate -->
<script>
    AOS.init();

</script>


  </body>
</html>
