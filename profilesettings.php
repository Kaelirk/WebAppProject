<?php
  include_once "header.php";

  include "classes/dbh.class.php";
  include "classes/profileinfo.class.php";
  include "classes/profileinfo-view.class.php";

  $profileInfo = new ProfileInfoView();
  ?>

<!-- This page contains the html and bootstrap layout/design for the profilesettings page of the application -->
<body class="bg-image-profile">
<?php if(isset($_SESSION["userid"])){?>
 <section class="profile" >
    <div class="wrapper d-flex justify-content-center " >
        <div class="profile-bg bg-secondary bg-opacity-75 m-5 p-3 rounded-4 shadow-lg" style="width: 600px">
            <div class="profile-setings">
                <h3>PROFILE SETTINGS</h3>
                <!-- the code below is a form that user's can fill in and save to the database to update the information on their profile page. -->
                <form action="api/profileinfo.api.php" method="post">
                    <input class="rounded-1" type="text" name="introtitle" placeholder="Profile title..." value="<?php $profileInfo->fetchIntroTitle($_SESSION["userid"]);?>">
                    <br>
                    <p>Update your profile page intro here: </p>
                    <textarea class="rounded-1" name="introtext" rows="10" cols="74" placeholder="Update your profile introduction here..."><?php $profileInfo->fetchIntroText($_SESSION["userid"]);?></textarea>
                    <br><br>
                    <p>Update your about section: </p>
                    <textarea class="rounded-1" name="about" rows="10" cols="74" placeholder="Update your profile about section here..."><?php $profileInfo->fetchAbout($_SESSION["userid"]);?></textarea>
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