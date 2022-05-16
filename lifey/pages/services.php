<?php
include ('header.php');
?>
<?php require_once("Include/DB.php"); 
global $ConnectingDB;
?>

   <?php
$myquery ="SELECT * FROM images";
$runquery=mysqli_query($ConnectingDB,$myquery);
$resultCheck=mysqli_num_rows($runquery);
$image_id=array();
$image_url= array();
$category = array();
$available_time = array();
 if($resultCheck>0)
    {
        while($row=mysqli_fetch_assoc($runquery))
        {
            $image_id[] = $row['image_id'];
            $image_url[] = $row['image_url'];
        }
 }

?>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
<link href="https://fonts.googleapis.com/css2?family=Advent+Pro:wght@700&display=swap" rel="stylesheet"> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="css/style.css">

<style>
    .panel-default{
         border:2px solid white;
        margin-top: 20px;
        padding: 20px;
      box-shadow: 2px  2px 20px rgba(0,0,0,0.2);
    }
    h1,h3{
        font-family: 'Advent Pro', sans-serif;
    font-weight:bold;
    letter-spacing: 1px;
        text-transform: uppercase;
        color: #000;
        
    }
    
     strong{
        font-family: 'Advent Pro', sans-serif;
    font-weight:bold;
    letter-spacing: 1px;
        text-transform: uppercase;
        color: #cc2b5e;
        
    }
.fa-stethoscope,.fa-wheelchair,.fa-ambulance
    {
        padding: 30px;
        background-color: #cc2b5e !important;
        border-radius: 50%;
        font-size:20px;
        box-shadow: 2px  2px 20px rgba(0,0,0,0.2);
        
    }
    .p{
      font-family: 'Advent Pro', sans-serif;
    font-weight:bold;
    letter-spacing: 1px;
        color: #000;
        
    }
    .panel-default:hover{
        background:  linear-gradient(to right, #753a88 , #cc2b5e);
    }
    
       
    .panel-default:hover h3,.panel-default:hover p
{
    color: #FFF
       
}
    
    .panel-default:hover i
{
     padding: 30px;
        background-color: #fff !important;
        color: #000;
        border-radius: 50%;
        font-size:20px;
        box-shadow: 2px  2px 20px rgba(0,0,0,0.2);
 
}
.carousel .item {
  height: 300px;
}

.item img {
    position: absolute;
    top: 0;
    left: 0;
    min-height: 300px;
}
    
</style>



<div class="jumbotron big-banner" style="background:url('<?php echo $image_url[3]?>') no-repeat;background-size:cover;height:500px;">
<div class="container">
   <div class="row align-items-center">
       <div class="col">
           <div class="col-4 text-light">
           <h2 class="display-3 mb-4">Featured Services</h2>
           <p class="lead mb-4">Our services includes many featured services</p>
       </div>
       <div class="col-6">
          <form class="form-inline my-2 my-lg-0">
              <input class="form-control form-control-lg mr-sm-0 col-8" type="search" placeholder="Search For Services" aria-label="Search">
              <button class="btn btn-light my-2 my-sm-0 col-2" type="submit">
                 <i class="fas fa-search"></i>
              </button>
              
              
          </form>
           
       </div>
   </div>
   </div>
</div>
</div>

<div class="container" styles="margin-top:120px;">
   <h1 class="mb-5" align="center">Our <strong> Services</strong></h1>
</div>
<section class="services-section">
      <div class="inner-width">
        <div class="services owl-carousel">

          <div class="service">
            <div class="service-icon">
              <i class="fas fa-capsules"></i>
            </div>
            <div class="service-name">Disease Management</div>
            <div class="service-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam nesciunt similique!</div>
          </div>

          <div class="service">
            <div class="service-icon">
              <i class="fas fa-print-search"></i>
            </div>
            <div class="service-name">Research Panel</div>
            <div class="service-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam nesciunt similique!</div>
          </div>

          <div class="service">
            <div class="service-icon">
              <i class="fad fa-users-medical"></i>
            </div>
            <div class="service-name">Diagnose</div>
            <div class="service-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam nesciunt similique!</div>
          </div>

          <div class="service">
            <div class="service-icon">
              <i class="fas fa-syringe"></i>
            </div>
            <div class="service-name">Vaccination History</div>
            <div class="service-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam nesciunt similique!</div>
          </div>

          <div class="service">
            <div class="service-icon">
              <i class="fas fa-headset"></i>
            </div>
            <div class="service-name">Support</div>
            <div class="service-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam nesciunt similique!</div>
          </div>
        </div>
      </div>
    </section>


    <!-- SLIDER -->
    <div id="slider1" class="carousel slide mt-5" data-ride="carousel">
      <ol class="carousel-indicators">
        <li class="active" data-target="#slider1" data-slide-to="0"></li>
        <li data-target="#slider1" data-slide-to="1"></li>
        <li data-target="#slider1" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="<?php echo $image_url[4]?>" class="d-block img-fluid" alt="First Slide">
          <div class="carousel-caption">
            <h3>Telemedicine Service</h3>
            <p>We are providing your only need which is telemedicine service. Get well by taking treatment in your home through us.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo $image_url[5]?>" class="d-block img-fluid" alt="Second Slide">
          <div class="carousel-caption">
            <h1>Online Appointment</h1>
            <p class="h5">Make your appointment easily online to 100+Hospitals</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo $image_url[6]?>" class="d-block img-fluid" alt="Third Slide">
          <div class="carousel-caption">
            <h3 style="color:white;">Experienced Teams</h3>
            <p>A team of experienced doctor will always monitor you for checkups.</p>
          </div>
        </div>
      </div>
      <a href="#slider1" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a href="#slider1" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
 
<div class="container" styles="margin-top:120px;">
   <h1 class="mb-5 mt-5" align="center">We also got</h1>
    <div class="row mb-5">
       <div class="col-sm-4">
           <div class="panel panel-default">
               <div class="panel-body">
                   <h3 align="center">Experienced Doctors</h3>
                   <p align="center">
                       <i class="fa fa-stethoscope"></i>
                   </p>
                   <p align="center">
                       We provide experienced doctors for you.
                   </p>
               </div>
               
           </div>
           
       </div>
       <div class="col-sm-4">
           <div class="panel panel-default">
               <div class="panel-body">
                   <h3 align="center">24/7 Hour Services</h3>
                   <p align="center">
                       <i class="fa fa-ambulance"></i>
                   </p>
                   <p align="center">
                      We are there for you always 24 hour including 7days.
                   </p>
               </div>
               
           </div>
           
       </div>
       <div class="col-sm-4">
           <div class="panel panel-default">
               <div class="panel-body">
                   <h3 align="center">Emergency Care</h3>
                   <p align="center">
                       <i class="fa fa-wheelchair"></i>
                   </p>
                   <p align="center">
                       We provide services at your doorstep.
                   </p>
               </div>
               
           </div>
           
       </div>
        
    </div>
    
</div>
 <script>
      $(".services").owlCarousel({
        margin:20,
        loop:true,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        responsive:{
          0:{
            items:1
          },
          600:{
            items:2
          },
          1000:{
            items:3
          }
        }
      });
    </script>
 
 
<?php
include ('footer.php');
?>