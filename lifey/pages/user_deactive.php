<?php
ob_start();
require_once("Include/Session.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php Confirm_login(); ?>

<?php
    // header.php
    include ('header.php');
?>


<div class="col-12">
                    <h1>Your Acount Is Deactivated</h1>
                    <div class="sticky_nav">
                        <p>We are always here to help. If your have requirements/queries about our services; fill up the contact form
                            below and we'll do our best to reply within 24 hours Alternatively simply pickup the phone and give us a
                            call.</p>
                    </div>
                    <hr />
                </div>




<?php
include "footer.php";
?>
