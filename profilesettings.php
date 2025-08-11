<?php
$bodyClass = "bg-image-profile";
  include_once "header.php";

  include "classes/dbh.class.php";
  include "classes/profileinfo.class.php";
  include "classes/profileinfo-view.class.php";

  $profileInfo = new ProfileInfoView();
  ?>

<!-- This page contains the html and bootstrap layout/design for the profilesettings page of the application -->
<?php if(isset($_SESSION["userid"])){?>
 <section class="profile d-flex justify-content-center" >
    <div class="wrapper d-flex justify-content-center " >
        <div class="profile-bg bg-secondary bg-opacity-75 m-5 p-3 rounded-3 shadow-lg" id="profilesettings">
            <div class="profile-setings">
                <h3>PROFILE SETTINGS</h3>
                <!-- the code below is a form that user's can fill in and save to the database to update the information on their profile page. -->
                <form action="api/profileinfo.api.php" method="post">
                    <div class="form-floating">
                        <input class="rounded-1 form-control" type="text" id="introtitle" name="introtitle" value="<?php $profileInfo->fetchIntroTitle($_SESSION["userid"]);?>">
                        <label for="introtitle" class="form-label">Profile title</label>
                    </div>
                    <br>
                    <p>Update your profile page introduction here: </p>
                    <div class="form-floating">
                        <textarea class="rounded-1 form-control"id="introtext" name="introtext" style="min-height: 100px;" rows="10" cols="74" ><?php $profileInfo->fetchIntroText($_SESSION["userid"]);?></textarea>
                        <label for="intotext" class="form-label">Introduction</label>
                    </div>
                    <br><br>
                    <p>Update your about section: </p>
                     <div class="form-floating">
                        <textarea class="rounded-1 form-control" id="about" name="about" style="min-height: 150px;" rows="10" cols="74" ><?php $profileInfo->fetchAbout($_SESSION["userid"]);?></textarea>
                        <label for="about" class="form-label">About you</label>
                    </div>
                    <br>
                    <button class="rounded-1" type="submit" name="submit">SAVE</button>
                </form>
            </div>
        </div>
    </div>
 </section>
</body>
<?php }else{ ?>
    <h2>Access denied.<h2>
    <p>Please return to the home page and login.</p>
  <?php } ?>
</html>