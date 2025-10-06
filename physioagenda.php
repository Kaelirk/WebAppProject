<?php
$bodyClass="bg-image-schedule";
  include_once "header.php";

  require_once __DIR__ . '/classes/dbh.class.php';
  ?>
<!-- All instances of the "if(isset($_SESSION["userid"]))" line throughout the application are to ensure that parts of the page that should only be accessible to those who are logged in aren't loaded if no session is active.-->
<?php if((isset($_SESSION["userid"])) && ($_SESSION["userid"] == "1")){?> <!-- this line of code also checks that the person accessing this page is userid "1" which would be the admin account. -->
<section class="bookings d-flex justify-content-center align-items-center vh-100">
  <div class="bookings-bg bg-secondary bg-opacity-25 d-inline-flex p-4 rounded-3 shadow-lg">
    <div class="wrapper d-flex flex-column justify-content-start align-items-center overflow-auto" style="max-height: 80vh;"">
      <h2>Your schedule for today: </h2>
      <div id="slots-container"></div> <!-- a div is prepared to contain each of the bookings loops -->
      <script src="physioscript.js"></script><!-- calling the script from physioscript.js-->
    </div>
  </div>
</section>
<?php }else{ ?>
  <h2>Access denied.<h2>
  <p>Administrator privileges required.</p>
<?php } ?>
</body>
</html>