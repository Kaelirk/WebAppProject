<?php
$bodyClass = "bg-image-schedule";
  include_once "header.php";

  require_once __DIR__ . '/classes/dbh.class.php';
  ?>

<section class="availabilities d-flex justify-content-center align-items-center min-vh-100">
  <div class="availabilities-bg bg-secondary bg-opacity-25 d-inline-flex p-4 rounded-5 shadow-lg">
    <div class="wrapper d-flex flex-column justify-content-start align-items-center overflow-auto" style="max-height: 80vh;">
      <h2 text-align-center >Today's availabilities: </h2>
      <div id="slots-container"></div><!-- a div is prepared to contain each of the bookings loops throughout in the bookings.forEach() method. -->
        <script src="patientscript.js"></script><!-- calling the script from patientscript.js -->
     </div>
   </div>
  </div>
</section
</body>
</html>