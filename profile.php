<?php
$bodyClass = "bg-image-profile";
  require_once "header.php";

  include "classes/dbh.class.php";
  include "classes/profileinfo.class.php";
  include "classes/profileinfo-view.class.php";

  $profileInfo = new ProfileInfoView(); //instantiating an object to allow access to it's methods when loading in profile information.
  ?>

<!-- This page contains the HTML and bootstrap layout/design for the profile page. It includes the header via the include_once expression
 and includes access to a number of classes via the include expression -->
<?php if(isset($_SESSION["userid"])){?>
<div class="container-xl">
  <section class="profile d-flex justify-content-center">
    <div class="profile-bg bg-light bg-opacity-25 p-3 rounded-3 shadow-lg mt" style="margin-top:3vh;">
      <div class="row g-2">
        
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="profile-info bg-secondary bg-opacity-75 d-inline-flex p-3 rounded-3 shadow h-100 w-100">
            <div class="profile-info-uid me-3">
              <h3> <!-- the code below displays the current session's useruid on the page -->
                <?php
                echo $_SESSION["useruid"];
              ?>
              </h3>
              <a href="profilesettings.php" type="button" class="btn btn-outline-primary btn-sm fs-7">Profile <br> settings</a> <!-- This button takes the user to profilesettings.php -->
            </div>
            <div class="profile-info-about">
              <h3>About</h3>
              <p> <!-- The code below uses the fetchAbout function set in the profileinfo-view.class file to return the user's About data from the database -->
                <?php 
                $profileInfo->fetchAbout($_SESSION["userid"]);
                ?>
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="profile-content bg-secondary bg-opacity-75 d-inline-flex p-3 rounded-3 shadow h-100 w-100">
            <div class="profile-intro">
              <h3> <!-- The code below uses the fetchIntroTitle function set in the profileinfo-view.class file to return the user's Introtile data from the database -->
                <?php 
                $profileInfo->fetchIntroTitle($_SESSION["userid"]);
                ?>
              </h3> <!-- The code below uses the fetchIntroText function set in the profileinfo-view.class file to return the user's Introtext data from the database -->
              <p>
                <?php 
                $profileInfo->fetchIntroText($_SESSION["userid"]);
                ?>
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-sm-12">
          <div class="profile-posts bg-secondary bg-opacity-75 d-inline-flex p-3 rounded-3 shadow h-100 w-100">
            <div class="profile-post"> <!-- this segment of the page could perhaps contain the clinic's/physio's most recent twitter posts using a twitter API for example-->
              <h3>Stay up to date: </h3>
              <p>(This segment would normally contain the twitter feed of the clinic using the twitter API, it could also contain information regarding CNS reimbursement changes etc.)</p>
              <p>Any questions? Call or whatsapp us: +352 --- --- ---</p>
            </div>
         </div>

        </div>
      </div>
    </div>
  </section>
</div>
</body>
<?php }else{ ?>
    <h2>Access denied.<h2>
    <p>Please return to the home page and login.</p>
  <?php } ?>
</html>