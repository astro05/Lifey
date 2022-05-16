<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php require_once("Include/DB.php"); ?>
<?php include 'user_record_action.php';?>
<?php Confirm_login();
if($_SESSION["role_play"] != 1)
         Redirect_To("user_profile.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lifey</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />




    <link rel="stylesheet" href="../css/custom/navbar_footer.css">
    <link rel="stylesheet" type="text/css" href="../css/custom/user_toggle.css">
    <link rel="stylesheet" type="text/css" href="../css/custom/user_record.css">



  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>


    <script src="../js/bootstrap-table.min.js"></script>
     <link rel="stylesheet" href="../css/custom/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap-table.min.css">


     <link href="https://unpkg.com/jquery-resizable-columns@0.2.3/dist/jquery.resizableColumns.css" rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.css" rel="stylesheet">

   <script src="https://unpkg.com/jquery-resizable-columns@0.2.3/dist/jquery.resizableColumns.min.js"></script>
   <script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.js"></script>
   <script src="https://unpkg.com/bootstrap-table@1.17.1/dist/extensions/resizable/bootstrap-table-resizable.min.js"></script>

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


<main id="main-area">

<section class="user-upate" style="margin-bottom: 300px;">
  <div class="container-fluid ">
    <div class="row justify-content-center">
      <div class="col-md-10">

        <hr>
        <?php if (isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>
      </div>
    </div>


    <div class="row">

        <div class="col-md-2">
        <h3 class="text-center text-info">Update Record</h3>
          <form action="user_record_action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <div class="form-group">
            <input type="text" name="firstname" value="<?= $firstname; ?>" class="form-control" placeholder="Enter first name" required>
          </div>
          <div class="form-group">
            <input type="text" name="lastname" value="<?= $lastname; ?>" class="form-control" placeholder="Enter last name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" value="<?= $email; ?>" class="form-control" placeholder="Enter e-mail" required>
          </div>
          <div class="form-group">
        <select type="number" name="role" value="<?= $role; ?>" class="form-control" required>
                                    <option selected>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>

              </select>

              </div>
          <div class="form-group">

              <select type="text" name="status" value="<?= $status; ?>" class="form-control" required>
                                    <option selected>On</option>
                                    <option>OFF</option>
                                    </select>

              </div>

          <div class="form-group">
            <input type="submit" name="update" class="btn btn-success btn-block" value="Update Record">

          </div>
        </form>
      </div>

        <div class="col-md-10">
           <?php
          global $ConnectingDB;
          $query = 'SELECT * FROM user_registration';
          $stmt = $ConnectingDB->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
        ?>

        <h3 class="text-center text-info">User Record</h3>
        <table
               id="data-table"
               data-toggle="table"
               data-pagination="true"
               data-search="true"
               data-search-align="left"
               data-show-columns="true"
               data-show-toggle="true"
               data-show-refresh="true"
               data-show-fullscreen="true"
               data-show-pagination-switch="true"
               data-pagination-pre-text="Previous"
               data-pagination-next-text="Next"
               data-pagination-h-align="left"
               data-pagination-detail-h-align="right"
               data-page-list="[5, 10, 20, 30, 40, 50, ALL]"
               data-resizable="true"
               data-pagination-v-align="both"



               >
          <thead>
            <tr>
              <th data-field="userID" data-sortable="true">ID</th>
              <th data-field="profileImage" data-sortable="true">Image</th>
              <th data-field="firstName" data-sortable="true">First Name</th>
              <th data-field="lastName" data-sortable="true">Last Name</th>
              <th data-field="email" data-sortable="true">Email</th>
              <th data-field="registerDate" data-sortable="true">Redister Date</th>
              <th data-field="role_play" data-sortable="true">Role Play</th>
              <th data-field="active" data-sortable="true">Active Status</th>
              <th data-field="action" data-sortable="false">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?= $row['userID']; ?></td>
              <td><img src="<?= $row['profileImage']; ?>" width="25"></td>
              <td><?= $row['firstName']; ?></td>
              <td><?= $row['lastName']; ?></td>
              <td><?= $row['email']; ?></td>
              <td><?= $row['registerDate']; ?></td>
              <td><?= $row['role_play']; ?></td>
              <td><?= $row['active']; ?></td>
              <td>

                <a href="user_record_action.php?delete=<?= $row['userID']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a>

                 <a href="user_record.php?edit=<?= $row['userID']; ?>" class="badge badge-success p-2" >Edit</a>

              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </section>


<script>
  $(function() {
    $('#inbox-table').bootstrapTable()
  })
</script>

</main>




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





 <!-- ................CUSTOM SCRIPT................... -->

    <!-- home page effect -->
    <script>
        //  sticky navigation

        let navbar = $(".navbar");

        $(window).scroll(function() {
            // get the complete hight of window
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



</body>
</html>
