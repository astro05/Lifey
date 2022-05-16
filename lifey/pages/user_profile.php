<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_login(); ?>

<?php
    // header.php
    include ('header.php');
?>
<section id="main-site">
    <div class="container py-5">
        <div class="row">
            <div class="col-4 offset-4 shadow py-4">
                <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">
                        <img class="img rounded-circle" style="width: 200px; height: 200px;" src="<?php echo isset($_SESSION['User_profile_image']) ? $_SESSION['User_profile_image'] : '../images/user_default.png'; ?>" alt="">
                        <h4 class="py-3">
                            <?php
                            if(isset($_SESSION['User_Id'])){
                                printf('%s %s', $_SESSION['User_firstName'], $_SESSION['User_lastName'] );
                            }
                            ?>
                        </h4>
                    </div>
                </div>

                <div class="user-info px-3">
                    <ul class="font-ubuntu navbar-nav">
                        <li class="nav-link"><b>First Name: </b><span><?php echo isset($_SESSION['User_firstName']) ? $_SESSION['User_firstName'] : ''; ?></span></li>
                        <li class="nav-link"><b>Last Name: </b><span><?php echo isset($_SESSION['User_lastName']) ? $_SESSION['User_lastName'] : ''; ?></span></li>
                        <li class="nav-link"><b>Email: </b><span><?php echo isset($_SESSION['User_Email']) ? $_SESSION['User_Email'] : ''; ?></span></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>
