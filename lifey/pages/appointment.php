<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_login(); ?>
<?php require_once("Include/DB.php"); 
global $ConnectingDB;
?>

<?php

error_reporting(E_ERROR | E_PARSE);
include ('header.php');

 
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

  

$myquery ="SELECT * FROM doctor";
    $runquery=mysqli_query($ConnectingDB,$myquery);
    $resultCheck=mysqli_num_rows($runquery);
$doctor_id=array();
$doctor_name = array();
$category = array();
$available_time = array();
 if($resultCheck>0)
    {
        while($row=mysqli_fetch_assoc($runquery))
        {    
           

  // add each row returned into an array
  $doctor_id[] = $row['doctor_id'];
  $doctor_name[] = $row['doctor_name'];      
  $category[] = $row['category'];
  
}
    
 }


 $myquery ="SELECT * FROM doctor_time";
     $runquery=mysqli_query($ConnectingDB,$myquery);
    $resultCheck=mysqli_num_rows($runquery);
if($resultCheck>0)
    {
        while($row=mysqli_fetch_assoc($runquery))
        {   
            $available_time[] = $row['available_time']; 
            $doctornew_id[] = $row['doctor_id'];
            
        }
    
}


 $show_modal1 = false;
$show_modal2 = false;
$show_modal3 = false;
$textChange=false;
if(isset($_POST['SubmitButton'])){ //check if form was submitted
  $userID =$_SESSION["User_Id"];
  $doctorid = $_POST['docName']; 
  $problems = $_POST['problems']; 
  $appointmentDate = date('Y-m-d');
    
  $consultDate = date('Y-m-d',strtotime($_REQUEST['consultDate']));
  $consultTime = $_POST['consultTime']; 
    $dname;
    for($i=0;$i<count($doctor_id);$i++)
    {
        if($doctor_id[$i]==$doctorid)
            $dname=$doctor_name[$i];
     }
    
    
    
    
    if(empty($doctorid) || empty($problems) || empty($consultTime) )
    {
        
        $show_modal1 = true;
       
        
    }
    else if($consultDate<$appointmentDate)
    {
    
     
         $show_modal3 = true;
         $textChange=true;
     
        
    }
    else
    {
     
         $sql  ="INSERT INTO `appointment` (`ap_sl_no`, `userID`, `doctor_id`, `doctor_name`, `appointment_time`, `consult_date`, `consult_time`, `problems`) VALUES (NULL, '$userID', '$doctorid','$dname', '$appointmentDate', '$consultDate', '$consultTime', '$problems');";
     if (mysqli_query($ConnectingDB, $sql)) {
          $show_modal2 = true;
         ?>
         
		
 <?php
	 }
        else {
             $show_modal3 = true;
		?>
       
        <div class="alert alert-danger alert-dismissible fade show">
         <h4>There is a problem.</h4>
            <Strong>Error</Strong>  Database connection failed. 
            <a class="alert alert-danger alert-dismissible fade show" role="alert" data-toggle="collapse" href="#section-2"> See More</a>
      <div class="collapse" id="section-2" data-parent="#accordion">
        <div class="card-body">
          <?php
        echo "Error: " . $sql . "
" . mysqli_error($ConnectingDB);
         ?>
          
        </div>
      </div>
       
     </div>

        <?php
	 }
    }
}

?>
<?php ?>


<?php


?>
<style>
select option[disabled] {
    display: none;
}
</style>
<?php

   
    
   

$myquery ="SELECT * FROM doctor";
    $runquery=mysqli_query($ConnectingDB,$myquery);
    $resultCheck=mysqli_num_rows($runquery);
    
    
    ?>


<div>
<?php echo Message(); ?>
<?php echo SuccessMessage(); ?></div>


<?php
  if($show_modal2)
  {
  ?>
      
      
      
    
      
          
 <?php
  }

?>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body text-center">
				<h4>Great!</h4>	
				<p>Your account has been created successfully.</p>
				<button class="btn btn-success" data-dismiss="modal"><span>Start Exploring</span> <i class="material-icons">&#xE5C8;</i></button>
			</div>
		</div>
	</div>
</div>  
<div class="jumbotron" style="background:url('<?php echo $image_url[0]?>') no-repeat;background-size:cover;height:600px;">
   <div class="container">
   <div class="row align-items-center">
       <div class="col-6">
           <div class="col-4 text mt-5">
               <h2 class="display-3 text-dark mt-5 ">Make an Appointment </h2>
       </div>
   </div>
   
   </div>
