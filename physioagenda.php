<?php
$bodyClass="bg-image-schedule";
  include_once "header.php";

  require_once __DIR__ . '/classes/dbh.class.php';
  ?>

<?php if((isset($_SESSION["userid"])) && ($_SESSION["userid"] == "1")){?>
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