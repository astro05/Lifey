<?php require_once("Include/DB.php"); 
global $ConnectingDB;
?> 
<title>About Us</title>
 
<?php
include ('header.php');
?>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<link rel="stylesheet" href="css/about_us.css"/>


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

<section id="team">
  <div class="container my-3 py-5 text-center">
      <div class="row mb-5">
          <div class="col">
            <h1>Our Team</h1>  
              <p class="h6 mt -3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium repudiandae temporibus voluptatem illo consectetur, distinctio nobis, reprehenderit eaque eius totam autem expedita, nesciunt architecto? Inventore dolorem vitae rerum aut eveniet?</p>
          </div>
          
      </div>
      <div class="row">
          <div class="col-lg-6 col-md-6">
              <div class="card">
                  <div class="card-body">
                      <img src="<?php echo $image_url[7]?>" alt="" class="img-fluid rounded-circle w-50 mb-3">
                      <h3>Md.Moniruzzaman Joy</h3>
                      <h5>Software Enginner</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores.</p>
                      <div class="d-flex flex-row justify-content-center">
                          <div class="p-4">
                              <a href="#">
                                <i class="fab fa-facebook-f"></i>  </a>
                              
                          </div>
                          <div class="p-4">
                              <a href="#">
                                  <i class="fab fa-twitter">
                                      
                                  </i>
                              </a>
                          </div>
                          
                           <div class="p-4">
                              <a href="#">
                                  <i class="fab fa-instagram">
                                      
                                  </i>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 mt-30">
              <div class="card">
                  <div class="card-body">
                      <img src="<?php echo $image_url[8]?>" alt="" class="img-fluid rounded-circle w-50 mb-3">
                      <h3>Sadman Jahin</h3>
                      <h5>Software Enginner</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores.</p>
                      <div class="d-flex flex-row justify-content-center">
                          <div class="p-4">
                              <a href="#">
                                <i class="fab fa-facebook-f"></i>  </a>
                              
                          </div>
                          <div class="p-4">
                              <a href="#">
                                  <i class="fab fa-twitter">
                                      
                                  </i>
                              </a>
                          </div>
                          
                           <div class="p-4">
                              <a href="#">
                                  <i class="fab fa-instagram">
                                      
                                  </i>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
      </div>
      
      
  </div>



<?php
include ('footer.php');
?>