</div>
</div>
<div class="container-fluid">
<div class="row ">
   <div class="col-md-1"></div>
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
        <h5 style="color:white">Book  an  appointment</h5>    
        </div>
        <div class="card-body">
             <form  action="appointment.php" method="post">
        <div class="form-group mt-3">
            <label for="Problems">Problems</label>
            <input class="form-control" type="text" name="problems" placeholder="Enter problems you are facing">
        </div>
        
       
             <div class="form-group mt-5">
            <label for="Choose Doctor Category">Choose Doctor Category</label>
           
                <select class="form-control" name="docCategory" id="docCat" onchange="jsFunction(this.value);">
                <option value="" disabled selected>Select Your Option</option>
                <?php
                 if($resultCheck>0)
    {
        while($row=mysqli_fetch_assoc($runquery))
        {    
           
            ?>
                
                
                <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                
                <?php
                     }
        }
                    
                    ?>
            </select>
             </div>
             
             <div class="form-group mt-5">
            <label for="Choose Doctor">Choose Doctor</label>
           
                <select class="form-control" name="docName" id="docName" onchange="jsFunction2(this.value);" >
                <option value="" disabled selected>Select Your Option</option>
                <?php
               
    $runquery=mysqli_query($ConnectingDB,$myquery);
    
                    
                if($resultCheck>0)
    {
        while($row=mysqli_fetch_assoc($runquery))
        {    
           
            ?>
            
                
                <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['doctor_name']; ?></option>
                   <?php
                     }
        }
                    
                    ?>
            </select>
           <div class="form-group mt-5">
            <label for="Pick a Consult Date">Pick a Consult Date</label>
            <input class="form-control" type="date" name="consultDate" placeholder="Enter Consulting Date">
        </div>
           <div class="form-group mt-5">
            <label for="Pick a Consult Time">Pick a Consult Time</label>
            
                <select class="form-control" name="consultTime" id="consult_time">
                
                
                <option value="" disabled selected>Select Your Option</option>
                
                         <?php
      $myquery ="SELECT * FROM doctor_time";         
    $runquery=mysqli_query($ConnectingDB,$myquery);
    
                    
                if($resultCheck>0)
    {
        while($row=mysqli_fetch_assoc($runquery))
        {    
           
            ?>
            
                
                <option value="<?php echo $row['available_time']; ?>"><?php echo $row['available_time']; ?></option>
                   <?php
                     }
        }
                    
                    ?>
               </select>
        </div>
            
        </div>
        
        
        <button class="btn btn-primary mt-5 mb-2" name="SubmitButton" type="submit">Submit</button>
        
        
    </form>
            
        </div>        
        
    </div>
    </div>
   <div class="col-md-1"></div>
</div>    
    
    
</div>
<script>
  <?php if($show_modal1):?>
Swal.fire({
    
   title: '<strong> Empty Text</strong>',
    
  icon: 'info',
  html:
    'Please Fill Up The Form Again, ' +
    ' ' +
    '',
  showCloseButton: true,
  showCancelButton: true,
  focusConfirm: false,
  
}
    <?php endif;?>
<?php if($show_modal2):?>
Swal.fire(
  'Good job!',
  'You have succefully made an appointment!',
  'success'
    <?php endif;?>        
<?php if($show_modal3):?>
Swal.fire(
  {
  icon: 'error',
  title: 'Oops...',
<?php if($textChange):?>
    title: '<strong> Wrong Date</strong>',
     <?php endif;?>
    
    <?php if(!$textChange):?>          
  text: 'Something went wrong!',
          <?php endif;?>
  footer: '<a href>Why do I have this issue?</a>'
}
    <?php endif;?>
)
</script>
<script src="js/jquery-slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    
 var doctor_id = <?php echo json_encode($doctor_id); ?>;
  var doctornew_id = <?php echo json_encode($doctornew_id); ?>;
    var doctor_name = <?php echo json_encode($doctor_name);?>;
    var category = <?php echo json_encode($category); ?>;
    var available_time = <?php echo json_encode($available_time); ?>; 
var list = document.getElementById("docName").getElementsByTagName("option");   
var list2 = document.getElementById("consult_time").getElementsByTagName("option");     
  let element = document.getElementById("docName");
  let element2 = document.getElementById("consult_time");    
    
function jsFunction(value)
{
 for(var i=0;i<category.length;i++)
     {  
         
         if(!(value==category[i]))
             {
                 element.value =list[0].value;  
          list[i+1].disabled=true;   
             }
         else  list[i+1].disabled=false;  
     }
}
    function jsFunction2(value)
{
 for(var i=0;i<doctornew_id.length;i++)
       {
             if(!(value==doctornew_id[i]))
                {
           element2.value =list[0].value;  
            list2[i+1].disabled=true;   
                }
           else  list2[i+1].disabled=false;  
       }
}
</script>


<?php
    
    include ('footer.php');
?>



































