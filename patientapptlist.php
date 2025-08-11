<?php
$bodyClass = "bg-image-schedule";
  include_once "header.php";
  
  include "classes/dbh.class.php";
  include "classes/appts.class.php";
  include "classes/appts-view.class.php";

  $apptsInfo = new ApptsView(); //instantiating an object to allow access to it's methods when loading in profile information.
  ?>

<?php if(isset($_SESSION["userid"])){?>
<section class="availabilities d-flex justify-content-center align-items-center min-vh-100">
  <div class="availabilities-bg bg-secondary bg-opacity-50 d-inline-flex p-3 rounded-3 shadow-lg overflow-y-scroll" style="max-height: 600px;">
    <div class="wrapper d-flex flex-column justify-content-start align-items-center">
      <div class="availabilites-table"></div>

      <h2>Your appointments: </h2>
      <br>
      <?php
      $apptsInfo->showAppts($_SESSION["userid"]);
      ?>
      <p>Make sure you arrive 5 minutes early!</p>

    </div>
  </div>
</section>
<?php }else{ ?>
    <h2>Access denied.<h2>
    <p>Please return to the home page and login.</p>
  <?php } ?>
</body>