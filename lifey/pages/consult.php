<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php Confirm_login(); ?>
    

    <?php
$_SESSION["User_Id"];
     
  $doctorId =$_SESSION["User_Id"];
$doctorname =$_SESSION["User_firstName"]." ".$_SESSION["User_lastName"];


  $userId = @$_POST['id']; 
  $username = @$_POST['name']; 
  $problem = @$_POST['problem']; 
  $test = @$_POST['test']; 
  $medicine = @$_POST['medicine']; 
  $date=date('Y-m-d');
   
 
                
            if(!(empty($userId) ||empty($username) || empty($problem) || empty($medicine)) )
            { 

         $sql  ="INSERT INTO `prescription` (`prescription_id`,`UserID`, `user_name`,`doctor_name`, `doctor_id`, `problems`, `test`, `medicine`,`date`) VALUES (NULL,'$userId', '$username','$doctorname','$doctorId', '$problem','$test', '$medicine', '$date');";
     mysqli_query($ConnectingDB, $sql);
          
            }
         else
         {
             $show_Error=true;
         }


$doctor_name = array();
$problems = array();
$appointment_Date = array();
$consult_Date = array();
$consult_Time = array();



$myquery ="SELECT * FROM user_registration";
    $runquery=mysqli_query($ConnectingDB,$myquery);
    $resultCheck=mysqli_num_rows($runquery);
$USER_id=array();
$USER_name= array();

 if($resultCheck>0)
    {
        while($row=mysqli_fetch_assoc($runquery))
        {    
           

  // add each row returned into an array
  $USER_id[] = $row['userID'];
  $USER_name[] = $row['firstName'].$row['lastName'];     
  
}
    
 }





$myquery ="SELECT * FROM appointment where doctor_id=".$_SESSION["User_Id"]." AND consult_date='".date('Y-m-d')."'";
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
    
    .old
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

     
     
<div class="a modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Prescription</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="myForm" action=consult.php method="post">
      <div class="modal-body mx-3">
        
        <div class="form-group">
            <label for="Id">User Id</label>
            <input class="form-control" type="text" name="id" placeholder="Enter UserId">
        </div>
        
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" placeholder="Enter Name">
        </div>
         <div class="form-group">
            <label for="Problems">Problem</label>
            <input class="form-control" type="text" name="problem" placeholder="Enter Problems">
        </div>
        <div class="form-group">
            <label for="Test">Tests</label>
            <input class="form-control" type="text" name="test" placeholder="Preferred Tests">
        </div>
        <div class="form-group">
            <label for="Medicine">Medicine and Remarks</label>
            <textarea type="form-control"  name="medicine" class="md-textarea form-control" rows="3"></textarea>
        </div>
       
        
      </div>
      
      
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-success mt-2" type="" onclick="getModal()">Send</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-dialog-centered mw-100 w-75 mr-4">

    <!-- Modal content-->
    <div class="modal-content old">
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
        <button type="button" class="btn btn-success mr-5" data-dismiss="modal" data-toggle="modal" data-target="#modalContactForm" >Prescribe</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="jumbotron" style="background:url('../images/consult.jpg') no-repeat;background-size:cover;height:600px;">
   <div class="container">
   <div class="row align-items-center">
       <div class="col">
           <div class="col-4 text-light">
           <h2 class="display-3 mb-4">Appointment Lists</h2>
               <h3 class="bold mb-4 text-light"><bold>Find Your Appointments</bold></h3>
       </div>
       
   </div>
   </div>
</div>
</div>
<div class="container-fluid">
<div class="row mb-5">
   <div class="col-md-1 "></div>
    
   <div class="col-md-10">
       <div class="card">
             <div class="card-body" style="background-color:#0275d8;color:#fffff">
        <h5 style="color:white">Your Consults Today</h5>    
        
        </div>
           </div>
          <?php
            $i=0;

             if($resultCheck>0)
                 
    {
        while($row=mysqli_fetch_assoc($runquery))
        {    
$user_id[]=$row['userID'];   
         
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
            <a class="list-group-item-action" id="<?php echo $i ?>" onclick="myFunction('<?php echo $row['userID'];  ?>','<?php echo $i ?>')" href="#bannerformmodal" data-toggle="modal" data-target="#bannerformmodal">
                <div>
                <h4>My Consult <?php echo $row['ap_sl_no']?></h4>
                <div class="row">
                <div class="col-10">
                <small class="text-info">Created <?php echo round($datediff / (60 * 60 * 24));?> days ago</small>
                </div>
                 <div class="btn btn-success ml-5">Prescribe</div>
                 </div>
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
var userID = <?php echo json_encode($USER_id);?>;   
var userName = <?php echo json_encode($USER_name);?>;
var problems = <?php echo json_encode($problems);?>;
var consult_Date = <?php echo json_encode($consult_Date);?>;
var appointment_Date = <?php echo json_encode($appointment_Date);?>;
var consult_Time = <?php echo json_encode($consult_Time);?>;


function myFunction(id,key) {
 var name;
    for(i=0;i<userID.length;i++)
        {
            if(userID[i]==parseInt(id))
                name=userName[i];
        }
var title = "hello"
var body ="hello";
var no=parseInt(key)+1;    
$('#modal-title').html("Consult "+no);
$('#modal-head').html("Patient Name: "+name);
$('#problems').html("Patient Problems: "+problems[key]);
$('#appointment_date').html("Appointment Taken At "+appointment_Date[key]);
$('#consult_Date').html("Consult Date: "+consult_Date[key]);
$('#consult_Time').html("Consult Time: "+consult_Time[key]);    
$('#myModal').modal('show');

 
}

function getModal() {

    document.getElementById("myForm").submit();    
    
}
    
</script>       
       
<script>
  


</script>


<?php
include ('footer.php');
?>