
    <div class="user_toggle_action" onclick="actionToggle();">
      <span><img src="<?php echo isset($_SESSION['User_profile_image']) ? $_SESSION['User_profile_image'] : '../images/user_default.png'; ?>" style="width:50px;height:50px;" class="img rounded-circle">
    </span>

          <ul>
            <li>

              <?php
              if(isset($_SESSION["role_play"]))
              {
                if($_SESSION["role_play"] == 1)
                { ?>
                    <a href="dashboard.php"><img src="../images/user_profile.png" style="width:30px;height:30px;">Dashboard</a>
                <?php }else if($_SESSION["role_play"] == 2)
                { ?>
                  <a href="user_profile.php"><img src="../images/user_profile.png" style="width:30px;height:30px;">My Profile</a>
             <?php  }else if($_SESSION["role_play"] == 3)
                { ?>
                  <a href="user_deactive.php"><img src="../images/user_profile.png" style="width:30px;height:30px;">My Profile</a>
             <?php  }else { ?>
                  <a href="user_profile.php"><img src="../images/user_profile.png" style="width:30px;height:30px;">My Profile</a>
            <?php       }
              }else{ ?>
                    <a href="user_profile.php"><img src="../images/user_profile.png" style="width:30px;height:30px;">My Profile</a>
                <?php } ?>

            </li>

            <li>
                <?php
              if(isset($_SESSION["role_play"]))
              {
                if($_SESSION["role_play"] == 1)
                { ?>
                  <a href="user_record.php"><img src="../images/user_default.png" style="width:30px;height:30px;">User Record</a>

                <?php }else if($_SESSION["role_play"] == 2)
                { ?>
                  <a href="consult.php"><img src="../images/user_default.png" style="width:30px;height:30px;">My Consult</a>
             <?php  }else if($_SESSION["role_play"] == 3)
                { ?>
                  <a href="user_deactive.php"><img src="../images/user_default.png" style="width:30px;height:30px;">My Appoinment</a>
             <?php  }

                  else { ?>
                  <a href="appointment.php"><img src="../images/user_default.png" style="width:30px;height:30px;">My Appointment</a>
            <?php       }
              }else{ ?>
                <a href="appointment.php"><img src="../images/user_default.png" style="width:30px;height:30px;">My Appointment</a>

                <?php } ?>
            </li>


            <li>
              <?php
              if(isset($_SESSION["role_play"]))
              {
                if($_SESSION["role_play"] == 1)
                { ?>
                  <a href="contact_inbox.php"><img src="../images/user_settings.png" style="width:30px;height:30px;">Contact Inbox</a>

                <?php }else if($_SESSION["role_play"] == 2)
                { ?>
                  <a href="Reset_Password.php"><img src="../images/user_settings.png" style="width:30px;height:30px;">Settings</a>
             <?php  }else if($_SESSION["role_play"] == 3)
                { ?>
                  <a href="user_deactive.php"><img src="../images/user_settings.png" style="width:30px;height:30px;">Settings</a>
             <?php  }else { ?>
                  <a href="Reset_Password.php"><img src="../images/user_settings.png" style="width:30px;height:30px;">Settings</a>
            <?php       }
              }else{ ?>
                  <a href="Reset_Password.php"><img src="../images/user_settings.png" style="width:30px;height:30px;">Settings</a>

                <?php } ?>
              </li>
            <li>
            <?php
            if(isset($_COOKIE["SettingEmail"])|| isset($_SESSION["User_Id"])){

            ?>
            <a href="Logout.php"><img src="../images/logout.png" style="width:30px;height:30px;">Logout</a>
            <?php }else{ ?>
            <a href="Login.php"><img src="../images/login.png" style="width:30px;height:30px;">Login</a>
             <?php }  ?>
           </li>

           </ul>
        </div>
      <script type="text/javascript">
      function actionToggle(){
        var action = document.querySelector('.user_toggle_action');
        action.classList.toggle('active')
      }
      </script>
