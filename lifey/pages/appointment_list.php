<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); 
global $ConnectingDB;
?>
 

    <?php

$doctor_name = array();
$problems = array();
$appointment_Date = array();
$consult_Date = array();
$consult_Time = array();



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


$myquery ="SELECT * FROM appointment where userID=".$_SESSION["User_Id"];
    $runquery=mysqli_query($ConnectingDB,$myquery);
    $resultCheck=mysqli_num_rows($runquery);
    
    
    ?>





<?php
include ('header.php');
?>


<style>
    .card-effect{
        border:2px solid white;
        padding: 20px;
      box-shadow: 2px  2px 20px rgba(0,0,0,0.2);
    }
    
    
    .card-body:hover,.card-body:hover small{
        border:0px;
        background-color: lemonchiffon;
        cursor: pointer;
        
    }
    
    .modal-content
    {
        width:1000px;
      height: 500px;
        
    }
    .modal-body
    {
        height: 500px;
        background-color: lemonchiffon;
        
    }
     #modal-head
    {
        margin-top: 25px;
        text-align: center;
        font-weight: bold;
    }
   .modal-body p
    {
        text-align: center;
    }


</style>

     
     

     <!-- Modal -->
   
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered mw-100 w-75 mr-4">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title" id="modal-title">Error</h4>
       
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <h4  id="modal-head"></h4>
       <p class="h5 mt-4 mb-3 font-weight-bold" id="problems"></p>
       <p class="mt-5 font-italic" id="appointment_date"></p>
       <p class="mt-2 font-italic" id="consult_Date"></p>
       <p class="mt-2 font-italic" id="consult_Time"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="jumbotron" style="background:url('<?php echo $image_url[1]?>') no-repeat;background-size:cover;height:600px;">
   <div class="container">
   <div class="row align-items-center">
       <div class="col">
           <div class="col-4 text-light">
           <h2 class="display-3 mb-4">Appointment Lists</h2>
               <h3 class="bold mb-4 text-dark"><bold>Find Your Appointments</bold></h3>
       </div>
       
   </div>
   </div>
</div>
</div>
<div class="container-fluid">
<div class="row mb-5">
   <div class="col-md-1 "></div>
     <div class="col-md-3">
     <div class="list-group">
         <a href=" " class="list-group-item active">Categories</a>
         <a href="user_profile.php" class="list-group-item">User Details</a>
         <a href="appointment.php" class="list-group-item">Create an appointment</a>
         <a href="appointment_list.php" class="list-group-item">My Appointments</a>
         <a href="prescription.php" class="list-group-item">Prescriptions</a>
     </div>
    </div>
      <div class="col-md-1"></div>
   <div class="col-md-6">
       <div class="card">
             <div class="card-body" style="background-color:#0275d8;color:#fffff">
        <h5 style="color:white">Appointment Lists</h5>    
        
        </div>
           </div>
          <?php
            $i=0;

             if($resultCheck>0)
                 
    {
        while($row=mysqli_fetch_assoc($runquery))
        {    
$doctor_name[]=$row['doctor_name'];    
$problems[]=$row['problems']; 
$consult_Date[]=$row['consult_date']; 
$appointment_Date[]=$row['appointment_time'];  
$consult_Time[]=$row['consult_time']; 
            
$now = time(); // 
$appointment_date = strtotime($row['appointment_time']);
$consult_date= strtotime($row['consult_date']);           
$datediff = $now - $appointment_date;
$dateRemaining = $consult_date -$now;            
$dateRemaining= round($dateRemaining / (60 * 60 * 24));      


           ?>
          <div class="card mt-3">
           <div class="card-body card-effect">
        <div>
            <a class="list-group-item-action" id="<?php echo $i ?>" onclick="myFunction('<?php echo $i ?>')" href="#bannerformmodal" data-toggle="modal" data-target="#bannerformmodal">
                <div>
                <h4>My Appointment <?php echo $row['ap_sl_no']?></h4>
                <small class="text-info">Created <?php echo round($datediff / (60 * 60 * 24));?> days ago</small>
                <h5 class="mt-2"><bold>Problems:</bold></h5>
                </div>
                <p><?php echo $row['problems']?></p>
                <?php
                if($dateRemaining>=0)
                {
                    ?>
                <small class="text-success"><strong><?php echo $dateRemaining ?> days remaining to Consult.</strong></small>
           
              <?php
                }
               else 
               {
                  $dateRemaining*=-1; 
               
                    ?>
                  <small class="text-danger"><strong><?php echo $dateRemaining ?> days  since Appointment Expired.</strong></small>
             <?php
                        
                    }
             ?>
               </a> 
        
        </div>  
             
              
       </div>
       </div>
       <?php
               
            $i++;
            }
         }
       
       
            ?>
       
       
    </div>
       
<script>
   
var doctor_name = <?php echo json_encode($doctor_name);?>;
var problems = <?php echo json_encode($problems);?>;
var consult_Date = <?php echo json_encode($consult_Date);?>;
var appointment_Date = <?php echo json_encode($appointment_Date);?>;
var consult_Time = <?php echo json_encode($consult_Time);?>;


function myFunction(id) {
 
var title = "hello"
var body ="hello";
var no=parseInt(id)+1;    
$('#modal-title').html("Appointment "+no);
$('#modal-head').html("Doctor Name: "+doctor_name[id]);
$('#problems').html("Patient Problems: "+problems[id]);
$('#appointment_date').html("Appointment Taken At "+appointment_Date[id]);
$('#consult_Date').html("Consult Date: "+consult_Date[id]);
$('#consult_Time').html("Consult Time: "+consult_Time[id]);    
$('#myModal').modal('show');

 
}

</script>       
       



<?php
include ('footer.php');
?>