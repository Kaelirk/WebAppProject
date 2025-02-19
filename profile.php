<?php
  include_once "header.php";

  include "classes/dbh.class.php";
  include "classes/profileinfo.class.php";
  include "classes/profileinfo-view.class.php";

  $profileInfo = new ProfileInfoView();
  ?>
<body class="bg-secondary-subtle">
<section class="profile">
  <div class="profile-bg bg-secondary mt-2 d-inline-flex p-3 rounded-5">
    <div class="wrapper row align-items-start gap-3">
      <div class="profile-info bg-info-subtle d-inline-flex p-3 col rounded-5">
        <div class="profile-info-img">
          <p>
            <?php
              echo $_SESSION["useruid"];
            ?>
          </p>
          <div class="break"></div>
          <a href="profilesettings.php" class="follow-btn">PROFILE SETTINGS</a>
        </div>
        <div class="profile-info-about">
          <h3>ABOUT</h3>
          <p>
            <?php 
             $profileInfo->fetchAbout($_SESSION["userid"]);
            ?>
          </p>
          <h3>FOLLOWERS</h3>
          <h3>FOLLOWING</h3>
        </div>
      </div>
        <div class="profile-content bg-info-subtle d-inline-flex p-3 col rounded-5">
          <div class="profile-intro">
            <h3>
              <?php 
              $profileInfo->fetchIntroTitle($_SESSION["userid"]);
              ?>
            </h3>
            <p>
              <?php 
              $profileInfo->fetchIntroText($_SESSION["userid"]);
              ?>
            </p>
          </div>
        </div>
        <div class="profile-posts bg-info-subtle d-inline-flex p-3 col rounded-5">
          <div class="profile-post">
            <h2>Thrilled to be able to work with Dr.Madkrok on this weeks RecoveryTalk podcast episode!</h2>
            <p>We cover all things from sports injuries to dealing with muscle and bone wasting we going through oncological treatments</p>
            <p>18:06 05/02/2025</p>
          </div>
        </div>
    </div>
  </div>
</section>
</body>
</html>