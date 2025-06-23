<?php
  include_once "header.php";
  
  include "classes/dbh.class.php";
  include "classes/appts.class.php";
  include "classes/appts-view.class.php";

  $apptsInfo = new ApptsView(); //instantiating an object to allow access to it's methods when loading in profile information.
  ?>

<body class="bg-secondary-subtle">
<section class="availabilities d-flex justify-content-center align-items-center min-vh-100">
  <div class="availabilities-bg bg-secondary d-inline-flex p-3 rounded-5">
    <div class="wrapper d-flex flex-column justify-content-center align-items-center">
      <div class="availabilites-table"></div>

      <h2>Your appointments: </h2>
      <?php
      $apptsInfo->showAppts($_SESSION["userid"]);
      ?>
      <p>Make sure you arrive 5 minutes early!</p>
