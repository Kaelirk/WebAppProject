<?php
  include_once "header.php";

  include "classes/dbh.class.php";
  include "classes/profileinfo.class.php";
  include "classes/profileinfo-view.class.php";

  $profileInfo = new ProfileInfoView();
  ?>
<!-- This page contains the HTML and bootstrap layout/design for the profile page. It includes the header via the include_once expression
 and includes access to a number of classes via the include expression -->
<body class="bg-secondary-subtle">
<section class="profile">
  <div class="profile-bg bg-secondary mt-2 d-inline-flex p-3 rounded-5">
    <div class="wrapper row align-items-start gap-3">
      <div class="profile-info bg-info-subtle d-inline-flex p-3 col rounded-5 gap-3">
        <div class="profile-info-img">
          <p>
            <h4> <!-- the code below displays the current session's useruid on the page -->
              <?php
              echo $_SESSION["useruid"];
            ?>
            </h4>
          </p>
          <a href="profilesettings.php" class="follow-btn fs-6">Profile settings</a> <!-- This button takes the user to profilesettings.php -->
        </div>
        <div class="profile-info-about">
          <h4>ABOUT</h4>
          <p> <!-- The code below uses the fetchAbout function set in the profileinfo-view.class file to return the user's About data from the database -->
            <?php 
             $profileInfo->fetchAbout($_SESSION["userid"]);
            ?>
          </p>
          <h6>FOLLOWERS: ---</h6>
          <h6>FOLLOWING: ---</h6>
        </div>
      </div>
        <div class="profile-content bg-info-subtle d-inline-flex p-3 col rounded-5">
          <div class="profile-intro">
            <h3> <!-- The code below uses the fetchAbout function set in the profileinfo-view.class file to return the user's Introtile data from the database -->
              <?php 
              $profileInfo->fetchIntroTitle($_SESSION["userid"]);
              ?>
            </h3> <!-- The code below uses the fetchAbout function set in the profileinfo-view.class file to return the user's Introtext data from the database -->
            <p>
              <?php 
              $profileInfo->fetchIntroText($_SESSION["userid"]);
              ?>
            </p>
          </div>
        </div>
        <div class="profile-posts bg-info-subtle d-inline-flex p-3 col rounded-5">
          <div class="profile-post"> <!-- this segment of the page could perhaps contain the clinic's/physio's most recent twitter posts using a twitter API for example-->
            <h2>Dr.Madkrok is on this weeks RecoveryTalk podcast episode!</h2>
            <p>We cover all things from sports injuries to dealing with muscle and bone wasting we going through oncological treatments, 
              give us a listen if you want a ton of golden nuggets! (This segment would normally contain the twitter feed using the twitter API)</p>
            <p>18:06 05/02/2025</p>
          </div>
        </div>
    </div>
  </div>
</section>
</body>
</html>